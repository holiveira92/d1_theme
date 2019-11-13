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
//$GLOBALS["data"] = $d1_view_parser->get_data();
//$data_home = $GLOBALS["data"]["d1_plugin"];
$cases = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases")),true);
$categorias_pai = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id_categoria IS NULL OR id_categoria='' ")),true);
//pre($categorias);die;
$ids_cases = array();
foreach($cases as $k=>$case){
    $ids_cases[] = $case['id_card'];
}
$key_case = array_rand($ids_cases);
$randon_cases['case1'] = !empty($cases[$key_case]['id_card']) ? $cases[$key_case]['id_card'] : 0;
unset($cases[$key_case]);
$key_case = array_rand($ids_cases);
$randon_cases['case2'] = !empty($cases[$key_case]['id_card']) ? $cases[$key_case]['id_card'] : 0;
unset($cases[$key_case]);
$key_case = array_rand($ids_cases);
$randon_cases['case3'] = !empty($cases[$key_case]['id_card']) ? $cases[$key_case]['id_card'] : 0;
//pre($randon_cases);die;
get_header();

?>


<body>
<div class="section-wrapper-large">

    <div id="filtro" class="div-block-36">
        <div data-duration-in="100" data-duration-out="100" class="tabs-4 w-tabs">
            <div class="tabs-menu-5 w-tab-menu" data-ix="fade-in-on-load">
                <a data-w-tab="Tab 1" class="case-overview-link w-inline-block w-tab-link w--current">
                    <div class="casetab">TODOS</div>
                </a>
                
                <?php
                $cont = 2;
                foreach($categorias_pai as $key=>$categoria):
                    
                ?>
                <a data-w-tab="Tab <?php echo $cont;?>" class="case-overview-link w-inline-block w-tab-link">
                    <div class="casetab type-gradient"><?php echo $categoria['descricao'];?></div>
                </a>
                <?php $cont++; endforeach; ?>

            </div>

            <div class="tabs-content-4 w-tab-content">
                <div data-w-tab="Tab 1" class="tab-pane-tab-1-2 w-tab-pane w--tab-active"></div>
                <?php
                $cont = 2;
                foreach($categorias_pai as $k=>$categoria):
                    $id_categoria = $categoria['id'];
                    $filhos = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id_categoria=$id_categoria ")),true);
                ?>
                    <div data-w-tab="Tab <?php echo $cont;?>" class="tab-pane-tab-<?php echo $cont;?> w-tab-pane">
                        <?php
                            foreach($filhos as $key=>$item):
                        ?>
                            <a href="#" class="case-overview-link"><?php echo $item['descricao'];?></a>
                        <?php endforeach; ?>
                    </div>
                <?php $cont++; endforeach; ?>

            </div>

        </div>
    </div>

    <br><br><br><br>
    
    <!-- SEÇÃO CASES DE SUCESSO -->
    <div id="case" class="mycontainer" data-ix="fade-in-on-load-2">
        <div class="home-wrapper-gradient-2">
            <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_select = "case" . $i;
                    $query = "SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = '" . $randon_cases[$key_select] ."'";
                    $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                    $card = (!empty($cards[0])) ? $cards[0] : array('title_card' => '', 'img_bg_url' => $img_default, 'card_link' => '', 'title_card' => '',
                    'subtitle_card' => '', 'text_footer_card' => '','subtext_footer_card' => '');
                    ?>
                    <div id="case" class="div-block-75">
                        <div class="case-thumb-content" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                            <a href="<?php echo $card['card_link'];?>" style='text-decoration:none;'>
                            <h3 class="h1white left small"><?php echo $card['title_card'];?></h3>
                            <h6 class="lightblue type-gradient"><?php echo $card['subtitle_card'];?></h6>
                            <div class="case-thumb-numbers">
                                <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                                <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                            </div>
                            <div class="ver-cases">
                                <div class="text-block-26">Ver Cases</div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="">
                            </div>
                            </a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
</body>