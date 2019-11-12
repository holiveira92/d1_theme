<?php
require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data();
$data_header = $GLOBALS["data"]["d1_plugin"];
$data_header['d1_favicon'] = (!empty($data_header['d1_favicon'])) ? $data_header['d1_favicon'] : $img_default ;
$id_menu_cta = $data_header['d1_menu_cta'];
$id_menu_cta = !empty($id_menu_cta) ? $id_menu_cta : 0;
$menu_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_menu_cta")),true);
$menu_cta = !empty($menu_cta[0]) ? $menu_cta[0] : array();
$menu = wp_get_nav_menus();
$menu_itens = wp_get_nav_menu_items($menu[0]->term_id);
$menu_pai = array();
//pre($menu_itens);die;
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


<div class="nav-black-bg"></div>
    <div class="wrapper-menu">
        <div class="div-block-69">
            <div class="div-block-70">
                <div class="secondary-text type-gradient"><span>Quer saber as melhoras práticas do mercado de Customer Experience?</span></div><a href="#" class="link-top-menu">Descubra aqui</a></div>
            <div><a href="#" class="link-top-menu-copy type-gradient"><span>LOG IN</span></a>
                <div class="div-block-71">
                    <div data-delay="0" class="dropdown-3 w-dropdown">
                        <div class="dropdown-toggle-3 w-dropdown-toggle">
                            <div class="icon w-icon-dropdown-toggle"></div><img src="https://uploads-ssl.webflow.com/5d5d3ab49052fea25a4b1c73/5d9be7f2f2af2d39dbfdb3e2_brasilflag.svg" alt="">
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
                            <nav class="dropdown-conteudo w-dropdown-list">
                                <div class="menu-select-conteudos"></div>
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
            <div class="menu-button w-nav-button"><img src="<?php echo get_template_directory_uri().'/';?>images/Menu.png" width="33" alt="" class="image-6"></div>
        </div>

    </div>
</div>