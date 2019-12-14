$(function() {
	// create and update request
	$(document).on('submit', '#form-horizontal', function (event) {
		event.preventDefault();

		var formdata = new FormData($(this)[0]);

		// console.log(formdata);

		$.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend:function() {
                $('a[href="#finish"]').attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
            },
            success(data) {
                if(data.success) {
                    Swal.fire(
				        'Success',
				        data.success,
				        'success',
				    );
                    $("#form-horizontal").reset();
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
                    inputField.next().remove();
                    inputField.after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');

                    // Hide error message
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
                $('a[href="#finish"]').attr("disabled", false).html("Finish");
            }
        });
	});

	// Delete request
	$(document).on('click', '.delete', function (event) {
		event.preventDefault();
		var url = $(this).attr("href");

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
            	$.ajax({
                    url: url,
                    type: "DELETE",
                    dataType: "JSON",
                    success(data) {
                        if(data.success) {
				              Swal.fire(
				                'Deleted!',
				                data.success,
				                'success'
				              );
                        }else{
                            Swal.fire(
				                'Ops!',
				                data.error,
				                'error'
				            );
                        }
                    }
                });
            }
        })

	});
})