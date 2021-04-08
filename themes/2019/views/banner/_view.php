<?php
/* @var $this BannerController */
/* @var $data Banner */
?>

<div class="view">

	

		<tr>
			<td><img src="<?= Yii::app()->baseUrl.'/images/banner/'.$data->imagem ?>" width="95%" class="img-thumbnail" style="margin:5px;"></td>
			<td><?php echo CHtml::encode($data->titulo); ?></td>
			<td><?php echo CHtml::encode($data->status ? 'Sim' : 'Não'); ?></td>
			<td class="text-center">
				<a href="<? echo Yii::app()->createUrl('index.php/banner/update'.$data->id) ?>"><i class="fa fa-pencil"></i></a>
				<? echo CHtml::link('<i class="fa fa-trash"></i>',"#", array('submit'=>array('delete', 'id'=>$data->id), 'confirm' => 'Você tem certeza que vai deletar '.$data->titulo.'?'));?>
				<a href=""><i class="fa fa-eye"></i></a>
			</td>
		</tr>
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagem')); ?>:</b>
	<?php echo CHtml::encode($data->imagem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />
-->

</div>