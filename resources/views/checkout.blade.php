
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

    /* Tampilkan dropdown saat hover */
    .navbar-nav .user-hover-dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }

    /* Smooth effect */
    .dropdown-menu {
      display: none;
      transition: all 0.3s ease-in-out;
    }

    /* Styling tambahan */
    .navbar .dropdown-menu {
      min-width: 150px;
      font-size: 0.9rem;
    }

    .navbar .dropdown-menu a.dropdown-item {
      display: flex;
      align-items: center;
    }

    .navbar .dropdown-toggle {
      cursor: pointer;
    }

    .btn.btn-danger.btn-sm {
      padding: 6px 12px;
      font-weight: 500;
      border-radius: 20px;
      color: white;
    }

    .checkout-section {
      padding-top: 100px;
    }

    .checkout-section h2 {
      font-weight: 600;
      margin-bottom: 20px;
      color: #444;
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

    #qris_section .card {
      margin-top: 16px;
    }

    #qris_section img {
      max-width: 200px;
      margin: 0 auto;
      display: block;
    }

    @media (max-width: 768px) {
      .checkout-section {
        padding-top: 80px;
      }
      
      .order-product-row {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .col-md-2.text-center,
      .col-md-2.text-end {
        text-align: left !important;
        margin-top: 8px;
      }
    }
  </style>
</head>

<body class="index-page">

          @include('layouts.navbar')

<main class="cart-section">
    <div class="container checkout-section py-5">
      <div class="row">
        <!-- Order Summary -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-header">
              <h5>Order Summary</h5>
            </div>
            <div class="card-body">
              @foreach($products as $item)
              <div class="row order-product-row">
                <div class="col-md-8 d-flex">
                  <img src="{{ $item['product']->photo ? asset('storage/' . $item['product']->photo) : 'https://via.placeholder.com/60' }}" class="img-thumbnail me-3" width="60" height="60" alt="{{ $item['product']->nama }}">
                  <div>
                    <h6 class="mb-1">{{ $item['product']->nama }}</h6>
                    <small class="text-muted">{{ $item['product']->category->nama }}</small>
                  </div>
                </div>
                <div class="col-md-2 text-center">
                  {{ $item['quantity'] }} x
                </div>
                <div class="col-md-2 text-end">
                  Rp {{ number_format($item['product']->harga * $item['quantity'], 0, ',', '.') }}
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <h5>Total: Rp {{ number_format($total, 0, ',', '.') }}</h5>
            </div>
          </div>
        </div>

        <!-- Customer Info -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h5>Customer Information</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_ids" value="{{ implode(',', $productIds) }}">
                <input type="hidden" name="category_ids" value="{{ implode(',', $categoryIds) }}">

                <div class="form-group">
                  <label for="nama">Name</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', auth()->user()->nama) }}" required>
                  @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                  <label for="no_telpon">Phone Number</label>
                  <input type="text" name="no_telpon" id="no_telpon" class="form-control @error('no_telpon') is-invalid @enderror" value="{{ old('no_telpon') }}" required>
                  @error('no_telpon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                  <label for="no_meja">Table Number (Optional)</label>
                  <input type="number" name="no_meja" id="no_meja" class="form-control @error('no_meja') is-invalid @enderror" value="{{ old('no_meja') }}">
                  @error('no_meja') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                  <label class="mb-2">Payment Method</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="payment_cash" value="cash_at_cashier" {{ old('payment_method') == 'cash_at_cashier' ? 'checked' : '' }}>
                    <label class="form-check-label" for="payment_cash">Cash at Cashier</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="payment_qris" value="qris" {{ old('payment_method') == 'qris' ? 'checked' : '' }}>
                    <label class="form-check-label" for="payment_qris">QRIS</label>
                  </div>
                  @error('payment_method') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div id="qris_section" style="display: none;">
                  <div class="card mb-3">
                    <div class="card-body text-center">
                      <h5 class="card-title">Scan QRIS Code</h5>
                      <img src="https://lanz-store.vercel.app/qris.jpg" alt="QRIS Code" class="img-fluid mb-3">
                      <p class="card-text">Scan the QR code above with your mobile banking or e-wallet app to pay.</p>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="bukti_bayar">Upload Payment Proof</label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control-file @error('bukti_bayar') is-invalid @enderror">
                    @error('bukti_bayar')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Place Order</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

          @include('layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const qrisRadio = document.getElementById('payment_qris');
      const cashRadio = document.getElementById('payment_cash');
      const qrisSection = document.getElementById('qris_section');

      function toggleQRIS() {
        if (qrisRadio.checked) {
          qrisSection.style.display = 'block';
        } else {
          qrisSection.style.display = 'none';
        }
      }

      qrisRadio.addEventListener('change', toggleQRIS);
      cashRadio.addEventListener('change', toggleQRIS);

      // Initial check
      toggleQRIS();
    });
  </script>

</body>

</html>