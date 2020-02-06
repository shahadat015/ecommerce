(function ($) {
    'use strict';
    //
    //====================================================================//
    // Global Vriable
    //====================================================================//
    //
    var readline = $(window);
    var page = $('html, body');
    $('#auto-collapse-menu-demo').metisMenu();
    // category menu toggle
    $('.categor_menu_btn').on('click', function () {
        $('#category_menu_mobile_content').addClass('category_show');
    });
    $('.cat_close_btn').on('click', function () {
        $('#category_menu_mobile_content').removeClass('category_show');
    });
    
    //
    //====================================================================//
    // scroll top active
    //====================================================================//
    $(".scrolltop").on('click', function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1000)
    });

    $('.user_cart_box').on('click', function(){
        $('.cart_togle_content').toggleClass('cart_show');
    })

    $('.show_icon').on('click', function(){
        $('.close_icon').addClass('close_show');
        $('.show_icon').addClass('show_icon_hide');
        $('#moble_menu_menu_content').addClass('mobile_menu_show');
    })

    $('.close_icon').on('click', function(){
        $('.close_icon').removeClass('close_show');
        $('.show_icon').removeClass('show_icon_hide');
        $('#moble_menu_menu_content').removeClass('mobile_menu_show');
    })

    // Add to cart
    $(document).on("click", ".addtocart", function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $("#addtocart-form").attr("action", url);
        $("#addtocart-form").submit();
    });

    // Delete form cart
    $(document).on("click", ".removetocart", function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $("#removetocart-form").attr("action", url);
        $("#removetocart-form").submit();
    });

})(jQuery);
