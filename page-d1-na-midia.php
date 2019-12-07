<?php
require_once 'data_loader.php';
$data_loader = new Data_Loader();
$dados = $data_loader->get('d1_midia');
$dados = $dados['data_midia'];
get_header();
?>

<body>

<div class="mycontainer-3-copy">
    <div class="div-block-60 deepblue" data-ix="fade-in-on-load">
        <h3 class="heading-31 type-gradient"><?php echo $dados['midia_secao1_title'];?></h3>
    </div>
    <div class="div-block-64" data-ix="fade-in-on-load-2">
        <div class="featured-title">
            <h6><?php echo $dados['midia_secao1_destaque_title'];?></h6>
        </div>
        <!-- SEÇÃO NOTICIAS DESTAQUE D1 -->
        <a id="destaque" href="<?php echo $dados['destaque']['link'];?>" target='_blank' class="card-midia type-gradient w-inline-block">
            <div class="div-block-59" style='background-image: url("<?php echo $dados['destaque']['url_img_bg'];?>");'></div>
            <div class="div-block-61">
                <h3 class="article-title"></h3>
                <p class="black righpad"><?php echo $dados['destaque']['content'];?></p>
                <div class="div-block-66">
                    <h6 class="heading-32"><?php echo $dados['destaque']['vehicle'];?><br></h6>
                    <div class="body-text-2"><?php echo date('d/m/Y',strtotime($dados['destaque']['publication_date']));?></div>
                    <div class="ver-noticia">
                        <div><?php echo $dados['midia_secao1_text_link'];?></div>
                        <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt=""></div>
                </div>
            </div>
        </a>

        <!-- SEÇÃO NOTICIAS D1 -->
        <div class="noticias-title">
            <h6>NOTÍCIAS</h6>
        </div>
        <div id="noticias" class="div-block-62">
        <?php
            $cont = 0;
            foreach($dados['noticias'] as $key=>$noticia):
                if($dados['destaque']['id'] == $noticia['id'])
                    continue;
        ?>
            <a href="<?php echo $noticia['link'];?>"  target="_blank" class="card-midia margin type-gradient w-inline-block">
                <div class="div-block-59" style='background-image: url("<?php echo $noticia['url_img_bg'];?>");'></div>
                <div class="div-block-61">
                    <h3><?php echo $noticia['title'];?></h3>
                    <p class="paragraph-6"><?php echo $noticia['content'];?></p>
                    <div class="div-block-66">
                        <h6 class="heading-33"><?php echo $noticia['vehicle'];?><br></h6>
                        <div class="body-text-2"><?php echo date('d/m/Y',strtotime($noticia['publication_date']));?></div>
                        <div class="ver-noticia">
                            <div><?php echo $dados['midia_secao1_text_link'];?></div>
                            <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt=""></div>
                    </div>
                </div>
            </a>
        <?php $cont++; endforeach;?>

        </div>
    </div>
</div>

<!-- SEÇÃO CASES DE SUCESSO -->
<div id="cases" class="section-wrapper-large greybg">
    <div class="mycontainer">
        <div class="tabs-section-title-2col narrow">
            <h6 class="pad20"><?php echo $dados['cases_options']['cases_title'];?></h6>
            <div class="link-text-arrow noinvert"><a href="../cases/" class="link-text-black">VER CASES</a><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="arrowlink"></div>
        </div>
        <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
        <?php foreach($dados['cases'] as $key=>$card): ?>
            <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
            <a href="<?php echo get_home_url();?>/case/<?php echo sanitize_title($card['title_card']);?>/<?php echo $card['id_card'];?>" style='text-decoration:none;'>
                <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                <h6 class="lightblue type-gradient"><?php echo $card['categoria']['descricao'];?></h6>
                <div class="case-thumb-numbers">
                    <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                    <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                </div>
                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20">
            </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer();?>
</body>