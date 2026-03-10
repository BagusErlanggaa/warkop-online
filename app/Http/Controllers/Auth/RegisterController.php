<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;  // pastikan namespace model User benar
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Override method register untuk validasi reCAPTCHA
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        // Biar kompatibel, walau sudah divalidasi di register()
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered($request, $user)
    {
        try {
            Mail::send('emails.register-notification', [
                'name' => $user->name,
                'email' => $user->email,
                'time' => now()->timezone('Asia/Jakarta')->format('d M Y, H:i:s') . ' WIB',
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Registrasi Berhasil - ' . config('app.name'));
            });
        } catch (\Exception $e) {
            Log::error('Gagal kirim email registrasi: ' . $e->getMessage());
        }
    }
}
