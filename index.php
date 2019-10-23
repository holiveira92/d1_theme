<?php
function dirname_oldphp($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}

function insert_degrade($str,$tipo=1){
    switch($tipo){
        case 1 :
            $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        default:
            $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
    }
    
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
            <div class="home-hero-wrapper">
                <div class="home-hero-left" data-ix="fade-in-on-load">
                    <h1 class="white pad20">Engaje clientes com jornadas multicanais</h1>
                    <div class="white pad20">Plataforma de engajamento que ajuda grandes empresas a automatizar suas comunicações com clientes em canais como Email, SMS, WhatsApp, Voz, Push, entre outros.</div><a href="#" class="btn-gradient w-button">CONHEÇA EM 1 MINUTO</a></div>
                <div class="home-hero-right">
                    <h3 class="white">Miguel Dorneles</h3>
                    <h6 class="lightblue">DIRETOR  EXECUTIVO</h6>
                    <div class="white pad20">This is some text inside of a div block.</div><img src="images/YOUSE-logo_1YOUSE-logo.png" alt="" class="home-hero-logo-partner"></div>
            </div>
        </div>
    </div>
    <div class="home-wrapper-gradient gradient-bg">
        <div>
            <div class="mycontainer">
                <div class="section-title-2col">
                    <h6 class="white pad20">IMPACTOS REAIS DE MELHORIA EM CUSTOMER EXPERIENCE</h6><a href="#" class="link-text-white">VER CASES</a></div>
            </div>
        </div>
    </div>
    <div class="mycontainer">
        <div class="home-wrapper-gradient-2">
            <div class="case-thumb-content-wrapper" data-ix="fade-in-on-scroll">
                <div class="case-thumb-content">
                    <h3 class="white">Escalando Mensagens<br>Transacionais na Black Friday</h3>
                    <h6 class="lightblue">EFICIÊNCIA OPERACIONAL</h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white">20mi</h5>
                        <div class="white">de eventos processados em horário de pico</div>
                    </div>
                </div>
                <div class="case-thumb-content">
                    <h3 class="white">Escalando Mensagens<br>Transacionais na Black Friday</h3>
                    <h6 class="lightblue">EFICIÊNCIA OPERACIONAL</h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 white">20mi</h5>
                        <div class="white">de eventos processados em horário de pico</div>
                    </div>
                </div>
                <div class="case-thumb-content">
                    <h3 class="white">Escalando Mensagens<br>Transacionais na Black Friday</h3>
                    <h6 class="lightblue">EFICIÊNCIA OPERACIONAL</h6>
                    <div class="case-thumb-numbers">
                        <h5 class="heading-2 pad20 white">20mi</h5>
                        <div class="white">de eventos processados em horário de pico</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper-large">
        <div class="mycontainer">
            <div class="section-title" data-ix="fade-in-on-scroll">
                <h6 class="darkgrey pad20">CLIENTES QUE ENCANTAM  CLIENTES</h6>
            </div>
            <div class="logo-clients-wrapper" data-ix="fade-in-on-scroll">
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
    </div>
    <div class="section-wrapper">
        <div class="mycontainer">
            <div class="section-title">
                <h6 class="darkgrey pad20">QUAL O SEU MAIOR DESAFIO?</h6>
            </div>
            <div class="case-thumb-content-wrapper" data-ix="fade-in-on-scroll-2">
                <div class="desafio-thumb-content">
                    <div class="case-thumb-title">
                        <h3 class="white">Satisfação do Cliente</h3>
                        <div>Somos especialistas em ajudar sua empresa a crescer seu score.</div>
                    </div>
                </div>
                <div class="desafio-thumb-content">
                    <div class="case-thumb-title">
                        <h3 class="white">Satisfação do Cliente</h3>
                        <div>Somos especialistas em ajudar sua empresa a crescer seu score.</div>
                    </div>
                </div>
                <div class="desafio-thumb-content">
                    <div class="case-thumb-title">
                        <h3 class="white">Satisfação do Cliente</h3>
                        <div>Somos especialistas em ajudar sua empresa a crescer seu score.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper-large black-bg-stripe">
        <div class="mycontainer">
            <div class="section-1col-wrapper" data-ix="fade-in-on-scroll-2">
                <h1 class="white pad20">Calcule a Maturidade de Customer Experience da sua empresa</h1>
                <div class="white pad20">Mapeie, através da nossa calculadora, o nível de maturidade de CX da sua empresa e comece a desenhar a estratégia para reduzir custos operacionais, fidelizar clientes, aumentando o ticket médio e o life-time value.</div><a href="#" class="btn-cx w-button">CALCULAR CX</a></div>
        </div>
    </div>
    <div class="tab-section-wrapper" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="tabs-section-title-2col">
                <h6 class="pad20">IMPACTOS REAIS DE MELHORIA EM CUSTOMER EXPERIENCE</h6>
                <div class="link-text-arrow"><a href="#" class="link-text-black">VER CASES</a><img src="https://uploads-ssl.webflow.com/5d5d3ab49052fea25a4b1c73/5d66ec667c0872c78441f287_arrowlink-black.svg" alt="" class="arrowlink"></div>
            </div>
            <div data-duration-in="300" data-duration-out="100" class="home-tabs w-tabs">
                <div class="tabs-menu w-tab-menu">
                    <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link w--current">
                        <div>JOURNEYS</div>
                    </a>
                    <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                        <div>CUSTOMER INSIGHTS</div>
                    </a>
                    <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link">
                        <div>MULTICHANNEL</div>
                    </a>
                    <a data-w-tab="Tab 5" class="home-tab-link w-inline-block w-tab-link">
                        <div>BLOCKCHAIN</div>
                    </a>
                    <a data-w-tab="Tab 6" class="home-tab-link w-inline-block w-tab-link">
                        <div>DOCUMENTS</div>
                    </a>
                </div>
                <div class="tabs-content w-tab-content">
                    <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane w--tab-active">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <div class="tabs-menu-2 w-tab-menu">
                                <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link w--current">
                                    <div>Build</div>
                                </a>
                                <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Execute</div>
                                </a>
                                <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Analyze</div>
                                </a>
                            </div>
                            <div class="w-tab-content">
                                <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 2" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Execute Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 3" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Analyze Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-tab="Tab 2" class="w-tab-pane">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <div class="tabs-menu-2 w-tab-menu">
                                <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Build</div>
                                </a>
                                <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Execute</div>
                                </a>
                                <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link w--current">
                                    <div>Analyze</div>
                                </a>
                            </div>
                            <div class="w-tab-content">
                                <div data-w-tab="Tab 1" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 2" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Execute Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Analyze Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-tab="Tab 3" class="w-tab-pane">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <div class="tabs-menu-2 w-tab-menu">
                                <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Build</div>
                                </a>
                                <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Execute</div>
                                </a>
                                <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link w--current">
                                    <div>Analyze</div>
                                </a>
                            </div>
                            <div class="w-tab-content">
                                <div data-w-tab="Tab 1" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 2" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Execute Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Analyze Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-tab="Tab 5" class="w-tab-pane">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <div class="tabs-menu-2 w-tab-menu">
                                <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Build</div>
                                </a>
                                <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Execute</div>
                                </a>
                                <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link w--current">
                                    <div>Analyze</div>
                                </a>
                            </div>
                            <div class="w-tab-content">
                                <div data-w-tab="Tab 1" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 2" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Execute Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Analyze Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-tab="Tab 6" class="w-tab-pane">
                        <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                            <div class="tabs-menu-2 w-tab-menu">
                                <a data-w-tab="Tab 1" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Build</div>
                                </a>
                                <a data-w-tab="Tab 2" class="home-tab-link w-inline-block w-tab-link">
                                    <div>Execute</div>
                                </a>
                                <a data-w-tab="Tab 3" class="home-tab-link w-inline-block w-tab-link w--current">
                                    <div>Analyze</div>
                                </a>
                            </div>
                            <div class="w-tab-content">
                                <div data-w-tab="Tab 1" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 2" class="w-tab-pane">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Execute Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                                    <div class="home-tab-content-wrapper">
                                        <div class="line-gradient"></div>
                                        <div class="div-block-14">
                                            <p>Analyze Crie jornadas personalizadas e
                                                <br>aumente o sucesso da entrega
                                                <br>da suas mensagens.</p><a href="#" class="text-link-blue">Leia mais sobre &quot;Build Journeys&quot;</a></div>
                                        <div><img src="images/tab-example.png" srcset="images/tab-example-p-500.png 500w, images/tab-example-p-800.png 800w, images/tab-example-p-1080.png 1080w, images/tab-example.png 1212w" sizes="(max-width: 991px) 100vw, 59vw" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper-large gradient-bg">
        <div class="mycontainer">
            <div class="section-2col-wrapper">
                <div class="section-col-left" data-ix="fade-in-on-scroll">
                    <h1 class="pad20">O que faz a D1 ser tão diferente?</h1>
                    <div class="pad20">1. Uma plataforma completa de gestão da experiência dos seus clientes.
                        <br>
                        <br>2. Integração rápida com todos os softwares. Somos API Ready.
                        <br>
                        <br>3. Estrutura escalável e pronta para operações de alta escala.</div><a href="#" class="btn-black-home-play w-button">ASSISTA AO WEBINAR</a></div>
                <div class="section-colright"><img src="images/laptop_mockup.png" width="673" srcset="images/laptop_mockup-p-500.png 500w, images/laptop_mockup-p-800.png 800w, images/laptop_mockup-p-1080.png 1080w, images/laptop_mockup.png 1346w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 89vw, (max-width: 991px) 673px, 50vw" alt=""></div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>

</html>