<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WarkopSantuy</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('iLanding/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('iLanding/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('iLanding/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('iLanding/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('iLanding/assets/css/main.css') }}" rel="stylesheet">

  <style>
    /* Custom Cart Page Styles */
.cart-section {
  padding: 100px 0 60px;
  background: #f8f9fa;
}
    .cart-icon {
      color: #444;
      transition: 0.3s;
      padding: 8px 0;
      display: flex;
      align-items: center;
    }

    .cart-icon:hover {
      color: #2487ce;
    }

    .cart-badge {
      font-size: 0.6rem;
      padding: 3px 6px;
      background-color: #2487ce !important;
    }

    /* Adjust login button spacing */
    .btn-getstarted {
      margin-left: 15px;
    }



    .btn.btn-danger.btn-sm {
      padding: 6px 12px;
      font-weight: 500;
      border-radius: 20px;
      color: white;
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border: none;
      margin-bottom: 24px;
    }

    .card-header {
      background-color: #f8f9fa;
      border-bottom: 1px solid #eaeaea;
      padding: 16px 20px;
      border-radius: 12px 12px 0 0 !important;
    }

    .card-header h5 {
      margin-bottom: 0;
      font-weight: 600;
      color: #444;
    }

    .card-body {
      padding: 20px;
    }

    .card-footer {
      background-color: #f8f9fa;
      border-top: 1px solid #eaeaea;
      padding: 16px 20px;
      border-radius: 0 0 12px 12px !important;
    }

    .card-footer h5 {
      margin: 0;
      font-weight: bold;
      color: #2487ce;
    }

    .img-thumbnail {
      border-radius: 12px;
      max-width: 80px;
      height: auto;
    }

    .order-product-row {
      padding: 12px 0;
      align-items: center;
    }

    .order-product-row:not(:last-child) {
      border-bottom: 1px solid #eaeaea;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      font-weight: 500;
      margin-bottom: 8px;
      color: #555;
    }

    .form-control {
      border-radius: 8px;
      padding: 10px 15px;
      border: 1px solid #ddd;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: #2487ce;
      box-shadow: 0 0 0 0.2rem rgba(36, 135, 206, 0.25);
    }

    .form-check {
      margin-bottom: 8px;
    }

    .form-check-input {
      margin-top: 0.25rem;
    }

    .btn-primary {
      background-color: #2487ce;
      border-color: #2487ce;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: #1e76b5;
      border-color: #1e76b5;
    }


    @media (max-width: 768px) {
      .checkout-section {
        padding-top: 80px;
      }
      
      
      .col-md-2.text-center,
      .col-md-2.text-end {
        text-align: left !important;
        margin-top: 8px;
      }
    }
    .badge {
    padding: 0.25em 0.6em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}

.badge-success { background-color: #28a745; }
.badge-warning { background-color: #ffc107; color: #212529; }
.badge-danger { background-color: #dc3545; }
.badge-secondary { background-color: #6c757d; }
  </style>
</head>

<body class="index-page">

          @include('layouts.navbar')
          <main class="cart-section">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Pesanan</h4>
                </div>
                <div class="card-body">
                    @if($checkouts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Produk</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($checkouts as $checkout)
                                        <tr>
                                            <td>{{ $checkout->created_at->format('d M Y H:i') }}</td>
                                            <td>
@php
    $products = $checkout->getProductsAttribute();
    $productNames = $products->pluck('nama')->take(2)->implode(', ');
    if ($products->count() > 2) {
        $productNames .= ' dan ' . ($products->count() - 2) . ' lainnya';
    }
@endphp

                                                {{ $productNames }}
                                            </td>
                                            <td>Rp {{ number_format($checkout->total_amount, 0, ',', '.') }}</td>
<td>
    <span class="badge badge-{{ 
        $checkout->status == 'completed' ? 'success' : 
        ($checkout->status == 'paid' ? 'warning' : 
        ($checkout->status == 'cancelled' ? 'danger' : 'secondary')) 
    }}">
        {{ 
            $checkout->status == 'completed' ? 'Sukses' : 
            ($checkout->status == 'paid' ? 'Dibayar' : 
            ($checkout->status == 'cancelled' ? 'Dibatalkan' : 'Menunggu Pembayaran')) 
        }}
    </span>
</td>
                                            <td>
                                               <td>
    <a href="{{ route('history.show', $checkout->checkout_id) }}" class="btn btn-sm btn-info">
        <i class="fa fa-eye"></i> Detail
    </a>
</td>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <h3>Anda belum memiliki riwayat pesanan.</h3>
                            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Mulai Belanja</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

                                                </main>
          @include('layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('iLanding/assets/js/main.js') }}"></script>

</body>

</html>