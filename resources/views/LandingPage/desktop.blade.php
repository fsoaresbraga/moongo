<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MOONGO - AGORA É POSSÍVEL COMPRAR SEUS SNACKS FAVORITOS DENTRO DOS CARROS COM A MOONGO</title>
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:locale:alternate" content="pt_BR">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="MOONGO - AGORA É POSSÍVEL COMPRAR SEUS SNACKS FAVORITOS DENTRO DOS CARROS COM A MOONGO"/>
  <meta property="og:url" content="{{config('app.url')}}" />
  <meta property="og:site_name" content="MONGO, serviço de bordo que possibilita a praticidade e integridade em outro nível, ultrapassando o ambientes das lojas físicas. Essa solução reforça a missão de entregar mais conveniência e comodidade para o cliente/passageiro de forma rápida, simples e intuitiva." />
  <meta property="og:image" content="{{asset('assets/img/logo.png')}}"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  
  <link href="assets/img/favicon.png" rel="icon">
  
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{asset('landingPage/css/core.css')}}" rel="stylesheet">

</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <a href="#">
            <img src="{{asset('assets/img/logo2.png')}}" alt="">
       </a>
      </div>
    </div>
  </header>
  
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

  </section>

  <main id="main">

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
              <div class="icon"><i class="bx bx-money"></i></div>
              <h4 class="title"><a href="">Ganhos</a></h4>
              <p class="description">O motorista recebe uma comissão dos produtos vendidos na MOONGO BOX.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="counts" class="counts">
      <div class="container">
        <div class="row" data-aos="fade-up">

          <div class="col-lg-4 col-md-6">
            <div class="count-box">
                <i class="bx bxs-car"></i>
              <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="1" class="purecounter"></span>
              <p>Motoristas Ativos</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bx bxs-home" ></i>
              <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
              <p>Cidades Atendidas</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bx bxs-business"></i>
              <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1" class="purecounter"></span>
              <p>Estados Atendidos</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="testimonials" class="testimonials">
      <div class="container" style="position: relative">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="partner mb-4">Seja um parceiro Moongo</h3>
            <div class="pulse" id="partnerMoongo">Cadastre-se Aqui!</div>
          </div>
        </div>
      </div>
    </section>

  </main>

  
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MOONGO</span></strong>. Todos os direitos Reservados
      </div>
    </div>
  </footer>

  <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Perceiro Moongo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="idContact">
          <div class="modal-body">
            <div class="form-group mb-3">
              <div class="selector">
                <div class="selecotr-item">
                    <input type="radio" id="radio1" name="selector" class="selector-item_radio" value="Indústria" checked>
                    <label for="radio1" class="selector-item_label">Indústria </label>
                </div>
                <div class="selecotr-item">
                    <input type="radio" id="radio2" name="selector" value="Varejista" class="selector-item_radio">
                    <label for="radio2" class="selector-item_label">Varejista</label>
                </div>
                <div class="selecotr-item">
                    <input type="radio" id="radio3" name="selector" value="Motorista" class="selector-item_radio">
                    <label for="radio3" class="selector-item_label">Motorista</label>
                </div>
              </div>  
            </div>

            <div class="form-group mb-3">
              <label for="nome">Nome / Razão Social</label>
              <input type="text" class="form-control validation nome_error" id="nome" placeholder="Nome / Razão Social">
              <span class="text-danger error-text nome_error"></span>
            </div>

            <div class="form-group mb-3">
              <label for="email">E-mail</label>
              <input type="email" class="form-control validation email_error" id="email" placeholder="E-mail">
              <span class="text-danger error-text email_error"></span>
            </div>
            <div class="row">
              <div class="col-md-9">
                <div class="form-group mb-3">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control validation cidade_error" id="cidade" placeholder="Cidade">
                  <span class="text-danger error-text cidade_error"></span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="estado">Estado</label>
                  <input type="text" class="form-control validation estado_error" id="estado" placeholder="Estado">
                  <span class="text-danger error-text estado_error"></span>
                </div>
              </div>
            </div>
          

            <div class="form-group mb-3">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control phone validation telefone_error" id="telefone" placeholder="Telefone">
              <span class="text-danger error-text telefone_error"></span>
            </div>

          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" id="submitContact" class="btn btn-warning w-100">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>
  <script src="{{asset('landingPage/js/core.js')}}"></script>
  @php
  /*
      
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('desktop/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('desktop/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('desktop/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('desktop/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('desktop/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('desktop/vendor/mask/jquery.mask.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.js"></script>
    <script src="{{asset('desktop/js/main.js')}}"></script>
  */
  @endphp
</body>

</html>