<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Transaction;    
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $monthlySales = [];
    foreach (range(1, 12) as $month) {
        $monthlySales[] = Transaction::whereMonth('created_at', $month)
            ->whereYear('created_at', date('Y'))
            ->where('payment_status', 'success')
            ->sum('amount_paid');
    }

    return view('dashboard', compact('monthlySales'));
}

}