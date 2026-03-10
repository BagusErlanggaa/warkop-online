<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WarkopSantuy - Register</title>
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
    /* Custom Styles */
    .register-section {
      padding: 120px 0 80px;
      background: #f8f9fa;
      min-height: 100vh;
    }
    
    .register-card {
      border-radius: 10px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
      border: none;
      overflow: hidden;
      max-width: 700px;
      margin: 0 auto;
    }
    
    .register-card .card-header {
      background-color: #2487ce;
      color: white;
      font-weight: 600;
      font-size: 1.2rem;
      padding: 15px 20px;
      text-align: center;
    }
    
    .register-card .card-body {
      padding: 30px;
    }
    
    .register-btn {
      background-color: #2487ce;
      border: none;
      padding: 8px 30px;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s;
      width: 100%;
      margin-top: 10px;
    }
    
    .register-btn:hover {
      background-color: #1a6ca6;
      transform: translateY(-2px);
    }
    
    .form-control:focus {
      border-color: #2487ce;
      box-shadow: 0 0 0 0.25rem rgba(36, 135, 206, 0.25);
    }
    
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: #495057;
    }
    
    .login-link {
      color: #2487ce;
      font-weight: 500;
      text-decoration: none;
      display: block;
      text-align: center;
      margin-top: 1.5rem;
    }
    
    .login-link:hover {
      text-decoration: underline;
    }
    
    @media (max-width: 768px) {
      .register-section {
        padding: 100px 0 60px;
      }
      
      .register-card .card-body {
        padding: 20px;
      }
    }
  </style>
</head>

<body class="index-page">
  <main class="register-section">
    @include('layouts.navbar')
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card register-card">
            <div class="card-header">{{ __('Create Your Account') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name" class="form-label">{{ __('Full Name') }}</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                             name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="email" class="form-label">{{ __('Email Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                             name="email" value="{{ old('email') }}" required autocomplete="email">
                      
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password" class="form-label">{{ __('Password') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                             name="password" required autocomplete="new-password">
                      
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                      <input id="password-confirm" type="password" class="form-control" 
                             name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                </div>

                <div class="form-group mb-0">
                  <button type="submit" class="btn btn-primary register-btn">
                    {{ __('Register') }}
                  </button>
                  
                  @if (Route::has('login'))
                    <a class="login-link" href="{{ route('login') }}">
                      {{ __('Already have an account? Login here') }}
                    </a>
                  @endif
                </div>
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

  <!-- Vendor JS Files -->
  <script src="{{ asset('iLanding/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('iLanding/assets/js/main.js') }}"></script>
</body>
</html>