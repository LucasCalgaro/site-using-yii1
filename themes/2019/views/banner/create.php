<?php
/* @var $this BannerController */
/* @var $model Banner */

// $this->breadcrumbs=array(
// 	'Banners'=>array('index'),
// 	'Create',
// );

// $this->menu=array(
// 	array('label'=>'List Banner', 'url'=>array('index')),
// 	array('label'=>'Manage Banner', 'url'=>array('admin')),
// );
?>
<div class="row-fluid">
	<h3 class="text-center col-md-3"> Seja Bem Vindo <?= Yii::app()->user->name ?></h3>
	<h3 class="text-left col-md-9 text-center">Novo Banner</h3>
</div>

<div class="row-fluid">
	<div class="col-md-3">
		<div class="collection">
			<p class="collection-item text-center">MENU</p>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/admin') ?>" class="collection-item">Listar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/admin') ?>" class="collection-item">Voltar</a>
			<a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
			<a href="<? echo Yii::app()->createUrl('/site/logoff') ?>" class="collection-item">Sair</a>
		</div>
	</div>
	<div class="col-md-1 "></div>
	<div class="col-md-8">
		
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>

