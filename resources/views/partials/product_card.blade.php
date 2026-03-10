<!-- resources/views/partials/product_card.blade.php -->
<div class="product-card">
  <div class="product-card-img-container">
    @if($product->photo)
      <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top product-img" alt="{{ $product->nama }}">
    @else
      <div class="d-flex align-items-center justify-content-center bg-light" style="height:100%">
        <i class="bi bi-cup-hot fs-1 text-muted"></i>
      </div>
    @endif
    @if($product->is_new)
      <span class="product-card-badge">NEW</span>
    @endif
  </div>
  
  <div class="product-card-body">
    <h3 class="product-card-title">{{ $product->nama }}</h3>
    
    <div class="product-card-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
    <p class="product-card-desc">{{ Str::limit($product->deskripsi, 100) }}</p>
    
    <div class="product-card-actions">
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <button type="submit" class="btn-add-to-cart">
          <i class="bi bi-cart-plus"></i> Add to Cart
        </button>
      </form>
    </div>
  </div>
</div>