(function (window, document, $, undefined) {
    'use strict';

// Back to Top
$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.back-to-top').fadeIn();
    } else {
        $('.back-to-top').fadeOut();
    }
});
$('.back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 0);
    return false;
});
// Back to Top End

$(document).ready(function(){

});

})(window, document, jQuery);
