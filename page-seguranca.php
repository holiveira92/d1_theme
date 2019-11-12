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
$data_seguranca = $GLOBALS["data"]["d1_plugin_seguranca"];
pre($data_contato);die;
get_header();
?>

<body>


<?php get_footer();?>
</body>