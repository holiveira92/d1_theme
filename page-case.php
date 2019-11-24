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
$data_cases = $GLOBALS["data"]["d1_plugin_cases"];
$id_case = (!empty($_GET['id'])) ? $_GET['id'] : 0;
$slug = (!empty($_GET['slug'])) ? $_GET['slug'] : "";
$case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases WHERE id_card=$id_case")),true);
$case = !empty($case[0]) ? $case[0] :array();
$slug = !empty($case['title_card']) ? sanitize_title($case['title_card']) : "";
$impactos = !empty($case['impactos']) ? json_decode($case['impactos'],true) :array() ;
$desafios = !empty($case['desafios']) ? json_decode($case['desafios'],true) :array() ;
$implantacao = !empty($case['implantacao']) ? json_decode($case['implantacao'],true) :array() ;
$cases_options = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) :array() ;
$id_categoria_case = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
$categoria_case = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id=$id_categoria_case")),true);
$categoria_case = !empty($categoria_case[0]) ? $categoria_case[0] :array();
//pre($categoria_case);die;
get_header();
?>
<body>

<div id="hero" class="case-hero" style=" background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo !empty($case['img_bg_url']) ? $case['img_bg_url'] : $img_default;?>');
  background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo !empty($case['img_bg_url']) ? $case['img_bg_url'] : $img_default;?>">
    <div class="mycontainer">
        <div class="home-hero-wrapper left">
            <div class="home-hero-left left _16pad" data-ix="fade-in-on-load">
                <h6 class="lightblue type-gradient"><?php echo $case['subtitle_card'];?></h6>
                <h1 class="h1white pad20 white2 notop"><?php echo $case['title_card'];?> </h1>
            </div>
            <div class="home-hero-right right mobi">
                <h1 class="big mobi"><?php echo insert_degrade($case['desc_card'],8);?></h1>
                <div class="div-block-91"></div>
            </div>
        </div>
    </div>
<div class="arrowdown downer type-gradient"><img src="<?php echo get_template_directory_uri();?>/images/arrow-hero.svg" width="12" alt=""></div>
</div>

<div id="impactos" class="section-6">
    <div class="mycontainer-3">
        <h6 class="heading-13-copy lightblue center"><?php echo !empty($impactos['impacto_title']) ? $impactos['impacto_title'] : "";?></h6>
        <div class="caseaberto-block-black">
        <?php
            for($i=1;$i<=3;$i++):
                $key_title = "impacto$i" ."_title";
                $key_total = "impacto$i" ."_total";
                $key_desc = "impacto$i" ."_desc";
        ?>
            <div class="div-block-42">
                <div class="div-block-40">
                    <div class="div-block-52">
                        <div class="body-text-white-2"><?php echo !empty($impactos[$key_title]) ? $impactos[$key_title] : "";?></div>
                    </div>
                    <div>
                        <div class="text-block"><span class="text-span-3 lightblue type-gradient large">
                            <?php echo !empty($impactos[$key_total]) ? $impactos[$key_total] : "";?>
                        </span></div>
                    </div>
                    <div class="div-block-53">
                        <div class="body-text-white-2">
                            <?php echo !empty($impactos[$key_desc]) ? $impactos[$key_desc] : "";?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor;?>
        </div>
    </div>
</div>

<div id="contexto" class="section-case-aberto-text1">
    <div class="mycontainer-3">
        <div class="seguranca-gradient-wrapper-copy _8pad">
            <div class="div-block-37">
                <div>
                    <p><?php echo !empty($case['desc_completa_primaria']) ? $case['desc_completa_primaria'] : "";?></p>
                </div>
            </div>
            <div>
                <h3 class="heading-27 mobi">
                    <?php echo !empty($case['desc_completa_secundaria']) ? $case['desc_completa_secundaria'] : "";?>
                </h3>
            </div>
        </div>
    </div>
</div>

<div id="objetivos" class="section-case-aberto-objetivos bottommargin">
    <div class="mycontainer-3">
        <div class="seguranca-gradient-wrapper-copy _16pad">
            <div class="div-block-37">
                <div>
                    <h2 class="white-2 lightblue larger mobi type-gradient">
                        <?php echo !empty($case['objetivos_title']) ? $case['objetivos_title'] : "";?>
                    </h2>
                </div>
            </div>
            <div class="div-block-92">
                <div class="gradient-stripe-2"></div>
                <p class="body-text-white left">
                    <?php echo !empty($case['objetivos_desc_completa']) ? $case['objetivos_desc_completa'] : "";?>    
                </p>
            </div>
        </div>
    </div>
</div>

<div id="desafios" class="mycontainer-3 desafios">
    <div class="section-title-wrapper-copy">
        <div class="body-text-2 grey">
            <?php echo !empty($desafios['desafios_title']) ? $desafios['desafios_title'] : "";?>
        </div>
    </div>
    <div class="cases-row-2 desafios _8pad w-row">
    <?php
        for($i=1;$i<=3;$i++):
            $key_desc = "desafio$i" ."_desc_completa";
    ?>
        <div class="cases-column w-col w-col-4 w-col-medium-4">
            <div class="cases-thumb-block-3">
                <div class="desafios-case-aberto-content">
                    <div class="case-thumb-title _8pad">
                        <p class="body-text-white left">
                            <?php echo !empty($desafios[$key_desc]) ? $desafios[$key_desc] : "";?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor;?>
    </div>
</div>

<div id="solucao" class="section-case-aberto-objetivos">
    <div class="mycontainer-3">
        <div class="cases-aberto-ferramentas _16pad">
            <div class="div-block-37">
                <h2 class="white-2 lightblue larger mobi type-gradient"><?php echo !empty($implantacao['implantacao_title']) ? $implantacao['implantacao_title'] : "";?></h2>
            </div>
            <div>
                <p class="body-text-white mobi left"><?php echo !empty($implantacao['implantacao_desc_primaria']) ? $implantacao['implantacao_desc_primaria'] : "";?></p>
            </div>
        </div>
        <div class="gradient-stripe _16pad"></div>
        <div class="div-block-54 _16pad">
            <div>
                <div class="div-block-55">
                    <div class="body-text-white larger">
                        <?php echo !empty($implantacao['implantacao_desc_secundaria']) ? nl2br(insert_degrade($implantacao['implantacao_desc_secundaria'],9)) : "";?>
                    </div>
                </div>
            </div>
            <div class="div-block-56">
                <div class="div-block-42">
                    <div class="div-block-40">
                        <div class="div-block-52">
                            <div class="body-text-white-2"><?php echo !empty($implantacao['implantacao_resultado1_title']) ? $implantacao['implantacao_resultado1_title'] : "";?></div>
                        </div>
                        <div>
                            <div class="text-block"><span class="text-span-3 type-gradient large"><?php echo !empty($implantacao['implantacao_resultado1_valor']) ? $implantacao['implantacao_resultado1_valor'] : "";?></span></div>
                        </div>
                        <div class="div-block-53">
                            <div class="body-text-white-2"><?php echo !empty($implantacao['implantacao_resultado1_desc']) ? $implantacao['implantacao_resultado1_desc'] : "";?></div>
                        </div>
                    </div>
                </div>
                <div class="div-block-42">
                    <div class="div-block-40">
                        <div class="div-block-52">
                            <div class="body-text-white-2"><?php echo !empty($implantacao['implantacao_resultado2_title']) ? $implantacao['implantacao_resultado2_title'] : "";?></div>
                        </div>
                        <div>
                            <div class="text-block"><span class="text-span-3 type-gradient large"><?php echo !empty($implantacao['implantacao_resultado2_valor']) ? $implantacao['implantacao_resultado2_valor'] : "";?></span></div>
                        </div>
                        <div class="div-block-53">
                            <div class="body-text-white-2"><?php echo !empty($implantacao['implantacao_resultado2_desc']) ? $implantacao['implantacao_resultado2_desc'] : "";?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEÇÃO CASES DE SUCESSO -->
<div id="cases" class="section-wrapper-large bg-grey notop">
    <div class="mycontainer">
        <div class="tabs-section-title-2col narrow">
            <h6 class="pad20"><?php echo $data_cases['cases_secao0_title'];?></h6>
            <div class="link-text-arrow noinvert"><a href="cases-overview" class="link-text-black">VER CASES</a><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="arrowlink"></div>
        </div>

        <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
            <?php
            for($i=1;$i<=3;$i++):
                $key_select = "list_case" . $i;
                $query = "SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = '" . $cases_options[$key_select] ."'";
                $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                foreach($cards as $key=>$card):
                    
                ?>
                <div class="case-thumb-content _200ms left"  categoria="<?php echo $categoria_case['descricao'];?>" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                    <a href="case?slug=<?php echo sanitize_title($card['title_card']);?>&id=<?php echo $card['id_card'];?>" style='text-decoration:none;'>
                    <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                    <h6 class="lightblue type-gradient"><span><?php echo $card['subtitle_card'];?></span></h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                        <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                    </div>
                    <img src="<?php echo get_template_directory_uri();?>/images/arrowlink.svg" alt="" class="image-20" style='float:right;'>
                </div>
                </a>
            <?php endforeach; endfor; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
</body>