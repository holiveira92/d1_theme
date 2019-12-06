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
$data_preco = $GLOBALS["data"]["d1_plugin_preco"];
//pre($data_preco);die;
get_header();
?>

<body class="body">

<div id="orcamento" class="preco-hero">
        <div class="mycontainer">
            <div class="preco-section-2col-wrapper _8pad">

                <div class="section-col-left-2 left" data-ix="fade-in-on-load">
                    <div class="body-text-semiblack"><?php echo $data_preco['preco_secao1_title'];?></div>
                    <h1 class="h1white pad20 white nomargin white"><?php echo $data_preco['preco_secao1_main_title'];?></h1>
                    <div class="h1white black left"><?php echo $data_preco['preco_secao1_descricao'];?></div>
                    <div>
                        <p class="h1white black left"><?php echo $data_preco['preco_secao1_descricao_secundaria'];?></p>
                    </div>
                </div>

                <div class="section-colright-form">
                    <div class="preco-form-wrapper left bottommargin" data-ix="fade-in-on-load-2">
                        <div class="div-block-93">
                            <h3 class="heading-36 type-gradient"><span>Vamos conversar?</span></h3>
                            <div class="preco-form form-block w-form">
                                <!--[if lte IE 8]>
                                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                                <![endif]-->
                                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                                <script>
                                    hbspt.forms.create({
                                    portalId: "3898638",
                                    formId: "a82bba50-33f2-43dd-bc61-f90fd8a5d359"
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownwhite.svg" width="12" alt=""></div>
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
                $query = "SELECT * FROM " . $wpdb->prefix . "d1_faq where page = 'preco'";
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
                    $key_select = "preco_secao3_case" . $i;
                    $query = "SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = '" . $data_preco[$key_select] ."'";
                    $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                    foreach($cards as $key=>$card):
                        
                    ?>
                    <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                    <a href="case?slug=<?php echo sanitize_title($card['title_card']);?>&id=<?php echo $card['id_card'];?>" style='text-decoration:none;'>
                        <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                        <h6 class="lightblue type-gradient"><span><?php echo $card['subtitle_card'];?></span></h6>
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