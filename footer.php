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
                <p class="pgrey"></p>
                <div class="blog-row w-row">
                    <?php 
                    for($i=1;$i<=3;$i++):
                        $key_desc   = "secao2_card" . $i . "_descricao";
                        $key_link   = "secao2_card" . $i . "_artigo_link";
                        $key_img    = "secao2_card" . $i . "_img_bg";
                    ?>  
                        <div class="blog-column w-col w-col-4 w-col-medium-4">
                        <a href="<?php echo $data[$key_link];?>">
                            <div class="blog-thumb-block">
                                <div class="blog-thumb-content" style='height:auto !important;'>
                                    <div class="blog-thumb-image-wrapper"><img src="<?php echo $data[$key_img];?>" class="image-2"></div>
                                    <div class="blog-thumb-text-wrapper">
                                        <p class="paragraph-3"></p><img src="images/arrowlink.svg" alt="" class="image"></div>
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
            <div class="mycontainer-2">
                <div class="div-block-7">
                    <div>Ainda não encontrou o que procura? Veja nosso conteúdo informativo ou entre em contato!</div>
                </div>
                <div class="div-block-5">
                    <div class="div-block-6"><a href="#" class="btn-black-home-outline-footer w-button">FALAR COM ESPECIALISTA</a></div>
                    <div class="div-block-6"><a href="#" class="btn-play-outline w-button">CONHEÇA EM 1 MINUTO</a></div>
                    <div class="div-block-6"><a href="#" class="btn-cx-outline w-button">CALCULAR CX</a></div>
                </div>
                <div class="div-block-8">
                    <div class="footer-mobile">
                        <div class="div-block-10"><img src="images/Logo.png" width="116" alt=""></div>
                        <div class="div-block-10">
                            <p class="p-white">R. George Ohm 230, Torre A
                                <br> 16º andar - São Paulo, SP
                                <br>CEP 04576-020
                                <br>‍
                                <br>(11) 4765-5200
                                <br> contato@direct.one
                            </p>
                        </div>
                        <div class="div-block-11">
                            <p class="p-white">A plataforma em nuvem da Direct.One funciona como um orquestrador de comunicações multicanal, formatação e processamento de documentos - CCM, que utiliza Inteligência Artificial para personalização das comunicações com clientes.</p>
                        </div>
                    </div>
                    <div class="footer-row white-footer-row w-row">
                        <div class="white-footer-column w-col w-col-4"><img src="images/logofull.png" width="163" alt="">
                            <div class="div-block-9">
                                <p class="p-white">R. George Ohm 230, Torre A 16º andar - São Paulo, SP
                                    <br> CEP 04576-020
                                    <br>
                                    <br>(11) 4765-5200
                                    <br> contato@direct.one
                                </p>
                            </div>
                        </div>
                        <div class="white-footer-column w-col w-col-3">
                            <div class="dark-footer-title">SOLUÇÕES</div><a href="#" class="light-footer-link">Journeys</a><a href="#" class="light-footer-link">Multichannel</a><a href="#" class="light-footer-link">Insights</a><a href="#" class="light-footer-link">Connect</a><a href="#" class="light-footer-link">Trusty</a><a href="#" class="light-footer-link">Documents</a>
                            <div class="dark-footer-subtitle">DEPARTAMENTOS</div><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a><a href="#" class="light-footer-link">Documents</a></div>
                        <div class="white-footer-column w-col w-col-3">
                            <div class="dark-footer-title">SOLUÇÕES</div>
                            <div class="dark-footer-subtitle">SEGMENTOS</div><a href="#" class="light-footer-link">Seguro</a><a href="#" class="light-footer-link">Varejo</a><a href="#" class="light-footer-link">Cartão</a><a href="#" class="light-footer-link">Saude</a><a href="#" class="light-footer-link">Outros</a>
                            <div class="dark-footer-subtitle">DEPARTAMENTOS</div><a href="#" class="light-footer-link">Atendimento</a><a href="#" class="light-footer-link">Operações</a><a href="#" class="light-footer-link">Marketing</a><a href="#" class="light-footer-link">Gestão</a><a href="#" class="light-footer-link">Tecnologia</a>
                            <div class="dark-footer-subtitle">OBJETIVOS</div><a href="#" class="light-footer-link">Satisfação do Cliente</a><a href="#" class="light-footer-link">Redução de Custos</a><a href="#" class="light-footer-link">Retenção de Clientes</a></div>
                        <div class="white-footer-column w-col w-col-2">
                            <div class="dark-footer-title">PlANOS</div><a href="#" class="light-footer-link">Como nos contratar</a>
                            <div class="dark-footer-title-copy">SOBRE</div><a href="#" class="light-footer-link">Nossa Jornada</a><a href="#" class="light-footer-link">Trabalhe na D1</a><a href="#" class="light-footer-link">D1 na Midia</a><a href="#" class="light-footer-link">Segurança e Politica de Dados</a><a href="#" class="light-footer-link">Contato</a></div>
                    </div>
                    <div class="div-block-72">
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">ReGULAMENTAÇÃO</div>
                            </div>
                            <div><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"></div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">PARCEIROS</div>
                            </div>
                            <div><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"></div>
                        </div>
                        <div>
                            <div>
                                <div class="dark-footer-subtitle">PRÊMIOS</div>
                            </div>
                            <div><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"><img src="images/logo-footer_1logo-footer.png" width="138" alt="" class="image-footer"></div>
                        </div>
                    </div>
                </div>
                <div class="div-block-73">
                    <div class="body-text-small">A plataforma em nuvem da Direct.One funciona como um orquestrador de comunicações multicanal, formatação e processamento de documentos - CCM, que utiliza Inteligência Artificial para personalização das comunicações com clientes.
                        <br>
                    </div>
                    <h6 class="h6-gradient-copy">© 2019 D1</h6>
                </div>
            </div>
        </div>
    </div>