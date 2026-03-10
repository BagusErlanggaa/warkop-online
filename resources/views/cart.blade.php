
<style>
    /* Cart Icon Styling to match iLanding template */
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

/* Custom Cart Page Styles */
.cart-section {
  padding: 100px 0 60px;
  background: #f8f9fa;
}

.cart-card {
  border: none;
  border-radius: 15px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
}

.cart-header {
  background: #fff;
  border-bottom: 1px solid #e9ecef;
  padding: 1.5rem 2rem;
}

.cart-header h2 {
  margin: 0;
  font-weight: 700;
  color: #2a2a2a;
}

.cart-item {
  padding: 1.5rem 2rem;
  border-bottom: 1px solid #e9ecef;
  transition: 0.3s;
}

.cart-item:hover {
  background-color: rgba(36, 135, 206, 0.03);
}

.product-img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 10px;
}

.quantity-input {
  width: 70px;
  text-align: center;
  border-color: #dee2e6;
}

.btn-update {
  border-radius: 8px;
  padding: 0.375rem 0.75rem;
}

.btn-delete {
  color: #dc3545;
  padding: 0.375rem 0.75rem;
}

.btn-delete:hover {
  color: #bb2d3b;
}

.cart-footer {
  background: #fff;
  padding: 1.5rem 2rem;
  border-top: 1px solid #e9ecef;
}

.total-price {
  font-size: 1.25rem;
  color: #2487ce;
  font-weight: 600;
}

.btn-checkout {
  padding: 0.75rem 2rem;
  border-radius: 50px;
  font-weight: 500;
}

.empty-cart {
  padding: 4rem 2rem;
  text-align: center;
}

.empty-cart-icon {
  font-size: 4rem;
  color: #ced4da;
  margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
  .cart-section {
    padding: 80px 0 40px;
  }
  
  .cart-item {
    padding: 1rem;
  }
  
  .product-img {
    width: 70px;
    height: 70px;
  }
}
</style>
<body class="index-page">
          @include('layouts.navbar')

<main class="cart-section">
  <div class="container" data-aos="fade-up">
    <div class="cart-card">
      <div class="cart-header">
        <h2>Keranjang Belanja</h2>
      </div>
      
      @if(count($products) > 0)
        <div class="card-body">
          @foreach($products as $item)
            <div class="cart-item">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="d-flex align-items-center">
                    @if($item['product']->photo)
                      <img src="{{ asset('storage/' . $item['product']->photo) }}" 
                           class="product-img me-3" 
                           alt="{{ $item['product']->nama }}">
                    @else
                      <img src="https://via.placeholder.com/100" 
                           class="product-img me-3" 
                           alt="Placeholder">
                    @endif
                    <div>
                      <h5 class="mb-1">{{ $item['product']->nama }}</h5>
                      <p class="text-muted mb-0">{{ $item['product']->category->nama }}</p>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-2 text-center">
                  <span class="d-block">Rp {{ number_format($item['product']->harga, 0, ',', '.') }}</span>
                </div>
                
                <div class="col-md-2">
                  <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item['product']->product_id }}">
                    <div class="input-group">
                      <input type="number" 
                             name="quantity" 
                             value="{{ $item['quantity'] }}" 
                             min="1" 
                             class="form-control quantity-input">
                      <button type="submit" class="btn btn-outline-secondary btn-update">
                        <i class="bi bi-arrow-clockwise"></i>
                      </button>
                    </div>
                  </form>
                </div>
                
                <div class="col-md-2 text-end">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="me-3">Rp {{ number_format($item['product']->harga * $item['quantity'], 0, ',', '.') }}</span>
                    <form action="{{ route('cart.remove') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $item['product']->product_id }}">
                      <button type="submit" class="btn btn-link btn-delete">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="cart-footer">
          <div class="row align-items-center">
            <div class="col-md-8">
              <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                  <i class="bi bi-trash me-2"></i>Kosongkan Keranjang
                </button>
              </form>
            </div>
            <div class="col-md-4 text-end">
              <h4 class="total-price mb-3">Total: Rp {{ number_format($total, 0, ',', '.') }}</h4>
              <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-checkout">
                <i class="bi bi-wallet2 me-2"></i>Checkout
              </a>
            </div>
          </div>
        </div>
      @else
        <div class="text-center py-5">
          <i class="bi bi-cart-x display-4 text-muted mb-4"></i>
          <h3 class="h4 mb-3">Keranjang Belanja Kosong</h3>
          <p class="text-muted mb-4">Mulai jelajahi menu kami dan tambahkan item ke keranjang!</p>
          <a href="{{ route('home') }}" class="btn btn-primary btn-checkout">
            <i class="bi bi-cart3 me-2"></i>Mulai Belanja
          </a>
        </div>
      @endif
    </div>
  </div>
</main>
          @include('layouts.footer')
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Quantity selector functionality
    document.querySelectorAll('.plus-btn').forEach(button => {
      button.addEventListener('click', function() {
        const input = this.parentNode.querySelector('.quantity-input');
        input.value = parseInt(input.value) + 1;
      });
    });
    
    document.querySelectorAll('.minus-btn').forEach(button => {
      button.addEventListener('click', function() {
        const input = this.parentNode.querySelector('.quantity-input');
        if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
        }
      });
    });
  });
</script>