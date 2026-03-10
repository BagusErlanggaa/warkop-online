<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WarkopSantuy - Login</title>
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

  <!-- Main CSS File -->
  <link href="{{ asset ('iLanding/assets/css/main.css') }}" rel="stylesheet">

  <style>
    /* Custom Styles */
    .login-section {
      padding: 120px 0 80px;
      background: #f8f9fa;
      min-height: 100vh;
    }
    
    .login-card {
      border-radius: 10px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
      border: none;
      overflow: hidden;
    }
    
    .login-card .card-header {
      background-color: #2487ce;
      color: white;
      font-weight: 600;
      font-size: 1.2rem;
      padding: 15px 20px;
      text-align: center;
    }
    
    .login-card .card-body {
      padding: 30px;
    }
    
    .login-btn {
      background-color: #2487ce;
      border: none;
      padding: 8px 25px;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s;
    }
    
    .login-btn:hover {
      background-color: #1a6ca6;
      transform: translateY(-2px);
    }
    
    .form-control:focus {
      border-color: #2487ce;
      box-shadow: 0 0 0 0.25rem rgba(36, 135, 206, 0.25);
    }
    
    .forgot-link {
      color: #6c757d;
      text-decoration: none;
    }
    
    .forgot-link:hover {
      color: #2487ce;
      text-decoration: underline;
    }
    
    .register-link {
      color: #2487ce;
      font-weight: 500;
      text-decoration: none;
      display: inline-block;
      margin-top: 1rem;
      padding: 8px 20px;
      border: 1px solid #2487ce;
      border-radius: 4px;
      transition: all 0.3s;
    }
    
    .register-link:hover {
      background-color: #2487ce;
      color: white;
      text-decoration: none;
      transform: translateY(-2px);
    }
    
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .register-container {
      text-align: center;
      margin-top: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid #eee;
    }
    
    .register-text {
      margin-bottom: 1rem;
      color: #6c757d;
    }
    
    @media (max-width: 768px) {
      .login-section {
        padding: 100px 0 60px;
      }
      
      .login-card .card-body {
        padding: 20px;
      }
    }
  </style>
</head>

<body class="index-page">
  <main class="login-section">
    @include('layouts.navbar')
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card login-card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                         name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                         name="password" required autocomplete="current-password">
                  
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                  <button type="submit" class="btn btn-primary login-btn">
                    {{ __('Login') }}
                  </button>
                  
                  @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Password?') }}
                    </a>
                  @endif
                </div>
              </form>
              
              <div class="register-container">
                <p class="register-text">Don't have an account yet?</p>
                @if (Route::has('auth.register'))
                  <a class="register-link" href="{{ route('auth.register') }}">
                    {{ __('Create New Account') }}
                  </a>
                @endif
              </div>
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
  <script src="{{ asset ('iLanding/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset ('iLanding/assets/js/main.js') }}"></script>
</body>
</html>