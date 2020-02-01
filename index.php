<?php
function dirname_oldphp($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}
session_start(); 
$language_option = !empty($_SESSION['d1_language_option']) ? $_SESSION['d1_language_option'] : "PT";
$language = (!empty($language_option) && $language_option != "PT") ? $language_option ."_" : "";
require(trim(dirname_oldphp(__FILE__,4)) . "wp-load.php");
wp_load_alloptions();
require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
require_once 'data_loader.php';
$data_loader        = new Data_Loader();
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data($language_option);
$data_home = $GLOBALS["data"]["d1_plugin"];
$id_lead_generator_cta = !empty($data_home['secao5_cta']) ? $data_home['secao5_cta'] : 0;
$lead_generator_cta =  $data_loader->get_cta($id_lead_generator_cta);
$heroes_list = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_home_hero")),true);
$modulos = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_modulos")),true);
$menu = wp_get_nav_menus();
$menu_itens = wp_get_nav_menu_items($menu[0]->term_id);
$menu_pai = get_menus_data($menu_itens);
get_header();
?>

<head>
    <meta charset="utf-8">
    <title><?php wp_title(''); ?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri().'/';?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/d1web.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart" in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document)</script>
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
    <link href="<?php echo $data_header['d1_favicon'];?>" rel="shortcut icon" type="image/x-icon">
</head>

<body>

<!-- SEÇÃO HERO -->
<div id="hero" class="home-hero">
    <div class="arrowdown"><img src="<?php echo get_template_directory_uri();?>/images/arrow-hero.svg" width="12" alt=""></div>
    <div data-delay="4000" data-animation="fade" data-autoplay="1" data-nav-spacing="0" data-duration="500" data-infinite="1" class="slider w-slider">
        <div class="mask w-slider-mask">
        <?php
            foreach($heroes_list as $k=>$hero):
                $id_home_cta = !empty($hero['id_cta']) ? $hero['id_cta'] : 0;
                $home_cta = $data_loader->get_cta($id_home_cta);
                $cont = 1;
        ?>
            <div class="_1-slide w-slide" style="background-image: url('<?php echo get_template_directory_uri();?>/images/stripes-h_black_trans.png'), -webkit-gradient(linear, left top, left bottom, from(transparent), to(transparent)), url('<?php echo $hero['img_url_bg_hero'];?>')">
                <div class="mycontainer _1">
                    <div class="home-hero-wrapper">
                        <div class="home-hero-left left nopad" data-ix="fade-in-on-load">
                            <h1 class="h1white herohome maintitle rightpad"><?php echo insert_degrade($hero['chamada_principal'],2);?></span></h1>
                            <div class="paragrafo white"><?php echo $hero['descricao_primaria'];?></div>
                            <!-- Botão CTA -->
                            <a href="<?php echo $home_cta['link'];?>" data-url="<?php echo $home_cta['video_url'];?>" target="<?php echo $home_cta['target'];?>" 
                            class="btn-gradient hero w-button <?php echo $home_cta['icon'];?>"><?php echo $home_cta['title'];?></a>
                            <!-- Fim Botão CTA -->
                            <div class="h1white pad20 small type-gradient"><?php echo insert_degrade($hero['descricao_secundaria'],2);?></div>
                        </div>
                        <div class="home-hero-right">
                            <h3 class="h1white nomargin"><?php echo $hero['hero_name'];?></h3>
                            <div class="div-block-97"></div>
                            <h6 class="lightblue type-gradient"><?php echo $hero['hero_cargo'];?></h6>
                            <div class="h1white pad20 client"><?php echo $hero['hero_descricao'];?></div>
                            <img src="<?php echo $hero['img_url_logo_hero_company'];?>" alt="" class="home-hero-logo-partner">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
        
        <div class="left-arrow w-slider-arrow-left">
            <div class="icon-2 w-icon-slider-left"></div>
        </div>
        <div class="right-arrow w-slider-arrow-right">
            <div class="icon-3 w-icon-slider-right"></div>
        </div>
        <div class="slide-nav type-gradient w-slider-nav w-slider-nav-invert w-shadow w-num"></div>
    </div>
</div>

    <div class="home-wrapper-gradient gradient-bg">
        <div class="div-block-84">
            <div class="mycontainer">
                <div class="section-title-2col">
                    <h6 class="white _18"><?php echo $data_home['secao2_section_title'];?></h6>
                    <div class="link-text-arrow">
                        <a href="<?php echo get_home_url() ."/cases/";?>" class="link-text-black invert"><?php echo $data_home['secao2_call_action_cases'];?>
                            <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEÇÃO CASES DE SUCESSO -->
    <div id="cases" class="section-cases">
        <div class="home-wrapper-gradient-2">
            <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_select             = "secao2_select_card_cases" . $i;
                    $query                  = "SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases where id_card = '" . $data_home[$key_select] ."'";
                    $card                   = json_decode(json_encode($wpdb->get_results($query)),true);
                    $card                   = !empty($card[0]) ? $card[0] : array();
                    $cases_options          = !empty($card['cases_options']) ? json_decode($card['cases_options'],true) : array();
                    $id_categoria_case      = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
                    $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias where id = $id_categoria_case")),true);
                    $categoria              = !empty($categoria[0]) ? $categoria[0] : array('descricao' => '');
                    $is_whitepaper          = (!empty($cases_options['is_whitepaper']) && $cases_options['is_whitepaper']) ? $cases_options['is_whitepaper'] : false;
                    $link                   = ($is_whitepaper) ? $card['card_link'] : get_home_url() ."/case/" . sanitize_title($card['title_card']) . "/" . $card['id_card'];
                    $target                 = ($is_whitepaper) ? "_blank" : "_self";
                    $categoria['descricao'] = ($is_whitepaper) ? $card['subtitle_card'] : $categoria['descricao'];
                ?>
                <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                <a href="<?php echo $link;?>" target="<?php echo $target;?>" style='text-decoration:none;'>
                    <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                    <h6 class="lightblue type-gradient"><span><?php echo $categoria['descricao'];?></span></h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                        <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                    </div>
                    <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20" style='float:right;'>
                </div>
                </a>
                    <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- SEÇÃO CLIENTES -->
    <div id="logo-clientes" class="section-wrapper-large">
        <div class="mycontainer">
            <div class="section-title" data-ix="fade-in-on-scroll">
                <h6 class="darkgrey pad20 center"><?php echo $data_home['secao3_empresas_title'];?></h6>
            </div>
            <div class="logo-clients-wrapper" data-ix="fade-in-on-scroll">
                <?php
                for($i=1;$i<=8;$i++):
                    $key_img = "secao3_img_empresa" . $i ;
                ?>
                    <div class="image-clientes-block"><img src="<?php echo $data_home[$key_img];?>" alt=""></div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- SEÇÃO DESAFIO -->
    <div class="section-wrapper hide">
        <div class="mycontainer">
            <div class="section-title">
                <h6 class="darkgrey pad20"><?php echo $data_home['secao4_section_title_part3'];?></h6>
            </div>
            <div class="case-thumb-content-wrapper" data-ix="fade-in-on-scroll-2">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_title      = "secao4_title_card2_case" . $i ;
                    $key_subtitle   = "secao4_subtitle_card2_case" . $i ;
                    $key_link       = "secao4_link_card2_case" . $i ;
                ?>
                    <a href="<?php echo $data_home[$key_link];?>" target="_blank" style='text-decoration:none;'>
                    <div class="desafio-thumb-content">
                        <div class="case-thumb-title">
                            <h3 class="h1white cardleft"><?php echo $data_home[$key_title];?></h3>
                            <div><?php echo $data_home[$key_subtitle];?></div>
                        </div>
                    </div>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- SEÇÃO LEAD GENERATOR -->
    <div class="section-wrapper-large black-bg-stripe hide">
        <div class="mycontainer">
            <div class="section-1col-wrapper" data-ix="fade-in-on-scroll-2">
                <h1 class="h1white calculadora type-gradient"><?php echo insert_degrade($data_home['secao5_section_title'],3);?></h1>
                <div class="paragrafo"><?php echo $data_home['secao5_section_descricao'];?></div>
                    <!-- Botão CTA -->
                    <a href="<?php echo $lead_generator_cta['link'];?>" data-url="<?php echo $lead_generator_cta['video_url'];?>" target="<?php echo $lead_generator_cta['target'];?>" 
                    class="btn-cx w-button <?php echo $lead_generator_cta['icon'];?>"><?php echo $lead_generator_cta['title'];?></a>
                    <!-- Fim Botão CTA -->

                </div>
        </div>
    </div>

<!-- --------------------------------------------------------INICIO SEÇÃO ESTRUTURA CABULOSA DA SOLUÇÃO -------------------------------------------------------------------------------->
    <!-- SEÇÃO SOLUÇÃO -->
    <div id="modulos-plat" class="tab-section-wrapper grey-bg nomargin" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="tabs-section-title-2col">
                <h6 class="pad20 left lightblueleft lightblue"><?php echo $data_home['secao6_title'];?></h6>
                <div class="link-text-arrow right noinvert">
                    <a href="<?php echo get_home_url() ."/plataforma";?>" class="link-text-black">VER PLATAFORMA</a>
                    <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink">
                </div>
            </div>

            <div data-duration-in="300" data-duration-out="100" class="home-tabs w-tabs">
                <!-- SEÇÃO TITULOS DA ESTRUTURA DE SOLUÇÕES -->
                <div class="tabs-menu w-tab-menu">
                    <?php
                    $modulos = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_modulos WHERE id_modulo IS NULL OR id_modulo = '' ")),true);
                    $i=1;
                    foreach($modulos as $key=>$modulo):
                        $title_class = ($key == 0) ? 'w--current' : "";
                    ?>
                        <a data-w-tab="Tab <?php echo $i;?>" class="home-tab-link w-inline-block w-tab-link <?php echo $title_class;?>">
                            <div><?php echo $modulo['title'];?></div>
                        </a>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                </div>
                    
                <!-- SEÇÃO TITULOS DA ESTRUTURA DE SOLUÇÕES -->
                <div class="tabs-content w-tab-content">

                    <!-- SEÇÃO ITENS DA ESTRUTURA DE SOLUÇÕES -->
                    <?php
                    $i_mod=1;
                    foreach($modulos as $key=>$modulo):
                        $id_modulo = $modulo['id'];
                        $itens = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_modulos WHERE id_modulo = $id_modulo")),true);
                        $tab_class = ($i_mod == 1) ? 'w--tab-active' : "";
                    ?>
                    <div data-w-tab="Tab <?php echo $i_mod;?>" class="tab-pane-tab-1 w-tab-pane <?php echo $tab_class;?>">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <!-- SEÇÃO SUBITENS DA ESTRUTURA DE SOLUÇÕES -->
                            <div class="tabs-menu-2 w-tab-menu">
                                <?php
                                $j=1;
                                foreach($itens as $k=>$item):
                                    $subitem_tab_class = ($j == 1) ? 'w--current' : "";
                                ?>

                                <a data-w-tab="Tab <?php echo $j;?>" class="home-tab-link w-inline-block w-tab-link <?php echo $subitem_tab_class;?>">
                                    <div><?php echo $item['subtitle'];?></div>
                                </a>
                                <?php $j++;endforeach; ?>
                            </div>


                            <!-- SEÇÃO CONTEUDO DA ESTRUTURA DE SOLUÇÕES -->
                            <div class="w-tab-content">
                            <?php
                            $j=1;
                            foreach($itens as $k=>$item):
                                $subitem_tab_class = ($j == 1) ? 'w--tab-active' : "";
                                $item['url_img'] = (!empty($item['url_img'])) ? $item['url_img'] : $img_default 
                            ?>
                                <div data-w-tab="Tab <?php echo $j;?>" class="w-tab-pane <?php echo $subitem_tab_class;?>">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>
                                                <?php echo $item['description'];?>
                                            </p>
                                            <a href="<?php echo $item['url_link'];?>" class="text-link-blue"> <?php echo $item['text_link'];?> </a>
                                        </div>
                                        <div class="motionblock"><img src="<?php echo $item['url_img'];?>" width="900" alt="" class="image-11"></div>
                                    </div>
                                </div>
                            <?php $j++;endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <?php $i_mod++; endforeach; ?>
                </div>

            </div>
        </div>
    </div>
<!-- --------------------------------------------------------FIM SEÇÃO ESTRUTURA CABULOSA DA SOLUÇÃO -------------------------------------------------------------------------------->

    <!-- SEÇÃO DIFERENCIAL -->
    <div class="section-wrapper-large gradient-bg">
        <div class="mycontainer">
            <div class="section-2col-wrapper">
                <div class="section-col-left" data-ix="fade-in-on-scroll">
                    <h1 class="pad20"><?php echo $data_home['secao7_section_title'];?></h1>
                    <div class="pad20">
                        <?php echo str_replace("\n",'<br />',$data_home['secao7_section_descricao']);?>
                    </div>
                    <a target='_blank' href="<?php echo $lead_generator_cta['link'];?>" class="btn-black-home-play w-button"><?php echo $lead_generator_cta['title'];?></a></div>
                <div class="section-colright"><img src="<?php echo $data_home['secao7_img'];?>" width="673"></div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>