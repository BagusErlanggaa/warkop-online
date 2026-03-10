<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }
        
        $products = [];
        $total = 0;
        $productIds = [];
        $categoryIds = [];
        
        foreach ($cart as $id => $details) {
            $product = \App\Product::find($id);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $details['quantity']
                ];
                $total += $product->harga * $details['quantity'];
                $productIds[] = $product->product_id;
                $categoryIds[] = $product->category_id;
            }
        }
        
        return view('checkout', compact('products', 'total', 'productIds', 'categoryIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'no_meja' => 'nullable|integer',
            'payment_method' => 'required|in:qris,cash_at_cashier',
            'bukti_bayar' => 'required_if:payment_method,qris|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }
        
        $total = 0;
        $productIds = [];
        $categoryIds = [];
        
        foreach ($cart as $id => $details) {
            $product = \App\Product::find($id);
            if ($product) {
                $total += $product->harga * $details['quantity'];
                $productIds[] = $product->product_id;
                $categoryIds[] = $product->category_id;
            }
        }

        $data = [
            'user_id' => Auth::id(),
            'product_id' => implode(',', $productIds),
            'category_id' => implode(',', $categoryIds),
            'payment_method' => $request->payment_method,
            'no_meja' => $request->no_meja,
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'status' => 'pending',
            'total_amount' => $total,
        ];

        if ($request->hasFile('bukti_bayar')) {
            $buktiPath = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
            $data['bukti_bayar'] = $buktiPath;
        }

        $checkout = Checkout::create($data);

        // Create transaction record
        Transaction::create([
            'checkout_id' => $checkout->checkout_id,
            'transaction_code' => 'TRX-' . time(),
            'payment_status' => 'pending',
            'payment_date' => now(),
            'payment_method' => $request->payment_method,
            'amount_paid' => $total,
        ]);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout_success');
    }
}
