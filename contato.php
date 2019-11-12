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
$data_contato = $GLOBALS["data"]["d1_plugin_contato"];
//pre($data_contato);die;
get_header();
?>
<body>

<div id="contatos" class="contato-hero">
    <div class="mycontainer">
    <h1 class="h1white center mobi center" data-ix="fade-in-on-load"><?php echo $data_contato['contato_secao1_title'];?><span> <br>‍</span>
    <span class="text-span-19"><?php echo $data_contato['contato_secao1_main_title'];?></span><span class="text-span-20">!</span></h1>
        <div class="contato-cards-wrapper" data-ix="fade-in-on-load-2">
            <div class="case-thumb-content-wrapper">

            <?php for($i=1;$i<=3;$i++):
                    $key_btn_title = "contato_secao1_item". $i ."_button_title";
                    $key_descricao = "contato_secao1_item". $i ."_desc";
                    $key_link = "contato_secao1_item". $i ."_link";
                    $key_img = "contato_secao1_img_icon$i";
            ?>
                <div class="contato-thumb-content center phone _8marg">
                    <div class="div-block-95">
                        <div class="div-block-80"><img src="<?php echo $data_contato[$key_img];?>" height="50" width="50" alt="" class="image-7">
                            <p class="paragraph-4 left nopad"><?php echo $data_contato[$key_descricao];?></p>
                        </div>
                    </div><a href="<?php echo $data_contato[$key_link];?>" class="btn-black-home-copy lightblue type-gradient w-button"><?php echo $data_contato[$key_btn_title];?></a></div>
            <?php endfor;?>

            </div>
        </div>
        <div class="div-block-74" data-ix="fade-in-on-load-2">
            <div class="div-block-94"></div>
            <div class="body-text-2"></div><a href="#" class="body-text-link-inline"><?php echo insert_degrade($data_contato['contato_secao1_desc_rodape'],7);?></a></div>
    </div>
    <div class="arrowdown"><img src="<?php echo get_template_directory_uri();?>/images/arrowdownblack.svg" width="12" alt=""></div>
    </div>


<div id="form" class="section-wrapper-large black">
    <div class="mycontainer large">

            <div class="form-contact w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form-2">
                    <div class="div-block-78">
                        <div class="_616block">
                            <div class="div-block-79">
                                <label for="name" class="field-contato">Qual o seu nome?</label>
                                <input type="text" class="text-field-2 w-input" maxlength="256" name="name" data-name="Name" placeholder="Nome" id="name">
                            </div>
                            <div class="div-block-79">
                                <label for="name-2" class="field-contato">Aonde você trabalha?</label>
                                <input type="text" class="text-field-2 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="Empresa" id="name-2">
                            </div>
                        </div>
                    </div>
                    <div class="text-block-10 lightblue type-gradient">Como quer ser contatado?</div>
                    <div class="div-block-78 bottomline">
                        <div class="_616block">
                            <div class="div-block-79">
                                <label class="w-checkbox checkbox-field">
                                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                                    <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1"><span class="field-contato w-form-label">Quero receber uma ligação</span></label>
                                <input type="text" class="text-field-2 w-input" maxlength="256" name="name-3" data-name="Name 3" placeholder="Telefone" id="name-3">
                            </div>
                            <div class="div-block-79">
                                <label class="w-checkbox checkbox-field-2">
                                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox-2"></div>
                                    <input type="checkbox" id="checkbox-2" name="checkbox-2" data-name="Checkbox 2" style="opacity:0;position:absolute;z-index:-1"><span class="field-contato w-form-label">Quero receber um e-mail</span></label>
                                <input type="text" class="text-field-2 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="E-mail" id="name-2">
                            </div>
                        </div>
                    </div>
                    <select id="Como-a-D1-pode-te-ajudar-no-seu-neg-cio" name="Como-a-D1-pode-te-ajudar-no-seu-neg-cio" data-name="Como a D1 pode te ajudar no seu negócio?" class="select-field-2 blueboarder w-select">
                        <option value="">Como a D1 pode ajudar no seu negócio?</option>
                        <option value="First">First Choice</option>
                        <option value="Second">Second Choice</option>
                        <option value="Third">Third Choice</option>
                    </select>
                    <textarea placeholder="Descreva aqui um pouco o seu objetivo ao nos contactar" maxlength="5000" id="field" name="field" class="text-field-2-copy w-input"></textarea>
                    <div class="div-block-78">
                        <div class="_616block">
                            <div class="div-block-79-copy">
                                <div class="text-block-10 white">Entre em contato também em</div>
                                <div class="text-block-9-copy lightblue type-gradient">(11)47650-5200 ou contato@direct.one</div>
                            </div>
                            <div class="div-block-79 flex">
                                <input type="submit" value="Enviar" data-wait="Please wait..." class="btn-black-form-copy w-button">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
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
            $query = "SELECT * FROM " . $wpdb->prefix . "d1_faq where page = 'contato'";
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

<?php get_footer();?>
</body>