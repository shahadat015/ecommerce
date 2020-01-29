jQuery(document).ready(function($){
    // Remove empty fields from GET forms
    $("#filter-form").submit(function() {
        $(this).find(":input").filter(function(){ 
            return !this.value; 
        }).attr("disabled", "disabled");
        return true; // ensure form still submits
    });

    // Un-disable form fields when page loads, in case they click back after submission
    $( "#filter-form" ).find( ":input" ).prop( "disabled", false );

    // submitting form
    $('#type').on('change', function () {
    	$('#filter-form').submit();
    });

});