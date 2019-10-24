// ISOTOPE FILTER
jQuery(document).ready(function ($) {

  if ($('.iso-box-wrapper').length > 0) {

    var $container = $('.iso-box-wrapper'),
      $imgs = $('.iso-box img');

    $container.imagesLoaded(function () {

      $container.isotope({
        layoutMode: 'fitRows',
        itemSelector: '.iso-box'
      });

      $imgs.load(function () {
        $container.isotope('reLayout');
      })

    });

    //filter items on button click

    $('.filter-wrapper li a').click(function () {

      var $this = $(this),
        filterValue = $this.attr('data-filter');

      $container.isotope({
        filter: filterValue,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false,
        }
      });

      // don't proceed if already selected 

      if ($this.hasClass('selected')) {
        return false;
      }

      var filter_wrapper = $this.closest('.filter-wrapper');
      filter_wrapper.find('.selected').removeClass('selected');
      $this.addClass('selected');

      return false;
    });

  }

});


// PRELOADER JS
$(window).load(function () {
  $('.preloader').fadeOut(1000); // set duration in brackets    
});


// jQuery to collapse the navbar on scroll //
$(window).scroll(function () {
  if ($(".navbar").offset().top > 50) {
    $(".navbar-fixed-top").addClass("top-nav-collapse");
  } else {
    $(".navbar-fixed-top").removeClass("top-nav-collapse");
  }
});


/* HTML document is loaded. DOM is ready. 
-------------------------------------------*/
$(function () {

  // ------- WOW ANIMATED ------ //
  wow = new WOW({
    mobile: false
  });
  wow.init();


  // HIDE MOBILE MENU AFTER CLIKING ON A LINK
  $('.navbar-collapse a').click(function () {
    $(".navbar-collapse").collapse('hide');
  });


  // NIVO LIGHTBOX
  $('.iso-box-section a').nivoLightbox({
    effect: 'fadeScale',
  });


  // HOME BACKGROUND SLIDESHOW
  $(function () {
    jQuery(document).ready(function () {
      $('#home').backstretch([
        "images/home-bg-slideshow1.jpg",
        "images/home-bg-slideshow2.jpg",
      ], {
        duration: 2000,
        fade: 750
      });
    });
  })

  $('#new-request-submit').on('click', function () {
    if ($.trim($('#new-request-nickname').val()) === '') {
      alert('Пожалуйста, заполните поле "Имя"');
      return false;
    }

    if ($.trim($('#new-request-email').val()) === '') {
      alert('Пожалуйста, заполните поле "Email"');
      return false;
    }

    if ($.trim($('#new-request-message').val()) === '') {
      alert('Пожалуйста, заполните поле "Сообщение"');
      return false;
    }
    $('#new-request-submit').prop('disabled', true);
    $('#info').css('display', 'block');
    $('#info').css('cursor', 'pointer');
    $.ajax({
      type: "post",
      url: "/ajax/",
      data: {
        nickname: $('#new-request-nickname').val(),
        email: $('#new-request-email').val(),
        message: $('#new-request-message').val(),
      }

    }).done(function (data) {
      $('#info').html(data);
      $('#new-request-submit').prop('disabled', false);
    });
    $('#new-request-nickname').val('');
    $('#new-request-email').val('');
    $('#new-request-message').val('');
  });
  $('#info').on('click', function () {
    $(this).css('display', 'none');
  });
});