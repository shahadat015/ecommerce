$(function() {

    // ajax init
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	// create request
	$(document).on('submit', '#create-form', function (event) {
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
                    $("#create-form")[0].reset();
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
                    var inputField = $('input[name="'+ errorField +'"], select[name="'+ errorField +'"], textarea[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next().length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown', function() {
                    	inputField.next().remove();
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
    $(document).on('submit', '#update-form', function (event) {
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
                    var inputField = $('input[name="'+ errorField +'"], select[name="'+ errorField +'"], textarea[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next().length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                    }else{
                        inputField.focus();
                    }

                    // Remove error message
                    inputField.on('keydown', function() {
                        inputField.next().remove();
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

    // check all checkbox
    $(document).on('click', '.check-all', function(){
        $('.delete-checkbox').not(this).prop('checked', this.checked);
    });

    // input checked or not
    $(document).on('click','.delete-checkbox, .check-all, .jstree-anchor', function(){
        if($(this).is(":checked, .jstree-clicked")){
            $(".btn-delete, .delete-category").attr('disabled', false);
        }

        // Uncheck checkbox
        if($('.delete-checkbox:checked').length < $('.delete-checkbox').length){
            $('.check-all').prop("checked", false);
        }else{
            $('.check-all').prop("checked", true);
        }

        // Button disable if check length is 0
        if($('.delete-checkbox:checked, .jstree-clicked').length == 0){
            $(".btn-delete, .delete-category").attr('disabled', true);
        }
    });

    // Delete multiple data
    $(document).on('click', '.btn-delete', function() {
        var id = [];
        var url = $(this).data('url');

        $('.delete-checkbox:checked').each(function() {
            id.push($(this).val());
        });

        id.push($(this).data('id'));

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
                                $('#datatable').DataTable().ajax.reload();
                                $(".btn-delete").attr('disabled', true);
                                $('.check-all').prop("checked", false);
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

    // Retrieve attribute values
    $(document).on('change', '.attributes', function () {
        var id = $(this).val();
        var url = route('attribute.values', id);
        var select = $(this);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success(data) {
                select.parent().next().children('.select2-multiple').html(data);
            },
            error(error) {
                return errorStatusText(error);
            }
        });
    });

    // Retrieve global options
    $(document).on('click', '#btn-global', function () {
        var id = $('#option').val();
        var url = route('option.values', id);

        Pace.restart();
        Pace.track(function () {

            $.ajax({
                url: url,
                type: "GET",
                dataType: "HTML",
                success(data) {
                    $('.option').append(data);
                    $('.repeater-option').repeater({
                        repeaters: [{
                            // Specify the jQuery selector for this nested repeater
                            selector: '.repeater-custom-show-hide-inner'
                        }]
                    });
                },
                error(error) {
                    return errorStatusText(error);
                }
            });
        });
    });

    // update order status
    $(document).on('change', '.status', function () {
        var url = $(this).data('url');
        var status = $(this).val();

        Pace.restart();
        Pace.track(function () {

            $.ajax({
                url: url,
                type: "POST",
                data: {status},
                dataType: "JSON",
                success(data) {
                    if(data.success){
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
    });

    // order invoice email dend
    $(document).on('click', '.btn-mail', function (e) {
        e.preventDefault();
        
        var url = $(this).attr('href');

        Pace.restart();
        Pace.track(function () {

            $.ajax({
                url: url,
                type: "GET",
                success(data) {
                    return successMessage(data.success);
                },
                error(error) {
                    return errorStatusText(error);
                }
            });
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

    function route(route, id){
        var url = route.replace(/\./g, '/');
        return window.origin + '/admin/' + url + '/' + id;
    }
});