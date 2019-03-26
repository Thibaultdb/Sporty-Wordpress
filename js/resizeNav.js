(function ($) {
    $(window).scroll(function () {
        if ($(document).scrollTop() > 350) {
            $('header').addClass('shrink');
        } else {
            $('header').removeClass('shrink');
        }
    });
})(jQuery);