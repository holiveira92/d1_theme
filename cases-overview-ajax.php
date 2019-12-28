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
global $wpdb;
$id_categoria = (!empty($_GET['id_categoria'])) ? $_GET['id_categoria'] : "0";
$cases = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases ORDER BY id_card DESC")),true);
$categoria = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias WHERE id=$id_categoria")),true);
$id_pai = !empty($categoria[0]['id']) ? $categoria[0]['id'] : "";
$categorias_filhas = (!empty($id_pai)) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias WHERE id_categoria=$id_pai")),true) : array();
$cat_filhas = array();
foreach($categorias_filhas as $key=>$cat)
    $cat_filhas[] = $cat['id'];

$return = array();
$html = "";
if(!empty($cases)){
    foreach($cases as $key=>$case){
        $cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array() ;
        $id_categoria_case = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
        if($id_categoria_case == $id_categoria || in_array($id_categoria_case,$cat_filhas)){
            $return[] = $case;
        }
    }

    if($id_categoria == 0){
        $return = $cases;
    }
}

$i=0;
$case_destaque = array();
if(!empty($return[0])){
    $case_destaque = array();
    foreach($return as $key=>$case){
        $cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) :array() ;
        $is_whitepaper  = (!empty($cases_options['is_whitepaper']) && $cases_options['is_whitepaper']) ? true : false;
        if($is_whitepaper){
            continue;
        }else{
            $case_destaque = $case;
            $chave = $key;
            break;
        }
    }
    if(isset($chave)){
        unset($return[$chave]);
        $return = array_values($return);
    }
}

if(!empty($case_destaque)){
    $html = '<div name="cases_list" categoria="'.$id_categoria_case.'">
    <div id="case" class="div-block-75">
        <div class="case-thumb-content" name="item_case" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('.$case_destaque['img_bg_url'].');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('.$case_destaque['img_bg_url'].');">
            <a href="' .get_home_url() . '/case/'.sanitize_title($case_destaque['title_card']).'/'.$case_destaque['id_card'].'" style="text-decoration:none;">
            <h3 class="h1white left small">'.$case_destaque['title_card'].'</h3>
            <h6 class="lightblue type-gradient">'.$case_destaque['subtitle_card'].'</h6>
            <div class="case-thumb-numbers">
                <h5 class="heading-2 pad20 white huge left">'.$case_destaque['text_footer_card'].'</h5>
                <div class="h1white left tiny">'.$case_destaque['subtext_footer_card'].'</div>
            </div>
            <div class="ver-cases"><div class="text-block-26">Ver Cases</div>
            <img src="'.get_template_directory_uri().'/images/arrowlink.svg" alt=""></div>
            </a>
        </div>
    </div>';
    
    $i=0;
    $html = $html .  ' <div id="case" class="div-block-75-copy">';
    foreach($return as $key=>$case){
        $cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) :array() ;
        $id_categoria_case = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
        $categoria_case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_cases_categorias WHERE id=$id_categoria_case")),true);
        $categoria_case = !empty($categoria_case[0]) ? $categoria_case[0] : array('descricao' => '');
        $is_whitepaper  = (!empty($cases_options['is_whitepaper']) && $cases_options['is_whitepaper']) ? true : false;
        if($is_whitepaper)
            continue;
        if($i==2){
            $i=0;
            $html = $html . ' <div id="case" class="div-block-75-copy">';
        }
        $html = $html . ' <div class="case-thumb-content" name="item_case" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('.$case['img_bg_url'].');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('.$case['img_bg_url'].');");">
        <a href="' .get_home_url() . '/case/'.sanitize_title($case['title_card']).'/'.$case['id_card'].'" style="text-decoration:none;">
            <h3 class="h1white left small">'.$case['title_card'].'</h3>
            <h6 class="lightblue left type-gradient">'.$case['subtitle_card'].'</h6>
            <div class="case-thumb-numbers">
                <h5 class="heading-2 pad20 white huge left">'.$case['text_footer_card'].'</h5>
                <div class="h1white left tiny">'.$case['subtext_footer_card'].'</div>
            </div>
            <div class="ver-cases">
                <div class="text-block-26">Ver Cases</div><img src="' . get_template_directory_uri() . '/images/arrowlink.svg" alt=""></div>
                </a></div>';
        $i++;
        if($i==2){
            $html = $html . ' </div>';
        }
    }
    $html = $html . ' </div>';
}

echo $html;
?>