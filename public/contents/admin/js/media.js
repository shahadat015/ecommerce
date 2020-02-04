$(function() {

    $(document).on('click', '.image-picker', function() {
        window.modal = $('.bd-example-modal-xl');
        modal.modal('show');
        window.imgPicker = $(this);
    });

    // add image
    $(document).on('click', '.select-image', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        var path = $(this).data('src');
        var id = $(this).data('id');
        var imgType = imgPicker.data('image');
        var name = imgPicker.data('name');

        if(imgType == 'single'){
            imgPicker.prev().children().html('<image src="'+ url +'"><input type="hidden" name="'+ name +'" value="'+ path +'"><button type="button" class="btn remove-image"  data-image="single"><i class="fas fa-times"></i></button>');
            modal.modal('hide');
        };

        if(imgType == 'multiple'){
            $('.placeholder').remove();
            $('.image-list').append('<div class="image-holder"><image src="'+ url +'"><input type="hidden" name="'+ name +'" value="'+ id +'"><button type="button" class="btn remove-image" data-image="multiple"><i class="fas fa-times"></i></button></div>');
            return successMessage('Image successfully added!');
        };

        if(imgType == 'slider'){
            imgPicker.children().html('<image src="'+ url +'"><input type="hidden" name="'+ name +'" value="'+ path +'">');
            modal.modal('hide');
        }
    });

    // remove image
    $(document).on('click', '.remove-image', function() {
        var imgType = $(this).data('image');

        if(imgType == 'single'){
            $(this).parent().html('<i class="far fa-image"></i><input type="hidden" name="image_id" value="">');
        }

        if(imgType == 'multiple' && $('.image-list .image-holder').length == 1){
            $('.image-list').html('<div class="image-holder placeholder"><i class="far fa-image"></i></div>');
        }else{
            $(this).parent().remove();
        }
    });

    $('#datatable').DataTable({
        serverSide: true,
        ajax: route('images.datatables'),
        columns: [
            { name: 'path' },
            { name: 'name' },
            { name: 'action', orderable: false, searchable: false }
        ]
    });

    // show success message
    function successMessage(message) {
        $.toast({
            heading: 'Success',
            text: message,
            position: 'bottom-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3000, 
            stack: 6
        });
    };

    function route(route){
        var url = route.replace(/\./g, '/');
        return window.origin + '/admin/' + url;
    }

});

Dropzone.options.myDropzone = {
    paramName: "file",
    maxFilesize: 2,
    init() {
        this.on("success", function(file) {
            $('#datatable').DataTable().ajax.reload();
        });
    }
};
