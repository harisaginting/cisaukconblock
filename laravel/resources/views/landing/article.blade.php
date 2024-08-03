<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $app['appname'] ?? 'Law Fam' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta property="og:title" content={{ $app['appname'] ?? 'Law Fam' }}>
    <meta property="og:site_name" content=Law Family Consulting>
    <meta property="og:url" content=https://lawfamilyconsulting.com />
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6NB13PMMS1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ $gtag ?? '' }}');
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
            --img-main-bg: url('{{ url('public') }}/img/main-bg.jpg');
            --img-cta-bg: url('{{ url('public') }}/img/cta-bg.jpeg');
        }
    </style>
    <!-- Template Main CSS File -->
    <link href="{{ url('public') }}/assets/css/style.css" rel="stylesheet">

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

            {{-- <h1 class="logo me-auto me-lg-0"><a href="index.html">HK<span>.</span></a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ url('public') }}/logo/logo.png"
                    alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link" href="{{ url('/') }}#hero">Beranda</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#services">Layanan</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#about">Tentang Kami</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#team">Pengacara</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Hubungi Kami</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a target="_blank"
                href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"
                class="get-started-btn scrollto">Konsultasi</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

         <!-- ======= Why us Section ======= -->
         <section id="services" class="about">
            <div class="container py-5" data-aos="fade-up">
                <row class="text-center">
                    <h3>{{ $article['title'] }}</h3>
                </row>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <!-- Desktop Image -->
                        @if (!empty($article['image_desktop']))
                        <img src="{{ $article['image_desktop'] }}" class="img-fluid d-none d-md-block" alt="Desktop Image">
                        @endif
                        @if (!empty($article['image_mobile']))
                        <!-- Mobile Image -->
                        <img src="{{ $article['image_mobile'] }}" class="img-fluid d-block d-md-none" alt="Mobile Image">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 py-3 content" data-aos="fade-right"
                        data-aos-delay="100">
                        {!! $article['content'] !!}
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="footer-info">
                            <img src="{{ url('public') }}/logo/logo-text.png" alt="{{ $app['appname'] ?? 'Law Fam' }}"
                                style="width: 250px;margin-left:-20px;">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <p>
                            Summarecon Mall Bekasi <br>
                            Jawa Barat<br><br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <p>
                            <strong>Phone:</strong> {{ $phone ?? '+62 xxxx xxxx xxxx' }}<br>
                            <strong>Email:</strong> {{ $email ?? 'info@example.com' }}<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <div class="social-links mt-0">
                            <a href="https://www.facebook.com/{{ $app['facebook'] }}/?locale=id_ID" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/{{ $app['instagram'] }}/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/{{ $app['linkedin'] }}/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
                            <a target="_blank"
                                href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"><i
                                    class="bx bxl-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <iframe style="border:0; width: 100%; height: 270px; border-radius: 10px;"
                            src="https://www.google.com/maps?q={{ $address_lat ?? '0' }},{{ $address_lng ?? '0' }}&z=15&output=embed"
                            frameborder="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $app['appname'] ?? 'Law Fam' }}</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a target="_blank"
        href="https://api.whatsapp.com/send/?phone=628111500998&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"
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
