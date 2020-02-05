$(function() {
    // create menu
    $(document).on('submit', '#create-menu', function (event) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);

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
                    window.location = route('menus.edit', data.id);
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('input[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown', function() {
                        inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                $('.btn-submit').attr("disabled", false).html("Submit");
            }
        });
    });


    // update menu
    $(document).on('submit', '#update-menu', function (event) {
        event.preventDefault();

        var formdata = new FormData($(this)[0]);

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
                    return successMessage(data.success);
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('input[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next('.invalid-feedback').length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown', function() {
                        inputField.next('.invalid-feedback').remove();
                    });
                }else{
                    return errorStatusText(error);
                }
            },
            complete:function() {
                $('.btn-submit').attr("disabled", false).html("Update");
            }
        });
    });

    // update menu item order

    $('.dd').on('change', function() {

        Pace.restart();
        Pace.track(function () {

            $.ajax({
                type: 'PUT',
                url: route('menus.items.order'),
                contentType: 'application/json; charset=utf-8',
                data: JSON.stringify($('.dd').nestable('serialize')[0]),
                success(data) {
                    return successMessage(data.success);
                },
                error(error) {
                   return errorStatusText(error);
                },
            });
        });
    });

    // delete menu item

    $(document).on('click', '.btn-destroy', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        var id = $(e.currentTarget).closest('.dd-item').data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f1646c',
            cancelButtonColor: '#4d79f6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                Pace.restart();
                Pace.track(function () {

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        dataType: "JSON",
                        success(data) {
                            if(data.success) {
                                $(`.dd-item[data-id=${id}]`).fadeOut();
                                return successMessage(data.success);
                            }else{
                                return errorMessage(data.error);
                            }
                        },
                        error(error) {
                            return errorStatusText(error);
                        }
                    });
                });
            }
        });
    });

    // show hide menu type
    $('.menu-type').on('change', function () {
        var type = $(this).val();
        if(type == 'page'){
            $('.menu-page').removeClass('d-none');
            $('.menu-category, .menu-url').addClass('d-none');
        }else if(type == 'url'){
            $('.menu-url').removeClass('d-none');
            $('.menu-category, .menu-page').addClass('d-none');
        }else{
            $('.menu-category').removeClass('d-none');
            $('.menu-url, .menu-page').addClass('d-none');
        }
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
        var result = url.search(/edit\b/i);

        if(result != -1){
            var url = url.replace(/edit\b/i, id + '/edit');
            return window.origin + '/admin/' + url;
        }else{
            if(id){
                return window.origin + '/admin/' + url + '/' + id;
            }else{
                return window.origin + '/admin/' + url;
            }
        }
    }

});