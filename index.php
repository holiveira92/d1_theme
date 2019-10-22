<?php
function dirname_oldphp($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}

function insert_degrade($str){
    $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
    $str = str_replace("[/degrade]","</span>",$str);
    return $str;
}

require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
$d1_view_parser = new D1_View_Parser();
//Obter todas as opções da página
$data =  $GLOBALS["data"] = $d1_view_parser->get_data();
get_header();

?>
<head>
    <meta charset="utf-8">
    <title><?php echo $data['d1_plugin']['d1_web_title'];?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo get_template_directory_uri().'/';?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>css/d1web.webflow.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri().'/';?>icons/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri().'/';?>icons/webclip.png" rel="apple-touch-icon">
    <script src="<?php echo get_template_directory_uri().'/';?>js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/webflow.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri().'/';?>js/home.js" type="text/javascript"></script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart" in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document)</script>
</head>

<body>
    <div class="home-hero">
        <div class="mycontainer">
            <div class="hero-wrapper">
                <div class="hero-mockup-description-block">
                    <h1 class="white-hero-title">Engaje clientes com <span class="text-gradient">jornadas multicanais</span></h1>
                    <p class="p-white"><span class="text-gradient">Plataforma de engajamento </span>que ajuda grandes empresas a automatizar suas comunicações com clientes em canais como Email, SMS, WhatsApp, Voz, Push, entre outros.</p>
                    <p class="secondary-text p-white">Entenda como seu negócio pode <span class="text-gradient">melhorar a experiência do consumidor!</span></p>
                    <div class="div-block"><a href="#" class="button w-button">CONHEÇA EM 1 MINUTO</a></div>
                </div>
                <div class="hero-home-cliente-name-wrapper">
                    <h3 class="heading-8">Miguel Dorneles</h3>
                    <h6 class="heading-9 text-gradient">DIRETOR EXECUTIVO</h6>
                    <p class="paragraph-4">Drives hyper-growth in 77 countries widh D1</p><img src="images/YOUSE-logo.png" alt="" class="image-3"></div>
            </div>
        </div>
    </div>
    <div class="section-gradient-home">
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
                <div class="image-clientes-block"><img src="images/logos_clientes6qualicorp.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes8sulamerica.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes4hdi.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes3caixa.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes_23viavarejo.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes2pan.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes_14zurich.png" alt=""></div>
                <div class="image-clientes-block"><img src="images/logos_clientes_12youse.png" alt=""></div>
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
                <div class="home-title-case2"><a href="#" class="body-text-link3">VER CASES</a><img src="images/arrowlink-black.svg" alt="" class="arrowlink"></div>
            </div>
            <div class="div-block-15">
                <div data-duration-in="300" data-duration-out="100" class="tabs-2 w-tabs">
                    <div class="tabs-menu w-tab-menu">
                        <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
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
                        <a data-w-tab="Tab 6" class="tab-link-tab-1 w-inline-block w-tab-link">
                            <div>DOCUMENTS</div>
                        </a>
                    </div>
                    <div class="tabs-content w-tab-content">
                        <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane w--tab-active">
                            <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                                <div class="tabs-menu-2 w-tab-menu">
                                    <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
                                        <div>Build</div>
                                    </a>
                                    <a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Execute</div>
                                    </a>
                                    <a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link">
                                        <div>Analyze</div>
                                    </a>
                                </div>
                                <div class="w-tab-content">
                                    <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 65vw, (max-width: 991px) 61vw, 60vw" alt=""></div>
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
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
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
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
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
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
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
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 6" class="w-tab-pane">
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
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 2" class="w-tab-pane">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Execute Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
                                        </div>
                                    </div>
                                    <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                        <div class="div-block-13">
                                            <div class="div-block-12"></div>
                                            <div class="div-block-14">
                                                <p>Analyze Crie jornadas personalizadas e
                                                    <br>aumente o sucesso da entrega
                                                    <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                            <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 67vw, (max-width: 991px) 62vw, 60vw" alt=""></div>
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
    <div class="home-black-section ui-section-2 ui-section3">
        <div class="home-blue-container">
            <div class="info-block-left ui-2">
                <div class="section-title-wrapper-2 full info">
                    <h2 class="black-hero-title">O que faz a D1 ser tão diferente?</h2>
                </div>
                <p>1. <span>Uma plataforma completa de gestão da experiência dos seus clientes.</span>
                    <br>‍
                    <br>2. <span>Integração rápida com todos os softwares. Somos API Ready.</span>
                    <br>
                    <br>3. <span>Estrutura escalável e pronta para operações de alta escala.</span></p>
                <div class="home-balck-button-wrapper"><a href="#" class="btn-black-home-play w-button">ASSISTA AO WEBINAR</a></div>
            </div>
            <div class="home-laptop-wrapper"><img src="images/laptop_mockup.png" width="673" srcset="images/laptop_mockup-p-500.png 500w, images/laptop_mockup-p-800.png 800w, images/laptop_mockup-p-1080.png 1080w, images/laptop_mockup.png 1346w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 86vw, (max-width: 991px) 85vw, 56vw" alt=""></div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>

</html>