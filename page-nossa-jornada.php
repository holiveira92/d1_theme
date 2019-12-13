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
$data_home = $GLOBALS["data"]["d1_plugin"];
$data_home['d1_favicon'] = (!empty($data_home['d1_favicon'])) ? $data_home['d1_favicon'] : $img_default ;
$data_jornada = $GLOBALS["data"]["d1_plugin_jornada"];
$id_menu_cta = $data_home['d1_menu_cta'];
$id_menu_cta = !empty($id_menu_cta) ? $id_menu_cta : 0;
$menu_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_menu_cta")),true);
$menu_cta = !empty($menu_cta[0]) ? $menu_cta[0] : array();
$id_secao1_cta = $data_jornada['jornada_secao1_cta'];
$id_secao1_cta = !empty($id_secao1_cta) ? $id_secao1_cta : 0;
$secao1_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_secao1_cta")),true);
$secao1_cta = !empty($secao1_cta[0]) ? $secao1_cta[0] : array('title' =>'','link' =>'','target' =>'',);
$id_secao4_cta = $data_jornada['jornada_secao4_inovacao_cta'];
$id_secao4_cta = !empty($id_secao4_cta) ? $id_secao4_cta : 0;
$secao4_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_secao4_cta")),true);
$secao4_cta = !empty($secao4_cta[0]) ? $secao4_cta[0] : array('title' =>'','link' =>'','target' =>'',);
//pre($data_jornada);die;
get_header();
?>

<body class="body">

    <div id="hero" class="nossajornada-hero" style="background-image: url('<?php echo $data_jornada['jornada_secao1_img'];?>');">
        <div class="mycontainer">
            <div class="home-hero-wrapper centered _16pad">
                <div class="home-hero-left center">
                    <h6 class="lightblue type-gradient" data-ix="fade-in-on-load"><span><?php echo $data_jornada['jornada_secao1_main_title'];?></span></h6>
                    <h1 class="h1white center bottommargin type-gradient" data-ix="fade-in-on-load-2"><?php echo insert_degrade($data_jornada['jornada_secao1_title'],4);?></h1>
                    <div class="h1white lightblue2 larger center type-gradient" data-ix="fade-in-on-load-2"><span><?php echo $data_jornada['jornada_secao1_desc'];?></span></div>
                    <a href="<?php echo $secao1_cta['link'];?>" target="<?php echo $secao1_cta['target'];?>" class="btn-gradient w-button" data-ix="fade-in-on-load-2"><?php echo $secao1_cta['title'];?></a></div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri();?>/images/arrow-hero.svg" width="12" alt=""></div>
    </div>

    <div id="sobre-nos" class="nossajornadawrapper-grandient gradient-bg">
        <div class="mycontainer">
            <div class="section-2col-wrapper _16pad" data-ix="fade-in-on-scroll-2">
                <div class="section-col-left left">
                    <h6 class="white nomargin"><?php echo $data_jornada['jornada_secao1_about'];?></h6>
                    <div class="pad20 left"><?php echo $data_jornada['jornada_secao1_about_descricao'];?></div>
                    <div class="home-title-case2">
                        <a href="<?php echo $data_jornada['jornada_secao1_about_link'];?>" class="body-text-link3"><?php echo $data_jornada['jornada_secao1_about_text_link'];?></a>
                        <img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="arrowlink">
                    </div>
                </div>
                <div class="div-block-90">
                    <div class="text-block-24 white"><?php echo $data_jornada['jornada_secao1_about_descricao_secundaria'];?></span></div>
                </div>
            </div>
        </div>
    </div>


    <div id="plataforma" class="section-wrapper notop">
        <div class="mycontainer narrow mobi">
            <div class="section-2col-wrapper-copy left" data-ix="fade-in-on-scroll">
                <div class="section-col-left changerorder">
                    <h6 class="h1white lightblue2 left type-gradient"><span><?php echo $data_jornada['jornada_secao2_title'];?></span></h6>
                    <div class="nossajornada-title lessmarg">
                        <h4 class="heading huge mobi"><?php echo $data_jornada['jornada_secao2_main_title'];?></h4>
                    </div>
                    <div class="section-col-left center _50 mobi">
                        <img src="<?php echo $data_jornada['jornada_secao2_img'];?>" width="624" alt="" class="img-plataforma lesspad">
                    </div>
                    <div class="pad20 left"><?php echo $data_jornada['jornada_secao2_descricao'];?></div>
                    <div class="ver-plat">
                        <a href="<?php echo $data_jornada['jornada_secao2_plataforma_link'];?>" style='text-decoration:none;color: inherit;display:flex;'>
                        <div class="text-block-30">VER PLATAFORMA</div>
                        <img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt=""></div></a>
                </div>
                <div class="section-col-left center _50 nomobi">
                    <img src="<?php echo $data_jornada['jornada_secao2_img'];?>" width="624" alt="" class="img-plataforma lesspad">
                </div>
            </div>
        </div>
    </div>

    <div id="equipe" class="nossajornada-keypoint-imgbg ui-section" style='background-image: url("<?php echo $data_jornada['jornada_secao3_equipe1_img'];?>");'>
        <div class="mycontainer-3">
            <div class="keypoint-left _8pad">
                <div class="keypoint-text-wrapper">
                    <h6 class="h1white"><?php echo $data_jornada['jornada_secao3_equipe1_title'];?></h6>
                    <h2 class="heading white2 mobi type-gradient"><span><?php echo $data_jornada['jornada_secao3_equipe1_main_title'];?></span></h2>
                    <div class="h1white left"><?php echo $data_jornada['jornada_secao3_equipe1_descricao'];?></div>
                </div>
            </div>
        </div>
    </div>

    <div id="impacto" class="section-wrapper _40margin">
        <div class="mycontainer narrow mobi">
            <div class="section-2col-wrapper-copy left" data-ix="fade-in-on-scroll">
                <div class="nossajornada-title">
                    <h6 class="h1white lightblue2 left type-gradient"><span><?php echo $data_jornada['jornada_secao3_equipe2_title'];?></span></h6>
                    <h4 class="heading mobi"><?php echo $data_jornada['jornada_secao3_equipe2_main_title'];?></h4>
                </div>
                <div class="div-block-105">
                    <div class="text-block-25"><?php echo $data_jornada['jornada_secao3_equipe2_descricao'];?></div>
                    <div class="ver-plat hide">
                        <a href="<?php echo $data_jornada['jornada_secao3_equipe2_link'];?>" style='text-decoration:none;color: inherit;'>
                        <div class="text-block-29">VER D1 NA MÍDIA </div>
                        <img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="valores" class="section-4 big">
        <div class="mycontainer-3 _100">
            <div class="div-block-38 nomargin flex">
                <h3 class="heading-48 type-gradient"><span><?php echo $data_jornada['jornada_secao4_slide_title'];?></span></h3>
            </div>
            <div class="div-block-38 nomargin _100"><?php echo html_entity_decode($data_jornada['jornada_secao4_slide_code']);?></div>
            <div class="div-block-38 nomargin flex"><a href="<?php echo $data_jornada['jornada_secao4_slide_link'];?>" target="_blank" class="downloadbtn type-gradient"><span>BAIXAR SLIDES</span></a></div>
        </div>
    </div>
    
    <div class="mycontainer-3">
        <div id="inovacao" class="empreendedorismo-keypoint-text-wrapper-copy _8pad">
            <div class="body-text-2"><?php echo $data_jornada['jornada_secao4_inovacao_title'];?></div>
            <h4 class="heading royalblue type-gradient"><span><?php echo $data_jornada['jornada_secao4_inovacao_main_title'];?></span></h4>
            <p class="paragraph-5"><?php echo $data_jornada['jornada_secao4_inovacao_desc'];?></p>
            <div class="cta-vagas">
                <div class="div-block-3">
                    <div class="darkgrey type-gradient"><?php echo insert_degrade($data_jornada['jornada_secao4_inovacao_desc_pre_cta'],5);?></div>
                </div>
                <div class="div-block-4 vervagas">
                    <a href="<?php echo $secao4_cta['link'];?>" target="<?php echo $secao4_cta['target'];?>" class="btn-black-home vagas w-button"><?php echo $secao4_cta['title'];?></a>
                </div>
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
                $query = "SELECT * FROM " . $wpdb->prefix . "d1_faq where page = 'jornada'";
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

    <div class="home-wrapper-gradient gradient-bg">
        <div class="div-block-84">
            <div class="mycontainer">
                <div class="section-title-2col">
                    <h6 class="white _18">IMPACTOS REAIS DE MELHORIA EM CUSTOMER EXPERIENCE</h6>
                    <div class="link-text-arrow">
                        <a href="../cases/" class="link-text-black invert">VER CASES</a>
                        <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink">
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
                    $key_select = "jornada_secao6_case" . $i;
                    $query = "SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = '" . $data_jornada[$key_select] ."'";
                    $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                    foreach($cards as $key=>$card):
                        $id_categoria_case      = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
                        $id_categoria_case      = !empty($id_categoria_case['categoria_case']) ? $id_categoria_case['categoria_case'] : 0;
                        $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias where id = $id_categoria_case")),true);
                        $categoria              = !empty($categoria[0]) ? $categoria[0] : array('descricao' => '');
                    ?>
                    <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                    <a href="<?php echo get_home_url();?>/case/<?php echo sanitize_title($card['title_card']);?>/<?php echo $card['id_card'];?>" style='text-decoration:none;'>
                        <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                        <h6 class="lightblue type-gradient"><span><?php echo $categoria['descricao'];?></span></h6>
                        <div class="case-thumb-numbers">
                            <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                            <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                        </div>
                        <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20" style='float:right;'>
                    </div>
                    </a>
                    <?php endforeach; endfor; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
</body>