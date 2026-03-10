@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <!-- Hero Section -->
    <div class="jumbotron jumbotron-fluid bg-dark text-white mb-5">
        <div class="container text-center py-5">
            <h1 class="display-4">Welcome to Warkop Santuy</h1>
            <p class="lead">Discover our delicious coffee and snacks selection</p>
        </div>
    </div>

    <div class="container">
        <!-- Main Content -->
        <div class="row mb-5">
            <div class="col-12">
                <!-- Categories Navigation -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <ul class="nav nav-pills card-header-pills flex-nowrap overflow-auto" style="scrollbar-width: none;">
                            <li class="nav-item flex-shrink-0">
                                <a class="nav-link active px-4" href="#all-products" data-toggle="tab">All Products</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="nav-item flex-shrink-0">
                                    <a class="nav-link px-4" href="#category-{{ $category->category_id }}" data-toggle="tab">
                                        {{ $category->nama }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Products Content -->
                    <div class="card-body p-0">
                        <div class="tab-content p-3">
                            <!-- All Products Tab -->
                            <div class="tab-pane fade show active" id="all-products">
                                @if($products->count() > 0)
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                                @include('partials.product_card', ['product' => $product])
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-5">
                                        <i class="fas fa-coffee fa-4x text-muted mb-3"></i>
                                        <h4 class="text-muted">No products available</h4>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Category Tabs -->
                            @foreach($categories as $category)
                                <div class="tab-pane fade" id="category-{{ $category->category_id }}">
                                    @php
                                        $categoryProducts = $products->where('category_id', $category->category_id);
                                    @endphp
                                    
                                    @if($categoryProducts->count() > 0)
                                        <div class="row">
                                            @foreach($categoryProducts as $product)
                                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                                    @include('partials.product_card', ['product' => $product])
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-5">
                                            <i class="fas fa-coffee fa-4x text-muted mb-3"></i>
                                            <h4 class="text-muted">No products in this category</h4>
                                            <p>Check back later for new additions!</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom Styles */
    .jumbotron {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1445116572660-236099ec97a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 0;
    }
    
    .nav-pills .nav-link.active {
        background-color: #6f42c1;
        color: white;
    }
    
    .nav-pills .nav-link {
        color: #495057;
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link:hover {
        transform: translateY(-2px);
    }
    
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .product-img {
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-img {
        transform: scale(1.05);
    }
    
    .price-tag {
        font-weight: bold;
        color: #6f42c1;
        font-size: 1.1rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .nav-pills {
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: none;
        }
        
        .nav-pills::-webkit-scrollbar {
            display: none;
        }
        
        .jumbotron {
            padding: 2rem 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Smooth scroll for category tabs on mobile
    document.querySelectorAll('.nav-pills .nav-link').forEach(link => {
        link.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('href'));
            if (window.innerWidth < 768) {
                window.scrollTo({
                    top: target.offsetTop - 20,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
@endpush