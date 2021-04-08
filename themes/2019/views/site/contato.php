<? //$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>
<? /* QUANDO ENTRAR AQUI, ARMAZENAR URL NA SESSION. IREI USAR ESSA INFORMAÇÃO NA TELA DE VISUALIZAÇÃO DO IMÓVEL */ ?>
<div class="row">
<div class="col-md-9 contato">
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    <h2 class="ubuntu text-colorbase">Entre em contato conosco</h2>
    
    <iframe frameborder="0" style="border:0; width: 100%; height: 400px; margin-bottom: 30px" src="https://www.google.com/maps/embed/v1/place?q=<?= Util::getEnderecoEmbed(Yii::app()->params['GoogleMaps']);?>&key=<?= Yii::app()->params['GoogleMapsKey'] ?>" allowfullscreen></iframe>
    
    <? $form=$this->beginWidget('CActiveForm', array('clientOptions'=>array('validateOnSubmit'=>true))); ?>
    <?=$form->errorSummary($model);?>
    
    <div class="form-group">
        <?=$form->labelEx($model,'name');?>
		<?=$form->textField($model,'name', array('class' => 'form-control'));?>
		<?=$form->error($model,'name');?>
    </div>
    
    <div class="form-group">
        <?=$form->labelEx($model,'email');?>
		<?=$form->textField($model,'email', array('class' => 'form-control'));?>
		<?=$form->error($model,'email');?>
    </div>
    
    <div class="form-group">
        <?=$form->labelEx($model,'fone');?>
		<?=$form->textField($model,'fone', array('class' => 'form-control'));?>
		<?=$form->error($model,'fone');?>
    </div>
    
    <div class="form-group">
        <?=$form->labelEx($model,'subject');?>
		<?=$form->textField($model,'subject', array('class' => 'form-control'));?>
		<?=$form->error($model,'subject');?>
    </div>
    
    <div class="form-group">
        <?=$form->labelEx($model,'body'); ?>
		<?=$form->textArea($model,'body', array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		<?=$form->error($model,'body'); ?>
    </div>
    
    <?php /* if(CCaptcha::checkRequirements()): ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; */ ?>

	<div class="form-group buttons">
        <button type="submit" class="btn btn-default btn-success">Enviar Contato</button>
	</div>

<?php $this->endWidget(); ?>
</form>
    
    
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
</div>