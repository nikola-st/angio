<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGIO - Consulting rooms</title>
  <meta name="description" content="Ultrasound scans. Consulting room for ultrasound diagnostics ANGIO DR BOJAN VOJNOVIĆ. Schedule your ultrasound checkup - 0112436630">
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
                        @if(auth()->user()->isDoctor())
                            <a href="{{ route('doktor') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                RAD SA PACIJENTIMA
                            </a>
                        @elseif(auth()->user()->isPatient())
                            <a href="{{ route('moji-pregledi') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                MOJI PREGLEDI
                            </a>
                        @endif

                    <!-- Logout -->
                    <a href="{{ route('logout') }}"class="text-sm text-gray-700 dark:text-gray-500 underline ml-4"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    Login
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About us</a></li>
          <li><a class="nav-link scrollto" href="#services">Examinations</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctor</a></li>
          <li><a class="nav-link scrollto" href="#departments">Advice</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="tel:+381112436630" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Make an Appointment</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>WELCOME TO ANGIO</h1>
      <h2>Work time: monday - friday | 9.00 - 17.00h</h2>
      <a href="#about" class="btn-get-started scrollto">GET STARTED</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Angio?</h3>
              <p>All scanning methods are painless and safe for all categories of patients. We have more than 20 years of experiance and a lot of satisfied patients.</p>
              <div class="text-center">
                <a href="#about" class="more-btn">Learn more <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Ultrasound</h4>
                    <p>Colour Doppler Siemens Acuson Juniper</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-1">
                    <i class="bx bx-cube-alt"></i>
                    <h4>PPG</h4>
                    <p>Hadeco Smartdop 50EX</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>CW Doppler</h4>
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
            <h3>The consulting rooms were opened on 19th June 2001.</h3>
            <p>The basic activity of the office includes examinations and treatment in the field of Angiology and Orthopedics</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Angiology</a></h4>
              <p class="description">Non-invasive examination of the peripheral blood vessels of the neck, arms, legs and abdomen</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Angiology</a></h4>
              <p class="description">Non-operative treatment. Preventative treatment for blood vessel diseases</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Orthopaedics</a></h4>
              <p class="description">Ultrasound scans of the soft tissues and muscles in the arms and legs</p>
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
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
              <p>Type of examinations</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <!-- $pregledCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="12000" data-purecounter-end="{{$pregledCount}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Examinations</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
               <!-- $pacijentCount je globalna promenljiva, nalazi se u app\Providers\AppServiceProvider.php -->
              <span data-purecounter-start="10000" data-purecounter-end="{{$pacijentCount}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Patients</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Examinations</h2>
          <p>All scanning methods are painless and safe for all categories of patients.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Ultrasound</a></h4>
              <p>Еxamination of diseases of large and medium sized arteries of the arms, legs, neck and abdomen, as well as the soft tissues and muscles of the arms and legs. Мultifrequent probes: linear (2.9 - 11.5 MHz), linear (4 - 16 MHz) and convex (1.4 - 5 MHz).</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Digital Photopletismography</a></h4>
              <p>PPG - photopletismography. The method uses infrared rays for examination of micro-circulation(small arteries and capillaries of the palms of hand and soles of feet)</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Continuous Wave Doppler</a></h4>
              <p>CW - continuous wave Doppler. Ultrasound method for examination of the quality of arterial and venous circulation. Measures the value of Doppler index and segmental pressures .</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Dr Bojan Vojnović, PhD</h2>
          <p>Graduated Medicine at the University of Belgrade. Awarded Master's degree and PhD at the Medical School of the University of Belgrade. <br> A member of the National Society of Neuroangiology, Serbian Society of  Phlebologists, British Medical Ultrasound Society, and the European Federation of Societies for Ultrasound in Medicine and Biology</p>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <span>Specialist in orthopaedics and angiology.</span>
                <span>1988-1991 employed at the Clinic for Orthopaedic Surgery and Traumatology at the Clinical Centre of Serbia in Belgrade</span>
                <span>1991-2001. employed at the Institute of Cardiovascular Diseases at the Clinical Centre of Serbia in Belgrade</span>
                <span>1999-2001. employed at the Medical School of the University of Belgrade as an assistant lecturer</span>
                <span>Fluent in English, Spanish and French, and conversational German and Japanese</span>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <!--<div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>-->
              <div class="member-info">
                <span>Lecturer and expert in the National Society of Neuroangiology, Serbian Centre for Education for Ultrasound in Medicine and Biology; lecturer at the Centre for Ultrasound Diagnostics "Dr Aleksandar Margulis" Clinical Centre of Serbia and at Thomas Jefferson University</span>
                <span>Published 7 scientific papers in international and 8 in domestic publications; 24 in the form   of abstracts in international and 29 in domestic conferences.</span>
                <span>Author of articles in educational books: Markovic Atanasije, 1997: Ultrasound in Medicine, Belgrade; Stevovic Dragoslav, 2000: Surgery, Belgrade; Nedeljkovic Srecko, 2000: Cardiology (3rd edition), Belgrade</span>
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
          <h2>Advice</h2>
          <p>Angiology: comes from the Greek  words "angio" (narrow /vessel) and "logos" (knowledge).<br>The study of blood vessels (veins, arteries, arteriols, venules, capillaries)</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Arteries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Arteriosclerosis</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Arteries</h3>
                    <p class="fst-italic">blood vessels which carry blood from the heart to parts of the body</p>
                    <p>From the left ventricle of the heart leads the aorta (the largest artery), which arches around and passes through the thorax (thoracal aorta) and abdomen (abdominal aorta)
                    <br><br>Arteries for the neck (head) and arms (carotid, vertebral, subclavian, axillar, brachial and antebrachial as well as hand arteries) originate from the aorta arch
                    <br><br>At the level of the belly-button, the aorta splits to pelvic arteries, which continue to leg arteries (inguinal, thigh, popliteal and below-knee as well as foot arteries)
                    <br><br>Made up of three layers - inner (intimal): smooth surface allows blood flow; middle (muscular): provides strength and elasticity; and outer (adventitial): supports and feeds artery
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
                    <h3>Atherosclerosis</h3>
                    <p class="fst-italic">atherosclerosis: most common arterial disease which leads to formation of lipid plaques which thicken and calcify and reduce and eventually stop blood flow</p>
                    <p>Atherosclerosis of muscular layer which leads to weakening enlarging of the arteries (greater enlargement is aneurysm that could burst and bleed).
                    <br><br>The origin of atherosclerosis is unknown, and known risk factors are a high level of blood cholesterol, triglicerides and glucose, arterial hypertension, smoking and  obesity
                    <br><br>Prevention of atherosclerosis: healthy diet rich in vitamins and minerals (fresh fruit and vegetables), fish, lean meat and low-fat dairy products, wholegrain cereals, keeping hydration and an active lifestyle.</p>
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
          <h2>Gallery</h2>
          <p>Our practice is on the first floor of the building at Alekse Nenadovića Street 5. Parking is available in front of the building or at the Slavija parking lot.</p>
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
          <h2>Contact</h2>
          <p>You can schedule your examination by calling our phone number. Office hours are from Monday to Friday from 9:00 a.m. to 5:00 p.m</p>
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
                <h4>Location:</h4>
                <p>Alekse Nenadovića Street 5, Belgrade-Slavija</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>office@angio.co.rs</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>011/2 436 630</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('contact.send') }}" method="POST" role="form" class="php-email-form">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Wait...</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message was sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
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
              Alekse Nenadovića Street 5 <br>
              Belgrade - Slavja, RS-11000<br>
              Republic of Serbia <br><br>
              <strong>Phone:</strong> 011 / 2 436 630<br>
              <strong>Email:</strong> office@angio.co.rs<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD of Large blood vessels</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD of Artery and vein of the necka</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">CD of Neck (vertebral) artery</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Enter your email address and sign up for our newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Angio</span></strong>. All Rights Reserved
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
