<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Checkout;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('product_detail', compact('product'));
    }
 public function history()
    {
        $checkouts = Checkout::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('history', compact('checkouts'));
    }
    public function historyshow($id)
{
    $checkout = Checkout::with('products.category')->findOrFail($id);
    return view('history_show', compact('checkout'));
}

    public function dashboard()
    {
        return view('dashboard');
    }
}
