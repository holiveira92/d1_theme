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
get_header();
?>

<body>

<div id="hero" class="seg-hero gradient-bg" style="background-image: url('https://uploads-ssl.webflow.com/5d9f3e21a78bd192c39905ad/5db0ae33dc9fed66ae1dbfa3_Group%2016.39.svg'),-webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url('<?php echo $data_seguranca['seguranca_secao1_img'];?>');
    background-image: url('https://uploads-ssl.webflow.com/5d9f3e21a78bd192c39905ad/5db0ae33dc9fed66ae1dbfa3_Group%2016.39.svg'),linear-gradient(180deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $data_seguranca['seguranca_secao1_img'];?>');">
    <div class="mycontainer padup">
        <div class="section-1col-wrapper left rightpad">
            <h1 class="h1white pad20 white type-gradient" data-ix="fade-in-on-load"><span><?php echo $data_seguranca['seguranca_secao1_title'];?></span></h1>
            <div class="h1white"><span data-ix="fade-in-on-load-2"><?php echo $data_seguranca['seguranca_secao1_descricao'];?></span></div>
        </div>
    </div>
</div>


<div id="abas" class="section-second" data-ix="fade-in-on-scroll-2">
    <div class="mycontainer-3">
        <div class="div-block-41">

        <?php
            for($i=1;$i<=3;$i++):
                $key_title = "seguranca_secao1_item$i" . "_title";
                $key_subtitle = "seguranca_secao1_item$i" . "_subtitle";
            ?>
            <div class="div-block-42">
                <div class="div-block-74">
                    <h3 class="white-2"><?php echo $data_seguranca[$key_title];?></h3>
                </div>
                <div class="div-block-40">
                    <div class="body-text-white lightblue centered type-gradient"><span><?php echo $data_seguranca[$key_subtitle];?></span></div>
                </div>
            </div>
            <?php endfor;?>

        </div>
    </div>
</div>


<div id="seguranca" class="section-seguranca">
    <div class="div-block-43">
        <h2 class="heading-28"><?php echo $data_seguranca['seguranca_secao1_item1_title'];?></h2>
    </div>
    <div class="div-block-44">
        <div class="body-text-2 _16pad"><?php echo $data_seguranca['seguranca_secao1_item1_desc'];?></div>
    </div>

    <div class="div-block-77">
        <div data-duration-in="300" data-duration-out="100" class="tabs-3 w-tabs">
            <div class="tabs-menu-4 w-tab-menu">
            <?php
                $seguranca = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_seguranca where tipo = 'seguranca' ")),true);
                $cont=1;
                $class_tab_active_new = ($cont==1) ? "w--current" : "";
                foreach($seguranca as $k=>$item):

                ?>
                <a data-w-tab="Tab <?php echo $cont;?>" class="tab-link-tab-1-2 _8pad w-inline-block w-tab-link <?php echo $class_tab_active_new;?>">
                    <div class="div-block-45"><img src="<?php echo $item['url_img'];?>" width="136" alt="" class="image-15">
                        <div class="body-text-link3"><?php echo $item['title'];?></div>
                    </div>
                </a>
                <?php $cont++; endforeach;?>
            </div>
            
            <div class="tabs-content-2 w-tab-content">
            <?php
                $cont=1;
                foreach($seguranca as $k=>$item):
                    $class_tab_active = ($cont==1) ? "w--tab-active" : "";
                ?>
                <div data-w-tab="Tab <?php echo $cont;?>" class="section-gradient <?php echo $class_tab_active;?>">
                    <div class="section-gradient left">
                        <div class="mycontainer-3">
                            <div class="seguranca-gradient-wrapper-copy">
                                <div class="div-block-37">
                                    <div>
                                        <p class="h1white lef"><?php echo $item['description'];?></p>
                                    </div>
                                </div>
                                <div>
                                    <div class="h1white left"><?php echo $item['description_alternative'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $cont++; endforeach;?>
            </div>
        </div>
    </div>
</div>

<div class="mycontainer-3">
    <div id="conformidade" class="section--conformidade">
        <div class="text">
            <div class="div-block-43">
                <h2 class="heading-29"><?php echo $data_seguranca['seguranca_secao1_item2_title'];?></h2>
            </div>
            <div class="div-block-44 _16pad">
                <div class="body-text-2"><?php echo $data_seguranca['seguranca_secao1_item2_desc'];?></div>
            </div>
        </div>

        <?php
            $conformidade = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_seguranca where tipo = 'conformidade' ")),true);
            $cont=1;
            foreach($conformidade as $k=>$item):

        ?>
        <div class="div-block-48 _8mrgn"><img src="<?php echo $item['url_img'];?>" alt="">
            <h3><?php echo $item['title'];?></h3>
            <div class="body-text-2"><?php echo $item['description'];?></div>
        </div>
        <?php $cont++; endforeach;?>
    </div>

    <div id="status_sistema" class="section-status moremargin">
        <div class="div-block-43">
            <h2 class="heading-18"><?php echo $data_seguranca['seguranca_secao4_title'];?></h2>
        </div>
        <div class="div-block-44 _16pad">
            <div class="body-text-2"><?php echo $data_seguranca['seguranca_secao4_descricao'];?></div>
        </div>
        <div class="section--conformidade">
        <?php
            for($i=1;$i<=6;$i++):
                $key_title = "seguranca_secao4_item" . $i . "_title";
                if(!empty($data_seguranca[$key_title]) && $data_seguranca[$key_title] != 'Insira uma Informação'):
        ?>
            <div class="div-block-48-copy _8mrgn">
                <h3 class="heading-17"><?php echo $data_seguranca[$key_title];?></h3>
                <div class="div-block-50 online">
                    <div>ONLINE</div>
                </div>
            </div>
        <?php endif; endfor;?>
        </div>
    </div>
</div>

<?php get_footer();?>
</body>