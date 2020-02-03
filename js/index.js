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
        var videoUrl = $('.btn-gradient.play').attr('data-url')
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