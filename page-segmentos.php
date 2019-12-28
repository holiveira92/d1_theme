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
$language = !empty($language_option) ? $language_option ."_" : "";
$id     = get_query_var('id');
$slug   = get_query_var('slug');
require(trim(dirname_oldphp(__FILE__,4)) . "wp-load.php");
wp_load_alloptions();
require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data();
$data_segmentos = $GLOBALS["data"]["d1_plugin_segmentos"];
$id_segmento = (!empty($id)) ? $id : 0;
$slug = (!empty($slug)) ? $slug : "";
$segmento = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_segmentos WHERE id=$id_segmento")),true);
$segmento = !empty($segmento[0]) ? $segmento[0] : array();
$key_points = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_key_points where page = 'segmentos' AND id_segmento=$id_segmento")),true);
$challenge1 = (!empty($segmento['challenge1'])) ? json_decode($segmento['challenge1'],true) : array();
$challenge2 = (!empty($segmento['challenge2'])) ? json_decode($segmento['challenge2'],true) : array();
$challenge3 = (!empty($segmento['challenge3'])) ? json_decode($segmento['challenge3'],true) : array();
$cases_options = (!empty($segmento['cases_options'])) ? json_decode($segmento['cases_options'],true) : array();
$id_card = !empty($cases_options['list_case1']) ? $cases_options['list_case1'] : 0;
$card = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases where id_card = $id_card")),true);
$card = !empty($card[0]) ? $card[0] : array();
$id_categoria_case      = !empty($card['cases_options']) ? json_decode($card['cases_options'],true) : array();
$id_categoria_case      = !empty($id_categoria_case['categoria_case']) ? $id_categoria_case['categoria_case'] : 0;
$categoria_case         = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias where id = $id_categoria_case")),true);
$categoria_case          = !empty($categoria_case[0]) ? $categoria_case[0] : array('descricao' => '');
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
    <script src="<?php echo get_template_directory_uri().'/';?>js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/webflow.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/index.js" type="text/javascript"></script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart" in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document)</script>
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
    <link href="<?php echo $data_header['d1_favicon'];?>" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">

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
                    if(!empty($segmento[$key_title])):
                ?>
                    <div class="image-clientes-block-segmentoscopy"><img src="<?php echo $segmento[$key_title];?>" width="274" alt="" class="image-12"></div>
                <?php endif; endfor;?>
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
        <a href="<?php echo get_home_url();?>/case/<?php echo sanitize_title($card['title_card']);?>/<?php echo $card['id_card'];?>" style='text-decoration:none;'>
            <h3 class="h1white left2"><?php echo $card['title_card'];?></h3>
            <h6 class="lightblue type-gradient"><span><?php echo $categoria_case['descricao'];?></span></h6>
            <div class="case-thumb-numbers">
                <h4 class="h1white huge"><?php echo $card['text_footer_card'];?></h4>
                <div class="h1white"><?php echo $card['subtext_footer_card'];?></div>
            </div>
            <div class="ver-cases" style="float:right;">
                <div class="text-block-26">Ver Cases</div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt=""></div>
        </a>
        </div>
    </div>

<?php get_footer(); ?>
</body>
</html>