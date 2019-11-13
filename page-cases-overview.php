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
get_header();

?>


<body>
<div class="section-wrapper-large">

    <div id="filtro" class="div-block-36">
        <div data-duration-in="100" data-duration-out="100" class="tabs-4 w-tabs">
            <div class="tabs-menu-5 w-tab-menu" data-ix="fade-in-on-load">
                <a data-w-tab="Tab 1" class="case-overview-link w-inline-block w-tab-link w--current" categoria="TODOS">
                    <div class="casetab">TODOS</div>
                </a>
                
                <?php
                $cont = 2;
                foreach($categorias_pai as $key=>$categoria):
                    
                ?>
                <a data-w-tab="Tab <?php echo $cont;?>" class="case-overview-link w-inline-block w-tab-link" categoria="<?php echo $categoria['descricao'];?>">
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
                            <a href="#" class="case-overview-link" categoria="<?php echo $item['descricao'];?>" ><?php echo $item['descricao'];?></a>
                        <?php endforeach; ?>
                    </div>
                <?php $cont++; endforeach; ?>

            </div>

        </div>
    </div>

    <br><br><br><br>
    
    <!-- SEÇÃO CASES DE SUCESSO -->
    <div id="cases" class="section-cases">
    <div class="home-wrapper-gradient-2">
        <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll" name='itens_cases'>
            <?php
                $i=0;
                $cards = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases")),true);
                foreach($cards as $key=>$card):
                    $cases_options = !empty($card['cases_options']) ? json_decode($card['cases_options'],true) :array() ;
                    $id_categoria_case = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
                    $categoria_case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id=$id_categoria_case")),true);
                    $categoria_case = !empty($categoria_case[0]) ? $categoria_case[0] : array('descricao' => '');
                ?>
                <div name='item_case' class="case-thumb-content _200ms left"  categoria="<?php echo $categoria_case['descricao'];?>" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                    <a href="case?slug=<?php echo sanitize_title($card['title_card']);?>&id=<?php echo $card['id_card'];?>" style='text-decoration:none;'>
                    <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                    <h6 class="lightblue type-gradient"><span><?php echo $card['subtitle_card'];?></span></h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                        <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                    </div>
                    <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20" style='float:right;'>
                    </a>
                </div>
            <?php 
                $i++; 
                if($i == 3){
                    $i=0;
                    echo '<br><br><br><br>';
                }
                endforeach; 
            ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
</body>


<script>
jQuery(document).ready(function($) {
    $('.case-overview-link').click(function(){
        var name = $(this).attr('categoria');
        $.each($('[name=item_case]'), function(index, element){
            var categoria = $(this).attr('categoria');
            if(name != categoria){
                if(name != "TODOS")
                    $(element).hide();
                else
                    $(element).show();
            }
            else
                $(element).show();
        });
    });
});
</script>