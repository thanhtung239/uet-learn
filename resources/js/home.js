$(function () {
  $('.feedback-slider-comment').slick({
    draggable: true,
    infinite: true,
    speed: 400,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    speed: 400,
    prevArrow: '<button class="slick-arrow prev-arrow"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button class="slick-arrow next-arrow"><i class="fas fa-chevron-right"></i></button>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

  setTimeout(function () {
    $('.success-msg, .error-msg').fadeOut('fast');
  }, 2000);
 
  $('[data-toggle="popover"]').popover();

  $('.nav-tabs a').on('click', function () {
    $(this).tab('show');
  });

  var chatbox = document.getElementById('fbCustomerChat');
  chatbox.setAttribute("page_id", "108828021517439");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function () {
    FB.init({
      xfbml: true,
      version: 'v11.0'
    });
  };

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  $('.navbar-toggler-element').on('click', function () {
    if ($('.navbar-toggler-element .fas.fa-bars').hasClass('d-none') && !$('.navbar-toggler-element .fas.fa-times').hasClass('d-none')) {
      $('.navbar-toggler-element .fas.fa-bars').removeClass('d-none');
      $('.navbar-toggler-element .fas.fa-times').addClass('d-none');
      $('#body').removeClass('d-none');
      $('footer').removeClass('d-none');
    } else {
      $('.navbar-toggler-element .fas.fa-bars').addClass('d-none');
      $('.navbar-toggler-element .fas.fa-times').removeClass('d-none');
      $('#body').addClass('d-none');
      $('footer').addClass('d-none');
    }
  });

  $('.navbar .navbar-nav .nav-link').on('click', function () {
    $('.navbar .navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');

    if ($('.navbar-collapse-element').hasClass('show')) {
      $('.navbar-collapse-element').removeClass('show')
      $('.navbar-toggler-element').removeClass('collapse');
      $('.navbar-toggler-element .fas.fa-bars').removeClass('d-none');
      $('.navbar-toggler-element .fas.fa-times').addClass('d-none');
      $('#body').removeClass('d-none');
      $('footer').removeClass('d-none');
    }
  });

  if ($('#registerTab input').hasClass('is-invalid')) {
    $('#loginRegisterModal').modal('show');
    $('#registerNavTab').trigger('click');
  }
  if ($('#loginTab input').hasClass('is-invalid')) {
    $('#loginRegisterModal').modal('show');
    $('#loginNavTab').trigger('click');
  }

  $('.close-tab').on('click', function () {
    $('#loginRegister input').removeClass('is-invalid');
    $('#loginRegister input').val('');
    $('.login-tab').hide();
  });

  $('#logoutButton').on('click', function (event) {
    $('#logoutForm').submit();
  });
});
