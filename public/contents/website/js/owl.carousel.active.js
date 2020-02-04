(function ($) {
    'use strict';
    
    /*--------------------------
     Banar Slide Animation active
    ---------------------------- */
    $(".banar_slider_active").on('translate.owl.carousel', function () {
        $('.banar_content h3').removeClass('fadeInUp animated').hide();
        $('.banar_content p').removeClass('fadeInUp animated').hide();
        $('.banar_content a').removeClass('fadeInUp animated').hide();
    })

    $(".owl-carousel").on('translated.owl.carousel', function () {
        $('.owl-item.active .banar_content h3').addClass('fadeInUp animated').show();
        $('.owl-item.active .banar_content p').addClass('fadeInUp animated').show();
        $('.owl-item.active .banar_content a').addClass('fadeInUp animated').show();
    })
    //
    //====================================================================//
    // summer slide Active
    //====================================================================//
    //
    $('.summer_slide_active').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        autoplayTimeout: 8000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3,
                margin: 10,
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    //
    //====================================================================//
    // new arival slide Active
    //====================================================================//
    //
    $('.new_arival_slider_active').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        autoplayTimeout: 8000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3,
                margin: 10,
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    //
    //====================================================================//
    // teshirt slide Active
    //====================================================================//
    //
    $('.teshirt_slide_active').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        autoplayTimeout: 9000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3,
                margin: 10,
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    //
    //====================================================================//
    // gadget slide Active
    //====================================================================//
    //
    $('.gadegt_slider_active').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        autoplayTimeout: 9000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3,
                margin: 10,
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    //
    //====================================================================//
    // brand shope slide Active
    //====================================================================//
    //
    $('.shope_brand_slide_active').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        responsive: {
            0: {
                items: 2,
                margin: 0,
            },
            576: {
                items: 3
            },
            768: {
                items: 4,
                margin: 10,
            },
            992: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    });

    /*--------------------------
     feater design slide active
    ---------------------------- */
    $('.product_page_feater_product_slide_active').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        autoplay: true,
        mouseDrag: false,
        autoplayTimeout: 10000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    /*--------------------------
     related product slide active
    ---------------------------- */
    $('.related_product_slide_active').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
        autoplay: true,
        mouseDrag: false,
        smartSpeed: 700,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

})(jQuery);