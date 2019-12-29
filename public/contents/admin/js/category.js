$(function() {
    // create and update request
    $(document).on('submit', '#category-form', function (event) {
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
                    location.reload();
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
                    var inputField = $('input[name="'+ errorField +'"]');
                    var errorMessage = errors[errorField][0];

                    // Show error message
                    if(inputField.next().length == 0){
                        inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
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

    // Delete multiple data
    $(document).on('click', '.delete-category', function() {
        var id = [];
        var url = $(this).data('url');

        $('.jstree-clicked').each(function() {
            id.push($(this).parent().data('id'));
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
                                location.reload();
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

    // retive single item
    $(document).on('click', '.jstree-anchor', function () {

        var url = $(this).parent().data('url');

        Pace.restart();
        Pace.track(function () {

            $.ajax({
                url: url,
                type: "GET",
                dataType: "HTML",
                success(data) {
                    $('#category-form').html(data);
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