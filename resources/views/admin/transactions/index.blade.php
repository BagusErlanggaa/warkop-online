@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Transactions</h2>
        </div>
    </div>
    
    <div class="card">
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
                                <txh>Status</txh>
                                <th>Date</th>
                                <th>Actions</th>
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
                                    <td>
                                        @if($transaction->payment_status == 'success')
                                            <span class="badge badge-success">Success</span>
                                        @elseif($transaction->payment_status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-danger">Failed</span>
                                        @endif
                                    </td>
<td>{{ \Carbon\Carbon::parse($transaction->payment_date)->setTimezone('Asia/Jakarta')->format('d-m-Y H:i:s') }} WIB</td>
                                    <td>
                                        <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    No transactions found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
