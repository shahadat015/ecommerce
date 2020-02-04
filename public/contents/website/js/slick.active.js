(function ($) {
    'use strict';
    
    // details page slider
    $('.details_slide_active_top').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.details_slide_active_bottom'
    });

    $('.details_slide_active_bottom').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.details_slide_active_top',
        dots: false,
        arrows: false,
        autoplay: true,
        focusOnSelect: true
    });

})(jQuery);
