<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGIO - Specijalistička ordinacija</title>
  <meta name="description" content="Ultrazvučni pregledi. Ordinacija za ultrazvučnu dijagnostiku ANGIO DR BOJAN VOJNOVIĆ. Zakažite vaš ultrazvučni pregled - 0112436630">
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
                            RAD SA PACIJENTIMA
                        </a>
                    @elseif(auth()->user()->role === 'patient')
                        <a href="{{ route('moji-pregledi') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                            MOJI PREGLEDI
                        </a>
                    @endif

                    <!-- Logout -->
                    <a href="{{ route('logout') }}"class="text-sm text-gray-700 dark:text-gray-500 underline ml-4"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Izlogujte se
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        Ulogujte se
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
   <h1 class="logo me-auto"><a href="/">angio</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Početak</a></li>
          <li><a class="nav-link scrollto" href="#about">O nama</a></li>
          <li><a class="nav-link scrollto" href="#services">Pregledi</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doktor</a></li>
          <li><a class="nav-link scrollto" href="#departments">Saveti</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="tel:+381112436630" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Pozovite nas!</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Dobrodošli u Angio</h1>
      <h2>Radno vreme: ponedeljak - petak od 9.00 do 17.00 časova</h2>
      <a href="#about" class="btn-get-started scrollto">Počnite</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Zašto Angio?</h3>
              <p>Svi pregledi su bezbolni i bezopasni za sve kategorije pacijenata. Imamo više od 20 godina iskustva i veliki broj zadovoljnih pacijenata.</p>
              <div class="text-center">
                <a href="#about" class="more-btn">Saznajte više <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Ultrazvuk</h4>
                    <p>Colour Doppler Siemens Acuson Juniper</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>PPG</h4>
                    <p>Hadeco Smartdop 50EX</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>CW dopler</h4>
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
            <h3>Ordinacija je osnovana 19. juna 2001. godine.</h3>
            <p>U osnovnu delatnost ordinacije spadaju pregledi i lečenje iz domena Angiologije i Ortopedije</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Angiologija</a></h4>
              <p class="description">Neinvazivno ispitivanje oboljenja perifernih krvnih sudova vrata, ruku, nogu i abdomena</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Angiologija</a></h4>
              <p class="description">Neoperativno lečenje. Preventivno delovanje protiv oboljenja krvnih sudova</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Ortopedija</a></h4>
              <p class="description">Ultrazvučno ispitivanje mekih tkiva i mišića ruku i nogu</p>
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
              <p>Doktor</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
              <p>Vrsta pregleda</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <!-- $pregledCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="12000" data-purecounter-end="{{ $pregledCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pregleda</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
               <!-- $pacijentCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="10000" data-purecounter-end="{{ $pacijentCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pacijenata</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Pregledi</h2>
          <p>Svi pregledi su bezbolni i bezopasni za sve kategorije pacijenata.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Ultrazvuk</a></h4>
              <p>Ispitivanje oboljenja većih i srednjih arterija ruku, nogu, vrata, abdomena kao i mekih tkiva i mišića nogu i ruku. Multifrekvente sonde: linearna (2.9 - 11.5 MHz), linearna (4 - 16 MHz) i konveksna (1.4 - 5 MHz).</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Digitalna fotopletizmografija</a></h4>
              <p>PPG - photopletismography. Metoda koristi infracrvene zrake za ispitivanje mikrocirkulacije (male arterije i kapilari šaka i stopala)</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Doppler kontinuiranih talasa</a></h4>
              <p>CW - continuous wave Doppler. Ultrazvučna metoda za ispitivanje kvaliteta arterijske i venske cirkulacije. Meri vrednost Doppler indexa i segmentarnih pritisaka.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Dr sci Bojan Vojnović</h2>
          <p>Završio Medicinski fakultet Univerziteta u Beogradu. Naziv magistra i doktora medicinskih nauka stekao na Medicinkom fakultetu u Beogradu. <br> Član je Nacionalnog udruženja za neuroangiologiju, Udruženja flebologa Srbije, Britanskog medicinskog ultrazvučnog udruženja (British Medical Ultrasound Society) i Evropske federacije ultrazvuka u medicini i biologiji (European Federation of Societies for Ultrasound in Medicine and Biology) </p>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <span>Specijalista ortopedije i angiologije.</span>
                <span>1988-1991 zaposlen na Klinici za ortopedsku hirurgiju i traumatologiju KC Srbije u Beogradu</span>
                <span>1991-2001. zaposlen na Institutu za kardiovaskularne bolesti Kliničkog centra Srbije u Beogradu</span>
                <span>1999-2001. zaposlen na Medicinskom fakultetu Univerziteta u Beogradu u zvanju asistenta</span>
                <span>Govori engleski, španski i francuski jezik, služi se nemačkim i japanskim jezikom</span>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <!--<div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>-->
              <div class="member-info">
                <span>Predavač i ekspert Nacionalnog udruženja za neuroangiologiju, Centra za edukaciju ultrazvuka u medicini i biologiji Srbije, predavač po pozivu Centra za ultrazvučnu dijagnostiku "Dr Aleksandar Margulis" KCS i Thomas Jefferson University</span>
                <span>Objavio je 7 naučno stručnih radova u inostranim i 8 u domaćim časopisima, 24 u obliku apstrakta na inostranim i 29 na domaćim kongresima.</span>
                <span>Autor je članaka u naučnim knjigama: "Ultrazvuk u medicini" - glavni urednik Atanasije Marković, Beograd, 1997.; "Hirurgija" - glavni urednik Dragoslav Stevović, Beograd, 2000. i "Kardiologija", 3. izdanje - glavni urednik Srećko Nedeljković, Beograd, 2000.</span>
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
          <h2>Saveti</h2>
          <p>Angiologija: od grčkih reči angio - uzan, tesan, sud i logos - nauka. Nauka o oboljenjima krvnih sudova (vena, arterija, arteriola, venula, kapilara)</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Arterije</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Arteroskreloza</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Arterije</h3>
                    <p class="fst-italic">krvni sudovi koji odvode krv iz srca u delove tela</p>
                    <p>Od leve komore srca počinje aorta - najveća arterija - savija se u vidu luka i prolazi kroz grudni koš (grudna aorta) i trbuh (trbušna aorta)
                    <br><br>Iz luka aorte odvajaju se arterije za vrat (glavu) i ruke (karotidne, kičmene, potključne, pazušne, nadlakatne i podlakatne kao i arterije šake)
                    <br><br>U nivou pupka aorta se razdvaja na karlične arterije, koje se nastavljaju u arterije nogu (preponske, butne, zatkolene i potkolene kao i arterije stopala)
                    <br><br>Imaju 3 sloja - unutrašnji (prisnica) - glatkom površnom omogućuje prolaz krvi, srednji (mišićni) - daje čvrstinu, rastegljivost i elastičnost, i spoljni (potporni) - ojačava i hrani arteriju
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
                    <h3>Arteroskreloza</h3>
                    <p class="fst-italic">ateroskleroza (ili arterioskleroza): najčešće oboljenje arterije - oboljenje unutrašnjeg sloja sa stvaranjem naslaga masti koje zadebljavaju i potom krečnjaka i dovode do smanjenja dotoka krvi i zapušenja tj. prekida dotoka krvi</p>
                    <p>Arterioskleroza srednjeg (mišićnog) sloja oslabljuje arteriju i dovodi do proširenja (veliko proširenje je aneurizma), sklonu pucanju arterije i iskrvavljenju.
                    <br><br>Nepoznato je poreklo ateroskleroze, a faktori rizika su: povećane vrednosti masnoća (holesterol i trigliceridi) i šećera u krvi, povišen arterijski krvni pritisak, pušenje i gojaznost
                    <br><br>Preventiva ateroskleroze: pravilna ishrana bogata vitaminima i mineralima (sveže povrće i voće), riba, meso i mlečni proizvodi sa malo masnoća, integralne žitarice, rehidriranost, fizičke aktivnosti, hod i rekreacija.</p>
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
          <h2>Galerija</h2>
          <p>Naša ordinacija je na prvom spratu zgrade u ulici Alekse Nenadovića 5. Parking je dostupan ispred zgrade ili na parkiralištu Slavija.</p>
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
          <h2>Kontakt</h2>
          <p>Vaš pregled možete zakazati pozivom na naš broj telefona. Radno vreme ordinacije je od ponedeljka do petka od 9.00 do 17.00 časova</p>
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
                <h4>Adresa:</h4>
                <p>Alekse Nenadovića 5, Beograd-Slavija</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>office@angio.co.rs</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Pozovite:</h4>
                <p>011/2 436 630</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('contact.send') }}" method="POST" role="form" class="php-email-form">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Vaše ime" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Vaš email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Naslov" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Poruka" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Sačekajte...</div>
                <div class="error-message"></div>
                <div class="sent-message">Vaša Poruka je poslata. Hvala!</div>
              </div>
              <div class="text-center"><button type="submit">Pošalji poruku</button></div>
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
            <h3>Angio</h3>
            <p>
              Alekse Nenadovića 5 <br>
              Beograd - Slavja, RS-11000<br>
              Republika Srbija <br><br>
              <strong>Telefon:</strong>011 / 2 436 630<br>
              <strong>Email:</strong> office@angio.co.rs<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Korisni linkovi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Početak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">O nama</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Pregledi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Naše usluge</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Velikih krvnih sudova</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Arterija i vena vrata</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD Vratnih (vertebralnih) arterija</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Novosti</h4>
            <p>Upišite vašu email adresu i prijavite se na naš newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Prijavi se">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Angio</span></strong>. Sva prava zadržana
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href="mailto:stojicevic.n@gmail.com">Nikola Stojićević</a>
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
