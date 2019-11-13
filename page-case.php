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
$id_case = (!empty($_GET['id'])) ? $_GET['id'] : 6;
$case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases WHERE id_card=$id_case")),true);
pre($case);die;
get_header();
?>
<body>

<div id="hero" class="case-hero">
    <div class="mycontainer">
        <div class="home-hero-wrapper left">
            <div class="home-hero-left left _16pad" data-ix="fade-in-on-load">
                <h6 class="lightblue type-gradient">SATISFAÇÃO DO CLIENTE</h6>
                <h1 class="h1white pad20 white2 notop">Escalando Mensagens Transacionais </h1>
            </div>
            <div class="home-hero-right right mobi">
                <h1 class="big mobi">Black<br><span class="text-span-11 mobi type-gradient">Friday</span></h1>
                <div class="div-block-91"></div>
            </div>
        </div>
    </div>
    <div class="arrowdown downer type-gradient"><img src="images/arrow-hero.svg" width="12" alt=""></div>
</div>



<?php get_footer(); ?>
</body>