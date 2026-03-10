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
<body class="index-page"></body>
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="/" class="logo d-flex align-items-center">
            <span class="sitename">Warkop Santuy</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Andara</p>
            <p>Depok, Jawa Barat 16436</p>
            <p class="mt-3"><strong>Telepon:</strong> <span>+62 858 9449 3680</span></p>
            <p><strong>Email:</strong> <span>lanzzzstore.20@gmail.com</span></p>

          </div>
          <div class="social-links d-flex mt-4">
          <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter-x"></i></a>
         <a href="https://facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/lanzzz.2o" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://linkedin.com/baguserlangga" target="_blank"><i class="bi bi-linkedin"></i></a>

          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">faq</a></li>
          </ul>
        </div>

      </div>
    </div>


  </footer>

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