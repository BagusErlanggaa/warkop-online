@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <p class="text-muted">Welcome to Warkop Santuy Management Dashboard</p>
        </div>
    </div>

    <!-- Stats Cards Section -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Sales</h6>
                        <h3 class="mb-0">Rp {{ number_format(\App\Transaction::where('payment_status', 'success')->sum('amount_paid'), 0, ',', '.') }}</h3>
                    </div>
                    <i class="fas fa-money-bill-wave fa-2x"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Products</h6>
                        <h3 class="mb-0">{{ \App\Product::count() }}</h3>
                    </div>
                    <i class="fas fa-coffee fa-2x"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Categories</h6>
                        <h3 class="mb-0">{{ \App\Category::count() }}</h3>
                    </div>
                    <i class="fas fa-tags fa-2x"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Pending Orders</h6>
                        <h3 class="mb-0">{{ \App\Checkout::where('status', 'pending')->count() }}</h3>
                    </div>
                    <i class="fas fa-clock fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('product.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus mr-2"></i> Add New Product
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('categories.create') }}" class="btn btn-success btn-block">
                                <i class="fas fa-folder-plus mr-2"></i> Add New Category
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('transactions.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-list mr-2"></i> View Transactions
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('transactions.report') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-chart-bar mr-2"></i> View Reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Monthly Sales Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row Section -->
    <div class="row">
        <!-- Recent Transactions Column -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Recent Transactions</h5>
                    <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $recentTransactions = \App\Transaction::with('checkout')->orderBy('created_at', 'desc')->take(5)->get();
                                @endphp
                                @forelse($recentTransactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_code }}</td>
                                        <td>{{ $transaction->checkout->nama }}</td>
                                        <td>Rp {{ number_format($transaction->amount_paid, 0, ',', '.') }}</td>
                                        <td>
                                            @if($transaction->payment_status == 'success')
                                                <span class="badge badge-success">Success</span>
                                            @elseif($transaction->payment_status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No transactions found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Products Column -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Popular Products</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @php $popularProducts = \App\Product::take(5)->get(); @endphp
                    @if($popularProducts->count() > 0)
                        <ul class="list-group">
                            @foreach($popularProducts as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://via.placeholder.com/40' }}" 
                                             class="img-thumbnail mr-3" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0">{{ $product->nama }}</h6>
                                            <small class="text-muted">{{ $product->category->nama }}</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-primary badge-pill">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">No products found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: @json($monthlySales),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endsection