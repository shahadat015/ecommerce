$(function() {

    // ajax init
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // search form
    $(document).on('keyup', '.search', function () {

        var query = $(this).val();
        var preloader = $('.search-preloader');
        var search_box = $('.typed-search-box');
        var message = $('.search-nothing');
        var products = $('.product ul');

        // console.loh

        if(query.length){
            search_box.removeClass('d-none');
        }else{
           search_box.addClass('d-none');
           return;
        }

        $.ajax({
            url: route('search'),
            type: "POST",
            data: {query},
            dataType: "HTML",
            cache: false,
            beforeSend:function() {
                preloader.removeClass('d-none');
            },
            success(data) {
                if(!$.isEmptyObject(data)){
                    message.addClass('d-none')
                    products.html(data);
                }else{
                    products.empty();
                    message.removeClass('d-none').children().text(query);
                }
            },
            complete:function() {
                preloader.addClass('d-none');
            }
        });
    });

    // coupon form
    $(document).on('submit', '#coupon', function (e) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);
        var btnText = $('.btn-submit').text();
        var btn = $('.btn-submit');

        $.ajax({
            url: route('coupon'),
            type: "POST",
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                btn.attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    $("#coupon")[0].reset();
                    $('.invalid-feedback').remove();
                    return cartContent() + successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown, change', function() {
                        inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                btn.attr("disabled", false).html(btnText);
            }
        });
    });

	// contact form
	$(document).on('submit', '#contact-form', function (event) {
		event.preventDefault();

		var formdata = new FormData($(this)[0]);
        var btnText = $('.btn-submit').text();
        var btn = $('.btn-submit');

		$.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                btn.attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    $("#contact-form")[0].reset();
                    $('.invalid-feedback').remove();
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
            	if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown, change', function() {
                    	inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                btn.attr("disabled", false).html(btnText);
            }
        });
	});

    // subscriber form
    $(document).on('submit', '#subscriber-form', function (event) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);
        var btnText = $('.btn-subscribe').text();
        var btn = $('.btn-subscribe');

        $.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                btn.attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    $("#subscriber-form")[0].reset();
                    $('.invalid-feedback').remove();
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown, change', function() {
                        inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                btn.attr("disabled", false).html(btnText);
            }
        });
    });

    // account update form
    $(document).on('submit', '#account-update', function (event) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);
        var btnText = $('.btn-submit').text();
        var btn = $('.btn-submit');

        $.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                $('.btn-submit').attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    $('.invalid-feedback').remove();
                    $('#account-modal').modal('hide');
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown, change', function() {
                        inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                $('.btn-submit').attr("disabled", false).html(btnText);
            }
        });
    });

    // add to cart
    $(document).on('click', '.addtocart', function(e) {
        e.preventDefault();
        var action = $(this).attr('href');
        var btnText = $(this).html();
        var btn = $(this);

        $.ajax({
            url: action,
            type: "POST",
            dataType: "JSON",
            cache: false,
            beforeSend:function() {
                btn.html("<span class='spinner-border spinner-border-sm'></span>");
            },
            success(data) {
                if(data.success) {
                    $('.user_cart_box').load(route('cart.item'));
                    $('.mini-cart').load(route('cart.minicart'));
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorStatusText(error);
            },
            complete:function() {
                btn.html(btnText);
            }
        });
    });

    // update cart qty
    $(document).on('click', '.btn-qty .btn-increment, .btn-qty .btn-decrement', function(e){
        if(e.currentTarget.closest('.input-group-append')){
            var qty = $(this).parent().prev().val(); 
            var rowId = $(this).parent().parent().prev().data('rowid'); 
        }else{
            var qty = $(this).parent().next('input').val();    
            var rowId = $(this).parent().parent().prev().data('rowid');    
        }

        var action = route('cart.update', rowId);
        var btnText = $(this).html();
        var btn = $(this);

        $.ajax({
            url: action,
            data: {qty},
            type: "PUT",
            dataType: "JSON",
            cache: false,
            beforeSend:function() {
                btn.html("<span class='spinner-border spinner-border-sm'></span>");
            },
            success(data) {
                if(data.success) {
                    $('.user_cart_box').load(route('cart.item'));
                    $('.mini-cart').load(route('cart.minicart'));
                    return cartContent();
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorStatusText(error);
            },
            complete:function() {
               btn.html(btnText);
            }
        });
    });

    // retrive cart contents
    function cartContent(){
        $.ajax({
            url: route('cart.content'),
            type: "GET",
            dataType: "HTML",
            cache: false,
            success(data) {
                $('#cart-content').html(data);
                $("input[type='number']").InputSpinner(); 
            },
            error(error) {
                return errorStatusText(error);
            },
        });
    }

    // remove from cart 
    $(document).on('click', '.removefromcart', function(e) {
        e.preventDefault();
        var action = $(this).attr('href');
        var btn = $(this);

        $.ajax({
            url: action,
            type: "POST",
            dataType: "JSON",
            cache: false,
            beforeSend:function() {
                btn.attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span>");
            },
            success(data) {
                if(data.success) {
                    $('.user_cart_box').load(route('cart.item'));
                    $('.mini-cart').load(route('cart.minicart'));
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorStatusText(error);
            },
            complete:function() {
                btn.closest('.mini_cart_item').fadeOut();
                return cartContent();
            }
        });
    });

    // add to cart form
    $(document).on('submit', '#addtocart-form', function (event) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);
        var btn = $('.btn-submit')
        var btnText = $('.btn-submit').html();

        $.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                btn.attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    $('.user_cart_box').load(route('cart.item'));
                    $('.mini-cart').load(route('cart.minicart'));
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorStatusText(error);
            },
            complete:function() {
                btn.attr("disabled", false).html(btnText);
            }
        });
    });


    // add to favorite
    $(document).on('click', '.addtofavorite', function(e) {
        e.preventDefault();
        var action = $(this).attr('href');
        var btnText = $(this).html();
        var btn = $(this);

        $.ajax({
            url: action,
            type: "POST",
            dataType: "JSON",
            cache: false,
            beforeSend:function() {
                btn.html("<span class='spinner-border spinner-border-sm'></span>");
            },
            success(data) {
                if(data.success) {
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorMessage('Please Login before to add favorite');
            },
            complete:function() {
                btn.html(btnText);
            }
        });
    });

    // remove from favorite
    $(document).on('click', '.removefavorite', function(e) {
        e.preventDefault();
        var action = $(this).attr('href');
        var _this = $(this);

        $.ajax({
            url: action,
            type: "DELETE",
            dataType: "JSON",
            cache: false,
            success(data) {
                if(data.success) {
                    _this.closest('.order_status_item').fadeOut();
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                return errorStatusText(error);
            },
        });
    });

    // show success message
    function successMessage(message) {
        $.toast({
            heading: 'Success',
            text: message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3000, 
            stack: 6
        });
    };

    // show error message
    function errorMessage(message) {
        $.toast({
            heading: 'Error',
            text: message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3000, 
            stack: 6
        });
    };

    // show error ststus
    function errorStatusText(error) {
        $.toast({
            heading: error.status,
            text: error.statusText,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3000, 
            stack: 6
        });
    }

    // make route to url
    function route(route, id){
        var url = route.replace(/\./g, '/');

        if(id){
            return window.origin + '/' + url + '/' + id;
        }else{
            return window.origin + '/' + url;
        }
    }
});