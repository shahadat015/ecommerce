$(function() {

    $(document).on('click', '.image-picker', function() {
        $('.bd-example-modal-xl').modal('show');

        window.imgType = $(this).data('image');
    });

    $(document).on('click', '.select-image', function(e) {
        e.preventDefault();

        var path = $(this).data('src');
        var val = $(this).data('id');

        if(imgType == 'single'){
            $('.image-holder').html('<image src="'+ path +'"><input type="hidden" name="image_id" value="'+ val +'"><button type="button" class="btn remove-image"><i class="fas fa-times"></i></button>');
            $('.bd-example-modal-xl').modal('hide');
        }
        if(imgType == 'multiple'){
            $('.placeholder').remove();
            $('.image-list').append('<div class="image-holder"><image src="'+ path +'"><input type="hidden" name="images[]" value="'+ val +'"><button type="button" class="btn remove-image"><i class="fas fa-times"></i></button></div>');

            Swal.fire({
                position: 'top-end',
                text: 'Image successfully selected!',
                showConfirmButton: false,
                timer: 1000
            });
        }
    });

    $(document).on('click', '.remove-image', function() {
        if(imgType == 'single'){
            $(this).parent().html('<i class="far fa-image"></i>');
        }
        if(imgType == 'multiple' && $('.image-holder').length == 1){
            $('.image-list').html('<div class="image-holder placeholder"><i class="far fa-image"></i></div>');
        }else{
            $(this).parent().remove();
        }
    });

});
