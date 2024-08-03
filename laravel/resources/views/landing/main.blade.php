<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $appname ?? 'Law Family Consulting' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta property="og:title" content={{ $appname ?? 'Law Family Consulting' }}>
    <meta property="og:site_name" content=Law Family Consultingily Consulting>
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
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#team">Pengacara</a></li>
                    @if (count($article) > 0)
                        <li><a class="nav-link scrollto" href="#article">Artikel</a></li>
                    @endif
                    <li><a class="nav-link scrollto" href="#footer">Hubungi Kami</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a target="_blank"
                href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '+6282258191306' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"
                class="get-started-btn scrollto">Konsultasi</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center">
        <div class="container pt-0" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-10 col-lg-10 pt-5">
                    <div id="hero-con-content" class="mt-5 pt-1 pb-5">
                        <img src="{{ url('public') }}/logo/logo-text.png" class="img-fluid hero-logo pt-1"
                            alt="">
                        {{-- <h1>Hukum Keluarga</h1> --}}
                        {{-- <h2 style="margin-top: -20px;">Spesialis Perkara Hukum Keluarga</h2> --}}
                        {{-- <h3 class="pb-5">
              Perceraian, Sengketa Waris, Harta Gono Gini, Hak Asuh Anak, Perjanjian Perkawinan, KDRT dan Lainnya.
            </h3> --}}
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
                <h2>Spesialis Perkara Hukum Keluarga</h2>
                <h3 class="pb-2">
                    Perceraian, Sengketa Waris, Harta Gono Gini, Hak Asuh Anak, Perjanjian Perkawinan, KDRT dan Lainnya.
                </h3>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

         <!-- ======= Why us Section ======= -->
         <section id="services" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 pt-2 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>Kenapa Harus Memilih Kami?</h3>
                        <p class="pb-2">
                            Manfaat menggunakan jasa kami, Anda bisa mendapatkan Legal Service yang di tangani oleh Tim Lawyers Professional yang sudah berpengalaman 
                            dan Anda hanya perlu menghadiri 1 - 2 kali persidangan, selebihnya kami yang akan mewakili anda dalam persidangan dan Anda tidak perlu hadir lagi. 
                        </p>
                        <p>
                            Selama proses persidangan berlangsung, kami akan terus memberikan laporan kepada Anda setiap kali persidangan dilakukan. Sebagai pengacara, 
                            kami sangat menjunjung tinggi kualitas dan integritas setiap menangani kasus. 
                        </p>
                        <p>Keuntungan memilih Lawfam Family Law Consulting:</p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Upaya dan Proses Hukum lebih efisien</li>
                            <li><i class="ri-check-double-line"></i> Pengacara yang di delegasikan khusus untuk menangani perkara klien</li>
                            <li><i class="ri-check-double-line"></i> Ditangani oleh Pengacara yang sudah berpengalaman dalam menangani berbagai kasus</li>
                            <li><i class="ri-check-double-line"></i> Mendapatkan jaminan pelayanan dalam penyelesaian kasus klien</li>
                            <li><i class="ri-check-double-line"></i> Penjelasan perkara di jelaskan secara rinci</li>
                            <li><i class="ri-check-double-line"></i> Kami memiliki pengacara yang tetap sehingga menjaga keamanan dalam proses persidangan berlangsung</li>
                            <li><i class="ri-check-double-line"></i> Klien memiliki waktu luang yang lebih untuk melanjutkan aktifitas</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services2" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan Kami</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-heartbreak"></i></div>
                            <h4><a href="">Perceraian</a></h4>
                            <p>Perceraian terputusnya hubungan antara suami/istri yang di tetapkan oleh putusan hakim dari pengadilan yang berwenang untuk memutus perceraian dengan metode litigasi.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-child"></i></div>
                            <h4><a href="">Hak Asuh Anak</a></h4>
                            <p>HAK asuh yang diberikan kepada orang dewasa untuk dapat mengasuhnya, merawat dan memelihara anak tersebut agar dapat dibimbing dan dibina hingga anak tersebut berusia dewasa.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-cash-stack"></i></div>
                            <h4><a href="">Harta Gono Gini</a></h4>
                            <p>Proses hukum untuk membagi harta bersama antara pasangan yang bercerai. Hal ini mencakup
                                pembagian
                                properti, aset keuangan, dan tanggung jawab hutang.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-file-earmark-lock-fill"></i></div>
                            <h4><a href="">Hibah</a></h4>
                            <p class="w-100">Pemberian berupa barang atau harta yang memiliki nilai manfaat secara sukarela, seperti kendaraan, properti ataupun yang mempunyai sisi nilai jual</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-arch"></i></div>
                            <h4><a href="">Waris</a></h4>
                            <p>Penyiapan surat wasiat, kebijakan asuransi, dan perencanaan kepemilikan untuk mengatur
                                hak dan tanggung
                                jawab keuangan dalam keluarga.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-peace-fill"></i></div>
                            <h4><a href="">Mediasi dan Penyelesaian Sengketa</a></h4>
                            <p> Layanan mediasi membantu anggota keluarga mencapai kesepakatan damai tanpa harus melalui
                                pengadilan
                                yang mahal dan berlarut-larut.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-pass"></i></div>
                            <h4><a href="">Pembuatan Replik</a></h4>
                            <p>Jawaban yang diucapkan atau diajukan secara tertulis oleh pihak penggugat setelah ia membaca jawaban tergugat atas gugatan penggugat.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-pass-fill"></i></div>
                            <h4><a href="">Pembuatan Duplik</a></h4>
                            <p>Jawaban yang di ajukan oleh tergugat sebagai bantahan terhadap replik dari penggugat
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-chat-right-text"></i></div>
                            <h4><a href="">Konseling Hukum</a></h4>
                            <p>Pelayanan jasa hukum berupa penjelasan, informasi atau petunjuk dan memberikan penyelesaian terhadap permasalahan hukum</p>
                        </div>
                    </div>



                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ url('public') }}/img/about-img.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>Tentang Kami</h3>
                        <p class="fst-italic">
                            Kami Memberikan Layanan hukum keluarga yang dirancang khusus untuk membantu individu dan
                            keluarga dalam
                            menangani masalah hukum yang berkaitan dengan hubungan keluarga, pernikahan, perceraian, dan
                            masalah
                            terkait lainnya.
                            Kami bertujuan untuk memberikan panduan, perlindungan hukum, dan solusi hukum yang adil
                            dalam situasi yang
                            sering kali emosional dan kompleks.
                            Dengan prinsip:
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Kerahasiaan</li>
                            <li><i class="ri-check-double-line"></i> Kepentingan Terbaik Anak</li>
                            <li><i class="ri-check-double-line"></i> Keterbukaan dan Komunikasi</li>
                            <li><i class="ri-check-double-line"></i> Pendekatan Berdamai</li>
                            <li><i class="ri-check-double-line"></i> Profesionalisme dan Etika</li>
                            <li><i class="ri-check-double-line"></i> Kepatuhan Hukum</li>
                            <li><i class="ri-check-double-line"></i> Kepedulian Terhadap Kesejahteraan Emosional</li>
                        </ul>
                        <p class="fst-italic">
                            Dengan harapan dan tujuan penyelesaian masalah hukum, perlindungan hukum, dan prioritas
                            terhadap
                            kepentingan terbaik anak jika terlibat, serta harapan akan pendukung hukum yang dapat
                            memberikan nasihat,
                            representasi, dan kepastian hukum.
                            Keluarga juga berharap untuk menemukan solusi damai dan memahami proses hukum serta hak
                            mereka, sambil
                            memastikan pemulihan emosional dalam situasi yang penuh tekanan.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>KONSULTASIKAN MASALAH ANDA</h3>
                    <a class="cta-btn" target="_blank"
                        href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '6282258191306' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"><i
                            class="bi bi-whatsapp"></i></a>
                </div>

            </div>
        </section><!-- End Cta Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pengacara Kami</h2>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{ url('public') }}/img/team/2.png" class="img-fluid img-team"
                                    alt="Hifni Muzakki S.H">
                            </div>
                            <div class="member-info">
                                <h3>Hifni Muzakki S.H</h3>
                                <strong>(Managing Partners)</strong>
                                <span>Hifni Muzakki S.H Memulai karir sebagai Pengacara sejak tahun 2019, dan memiliki pengalaman dari berbagai kasus Hukum Perdata Khusus maupun Hukum Perdata lainnya baik yang sudah di selesaikan maupun sedang berjalan dalam persidangan.  </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ url('public') }}/img/team/1.png" class="img-fluid img-team"
                                    alt="Revi Carliando S.H">
                            </div>
                            <div class="member-info">
                                <h3>Revi Carliando S.H</h3>
                                <strong>(Partners)</strong>
                                <span>Revi Carliando S.H Memulai karir sebagai Pengacara pada tahun 2020, berpengalaman dengan Hukum Keluarga dan sangat concern terhadap pemecahan masalah yang timbul dalam perkara hukum keluarga.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="{{ url('public') }}/img/team/3.png" class="img-fluid img-team"
                                    alt="Albert Timbul Brilian S.H">
                            </div>
                            <div class="member-info">
                                <h3 style="font-size: 1.27rem !important">Albert Timbul Brilian S.H</h3>
                                <strong>(Associate)</strong>
                                <span>Albert Timbul Brilian S.H, Memulai Karir sebagai Pengacara pada tahun 2021, berpengalaman sebagai legal drafting handal dan memiliki pengalaman dalam pendampingan dalam Hukum Acara Pidana maupun Hukum Acara Perdata dan Hukum Acara Perdata Khusus.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="{{ url('public') }}/img/team/4.png" class="img-fluid img-team"
                                    alt="Maringan Lumbantoruan S.H">
                            </div>
                            <div class="member-info">
                                <h3 style="font-size: 1.27rem !important">Maringan Lumbantoruan S.H</h3>
                                <strong>(Associate)</strong>
                                <span>Maringan Lumbantoruan S.H, Memulai Karir sebagai Pengacara pada tahun 2021, berpengalaman sebagai legal drafting handal dan memiliki pengalaman dalam pendampingan dalam Hukum Acara Pidana maupun Hukum Acara Perdata dan Hukum Acara Perdata Khusus.</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">
                <div class="section-title">
                    <h2>Rekanan Kami</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="{{ url('public') }}/img/partners/rhs.webp" class="img-fluid img-partner"
                                alt="">
                        </div>
                        <div class="col">
                            <img src="{{ url('public') }}/img/partners/amc.webp" class="img-fluid img-partner"
                                alt="">
                        </div>
                        <div class="col">
                            <img src="{{ url('public') }}/img/partners/kmc.png" class="img-fluid img-partner"
                                alt="">
                        </div>
                        <div class="col">
                            <img src="{{ url('public') }}/img/partners/arr.webp" class="img-fluid img-partner"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Clients Section -->

        @if (count($article) > 0)
            <!-- ======= Articel Section ======= -->
            <section id="article">
                <div class="container" data-aos="zoom-in">
                    <div class="section-title">
                        <h2>Artikel</h2>
                    </div>

                    <div class="row mb-2">
                        @foreach ($article as $key => $value)
                            <div class="col-md-3">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="w-100">
                                        <img src="{{ $value->image_desktop ? $value->image_desktop : url('public') . '/logo/logo.png' }}"
                                            class="img-fluid" alt="{{ $value->title }}">
                                    </div>
                                    <div class="col p-4 pt-2 d-flex flex-column position-static">
                                        <strong
                                            class="d-inline-block mb-2 text-primary">{{ $value->category }}</strong>
                                        <h3 class="mb-0">{{ $value->title }}</h3>
                                        <div class="mb-1 text-muted">{{ $value->publish_at }}</div>
                                        <p class="card-text mb-auto">
                                            {{ $value->short_description ? $value->short_description : '' }}</p>
                                        <a href="{{ url('/') . '/articles/' . $value->url_key }}"
                                            class="stretched-link">Continue reading</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($articlemore === true)
                        {{-- <div class="col-lg-12 text-center">
                            <a href="{{ url('/articles') }}" class="btn btn-warning btn-sm">Lihat artikel lainnya</a>
                        </div> --}}
                    @else
                    @endif

                </div>
            </section><!-- End Aritcle Section -->
        @endif

        <section id="faq">
            <div class="container" data-aos="zoom-in">
                <div class="section-title">
                    <h2>Ferquently Ask Questions</h2>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="accordion" id="regularAccordionRobots">

                            <div class="accordion-item">
                              <h2 id="regularHeadingFirst" class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFirst" aria-expanded="true" aria-controls="regularCollapseFirst">
                                  Bagaimana Kalau Dokumen Hilang?
                                </button>
                              </h2>
                              <div id="regularCollapseFirst" class="accordion-collapse collapse show" aria-labelledby="regularHeadingFirst" data-bs-parent="#regularAccordionRobots">
                                <div class="accordion-body">
                                    Apabila ada dokumen yang hilang, LAWFAM FAMILY LAW CONSULTING bisa membantu mengurusi dokumen tersebut melalui duplikat yang di ajukan ke lembaga hukum terkait.
                                </div>
                              </div>
                            </div>
                          
                            <div class="accordion-item"> 
                              <h2 class="accordion-header" id="faq1HeadingSecond">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1CollapseSecond" aria-expanded="false" aria-controls="faq1CollapseSecond">
                                Bagaimana Jika Pasangan Menolak ?
                                </button>
                              </h2>
                              <div id="faq1CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq1rHeadingSecond" data-bs-parent="#faq1AccordionRobots">
                                <div class="accordion-body">
                                    Pada dasarnya perceraian bukan dilandasi oleh kesepakatan atau persetujuan namun menilai alasan dari gugatan perceraian, oleh karena itu klien yang mau menggugat tidak harus sepakat dengan pasangan.
                                </div>
                              </div>
                            </div>


                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq2HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2CollapseSecond" aria-expanded="false" aria-controls="faq2CollapseSecond">
                                    Apakah Saya Harus Hadir Sidang ?
                                  </button>
                                </h2>
                                <div id="faq2CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq2HeadingSecond" data-bs-parent="#faq2AccordionRobots">
                                  <div class="accordion-body">
                                    Apabila sudah diwakilkan oleh kuasa hukum, klien hanya harus hadir 1-2 kali saja untuk prosesnya, Sedangkan, agenda persidangan lainnya akan ditangani oleh pengacara 
                                  </div>
                                </div>
                            </div>

                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq3HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3CollapseSecond" aria-expanded="false" aria-controls="faq3CollapseSecond">
                                    Bagaimana Kalau Pasangan Hilang?
                                  </button>
                                </h2>
                                <div id="faq3CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq3HeadingSecond" data-bs-parent="#faq3AccordionRobots">
                                  <div class="accordion-body">
                                    Pasangan hilang ( ghaib) dapat tetap digugat mengikuti domisili penggugat, pengadilan akan memanggil melalui pengumaman koran / mekanisme lainnya. 
                                  </div>
                                </div>
                            </div>

                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq4HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4CollapseSecond" aria-expanded="false" aria-controls="faq4CollapseSecond">
                                    Apakah Mungkin Gugatan Saya Ditolak?
                                  </button>
                                </h2>
                                <div id="faq4CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq4HeadingSecond" data-bs-parent="#faq4AccordionRobots">
                                  <div class="accordion-body">
                                    Penolakan hanya akan terjadi apabila ditemukan kobohongan, kesalahan informasi atau gagal terbuktinya sebuah tuduhan.
                                  </div>
                                </div>
                            </div>

                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq5HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5CollapseSecond" aria-expanded="false" aria-controls="faq5CollapseSecond">
                                    Berapa Lama Proses Perceraian?
                                  </button>
                                </h2>
                                <div id="faq5CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq5HeadingSecond" data-bs-parent="#faq5AccordionRobots">
                                  <div class="accordion-body">
                                    Proses perceraian memakan waktu antara 3 -4 bulan tergantung kerumitan, perlawanan dan kondisi pengadilan
                                  </div>
                                </div>
                            </div>

                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq6HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6CollapseSecond" aria-expanded="false" aria-controls="faq6CollapseSecond">
                                    Bagaimana Kalau Saya Batal Cerai?
                                  </button>
                                </h2>
                                <div id="faq6CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq6HeadingSecond" data-bs-parent="#faq6AccordionRobots">
                                  <div class="accordion-body">
                                    Rujuk masih dapat dialksanakan hingga sesaat sebelum pembacaan putusan dan dapat dicabut kapan saja. 
                                  </div>
                                </div>
                            </div>

                            <div class="accordion-item"> 
                                <h2 class="accordion-header" id="faq7HeadingSecond">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7CollapseSecond" aria-expanded="false" aria-controls="faq7CollapseSecond">
                                    Apa Akibat Perceraian Saya?
                                  </button>
                                </h2>
                                <div id="faq7CollapseSecond" class="accordion-collapse collapse" aria-labelledby="faq7HeadingSecond" data-bs-parent="#faq7AccordionRobots">
                                  <div class="accordion-body">
                                    Akibat hukum adanya perceraian selain hilangnya status suami istri adalah hak asuh, kewarisan dan harta gono gini. 
                                  </div>
                                </div>
                            </div>
                          
                          </div>
                    </div>    
                </div>


            </div>
        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="footer-info">
                            <img src="{{ url('public') }}/logo/logo-text.png" alt="{{ $appname ?? 'Law Family Consulting' }}"
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
                            <strong>Phone:</strong> {{ $phone ?? '082258191306' }}<br>
                            <strong>Email:</strong> {{ $email ?? 'Lawfamilyconsulting@gmail.com' }}<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <div class="social-links mt-0">
                            <a href="https://www.facebook.com/{{ $facebook }}/?locale=id_ID" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/{{ $instagram }}/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/{{ $linkedin }}/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
                            <a target="_blank"
                                href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '6282258191306' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"><i
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
                &copy; Copyright <strong><span>{{ $appname ?? 'Law Family Consulting' }}</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a target="_blank"
        href="https://api.whatsapp.com/send/?phone={{ $whatsapp ?? '6282258191306' }}&text=Halo+Saya+ingin+konsultasi+dengan+Advokat&type=phone_number&app_absent=0"
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
