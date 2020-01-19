$(function () {
    $('#manage-stock').on('change', function () {
        var val = $(this).val();

        if(val == 1){
            $('#qty').removeClass('d-none');
        }else{
            $('#qty').addClass('d-none');
        }
    });
});