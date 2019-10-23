<?php 
    $data = $GLOBALS["data"]['d1_plugin_footer'];
?>
<div class="bigfooter">
        <!-- Pré Footer -->
        <div class="section-3">
            <div class="mycontainer-2">
                <div class="section-title-wrapper">
                    <div class="body-text-2"><?php echo $data['secao1_title'];?></div>
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
                                <h3><?php echo $data[$key_title];?></h3>
                                <div class="steps-thumb-content-bloc">
                                    <p><?php echo $data[$key_desc];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>

                </div>
                <div>
                    <div class="div-block-2"></div>
                    <div class="div-block-3">
                        <div class="darkgrey"><?php echo insert_degrade($data['secao1_desc_pre_cta']);?></div>
                    </div>
                    <div class="div-block-4"><a target="_blank" href="<?php echo $data['secao1_link_cta'];?>" class="btn-black-home w-button">FALAR COM ESPECIALISTA</a></div>
                </div>
            </div>
        </div>

        <!-- Blog -->
        <div class="section-home-blog">
            <div class="mycontainer-2">
                <div class="section-title-wrapper">
                    <div class="body-text-2 grey"><?php echo $data['secao2_title'];?></div>
                </div>
                <p class="pgrey"> <?php echo $data['secao2_descricao'];?> </p>
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
                                <div class="blog-thumb-content" style='height:auto !important;'>
                                    <div class="blog-thumb-image-wrapper"><img src="<?php echo $data[$key_img];?>" class="image-2"></div>
                                    <div class="blog-thumb-text-wrapper">
                                        <p class="paragraph-3"> <?php echo $data[$key_desc];?> </p>
                                        <img src="<?php echo get_template_directory_uri().'/';?>images/arrowlink.svg" alt="" class="image"></div>
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
                    <div class="div-block-6"><a href="<?php echo $data['secao3_url_cta1'];?>" target='_blank' class="btn-black-home-outline-footer w-button">FALAR COM ESPECIALISTA</a></div>
                    <div class="div-block-6"><a href="<?php echo $data['secao3_url_cta2'];?>" target='_blank' class="btn-play-outline w-button">CONHEÇA EM 1 MINUTO</a></div>
                    <div class="div-block-6"><a href="<?php echo $data['secao3_url_cta3'];?>" target='_blank' class="btn-cx-outline w-button">CALCULAR CX</a></div>
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
                            <p class="p-white"><?php echo str_replace("\n", '<br />',$data['secao3_info_d1']); ?></p>
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

                        <!-- Links -->
                        <div class="white-footer-column w-col w-col-3">
                            <!-- Grupo 1 -->
                            <div class="dark-footer-subtitle"> <?php echo $data['secao3_grupo1_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo1_item" . $i . "_nome";
                                $key_link   = "secao3_grupo1_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                            <br>
                            <!-- Grupo 2 -->
                            <div class="dark-footer-subtitle"> <?php echo $data['secao3_grupo2_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo2_item" . $i . "_nome";
                                $key_link   = "secao3_grupo2_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                        </div>

                        <div class="white-footer-column w-col w-col-3">
                            <!-- Grupo 3 -->
                            <div class="dark-footer-subtitle"> <?php echo $data['secao3_grupo3_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo3_item" . $i . "_nome";
                                $key_link   = "secao3_grupo3_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                            <br>

                            <!-- Grupo 4 -->
                            <div class="dark-footer-subtitle"> <?php echo $data['secao3_grupo4_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo4_item" . $i . "_nome";
                                $key_link   = "secao3_grupo4_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                            <br>
                        </div>

                        <div class="white-footer-column w-col w-col-2">
                            <!-- Grupo 5 -->
                            <div class="dark-footer-title"> <?php echo $data['secao3_grupo5_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo5_item" . $i . "_nome";
                                $key_link   = "secao3_grupo5_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                            <br>

                            <!-- Grupo 6 -->
                            <div class="dark-footer-title-copy"> <?php echo $data['secao3_grupo6_item1_title'];?> </div>
                            <?php 
                            for($i=1;$i<=6;$i++):
                                $key_desc   = "secao3_grupo6_item" . $i . "_nome";
                                $key_link   = "secao3_grupo6_item" . $i . "_link";
                                if(!empty($data[$key_desc])):
                            ?>
                                <a href="<?php echo $data[$key_link];?>" class="light-footer-link"> <?php echo $data[$key_desc];?> </a>
                                <?php endif;  ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="div-block-72">
                        <!-- Regulamentação, Parceiros e Premios -->
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">REGULAMENTAÇÃO</div>
                            </div>
                            <div><img src="<?php echo $data['secao3_regulamentacao1_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_regulamentacao2_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_regulamentacao3_img'];?>" width="138" alt="" class="image-footer"></div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">PARCEIROS</div>
                            </div>
                            <div><img src="<?php echo $data['secao3_parceiros1_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_parceiros2_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_parceiros3_img'];?>" width="138" alt="" class="image-footer"></div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">PRÊMIOS</div>
                            </div>
                            <div><img src="<?php echo $data['secao3_premios1_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_premios2_img'];?>" width="138" alt="" class="image-footer">
                            <img src="<?php echo $data['secao3_premios3_img'];?>" width="138" alt="" class="image-footer"></div>
                        </div>
                    </div>
                </div>
                <div class="div-block-73">
                    <div class="body-text-small"><?php echo $data['secao3_pitch'];?>
                        <br>
                    </div>
                    <h6 class="h6-gradient-copy">© 2019 D1</h6>
                </div>
            </div>
        </div>
    </div>