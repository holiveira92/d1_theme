<?php
require_once dirname_oldphp(__FILE__, 3) . 'plugins/d1_plugin/includes/base/d1_view_parser.php';
global $wpdb;
$d1_view_parser = new D1_View_Parser();
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$GLOBALS["data"] = $d1_view_parser->get_data();
$data_header = $GLOBALS["data"]["d1_plugin"];
$data_header['d1_favicon'] = (!empty($data_header['d1_favicon'])) ? $data_header['d1_favicon'] : $img_default;
$id_menu_cta = $data_header['d1_menu_cta'];
$id_menu_cta = !empty($id_menu_cta) ? $id_menu_cta : 0;
$menu_cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_menu_cta")), true);
$menu_cta = !empty($menu_cta[0]) ? $menu_cta[0] : array();
$menu = wp_get_nav_menus('d1_theme');
$menu_itens = wp_get_nav_menu_items($menu[0]->term_id);
$menu_pai = array();
//pre($menu_itens);die;
foreach ($menu_itens as $key => $menu) {
    if ($menu->menu_item_parent == 0) {
        $menu_pai[] = array(
            'id' => $menu->ID,
            'title' => $menu->title,
            'subitems' => array()
        );
    }
}
foreach ($menu_pai as $key => &$menu) {
    foreach ($menu_itens as $key => $item) {
        if ($item->menu_item_parent == $menu['id']) {
            $menu['subitems'][] = array(
                'id' => $item->ID,
                'title' => $item->title,
                'url' => $item->url,
            );
        }
    }
}

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
            <div class="secondary-text type-gradient"><span>Siga a D1 no LinkedIn para saber sobre os próximos eventos e novidades da empresa.</span></div><a href="https://www.linkedin.com/company/d1experience/" class="link-top-menu">Acesse aqui!</a>
        </div>
        <div><a href="https://app.direct.one" class="link-top-menu-copy type-gradient"><span>LOG IN</span></a>
            <div class="div-block-71 hide">
                <div data-delay="0" class="dropdown-3 w-dropdown">
                    <div class="dropdown-toggle-3 w-dropdown-toggle">
                        <div class="icon w-icon-dropdown-toggle"></div><img src="<?php echo get_template_directory_uri(); ?>/images/brasilflag.svg" alt="">
                        <div class="text-block-6">PT</div>
                    </div>
                    <nav class="dropdown-list-2 w-dropdown-list"><a href="#" class="dropdown-link-2 w-dropdown-link">EN</a></nav>
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
                    <a href="../plataforma/"><div class="text-block-4 ">PLATAFORMA</div></a>
                    </div>
                    <!--<nav class="dropdown-plataforma w-dropdown-list" id="w-dropdown-list-1">
                        <div class="menu-select-plataforma"></div>
                        <div class="menu-plataforma-wrapper">
                            <div class="div-block-112">
                                <div class="menu-item-wrapper"><a href="#" class="menu-item w-inline-block">
                                        <div class="plat-menu-journey"></div>
                                        <div class="div-block-22">
                                            <div class="select-item link">Journeys</div>
                                            <div class="secondary-text-link">Construa jornadas otimizadas e reduza seus custos</div>
                                        </div>
                                    </a></div>
                                <div class="menu-item-wrapper"><a href="#" class="menu-item w-inline-block">
                                        <div class="plat-menu-customeinsights"></div>
                                        <div class="div-block-22">
                                            <div class="select-item link">Customer Insights</div>
                                            <div class="secondary-text-link">Construa jornadas otimizadas e reduza seus custos</div>
                                        </div>
                                    </a></div>
                                <div class="menu-item-wrapper"><a href="#" class="menu-item w-inline-block">
                                        <div class="plat-menu-multichannel"></div>
                                        <div class="div-block-22">
                                            <div class="select-item link">Multichannel</div>
                                            <div class="secondary-text-link">Construa jornadas otimizadas e reduza seus custos</div>
                                        </div>
                                    </a></div>
                            </div>
                            <div>
                                <div class="menu-item-wrapper"><a href="#" class="menu-item w-inline-block">
                                        <div class="plat-menu-blockchain"></div>
                                        <div class="div-block-22">
                                            <div class="select-item link">Blockchain</div>
                                            <div class="secondary-text-link">Construa jornadas otimizadas e reduza seus custos</div>
                                        </div>
                                    </a></div>
                                <div class="menu-item-wrapper"><a href="#" class="menu-item w-inline-block">
                                        <div class="plat-menu-documents"></div>
                                        <div class="div-block-22">
                                            <div class="select-item link">Documents</div>
                                            <div class="secondary-text-link">Construa jornadas otimizadas e reduza seus custos</div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </nav>-->
                </div>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-2" style="">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-2" aria-controls="w-dropdown-list-2" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4">SOLUÇÕES</div>
                    </div>
                    <nav class="dropdown-segmentos w-dropdown-list" id="w-dropdown-list-2">
                        <div class="menu-select-segmentos"></div>
                        <div class="menu-solucoes-wrapper">
                            <div class="menu-solucoes-column">
                                <div class="dark-footer-subtitle notopline">SEGMENTOS</div>
                                <a href="https://d1new.wpengine.com/segmentos/seguros/3" class="black-menu-link">Seguros</a>
                                <a href="https://d1new.wpengine.com/segmentos/varejo/2" class="black-menu-link">Varejo</a>
                                <a href="https://d1new.wpengine.com/segmentos/servicos-financeiros/1" class="black-menu-link">Serviços Financeiros</a>
                                <a href="https://d1new.wpengine.com/segmentos/saude/4" class="black-menu-link">Saúde</a>
                            </div>
                            <!--<div class="menu-solucoes-column">
                                <div class="dark-footer-subtitle lineup">DEPARTAMENTOS</div><a href="#" class="black-menu-link">Atendimento</a><a href="#" class="black-menu-link">Operações</a><a href="#" class="black-menu-link">Marketing</a><a href="#" class="black-menu-link">Gestão</a><a href="#" class="black-menu-link noline">Tecnologia</a>
                            </div>
                            <div class="menu-solucoes-column">
                                <div class="dark-footer-subtitle">OBJETIVOS</div><a href="#" class="black-menu-link">Satisfação do Cliente</a><a href="#" class="black-menu-link">Redução de Custos</a><a href="#" class="black-menu-link noline">Retenção de Custos</a>
                            </div>-->
                        </div>
                    </nav>
                </div>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-3" style="">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-3" aria-controls="w-dropdown-list-3" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4">CONTEÚDOS</div>
                    </div>
                    <nav class="dropdown-conteudo w-dropdown-list" id="w-dropdown-list-3">
                        <div class="menu-select-conteudos"></div>
                        <div class="menu-conteudos-wrapper">
                            <a href="../cases/" class="black-menu-link">Cases</a>
                            <!--<a href="#" class="black-menu-link">Whitepapers</a>
                            <a href="#" class="black-menu-link">Webinars</a>-->
                            <a href="https://medium.com/d1experience" class="black-menu-link">Blog</a></div>
                    </nav>
                </div>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-4">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-4" aria-controls="w-dropdown-list-4" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4">PREÇO</div>
                    </div>
                    <nav class="dropdown-preco w-dropdown-list" id="w-dropdown-list-4">
                        <div class="menu-select-preco"></div>
                        <div class="menu-preco-wrapper">
                            <div class="body-text-white">Comece a sua jornada aqui</div>
                            <div class="menu-preco"><a href="../preco/" class="body-text-link3 precocta">VER&nbsp;PÁGINA DE ORÇAMENTOS</a><img src="https://d1new.wpengine.com/conteudo/themes/d1_theme/images/arrowlink-black.svg" alt="" class="arrowlink"></div>
                        </div>
                    </nav>
                </div>
                <div data-delay="0" data-hover="1" class="dropdown w-dropdown" role="menu" aria-labelled-by="w-dropdown-toggle-5">
                    <div class="menulink w-dropdown-toggle" tabindex="0" id="w-dropdown-toggle-5" aria-controls="w-dropdown-list-5" aria-haspopup="menu" style="outline: none;">
                        <div class="text-block-4">SOBRE</div>
                    </div>
                    <nav class="dropdown-conteudo w-dropdown-list" id="w-dropdown-list-5">
                        <div class="menu-select-sobre"></div>
                        <div class="menu-conteudos-wrapper">
                            <a href="../nossa-jornada" class="black-menu-link">Nossa Jornada</a>
                            <a href="../seguranca" class="black-menu-link">Segurança & Conformidade</a>
                            <a href="https://directone.gupy.io/" class="black-menu-link">Carreiras</a>

                    </nav>
                </div>
                <div class="div-block-32"><a href="../contato" class="btn-black-home-outline herp line type-gradient w-button">FALAR&nbsp;COM&nbsp;ESPECIALISTA</a></div>
            </div>
        </nav>
        <div class="menu-button w-nav-button">
            <div class="menu-button w-nav-button"><img src="<?php echo get_template_directory_uri() . '/'; ?>images/Menu.png" width="33" alt="" class="image-6"></div>
        </div>

    </div>
</div>