<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Auth::routes();

// Home Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'HomeController@show')->name('products.show');

// Cart Routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');
Route::post('/cart/clear', 'CartController@clear')->name('cart.clear');

// Checkout Routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/checkout/success', 'CheckoutController@success')->name('checkout.success');

Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/history/{id}', [HomeController::class, 'historyshow'])->name('history.show')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Categories
    Route::resource('categories', 'CategoryController');
    
// Products
Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::put('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

    // Transactions
    Route::get('/transactions', 'TransactionController@index')->name('transactions.index');
    Route::get('/transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
    Route::post('/transactions/{transaction}/update-status', 'TransactionController@updateStatus')->name('transactions.updateStatus');
    Route::post('/transactions/{transaction}/complete', 'TransactionController@complete')->name('transactions.complete');
    
        
Route::get('/reports/transactions', 'TransactionController@report')->name('transactions.report');
Route::get('/reports/transactions/pdf', 'TransactionController@generatePdf')->name('transactions.report.pdf');
});
