$(function () {
    $('#customCheck1').click(function () {
        $('.autoplay').toggleClass('d-none');
    });
    $('.btn-submit').click(function () {
        $('.repeater-slide').repeater();
    });
})