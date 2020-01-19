$(document).ready(function() {
    "use strict";
    $(".repeater-default").repeater(), $(".repeater-custom-show-hide").repeater({
        show: function() {
            $(this).slideDown();
        },
        hide: function(e) {
            confirm("Are you sure you want to remove this item?") && $(this).slideUp(e)
        },

        repeaters: [{
            // Specify the jQuery selector for this nested repeater
            selector: '.repeater-custom-show-hide-inner'
        }]
        
    });

    $(".repeater-attribute").repeater({
        show: function() {
            $(this).slideDown();
            $('.select2-container').remove();
            $('.select2').select2();
            $('.select2-container').css('width','100%');
        },
        hide: function(e) {
            confirm("Are you sure you want to remove this item?") && $(this).slideUp(e)
        }
    });
});