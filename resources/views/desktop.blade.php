<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MOONGO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('desktop/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('desktop/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


  <link href="{{asset('desktop/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <a href="#">
            <img src="{{asset('assets/img/logo2.png')}}" alt="">
       </a>
      </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1><span>Agora é possível comprar seus snacks favoritos dentro dos carros com a </span>MOONGO</h1>
          </div>
        </div>

        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{asset('assets/img/slider.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Somos a extensão que faltava para revolucionar o varejo</h3>
            <p>MONGO, serviço de bordo que possibilita a praticidade e integridade em outro nível, ultrapassando o ambientes das lojas físicas. Essa solução reforça a missão de entregar mais conveniência e comodidade para o cliente/passageiro de forma rápida, simples e intuitiva.</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bx bxs-car"></i></div>
              <h4 class="title"><a href="">O motorista</a></h4>
              <p class="description">Os motoristas parceiros da MOONGO deverão se cadastrar na plataforma e retirar sua MOONGO BOX numa loja credenciada gratuitamente.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bx bxs-user"></i></div>
              <h4 class="title"><a href="">O passageiro</a></h4>
              <p class="description">Deverão fazer a leitura do QRCODE da MOONGO, selecionar os produtos desejados e realizar a compra.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bx bx-money-withdraw"></i></div>
              <h4 class="title"><a href="">Ganhos</a></h4>
              <p class="description">O motorista recebe uma comissão dos produtos vendidos na MOONGO BOX.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row" data-aos="fade-up">

          <div class="col-lg-4 col-md-6">
            <div class="count-box">
                <i class="bi bi-car-front"></i>
              <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="1" class="purecounter"></span>
              <p>Motoristas Ativos</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
               <i class="bi bi-house-door"></i>
              <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
              <p>Cidades Atendidas</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
                <i class="bi bi-building"></i>
              <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1" class="purecounter"></span>
              <p>Estados Atendidos</p>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Ranking Mensal</h2>
          <p>Motoristas</p>
        </div>

        <div class="row" data-aos="fade-left">
        @foreach($users as $user)
          <div class="col-lg-2 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="#" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{$user->name}}</h4>
                <small>{{$user->city}}</small>
                <span>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                ({{$user->ranking}})</span>
              </div>
            </div>
          </div>
         @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MOONGO</span></strong>. Todos os direitos Reservados
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('desktop/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('desktop/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('desktop/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('desktop/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('desktop/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('desktop/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('desktop/js/main.js')}}"></script>

</body>

</html>