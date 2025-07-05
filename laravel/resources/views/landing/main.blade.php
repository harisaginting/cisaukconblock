<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $appname ?? 'Cisauk Conblock' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta property="og:title" content={{ $appname ?? 'Law Family Consulting' }}>
    <meta property="og:site_name" content=Law Family Consultingily Consulting>
    <meta property="og:url" content=https://cisaukconblock.com />
    <meta property="og:description" content=Spesialis Perkara Hukum Keluarga>
    <meta property="og:type" content=business.business>
    <meta property="og:image" content={{ url('public') . '/logo/logo.png' }}>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public') }}/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public') }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public') }}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('public') }}/favicon/manifest.json">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Roboto|Montserrat">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4PZ8H5F0FH"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-4PZ8H5F0FH');
    </script>

    <!-- Vendor CSS Files -->
    <link href="{{ url('public') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    {{-- image --}}
    <style>
        :root {
            --img-main-bg: url('{{ url('public') }}/img/main-bg.png');
            --img-cta-bg: url('{{ url('public') }}/img/cta-bg.jpeg');
        }
    </style>
    <!-- Template Main CSS File -->
    <link href="{{ url('public') }}/assets/css/style.css" rel="stylesheet">
    <style>
        .media-thumbnail {
          display: block;
          cursor: pointer;
          border-radius: 10px;
          overflow: hidden;
          transition: transform 0.2s;
        }
    
        .media-thumbnail:hover {
          transform: scale(1.02);
        }
    
        .media-thumbnail img,
        .media-thumbnail video {
            min-height: 250px !important;
            max-height: 420px !important;
            width: 100%;
            max-width: 100%;
            height: auto;
        }

        .modal-content{
            max-height: 100% !important;
        }
      </style>

    <!-- =======================================================
  * Template Name: Gp
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">
            <h1 class="logo me-auto me-lg-0"><a href="{{ url('public') }}">C<span>C</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ url('public') }}/logo/logo.png"
                    alt="" class="img-fluid"></a> --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#services">Produk dan Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    {{-- @if (!empty($articles) && count($articles) > 0)
                        <li><a class="nav-link scrollto" href="#article">Artikel</a></li>
                    @endif --}}
                    <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a target="_blank"
                href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp'] ?? '628551906091' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"
                class="get-started-btn scrollto">Konsultasi</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center">
        <div class="container pt-0" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-10 col-lg-10 pt-5">
                    <div id="hero-con-content" class="mt-lg-5 pt-lg-5 pt-5 pb-5">
                        {{-- <img src="{{ url('public') }}/logo/logo-text.png" class="img-fluid hero-logo pt-1"
                            alt=""> --}}
                        <h1 class="mt-5 pt-3 pt-lg-5">CISAUK <span>CONBLOCK</span></h1>
                        <h2 style="pt-lg-5 pt-0">Kokoh Dalam Setiap Cetakan</h2>
                    </div>
                </div>
            </div>

            {{-- <div class="row gy-4 mt-2 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-10 col-lg-10">
          <blockquote class="blockquote">
            <h3>
              Perceraian, Sengketa Waris, Harta Gono Gini, Hak Asuh Anak, Perjanjian Perkawinan, KDRT dan Lainnya.
            </h3>
          </blockquote>
        </div>
      </div> --}}
            <div class="hero-bottom w-100 justify-content-center">
                <h2>Spesialis Beton Precast</h2>
                <h3 class="pb-2">
                    Hadir sebagai mitra konstruksi Anda.
                </h3>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Produk dan Layanan Kami</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/paving.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">Paving Block</a></h4>
                            <p>Bata beton precast berbagai bentuk dan warna, disusun di atas permukaan yang telah dipadatkan, biasanya tanpa menggunakan semen sebagai perekat, melainkan mengandalkan kekuncian antarblok dan gaya beratnya sendiri.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/u-ditch.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">U-Ditch</a></h4>
                            <p>Beton precast berbentuk huruf "U", digunakan sebagai saluran drainase terbuka untuk mengalirkan air hujan, limbah, atau air kotor. Biasanya digunakan di pinggir jalan, kawasan industri, perumahan, dan area komersial.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/kastin.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">Kanstin (Curb Stone)</a></h4>
                            <p>Beton precast yang digunakan sebagai pembatas antara badan jalan dan area lainnya, seperti trotoar, taman, atau saluran drainase.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/bata-beton.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">Bata Beton (Concrete Brick)</a></h4>
                            <p>Material bangunan berbentuk balok yang dibuat dari campuran semen, pasir, kerikil halus, dan air, kemudian dicetak dan dikeringkan. Fungsinya mirip dengan bata merah, namun memiliki kekuatan dan ukuran yang lebih presisi dan seragam.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/dinding-precast.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">Panel Dinding Pracetak</a></h4>
                            <p>Elemen beton yang dibuat di pabrik (precast), lalu dipasang di lokasi proyek sebagai bagian dinding bangunan, baik struktural maupun non-struktural. Panel ini dibuat dalam bentuk lembaran lebar dan panjang, sehingga pemasangannya cepat, rapi, dan efisien.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="mb-2">
                                <img src="{{ url('public') }}/img/bata-taman.png" class="img-fluid img-team" alt="Hifni Muzakki S.H">
                            </div>
                            <h4><a href="">Macam-macam paving</a></h4>
                            <p>Material bangunan dengan macam-macam bentuk sesuai kebutuhan pembangunan.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container py-5">
                {{-- GALERRY --}}
                <div class="section-title">
                    <h2>Pemasangan</h2>
                </div>

                <div class="row g-4">
              
                  <!-- Gambar 1 -->
                  <div class="col-md-4">
                    <div class="media-thumbnail" data-bs-toggle="modal" data-bs-target="#modalImage1">
                      <img src="{{ url('public') }}/img/asset-28.png" alt="asset-28.png">
                    </div>
                  </div>
              
                  <!-- Video 1 -->
                  <div class="col-md-4">
                    <div class="media-thumbnail" data-bs-toggle="modal" data-bs-target="#modalVideo1">
                        <img src="{{ url('public') }}/img/asset-34.png" alt="asset-34.png">
                    </div>
                  </div>
              
                  <!-- Gambar 2 -->
                  <div class="col-md-4">
                    <div class="media-thumbnail img-fluid img-team" data-bs-toggle="modal" data-bs-target="#modalImage2">
                        <img src="{{ url('public') }}/img/asset-32.png" alt="asset-32.png">
                    </div>
                  </div>
              
                </div>
              </div>
              
              <!-- Modal Gambar 1 -->
              <div class="modal fade" id="modalImage1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content bg-dark">
                    <div class="modal-body p-0">
                        <video src="{{ url('public') }}/img/asset-28.mp4" controls autoplay style="width: 100%;"></video>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Modal Video 1 -->
              <div class="modal fade" id="modalVideo1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content bg-dark">
                    <div class="modal-body p-0">
                      <video src="{{ url('public') }}/img/asset-34.mp4" controls autoplay style="width: 100%;"></video>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Modal Gambar 2 -->
              <div class="modal fade" id="modalImage2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content bg-dark">
                    <div class="modal-body p-0">
                        <video src="{{ url('public') }}/img/asset-32.mp4" controls autoplay style="width: 100%;"></video>
                    </div>
                  </div>
                </div>
              </div>
        </section><!-- End Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="section-title">
                        <h2>Tentang Kami</h2>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ url('public') }}/img/aggrement.png" class="img-fluid w-100" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <p class="fst-italic">
                            Kami adalah perusahaan yang bergerak di bidang produksi beton pracetak (precast concrete) untuk berbagai kebutuhan konstruksi, mulai dari infrastruktur, perumahan, kawasan industri, hingga fasilitas publik.
                        </p>
                        <p>
                            Dengan didukung oleh tim profesional, teknologi produksi modern, dan komitmen terhadap mutu, kami menghadirkan solusi beton pracetak yang kuat, presisi, dan efisien.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Menyediakan produk beton pracetak berkualitas tinggi sesuai standar teknis</li>
                            <li><i class="ri-check-double-line"></i> Memberikan pelayanan terbaik dan solusi konstruksi tepat guna</li>
                            <li><i class="ri-check-double-line"></i> Terus berinovasi dalam desain dan sistem produksi</li>
                            <li><i class="ri-check-double-line"></i> Menjalin kemitraan jangka panjang yang saling menguntungkan</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


         <!-- ======= Why us Section ======= -->
         <section id="whyus" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 pt-2 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>Kenapa Harus Memilih Kami?</h3>
                        <p class="pb-2">
                            Kenapa harus pilih kami? Karena kami paham bahwa proyek Anda butuh solusi cepat, kuat, dan hemat biaya. Produk precast kami dibuat dengan cetakan presisi, mutu beton terjamin, dan pengiriman tepat waktu. Tidak hanya kuat, tapi juga rapi dan mudah dipasang. Kami siap jadi mitra andalan pembangunan Anda!
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Kualitas produk beton pracetak terjamin dengan mutu K-250 hingga K-450</li>
                            <li><i class="ri-check-double-line"></i> Presisi tinggi, pemasangan cepat, dan hemat biaya proyek</li>
                            <li><i class="ri-check-double-line"></i> Tim profesional berpengalaman di bidang konstruksi & precast</li>
                            <li><i class="ri-check-double-line"></i> Melayani desain dan produksi custom sesuai kebutuhan proyek</li>
                            <li><i class="ri-check-double-line"></i> Harga kompetitif dan transparan tanpa biaya tersembunyi</li>
                            <li><i class="ri-check-double-line"></i> Pengiriman tepat waktu, mendukung kelancaran proyek</li>
                            <li><i class="ri-check-double-line"></i> Ramah lingkungan dan mendukung pembangunan berkelanjutan</li>
                          </ul>                          
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <a class="cta-btn" target="_blank"
                        href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp'] ?? '628551906091' }}&text=Halo+Saya+ingin+konsultasi&type=phone_number&app_absent=0">
                        <h4><i class="bi bi-whatsapp"></i> KONSULTASIKAN DENGAN KAMI</h4> 
                    </a>
                </div>

            </div>
        </section><!-- End Cta Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="footer-info">
                            <h2>CV. <span class="text-white">CISAUK CONBLOCK</span></h2>
                            <p class="text-warning"> 
Jl. Cibadak                     Rt.016 No.08 Des.Suradita Kec.Cisauk Kab.Tangerang - Banten
                            </p><br>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <iframe style="border:0; width: 100%; height: 270px; border-radius: 10px;"
                            src="https://www.google.com/maps?q={{ isset($settings['address_lat']) ? $settings['address_lat'] : '0' }},{{ isset($settings['address_lng']) ? $settings['address_lng'] : '0' }}&z=15&output=embed"
                            frameborder="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $appname ?? 'Cisauk Conblock' }}</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a target="_blank"
        href="https://api.whatsapp.com/send/?phone={{ isset($settings['whatsapp']) ? $settings['whatsapp'] : '628551906091' }}&text=Halo+Saya+ingin+konsultasi&type=phone_number&app_absent=0"
        class="back-to-top d-flex align-items-center justify-content-center"><i class="bx bxl-whatsapp"></i></a>
    <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bx bxl-whatsapp"></i></a> -->

    <!-- Vendor JS Files -->
    <script src="{{ url('public') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ url('public') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ url('public') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('public') }}/assets/js/main.js"></script>

</body>

</html>
