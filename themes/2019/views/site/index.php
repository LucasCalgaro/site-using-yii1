<?php $this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']); ?>
<style type="text/css">
    .sc-card{padding: 0 15px; text-align: center; }
    .sc-card span{color: #ed1c24} 
    .uk-card-body{padding: 10px 40px; } 
    .sc-valor{
        background: #3e93c6; /* Old browsers */
        background: -moz-linear-gradient(-45deg, #3e93c6 0%, #5a9dc4 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #3e93c6 0%,#5a9dc4 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #3e93c6 0%,#5a9dc4 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        padding: 5px 30px;
        width: 150px;
        margin: -70px 0 30px -40px;
        position: relative;
        border-radius: 0 20px 20px 0;
        color: #eaffea;
    }
</style>    
<div id="imob-venda" class="carousel slide imob-desktop" data-ride="carousel">
    <div class="row imv-card-header">
        <div class="col-lg-9 col-md-7 col-12">
            <h2 class="uk-text-rigth ubuntu text-colorbase">Destaques Venda</h2>
        </div>
        <div class="col-lg-1 col-md-2 col-4 "> <?php 
           if (count($imbVenda) > 2){ ?>
            <ol class="carousel-indicators">    
                <li data-target="#imob-venda" data-slide-to="0" class="active"></li>
                <li data-target="#imob-venda" data-slide-to="1"></li>
            </ol> <?php 
            } ?>
        </div>
        <div class="col-lg-2 col-md-3 col-8">
            <a class="moreimv-btn" href="<?= Yii::app()->createUrl('imovel/venda') ?>#lista"><i class="fas fa-plus-circle" style="margin-right:10px;"></i> Ver mais</a>
        </div>
    </div>
    <div class="carousel-inner"><?php 
        foreach ($imbVenda as $key => $v) { 
            if($key == 0 && !empty($imbVenda)){ ?>
                <div class="carousel-item active">
                    <div class="row"> <?php 
            } 
            else if ($key == 2 && !empty($imbVenda)){ ?>
                <div class="carousel-item">
                    <div class="row"><?php 
            } ?>
                        <div class="col-lg-6 col-12" style="position: relative; margin: 10px 0;" >
                            <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem)); ?>#corpo" class="anchor-overlay" style="text-decoration: none; " ></a>
                            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid style="">
                                <div class="uk-card-media-left uk-cover-container" style="height: 240px; overflow: hidden; position: relative;"><?php 
                                    $aImg = '';
                                    $Img = $v->getArrayImagensExiste();
                                    $r = end($Img);
                                    if (count($Img) > 0 
                                    && strlen(trim($r)) > 0) {
                                        //if(!empty($aImg)){
                                        if (strstr($r, DIRECTORY_SEPARATOR)) {
                                            $r = explode(DIRECTORY_SEPARATOR, $r);
                                            $r = end($r);
                                        }
                                        $imagem = (strstr($r, 'img')) ? $v->getPathWebImagens() . $r : $v->getPathWebImagens() . $r;
                                    } else {
                                        $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg';
                                    } ?>
                                    <img src="<?= $imagem ?>" class="imovel-imagem">
                                    <div class="uk-card" style="position: absolute; bottom: 0; height: 25%; width: 100%; padding: 10px 0px; background: rgba(0, 0, 0, 0.6);">
                                        <div class="uk-child-width-1-5@s" uk-grid style="margin: 0"><?php
                                            if ($v->area_total != '0.00') { ?>
                                                <div class="uk-card sc-card "  style="width: 30%;" title="Área Total">
                                                    <i class="fas fa-arrows-alt benf-icon-color" style="font-size: 18px; margin-left: 10px;"></i>
                                                    <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 3px;"><?= number_format($v->area_total, 2, ',', '.') ?>m<sup>2</sup></p>
                                                </div> <?php      
                                            }
                                            if ($v->qtde_quartos != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Quartos">
                                                    <i class="fas fa-bed benf-icon-color benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_quartos ?></p>
                                                </div> <?php
                                            } 
                                            if ($v->qtde_cozinhas != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Cozinhas">
                                                    <i class="fas fa-utensils benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_cozinhas ?></p>
                                                </div> <?php
                                            }
                                            if ($v->qtde_salas != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Salas">
                                                    <i class="fas fa-couch benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_salas ?></p>
                                                </div> <?php
                                            } if ($v->qtde_garagens != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Garagens">
                                                    <i class="fas fa-warehouse benf-icon-color" style="font-size: 18x;"></i>
                                                    <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_garagens ?></p>
                                                </div> <?php 
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body imv-info" style="position: relative;">
                                    <h1 class="imv-tpbem"><?= Util::getStringUTF8($v->tp_bem)?></h1>
                                    <p class="imv-adress"><?= Util::getStringUTF8($v->bairro) ?> - <?= Util::getStringUTF8($v->cidade) ?></p>
                                    <p class="imv-refer">REFERÊNCIA.: <?= Util::formata($v->id, 'ref') ?></p>
                                    <div style="position: relative; margin-top: 35px;">
                                        <a href="<?= Yii::app()->createUrl('imovel/AdicionarFavoritos', array('id' => $v->cod_bem)); ?>#corpo" class="anchor-inner" style="text-decoration: none;">
                                            <i class="far fa-star" style="font-size: 25px; margin-bottom: -5px;"></i>
                                            <span class="ubuntu" style="font-size: 14px;margin-left: 5px;">Adicionar aos Favoritos</span>
                                        </a>
                                    </div>
                                    <div style="position: absolute; bottom: 0;">
                                        <p class="ubuntu" style="font-weight: 400; font-size: 17px;">
                                            <span class="val-color1">Valor:</span> 
                                            <span class="val-color2"><?php if ($v->vlr_oferta != '0.00') {echo Util::formata($v->vlr_oferta, 'real'); }else{ echo '';} ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><?php 
            if($key == count($imbVenda)-1 || $key == 1 || $key == 3 || count($imbVenda) == 1){ ?>
                    </div>
                </div> <?php
            }
        } ?>
    </div>
</div>
<hr>
<div id="imob-locacao" class="carousel slide" data-ride="carousel">
    <div class="row imv-card-header">
        <div class="col-lg-9 col-md-7 col-12">
            <h2 class="uk-text-rigth ubuntu text-colorbase">Destaques Locação</h2>
        </div>
        <div class="col-lg-1 col-md-2 col-4 ">
            <ol class="carousel-indicators"><?php 
            if (count($imbLocacao) > 2){ ?>
                <li data-target="#imob-locacao" data-slide-to="0" class="active"></li>
                <li data-target="#imob-locacao" data-slide-to="1"></li>
            </ol><?php
            } ?>
        </div>
        <div class="col-lg-2 col-md-3 col-8">
            <a class="moreimv-btn" href="<?= Yii::app()->createUrl('imovel/locacao') ?>#lista"><i class="fas fa-plus-circle" style="margin-right: 10px;"></i> Ver mais</a>
        </div> 
    </div>
    <div class="carousel-inner"> <?php 
        foreach ($imbLocacao as $key => $v) { 
            if($key == 0 && !empty($imbLocacao)){ ?>
                <div class="carousel-item active">
                    <div class="row"> <?php 
            } 
            else if ($key == 2 && !empty($imbLocacao)){ ?>
                <div class="carousel-item">
                    <div class="row"><?php 
                } ?>
                            <div class="col-lg-6 col-12" style="position: relative; margin: 10px 0;" >
                                <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem)); ?>#corpo" class="anchor-overlay" style="text-decoration: none; " ></a>
                                <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid style="">
                                    <div class="uk-card-media-left uk-cover-container" style="height: 240px; overflow: hidden; position: relative;"><?php 
                                        $aImg = '';
                                        //$aImg = substr($v->aImagem, 0, -1);
                                        //$Img = explode("|", $aImg);
                                        $Img = $v->getArrayImagensExiste();
                                        $r = end($Img);
                                        if (count($Img) > 0 
                                        && strlen(trim($r)) > 0) {
                                            //if(!empty($aImg)){
                                            if (strstr($r, DIRECTORY_SEPARATOR)) {
                                                $r = explode(DIRECTORY_SEPARATOR, $r);
                                                $r = end($r);
                                            }
                                            if (strstr($r, 'img')) {
                                                //$imagem = '<img src="http://encontraimoveis.com.br/img/'.$r.'" alt="" style="">';
                                                $imagem = $v->getPathWebImagens() . $r;
                                            } else {
                                                //$imagem = '<img src="http://encontraimoveis.com.br/img/'.$Img[0].'" alt="" style="">';
                                                $imagem = $v->getPathWebImagens() . $r;
                                            }
                                        } else {
                                            $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg';
                                            //$imagem = '<img src="' . $this->baseUrl . '/img/lista_sem_imagem.png" alt="" style="width:100%">';
                                        } ?>
                                        <img src="<?= $imagem ?>" class="imovel-imagem">
                                        <div class="uk-card" style="position: absolute; bottom: 0; height: 25%; width: 100%; padding: 10px 0px; background: rgba(0, 0, 0, 0.6);">
                                            <div class="uk-child-width-1-5@s" uk-grid style="margin: 0"><?php
                                            if ($v->area_total != '0.00') { ?>
                                                <div class="uk-card sc-card "  style="width: 30%;" title="Área Total">
                                                    <i class="fas fa-arrows-alt benf-icon-color" style="font-size: 18px; margin-left: 10px;"></i>
                                                    <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 3px;"><?= number_format($v->area_total, 2, ',', '.') ?>m<sup>2</sup></p>
                                                </div> <?php      
                                            }
                                            if ($v->qtde_quartos != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Quartos">
                                                    <i class="fas fa-bed benf-icon-color benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_quartos ?></p>
                                                </div> <?php
                                            } 
                                            if ($v->qtde_cozinhas != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Cozinhas">
                                                    <i class="fas fa-utensils benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_cozinhas ?></p>
                                                </div> <?php
                                            }
                                            if ($v->qtde_salas != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Salas">
                                                    <i class="fas fa-couch benf-icon-color" style="font-size: 18px;"></i>
                                                    <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_salas ?></p>
                                                </div> <?php
                                            } if ($v->qtde_garagens != '0') { ?>
                                                <div class="uk-card sc-card " style="width: 15%;" title="Garagens">
                                                    <i class="fas fa-warehouse benf-icon-color" style="font-size: 18x;"></i>
                                                    <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_garagens ?></p>
                                                </div> <?php 
                                            } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body imv-info" style="position: relative;">
                                        <h1 class="imv-tpbem"><?= Util::getStringUTF8($v->tp_bem)?></h1>
                                        <p class="imv-adress"><?= Util::getStringUTF8($v->bairro) ?> - <?= Util::getStringUTF8($v->cidade) ?></p>
                                        <p class="imv-refer">REFERÊNCIA.: <?= Util::formata($v->id, 'ref') ?></p>
                                        <div style="position: relative; margin-top: 35px;">
                                            <a href="<?= Yii::app()->createUrl('imovel/AdicionarFavoritos', array('id' => $v->cod_bem)); ?>#corpo" class="anchor-inner" style="text-decoration: none;">
                                                <i class="far fa-star" style="font-size: 25px; margin-bottom: -5px;"></i>
                                                <span class="ubuntu" style="font-size: 14px;margin-left: 5px;">Adicionar aos Favoritos</span>
                                            </a>
                                        </div>
                                        <div style="position: absolute; bottom: 0;">
                                            <p class="ubuntu" style="font-weight: 400; font-size: 17px;">
                                                <span class="val-color1">Valor:</span> 
                                                <span class="val-color2"><?php if ($v->vlr_oferta != '0.00') {echo Util::formata($v->vlr_oferta, 'real'); }else{ echo '';} ?></span>
                                            </p>    
                                        </div>
                                    </div>
                                </div>
                            </div><?php 
            if($key == count($imbLocacao)-1 || $key == 1 || $key == 3 || count($imbLocacao) == 1){ ?>
                    </div>
                </div> <?php
            }
        } ?>
    </div>
</div>
<!-- CARD MOBILE -->
<div id="imob-venda-mobile" class="carousel slide" data-ride="carousel">
    <div class="row imv-card-header">
        <div class="col-12">
            <h2 class="uk-text-rigth ubuntu text-colorbase" style="margin-bottom: 20px;">Destaques Venda</h2>
        </div>
        <div class="col-6 "> <?php 
           if (count($imbVenda) > 1){ ?>
            <ol class="carousel-indicators" style="margin: 0"><?php 
                foreach ($imbVenda as $key => $v) { ?>
                    <li data-target="#imob-venda-mobile" data-slide-to="<?= $key ?>" class="<? if($key == 0){ echo "active"; } ?>"></li><?php 
                } ?>
            </ol> <?php 
            } ?>
        </div>
        <div class="col-6">
            <a class="moreimv-btn" href="<?= Yii::app()->createUrl('imovel/venda') ?>#lista"><i class="fas fa-plus-circle" style="margin-right:10px;"></i> Ver mais</a>
        </div>
    </div>
    <div class="carousel-inner"><?php 
        foreach ($imbVenda as $key => $v) {  ?>
            <div class="carousel-item <?php if($key == 0){ echo "active"; } ?>">
                <div class="row"> 
                    <div class="col-12" style="position: relative; margin: 10px 0;" >
                        <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem)); ?>#corpo" class="anchor-overlay" style="text-decoration: none; " ></a>
                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid style="">
                            <div class="uk-card-media-top uk-cover-container" style="height: 200px; overflow: hidden; position: relative;"><?php 
                                $aImg = '';
                                $Img = $v->getArrayImagensExiste();
                                $r = end($Img);
                                if (count($Img) > 0 
                                && strlen(trim($r)) > 0) {
                                    //if(!empty($aImg)){
                                    if (strstr($r, DIRECTORY_SEPARATOR)) {
                                        $r = explode(DIRECTORY_SEPARATOR, $r);
                                        $r = end($r);
                                    }
                                    $imagem = (strstr($r, 'img')) ? $v->getPathWebImagens() . $r : $v->getPathWebImagens() . $r;
                                } else {
                                    $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg';
                                } ?>
                                <img src="<?= $imagem ?>" class="imovel-imagem">
                                <div class="uk-card" style="position: absolute; bottom: 0; height: 25%; width: 100%; padding: 10px 0px; background: rgba(0, 0, 0, 0.6);">
                                    <div class="uk-child-width-1-5@s" uk-grid style="margin: 0"><?php
                                        if ($v->area_total != '0.00') { ?>
                                            <div class="uk-card sc-card "  style="width: 30%;" title="Área Total">
                                                <i class="fas fa-arrows-alt benf-icon-color" style="font-size: 18px; margin-left: 10px;"></i>
                                                <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 3px;"><?= number_format($v->area_total, 2, ',', '.') ?>m<sup>2</sup></p>
                                            </div> <?php      
                                        }
                                        if ($v->qtde_quartos != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Quartos">
                                                <i class="fas fa-bed benf-icon-color benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_quartos ?></p>
                                            </div> <?php
                                        } 
                                        if ($v->qtde_cozinhas != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Cozinhas">
                                                <i class="fas fa-utensils benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_cozinhas ?></p>
                                            </div> <?php
                                        }
                                        if ($v->qtde_salas != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Salas">
                                                <i class="fas fa-couch benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_salas ?></p>
                                            </div> <?php
                                        } if ($v->qtde_garagens != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Garagens">
                                                <i class="fas fa-warehouse benf-icon-color" style="font-size: 18x;"></i>
                                                <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_garagens ?></p>
                                            </div> <?php 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body imv-info" style="position: relative; height: 240px;">
                                <h1 class="imv-tpbem"><?= Util::getStringUTF8($v->tp_bem)?></h1>
                                <p class="imv-adress"><?= Util::getStringUTF8($v->bairro) ?> - <?= Util::getStringUTF8($v->cidade) ?></p>
                                <p class="imv-refer">REFERÊNCIA.: <?= Util::formata($v->id, 'ref') ?></p>
                                <div style="position: relative; margin-top: 35px;">
                                    <a href="<?= Yii::app()->createUrl('imovel/AdicionarFavoritos', array('id' => $v->cod_bem)); ?>#corpo" class="anchor-inner" style="text-decoration: none;">
                                        <i class="far fa-star" style="font-size: 25px; margin-bottom: -5px;"></i>
                                        <span class="ubuntu" style="font-size: 14px;margin-left: 5px;">Adicionar aos Favoritos</span>
                                    </a>
                                </div>
                                <div style="position: absolute; bottom: 0;">
                                    <p class="ubuntu" style="font-weight: 400; font-size: 17px;">
                                        <span class="val-color1">Valor:</span> 
                                        <span class="val-color2"><?php if ($v->vlr_oferta != '0.00') {echo Util::formata($v->vlr_oferta, 'real'); }else{ echo '';} ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <?php
        } ?>
    </div>
</div>
<hr>
<div id="imob-locacao-mobile" class="carousel slide" data-ride="carousel">
    <div class="row imv-card-header">
        <div class="col-12">
            <h2 class="uk-text-rigth ubuntu text-colorbase" style="margin-bottom: 20px;">Destaques Locação</h2>
        </div>
        <div class="col-6 "> <?php 
           if (count($imbLocacao) > 1){ ?>
            <ol class="carousel-indicators" style="margin: 0"><?php 
                foreach ($imbLocacao as $key => $v) { ?>
                    <li data-target="#imob-locacao-mobile" data-slide-to="<?= $key ?>" class="<? if($key == 0){ echo "active"; } ?>"></li><?php 
                } ?>
            </ol> <?php 
            } ?>
        </div>
        <div class="col-6">
            <a class="moreimv-btn" href="<?= Yii::app()->createUrl('imovel/locacao') ?>#lista"><i class="fas fa-plus-circle" style="margin-right:10px;"></i> Ver mais</a>
        </div>
    </div>
    <div class="carousel-inner"><?php 
        foreach ($imbLocacao as $key => $v) {  ?>
            <div class="carousel-item <?php if($key == 0){ echo "active"; } ?>">
                <div class="row"> 
                    <div class="col-12" style="position: relative; margin: 10px 0;" >
                        <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem)); ?>#corpo" class="anchor-overlay" style="text-decoration: none; " ></a>
                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid style="">
                            <div class="uk-card-media-top uk-cover-container" style="height: 200px; overflow: hidden; position: relative;"><?php 
                                $aImg = '';
                                $Img = $v->getArrayImagensExiste();
                                $r = end($Img);
                                if (count($Img) > 0 
                                && strlen(trim($r)) > 0) {
                                    //if(!empty($aImg)){
                                    if (strstr($r, DIRECTORY_SEPARATOR)) {
                                        $r = explode(DIRECTORY_SEPARATOR, $r);
                                        $r = end($r);
                                    }
                                    $imagem = (strstr($r, 'img')) ? $v->getPathWebImagens() . $r : $v->getPathWebImagens() . $r;
                                } else {
                                    $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg';
                                } ?>
                                <img src="<?= $imagem ?>" class="imovel-imagem">
                                <div class="uk-card" style="position: absolute; bottom: 0; height: 25%; width: 100%; padding: 10px 0px; background: rgba(0, 0, 0, 0.6);">
                                    <div class="uk-child-width-1-5@s" uk-grid style="margin: 0"><?php
                                        if ($v->area_total != '0.00') { ?>
                                            <div class="uk-card sc-card "  style="width: 30%;" title="Área Total">
                                                <i class="fas fa-arrows-alt benf-icon-color" style="font-size: 18px; margin-left: 10px;"></i>
                                                <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 3px;"><?= number_format($v->area_total, 2, ',', '.') ?>m<sup>2</sup></p>
                                            </div> <?php      
                                        }
                                        if ($v->qtde_quartos != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Quartos">
                                                <i class="fas fa-bed benf-icon-color benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_quartos ?></p>
                                            </div> <?php
                                        } 
                                        if ($v->qtde_cozinhas != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Cozinhas">
                                                <i class="fas fa-utensils benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_cozinhas ?></p>
                                            </div> <?php
                                        }
                                        if ($v->qtde_salas != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Salas">
                                                <i class="fas fa-couch benf-icon-color" style="font-size: 18px;"></i>
                                                <p class="ubuntu benf-icon-color"style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_salas ?></p>
                                            </div> <?php
                                        } if ($v->qtde_garagens != '0') { ?>
                                            <div class="uk-card sc-card " style="width: 15%;" title="Garagens">
                                                <i class="fas fa-warehouse benf-icon-color" style="font-size: 18x;"></i>
                                                <p class="ubuntu benf-icon-color" style="font-size: 13px; margin-top: 1px;"><?= $v->qtde_garagens ?></p>
                                            </div> <?php 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body imv-info" style="position: relative; height: 240px;">
                                <h1 class="imv-tpbem"><?= Util::getStringUTF8($v->tp_bem)?></h1>
                                <p class="imv-adress"><?= Util::getStringUTF8($v->bairro) ?> - <?= Util::getStringUTF8($v->cidade) ?></p>
                                <p class="imv-refer">REFERÊNCIA.: <?= Util::formata($v->id, 'ref') ?></p>
                                <div style="position: relative; margin-top: 35px;">
                                    <a href="<?= Yii::app()->createUrl('imovel/AdicionarFavoritos', array('id' => $v->cod_bem)); ?>#corpo" class="anchor-inner" style="text-decoration: none;">
                                        <i class="far fa-star" style="font-size: 25px; margin-bottom: -5px;"></i>
                                        <span class="ubuntu" style="font-size: 14px;margin-left: 5px;">Adicionar aos Favoritos</span>
                                    </a>
                                </div>
                                <div style="position: absolute; bottom: 0;">
                                    <p class="ubuntu" style="font-weight: 400; font-size: 17px;">
                                        <span class="val-color1">Valor:</span> 
                                        <span class="val-color2"><?php if ($v->vlr_oferta != '0.00') {echo Util::formata($v->vlr_oferta, 'real'); }else{ echo '';} ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <?php
        } ?>
    </div>
</div>
<!--
-->
<h2 class="uk-text-rigth ubuntu text-colorbase" style="margin-top: 20px;">Venha nos conhecer</h2>
<iframe frameborder="0" style="border:0; width: 100%; height: 500px;" src="https://www.google.com/maps/embed/v1/place?q=<?= Util::getEnderecoEmbed(Yii::app()->params['GoogleMaps']);?>&key=<?= Yii::app()->params['GoogleMapsKey'] ?>" allowfullscreen></iframe>
