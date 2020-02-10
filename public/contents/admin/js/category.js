$(function() {
    // create request
    $(document).on('submit', '#create-category', function (event) {
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
                    $('#jstree-checkbox').jstree("refresh");
                    $('#create-category')[0].reset();
                    return getCategories();
                }else{
                    return errorMessage(data.error);
                }
            },
            error(error) {
                if(error.status == 422) {
                    var errors = error.responseJSON.errors;
                    var errorField = Object.keys(errors)[0];
                    var inputField = $('name="'+ errorField +'"]');
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


    // update request
    $(document).on('submit', '#update-category', function (event) {
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
                    $('#jstree-checkbox').jstree("refresh");
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

    // Delete multiple data
    $(document).on('click', '.delete-category', function() {
        var id = [];
        var url = $(this).data('url');

        $('.jstree-clicked').each(function() {
            id.push($(this).parent().attr('id'));
        });

        id.push($(this).attr('id'));

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
                        data: {id:id},
                        type: "DELETE",
                        dataType: "JSON",
                        success(data) {
                            if(data.success) {
                                location.reload();
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

    function getCategories() {
        $.ajax({
            url: route('getCategories'),
            type: "GET",
            dataType: "HTML",
            success(data) {
                $('#category').html(data);
            },
            error(error) {
                return errorStatusText(error);
            }
        });
    }

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

    function route(route){
        var url = route.replace(/\./g, '/');
        return window.origin + '/admin/' + url;
    }

});