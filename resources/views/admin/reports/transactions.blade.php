@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Transaction Reports</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('transactions.report.pdf', request()->query()) }}" class="btn btn-danger" target="_blank">
                <i class="fas fa-file-pdf"></i> Generate PDF
            </a>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5>Filter Transactions</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('transactions.report') }}" method="GET">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="category_id">Category:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $categoryId == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="search">Search by Name:</label>
                        <input type="text" name="search" id="search" class="form-control" value="{{ $search }}" placeholder="Customer name...">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('transactions.report') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <h2 class="text-success">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <h2>{{ $totalTransactions }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5>Transaction List</h5>
        </div>
        <div class="card-body">
            @if($transactions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_code }}</td>
                                    <td>{{ $transaction->checkout->nama }}</td>
                                    <td>Rp {{ number_format($transaction->amount_paid, 0, ',', '.') }}</td>
                                    <td>
                                        @if($transaction->payment_method == 'qris')
                                            <span class="badge badge-info">QRIS</span>
                                        @else
                                            <span class="badge badge-secondary">Cash</span>
                                        @endif
                                    </td>
                                    <td>{{ $transaction->payment_date }}</td>
                                    <td>
                                        @php
                                            $categoryIds = explode(',', $transaction->checkout->category_id);
                                            $categories = App\Category::whereIn('category_id', $categoryIds)->pluck('nama')->toArray();
                                            echo implode(', ', $categories);
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    No transactions found for the selected criteria.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection