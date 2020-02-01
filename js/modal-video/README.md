### Modal de vídeo para a D1

Adicione o arquivo css no head ou mescle o conteúdo do arquivo no final do seu style.css.

Após o procedimento acima, adicione o código abaixo na página em que deseja adicionar o modal.

```html
 <div class="modal">
    <div class="modal-body">
        <div class="close">
            <img src="./close.svg" alt="Fechar Modal" class="close-modal">
        </div>

        <div class="iframe-res" data-url="https://player.vimeo.com/video/238447560">
            <!-- VIDEO CONTAINER -->
        </div>
    </div>
</div>
```

O único parâmetro relevante é o ***data-url***. É aqui que iremos pasar a url do vídeo selecionado.

Atualmente suportamos os serviços de vídeo **YouTube** e **Vimeo**.

Para finalizar, adicione o código javascript abaixo.

```javascript
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
    var videoUrl = container.data('url')
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

        setTimeout(function() {
            iframeContainer.find('iframe').remove()
            modal.removeClass('modal-opened')
        }, 310)
    } else {
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
        return '<iframe src="'+url+'?autoplay=true" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    } else {
        return '<iframe src="'+url+'?autoplay=true" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>'
    }
}

$('.open-modal, .modal, modal-body .close').on('click', toggleModalVisibility)
```