<?php
/* @var $this BannerController */
/* @var $model Banner */

// $this->breadcrumbs=array(
// 	'Banners'=>array('index'),
// 	$model->id,
// );

// $this->menu=array(
// 	array('label'=>'List Banner', 'url'=>array('index')),
// 	array('label'=>'Create Banner', 'url'=>array('create')),
// 	array('label'=>'Update Banner', 'url'=>array('update', 'id'=>$model->id)),
// 	array('label'=>'Delete Banner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Banner', 'url'=>array('admin')),
// );
?>

	<div class="col-md-3">
		<div class="collection">
			<p class="collection-item text-center">MENU</p>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/admin') ?>" class="collection-item">Listar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/create') ?>" class="collection-item">Criar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/update/'.$model->id) ?>" class="collection-item">Atualizar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/delete/'.$model->id) ?>" class="collection-item">Deletar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/index') ?>" class="collection-item">Gerenciar Banners</a>
			<a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
			<a href="<? echo Yii::app()->createUrl('/site/logoff') ?>" class="collection-item">Sair</a>
		</div>
	</div>
	<div class="col-md-9">

		<h1 class="text-center"><small>Banner: </small> <?= $model->titulo; ?></h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id',
				'titulo',
				'link',
				'imagem',
				'status',
				'descricao',
			),
		)); ?>
	</div>