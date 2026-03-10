@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Transaction Details</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Transactions
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Transaction Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="40%">Transaction ID:</th>
                            <td>{{ $transaction->transaction_code }}</td>
                        </tr>
                        <tr>
                            <th>Payment Date:</th>
                            <td>{{ $transaction->payment_date }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method:</th>
                            <td>
                                @if($transaction->payment_method == 'qris')
                                    <span class="badge badge-info">QRIS</span>
                                @else
                                    <span class="badge badge-secondary">Cash at Cashier</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Payment Status:</th>
                            <td>
                                @if($transaction->payment_status == 'success')
                                    <span class="badge badge-success">Success</span>
                                @elseif($transaction->payment_status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-danger">Failed</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Order Status:</th>
                            <td>
                                @if($transaction->checkout->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($transaction->checkout->status == 'paid')
                                    <span class="badge badge-info">Paid</span>
                                @elseif($transaction->checkout->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @else
                                    <span class="badge badge-danger">Cancelled</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Total Amount:</th>
                            <td>Rp {{ number_format($transaction->amount_paid, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                    
                    @if($transaction->payment_status == 'pending')
                        <form action="{{ route('transactions.updateStatus', $transaction) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="payment_status">Update Payment Status</label>
                                <select name="payment_status" id="payment_status" class="form-control">
                                    <option value="pending" {{ $transaction->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="success">Success</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    @endif
                    
                    @if($transaction->checkout->status == 'paid')
                        <form action="{{ route('transactions.complete', $transaction) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-success">Mark as Completed</button>
                        </form>
                    @endif
                </div>
            </div>
            
            @if($transaction->payment_method == 'qris' && $transaction->checkout->bukti_bayar)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Payment Proof</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $transaction->checkout->bukti_bayar) }}" alt="Payment Proof" class="img-fluid">
                    </div>
                </div>
            @endif
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Customer Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="40%">Name:</th>
                            <td>{{ $transaction->checkout->nama }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number:</th>
                            <td>{{ $transaction->checkout->no_telpon }}</td>
                        </tr>
                        @if($transaction->checkout->no_meja)
                            <tr>
                                <th>Table Number:</th>
                                <td>{{ $transaction->checkout->no_meja }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Order Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->checkout->products as $product)
                                    <tr>
                                        <td>{{ $product->nama }}</td>
                                        <td>{{ $product->category->nama }}</td>
                                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total:</th>
                                    <th>Rp {{ number_format($transaction->amount_paid, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
