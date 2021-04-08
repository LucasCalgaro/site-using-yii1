<?php
/* @var $this BannerController */
/* @var $model Banner */

// $this->breadcrumbs=array(
// 	'Banners'=>array('index'),
// 	$model->id=>array('view','id'=>$model->id),
// 	'Update',
// );

// $this->menu=array(
// 	array('label'=>'List Banner', 'url'=>array('index')),
// 	array('label'=>'Create Banner', 'url'=>array('create')),
// 	array('label'=>'View Banner', 'url'=>array('view', 'id'=>$model->id)),
// 	array('label'=>'Manage Banner', 'url'=>array('admin')),
// );
?>
<!-- <div class="row-fluid">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">sd<div>
</div> -->

<div class="row-fluid">
	<div class="col-md-2">
		<div class="collection">
			<p class="collection-item text-center">MENU</p>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/admin') ?>" class="collection-item">Listar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/admin') ?>" class="collection-item">Voltar</a>
			<a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
			<a href="<? echo Yii::app()->createUrl('/site/logoff') ?>" class="collection-item">Sair</a>
		</div>
	</div>
	<div class="col-md-7">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	<div class="col-md-3">
		<blockquote class="bg-danger">
			<h4 class="text-center text-danger">Atenção voce esta atualizando um Banner</h4>
			<p><?= $model->titulo; ?></p>
			<img src="<?= Yii::app()->baseUrl ?>/images/banner/<?= $model->imagem?>" width="90%" class="img-rounded">
		</blockquote>
	</div>
</div>