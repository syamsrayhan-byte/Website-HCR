(function (window, document, $, undefined) {
    'use strict';

$(document).ready(function(){
	
	$('.post_carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3300,
      speed: 1300,
      prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M19,11H9l3.293-3.293L10.879,6.293,6.586,10.586a2,2,0,0,0,0,2.828l4.293,4.293,1.414-1.414L9,13H19Z"/></svg><span>Prev</span></button>',
      nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="512" height="512"><g id="_01_align_center" data-name="01 align center"><path d="M17.414,10.586,13.121,6.293,11.707,7.707,15,11H5v2H15l-3.293,3.293,1.414,1.414,4.293-4.293A2,2,0,0,0,17.414,10.586Z"/></g></svg><span>Next</span></button>'
  });
  $('.c-trending-display-area').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 4300,
      speed: 1300,
      prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M19,11H9l3.293-3.293L10.879,6.293,6.586,10.586a2,2,0,0,0,0,2.828l4.293,4.293,1.414-1.414L9,13H19Z"/></svg><span>Prev</span></button>',
      nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="512" height="512"><g id="_01_align_center" data-name="01 align center"><path d="M17.414,10.586,13.121,6.293,11.707,7.707,15,11H5v2H15l-3.293,3.293,1.414,1.414,4.293-4.293A2,2,0,0,0,17.414,10.586Z"/></g></svg><span>Next</span></button>'
  });
  $('.news-grid-style1-wrap').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3800,
      speed: 1000,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
  });

});

$(window).scroll(function() {
  var scrollTop = $(this).scrollTop();
  var lastScrollTop = $(this).data('lastScrollTop') || 0;
  var space_main_nav = $(".main-navigation").height();
  var space_nav = $(".main-navigation .nav-collapse .nav-left").height();

  if (scrollTop > lastScrollTop) {
    $('body').addClass('c-scroll-active');
    $(".main-navigation").css("top", 0 - (space_main_nav + 27) + space_nav + "px");
  } else {
    $('body').removeClass('c-scroll-active');
    $(".main-navigation").css("top", 0);
  }

  if ($(this).scrollTop() === 0) {
      $('body').removeClass('c-scroll-active');
  }

  $(this).data('lastScrollTop', scrollTop);
});

})(window, document, jQuery);
