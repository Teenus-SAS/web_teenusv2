/*******************************************************
    Template Name    : Parim - App Landing HTML Template
    Created          : 2021
*******************************************************/
(function ($) {
  'use strict';

  var nav = $('nav');
  var navHeight = nav.outerHeight();

  $('.navbar-toggler').on('click', function () {
    if (!$('#mainNav').hasClass('navbar-reduce')) {
      $('#mainNav').addClass('navbar-reduce');
    }
  });

  // Preloader Area
  $(window).on('load', function () {
    $('.preloader').addClass('preloader-deactivate');
  });

  // Navbar Menu Reduce
  $(window).trigger('scroll');
  $(window).on('scroll', function () {
    var pixels = 50;
    var top = 1200;
    if ($(window).scrollTop() > pixels) {
      $('.navbar-expand-md').addClass('navbar-reduce');
      $('.navbar-expand-md').removeClass('navbar-trans');
    } else {
      $('.navbar-expand-md').addClass('navbar-trans');
      $('.navbar-expand-md').removeClass('navbar-reduce');
    }
    if ($(window).scrollTop() > top) {
      $('.scrolltop-mf').fadeIn(1000, 'easeInOutExpo');
    } else {
      $('.scrolltop-mf').fadeOut(1000, 'easeInOutExpo');
    }
  });

  // Back to top button
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').on('click', function () {
    $('html, body').animate(
      {
        scrollTop: 0,
      },
      1500,
      'easeInOutExpo'
    );
    return false;
  });

  //  Star ScrollTop
  $('.scrolltop-mf').on('click', function () {
    $('html, body').animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  //  Star Scrolling nav
  $('a.js-scroll[href*="#"]:not([href="#"])').on('click', function () {
    if (
      location.pathname.replace(/^\//, '') ==
        this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate(
          {
            scrollTop: target.offset().top - navHeight + 30,
          },
          1000,
          'easeInOutExpo'
        );
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll').on('click', function () {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: navHeight,
  });

  // Odometer JS
  $('.odometer').appear(function () {
    var odo = $('.odometer');
    odo.each(function () {
      var countNumber = $(this).attr('data-count');
      $(this).html(countNumber);
    });
  });

  // Screenshort-slide owlCarousel
  $('.screenshort-slide.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    center: true,
    mouseDrag: true,
    autoplay: true,
    dots: false,
    smartSpeed: 800,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });

  // Testimonials owl
  var anchura = Math.max(
    document.documentElement.clientWidth,
    window.innerWidth || 0
  );

  anchura <= 480 ? (length = 1) : (length = 2);
  $('#testimonial-slide').owlCarousel({
    margin: 5,
    autoplay: true,
    // center: true,
    autoplayTimeout: 4000,
    nav: false,
    smartSpeed: 1000,
    dots: false,
    autoplayHoverPause: true,
    loop: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: length,
      },
      600: {
        items: length,
      },
      1000: {
        items: length,
      },
    },
  });

  //  POPUP VIDEO
  $('.popup-video').magnificPopup({
    type: 'iframe',
  });

  //  Accordion-1
  $('.accordion-1').on('click', '.title', function () {
    $(this).next().slideDown();

    $('.accordion-info-1').not($(this).next()).slideUp();
  });

  $('.accordion-1').on('click', '.accordion-item-1', function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
  //  Accordion-2
  $('.accordion-2').on('click', '.title', function () {
    $(this).next().slideDown();

    $('.accordion-info-2').not($(this).next()).slideUp();
  });

  $('.accordion-2').on('click', '.accordion-item-2', function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
})(jQuery);
