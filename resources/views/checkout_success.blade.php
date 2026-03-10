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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Main CS{{ asset ('') }}S File -->
  <link href="{{ asset ('iLanding/assets/css/main.css') }}" rel="stylesheet">

</head>
<body>
  <div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body text-center">
            <div class="mb-4">
              <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
            </div>
            <h2 class="mb-4">Order Placed Successfully!</h2>
            <p class="lead">Thank you for your order. Your order has been received and is being processed.</p>
            <p>If you chose QRIS payment, your order will be processed once the payment is confirmed.</p>
            <p>If you chose Cash payment, please proceed to the cashier to complete your payment.</p>
            
            <div class="mt-4">
              <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-home mr-2"></i> Return to Home
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
>

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

