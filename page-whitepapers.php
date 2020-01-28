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
$url_ajax = get_template_directory_uri() . "/cases-overview-ajax.php";
$filter = (!empty($_GET['filter'])) ? $_GET['filter'] : "0";
$categorias_pai = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias WHERE id_categoria IS NULL OR id_categoria='' ")),true);
get_header();
?>

<body>

<div class="section-wrapper-large no-padding-bottom">
<input type="hidden" id="url_ajax" name="url_ajax" value="<?php echo $url_ajax;?>">
<div id="filtro" class="div-block-36"> </div>
    <!-- SEÇÃO CASES DE SUCESSO -->
    <div id="cases" class="mycontainer" data-ix="fade-in-on-load-2">
    <div name="cases_list" categoria="0">
    <?php
        $i=0;
        $cases = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases ORDER BY id_card DESC ")),true);
        $case_destaque = array();
        foreach($cases as $key=>$case){
            $cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) :array() ;
            $is_whitepaper  = (!empty($cases_options['is_whitepaper']) && $cases_options['is_whitepaper']) ? true : false;
            if(!$is_whitepaper){
                continue;
            }else{
                $case_destaque = $case;
                $chave = $key;
                break;
            }
        }
        if(isset($chave)){
            unset($cases[$chave]);
            $cases = array_values($cases);
        }
    ?>
        <div id="case" class="div-block-75">
            <div class="case-thumb-content" name='item_case' style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $case_destaque['img_bg_url']; ?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $case_destaque['img_bg_url'];?>');">
            <a href="<?php echo $case_destaque['card_link'];?>" target="_blank" style='text-decoration:none;'>
                <h3 class="h1white left small"><?php echo $case_destaque['title_card'];?></h3>
                <h6 class="lightblue type-gradient"><span><?php echo $case_destaque['subtitle_card'];?></span></h6>
                <div class="case-thumb-numbers">
                    <h5 class="heading-2 pad20 white huge left"><?php echo $case_destaque['text_footer_card'];?></h5>
                    <div class="h1white left tiny"><?php echo $case_destaque['subtext_footer_card'];?></div>
                </div>
                <div class="ver-cases"><div class="text-block-26">Ver Cases</div><img src="<?php echo get_template_directory_uri();?>/images/arrowlink.svg" alt=""></div></a>
            </div>
        </div>

        <?php
            $i=0;
            echo '<div id="case" class="div-block-75-copy">';
            foreach($cases as $key=>$case){
                $cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) :array() ;
                $id_categoria_case = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
                $categoria_case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias WHERE id=$id_categoria_case")),true);
                $categoria_case = !empty($categoria_case[0]) ? $categoria_case[0] : array('descricao' => '');
                $is_whitepaper  = (!empty($cases_options['is_whitepaper']) && $cases_options['is_whitepaper']) ? true : false;
                if(!$is_whitepaper)
                    continue;
                if($i==2){
                    $i=0;
                    echo '<div id="case" class="div-block-75-copy">';
                }
                echo '<div class="case-thumb-content" name="item_case" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('.$case['img_bg_url'].');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('.$case['img_bg_url'].');");">
                    <a href="' . $case['card_link'] .'" target="_blank" style="text-decoration:none;">
                    <h3 class="h1white left small">'.$case['title_card'].'</h3>
                    <h6 class="lightblue left type-gradient">'.$categoria_case['descricao'].'</h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white huge left">'.$case['text_footer_card'].'</h5>
                        <div class="h1white left tiny">'.$case['subtext_footer_card'].'</div>
                    </div>
                    <div class="ver-cases">
                        <div class="text-block-26">Ver Whitepapers</div><img src="' . get_template_directory_uri() . '/images/arrowlink.svg" alt=""></div>
                        </a></div>';
                $i++;
                if($i==2){
                    echo '</div>';
                }
            }
        ?>
    </div></div>

</div>
<div id="loader" style="
   width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: none; z-index: 99
"> 
<img id="loading-image" src="<?php echo get_template_directory_uri();?>/images/loading.gif" alt="Loading..." style='position: absolute;top: 40%;left: 45%;z-index: 100'/> </div>
<?php get_footer(); ?>
</body>

<script>
jQuery(document).ready(function($) {
    var url_ajax = $("#url_ajax").val();


});
</script>