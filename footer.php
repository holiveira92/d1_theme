<?php
session_start(); 
$language_option = !empty($_SESSION['d1_language_option']) ? $_SESSION['d1_language_option'] : "PT";
$language = (!empty($language_option) && $language_option != "PT") ? $language_option ."_" : "";
require(trim(ABSPATH) . "wp-load.php");
require_once 'data_loader.php';
$data_loader        = new Data_Loader();
global $wpdb;
$img_default = get_template_directory_uri() . "/images/img_default.jpg";
$data = $GLOBALS["data"]['d1_plugin_footer'];
$id_cta = !empty($data['secao1_footer_cta']) ?  $data['secao1_footer_cta'] : 0;
$cta =  $data_loader->get_cta($id_cta);
$id_footer_cta1 = !empty($data['secao3_footer_cta1']) ? $data['secao3_footer_cta1'] : 0;
$id_footer_cta2 = !empty($data['secao3_footer_cta2']) ? $data['secao3_footer_cta2'] : 0;
$id_footer_cta3 = !empty($data['secao3_footer_cta3']) ? $data['secao3_footer_cta3'] : 0;
$footer_cta = arraY(
    'footer_cta1' => $data_loader->get_cta($id_footer_cta1),
    'footer_cta2' => $data_loader->get_cta($id_footer_cta2),
    'footer_cta3' => $data_loader->get_cta($id_footer_cta3),
);
$group_links = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_footer_links WHERE group_id IS NULL or group_id = '' ")), true);
?>
<div class="bigfooter">
    <!-- Pré Footer -->
    <div id="contratar" class="section-3">
        <div class="mycontainer-2">
            <div class="section-title-wrapper bottommargin">
                <div class="body-text-2 center left"><?php echo $data['secao1_title']; ?></div>
            </div>
            <div class="cases-row w-row">
                <?php
                for ($i = 1; $i <= 4; $i++) :
                    $key_title = "secao1_passo" . $i . "_title";
                    $key_desc = "secao1_passo" . $i . "_descricao";
                    ?>
                    <div class="steps-column w-col w-col-3">
                        <div class="steps-thumb-block">
                            <div class="steps-thumb-content">
                                <div class="gradient-stripe"></div>
                                <h3 class="heading-19"><?php echo $data[$key_title]; ?></h3>
                                <div class="steps-thumb-content-bloc">
                                    <p><?php echo $data[$key_desc]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <div class="cta-footer _1100">
        <div class="div-block-3">
            <div class="darkgrey type-gradient"><?php echo insert_degrade($data['secao1_desc_pre_cta'], 2); ?></div>
        </div>
        <div class="div-block-4">
            <!-- Botão CTA -->
            <a href="<?php echo $cta['link'];?>" data-url="<?php echo $cta['video_url'];?>" target="<?php echo $cta['target'];?>" 
            class="btn-black-home lightblue w-button <?php echo $cta['icon'];?>"><?php echo $cta['title'];?></a>
            <!-- Fim Botão CTA -->
        </div>
    </div>

    <!-- Blog -->
    <div id="blog" class="section-home-blog">
        <div class="mycontainer-2 blog">
            <div class="div-block-106">
                <div class="body-text-2"><?php echo $data['secao2_title']; ?></div>
                <br><br>
            </div>
            <p class="pgrey"><?php echo $data['secao2_descricao']; ?></p>
            <div class="blog-row w-row">
                <?php
                for ($i = 1; $i <= 3; $i++) :
                    $key_desc   = "secao2_card" . $i . "_descricao";
                    $key_link   = "secao2_card" . $i . "_artigo_link";
                    $key_img    = "secao2_card" . $i . "_img_bg";
                    ?>
                    <div class="blog-column w-col w-col-4 w-col-medium-4">
                        <a href="<?php echo $data[$key_link]; ?>" target='_blank' style='text-decoration:none;'>
                            <div class="blog-thumb-block">
                                <div class="blog-thumb-content" style='height:auto;'>
                                    <div class="blog-thumb-image-wrapper"><img src="<?php echo $data[$key_img]; ?>">
                                        <div class="blog-thumb-text-wrapper">
                                            <p class="paragraph-3 left"><?php echo $data[$key_desc]; ?></p>
                                            <img src="<?php echo get_template_directory_uri() . '/'; ?>images/arrowlink.svg" class="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-section">
        <!-- Pré CTA -->
        <div class="mycontainer-2">
            <div class="div-block-7">
                <div> <?php echo $data['secao3_title']; ?></div>
            </div>
            <div class="div-block-5">
                <?php 
                    for($i=1;$i<=3;$i++):
                        $f_cta = $footer_cta["footer_cta$i"];
                ?>
                    <div class="div-block-6">
                        <!-- Botão CTA -->
                        <a href="<?php echo $f_cta['link'];?>" data-url="<?php echo $f_cta['video_url'];?>" target="<?php echo $f_cta['target'];?>" 
                        class="btn-black-home-outline-footer w-button <?php echo $f_cta['icon'];?>"><?php echo $f_cta['title'];?></a>
                        <!-- Fim Botão CTA -->
                    </a></div>
                <?php endfor;?>
            </div>

            <div class="div-block-8">
                <!-- Info D1 -->
                <div class="footer-mobile">
                    <div class="div-block-10"><img src="<?php echo $data['secao3_info_d1_logo']; ?>" width="116" alt=""></div>
                    <div class="div-block-10">
                        <p class="p-white">
                            <?php echo str_replace("\n", '<br />', $data['secao3_info_d1']); ?>
                        </p>
                    </div>
                </div>

                <div class="footer-row white-footer-row w-row">
                    <!-- Info D1 -->
                    <div class="white-footer-column w-col w-col-4"><img src="<?php echo $data['secao3_info_d1_logo']; ?>" width="163" alt="">
                        <div class="div-block-9">
                            <p class="p-white">
                                <?php echo str_replace("\n", '<br />', $data['secao3_info_d1']); ?>
                            </p>
                        </div>
                    </div>
                    <div class="white-footer-column w-col w-col-8">
                        <?php
                        foreach ($group_links as $key => $grupo) :
                            $id_grupo = $grupo['id'];
                            $itens = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $language  . "d1_footer_links WHERE group_id=$id_grupo")), true);
                            $i = (in_array($key, array(2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32)) !== false) ? 2 : 3;
                            ?>
                            <!-- Grupos de Links -->
                            <div class="white-footer-column w-col w-col-<?php echo $i; ?> ">
                                <div class="dark-footer-title type-gradient"><span><?php echo $grupo['name']; ?></span></div>
                                <!-- Links -->
                                <?php
                                    foreach ($itens as $k => $link) :
                                        ?>
                                    <a href="<?php echo $link['link']; ?>" class="light-footer-link"> <?php echo $link['name']; ?> </a>
                                <?php endforeach; ?>
                                <br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="div-block-72 hide">
                    <!-- Regulamentação, Parceiros e Premios -->
                    <div>
                        <div>
                            <div class="dark-footer-subtitle grey center lightgrey">REGULAMENTAÇÃO</div>
                        </div>
                        <div>
                            <img src="<?php echo $data['secao5_regulamentacao1_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_regulamentacao2_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_regulamentacao3_img']; ?>" width="138" alt="" class="image-footer">
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="dark-footer-subtitle grey center lightgrey">PARCEIROS</div>
                        </div>
                        <div><img src="<?php echo $data['secao5_parceiros1_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_parceiros2_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_parceiros3_img']; ?>" width="138" alt="" class="image-footer"></div>
                    </div>
                    <div>
                        <div>
                            <div class="dark-footer-subtitle grey center lightgrey">PRÊMIOS</div>
                        </div>
                        <div><img src="<?php echo $data['secao5_premios1_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_premios2_img']; ?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_premios3_img']; ?>" width="138" alt="" class="image-footer"></div>
                    </div>
                </div>
            </div>
            <div class="div-block-73">
                <div class="body-text-small"><?php echo $data['secao6_pitch']; ?>
                    <br>
                </div>
                <?php 
                $langs = array( 
                    'PT' => array ('politica' => 'Política de Privacidade de Dados' ), 
                    'EN' => array('politica' => 'Data Privacy Policy'),
                    'ES' => array('politica' => 'Política de Privacidad de Datos')
                ); 
                ?>
                <div class="bottom-footer">
                    <a href="https://d1.cx/conteudo/uploads/2020/01/Politica-de-Privacidade-de-Dados-Site.pdf" target="_blank" class="politica">
                    <span><?php echo $langs[$language_option]['politica']; ?></span></a>
                    <h6 class="h6-gradient-copy type-gradient"><span>© <?php echo date("Y"); ?> D1</span></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(window).on('load', function() {
        // Criamos um elemento temporário para servir de checkbox
        var customEl = '<div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>';
        var labelCheckbox = $('.hs-form-booleancheckbox .hs-form-booleancheckbox-display .hs-input');

        $(customEl).insertAfter(labelCheckbox);

        // Criamos um wrapper, para colocar o botão do lado do texto no final do form.
        $('.form-contact .form-columns-0:nth-child(8), .hs_submit.hs-submit').wrapAll('<div class="form-footer"></div>')
    });
</script>
<script src="<?php echo get_template_directory_uri() . '/'; ?>js/webflow.js" type="text/javascript"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156247007-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156247007-1');
</script>