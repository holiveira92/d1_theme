jQuery(document).ready(function($) {
    //tratamento mobile
   $('div[name*=slider_principal]').each(function(index) {
       var imageUrl = $(this).find('[name*=slider_principal_style]').val();
       var stripes = $(this).find('[name*=slider_principal_style_stripes]').val();
       var gradient = "-webkit-gradient(linear, left top, left bottom, from(transparent), to(transparent))";
        if(window.matchMedia("(max-width: 991px)").matches){
            var str = 'background-image:  ' + gradient + ', url("' + imageUrl + '")'; 
            $(this).attr('style', str);
        }else{
           var str = 'background-image:  url("'+ stripes + '"),' + gradient + ', url("' + imageUrl + '")'; 
           $(this).attr('style', str);
        }
    });

    $('#departamentos_hero').each(function(index) {
        var imageUrl = $(this).find('[name*=departamentos_hero_style_desktop]').val();
        var stripes = ""; //$(this).find('[name*=slider_principal_style_stripes]').val();
        var gradient =""; //"-webkit-gradient(linear, left top, left bottom, from(transparent), to(transparent))";
         if(window.matchMedia("(max-width: 991px)").matches){
             var str = 'background-image:  ' + gradient + ', url("' + imageUrl + '")'; 
             $(this).attr('style', str);
         }else{
            var str = 'background-image:  url("'+ stripes + '"),' + gradient + ', url("' + imageUrl + '")'; 
            $(this).attr('style', str);
         }
     });

    // Função para mostrar/esconder o modal
    function toggleModalVisibility() {
        // Serviços de vídeo suportados por este modal.
        const YOUTUBE = 'youtube'
        const VIMEO = 'vimeo'

        // Propriedades do modal.
        var modal = $('.modal')
        var modalBody = modal.find('.modal-body')
        var iframeContainer = modalBody.find('.iframe-res')

        // Vídeo a ser reproduzido
        var container = modal.find('.iframe-res')
        //var videoUrl = container.data('url') //trocando para link do webflow
        var videoUrl = $('.open-modal').attr('data-url')
        var videoType = ''

        if (videoUrl.includes(YOUTUBE)) {
            videoType = YOUTUBE
        } else if (videoUrl.includes(VIMEO)) {
            videoType = VIMEO
        } else {
            throw new Error('Serviço não suportado')
        }

        // Construimos o iframe de acordo com o serviço de vídeo
        var iframe = buildIframeForVideo(videoType, videoUrl)

        // Este modal será aberto ou já está aberto?
        if (modal.hasClass('modal-opened')) {
            modalBody.removeClass('modal-body-opened')
            modal.hide()
            setTimeout(function() {
                iframeContainer.find('iframe').remove()
                modal.removeClass('modal-opened')
            }, 310)
        } else {
            modal.show()
            modal.addClass('modal-opened')
            modalBody.addClass('modal-body-opened')
            $(iframe).appendTo(iframeContainer)
        }
    }

    function buildIframeForVideo(type, url) {
        const YOUTUBE = 'youtube'
        const VIMEO = 'vimeo'

        if (typeof(type) !== 'string') {
            throw new Error('Tipo de vídeo indefinido.')
        }

        if (type === YOUTUBE) {
            url = url.replace('watch?v=','embed/') 
            return '<iframe src="'+url+'?autoplay=true" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        } else {
            return '<iframe src="'+url+'?autoplay=true" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>'
        }
    }

    $('.open-modal, .modal, modal-body .close').on('click', toggleModalVisibility)
});