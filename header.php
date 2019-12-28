<?php
require_once dirname_oldphp(__FILE__, 3) . 'plugins/d1_plugin/includes/base/d1_view_parser.php';
require_once dirname_oldphp(__FILE__, 3) . 'themes/d1_theme/menu_tree.php';
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
session_start(); 
$language_option = !empty($_SESSION['d1_language_option']) ? $_SESSION['d1_language_option'] : "PT";
$language = (!empty($language_option) && $language_option != "PT") ? $language_option ."_" : "";
$menu_language = (!empty($language_option) && $language_option != "PT") ? "_" . strtolower($language_option) : "";
$arr_lang = array('PT','EN','ES');
$GLOBALS["data"] = $d1_view_parser->get_data($language);
$data_config_geral = $GLOBALS["data"]["d1_plugin_config_geral"];
$data_header = $GLOBALS["data"]["d1_plugin"];
$data_header['d1_favicon'] = (!empty($data_header['d1_favicon'])) ? $data_header['d1_favicon'] : $img_default;
$id_menu_cta = $data_header['d1_menu_cta'];
$id_menu_cta = !empty($id_menu_cta) ? $id_menu_cta : 0;
$menu_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_call_to_action WHERE id=$id_menu_cta")), true);
$menu_cta = !empty($menu_cta[0]) ? $menu_cta[0] : array();
$menu = array_values(get_d1_menu_tree('menu_principal'.$menu_language));
?>

<head>
    <meta charset="utf-8">
    <title><?php wp_title(''); ?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri() . '/'; ?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/'; ?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/'; ?>css/d1-new.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/'; ?>css/d1web.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri() . '/'; ?>js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri() . '/'; ?>js/index.js" type="text/javascript"></script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document)
    </script>
    <link href="<?php echo get_template_directory_uri() . '/'; ?>icons/webclip.png" rel="apple-touch-icon">
    <link href="<?php echo $data_header['d1_favicon']; ?>" rel="shortcut icon" type="image/x-icon">
</head>


<div class="nav-black-bg"></div>
<div class="wrapper-menu">
    <div class="div-block-69">
        <div class="div-block-70">
            <div class="secondary-text type-gradient"><span><?php echo $data_config_geral['top_bar_desc']; ?></span>
            </div><a href="<?php echo $data_config_geral['top_bar_link']; ?>" class="link-top-menu"><?php echo $data_config_geral['top_bar_text_link']; ?></a>
        </div>
        <div><a href="<?php echo $data_config_geral['top_bar_login_link']; ?>" class="link-top-menu-copy type-gradient"><span><?php echo $data_config_geral['top_bar_text_login_link']; ?></span></a>
            <div class="div-block-71">
                <div data-delay="0" class="dropdown-3 w-dropdown">
                <?php 
                    foreach($arr_lang as $lang):
                        if($language_option == $lang):
                ?>
                        <div class="dropdown-toggle-3 w-dropdown-toggle">
                            <div class="icon w-icon-dropdown-toggle"></div>
                            <div class="text-block-6"><?php echo $lang;?></div>
                        </div>
                        <?php endif;?>
                <?php endforeach;?>
                <?php
                    foreach($arr_lang as $lang):
                        if($language_option != $lang):
                ?>
                            <nav class="dropdown-list-2 w-dropdown-list"><a href="<?php echo get_template_directory_uri() ."/language.php?lang=$lang&location=" . get_home_url() ;?>" class="dropdown-link-2 w-dropdown-link"><?php echo $lang;?></a></nav>
                        <?php endif;?>
                <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>


    <div data-collapse="medium" data-animation="over-right" data-duration="400" data-doc-height="1" data-no-scroll="1" class="navbar-3 w-nav">
        <div class="div-block-82">
            <a href="<?php echo get_home_url(); ?>" class="brand-3 w-nav-brand"><img src="<?php echo get_template_directory_uri(); ?>/images/betterjourneys.svg" width="8" alt="" class="image-9"></a>
        </div>
        <nav role="navigation" class="nav-menu w-nav-menu">
            <div class="menu-wrapper mobi w-clearfix">
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-1" style="">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-1" aria-controls="w-dropdown-list-1" aria-haspopup="menu" style="outline: none;">
                    <a href="#"><div class="text-block-4 "><?php echo $menu[0]->title; ?></div></a>
                    </div>
                    <nav class="dropdown-plataforma w-dropdown-list" id="w-dropdown-list-1">
                        <div class="menu-select-plataforma"></div>
                        <div class="menu-plataforma-wrapper">
                            <div class="div-block-112">
                            <?php 
                            $cont = 1;
                            foreach($menu[0]->wpse_children as $key=>$wpse):
                                $icon = wp_get_attachment_url($wpse->thumbnail_id);
                                $icon = !empty($icon) ? $icon : $img_default ;
                            ?>
                                <div class="menu-item-wrapper">
                                    <a href="<?php echo $wpse->url;?>" class="menu-item w-inline-block">
                                        <div class="plat-menu-journey" style='background-image: url("<?php echo $icon;?>");'></div>
                                        <div class="div-block-22">
                                            <div class="select-item link"><?php echo $wpse->title;?></div>
                                            <div class="secondary-text-link"><?php echo $wpse->description;?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php $cont++; endforeach;?>
                            </div>
                        </div>
                    </nav>
                </div>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-2" style="">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-2" aria-controls="w-dropdown-list-2" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4"><?php echo $menu[1]->title; ?></div>
                    </div>
                    <nav class="dropdown-segmentos w-dropdown-list" id="w-dropdown-list-2">
                        <div class="menu-select-segmentos"></div>
                        <div class="menu-solucoes-wrapper">
                            <?php foreach($menu[1]->wpse_children as $key=>$wpse): ?>
                                <div class="menu-solucoes-column">
                                <div class="dark-footer-subtitle notopline"><?php echo $wpse->title;?></div>
                                <?php 
                                    foreach($wpse->wpse_children as $k=>$v):
                                ?>
                                    <a href="<?php echo $v->url;?>" class="black-menu-link"><?php echo $v->title;?></a>
                                    <?php endforeach;?>
                                </div>
                                <?php endforeach;?>
                        </div>
                    </nav>
                </div>

                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-3" style="">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-3" aria-controls="w-dropdown-list-3" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4"><?php echo $menu[2]->title; ?></div>
                    </div>
                    <nav class="dropdown-conteudo w-dropdown-list" id="w-dropdown-list-3">
                        <div class="menu-select-conteudos"></div>
                        <div class="menu-conteudos-wrapper">
                            <?php foreach($menu[2]->wpse_children as $key=>$wpse): ?>
                                <a href="<?php echo $wpse->url;?>" class="black-menu-link"><?php echo $wpse->title;?></a>
                            <?php endforeach;?> 
                    </nav>
                </div>

                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-4">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-4" aria-controls="w-dropdown-list-4" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4"><?php echo $menu[3]->title; ?></div>
                    </div>
                    <?php foreach($menu[3]->wpse_children as $key=>$wpse): ?>
                    <nav class="dropdown-preco w-dropdown-list" id="w-dropdown-list-4">
                        <div class="menu-select-preco"></div>
                        <div class="menu-preco-wrapper">
                            <div class="body-text-white"><?php echo $wpse->description;?></div>
                            <div class="menu-preco">
                                <a href="<?php echo $wpse->url;?>" class="body-text-link3 precocta"><?php echo $wpse->title;?></a>
                                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink">
                            </div>
                        </div>
                    </nav>
                    <?php endforeach;?> 
                </div>

                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-5">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-5" aria-controls="w-dropdown-list-5" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4"><?php echo $menu[4]->title; ?></div>
                    </div>
                    <nav class="dropdown-conteudo w-dropdown-list" id="w-dropdown-list-5">
                        <div class="menu-select-sobre"></div>
                        <div class="menu-conteudos-wrapper">
                        <?php foreach($menu[4]->wpse_children as $key=>$wpse): ?>
                            <a href="<?php echo $wpse->url;?>" class="black-menu-link"><?php echo $wpse->title;?></a>
                        <?php endforeach;?> 
                    </nav>
                </div>
                <div class="div-block-32">
                    <a href="<?php echo $menu_cta['link']; ?>" class="btn-black-home-outline herp line type-gradient w-button"><?php echo $menu_cta['title']; ?></a>
                </div>
            </div>
        </nav>
        <div class="menu-button w-nav-button">
            <div class="menu-button w-nav-button"><img src="<?php echo get_template_directory_uri() . '/'; ?>images/Menu.png" width="33" alt="" class="image-6"></div>
        </div>

    </div>
</div>