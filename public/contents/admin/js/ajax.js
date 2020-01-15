$(function() {
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
                    Swal.fire(
				        'Success',
				        data.success,
				        'success',
				    );
                    $("#create-form")[0].reset();
                    $('.invalid-feedback').remove();
                }else{
                    Swal.fire(
				        'Error',
				        data.error,
				        'error',
				    );
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
                	Swal.fire(
				        'Ops!',
				        error.statusText,
				        'error',
				    );
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
                    Swal.fire(
                        'Success',
                        data.success,
                        'success',
                    );
                    $('.invalid-feedback').remove();
                }else{
                    Swal.fire(
                        'Error',
                        data.error,
                        'error',
                    );
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
                    Swal.fire(
                        'Ops!',
                        error.statusText,
                        'error',
                    );
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

        if(id.length == 0){
            Swal.fire(
                'Ops!',
                'Please select at least one data',
                'error'
            );
            return;
        }

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
                                Swal.fire(
                                    'Deleted!',
                                    data.success,
                                    'success'
                                );
                                $('#datatable').DataTable().ajax.reload();
                                $(".btn-delete").attr('disabled', true);
                                $('.check-all').prop("checked", false);
                            }else{
                                Swal.fire(
                                    'Ops!',
                                    data.error,
                                    'error'
                                );
                            }
                        },
                        error(error) {
                            Swal.fire(
                                'Ops!',
                                error.statusText,
                                'error',
                            );
                        }
                    });
                });
            }
        });
    });

    // Retrieve attribute values
    $(document).on('change', '.attributes', function () {
        var id = $(this).val();
        var url = window.origin + '/admin/attribute/values/' + id;
        var select = $(this);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success(data) {
                select.parent().next().children('.select2-multiple').html(data);
            },
            error(error) {
                Swal.fire(
                    'Ops!',
                    error.statusText,
                    'error',
                );
            }
        });
    });

    // Retrieve global options
    $(document).on('click', '#btn-global', function () {
        var id = $('#option').val();
        var url = window.origin + '/admin/option/values/' + id;

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
                            // (Required)
                            // Specify the jQuery selector for this nested repeater
                            selector: '.repeater-custom-show-hide-inner'
                        }]
                    });
                },
                error(error) {
                    Swal.fire(
                        'Ops!',
                        error.statusText,
                        'error',
                    );
                }
            });
        });
    });

});