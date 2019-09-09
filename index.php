<?php
//Obter todas as opções da página
//$gerenal_configs = $d1_settings_api->get_d1_general_options();
//var_dump($gerenal_configs);die;
$gerenal_configs = array(
    'title' => get_option('d1_web_title'),
    'secao1_hero_name' => get_option('secao1_hero_name'),
    'secao1_hero_cargo' => get_option('secao1_hero_cargo'),
    'secao1_hero_descricao' => get_option('secao1_hero_descricao'),
    'secao1_descricao_primaria' => get_option('secao1_descricao_primaria'),
    'secao1_descricao_secundaria' => get_option('secao1_descricao_secundaria'),
)
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $gerenal_configs['title'];?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri().'/';?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/d1web.webflow.css" rel="stylesheet" type="text/css">
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="<?php echo get_template_directory_uri().'/';?>icons/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
</head>

<body>
    <div class="mycontainer">
        <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar-2 w-nav">
            <div class="home-logo">
                <a href="#" class="brand w-nav-brand"></a>
            </div>
            <nav role="navigation" class="nav-menu w-nav-menu"><a href="#" class="menu-highllight w-nav-link">PLATAFORMA</a><a href="#" class="menu-highllight w-nav-link">SOLUÇÕES</a><a href="#" class="menu-highllight w-nav-link">CONTEÚDOS</a><a href="#" class="menu-highllight w-nav-link">PREÇO</a><a href="#" class="menu-highllight w-nav-link">SOBRE</a><a href="#" class="menu-highllight text-gradient w-nav-link">FALAR COM ESPECIALISTA</a></nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
    <div class="home-hero">
        <div class="mycontainer">
            <div class="hero-wrapper">
                <div class="hero-mockup-description-block">
                    <!--
                    <h1 class="white-hero-title">Engaje clientes com <span class="text-gradient">jornadas multicanais</span></h1>
                    <p class="p-white"><span class="text-gradient">Plataforma de engajamento </span>que ajuda grandes empresas a automatizar suas comunicações com clientes em canais como Email, SMS, WhatsApp, Voz, Push, entre outros.</p>
                    -->
                    <!-- Descrição Primária -->
                    <p class="p-white"><?php echo $gerenal_configs['secao1_descricao_primaria'];?></p>

                    <!-- Descrição Secundária -->
                    <!-- <p class="secondary-text p-white">Entenda como seu negócio pode <span class="text-gradient">melhorar a experiência do consumidor!</span></p> -->
                    <p class="secondary-text p-white"><?php echo $gerenal_configs['secao1_descricao_secundaria'];?></p>
                    <div class="div-block"><a href="#" class="button w-button">CONHEÇA EM 1 MINUTO</a></div>
                </div>
                <div class="div-block-17">
                    <h3 class="heading-8"><?php echo $gerenal_configs['secao1_hero_name'];?></h3>
                    <h6 class="heading-9 text-gradient"><?php echo $gerenal_configs['secao1_hero_cargo'];?></h6>
                    <p class="paragraph-4"><?php echo $gerenal_configs['secao1_hero_descricao'];?></p><img src="<?php echo get_template_directory_uri().'/';?>images/YOUSE-logo.png" alt="" class="image-3"></div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="homethumbcontetn">
            <div class="home-title-case">
                <div class="body-text-white">IMPACTOS REAIS DE MELHORIA EM CUSTOMER EXPERIENCE</div>
            </div>
            <div class="home-title-case2"><a href="#" class="body-text-link2">VER CASES</a><img src="https://uploads-ssl.webflow.com/5d556b82fee1f930c695bc98/5d5570c64d608a833f2fa00d_arrowlink.svg" alt="" class="arrowlink"></div>
        </div>
        <div class="mycontainer">
            <div class="cases-row w-row">
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="case-thumb-content">
                            <div class="case-thumb-title">
                                <h3>Escalando Mensagens<br>Transacionais na Black Friday</h3>
                                <h3 class="h6-gradient">EFICIÊNCIA OPERACIONAL</h3>
                            </div>
                            <div class="case-thumb-numbers">
                                <div class="text-block"><span class="text-span">20mi</span></div>
                                <div class="text-block-2">de eventos processados em horário de pico</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="case-thumb-content">
                            <div class="case-thumb-title">
                                <h3>Escalando Mensagens<br>Transacionais na Black Friday</h3>
                                <h3 class="h6-gradient">EFICIÊNCIA OPERACIONAL</h3>
                            </div>
                            <div class="case-thumb-numbers">
                                <div class="text-block"><span class="text-span">20mi</span></div>
                                <div class="text-block-2">de eventos processados em horário de pico</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="case-thumb-content">
                            <div class="case-thumb-title">
                                <h3>Escalando Mensagens<br>Transacionais na Black Friday</h3>
                                <h3 class="h6-gradient">EFICIÊNCIA OPERACIONAL</h3>
                            </div>
                            <div class="case-thumb-numbers">
                                <div class="text-block"><span class="text-span">20mi</span></div>
                                <div class="text-block-2">de eventos processados em horário de pico</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2 tint">
        <div class="mycontainer">
            <div class="section-title-wrapper">
                <div class="body-text-2 grey">CLIENTES QUE ENCANTAM CLIENTES</div>
            </div>
            <div class="logo-clients-wrapper">
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes6qualicorp.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes8sulamerica.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes4hdi.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes3caixa.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes_23viavarejo.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes2pan.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes_14zurich.png" alt=""></div>
                <div class="image-clientes-block"><img src="<?php echo get_template_directory_uri().'/';?>images/logos_clientes_12youse.png" alt=""></div>
            </div>
        </div>
        <div class="mycontainer">
            <div class="section-title-wrapper">
                <div class="body-text-2 grey">QUAL É O SEU MAIOR DESAFIO?</div>
            </div>
            <div class="cases-row w-row">
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="desafio-thumb-content">
                            <div class="case-thumb-title">
                                <h3 class="h3-desafio">Satisfação do Cliente</h3>
                                <p class="p-white">Somos especialistas em ajudar sua empresa a crescer seu score.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="desafio-thumb-content">
                            <div class="case-thumb-title">
                                <h3 class="h3-desafio">Satisfação do Cliente</h3>
                                <p class="p-white">Somos especialistas em ajudar sua empresa a crescer seu score.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cases-column w-col w-col-4 w-col-medium-4">
                    <div class="cases-thumb-block">
                        <div class="desafio-thumb-content">
                            <div class="case-thumb-title">
                                <h3 class="h3-desafio">Satisfação do Cliente</h3>
                                <p class="p-white">Somos especialistas em ajudar sua empresa a crescer seu score.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blue-section ui-section">
        <div class="mycontainer">
            <div class="info-block-left ui">
                <div class="section-title-wrapper-2 full info">
                    <h2 class="white-hero-title">Calcule a <span>Maturidade de Customer Experience</span> da sua empresa</h2>
                </div>
                <p class="p-white">Mapeie, através da nossa calculadora, o nível de maturidade de CX da sua empresa e comece a desenhar a estratégia para reduzir custos operacionais, fidelizar clientes, aumentando o ticket médio e o life-time value.</p><a href="#" class="btn-cx w-button">CALCULAR CX</a></div>
        </div>
    </div>
    <div class="section-3">
        <div class="mycontainer">
            <div class="homethumbcontetn">
                <div class="home-title-case">
                    <div class="body-text-2">IMPACTOS REAIS DE MELHORIA EM CUSTOMER EXPERIENCE</div>
                </div>
                <div class="home-title-case2"><a href="#" class="body-text-link3">VER CASES</a><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink-black.svg" alt="" class="arrowlink"></div>
            </div>
            <div class="div-block-15">
                <div data-duration-in="300" data-duration-out="100" class="tabs-2 w-tabs">
                    <div class="tabs-menu w-tab-menu">
                        <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>JOURNEYS</div>
                        </a>
                        <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>CUSTOMER INSIGHTS</div>
                        </a>
                        <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>MULTICHANNEL</div>
                        </a>
                        <a data-w-tab="Tab 4" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>CONNECT</div>
                        </a>
                        <a data-w-tab="Tab 5" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>BLOCKCHAIN</div>
                        </a>
                        <a data-w-tab="Tab 6" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                            <div>DOCUMENTS</div>
                        </a>
                    </div>
                    <div class="tabs-content w-tab-content">
                        <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 2" class="w-tab-pane">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 3" class="w-tab-pane">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 4" class="w-tab-pane">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 5" class="w-tab-pane">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 6" class="w-tab-pane w--tab-active">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="<?php echo get_template_directory_uri().'/';?>images/tab-example.png" 
                                            srcset="<?php echo get_template_directory_uri().'/';?>images/tab-example-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/tab-example-p-800.png 800w, 
                                            <?php echo get_template_directory_uri().'/';?>images/tab-example-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mycontainer">
        <div class="section-title-wrapper"></div>
    </div>
    <div class="home-black-section ui-section-2">
        <div class="home-blue-container">
            <div class="info-block-left ui-2">
                <div class="section-title-wrapper-2 full info">
                    <h2 class="white-hero-title">O que faz a D1 ser tão diferente?</h2>
                </div>
                <p>1. <span class="p-white">Uma plataforma completa de gestão da experiência dos seus clientes.</span>
                    <br>‍
                    <br>2. <span class="p-white">Integração rápida com todos os softwares. Somos API Ready.</span>
                    <br>
                    <br>3. <span class="p-white">Estrutura escalável e pronta para operações de alta escala.</span></p>
                <div class="home-balck-button-wrapper"><a href="#" class="btn-black-home-play w-button">ASSISTA AO WEBINAR</a></div>
            </div>
            <div class="home-laptop-wrapper"><img src="<?php echo get_template_directory_uri().'/';?>images/laptop_mockup.png" width="673" 
            srcset="<?php echo get_template_directory_uri().'/';?>images/laptop_mockup-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/laptop_mockup-p-800.png 800w, 
            <?php echo get_template_directory_uri().'/';?>images/laptop_mockup-p-1080.png 1080w, <?php echo get_template_directory_uri().'/';?>images/laptop_mockup.png 1346w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 86vw, (max-width: 991px) 85vw, 56vw" alt=""></div>
        </div>
    </div>
    <div class="section-3">
        <div class="mycontainer">
            <div class="section-title-wrapper">
                <div class="body-text-2">INTERESSADO EM CONTRATAR NOSSOS SERVIÇOS?</div>
            </div>
            <div class="cases-row w-row">
                <div class="steps-column w-col w-col-3">
                    <div class="steps-thumb-block">
                        <div class="steps-thumb-content">
                            <div class="gradient-stripe"></div>
                            <h3>1. Identifique suas jornadas mais críticas</h3>
                            <div class="steps-thumb-content-bloc">
                                <p>Te ajudamos a selecionar um template de jornada já testado em grandes clientes</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-column w-col w-col-3">
                    <div class="steps-thumb-block">
                        <div class="steps-thumb-content">
                            <div class="gradient-stripe"></div>
                            <h3>1. Identifique suas jornadas mais críticas</h3>
                            <div class="steps-thumb-content-bloc">
                                <p>Te ajudamos a selecionar um template de jornada já testado em grandes clientes</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-column w-col w-col-3">
                    <div class="steps-thumb-block">
                        <div class="steps-thumb-block">
                            <div class="steps-thumb-content">
                                <div class="gradient-stripe"></div>
                                <h3>1. Identifique suas jornadas mais críticas</h3>
                                <div class="steps-thumb-content-bloc">
                                    <p>Te ajudamos a selecionar um template de jornada já testado em grandes clientes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-column w-col w-col-3">
                    <div class="steps-thumb-block">
                        <div class="steps-thumb-content">
                            <div class="gradient-stripe"></div>
                            <h3>1. Identifique suas jornadas mais críticas</h3>
                            <div class="steps-thumb-content-bloc">
                                <p>Te ajudamos a selecionar um template de jornada já testado em grandes clientes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="div-block-2"></div>
                <div class="div-block-3">
                    <div class="secondary-text">Veja como podemos trabalhar em conjunto <span class="text-gradient">para aumentar a qualidade do seu CX.</span></div>
                </div>
                <div class="div-block-4"><a href="#" class="btn-black-home w-button">FALAR COM ESPECIALISTA</a></div>
            </div>
        </div>
    </div>
    <div class="section-home-blog">
        <div class="mycontainer">
            <div class="section-title-wrapper">
                <div class="body-text-2 grey">QUER SE TONAR UM EXPERT EM CX?</div>
            </div>
            <p class="pgrey">Lançamos mensalmente uma série de conteúdos sobre Customer Experience para te ajudar a entender como implementar na sua empresa.</p>
            <div class="blog-row w-row">
                <div class="blog-column w-col w-col-4 w-col-medium-4">
                    <div class="blog-thumb-block">
                        <div class="blog-thumb-content">
                            <div class="blog-thumb-image-wrapper"><img src="<?php echo get_template_directory_uri().'/';?>images/imagee.png" 
                            srcset="<?php echo get_template_directory_uri().'/';?>images/imagee-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/imagee.png 692w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 93vw, 32vw" alt="" class="image-2"></div>
                            <div class="blog-thumb-text-wrapper">
                                <p class="paragraph-3">Transformação digital: você está pronto para essa mudança exponencial?</p><img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image"></div>
                        </div>
                    </div>
                </div>
                <div class="blog-column w-col w-col-4 w-col-medium-4">
                    <div class="blog-thumb-block">
                        <div class="blog-thumb-content">
                            <div class="blog-thumb-image-wrapper"><img src="<?php echo get_template_directory_uri().'/';?>images/imagee.png" 
                            srcset="<?php echo get_template_directory_uri().'/';?>images/imagee-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/imagee.png 692w" sizes="(max-width: 479px) 100vw, (max-width: 752px) 92vw, (max-width: 767px) 692px, 32vw" alt=""></div>
                            <div class="blog-thumb-text-wrapper">
                                <p class="paragraph-3">Transformação digital: você está pronto para essa mudança exponencial?</p><img src="images/arrowlink.svg" alt="" class="image"></div>
                        </div>
                    </div>
                </div>
                <div class="blog-column w-col w-col-4 w-col-medium-4">
                    <div class="blog-thumb-block">
                        <div class="blog-thumb-content">
                            <div class="blog-thumb-image-wrapper"><img src="<?php echo get_template_directory_uri().'/';?>images/imagee.png" 
                            srcset="<?php echo get_template_directory_uri().'/';?>images/imagee-p-500.png 500w, <?php echo get_template_directory_uri().'/';?>images/imagee.png 692w" sizes="(max-width: 479px) 100vw, (max-width: 752px) 92vw, (max-width: 767px) 692px, 32vw" alt=""></div>
                            <div class="blog-thumb-text-wrapper">
                                <p class="paragraph-3">Transformação digital: você está pronto para essa mudança exponencial?</p><img src="images/arrowlink.svg" alt="" class="image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-section">
        <div class="mycontainer">
            <div class="div-block-7">
                <p><span class="text-gradient">Ainda não encontrou o que procura?</span> Veja nosso conteúdo informativo ou entre em contato!</p>
            </div>
            <div class="div-block-5">
                <div class="div-block-6"><a href="#" class="btn-black-home-outline w-button">FALAR COM ESPECIALISTA</a></div>
                <div class="div-block-6"><a href="#" class="btn-play-outline w-button">CONHEÇA EM 1 MINUTO</a></div>
                <div class="div-block-6"><a href="#" class="btn-cx-outline w-button">CALCULAR CX</a></div>
            </div>
            <div class="div-block-8">
                <div class="footer-mobile">
                    <div class="div-block-10"><img src="<?php echo get_template_directory_uri().'/';?>images/Logo.png" width="116" alt=""></div>
                    <div class="div-block-10">
                        <p>R. George Ohm 230, Torre A
                            <br> 16º andar - São Paulo, SP
                            <br>CEP 04576-020
                            <br>‍
                            <br>(11) 4765-5200
                            <br> contato@direct.one
                        </p>
                    </div>
                    <div class="div-block-11">
                        <p>A plataforma em nuvem da Direct.One funciona como um orquestrador de comunicações multicanal, formatação e processamento de documentos - CCM, que utiliza Inteligência Artificial para personalização das comunicações com clientes.</p>
                    </div>
                </div>
                <div class="footer-row white-footer-row w-row">
                    <div class="white-footer-column w-col w-col-4"><img src="<?php echo get_template_directory_uri().'/';?>images/logofull.png" width="163" alt="">
                        <div class="div-block-9">
                            <p>R. George Ohm 230, Torre A 16º andar - São Paulo, SP
                                <br> CEP 04576-020
                                <br>
                                <br>(11) 4765-5200
                                <br> contato@direct.one
                            </p>
                        </div>
                    </div>
                    <div class="white-footer-column w-col w-col-3">
                        <div class="dark-footer-title">SOLUÇÕES</div><a href="#" class="light-footer-link">Journeys</a><a href="#" class="light-footer-link">Multichannel</a><a href="#" class="light-footer-link">Insights</a><a href="#" class="light-footer-link">Connect</a><a href="#" class="light-footer-link">Trusty</a><a href="#" class="light-footer-link">Documents</a></div>
                    <div class="white-footer-column w-col w-col-3">
                        <div class="dark-footer-title">SOLUÇÕES</div>
                        <div class="dark-footer-subtitle">SEGMENTOS</div><a href="#" class="light-footer-link">Seguro</a><a href="#" class="light-footer-link">Varejo</a><a href="#" class="light-footer-link">Cartão</a><a href="#" class="light-footer-link">Saude</a><a href="#" class="light-footer-link">Outros</a>
                        <div class="dark-footer-subtitle">DEPARTAMENTOS</div><a href="#" class="light-footer-link">Atendimento</a><a href="#" class="light-footer-link">Operações</a><a href="#" class="light-footer-link">Marketing</a><a href="#" class="light-footer-link">Gestão</a><a href="#" class="light-footer-link">Tecnologia</a>
                        <div class="dark-footer-subtitle">OBJETIVOS</div><a href="#" class="light-footer-link">Satisfação do Cliente</a><a href="#" class="light-footer-link">Redução de Custos</a><a href="#" class="light-footer-link">Retenção de Clientes</a></div>
                    <div class="white-footer-column w-col w-col-2">
                        <div class="dark-footer-title">PlANOS</div><a href="#" class="light-footer-link">Como nos contratar</a>
                        <div class="dark-footer-title">SOBRE</div><a href="#" class="light-footer-link">Nossa Jornada</a><a href="#" class="light-footer-link">Trabalhe na D1</a><a href="#" class="light-footer-link">D1 na Midia</a><a href="#" class="light-footer-link">Segurança e Politica de Dados</a><a href="#" class="light-footer-link">Contato</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/webflow.js" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>