
@section('content')
          @include('layouts.navbar')
          <main class="cart-section">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Detail Pesanan #{{ $checkout->id }}</h4>
        <span class="badge badge-{{ 
            $checkout->status == 'completed' ? 'success' : 
            ($checkout->status == 'paid' ? 'primary' : 
            ($checkout->status == 'cancelled' ? 'danger' : 'secondary')) 
        }} badge-pill px-3 py-2">
            {{ 
                $checkout->status == 'completed' ? 'success' : 
                ($checkout->status == 'paid' ? 'Dibayar' : 
                ($checkout->status == 'cancelled' ? 'Dibatalkan' : 'Menunggu Pembayaran')) 
            }}
        </span>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="row">
                <!-- Order Information -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="font-weight-bold text-muted mb-3">INFORMASI PESANAN</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Tanggal</small></div>
                        <div>{{ $checkout->created_at->format('d M Y H:i') }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Metode Bayar</small></div>
                        <div>{{ $checkout->payment_method == 'qris' ? 'QRIS' : 'Bayar di Kasir' }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Total</small></div>
                        <div class="font-weight-bold">Rp {{ number_format($checkout->total_amount, 0, ',', '.') }}</div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-muted mb-3">INFORMASI PENERIMA</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Nama</small></div>
                        <div>{{ $checkout->nama }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Telepon</small></div>
                        <div>{{ $checkout->no_telpon }}</div>
                    </div>
                    @if($checkout->no_meja)
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><small class="text-muted">Meja</small></div>
                        <div>{{ $checkout->no_meja }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <!-- Order Items -->
            <h6 class="font-weight-bold text-muted mb-3">PRODUK DIPESAN</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0">Produk</th>
                            <th class="border-0">Kategori</th>
                            <th class="border-0 text-right">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkout->getProductsAttribute() as $product)
                            <tr>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->category->nama }}</td>
                                <td class="text-right">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-light">
                            <td colspan="2" class="font-weight-bold text-right">TOTAL</td>
                            <td class="font-weight-bold text-right">Rp {{ number_format($checkout->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Payment Proof -->
            @if($checkout->bukti_bayar)
                <hr class="my-4">
                <h6 class="font-weight-bold text-muted mb-3">BUKTI PEMBAYARAN</h6>
<div class="card-body text-center">
    <img src="{{ asset('storage/' . $checkout->bukti_bayar) }}" alt="Payment Proof" class="img-fluid">
</div>

            @endif

            <div class="mt-4">
                <a href="{{ route('history') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
</div>
          </main>
          @include('layouts.footer')
  <style>
    /* Custom Cart Page Styles */
.cart-section {
  padding: 100px 0 60px;
  background: #f8f9fa;
}</style>