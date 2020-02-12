<?php
require_once 'data_loader.php';
$data_loader        = new Data_Loader();
$id_modulos         = get_query_var('id');
$slug               = get_query_var('slug');
$dados              = $data_loader->get('departamentos',$id_modulos);
$dados              = $dados['data_departamentos'];
$language_option = !empty($_SESSION['d1_language_option']) ? $_SESSION['d1_language_option'] : "PT";
?>
<head>
<?php 
    $langs = array( 
        'PT' => array('solucoes' => 'Soluções Para ' ), 
        'EN' => array('solucoes' => 'Solutions for '),
        'ES' => array('solucoes' => 'Soluciones para ')
    ); 
?>
    <title><?php echo $langs[$language_option]['solucoes'] . mb_convert_case($dados['main_title'], MB_CASE_TITLE, "UTF-8");?> - D1</title>
</head>
<?php
get_header();
?>
<style>.d-flex{display:flex;align-items:center}.custom-select-departamentos{position:relative}.custom-select-departamentos select{display:none}.select-selected{margin-top:20px;font-size:38px;margin-left:10px;background-color:transparent;border-bottom:4px solid #000;padding-bottom:17px;padding-right:40px}@media (max-width:767px){.select-selected{margin-top:5px;font-size:22px}}.select-selected:after{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgd2lkdGg9IjI4NC45MjlweCIgaGVpZ2h0PSIyODQuOTI5cHgiIHZpZXdCb3g9IjAgMCAyODQuOTI5IDI4NC45MjkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI4NC45MjkgMjg0LjkyOTsiDQoJIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZD0iTTI4Mi4wODIsNzYuNTExbC0xNC4yNzQtMTQuMjczYy0xLjkwMi0xLjkwNi00LjA5My0yLjg1Ni02LjU3LTIuODU2Yy0yLjQ3MSwwLTQuNjYxLDAuOTUtNi41NjMsMi44NTZMMTQyLjQ2NiwxNzQuNDQxDQoJCUwzMC4yNjIsNjIuMjQxYy0xLjkwMy0xLjkwNi00LjA5My0yLjg1Ni02LjU2Ny0yLjg1NmMtMi40NzUsMC00LjY2NSwwLjk1LTYuNTY3LDIuODU2TDIuODU2LDc2LjUxNUMwLjk1LDc4LjQxNywwLDgwLjYwNywwLDgzLjA4Mg0KCQljMCwyLjQ3MywwLjk1Myw0LjY2MywyLjg1Niw2LjU2NWwxMzMuMDQzLDEzMy4wNDZjMS45MDIsMS45MDMsNC4wOTMsMi44NTQsNi41NjcsMi44NTRzNC42NjEtMC45NTEsNi41NjItMi44NTRMMjgyLjA4Miw4OS42NDcNCgkJYzEuOTAyLTEuOTAzLDIuODQ3LTQuMDkzLDIuODQ3LTYuNTY1QzI4NC45MjksODAuNjA3LDI4My45ODQsNzguNDE3LDI4Mi4wODIsNzYuNTExeiIvPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=);background-size:16px;position:absolute;content:"";width:16px;height:16px;top:28px;right:0}@media (max-width:767px){.select-selected:after{top:10px}}.select-items div,.select-selected{color:#fff;cursor:pointer}.select-items{position:absolute;background-color:#0a8cff;top:calc(100% + 20px);left:10px;right:0;z-index:99;font-size:32px;text-align:left}@media (max-width:767px){.select-items{font-size:16px}}.select-items div{padding:28px 20px}.select-hide{display:none}.select-items div:hover,.same-as-selected{background-color:rgba(0,0,0,.1);transition:background-color 240ms ease-in-out}</style>
<body>
<style type = "text/css" > .departamentos-hero{
    background-image: url("<?php echo get_template_directory_uri();?>/images/Group-16.39.svg"),
    url("<?php echo $dados['url_img'];?>");
}
@media only screen and (max-width: 767px) {
    .departamentos-hero{
        background-image: url("<?php echo $dados['url_img'];?>") !important;
    }
}

</style>
<!-- SEÇÃO HERO -->
<div id="hero" class="departamentos-hero" id="departamentos_hero">
        <div class="mycontainer _16pad">
            <div class="dep-hero-wrapper">
                <div class="dep-hero-left">
                    <h6 class="lightblue type-gradient" data-ix="fade-in-on-load"><?php echo $dados['title'];?></h6>
                    <h1 class="h1white left noleft larger notop" data-ix="fade-in-on-load-2"><?php echo $dados['main_title'];?></h1>
                    <div class="h1white hero left" data-ix="fade-in-on-load-2"><?php echo $dados['description'];?></div>
                </div>
            </div>
        </div>
        <div class="arrowdown"><img src="<?php echo get_template_directory_uri().'/';?>images/arrowdownwhite.svg" width="12" alt=""></div>
    </div>

<!-- SEÇÃO DESAFIOS -->
<div id="desafios" class="departament-wrapper-grandient gradient-bg moremargin" data-ix="fade-in-on-scroll">
    <div class="mycontainer">
        <div class="servico-cards-wrapper top">
            <div class="section-title-2col">
                <h6 class="h1white"><?php echo $dados['challenge_title'];?></h6>
            </div>
            <div class="case-thumb-content-wrapper">
                <?php for($i=1;$i<=3;$i++):
                    $key_title      = "title";
                    if(!empty($dados["challenge$i"][$key_title])):
                ?>
                <div class="servicos-thumb-content">
                    <h3><?php echo $dados["challenge$i"]['title'];?></h3>
                    <p><?php echo $dados["challenge$i"]['description'];?></p>
                </div>
                <?php endif; endfor;?>
            </div>
        </div>
        
        <div class="departamento-select-wrapper">
            <div class="segmento-clientes-title">
                <div class="d-flex">
                <h1 class="h1white small-h1">Eu sou</h1>
                <div class="custom-select-departamentos">
                    <select name="cargo_nav" id="cargo_nav">
                    <?php foreach($dados['cargos'] as $k=>$cargo): 
                        $selected_option = ($k == 0) ? 'selected' : ''    ;
                    ?>
                    <option value="<?php echo $cargo['id'];?>" <?php echo $selected_option;?>><?php echo $cargo['title'];?></option> 
                    <?php endforeach; ?>
                    </select>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- BENEFICIOS DA PLATAFORMA VIA CARGO - ITENS -->
<?php foreach($dados['cargos'] as $k=>$cargo): 
    $display_option = ($k == 0) ? 'display:block;' : 'display:none;';
?>
<div class="section-stripe blackbg cargo_content_target" name="cargo_content" id="<?php echo $cargo['id'];?>" style="<?php echo $display_option ;?>">
    <div class="div-block-89">
        <h6 class="heading-23 type-gradient"><?php echo $cargo['subtitle'];?></h6>
    </div>
    <div class="mycontainer">
        <div class="case-thumb-content-wrapper">
                <?php for($i=1;$i<=3;$i++):
                    if(!empty($cargo["description$i"])):
                ?>
                <div class="departamento-blackbox-wrapper">
                    <p class="h1white"><?php echo insert_degrade($cargo["description$i"],$i+10);?></p>
                </div>
            <?php endif; endfor;?>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- SEÇÃO KEY POINTS -->
<?php
    $cont = 1;
    foreach($dados['features'] as $key=>$kp):
        if(($cont%2 != 0) ):
?>
<div id="beneficios" class="section-wrapper bottom-line" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="section-2col-wrapper narrow2 bottommargin">
                <div class="section-col-left">
                    <h1 class="heading-35"><?php echo $kp['title'];?></h1>
                    <div class="text-block-13 left"><?php echo $kp['description'];?></div>
                </div>
                <div class="section-col-left center mobi right">
                    <img src="<?php echo $kp['url_img'];?>" width="1004"  alt="" class="image-4">
                </div>
            </div>
        </div>
    </div>
<?php else:?>
    <div id="key-point" class="section-wrapper bottom-line lesstop" data-ix="fade-in-on-scroll">
        <div class="mycontainer">
            <div class="section-2col-invert-wrapper narrow">
                <div class="section-col-left center mobi left">
                    <img src="<?php echo $kp['url_img'];?>" width="1004"  alt="" class="image-4"></div>
                <div class="section-col-left">
                    <h1 class="heading-35"><?php echo $kp['title'];?></h1>
                    <div class="text-block-12"><?php echo $kp['description'];?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<?php $cont++; endforeach; ?>

<!-- SEÇÃO FEATURES PRINCIPAIS -->
<div id="features-principais" class="section-featured lesstop" data-ix="fade-in-on-scroll">
    <div class="mycontainer">
        <div class="div-block-100 nopad">
            <div class="section-col-left wide left">
                <h1 class="lieghtblue type-gradient"><?php echo $dados['modulos_options']['modulos_title'];?></h1>
                <div class="text-block-12"><?php echo $dados['modulos_options']['modulos_descricao'];?></div>
            </div>
            <a href="<?php echo get_home_url() ."/plataforma";?>" class="link-block-2 w-inline-block">
                <div class="ver-plat">
                    <div class="text-block-31"><?php echo $dados['chamada_plataforma'];?></div><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt=""></div>
            </a>
        </div>

        <div class="div-block-99 left narrow">
        <?php
            foreach($dados['modulos'] as $key=>$mod):
        ?>
            <div class="card-feature _8pad _16pad" name="card_feature" url="<?php echo get_home_url();?>/modulos/<?php echo sanitize_title($mod['title']);?>/<?php echo $mod['id_segmento'];?>">
                <img src="<?php echo $mod['url_img'];?>" alt="" class="margin">
                <h1 class="small-head"><?php echo $mod['title'];?></h1>
                <div class="text-block-12"><?php echo $mod['description'];?></div>
                    <img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="image-21 moremargin">
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- SEÇÃO CASES DE SUCESSO -->
<div id="cases" class="section-wrapper-large greybg">
    <div class="mycontainer">
        <div class="tabs-section-title-2col narrow">
            <h6 class="pad20"><?php echo $dados['cases_options']['cases_title'];?></h6>
            <div class="link-text-arrow noinvert"><a href="<?php echo get_home_url();?>/cases/" class="link-text-black">VER CASES</a><img src="<?php echo get_template_directory_uri();?>/images/arrowlink-black.svg" alt="" class="arrowlink"></div>
        </div>
        <div class="case-thumb-content-wrapper large" data-ix="fade-in-on-scroll">
        <?php foreach($dados['cases'] as $key=>$card): 
            $is_whitepaper  = (!empty($card['is_whitepaper']) && $card['is_whitepaper']) ? $card['is_whitepaper'] : false;
            $link           = ($is_whitepaper) ? $card['card_link'] : get_home_url() ."/case/" . sanitize_title($card['title_card']) . "/" . $card['id_card'];
            $target         = ($is_whitepaper) ? "_blank" : "_self";
            $card['categoria']['descricao'] = ($is_whitepaper) ? $card['subtitle_card'] : $card['categoria']['descricao'];    
        ?>
            <div class="case-thumb-content _200ms left" style="background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url('<?php echo $card['img_bg_url'];?>');background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $card['img_bg_url'];?>');">
            <a href="<?php echo $link;?>" target="<?php echo $target;?>" style='text-decoration:none;'>
                <h3 class="h1white left"><?php echo $card['title_card'];?></h3>
                <h6 class="lightblue type-gradient"><?php echo $card['categoria']['descricao'];?></h6>
                <div class="case-thumb-numbers">
                    <h5 class="heading-2 pad20 white huge left"><?php echo $card['text_footer_card'];?></h5>
                    <div class="h1white left tiny"><?php echo $card['subtext_footer_card'];?></div>
                </div>
                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image-20">
            </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer();?>
</body>

<script>
    var x, i, j, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select": */
    x = document.getElementsByClassName("custom-select-departamentos");
    for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 0; j < selElmnt.length; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;

                //escondendo conteudo de acordo com opção selecionada
                var cargo_nav_id = s.options[i].value;
                if(cargo_nav_id != undefined || cargo_nav_id !=""){
                    const elements = document.querySelectorAll('.cargo_content_target');
                        elements.forEach( el => {
                        el.style.display = 'none';
                    });
                    document.getElementById(cargo_nav_id).style.display = 'block';
                }

                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                for (k = 0; k < y.length; k++) {
                y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                break;
            }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
    }

    function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
        arrNo.push(i)
        } else {
        y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
        }
    }
    }

    /* If the user clicks anywhere outside the select box,
    then close all select boxes: */
    document.addEventListener("click", closeAllSelect);
</script>

<script>
jQuery(document).ready(function($) {
    $('[name*=card_feature]').click(function(){
        var url_redirect = $(this).attr('url');
        window.location.href = url_redirect;
    });
    /* feito no javascript puro acima
    $('#cargo_nav').change(function(){
        var cargo_nav_id = $(this).val();
        if(cargo_nav_id != undefined || cargo_nav_id !=""){
            $(".cargo_content_target").each(function(){
                $(this).hide();
            });
            $('#'+cargo_nav_id).show();
        }
    }); 
    */
});
</script>