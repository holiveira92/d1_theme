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
$data_plataforma = $GLOBALS["data"]["d1_plugin_plataforma"];
$id_secao1_cta = !empty($data_plataforma['plataforma_secao1_cta']) ? $data_plataforma['plataforma_secao1_cta'] : 0;
$secao1_cta =  $data_loader->get_cta($id_secao1_cta);
get_header();
?>
<!DOCTYPE html>

<body class="body">

    <div id="hero" class="plataforma-hero2">
        <div class="mycontainer">
            <div class="section-2col-wrapper _8narrow topmargin">
                <div class="section-col-left-2 narrow notop">
                    <h1 class="heading-25 left noleft notop bottom" data-ix="fade-in-on-load"><?php echo $data_plataforma['plataforma_secao1_title'];?></h1>
                    <div class="h1white" data-ix="fade-in-on-load"><?php echo $data_plataforma['plataforma_secao1_descricao'];?> </div>
                    <a href="<?php echo $secao1_cta['link'];?>" target="<?php echo $secao1_cta['target'];?>" class="btn-black-home-play w-button" data-ix="fade-in-on-load-2"><?php echo $secao1_cta['title'];?></a> </div>
                <div class="section-col-left _80 right"><img src="<?php echo $data_plataforma['plataforma_secao1_img'];?>" width="453"  alt="" class="image-plataforma hero notop" data-ix="fade-in-on-load-2"></div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownblack.svg" width="12" alt=""></div>
    </div>

    
    <div id="desafios" class="plataforma-wrapper-grandient gradient-bg" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="servico-cards-wrapper">
                <div>
                    <h6 class="h1white nomargin"><?php echo $data_plataforma['plataforma_secao1_desafio_title'];?></h6>
                </div>
                <div class="case-thumb-content-wrapper">
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card1_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card1_desc'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card2_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card2_desc'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card3_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card3_desc'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="modulos" class="section-stripe-platfaorma blackbg" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <h6 class="h1white lightblue2 type-gradient"><span><?php echo $data_plataforma['plataforma_secao2_title'];?></span></h6>
            <div class="div-block-26">
                <div class="selectplataform"><a href="<?php echo "#".$data_plataforma['plataforma_secao2_modulo1_link'];?>" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo1_title'];?></a></div>
                <div class="selectplataform"><a href="<?php echo "#".$data_plataforma['plataforma_secao2_modulo2_link'];?>" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo2_title'];?></a></div>
                <div class="selectplataform"><a href="<?php echo "#".$data_plataforma['plataforma_secao2_modulo3_link'];?>" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo3_title'];?></a></div>
                <div class="selectplataform"><a href="<?php echo "#".$data_plataforma['plataforma_secao2_modulo4_link'];?>" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo4_title'];?></a></div>
                <div class="selectplataform"><a href="<?php echo "#".$data_plataforma['plataforma_secao2_modulo5_link'];?>" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo5_title'];?></a></div>
            </div>
        </div>
    </div>

    <?php for($i=1;$i<=5;$i++): ?>
    <div id="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_link"];?>" class="section-wrapper-large" data-ix="fade-in-on-scroll-2">
        <div class="mycontainer">
            <div class="section-2col-wrapper narrow">
                <div class="section-col-left left">
                    <div class="plataforma-title">
                        <div class="plataforma-icon-title"><img src="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_img_icon"];?>" width="90" alt=""></div>
                        <h1 class="heading-37"><?php echo $data_plataforma["plataforma_secao2_modulo$i"."_title"];?></h1>
                    </div>
                    <div class="pad20 left"><?php echo $data_plataforma["plataforma_secao2_modulo$i"."_desc"];?></div>
                        <div class="home-title-case2 left noinvert">
                            <a href="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_link"];?>" class="body-text-link3">VER MÓDULO
                            <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink"></a>
                        </div>
                </div>
                <div class="section-col-left margin"><img src="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_img"];?>" width="1004" alt="" class="img-plataforma image-11"></div>
            </div>
        </div>
    </div>
    <?php endfor; ?>


    <div id="cases" class="section-wrapper-large bg-grey notop">
        <div class="mycontainer">
            <div class="tabs-section-title-2col narrow">
                <h6 class="pad20"><?php echo $data_plataforma['plataforma_secao3_cases_title'];?></h6>
                <div class="link-text-arrow noinvert"><a href="../cases/" class="link-text-black">VER CASES</a>
                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink"></div>
            </div>
            <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_select = "plataforma_secao3_case" . $i;
                    $query = "SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases where id_card = '" . $data_plataforma[$key_select] ."'";
                    $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                    foreach($cards as $key=>$card):
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
                        </div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20">
                    </a>
                    </div>
                <?php endforeach; endfor;?>
            </div>
        </div>
    </div>

    <div id="faq" class="section-wrapper-large">
        <div id="faq" class="mycontainer-3 large">
            <div class="section-title-wrapper">
                <div class="div-block-104">
                    <div class="body-text-semiblack">PERGUNTAS FREQUENTES</div>
                </div>
                <div class="div-block-102"></div>
            </div>
            <?php
                $query = "SELECT * FROM " . $wpdb->prefix . $language  . "d1_faq where page = 'plataforma'";
                $faqs = json_decode(json_encode($wpdb->get_results($query)),true);
                foreach($faqs as $key=>$faq):
            ?>
            <div class="faq-wrap">
                <div class="div-block-103">
                    <div class="faq-question">
                        <div class="faq-q-text"><?php echo $faq['question'];?></div>
                        <div class="faq-plus-wrap">
                            <div class="faq-plus-l"></div>
                            <div class="faq-plus"></div>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p class="paragraph-8"><?php echo $faq['answer'];?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

<?php get_footer(); ?>
</body>
</html>