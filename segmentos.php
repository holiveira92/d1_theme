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
get_header();
?>
<body class="body">

    <div id="hero" class="segmentos-hero" style="background-image:url('<?php echo get_template_directory_uri();?>/images/Group-16.39.svg'), url('<?php echo $segmento['url_img_bg'];?>');">
        <div class="mycontainer">
            <div class="home-hero-wrapper left">
                <div class="home-hero-left left _16pad nopad">
                    <h6 class="lightblue type-gradient" data-ix="fade-in-on-load"><?php echo $segmento['title'];?></h6>
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
            <h3 class="h1white left2"><?php echo $card['title_card'];?></h3>
            <h6 class="lightblue type-gradient"><?php echo $card['subtitle_card'];?></h6>
            <div class="case-thumb-numbers">
                <h4 class="h1white huge"><?php echo $card['text_footer_card'];?></h4>
                <div class="h1white"><?php echo $card['subtext_footer_card'];?></div>
            </div>
            <div class="ver-cases">
                <div class="text-block-26">Ver Cases</div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt=""></div>
        </div>
    </div>

<?php get_footer(); ?>
</body>
</html>