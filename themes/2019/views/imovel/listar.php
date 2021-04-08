<style type="text/css">

    .figure__image { height: 222px; margin: 0 0 7px; overflow: hidden; position: relative; width: auto; }
    .figure__image img { max-width: 100%; -moz-transition: all 0.3s; -webkit-transition: all 0.3s; transition: all 0.3s; }
    a:hover .figure__image img { -moz-transform: scale(1.1); -webkit-transform: scale(1.1); transform: scale(1.1); }
    .sc-card{padding: 0 15px; text-align: center; }
    .sc-card span{color: #3e93c6; } 
    .uk-card-body{padding: 10px 10px; } 
    .sc-valor{
        background: #3e93c6; /* Old browsers */
        background: -moz-linear-gradient(-45deg, #3e93c6 0%, #5a9dc4 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #3e93c6 0%,#5a9dc4 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #3e93c6 0%,#5a9dc4 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        padding: 5px 30px;
        width: 150px;
        margin: -70px 0 30px -10px;
        position: relative;
        border-radius: 0 20px 20px 0;
        color: #eaffea;
    }
</style>
<?php
//$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo . ' | ' . Yii::app()->params['Imobiliaria']);
$baseUrl = (Yii::app()->theme ? Yii::app()->theme->baseUrl : Yii::app()->request->baseUrl);
?>
<div class="row">
    <div class="col-md-12 lista-imoveis" id="lista">
<?php if (isset($this->breadcrumbs)) {
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs));
} ?>
        <h1 class="titulo-interno ubuntu text-colorbase"><?= $titulo ?></h1>
        <div class="titulo-border"></div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <span class="ubuntu text-colorbase">Total de imóveis <?= $itemCount ?></span>
            </div>
        </div>
        <div class="row listar-desktop"><?php
            foreach ($model as $k => $v) { ?>
                <div class="col-lg-6 col-12" style="position: relative; margin: 10px 0;" >
                    <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem)); ?>#corpo" class="anchor-overlay" style="text-decoration: none; " ></a>
                    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid >
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
            } ?>
        </div>
        <!-- CARD MOBILE -->
        <div class="row listar-mobile"> <?php
            foreach ($model as $k => $v) { ?>
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
                </div><?php 
            } ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9 text-center paginador ">
        <?php
            $this->widget('CLinkPager', array(
                'pages' => $dataProvider->pagination,
                'header' => '<nav id="paginador" aria-label="Page navigation example">',
                'nextPageLabel' => '>',
                'firstPageLabel' => '<<',
                'prevPageLabel' => '<',
                'lastPageLabel' => '>>',
                'selectedPageCssClass' => 'active',
                'hiddenPageCssClass' => 'active',
                'htmlOptions' => array(
                    'class' => 'pagination uk-pagination uk-flex-center',
                )
            ) );
        ?>
    </div>
</div>
