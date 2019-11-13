<?php
function dirname_oldphp($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}
require(trim(dirname_oldphp(__FILE__,4)) . "wp-load.php");
wp_load_alloptions();
require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data();
$data_segmentos = $GLOBALS["data"]["d1_plugin_segmentos"];
$id_segmento = 1; //buscar ao abrir
$id_card = $data_segmentos['segmentos_secao3_card_select'];
$card = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = $id_card")),true);
$card = !empty($card[0]) ? $card[0] : array();
$segmento = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_segmentos WHERE id=$id_segmento")),true);
$segmento = !empty($segmento[0]) ? $segmento[0] : array();
$key_points = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_key_points where page = 'segmentos'")),true);
$challenge1 = (!empty($segmento['challenge1'])) ? json_decode($segmento['challenge1'],true) : array();
$challenge2 = (!empty($segmento['challenge2'])) ? json_decode($segmento['challenge2'],true) : array();
$challenge3 = (!empty($segmento['challenge3'])) ? json_decode($segmento['challenge3'],true) : array();
$menu = wp_get_nav_menus();
$menu_itens = wp_get_nav_menu_items($menu[0]->term_id);
$menu_pai = get_menus_data($menu_itens);
?>

<head>
    <meta charset="utf-8">
    <title><?php echo $data_header['d1_web_title'];?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri().'/';?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/d1web.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri().'/';?>js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/webflow.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/index.js" type="text/javascript"></script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart" in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document)</script>
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
    <link href="<?php echo $data_header['d1_favicon'];?>" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">
    
<div class="wrapper-menu">
    <!-- aba de alerta -->
    <div class="div-block-69">
        <div class="div-block-70">
            <div class="secondary-text type-gradient"><span>Quer saber as melhoras práticas do mercado de Customer Experience?</span></div><a href="#" class="link-top-menu">Descubra aqui</a></div>
        <div><a href="#" class="link-top-menu-copy type-gradient"><span>LOG IN</span></a>
            <div class="div-block-71 hide">
                <div data-delay="0" class="dropdown-3 w-dropdown">
                    <div class="dropdown-toggle-3 w-dropdown-toggle">
                        <div class="icon w-icon-dropdown-toggle"></div><img src="<?php echo get_template_directory_uri().'/';?>images/brasilflag.svg" alt="">
                        <div class="text-block-6">PT</div>
                    </div>
                    <nav class="dropdown-list-2 w-dropdown-list"><a href="#" class="dropdown-link-2 w-dropdown-link">EN</a></nav>
                </div>
            </div>
        </div>
    </div>

    <!-- menus -->
    <div data-collapse="medium" data-animation="over-right" data-duration="400" data-doc-height="1" data-no-scroll="1" class="navbar-3 w-nav">
        <a href="#" class="brand-3 w-nav-brand"></a>
        <div class="menu-button-copy w-nav-button">
            <div class="menutext">Menu</div>
        </div>
        <nav role="navigation" class="nav-menu w-nav-menu">
            <div class="text-block-7">Voltar</div>
            <div class="menu-wrapper w-clearfix">

            <!-- Bloco de criação dos menus pai -->
            <?php foreach($menu_pai as $key=>$menu): ?>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown">
                    <div class="menulink w-dropdown-toggle">
                        <div class="text-block-4"><?php echo $menu['title'];?></div>
                    </div>
                    <nav class="dropdown-conteudo w-dropdown-list">
                        <div class="menu-select-conteudos"></div>
                        <div class="menu-conteudos-wrapper">
                    <!-- Bloco de criação dos menus filhos -->
                    <?php foreach($menu['subitems'] as $key=>$item): ?>
                        <a href="<?php echo $item['url'];?>" class="black-menu-link"><?php echo $item['title'];?></a>
                    <?php endforeach; ?>
                        </div>
                    </nav>
                </div>
            <?php endforeach; ?>
            <!-- Fim dos Blocos -->
                
                <div class="div-block-32"><a href="<?php echo $menu_cta['link'];?>" target="<?php echo $menu_cta['target'];?>" class="btn-black-home-outline herp line type-gradient w-button"><span><?php echo $menu_cta['title'];?></span></a></div>
            </div>
        </nav>
        <div class="menu-button w-nav-button"><img src="<?php echo get_template_directory_uri().'/';?>images/Menu.png" width="33" alt="" class="image-6"></div>
    </div>
</div>

    <div id="hero" class="segmentos-hero" style="background-image:url('<?php echo get_template_directory_uri();?>/images/Group-16.39.svg'), url('<?php echo $segmento['url_img_bg'];?>');">
        <div class="mycontainer">
            <div class="home-hero-wrapper left">
                <div class="home-hero-left left _16pad nopad">
                    <h6 class="lightblue type-gradient" data-ix="fade-in-on-load"><span><?php echo $segmento['title'];?></span></h6>
                    <h1 class="h1white mobi left larger notop" data-ix="fade-in-on-load-2"><?php echo $segmento['main_title'];?></h1>
                    <div class="white" data-ix="fade-in-on-load-2"><?php echo $segmento['description'];?></div>
                </div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownwhite.svg" width="12" alt=""></div>
    </div>

    <div class="segmentos-wrapper-gradient-copy gradient-bg" data-ix="fade-in-on-scroll-2">
        <div class="mycontainer">
            <div id="desafios" class="servico-cards-wrapper lessmargin">
                <div class="section-title-2col center">
                    <h6 class="h1white nomargin"><?php echo $segmento['challenge_title'];?></h6>
                </div>
                <div class="case-thumb-content-wrapper">
                    <div class="servicos-thumb-content">
                        <h3><?php echo $challenge1['title'];?></h3>
                        <p><?php echo $challenge1['description'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $challenge2['title'];?></h3>
                        <p><?php echo $challenge2['description'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $challenge3['title'];?></h3>
                        <p><?php echo $challenge3['description'];?></p>
                    </div>
                </div>
            </div>
            <div id="cliente" class="section-title">
                <h6 class="pad20 white center"><?php echo $segmento['customers_title'];?></h6>
                <div class="solucoes-logo-clients-wrapper">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_title      = "img_customer" . $i ;
                ?>
                    <div class="image-clientes-block-segmentoscopy"><img src="<?php echo $segmento[$key_title];?>" width="274" alt="" class="image-12"></div>
                <?php endfor;?>
                </div>
            </div>
        </div>
    </div>
        <?php
            $cont = 1;
            foreach($key_points as $key=>$kp):
                $class_kp = ($cont%2 == 0) ? 'black' : 'notop';
                if(($cont%2 != 0) ):
        ?>
            <div id="key-point" class="section-wrapper notop" data-ix="fade-in-on-scroll">
                <div class="mycontainer">
                    <div class="section-2col-wrapper">
                        <div class="section-col-left narrow">
                            <h1 class="heading-43"><?php echo $kp['title'];?></h1>
                            <div class="pad20"><?php echo $kp['description'];?></div>
                        </div>
                        <div class="section-col-left center right"><img src="<?php echo $kp['url_img'];?>" width="1004" alt="" class="image-4"></div>
                    </div>
                </div>
            </div>
            <?php else:?>
            <div id="key-point" class="section-wrapper black" data-ix="fade-in-on-scroll">
                <div class="mycontainer">
                    <div class="section-2col-invert-wrapper nomargin _16pad">
                        <div class="section-col-left center left"><img src="<?php echo $kp['url_img'];?>" width="1004" alt="" class="image-4"></div>
                        <div class="section-col-left white">
                            <h1 class="heading-44"><?php echo $kp['title'];?></h1>
                            <div class="text-block-15 left center left2"><?php echo $kp['description'];?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
        <?php $cont++; endforeach; ?>

    <div id="big-case" class="mycontainer">
        <div class="case-thumb-content-2" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
        <a href="case?slug=<?php echo sanitize_title($card['title_card']);?>&id=<?php echo $card['id_card'];?>" style='text-decoration:none;'>
            <h3 class="h1white left2"><?php echo $card['title_card'];?></h3>
            <h6 class="lightblue type-gradient"><span><?php echo $card['subtitle_card'];?></span></h6>
            <div class="case-thumb-numbers">
                <h4 class="h1white huge"><?php echo $card['text_footer_card'];?></h4>
                <div class="h1white"><?php echo $card['subtext_footer_card'];?></div>
            </div>
            <div class="ver-cases">
                <div class="text-block-26">Ver Cases</div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt=""></div>
        </a>
        </div>
    </div>

<?php get_footer(); ?>
</body>
</html>