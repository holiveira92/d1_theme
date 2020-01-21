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
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data();
$data_home = $GLOBALS["data"]["d1_plugin"];
$data_home['d1_favicon'] = (!empty($data_home['d1_favicon'])) ? $data_home['d1_favicon'] : $img_default ;
$data_contato = $GLOBALS["data"]["d1_plugin_contato"];
//pre($data_contato);die;
get_header();
?>
<body>

<div id="contatos" class="contato-hero">
    <div class="mycontainer">
    <h1 class="h1white center mobi center" data-ix="fade-in-on-load"><?php echo $data_contato['contato_secao1_main_title'];?><span> <br>‍</span>
    <span class="text-span-19"><?php echo $data_contato['contato_secao1_title'];?></span><span class="text-span-20">!</span></h1>
        <div class="contato-cards-wrapper" data-ix="fade-in-on-load-2">
            <div class="contato-thumb-content-wrapper">

            <?php for($i=1;$i<=3;$i++):
                    $key_btn_title = "contato_secao1_item". $i ."_button_title";
                    $key_descricao = "contato_secao1_item". $i ."_desc";
                    $key_link = "contato_secao1_item". $i ."_link";
                    $key_img = "contato_secao1_img_icon$i";
                    if(!empty($data_contato[$key_descricao]) && $data_contato[$key_descricao] != 'Insira uma Informação'):
            ?>
                <div class="contato-thumb-content center phone _8marg">
                    <div class="div-block-95">
                        <div class="div-block-80"><img src="<?php echo $data_contato[$key_img];?>" height="50" width="50" alt="" class="image-7">
                            <p class="paragraph-4 left nopad"><?php echo $data_contato[$key_descricao];?></p>
                        </div>
                    </div><a href="<?php echo $data_contato[$key_link];?>" class="btn-black-home-copy lightblue w-button"><span><?php echo $data_contato[$key_btn_title];?></span></a></div>
                    <?php 
                        endif;
                        endfor;
                    ?>
            </div>
        </div>
        <div class="div-block-74" data-ix="fade-in-on-load-2">
            <div class="div-block-94"></div>
            <div class="body-text-2"></div><p class="body-text-link-inline"><?php echo insert_degrade($data_contato['contato_secao1_desc_rodape'],7);?></p></div>
    </div>
    <div class="arrowdown"><img src="<?php echo get_template_directory_uri();?>/images/arrowdownblack.svg" width="12" alt=""></div>
    </div>


<div id="form" class="section-wrapper-large black">
    <div id="mensagem" class="mycontainer large">
            <div class="form-contact w-form">
                <!--[if lte IE 8]>
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                <![endif]-->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
                    hbspt.forms.create({
                        portalId: "3898638",
                        formId: "2570f2b5-9dc1-439d-a6e6-102537d631f6"
                    });
                </script>
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
            $query = "SELECT * FROM " . $wpdb->prefix . $language  . "d1_faq where page = 'contato'";
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

<?php get_footer();?>
</body>