<?php
/* @var $this BannerController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
// 	'Banners',
// );

// $this->menu=array(
// 	array('label'=>'Create Banner', 'url'=>array('create')),
// 	array('label'=>'Manage Banner', 'url'=>array('admin')),
// );
?>
	<h1 class="text-center">Banners</h1>
	<div class="col-md-3">
		<div class="collection">
			<p class="collection-item text-center">MENU</p>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/create') ?>" class="collection-item">Criar Banner</a>
			<a href="<? echo Yii::app()->createUrl('index.php/banner/index') ?>" class="collection-item">Gerenciar Banners</a>
			<a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
			<a href="<? echo Yii::app()->createUrl('/site/logoff') ?>" class="collection-item">Sair</a>
		</div>
	</div>
	<div class="col-md-9">
		<div class="table-responsive">
			<table class="table table-hover  table-bordered table-striped">
				<tr>
					<td style="width:150px;">Imagem</td>
					<td>Titulo</td>
					<td style="width:80px;">Publicado?</td>
					<td style="width:80px;" class="text-center">Ação</td>
				</tr>
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
				)); ?>
			</table>
		</div>
	</div>

