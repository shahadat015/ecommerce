/*!
 * betterRating jQuery Plugin
 * Author: @malithmcr
 * Email : malith.priyashan.dev@gmail.com
 * Licensed under the MIT license
 */

/*
    This plugin allow you to create beautiful rating form. already styled.
*/

;(function($){
    $.fn.extend({
        betterRating: function( options ) {
            /**
             * @option : wrapper - rating list wrapper div
             * @option : icon - fontAwesome icon name
             */
            this.defaultOptions = {
                wrapper: '#list',
                icon: 'fa fa-star',
            };
            var settings = $.extend({}, this.defaultOptions, options);
            this.getRating(settings);
            return this.each(function() {
                var $this = $(this);
            });
        },
        getRating: function(settings) {
            var self = this;

            $('.rating i').on('click', function(){
                $('#rating-count').val($(this).data('rate'));
                $(this).parent().find('i:lt(' + ($(this).index() + 1) + ')').addClass('selected');
            });

            $('.rating i').on('mouseover', function(){
                $(this).parent().children('.rating i').each(function(e){
                    $(this).removeClass('selected');
                });
                $(this).parent().find('i:lt(' + ($(this).index() + 1) + ')').addClass('hover');
            }).on('mouseout', function(){
                $(this).parent().children('.rating i').each(function(e){
                      $(this).removeClass('hover');
                });
            });

            $(this).submit(function( event ) {
                event.preventDefault();
                var formData = $(this).serializeArray();

                $.ajax({
                    type: this.method,
                    url: this.action,
                    data: formData,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend:function() {
                        $('.btn-submit').attr("disabled", true).html("<span class='spinner-border spinner-border-sm'></span> Loadding...");
                    },
                    success:function(data){
                        $.toast({
                            heading: 'Success',
                            text: data.success,
                            position: 'top-right',
                            loaderBg:'#ff5050',
                            bgColor: '#222',
                            icon: 'success',
                            hideAfter: 3000, 
                            stack: 6
                        });
                        $('#better-rating-form')[0].reset();
                    },
                    error(error) {
                        if(error.status == 422) {
                            var errors = error.responseJSON.errors;
                            var errorField = Object.keys(errors)[0];
                            var inputField = $('input[name="'+ errorField +'"], textarea[name="'+ errorField +'"]');
                            var errorMessage = errors[errorField][0];

                            // Show error message
                            if(inputField.next('.invalid-feedback').length == 0){
                                inputField.focus().after('<div class="invalid-feedback"> <strong>'+ errorMessage +'</strong> </div>');
                            }else{
                                inputField.focus();
                            }

                            // Remove error message
                            inputField.on('keydown, change', function() {
                                inputField.next('.invalid-feedback').remove();
                            });
                        }else{
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
                    },
                    complete:function() {
                        $('.btn-submit').attr("disabled", false).html('Submit Now');
                    }
                });
                
                $('#better-rating-list').append(self.template(formData));
            });
                
        },

        /** creation of the list template*/
        template: function(data) {
            var rating = '<i class="fa fa-star selected" data-rate="1"></i>';
            for(var i =1; i < data[1].value; i++) {
                rating += '<i class="fa fa-star selected" data-rate="1"></i>';
            }
            var list = '<li>';
            list += '<div class="profile-rating-wrapper">';
            list += ' <div class="profile-pic"><img src="images/profile_pic.png" alt="" /></div>';
            list += '<div class="name">'+data[0].value+' Wrote:</div>';
            list += '<div class="rating">'
            list += rating;
            list += '</div>';
            list += '</div>';
            list += '<div class="content">';
            list += '<p>'+data[2].value+'</p>';
            list += '</div>';
            list += '</li>';
            return list;
        }

    });

})(jQuery);