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

<!--  -->
<h1>Lancamento - <?= $model['titulo']?></h1>

<div class="col-md-9">
	<img src="<?= Yii::app()->baseUrl."/images/banner/".$model['imagem']?>" width="100%"/>
	<blockquote>
		<p class="text-justify"><?= $model['descricao']?></p>
	</blockquote>
</div>

<div class="col-md-3">
	asd4as
</div>
