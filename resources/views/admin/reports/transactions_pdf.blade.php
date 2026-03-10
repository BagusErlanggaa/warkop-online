<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .summary {
            margin-top: 20px;
            text-align: right;
        }
        .filters {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Warkop Santuy - Transaction Report</h1>
        <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>
    </div>
    
    <div class="filters">
        <p><strong>Period:</strong> {{ date('d M Y', strtotime($startDate)) }} - {{ date('d M Y', strtotime($endDate)) }}</p>
        
        @if($categoryName)
            <p><strong>Category Filter:</strong> {{ $categoryName }}</p>
        @endif
        
        @if($search)
            <p><strong>Search Term:</strong> {{ $search }}</p>
        @endif
    </div>
    
    <table>
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
            @if($transactions->count() > 0)
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_code }}</td>
                        <td>{{ $transaction->checkout->nama }}</td>
                        <td>Rp {{ number_format($transaction->amount_paid, 0, ',', '.') }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ date('d M Y', strtotime($transaction->payment_date)) }}</td>
                        <td>
                            @php
                                $categoryIds = explode(',', $transaction->checkout->category_id);
                                $categories = App\Category::whereIn('category_id', $categoryIds)->pluck('nama')->toArray();
                                echo implode(', ', $categories);
                            @endphp
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center;">No transactions found for the selected criteria.</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <div class="summary">
        <p><strong>Total Transactions:</strong> {{ $totalTransactions }}</p>
        <p><strong>Total Revenue:</strong> Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
    </div>
</body>
</html>