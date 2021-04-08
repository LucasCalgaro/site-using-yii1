<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array( 'enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo', array('class'=>'col-md-2')); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link', array('class'=>'col-md-2')); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>
<p class="text-danger">Tamanho recomendado da imagem 1300x500</p>
	<div class="row">
		<?php echo $form->labelEx($model,'imagem', array('class'=>'col-md-2')); ?>
		<?php echo $form->fileField($model,'imagem',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'imagem'); ?>
	</div>

<script src="<?php echo Yii::app()->baseUrl.'/editor/ckeditor/ckeditor.js' ?>"></script>
	<div class="row">
		<?php echo $form->labelEx($model,'descricao', array('class'=>'col-md-2')); ?><br>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50, 'id'=>'editor1', 'class'=>'col-md-2')); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>
<script type="text/javascript">
      CKEDITOR.replace( 'editor1', {
         filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/browse.php?type=files',
         filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/browse.php?type=images',
         filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/browse.php?type=flash',
         filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/upload.php?type=files',
         filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/upload.php?type=images',
         filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/editor/kcfinder/upload.php?type=flash'
    });
</script>

<?
// $this->widget('booster.widgets.TbCKEditor',
//     array(
//         'name' => 'descricao',
//         'editorOptions' => array(
//         	'toolbarGroups'=>'',
//         	'filebrowserImageBrowseUrl'=> Yii::app()->baseUrl.'/editor/kcfinder/browse.php?type=images',
//             // From basic `build-config.js` minus 'undo', 'clipboard' and 'about'
//             // 'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
//         )
//     )
// );
?>
	<br>
	  <div class="switch">
	  	<b class="col-md-2">Publicar ?</b>
	    <label>
	      Não
	      <?php echo $form->checkbox($model,'status',array('class'=>'span1','maxlength'=>256)); ?>
	      <!-- <input type="checkbox" name="status"> -->
	      <span class="lever"></span>
	      Sim
	    </label>
	  </div>

	<br>
	<!-- <div class="row buttons"> -->
	<div class="waves-effect waves-light btn-large btn-criar">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->