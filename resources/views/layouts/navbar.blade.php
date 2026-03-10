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
  <link href="{{ asset ('iLanding/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('iLanding/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('iLanding/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('iLanding/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('iLanding/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CS{{ asset ('') }}S File -->
  <link href="{{ asset ('iLanding/assets/css/main.css') }}" rel="stylesheet">

</head>
<style>

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


</style>
<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
      <h1 class="sitename">Warkop Santuy</h1>
    </a>

     <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/#about">About</a></li>
      <li><a href="/#menu">Menu</a></li>
      <li><a href="/history">History</a></li>
      <li><a href="/#faq">Faq</a></li>

      @auth
                            @if(auth()->user()->is_admin)
                                <!-- Menu untuk admin -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="masterDataDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Master Data
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="masterDataDropdown">
                                        <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a></li>
                                        <li><a class="dropdown-item" href="{{ route('product.index') }}">Products</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('transactions.report') }}">Reports</a>
                                </li>
                            @else
                                <!-- Menu untuk user biasa -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('history') }}">History</a>
                                </li>
                            @endif
                        @endauth
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>

  <!-- KERANJANG DAN LOGIN/LOGOUT -->
  <div class="d-flex align-items-center">
    <a class="cart-icon me-3 position-relative" href="{{ route('cart.index') }}">
      <i class="bi bi-cart3 fs-5"></i>
      @if(session()->has('cart') && count(session()->get('cart')) > 0)
        <span class="cart-badge badge bg-primary">{{ count(session()->get('cart')) }}</span>
      @endif
    </a>
<ul class="navbar-nav ml-auto">
    @guest
        <li class="nav-item">
            <a class="btn btn-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @else
        <li class="nav-item d-flex align-items-center">
            <a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-1"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
</ul>
</ul>
</ul>
    </div>
  </div>
</header>
            <div class="content">
              <div class="container-fluid">
                @yield('content')
              </div>
            </div>
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

  <!-- Vendor JS Files -->
  <script src="{{ asset ('iLanding/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS {{ asset ('') }}File -->
  <script src="{{ asset ('iLanding/assets/js/main.js') }}"></script>

</body>

</html>