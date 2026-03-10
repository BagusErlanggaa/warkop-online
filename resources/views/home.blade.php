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
          @include('layouts.navbar')

  <main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
          <div class="company-badge mb-4">
            <i class="bi bi-cup-hot me-2"></i>
            Warkop Santuy Sejak 2020
          </div>

          <h1 class="mb-4">
            Nongkrong Asik <br>
            Ngopi Nikmat <br>
            <span class="accent-text">Harga Bersahabat</span>
          </h1>

          <p class="mb-4 mb-md-5">
            Temukan kenyamanan dalam setiap tegukan. Warkop kami jadi tempat favorit buat ngobrol, kerja, sampai main bareng teman. Yuk mampir!
          </p>

          <div class="hero-buttons">
            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Lihat Menu</a>
            <a href="https://www.youtube.com/watch?v" class="btn btn-link mt-2 mt-sm-0 glightbox">
              <i class="bi bi-play-circle me-1"></i>
              Lihat Suasana
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{ asset ('iLanding/assets/img/illustration-1.webp') }}" alt="Hero Image" class="img-fluid">

          <div class="customers-badge">
            <div class="customer-avatars">
              <img src="{{ asset ('iLanding/assets/img/avatar-1.webp') }}" alt="Customer 1" class="avatar">
              <img src="{{ asset ('iLanding/assets/img/avatar-2.webp') }}" alt="Customer 2" class="avatar">
              <img src="{{ asset ('iLanding/assets/img/avatar-3.webp') }}" alt="Customer 3" class="avatar">
              <img src="{{ asset ('iLanding/assets/img/avatar-4.webp') }}" alt="Customer 4" class="avatar">
              <img src="{{ asset ('iLanding/assets/img/avatar-5.webp') }}" alt="Customer 5" class="avatar">
              <span class="avatar more">12+</span>
            </div>
            <p class="mb-0 mt-2">12.000+ pelanggan puas telah nongkrong dan ngopi di Warkop Santai</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-trophy"></i>
          </div>
          <div class="stat-content">
            <h4>3x Juara Warkop</h4>
            <p class="mb-0">Warkop Terfavorit</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-cup-straw"></i>
          </div>
          <div class="stat-content">
            <h4>6.5k Gelas Kopi</h4>
            <p class="mb-0">Terjual tiap bulan</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-people"></i>
          </div>
          <div class="stat-content">
            <h4>80k Nongkrongers</h4>
            <p class="mb-0">Bergabung dengan kami</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-award-fill"></i>
          </div>
          <div class="stat-content">
            <h4>6x Penghargaan</h4>
            <p class="mb-0">Dari komunitas lokal</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

<div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
  <span class="about-meta">TENTANG WARKOP KAMI</span>
  <h2 class="about-title">Nikmatnya Ngopi & Nongkrong Santai</h2>
  <p class="about-description">Selamat datang di Warkop Santai! Tempat ngopi, ngobrol, dan menikmati suasana santai bareng teman. Kami menyediakan kopi pilihan, gorengan hangat, dan suasana yang bikin betah berlama-lama.</p>

  <div class="row feature-list-wrapper">
    <div class="col-md-6">
      <ul class="feature-list">
        <li><i class="bi bi-check-circle-fill"></i> Kopi hitam & kopi susu khas</li>
        <li><i class="bi bi-check-circle-fill"></i> Wi-Fi & colokan gratis</li>
        <li><i class="bi bi-check-circle-fill"></i> Mie instan + topping mantap</li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class="feature-list">
        <li><i class="bi bi-check-circle-fill"></i> Tempat nongkrong nyaman</li>
        <li><i class="bi bi-check-circle-fill"></i> Live music & nobar bola</li>
        <li><i class="bi bi-check-circle-fill"></i> Harga ramah di kantong</li>
      </ul>
    </div>
  </div>

  <div class="info-wrapper">
    <div class="row gy-4">
      <div class="col-lg-5">
        <div class="profile d-flex align-items-center gap-3">
          <img src="{{ asset ('iLanding/assets/img/avatar-1.webp') }}" alt="Owner Warkop" class="profile-image">
          <div>
            <h4 class="profile-name">Bang Lanz</h4>
            <p class="profile-position">Pemilik Warkop</p>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="contact-info d-flex align-items-center gap-2">
          <i class="bi bi-telephone-fill"></i>
          <div>
            <p class="contact-label">Hubungi kami</p>
            <p class="contact-number">+62 858-9449-3680</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">

              <div class="experience-badge floating">
                <h3>15+ <span>Tahun</span></h3>
                <p>Pengalaman dalam layanan bisnis</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->
<section id="menu" class="menu section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Menu</h2>
    <p class="lead">Discover our delicious selection of food and beverages</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- Products Content -->
    <div class="tab-content">
      <!-- All Products Tab -->
      <div class="tab-pane fade show active" id="all-products">
        @if($products->count() > 0)
          <div class="row g-4">
            @foreach($products as $product)
              <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                @include('partials.product_card', ['product' => $product])
              </div>
            @endforeach
          </div>
        @else
          <div class="text-center py-5" data-aos="fade-up">
            <i class="bi bi-cup-hot fs-1 text-muted mb-3"></i>
            <h4 class="text-muted">Menu coming soon</h4>
            <p>We're preparing something delicious for you!</p>
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
            <div class="row g-4">
              @foreach($categoryProducts as $product)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                  @include('partials.product_card', ['product' => $product])
                </div>
              @endforeach
            </div>
          @else
            <div class="text-center py-5" data-aos="fade-up">
              <i class="bi bi-cup-hot fs-1 text-muted mb-3"></i>
              <h4 class="text-muted">No items in this category yet</h4>
              <p>We're adding more options soon!</p>
            </div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section><!-- /Menu Section -->

<style>
  /* Modern Card Styles */
  .product-card {
    background: #fff;
    border-radius: 12px;
    padding: 0;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    height: 100%;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.03);
    display: flex;
    flex-direction: column;
  }
  
  .product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
  }
  
  .product-card-img-container {
    height: 220px;
    overflow: hidden;
    position: relative;
  }
  
  .product-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  
  .product-card:hover img {
    transform: scale(1.05);
  }
  
  .product-card-body {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }
  
  .product-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #2a2a2a;
  }
  
  .product-card-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2487ce;
    margin-bottom: 12px;
  }
  
  .product-card-desc {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 16px;
    flex-grow: 1;
  }
  
  .product-card-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #2487ce;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  
  .product-card-actions {
    margin-top: auto;
  }
  
  .btn-add-to-cart {
    background: #2487ce;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    width: 100%;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .btn-add-to-cart:hover {
    background: #1a6ca8;
    transform: translateY(-2px);
  }
  
  .btn-add-to-cart i {
    margin-right: 8px;
  }
  
  
  /* Empty State */
  .text-center.py-5 i {
    color: #2487ce;
    opacity: 0.2;
  }
</style>

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="13918" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pelanggan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="290780" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pesanan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
              <p>Lokasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="117" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pelayan</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->


    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Punya pertanyaan seputar Warkop kami?</h2>
            <p class="faq-description">Berikut beberapa pertanyaan yang sering ditanyakan oleh pelanggan kami tentang menu, jam buka, dan layanan di Warkop kami.</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Warkop buka jam berapa?</h3>
                <div class="faq-content">
                  <p>Kami buka setiap hari dari jam 07.00 pagi hingga 23.00 malam.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apakah tersedia Wi-Fi gratis?</h3>
                <div class="faq-content">
                  <p>Ya, semua pelanggan bisa menggunakan Wi-Fi gratis tanpa batasan waktu.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            <div class="faq-item">
              <h3>Bisa pesan kopi untuk dibawa pulang?</h3>
                <div class="faq-content">
                 <p>Tentu saja! Kami menyediakan layanan take-away untuk semua menu kami.</p>
                </div>
             <i class="faq-toggle bi bi-chevron-right"></i>
            </div>

              
            <div class="faq-item">
            <h3>Apa kopi yang paling direkomendasikan?</h3>
            <div class="faq-content">
                <p>Kopi Tubruk dan Kopi Susu Gula Aren adalah favorit pelanggan kami!</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
            </div>

            <div class="faq-item">
            <h3>Ada makanan ringan juga?</h3>
            <div class="faq-content">
                <p>Ya, tersedia gorengan, roti bakar, mie instan, dan cemilan khas warung kopi lainnya.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
            </div>

            <div class="faq-item">
            <h3>Bisa bayar pakai e-wallet?</h3>
            <div class="faq-content">
                <p>Bisa! Kami menerima pembayaran via Dana, OVO, GoPay, dan QRIS.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
            </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->

  </main>

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