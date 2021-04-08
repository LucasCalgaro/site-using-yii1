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
        <h1 class="titulo-interno uniuansheavy"><?= $titulo ?></h1>
        <div class="titulo-border"></div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <span class="badge badge-light text-right">Total de imóveis <?= $itemCount ?></span>
            </div>
        </div>
        <?php
        echo '<div class="uk-child-width-1-3@m" uk-grid>';
        foreach ($model as $k => $v) {
            $aImg = '';
            //$aImg = substr($v->aImagem, 0, -1);
            //$Img = explode("|", $aImg);
            $Img = $v->getArrayImagensExiste();
            $r = end($Img);
            if (count($Img) > 0 
            && strlen(trim($r)) > 0) {
                //if(!empty($aImg)){
                if (strstr($r, 'img')) {
                    //$imagem = '<img src="http://encontraimoveis.com.br/img/'.$r.'" alt="" style="">';
                    $imagem = '<img src="' . $v->getPathWebImagens() . $r . '" alt="" style="">';
                } else {
                    //$imagem = '<img src="http://encontraimoveis.com.br/img/'.$Img[0].'" alt="" style="">';
                    $imagem = '<img src="' . $v->getPathWebImagens() . $Img[0] . '" alt="" style="">';
                }
            } else {
                $imagem = '<img src="' . $this->baseUrl . '/img/imovel-sem-foto3.jpg" alt="" style="width:100%">';
                //$imagem = '<img src="' . $this->baseUrl . '/img/lista_sem_imagem.png" alt="" style="width:100%">';
            }
            echo '<div>';
            echo '    <a href="' . Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem) ) . '">';
            //echo '    <a href="' . Yii::app()->createUrl('imovel/' . $v->urlFinali . '/' . $v->cod_bem) . '">';
            echo '    <div class="uk-card uk-card-default uk-card-default uk-card-hover" style="height: 420px;min-height: 420px;">';
            //echo '        <div class="uk-card-media-top" style="overflow: hidden;height: 220px; min-height: 220px;background: url(http://imoveiscantogrande.com.br/stada/img/imovel-sem-foto3.jpg);background-size: cover;">';
            echo '        <div class="uk-card-media-top" style="overflow: hidden;height: 220px; min-height: 220px;background: url(' . $baseUrl . '/img/imovel-sem-foto3.jpg);background-size: cover;">';
            echo                    $imagem;
            echo '        </div>';
            echo '        <div class="uk-card-body">';
            // echo '            <div class="sc-valor uniuansbold">'. $v->vlr_oferta.'</div>';
            echo '            	<h3 class="uk-card-title uniuansbold" style="margin: 0 0 -10px 0;">';
            echo $v->tp_bem;
            echo '					<span style="position: absolute;right: 10px;font-size: 20px;">';
            if ($v->vlr_oferta != '0.00') {
                echo Util::formata($v->vlr_oferta, 'real');
            } else {
                echo '';
            }
            echo '					</span>';
            echo '				</h3>';
            echo '            <p class="unisansbook"> ' . $v->bairro . ' - ' . $v->cidade . '<br>';
            if ($v->endereco_1 != '') {
                echo '            <i class="fa fa-map-marker" aria-hidden="true"></i> ' . Util::getStringUTF8($v->endereco_1) . '</p>';
            }
            echo '            <div class="uk-card-footer" style="padding: 10px;">';
            echo '                <div class="uk-child-width-1-5@s uk-flex-nowrap uk-flex-center uk-text-center unisansbook" uk-grid style="margin-left: -30px;margin-right: -30px;">'; ?>
            <?php $nContaBenfeitoria = 0;
            if ($v->area_total != '0.00') { $nContaBenfeitoria++; ?>
                            <div class="uk-card sc-card " style="text-align:right;">
                                <i class="fas fa-arrows-alt" style="font-size: 20px;"></i>
                                <p style="font-size: 14px; margin-top: 3px;"><?= $v->area_total ?><sup>2</sup></p>
                            </div>
      <?php      
            }
            if ($v->qtde_quartos != '0') { 
                if($nContaBenfeitoria == 1){ ?>
                            <div class="uk-card sc-card " style="padding-left: 30px;"><?php 
                } else{ ?>
                            <div class="uk-card sc-card "> 
          <?php } ?>
                                <i class="fas fa-bed" style="font-size: 20px;"></i>
                                <p style="font-size: 15px; margin-top: 1px;"><?= $v->qtde_quartos ?></p>
                            </div>
      <?php     $nContaBenfeitoria++;
            } 
            if ($v->qtde_cozinhas != '0') { ?>
                            <div class="uk-card sc-card ">
                                <i class="fas fa-utensils" style="font-size: 20px;"></i>
                                <p style="font-size: 15px; margin-top: 1px;"><?= $v->qtde_cozinhas ?></p>
                            </div>
      <?php     $nContaBenfeitoria++;
            }
            if ($v->qtde_salas != '0') { ?>
                            <div class="uk-card sc-card ">
                                <i class="fas fa-tv" style="font-size: 20px;"></i>
                                <p style="font-size: 15px; margin-top: 1px;"><?= $v->qtde_salas ?></p>
                            </div>

      <?php     $nContaBenfeitoria++;
            }
            if ($v->qtde_garagens != '0') { ?>
                            <div class="uk-card sc-card ">
                                <i class="fas fa-warehouse" style="font-size: 20px;"></i>
                                <p style="font-size: 15px; margin-top: 1px;"><?= $v->qtde_garagens ?></p>
                            </div>
      <?php     $nContaBenfeitoria++;
            }
            if ($nContaBenfeitoria == 0){ ?>
                            <div class="uk-card sc-card ">
                                <i></i><br>
                                <p style="font-size: 15px; margin-top: 1px;"></p>
                            </div>
          <?php } ?> <?php
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '  </a>';
            echo '</div>';
// 			echo '<div class="column is-4 imovel text-center" style="float:left">';
// 			// echo '<a href="'.Yii::app()->createUrl('imovel/'.$v->urlFinali.'/'.$v->urlBem.'/'.$v->urlCidade.'/'.$v->cod_bem).'">';	
// 			echo '<a href="'.Yii::app()->createUrl('imovel/'.$v->urlFinali.'/'.$v->cod_bem).'#'.Util::formata($v->id, 'ref').'">';	
// 			// $aImg = '';
// 			// $aImg  = substr($v->aImagem, 0, -1);
// 			// $Img = explode("|", $aImg);
// 			// $r = end($Img);
// 			// // print_r($Img);
// 			// if(!empty($aImg)){
// 			// if (strstr($r, 'r')) {$img = "http://encontraimoveis.com.br/img/".$r;}
// 			// else{$img = "http://encontraimoveis.com.br/img/".$Img[0];}
// 			// }else{$img = $this->baseUrl.'/img/lista_sem_imagem.png';}
// $aImg = '';
// $aImg  = substr($v->aImagem, 0, -1);
// $Img = explode("|", $aImg);
// $r = end($Img);
// if(!empty($aImg)){
//      if(Yii::app()->util->url_exists('http://encontraimoveis.com.br/img/'.$r) || Yii::app()->util->url_exists('http://encontraimoveis.com.br/img/'.$Img[0])){
//           if (strstr($r, 'r')) {
//                $imagem = "http://encontraimoveis.com.br/img/".$r;
//           }else{
//                $imagem = "http://encontraimoveis.com.br/img/".$Img[0];
//           }
//      }else{
//           if (strstr($r, 'r')) {
//                $imagem = Yii::app()->request->baseUrl."/img/".$r;
//                // $img = "http://coelhocorretor.com.br/img/".$r;
//           }else{
//                $imagem = Yii::app()->request->baseUrl."/img/".$Img[0];
//                // $img = "http://coelhocorretor.com.br/img/".$Img[0];
//           }
//      }
// }else{$imagem = Yii::app()->request->baseUrl.'/images/foto_breve.jpg';}
// 			echo '<div class="figure__image" title="'.$v->bairro.'">';
// 			echo '	<img class="img-responsive foto-imovel" src="'.$imagem.'" alt="'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . ' -'.$v->bairro.'" title="'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . ' - '.$v->bairro.'"/>';
// 			echo '</div>';
// 			// echo '<img class="img-responsive foto-imovel" src="'.$img.'" alt="" style="height: 185px;"/>';
// 			echo '<p class="text-left"><b>'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . '</b></p>';
// 			echo '<p class="text-left">' . $v->cidadeBr . ' - '. $v->uf . '</p>';
// 			// if( $v->vlr_oferta != '0.00') {
// 			// 	echo '<p class="text-left text-muted">R$ ' . number_format($v->vlr_oferta, 2, ',', '.') . '</p>';
// 			// }elseif ( $v->vlr_locacao != '0.00') {
// 			// 	echo '<p class="text-left text-muted">R$ ' . number_format($v->vlr_locacao, 2, ',', '.') . '</p>';
// 			// }else{
// 			// 	echo '<p class="text-left text-muted">Consulte-nos</p>';
// 			// }
// 				echo '<p class="text-left text-muted">Ref.:<b>'.Util::formata($v->id, 'ref').'</b></p>';
// 			echo '</a>';
// 			echo '</div>';
        }
        echo '</div>';
        ?>

    </div>

    <?php //$this->renderPartial('/system/m_sidebar');  ?>
</div>
<div class="row">
    <div class="col-md-9 text-center paginador ">
        <?php
        $this->widget('CLinkPager', array(
            'pages' => $dataProvider->pagination,
            'header' => '<nav id="paginador" aria-label="Page navigation example">',
            'nextPageLabel' => 'Próxima Página <span uk-pagination-next></span>',
            'firstPageLabel' => '',
            'prevPageLabel' => '<span uk-pagination-previous></span> Página Anterior',
            'lastPageLabel' => '',
            'selectedPageCssClass' => 'active',
            'hiddenPageCssClass' => 'disabled',
            'htmlOptions' => array(
                'class' => 'pagination uk-pagination uk-flex-center',
            )
        ));
        ?>
    </div>
</div>
