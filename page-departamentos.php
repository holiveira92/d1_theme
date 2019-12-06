<?php
require_once 'data_loader.php';
$data_loader        = new Data_Loader();
$id_modulos         = (!empty($_GET['id'])) ? $_GET['id'] : 0;
$slug               = (!empty($_GET['slug'])) ? $_GET['slug'] : "";
$dados              = $data_loader->get('departamentos',$id_modulos);
$dados              = $dados['data_departamentos'];
get_header();
?>
<body>
<!-- SEÇÃO HERO -->
<div id="hero" class="departamentos-hero" style='url("<?php echo $dados['url_img'];?>");'>
        <div class="mycontainer _16pad">
            <div class="dep-hero-wrapper">
                <div class="dep-hero-left">
                    <h6 class="lightblue type-gradient" data-ix="fade-in-on-load"><?php echo $dados['title'];?></h6>
                    <h1 class="h1white left noleft larger notop" data-ix="fade-in-on-load-2"><?php echo $dados['main_title'];?></h1>
                    <div class="h1white hero left" data-ix="fade-in-on-load-2"><?php echo $dados['description'];?></div>
                </div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownwhite.svg" width="12" alt=""></div>
    </div>

<!-- SEÇÃO DESAFIOS -->
<div id="desafios" class="departament-wrapper-grandient gradient-bg moremargin" data-ix="fade-in-on-scroll">
    <div class="mycontainer">
        <div class="servico-cards-wrapper top">
            <div class="section-title-2col">
                <h6 class="h1white"><?php echo $dados['challenge_title'];?></h6>
            </div>
            <div class="case-thumb-content-wrapper">
                <?php for($i=1;$i<=3;$i++):
                    $key_title      = "title";
                    if(!empty($dados["challenge$i"][$key_title])):
                ?>
                <div class="servicos-thumb-content">
                    <h3><?php echo $dados["challenge$i"]['title'];?></h3>
                    <p><?php echo $dados["challenge$i"]['description'];?></p>
                </div>
                <?php endif; endfor;?>
            </div>
        </div>
        
        <div class="departamento-select-wrapper">
                <div class="segmento-clientes-title">
                    <h1 class="h1white small-h1">Eu sou</h1>
                    <select id="cargo_nav">
                        <?php foreach($dados['cargos'] as $k=>$cargo): 
                            $selected_option = ($k == 0) ? 'selected' : ''    ;
                        ?>
                            <option value="<?php echo $cargo['id'];?>" <?php echo $selected_option;?>><?php echo $cargo['title'];?></option> 
                        <?php endforeach; ?>
                    </select>
                </div>
        </div>
        
        <!--
        <div class="departamento-select-wrapper">
                <div class="segmento-clientes-title">
                    <h1 class="h1white small-h1">Eu sou</h1>
                </div>
                <div class="departamento-select">
                    <div data-delay="0" class="dropdown-2 w-dropdown">
                        <div class="dropdown-toggle-2 w-dropdown-toggle">
                            <div class="icon-copy w-icon-dropdown-toggle"></div>
                            <div class="departamento-select-title-copy" name="cargo_nav" cargo_nav_id="<?php echo $dados['cargo_destaque']['id'];?>">
                                <?php //echo $dados['cargo_destaque']['title'];?>
                            </div>
                        </div>
                        <nav class="dropdown-list w-dropdown-list">
                        <?php //foreach($dados['cargos'] as $k=>$cargo): ?>
                            <a href="#" class="dropdown-link w-dropdown-link" name="cargo_nav" cargo_nav_id="<?php echo $cargo['id'];?>">
                                <?php //echo $cargo['title'];?>
                            </a>
                        <?php //endforeach; ?>
                        </nav>
                    </div>
                </div>
        </div><img src="<?php //echo get_template_directory_uri();?>/images/arrowupblack.svg" alt="" class="image-13 top">
        -->
    </div>
</div>

<!-- BENEFICIOS DA PLATAFORMA VIA CARGO - DESTAQUE-->
<!--
<div class="section-stripe blackbg cargo_content_target" name="cargo_content" id="<?php //echo $dados['cargo_destaque']['id'];?>">
    <div class="div-block-89">
        <h6 class="heading-23 type-gradient"><?php //echo $dados['cargo_destaque']['subtitle'];?></h6>
    </div>
    <div class="mycontainer">
        <div class="case-thumb-content-wrapper">
                <?php /* for($i=1;$i<=3;$i++):
                    $key_title      = "title";
                    if(!empty($dados['cargo_destaque']["description$i"])):
                        */
                ?>
                <div class="departamento-blackbox-wrapper">
                    <p class="h1white"><?php //echo insert_degrade($dados['cargo_destaque']["description$i"],$i+10);?></p>
                </div>
            <?php //endif; endfor;?>
        </div>
    </div>
</div>
-->

<!-- BENEFICIOS DA PLATAFORMA VIA CARGO - ITENS -->
<?php foreach($dados['cargos'] as $k=>$cargo): 
    $display_option = ($k == 0) ? 'display:block;' : 'display:none;';
?>
<div class="section-stripe blackbg cargo_content_target" name="cargo_content" id="<?php echo $cargo['id'];?>" style="<?php echo $display_option ;?>">
    <div class="div-block-89">
        <h6 class="heading-23 type-gradient"><?php echo $cargo['subtitle'];?></h6>
    </div>
    <div class="mycontainer">
        <div class="case-thumb-content-wrapper">
                <?php for($i=1;$i<=3;$i++):
                    if(!empty($cargo["description$i"])):
                ?>
                <div class="departamento-blackbox-wrapper">
                    <p class="h1white"><?php echo insert_degrade($cargo["description$i"],$i+10);?></p>
                </div>
            <?php endif; endfor;?>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- SEÇÃO KEY POINTS -->
<?php
    $cont = 1;
    foreach($dados['features'] as $key=>$kp):
        if(($cont%2 != 0) ):
?>
<div id="beneficios" class="section-wrapper bottom-line" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="section-2col-wrapper narrow2 bottommargin">
                <div class="section-col-left">
                    <h1 class="heading-35"><?php echo $kp['title'];?></h1>
                    <div class="text-block-13 left"><?php echo $kp['description'];?></div>
                </div>
                <div class="section-col-left center mobi right">
                    <img src="<?php echo $kp['url_img'];?>" width="1004"  alt="" class="image-4">
                </div>
            </div>
        </div>
    </div>
<?php else:?>
    <div id="key-point" class="section-wrapper bottom-line lesstop" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="section-2col-invert-wrapper narrow">
                <div class="section-col-left center mobi left">
                    <img src="<?php echo $kp['url_img'];?>" width="1004"  alt="" class="image-4"></div>
                <div class="section-col-left">
                    <h1 class="heading-35"><?php echo $kp['title'];?></h1>
                    <div class="text-block-12"><?php echo $kp['description'];?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<?php $cont++; endforeach; ?>

<!-- SEÇÃO FEATURES PRINCIPAIS -->
<div id="features-principais" class="section-featured lesstop" data-ix="fade-in-on-scroll">
    <div class="mycontainer">
        <div class="div-block-100 nopad">
            <div class="section-col-left wide left">
                <h1 class="lieghtblue type-gradient"><?php echo $dados['modulos_options']['modulos_title'];?></h1>
                <div class="text-block-12"><?php echo $dados['modulos_options']['modulos_descricao'];?></div>
            </div>
            <a href="#" class="link-block-2 w-inline-block">
                <div class="ver-plat">
                    <div class="text-block-31">VER PLATAFORMA</div><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt=""></div>
            </a>
        </div>

        <div class="div-block-99 left narrow">
        <?php
            foreach($dados['modulos'] as $key=>$mod):
        ?>
            <div class="card-feature _8pad _16pad" name="card_feature" url="modulos?id=<?php echo $mod['id_segmento'];?>">
                <img src="<?php echo $mod['url_img'];?>" alt="" class="margin">
                <h1 class="small-head"><?php echo $mod['title'];?></h1>
                <div class="text-block-12"><?php echo $mod['description'];?></div>
                    <img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="image-21 moremargin">
            </div>
        <?php endforeach; ?>
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
            <a href="case?slug=<?php echo sanitize_title($card['title_card']);?>&id=<?php echo $card['id_card'];?>" style='text-decoration:none;'>
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

<script>
jQuery(document).ready(function($) {
    /*
    $('[name*=cargo_nav]').click(function(){
        var cargo_nav_id = $(this).attr('cargo_nav_id');
        if(cargo_nav_id != undefined || cargo_nav_id !=""){
            $(".cargo_content_target").each(function(){
                $(this).hide();
            });
            $('#'+cargo_nav_id).show();
        }
    });
    */

    $('[name*=card_feature]').click(function(){
        var url_redirect = $(this).attr('url');
        window.location.href = url_redirect;
    });

    $('#cargo_nav').change(function(){
        var cargo_nav_id = $(this).val();
        if(cargo_nav_id != undefined || cargo_nav_id !=""){
            $(".cargo_content_target").each(function(){
                $(this).hide();
            });
            $('#'+cargo_nav_id).show();
        }
    }); 
});
</script>