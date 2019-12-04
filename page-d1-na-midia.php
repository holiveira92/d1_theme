<?php
require_once 'data_loader.php';
$data_loader = new Data_Loader();
$dados = $data_loader->get('d1_midia');
$dados = $dados['data_midia'];
//pre($dados['noticias']);die;
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

        <div class="noticias-title">
            <h6>NOTÍCIAS</h6>
        </div>
        <div id="noticias" class="div-block-62">
        <?php
            $cont = 0;
            foreach($dados['noticias'] as $key=>$noticia):
        ?>
            <a href="#" class="card-midia margin type-gradient w-inline-block">
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


<?php get_footer();?>
</body>