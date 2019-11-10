jQuery(document).ready(function($) {
    $('.w-nav-button').on('tap', function() {
        var el = $(this);
        var body = $('body') 
        if(el.hasClass('w--open')){
            body.removeClass('noScroll')
        }else{
            body.addClass('noScroll')
        }
    });
});