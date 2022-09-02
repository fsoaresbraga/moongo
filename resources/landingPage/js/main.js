
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 20
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }


  $('.taxi').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      items: 6,
      responsive:{
          0:{
              items:2
          },
          600:{
              items:4
          },
          1000:{
              items:6
          }
      }
  })
    /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

  /**
   * Initiate Pure Counter 
   */
  new PureCounter();


  $("#partnerMoongo").click(function() {
    $("#form").modal('show');
  })
  $(".close").click(function() {
    $("#form").modal('hide');
  })

  $('.phone').mask('(00) 00000-0000');


  $('#submitContact').click(function(){
    event.preventDefault();

   

    var name = $("#nome").val();
    var email = $("#email").val();
    var city = $("#cidade").val();
    var state = $("#estado").val();
    var phone = $("#telefone").val();

    var radio = $('input[name=selector]:checked', '#idContact').val();

    if(radio == undefined) {

      Swal.fire({
          position: 'top-center',
          icon: 'info',
          html: '<p style="font-size:13px">informe: Indústria / Varejista ou Motorista.</p>',
          showConfirmButton: false,
          timer: 3500
      })

      return false;

    }

    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
    type: 'POST',
    url: "/send/contact",
    data: {nome: name, email: email, cidade: city, estado: state, telefone: phone, categoria: radio},
    enctype: 'multipart/form-data',
      success: function(data){
        //console.log(data);
        
        if(data.status == 0) {
          Swal.fire({
              position: 'top-center',
              icon: 'info',
              html: '<p style="font-size:13px">Todos os campos são Obrigatório.</p>',
              showConfirmButton: false,
              timer: 3800
          })

          
          
        } else if(data.status == 500) {
          Swal.fire({
              position: 'top-center',
              icon: 'info',
              html: '<p style="font-size:13px">Erro ao enviar Contato.</p>',
              showConfirmButton: false,
              timer: 3800
          })
        } else if(data.status == 200) {
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                html: '<p style="font-size:13px">Cadastro enviado com Sucesso.</p>',
                showConfirmButton: false,
                timer: 3800
            })

            $('#idContact').trigger("reset");
            $("#form").modal('hide');
        }
      },
      error: function(xhr){
          console.log(xhr)
      } 
    });


  })
})()