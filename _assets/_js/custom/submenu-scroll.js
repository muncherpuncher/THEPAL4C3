
$(function($) {

   $(window).scroll(function () {
        $('#marker').each(function () {
            if( ($(this).offset().top > ($(window).scrollTop() + $(window).height() - 20))) 
            {
                $(".sub-footer").hide();
                $(".footer-wrapper").css('position','fixed'); 
                
            } 
            else
            {
                $(".footer-wrapper").css('position','relative');  
                $(".sub-footer").show();
            }
        });
    });

});
