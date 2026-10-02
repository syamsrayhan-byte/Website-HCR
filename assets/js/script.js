jQuery( document ).ready(function( $ ){

  var $move_element = $('blockquote > .table-of-contents, blockquote > .c-ads, figure > .c-ads, iframe > .c-ads, pre > .c-ads, code > .c-ads, table > .c-ads, embed > .c-ads, form > .c-ads, option > .c-ads, video > .c-ads, blockquote .c-also-read, blockquote.wp-block-quote .c-also-read');
  $move_element.parent().after($move_element);
  
  $('ul.nav li.has-dropdown li ul li ul li .dropdown, body.eipro-news .c-profile.sidebar .container>ul>li ul li .dropdown, body.eipro-business .c-profile.sidebar .container>ul>li ul li .dropdown, ol .c-ads, ul .c-ads, li .c-ads').remove();
  $('ul.nav>li.has-dropdown>a, ul.nav>li>ul>li.has-dropdown>a, ul.nav>li>ul>li>ul>li.has-dropdown>a, body.eipro-news .c-profile.sidebar .container>ul>li.has-dropdown>a, body.eipro-business .c-profile.sidebar .container>ul>li.has-dropdown>a').prepend('<svg xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none"><path d="M8.69376 0.184874C8.63565 0.126294 8.56653 0.0797971 8.49037 0.0480667C8.41421 0.0163363 8.33251 0 8.25001 0C8.1675 0 8.08581 0.0163363 8.00965 0.0480667C7.93348 0.0797971 7.86436 0.126294 7.80626 0.184874L4.94376 3.04737C4.88566 3.10595 4.81653 3.15245 4.74037 3.18418C4.66421 3.21591 4.58251 3.23225 4.50001 3.23225C4.4175 3.23225 4.33581 3.21591 4.25965 3.18418C4.18348 3.15245 4.11436 3.10595 4.05626 3.04737L1.19376 0.184874C1.13566 0.126294 1.06653 0.0797971 0.990368 0.0480667C0.914205 0.0163363 0.832514 0 0.750007 0C0.6675 0 0.585809 0.0163363 0.509647 0.0480667C0.433484 0.0797971 0.364359 0.126294 0.306257 0.184874C0.18985 0.301975 0.124512 0.460383 0.124512 0.625499C0.124512 0.790615 0.18985 0.949022 0.306257 1.06612L3.17501 3.93487C3.52657 4.286 4.00313 4.48322 4.50001 4.48322C4.99688 4.48322 5.47344 4.286 5.82501 3.93487L8.69376 1.06612C8.81016 0.949022 8.8755 0.790615 8.8755 0.625499C8.8755 0.460383 8.81016 0.301975 8.69376 0.184874Z" fill="#2A3141"/></svg>');

  $('.ei-datatable').fadeIn();

  $(".main-navigation .nav-right span.search").click(function() {
    $("body").addClass("search-active");
    $(".nav-left .nav li.has-dropdown>ul").removeClass("active");
  });
  $(".search-overlay, .search-form span.c-close").click(function() {
    $("body").removeClass("search-active");
  });
  $(".c-float-ad-left span.c-close").click(function() {
    $(".c-float-ad-left").fadeOut();
  });
  $(".c-float-ad-right span.c-close").click(function() {
    $(".c-float-ad-right").fadeOut();
  });

  $(".main-navigation .nav-collapse .profile img, .menu-toggle").click(function() {
    $(".sidebar, .sidebar-overlay").addClass("active");
    $(".nav-left .nav li.has-dropdown>ul").removeClass("active");
  });
  $(".sidebar-overlay, .c-profile span.c-close").click(function() {
    $(".sidebar, .sidebar-overlay").removeClass("active");
  });

  // Mobile Menu
  $('.nav-left .nav li.has-dropdown').click(function() {
      $('.nav-left .nav li.has-dropdown>ul').not($(this).children("ul").toggleClass("active")).removeClass("active");
  });
  $('body.eipro-news .c-profile.sidebar .container>ul>li.has-dropdown, body.eipro-business .c-profile.sidebar .container>ul>li.has-dropdown').click(function() {
      $('body.eipro-news .c-profile.sidebar .container>ul>li.has-dropdown>ul, body.eipro-business .c-profile.sidebar .container>ul>li.has-dropdown>ul').not($(this).children("ul").toggleClass("active")).removeClass("active");
  });
  // End Mobile Menu

  var modalHide = $('.c-modal-hide');
  var body = $('body');
  modalHide.click(function() {
      body.addClass('modal-hide');
      localStorage.setItem('eipModalHide', true);
  });
  if (localStorage.getItem("eipModalHide")) {
      body.addClass('modal-hide');
  }

  // videoPlay
  $(document).on('click','.ei-js-videoPoster',function(e) {
    e.preventDefault();
    var poster = $(this);
    var wrapper = poster.closest('.ei-js-videoWrapper');
    videoPlay(wrapper);
  });

  function videoPlay(wrapper) {
    var iframe = wrapper.find('.ei-js-videoIframe');
    var src = iframe.data('src');
    wrapper.addClass('ei-videoWrapperActive');
    iframe.attr('src',src);
  }

  // scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() === 0) {
        $('body').addClass('afterback-scroll');
    } else {
        $('body').removeClass('afterback-scroll');
    }
  });

});

// Menu
(function () {
  // detect touch
  if ("ontouchstart" in document.documentElement) {
    document.documentElement.className += " touch-device";
  }

  const scroller = document.querySelector(".navwrap");
  const dropDown = document.querySelectorAll(".dropdown");
  scroller.addEventListener("scroll", checkScroll);

  function checkScroll() {
    document.activeElement.blur();
    scroller.classList.add("isScrolling");
    for (let i = 0; i < dropDown.length; i++) {
      dropDown[i].style.transform =
        "translateX(-" + scroller.scrollLeft + "px)";
    }
    scroller.classList.remove("isScrolling");
  }
})();

document.addEventListener('DOMContentLoaded', function() {

  // setAttribute img
  const selector = ".c-logo a img, article figure img, .c-modal-body img";
  const images = document.querySelectorAll(selector);
  for (let i = 0; i < images.length; i++) {
    const img = images[i];
    img.setAttribute('width', img.naturalWidth);
    img.setAttribute('height', img.naturalHeight);
  }

  // floatAds
  const floatAdsElement = document.querySelector('.c-float-ads');
  if(floatAdsElement){
    floatAdsElement.classList.add('c-active');
  }

});
