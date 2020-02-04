<?php
require_once 'data_loader.php';
$data_loader        = new Data_Loader();
$id_modulos         = get_query_var('id');
$slug               = get_query_var('slug');
$dados              = $data_loader->get('modulos',$id_modulos);
$dados              = $dados['data_modulos'];
?>
<head>
    <title><?php echo mb_convert_case($dados['title'], MB_CASE_TITLE, "UTF-8");?> - D1</title>
</head>
<?php
get_header();
?>
<body>
<!-- SEÇÃO HERO -->
<div id="hero" class="journey-hero">
    <div class="mycontainer bigmargin narrow">
        <div class="section-2col-wrapper">
            <div class="section-col-left-2" data-ix="fade-in-on-load">
                <h1 class="h1white pad20 main" data-ix="fade-in-on-load-2"><?php echo $dados['title'];?></h1>
                <div class="h1white"><?php echo $dados['description'];?></div>
            </div>
            <div class="section-col-left center" data-ix="fade-in-on-load-2">
                <img src="<?php echo $dados['url_img'];?>" width="810" alt="" class="image-6-copy">
            </div>
        </div>
    </div>
    <div class="arrowdown"><img src="<?php echo get_template_directory_uri();?>/images/arrowdownblack.svg" width="12" alt=""></div>
</div>

<!-- SEÇÃO DESAFIOS -->
<div id="desafios" class="modulo-wrapper-grandient gradient-bg">
    <div class="mycontainer">
        <div class="modulos-card-wrapper" data-ix="fade-in-on-scroll">
            <div class="section-title">
                <h6 class="h1white"><?php echo $dados['challenge_title'];?></h6>
            </div>
            <div class="case-thumb-content-wrapper nopad">
                <?php for($i=1;$i<=3;$i++):
                    $key_title      = "title";
                    if(!empty($dados["challenge$i"][$key_title])):
                ?>
                <div class="modulo-thumb-content">
                    <h3 class="h1white"><?php echo $dados["challenge$i"]['title'];?></h3>
                    <p class="h1white"><?php echo $dados["challenge$i"]['description'];?></p>
                </div>
                <?php endif; endfor;?>
            </div>
        </div>
    </div>
</div>

<!-- SEÇÃO FEATURES -->
<?php
    $cont = 1;
    foreach($dados['features'] as $key=>$kp):
        if(($cont%2 != 0) ):
?>
    <div id="key-feature" class="section-wrapper">
        <div class="mycontainer">
            <div class="section-2col-wrapper narrow" data-ix="fade-in-on-scroll">
                <div class="section-col-left">
                    <h1 class="heading-45 notop"><?php echo $kp['title'];?></h1>
                    <div class="pad20"><?php echo $kp['description'];?></div>
                </div>
                <div class="section-col-left center"><img src="<?php echo $kp['url_img'];?>" width="1004" alt="" class="image-4"></div>
            </div>
        </div>
    </div>
<?php else:?>
    <div id="key-feature" class="section-wrapper greybg">
    <div class="mycontainer">
        <div class="section-2col-invert-wrapper" data-ix="fade-in-on-scroll">
            <div class="section-col-left center"><img src="<?php echo $kp['url_img'];?>" width="515" alt="" class="image-4"></div>
            <div class="section-col-left">
                <h1 class="heading-30"><?php echo $kp['title'];?></h1>
                <div class="left"><?php echo $kp['description'];?></div>
            </div>
        </div>
    </div>
    </div>
<?php endif;?>
<?php $cont++; endforeach; ?>

<!-- SEÇÃO CASES DE SUCESSO -->
<div id="cases" class="section-wrapper-large greybg">
    <div class="mycontainer">
        <div class="tabs-section-title-2col narrow">
            <h6 class="pad20"><?php echo $dados['cases_options']['cases_title'];?></h6>
            <div class="link-text-arrow noinvert"><a href="<?php echo get_home_url();?>/cases/" class="link-text-black"><?php echo $dados['cases_options']['cases_chamada'];?></a><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="arrowlink"></div>
        </div>
        <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
        <?php foreach($dados['cases'] as $key=>$card): 
            $is_whitepaper  = (!empty($card['is_whitepaper']) && $card['is_whitepaper']) ? $card['is_whitepaper'] : false;
            $link           = ($is_whitepaper) ? $card['card_link'] : get_home_url() ."/case/" . sanitize_title($card['title_card']) . "/" . $card['id_card'];
            $target         = ($is_whitepaper) ? "_blank" : "_self";
            $card['categoria']['descricao'] = ($is_whitepaper) ? $card['subtitle_card'] : $card['categoria']['descricao'];    
        ?>
            <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
            <a href="<?php echo $link;?>" target="<?php echo $target;?>" style='text-decoration:none;'>
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