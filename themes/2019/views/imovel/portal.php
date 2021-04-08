<style>
#pin2{display:none;}
.mask-img{
	clip: rect(17px, 96px, 76px, 6px);
    left: 10px;
    margin: -25px 0 0;
    position: absolute;
    transition: .9s all;
}
.mask-img:hover{	

    margin: -30px 0 0;
    position: absolute;
    transform: scale(1.4);
    transition: .9s all;
	clip: rect(-150px, 150px, 150px, 0px);
	z-index:9999;
/*	box-shadow:0 0 40px 8px #ccc;*/
}
</style>

<div class="col-md-10 lista-imoveis">



	<?
		echo '  <table class="table table-responsive table-bordered table-striped table-hover">';

	foreach ($model as $key => $portal) {

$aImg = '';
$aImg  = substr($portal->aImagem, 0, -1);
$Img = explode("|", $aImg);
$r = end($Img);
if(!empty($aImg)){
if (strstr($r, 'r')) {$imagem = "http://encontraimoveis.com.br/img/".$r;}
else{$imagem = "http://encontraimoveis.com.br/img/".$Img[0];}
}else{$imagem = Yii::app()->request->baseUrl . '/images/foto_breve.jpg';}


		switch ($portal->lista) {
			case '1':
				$tr = '<tr style="background:#e8f5e9" data-toggle="tooltip" data-placement="top" title="Este imovel foi enviado para o ZAP">';
				$tr2 = '<tr style="background:#e8f5e9;height: 60px;">';
				break;
			case '2':
				$tr = '<tr style="background:#a5d6a7" data-toggle="tooltip" data-placement="top" title="Este imovel foi enviado para o ZAP como DESTAQUE">';
				$tr2 = '<tr style="background:#a5d6a7;height: 60px;">';
				break;
			case '3':
				$tr = '<tr style="background:#4caf50" data-toggle="tooltip" data-placement="top" title="Este imovel foi enviado para o ZAP como SUPER DESTAQUE">';
				$tr2 = '<tr style="background:#4caf50;height: 60px;">';
				break;	
			default:
				$tr = '<tr>';
				$tr2 = '<tr style="height: 60px;">';
				break;
		}
		
		echo 	  $tr;
//		echo '<td>sd</td>';
		echo '    	<td>'.Util::formata($portal->id, 'ref').'</td>';
		echo '    	<td>'.$portal->endereco_1.'</td>';
		echo '    	<td>'.$portal->tp_bem.'</td>';
		echo '    	<td class="text-center">'.$portal->finalidade.'</td>';
		echo '    </tr>';
//		echo '    <tr>';
		echo 	  $tr2;
		echo '		<td>';
		echo '			<div class="mask-img">';
		echo '				<img src="'.$imagem.'" width="100"/>';
		echo '			</div>';
		echo '		</td>';
		echo '		<td colspan="3">';
		echo '			<ul>';
		echo '<a name="'.Util::formata($portal->id, 'ref').'"></a>';
echo '<a href="'.Yii::app()->createUrl('imovel/'.$portal->urlFinali.'/'.$portal->urlBem.'/'.$portal->urlCidade.'/'.$portal->cod_bem).'#'.Util::formata($portal->id, 'ref').'" data-toggle="tooltip" data-placement="top" title="Visualizar" class="waves-effect waves-light tZap"><i class="fa fa-eye" aria-hidden="true"></i></a>';

if($portal->lista == 1){
echo '<b data-toggle="tooltip" data-placement="top" title="Este imovel ja esta no ZAP" class="waves-effect waves-light sZap" style="color:#cfcfcf"><i class="fa fa-paper-plane"></i></b>';	
}else{
echo '<a href="'.Yii::app()->createUrl("imovel/enviaportal/", array('id'=>$portal->cod_bem)).'#'.Util::formata($portal->id, 'ref').'" data-toggle="tooltip" data-placement="top" title="Enviar" class="waves-effect waves-light tZap"><i class="fa fa-paper-plane"></i></a>';
}

if($portal->lista == 2){
echo '<b data-toggle="tooltip" data-placement="top" title="Este imovel ja é Destaque" class="waves-effect waves-light sZap" style="color:#e0e0e0"><i class="fa fa-star-half-o"></i></b>';	
}else{
echo '<a href="'.Yii::app()->createUrl("imovel/enviaportald/", array('id'=>$portal->cod_bem)).'#'.Util::formata($portal->id, 'ref').'"  data-toggle="tooltip" data-placement="top" title="Destaque" class="waves-effect waves-light tZap"><i class="fa fa-star-half-o"></i></a>';
}

if($portal->lista == 3){
echo '<b data-toggle="tooltip" data-placement="top" title="Este imovel ja é Super Destaque" class="waves-effect waves-light sZap" style="color:#e0e0e0"><i class="fa fa-star"></i></b>';	
}else{
echo '<a href="'.Yii::app()->createUrl("imovel/enviaportalsd/", array('id'=>$portal->cod_bem)).'#'.Util::formata($portal->id, 'ref').'" data-toggle="tooltip" data-placement="top" title="Super Destaque" class="waves-effect waves-light tZap"><i class="fa fa-star"></i></a>';
}
// $ds = '';
if($portal->lista == 0 OR $portal->lista == NULL){
	// $ds = 'disabled="disabled"';
	echo '<b data-toggle="tooltip" data-placement="top" class="waves-effect waves-light sZap" style="color:#b0b0b0" title="ESTE IMOVEL NAO ESTA NO ZAP"><i class="fa fa-times"></i></b>';	
}else{
	echo '<a href="'.Yii::app()->createUrl("imovel/enviaportalret/", array('id'=>$portal->cod_bem)).'#'.Util::formata($portal->id, 'ref').'" data-toggle="tooltip" data-placement="top" title="Retirar do ZAP" class="waves-effect waves-light tZap" title="Retirar do ZAP"><i class="fa fa-times"></i></a>';	
}

				    	echo '</ul>';

//		echo '		<hr>';
		echo '		</td>';
		echo '    </tr>';
		
	}
		echo '  </table>';
		?>

<?
			$this->widget('CLinkPager', array(
				'pages'=>$dataProvider->pagination,
				'header' => '<nav id="paginador">',
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


<script type="text/javascript">
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<style type="text/css">
.tZap:hover{
	background: #fafafa;
	box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
	transition: 0.6s all;
	-moz-transition: 0.6s all;
	-webkit-transition: 0.6s all;
}
.tZap{	
	transition: 0.6s all;
	-moz-transition: 0.6s all;
	-webkit-transition: 0.6s all;
	color: #333;
    float: left;
    margin: -8px 30px -15px 0;
    padding: 20px;
    text-align: center;
    width: 15%;
}
.sZap{	
	color: #333;
    float: left;
    margin: -8px 30px -15px 0;
    padding: 20px;
    text-align: center;
    width: 15%;
}
	/*.fixed-action-btn{
		position: unset!important;
	}*/
	/*.btn-floating{
		position: unset;
	}*/
	/*.fixed-action-btn.horizontal ul{
		position: unset!important;
	}*/
</style>