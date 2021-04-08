<style type="text/css">

.figure__image { height: 222px; margin: 0 0 7px; overflow: hidden; position: relative; width: auto; }
.figure__image img { max-width: 100%; -moz-transition: all 0.3s; -webkit-transition: all 0.3s; transition: all 0.3s; }
a:hover .figure__image img { -moz-transform: scale(1.1); -webkit-transform: scale(1.1); transform: scale(1.1); }
</style>
<? //$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>
<div class="row">
<div class="col-md-9 lista-imoveis" id="lista">
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
	<h1 class="titulo-interno uniuansheavy"><?=$titulo?></h1>
	<div class="titulo-border"></div>
    	<div class="row">
    		<div class="col-md-10"></div>
    		<div class="col-md-2">
    			<span class="badge badge-light text-right">Total de imóveis <?=$itemCount?></span>
    		</div>
    	</div>
    <?

			echo '<div class="columns is-multiline">';
        foreach($model as $k => $v){

			echo '<div class="column is-4 imovel text-center" style="float:left">';
			// echo '<a href="'.Yii::app()->createUrl('imovel/'.$v->urlFinali.'/'.$v->urlBem.'/'.$v->urlCidade.'/'.$v->cod_bem).'">';	
			echo '<a href="'.Yii::app()->createUrl('imovel/'.$v->urlFinali.'/'.$v->cod_bem).'#'.Util::formata($v->id, 'ref').'">';	
			// $aImg = '';
			// $aImg  = substr($v->aImagem, 0, -1);
			// $Img = explode("|", $aImg);
			// $r = end($Img);
			// // print_r($Img);
			// if(!empty($aImg)){
			// if (strstr($r, 'r')) {$img = "http://encontraimoveis.com.br/img/".$r;}
			// else{$img = "http://encontraimoveis.com.br/img/".$Img[0];}
			// }else{$img = $this->baseUrl.'/img/lista_sem_imagem.png';}
			
$aImg = '';
$aImg  = substr($v->aImagem, 0, -1);
$Img = explode("|", $aImg);
$r = end($Img);
if(!empty($aImg)){
     if(Yii::app()->util->url_exists('http://encontraimoveis.com.br/img/'.$r) || Yii::app()->util->url_exists('http://encontraimoveis.com.br/img/'.$Img[0])){
          if (strstr($r, 'r')) {
               $imagem = "http://encontraimoveis.com.br/img/".$r;
          }else{
               $imagem = "http://encontraimoveis.com.br/img/".$Img[0];
          }
     }else{
          if (strstr($r, 'r')) {
               $imagem = Yii::app()->request->baseUrl."/img/".$r;
               // $img = "http://coelhocorretor.com.br/img/".$r;
          }else{
               $imagem = Yii::app()->request->baseUrl."/img/".$Img[0];
               // $img = "http://coelhocorretor.com.br/img/".$Img[0];
          }
     }
}else{$imagem = Yii::app()->request->baseUrl.'/images/foto_breve.jpg';}



			echo '<div class="figure__image" title="'.$v->bairro.'">';
			echo '	<img class="img-responsive foto-imovel" src="'.$imagem.'" alt="'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . ' -'.$v->bairro.'" title="'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . ' - '.$v->bairro.'"/>';
			echo '</div>';
			// echo '<img class="img-responsive foto-imovel" src="'.$img.'" alt="" style="height: 185px;"/>';
			echo '<p class="text-left"><b>'. $v->finalidade .' - '. utf8_decode($v->tipoBr) . '</b></p>';
			echo '<p class="text-left">' . $v->cidadeBr . ' - '. $v->uf . '</p>';
			// if( $v->vlr_oferta != '0.00') {
			// 	echo '<p class="text-left text-muted">R$ ' . number_format($v->vlr_oferta, 2, ',', '.') . '</p>';
			// }elseif ( $v->vlr_locacao != '0.00') {
			// 	echo '<p class="text-left text-muted">R$ ' . number_format($v->vlr_locacao, 2, ',', '.') . '</p>';
			// }else{
			// 	echo '<p class="text-left text-muted">Consulte-nos</p>';
			// }
				echo '<p class="text-left text-muted">Ref.:<b>'.Util::formata($v->id, 'ref').'</b></p>';
			echo '</a>';
			echo '</div>';
		}
			echo '</div>';
    ?>

</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
</div>
    <div class="row">
	<div class="col-md-9 text-center paginador bg-secondary">
		<?
			$this->widget('CLinkPager', array(
				'pages'=>$dataProvider->pagination,
				'header' => '<nav id="paginador" aria-label="Page navigation example">',
				'nextPageLabel' => 'Próxima Página',
				'firstPageLabel' => '',
				'prevPageLabel' => 'Página Anterior',
				'lastPageLabel' => '',
				'selectedPageCssClass' => 'active',
				'hiddenPageCssClass' => 'disabled',
				'htmlOptions' => array(
					'class' => 'pagination',
				)
			));
		?>
    </div>
    </div>
