<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Checkout;
use App\Category;
use PDF;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('checkout')->orderBy('created_at', 'desc')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('checkout');
        return view('admin.transactions.show', compact('transaction'));
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $request->validate([
            'payment_status' => 'required|in:success,failed,pending',
        ]);

        $transaction->update([
            'payment_status' => $request->payment_status,
        ]);

        // Update checkout status
        if ($request->payment_status == 'success') {
            $transaction->checkout->update(['status' => 'paid']);
        } elseif ($request->payment_status == 'failed') {
            $transaction->checkout->update(['status' => 'cancelled']);
        }

        return redirect()->route('transactions.index')->with('success', 'Status transaksi berhasil diperbarui');
    }

    public function complete(Transaction $transaction)
    {
        $transaction->checkout->update(['status' => 'completed']);
        return redirect()->route('transactions.index')->with('success', 'Pesanan berhasil diselesaikan');
    }

   public function report(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));
        $categoryId = $request->input('category_id');
        $search = $request->input('search');
        
        $categories = Category::all();
        
        $query = Transaction::whereBetween('payment_date', [$startDate, $endDate])
            ->where('payment_status', 'success')
            ->with(['checkout']);
            
        // If category filter is applied
        if ($categoryId) {
            $query->whereHas('checkout', function($q) use ($categoryId) {
                $q->where('category_id', 'LIKE', '%' . $categoryId . '%');
            });
        }
        
        // If search term is applied
        if ($search) {
            $query->whereHas('checkout', function($q) use ($search) {
                $q->where('nama', 'LIKE', '%' . $search . '%');
            });
        }
        
        $transactions = $query->get();
        
        $totalRevenue = $transactions->sum('amount_paid');
        $totalTransactions = $transactions->count();
        
        return view('admin.reports.transactions', compact(
            'transactions', 
            'totalRevenue', 
            'totalTransactions', 
            'startDate', 
            'endDate',
            'categories',
            'categoryId',
            'search'
        ));
    }
    
    public function generatePdf(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));
        $categoryId = $request->input('category_id');
        $search = $request->input('search');
        
        $query = Transaction::whereBetween('payment_date', [$startDate, $endDate])
            ->where('payment_status', 'success')
            ->with(['checkout']);
            
        // If category filter is applied
        if ($categoryId) {
            $query->whereHas('checkout', function($q) use ($categoryId) {
                $q->where('category_id', 'LIKE', '%' . $categoryId . '%');
            });
        }
        
        // If search term is applied
        if ($search) {
            $query->whereHas('checkout', function($q) use ($search) {
                $q->where('nama', 'LIKE', '%' . $search . '%');
            });
        }
        
        $transactions = $query->get();
        
        $totalRevenue = $transactions->sum('amount_paid');
        $totalTransactions = $transactions->count();
        
        // Get category name if filter is applied
        $categoryName = null;
        if ($categoryId) {
            $category = Category::find($categoryId);
            $categoryName = $category ? $category->nama : null;
        }
        
        $pdf = PDF::loadView('admin.reports.transactions_pdf', compact(
            'transactions', 
            'totalRevenue', 
            'totalTransactions', 
            'startDate', 
            'endDate',
            'categoryName',
            'search'
        ));
        
        return $pdf->download('transactions_report_' . date('Y-m-d') . '.pdf');
    }
}
