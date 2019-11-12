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
$data_header = $GLOBALS["data"]["d1_plugin"];
$data_header['d1_favicon'] = (!empty($data_header['d1_favicon'])) ? $data_header['d1_favicon'] : $img_default ;
$data_plataforma = $GLOBALS["data"]["d1_plugin_plataforma"];
$id_menu_cta = $data_header['d1_menu_cta'];
$id_menu_cta = !empty($id_menu_cta) ? $id_menu_cta : 0;
$menu_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_menu_cta")),true);
$menu_cta = !empty($menu_cta[0]) ? $menu_cta[0] : array();
$id_secao1_cta = $data_plataforma['plataforma_secao1_cta'];
$id_secao1_cta = !empty($id_secao1_cta) ? $id_secao1_cta : 0;
$secao1_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_secao1_cta")),true);
$secao1_cta = !empty($secao1_cta[0]) ? $secao1_cta[0] : array('title' =>'','link' =>'','target' =>'',);
$menu = wp_get_nav_menus();
$menu_itens = wp_get_nav_menu_items($menu[0]->term_id);
$menu_pai = array();
foreach($menu_itens as $key=>$menu){
    if($menu->menu_item_parent == 0){
        $menu_pai[] = array(
            'id' => $menu->ID,
            'title' => $menu->title,
            'subitems' => array()
        );
    }
}
foreach($menu_pai as $key=>&$menu){
    foreach($menu_itens as $key=>$item){
        if($item->menu_item_parent == $menu['id']){
            $menu['subitems'][] = array(
                'id' => $item->ID,
                'title' => $item->title,
                'url' => $item->url,
        );}
    }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php echo $data_header['d1_web_title'];?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri().'/';?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/d1web.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri().'/';?>js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/webflow.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/index.js" type="text/javascript"></script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart" in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document)</script>
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
    <link href="<?php echo $data_header['d1_favicon'];?>" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">

    <div class="nav-black-bg"></div>
    <div class="wrapper-menu">
        <div class="div-block-69">
            <div class="div-block-70">
                <div class="secondary-text type-gradient"><span>Quer saber as melhoras práticas do mercado de Customer Experience?</span></div><a href="#" class="link-top-menu">Descubra aqui</a></div>
            <div><a href="#" class="link-top-menu-copy type-gradient"><span>LOG IN</span></a>
                <div class="div-block-71">
                    <div data-delay="0" class="dropdown-3 w-dropdown">
                        <div class="dropdown-toggle-3 w-dropdown-toggle">
                            <div class="icon w-icon-dropdown-toggle"></div><img src="<?php echo get_template_directory_uri().'/';?>images/brasilflag.svg" alt="">
                            <div class="text-block-6">PT</div>
                        </div>
                        <nav class="dropdown-list-2 w-dropdown-list"><a href="#" class="dropdown-link-2 w-dropdown-link">EN</a></nav>
                    </div>
                </div>
            </div>
        </div>

        <div data-collapse="medium" data-animation="over-right" data-duration="400" data-doc-height="1" data-no-scroll="1" class="navbar-3 w-nav">
            <div class="div-block-82">
                <a href="#" class="brand-3 w-nav-brand"><img src="images/betterjourneys.svg" width="8" alt="" class="image-9"></a>
            </div>
            <nav role="navigation" class="nav-menu w-nav-menu">
                <div class="menu-wrapper mobi w-clearfix">
                    
                <!-- Bloco de criação dos menus pai -->
                <?php foreach($menu_pai as $key=>$menu): ?>
                    <div data-delay="0" data-hover="1" class="dropdown w-dropdown">
                        <div class="menulink w-dropdown-toggle">
                            <div class="text-block-4"><?php echo $menu['title'];?></div>
                        </div>
                        <nav class="dropdown-segmentos w-dropdown-list">
                            <div class="menu-select-segmentos"></div>
                            <div class="menu-conteudos-wrapper">
                        <!-- Bloco de criação dos menus filhos -->
                        <?php foreach($menu['subitems'] as $key=>$item): ?>
                            <a href="<?php echo $item['url'];?>" class="black-menu-link"><?php echo $item['title'];?></a>
                        <?php endforeach; ?>
                            </div>
                        </nav>
                    </div>
                <?php endforeach; ?>
                <!-- Fim dos Blocos -->
                
                    <div class="div-block-32"><a href="<?php echo $menu_cta['link'];?>" target="<?php echo $menu_cta['target'];?>" class="btn-black-home-outline herp line type-gradient w-button"><span><?php echo $menu_cta['title'];?></span></a></div>
                </div>
            </nav>
            <div class="menu-button w-nav-button">
                <div class="menutext">Menu</div><img src="<?php echo get_template_directory_uri().'/';?>images/Menu.png" width="33" alt="" class="image-6"></div>
        </div>
    </div>

    <div id="hero" class="plataforma-hero2">
        <div class="mycontainer">
            <div class="section-2col-wrapper _8narrow topmargin">
                <div class="section-col-left-2 narrow notop">
                    <h1 class="heading-25 left noleft notop bottom" data-ix="fade-in-on-load"><?php echo $data_plataforma['plataforma_secao1_title'];?></h1>
                    <div class="h1white" data-ix="fade-in-on-load"><?php echo $data_plataforma['plataforma_secao1_descricao'];?> </div>
                    <a href="<?php echo $secao1_cta['link'];?>" target="<?php echo $secao1_cta['target'];?>" class="btn-black-home-play w-button" data-ix="fade-in-on-load-2"><?php echo $secao1_cta['title'];?></a> </div>
                <div class="section-col-left _80 right"><img src="<?php echo $data_plataforma['plataforma_secao1_img'];?>" width="453"  alt="" class="image-plataforma hero notop" data-ix="fade-in-on-load-2"></div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownblack.svg" width="12" alt=""></div>
    </div>

    
    <div id="desafios" class="plataforma-wrapper-grandient gradient-bg" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="servico-cards-wrapper">
                <div>
                    <h6 class="h1white nomargin"><?php echo $data_plataforma['plataforma_secao1_desafio_title'];?></h6>
                </div>
                <div class="case-thumb-content-wrapper">
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card1_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card1_desc'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card2_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card2_desc'];?></p>
                    </div>
                    <div class="servicos-thumb-content">
                        <h3><?php echo $data_plataforma['plataforma_secao1_card3_title'];?></h3>
                        <p><?php echo $data_plataforma['plataforma_secao1_card3_desc'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="modulos" class="section-stripe-platfaorma blackbg" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <h6 class="h1white lightblue2 type-gradient"><span><?php echo $data_plataforma['plataforma_secao2_title'];?></span></h6>
            <div class="div-block-26">
                <div class="selectplataform"><a href="#" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo1_title'];?></a></div>
                <div class="selectplataform"><a href="#" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo2_title'];?></a></div>
                <div class="selectplataform"><a href="#" class="link-2 type-gradient"><span><?php echo $data_plataforma['plataforma_secao2_modulo3_title'];?></span></a></div>
                <div class="selectplataform"><a href="#" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo4_title'];?></a></div>
                <div class="selectplataform"><a href="#" class="link-2"><?php echo $data_plataforma['plataforma_secao2_modulo5_title'];?></a></div>
            </div>
        </div>
    </div>

    <?php for($i=1;$i<=5;$i++): ?>
    <div id="modulo" class="section-wrapper-large" data-ix="fade-in-on-scroll-2">
        <div class="mycontainer">
            <div class="section-2col-wrapper narrow">
                <div class="section-col-left left">
                    <div class="plataforma-title">
                        <div class="plataforma-icon-title"><img src="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_img_icon"];?>" width="90" alt=""></div>
                        <h1 class="heading-37"><?php echo $data_plataforma["plataforma_secao2_modulo$i"."_title"];?></h1>
                    </div>
                    <div class="pad20 left"><?php echo $data_plataforma["plataforma_secao2_modulo$i"."_desc"];?></div>
                    <div class="home-title-case2 left noinvert"><a href="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_link"];?>" class="body-text-link3">VER MÓDULO</a>
                        <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink">
                    </div>
                </div>
                <div class="section-col-left margin"><img src="<?php echo $data_plataforma["plataforma_secao2_modulo$i"."_img"];?>" width="1004" alt="" class="img-plataforma image-11"></div>
            </div>
        </div>
    </div>
    <?php endfor; ?>


    <div id="cases" class="section-wrapper-large bg-grey notop">
        <div class="mycontainer">
            <div class="tabs-section-title-2col narrow">
                <h6 class="pad20"><?php echo $data_plataforma['plataforma_secao3_cases_title'];?></h6>
                <div class="link-text-arrow noinvert"><a href="#" class="link-text-black">VER CASES</a>
                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink"></div>
            </div>
            <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
                <?php
                for($i=1;$i<=3;$i++):
                    $key_select = "plataforma_secao3_case" . $i;
                    $query = "SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = '" . $data_plataforma[$key_select] ."'";
                    $cards = json_decode(json_encode($wpdb->get_results($query)),true);
                    foreach($cards as $key=>$card):
                ?>
                    <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
                        <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                        <h6 class="lightblue type-gradient"><span><?php echo $card['subtitle_card'];?></span></h6>
                        <div class="case-thumb-numbers">
                            <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                            <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                        </div><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20">
                    </div>
                <?php endforeach; endfor;?>
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
                $query = "SELECT * FROM " . $wpdb->prefix . "d1_faq where page = 'plataforma'";
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

<?php get_footer(); ?>
</body>
</html>