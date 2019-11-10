<?php
    require(trim(ABSPATH) . "wp-load.php");
    global $wpdb;
    $data = $GLOBALS["data"]['d1_plugin_footer'];
    $id_cta = $data['secao1_footer_cta'];
    $id_cta = !empty($id_cta) ? $id_cta : 0;
    $cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_cta")),true);
    $cta = !empty($cta[0]) ? $cta[0] : array();
    $id_footer_cta1 = $data['secao3_footer_cta1'];
    $id_footer_cta2 = $data['secao3_footer_cta2'];
    $id_footer_cta3 = $data['secao3_footer_cta3'];
    $footer_cta1 = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_footer_cta1")),true);
    $footer_cta1 = !empty($footer_cta1[0]) ? $footer_cta1[0] : array();
    $footer_cta2 = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_footer_cta2")),true);
    $footer_cta2 = !empty($footer_cta2[0]) ? $footer_cta2[0] : array();
    $footer_cta3 = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_call_to_action WHERE id=$id_footer_cta3")),true);
    $footer_cta3 = !empty($footer_cta3[0]) ? $footer_cta3[0] : array();
    $group_links = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_footer_links WHERE group_id IS NULL or group_id = '' ")),true);
?>
<div class="bigfooter">
        <!-- Pré Footer -->
        <div id="contratar" class="section-3">
            <div class="mycontainer-2">
                <div class="section-title-wrapper bottommargin">
                <div class="body-text-2 center left"><?php echo $data['secao1_title'];?></div>
            </div>
            <div class="cases-row w-row">
                <?php 
                for($i=1;$i<=4;$i++):
                    $key_title = "secao1_passo" . $i . "_title";
                    $key_desc = "secao1_passo" . $i . "_descricao";
                ?>
                <div class="steps-column w-col w-col-3">
                    <div class="steps-thumb-block">
                        <div class="steps-thumb-content">
                            <div class="gradient-stripe"></div>
                            <h3 class="heading-19"><?php echo $data[$key_title];?></h3>
                            <div class="steps-thumb-content-bloc">
                                <p><?php echo $data[$key_desc];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="cta-footer _1100">
            <div class="div-block-3">
                <div class="darkgrey"><?php echo insert_degrade($data['secao1_desc_pre_cta']);?></div>
            </div>
            <div class="div-block-4">
                <a href="<?php echo $cta['link'];?>" class="btn-black-home lightblue type-gradient w-button"><?php echo $cta['title'];?></a>
            </div>
        </div>

        <!-- Blog -->
        <div id="blog" class="section-home-blog">
            <div class="mycontainer-2 blog">
                <div class="div-block-106">
                <div class="body-text-2"><?php echo $data['secao2_title'];?></div>
                <br><br>
            </div>
                <p class="pgrey"><?php echo $data['secao2_descricao'];?></p>
                <div class="blog-row w-row">
                    <?php 
                    for($i=1;$i<=3;$i++):
                        $key_desc   = "secao2_card" . $i . "_descricao";
                        $key_link   = "secao2_card" . $i . "_artigo_link";
                        $key_img    = "secao2_card" . $i . "_img_bg";
                    ?>
                    <div class="blog-column w-col w-col-4 w-col-medium-4">
                        <a href="<?php echo $data[$key_link];?>" target='_blank' style='text-decoration:none;'>
                        <div class="blog-thumb-block">
                        <div class="blog-thumb-content" style='height:auto;'>
                            <div class="blog-thumb-image-wrapper"><img src="<?php echo $data[$key_img];?>">
                            <div class="blog-thumb-text-wrapper">
                                <p class="paragraph-3 left"><?php echo $data[$key_desc];?></p>
                                <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" class="image"></div>
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
                    <div> <?php echo $data['secao3_title'];?></div>
                </div>
                <div class="div-block-5">
                    <div class="div-block-6"><a href="<?php echo $footer_cta1['link'];?>" target="<?php echo $footer_cta1['tagret'];?>" class="btn-black-home-outline-footer w-button"><?php echo $footer_cta1['title'];?></a></div>
                    <div class="div-block-6"><a href="<?php echo $footer_cta2['link'];?>" target="<?php echo $footer_cta2['tagret'];?>" class="btn-play-outline w-button"><?php echo $footer_cta2['title'];?></a></div>
                    <div class="div-block-6"><a href="<?php echo $footer_cta3['link'];?>" target="<?php echo $footer_cta3['tagret'];?>" class="btn-cx-outline w-button"><?php echo $footer_cta3['title'];?></a></div>
                </div>

                <div class="div-block-8">
                    <!-- Info D1 -->
                    <div class="footer-mobile">
                        <div class="div-block-10"><img src="<?php echo $data['secao3_info_d1_logo'];?>" width="116" alt=""></div>
                        <div class="div-block-10">
                            <p class="p-white">
                            <?php echo str_replace("\n", '<br />',$data['secao3_info_d1']); ?>
                            </p>
                        </div>
                        <div class="div-block-11">
                            <p class="p-white footer"><?php echo str_replace("\n", '<br />',$data['secao3_info_d1']); ?></p>
                        </div>
                    </div>

                    <div class="footer-row white-footer-row w-row">
                        <!-- Info D1 -->
                        <div class="white-footer-column w-col w-col-4"><img src="<?php echo $data['secao3_info_d1_logo'];?>" width="163" alt="">
                            <div class="div-block-9">
                                <p class="p-white">
                                <?php echo str_replace("\n", '<br />',$data['secao3_info_d1']); ?>
                                </p>
                            </div>
                        </div>

                        <?php 
                        foreach($group_links as $key=>$grupo):
                            $id_grupo = $grupo['id'];
                            $itens = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_footer_links WHERE group_id=$id_grupo")),true);
                            $i = (in_array($key,array(2,5,8,11,14,17,20,23,26,29,32)) !== false ) ? 2 : 3;
                        ?>
                        <!-- Grupos de Links -->
                        <div class="white-footer-column w-col w-col-<?php echo $i;?> ">
                            <div class="dark-footer-title "><?php echo $grupo['name'];?></div>
                            <!-- Links -->
                            <?php 
                            foreach($itens as $k=>$link):
                            ?>
                                <a href="<?php echo $link['link'];?>" class="light-footer-link"> <?php echo $link['name'];?> </a>
                            <?php endforeach; ?>
                            <br>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="div-block-72">
                        <!-- Regulamentação, Parceiros e Premios -->
                        <div>
                            <div>
                                <div class="dark-footer-subtitle grey center lightgrey">REGULAMENTAÇÃO</div>
                            </div>
                            <div>
                                <img src="<?php echo $data['secao5_regulamentacao1_img'];?>" width="138" alt="" class="image-footer">
                                <img src="<?php echo $data['secao5_regulamentacao2_img'];?>" width="138" alt="" class="image-footer">
                                <img src="<?php echo $data['secao5_regulamentacao3_img'];?>" width="138" alt="" class="image-footer">
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle grey center lightgrey">PARCEIROS</div>
                            </div>
                            <div><img src="<?php echo $data['secao5_parceiros1_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_parceiros2_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_parceiros3_img'];?>" width="138" alt="" class="image-footer"></div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle grey center lightgrey">PRÊMIOS</div>
                            </div>
                            <div><img src="<?php echo $data['secao5_premios1_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_premios2_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao5_premios3_img'];?>" width="138" alt="" class="image-footer"></div>
                        </div>
                    </div>
                </div>
                <div class="div-block-73">
                    <div class="body-text-small"><?php echo $data['secao6_pitch'];?>
                        <br>
                    </div>
                    <h6 class="h6-gradient-copy type-gradient">© 2019 D1</h6>
                </div>
            </div>
        </div>
    </div>
</div>