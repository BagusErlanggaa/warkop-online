<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        login as protected loginTrait;
    }

    protected function traitLogin(Request $request)
    {
        return $this->loginTrait($request);
    }

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        return $this->traitLogin($request);
    }

    protected function authenticated($request, $user)
    {
        try {
            $time = now()->timezone('Asia/Jakarta')->format('d M Y, H:i:s') . ' WIB';
            $ip = $request->ip();

            Mail::send('emails.login-notification', [
                'name' => $user->name,
                'email' => $user->email,
                'time' => $time,
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Login Berhasil - ' . config('app.name'));
            });

        } catch (\Exception $e) {
            Log::error('Gagal kirim email login: ' . $e->getMessage());
        }

        return redirect()->intended($this->redirectPath());
    }
}
