<?php
/* @var $this BannerController */

// $this->breadcrumbs=array(
// 	'Banner',
// );
?>
<div class="row-fluid">
	<!-- <h3 class="text-center col-md-3"> Seja Bem Vindo <?= Yii::app()->user->name ?></h3> -->
	<h3 class="text-center col-md-3"></h3>
	<h3 class="text-left col-md-9 text-center">Banners</h3>
</div>
<div class="row-fluid">
	<div class="col-md-3">
		<div class="collection">
			<p class="collection-item text-center">MENU</p>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/create') ?>" class="collection-item">Cadastrar Novo</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/index') ?>" class="collection-item">Gerenciar Banners</a>
			<a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
			<a href="<? echo Yii::app()->createUrl('/site/logoff') ?>" class="collection-item">Sair</a>
		</div>
	</div>
	<div class="col-md-8">
		<?php
		$img = Banner::model()->aGetBanner();
		foreach ($img as $key => $value) {
			if (!empty($value->imagem)) {
				echo '<a href="'.Yii::app()->createUrl('index.php/banner/'.$value->id).'">';
				echo '<img src="'.Yii::app()->baseUrl.'/images/banner/'.$value->imagem.'" width="40%" class="img-thumbnail" style="margin:5px;">';
				echo '</a>';
			}
		}
		?>
	</div>
	<!-- <div class="col s2 m2 "></div> -->
</div>
