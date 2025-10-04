<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>АНГИО - Специјалистичка ординација</title>
  <meta name="description" content="Ултразвучни прегледи. Ординација за ултразвучну дијагностику АНГИО ДР БОЈАН ВОЈНОВИЋ. Закажите ваш ултразвучни преглед - 0112436630">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <link rel="canonical" href="https://angio.co.rs/">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:office@angio.co.rs">office@angio.co.rs</a>
        <i class="bi bi-phone"></i> <a href="tel:+381112436630">011 2 436 630</a>
        <i></i><a href="{{ route('home.en') }}">EN</a> | <a href="{{ route('home.lat') }}">LAT</a> | <a href="{{ route('home') }}">ЋИР</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    @if(auth()->user()->role === 'doctor')
                        <a href="{{ route('doktor') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                            РАД СА ПАЦИЈЕНТИМА
                        </a>
                    @elseif(auth()->user()->role === 'patient')
                        <a href="{{ route('moji-pregledi') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                            МОЈИ ПРЕГЛЕДИ
                        </a>
                    @endif

                    <!-- Logout -->
                    <a href="{{ route('logout') }}"class="text-sm text-gray-700 dark:text-gray-500 underline ml-4"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Излогујте се
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        Улогујте се
                    </a>
                    @endauth
                </div>
            @endif
      </div>
    </div>
  </div>



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="/" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
    <h1 class="logo me-auto"><a href="/">ангио</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Почетак</a></li>
          <li><a class="nav-link scrollto" href="#about">О нама</a></li>
          <li><a class="nav-link scrollto" href="#services">Прегледи</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Доктор</a></li>
          <li><a class="nav-link scrollto" href="#departments">Савети</a></li>
          <li><a class="nav-link scrollto" href="#contact">Контакт</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="tel:+381112436630" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Позовите нас!</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>ДОБРОДОШЛИ У АНГИО</h1>
      <h2>Радно време: понедељак - петак од 9.00 до 17.00 часова</h2>
      <a href="#about" class="btn-get-started scrollto">Почните</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Зашто Ангио?</h3>
              <p>Сви прегледи су безболни и безопасни за све категорије пацијената. Имамо више од 20 година искуства и велики број задовољних пацијената.</p>
              <div class="text-center">
                <a href="#about" class="more-btn">Сазнајте више <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Ултразвук</h4>
                    <p>Colour Doppler Siemens Acuson Juniper</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>ППГ</h4>
                    <p>Hadeco Smartdop 50EX</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>CW доплер</h4>
                    <p>Vasculascope 820</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=8GaecfzLico&list=PL9CC710E92A1878CE&index=1" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Ординација је основана 19. јуна 2001. године.</h3>
            <p>У основну делатност ординације спадају прегледи и лечење из домена Ангиологије и Ортопедије</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Ангиологија</a></h4>
              <p class="description">Неинвазивно испитивање обољења периферних крвних судова врата, руку, ногу и абдомена</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Ангиологија</a></h4>
              <p class="description">Неоперативно лечење. Превентивно деловање против обољења крвних судова</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Ортопедија</a></h4>
              <p class="description">Ултразвучно испитивање меких ткива и мишића руку и ногу</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1" class="purecounter"></span>
              <p>Доктор</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
              <p>Врста прегледа</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <!-- $pregledCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="12000" data-purecounter-end="{{ $pregledCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Прегледа</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
               <!-- $pacijentCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="10000" data-purecounter-end="{{ $pacijentCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Пацијената</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Прегледи</h2>
          <p>Сви прегледи су безболни и безопасни за све категорије пацијената.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Ултразвук</a></h4>
              <p>Испитивање обољења већих и средњих артерија руку, ногу, врата, абдомена као и меких ткива и мишиђа ногу и руку. Мултифреквентне сонде: линеарна (2.9 - 11.5 MHz), линеарна (4 - 16 MHz) и конвексна (1.4 - 5 MHz).</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Дигитална фотоплетизмографија</a></h4>
              <p>PPG - photopletismography. Метода користи инфрацрвене зраке за испитивање микроциркулације (мале артерије и капилари шака и стопала)</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Доплер континуираних таласа</a></h4>
              <p>CW - continuous wave Doppler. Ултразвучна метода за испитивање квалитета артеријске и венске циркулације. Мери вредност Доплер индекса и сегментарних притисака.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Dr sci Бојан Војновић</h2>
          <p>Завршио Медицински факултет Универзитета у Београду. Назив магистра и доктора медицинских наука стекао на Медицинком факултету у Београду. Члан је Националног удружења за неуроангиологију, Удружења флеболога Србије, Британског медицинског ултразвучног удружења (British Medical Ultrasound Society) и Европске федерације ултразвука у медицини и биологији  (European Federation of Societies for Ultrasound in Medicine and Biology) </p>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <span>Специјалиста ортопедије и ангиологије</span>
                <span>1988-1991 запослен на Клиници за ортопедску хирургију и трауматологију КЦ Србије у Београду</span>
                <span>1991-2001. запослен на Институту за кардиоваскуларне болести Клиничког центра Србије у Београду</span>
                <span>1999-2001. запослен на Медицинском факултету Универзитета у Београду у звању асистента</span>
                <span>Говори енглески, шпански и француски језик, служи се немачким и јапанским језиком</span>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <!--<div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>-->
              <div class="member-info">
                <span>Предавач и експерт Националног удружења за неуроангиологију, Центра за едукацију ултразвука у медицини и биологији Србије, предавач по позиву Центра за ултразвучну дијагностику КЦС и Thomas Jefferson University</span>
                <span>Објавио је 7 научно стручних радова у иностраним и 8 у домаћим часописима, 24 у облику апстракта на иностраним и 29 на домаћим конгресима.</span>
                <span>Аутор је чланака у научним књигама: "Ултразвук у медицини" - гл. уредник А. Марковић, Београд, 1997.; "Хирургија" - гл. уредник Д. Стевовић, Београд, 2000. и "Кардиологија", 3.издање - гл. уредник С. Недељковић, Београд, 2000.</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Савети</h2>
          <p>Ангиологија: од грчких речи ангио - узан, тесан, суд и логос - наука.<br> Наука о обољењима крвних судова (вена, артерија, артериола, венула, капилара)</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Артерије</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Артеросклероза</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Артерије</h3>
                    <p class="fst-italic">крвни судови који одводе крв из срца у делове тела</p>
                    <p>Од леве коморе срца почиње аорта - највећа артерија - савија се у виду лука и пролази кроз грудни кош (грудна аорта) и трбух (трбушна аорта)
                    <br><br>Из лука аорте одвајају се артерије за врат (главу) и руке (каротидне, кичмене, поткључне, пазушне, надлакатне и подлакатне као и артерије шаке)
                    <br><br>У нивоу пупка аорта се раздваја на карличне артерије, које се настављају у артерије ногу (препонске, бутне, затколене и потколене као и артерије стопала)
                    <br><br>Имају 3 слоја - унутрашњи (присница) - глатком површном омогућује пролаз крви, средњи (мишићни) - даје чврстину, растегљивост и еластичност, и спољни (потпорни) - ојачава и храни артерију
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Артеросклероза</h3>
                    <p class="fst-italic">атеросклероза (или артериосклероза): најчешће обољење артерије - обољење унутрашњег слоја са стварањем наслага масти које задебљавају и потом кречњака и доводе до смањења дотока крви и запушења тј. прекида дотока крви</p>
                    <p>Артериосклероза средњег (мишићног) слоја ослабљује артерију и доводи до проширења (велико проширење је анеуризма), склону пуцању артерије и искрвављењу.
                    <br><br>Непознато је порекло атеросклерозе, а фактори ризика су: повећане вредности масноћа (холестерол и триглицериди) и шећера у крви, повишен артеријски крвни притисак, пушење и гојазност
                    <br><br>Превентива атеросклерозе: правилна исхрана богата витаминима и минералима (свеже поврће и воће), риба, месо и млечни производи са мало масноћа, интегралне житарице, рехидрираност, физичке активности, ход и рекреација.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Departments Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Галерија</h2>
          <p>Наша ординација је на првом спрату зграде у улици Алексе Ненадовића 5. Паркинг је доступан испред зграде или на паркиралишту Славија.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Контакт</h2>
          <p>Ваш преглед можете заказати позивом на наш број телефона. Радно време ординације је од понедељка до петка од 9.00 до 17.00 часова</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.9478475901783!2d20.466069376566534!3d44.80225147736039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70b400000001%3A0x6f43e65d66811ec1!2sSPECIJALISTI%C4%8CKA%20ORDINACIJA%20ANGIO%20BOJAN%20VOJNOVI%C4%86%20PREDUZETNIK%20BEOGRAD%2C%20ALEKSE%20NENADOVI%C4%86A%205!5e0!3m2!1ssr!2srs!4v1692825340179!5m2!1ssr!2srs" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Адреса:</h4>
                <p>Алексе Ненадовића 5, Београд - Славија</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Имејл:</h4>
                <p>office@angio.co.rs</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Позовите:</h4>
                <p>011/2 436 630</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('contact.send') }}" method="POST" role="form" class="php-email-form">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Ваше име" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Ваш имејл" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Наслов" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Порука" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Сачекајте...</div>
                <div class="error-message"></div>
                <div class="sent-message">Ваша порука је послата. Хвала!</div>
              </div>
              <div class="text-center"><button type="submit">Пошаљи поруку</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Ангио</h3>
            <p>
              Алексе Ненадовића 5 <br>
              Београд - Славија, RS-11000<br>
              Република Србија <br><br>
              <strong>Телефон:</strong>011 / 2 436 630<br>
              <strong>Имејл:</strong> office@angio.co.rs<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Корисни линкови</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Почетак</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">О нама</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Прегледи</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Наше услуге</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Великих крвних судова</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Артерија и вена врата</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Вратних (вертебралних) артерија</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Новости</h4>
            <p>Упишите вашу имејл адресу и пријавите се на наш newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Пријави се">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Ангио</span></strong>. Сва права задржана
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href="mailto:stojicevic.n@gmail.com">Никола Стојићевић</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
