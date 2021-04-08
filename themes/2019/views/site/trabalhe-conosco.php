<? //$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>

<div class="row">
<div class="col-md-9 contato">
    
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Trabalhe Conosco</h1>
    
    <?
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo '<div class="alert alert-'.$key.'" role="alert">'.$message.'</div>';
            }
        }
    ?>
    
    <? $form=$this->beginWidget('CActiveForm',array('clientOptions'=>array('validateOnSubmit' => true),'htmlOptions' => array('class' => 'row-fluid', 'enctype' => 'multipart/form-data'))); ?>
    
        <?=$form->errorSummary($model);?>

        <div class="col-md-12">
            <div class="form-group">
                <?=$form->labelEx($model,'nome');?>
                <?=$form->textField($model,'nome', array('class' => 'form-control'));?>
                <?=$form->error($model,'nome');?>
            </div>
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <?=$form->labelEx($model,'telefone');?>
                <?=$form->textField($model,'telefone', array('class' => 'form-control'));?>
                <?=$form->error($model,'telefone');?>
            </div>

            <div class="form-group">
                <?=$form->labelEx($model,'estado');?>
                <?=$form->textField($model,'estado', array('class' => 'form-control'));?>
                <?=$form->error($model,'estado');?>
            </div>

            <div class="form-group">
                <?=$form->labelEx($model,'curriculo');?>
                <?=$form->fileField($model, 'curriculo')?>
                <?=$form->error($model,'curriculo');?>
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <?=$form->labelEx($model,'email');?>
                <?=$form->textField($model,'email', array('class' => 'form-control'));?>
                <?=$form->error($model,'email');?>
            </div>

            <div class="form-group">
                <?=$form->labelEx($model,'cidade');?>
                <?=$form->textField($model,'cidade', array('class' => 'form-control'));?>
                <?=$form->error($model,'cidade');?>
            </div>

            <div class="form-group">
                <?=$form->labelEx($model,'cargo');?>
                <?=$form->textField($model,'cargo', array('class' => 'form-control'));?>
                <?=$form->error($model,'cargo');?>
            </div>

        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?=$form->labelEx($model,'mensagem'); ?>
              <?=$form->textArea($model,'mensagem', array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
              <?=$form->error($model,'mensagem'); ?>
            </div>

            <?php if(CCaptcha::checkRequirements()): ?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <div>
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model,'verifyCode'); ?>
                </div>
                <?php echo $form->error($model,'verifyCode'); ?>
            </div>
            <?php endif; ?>

            <div class="form-group buttons">
                <button type="submit" class="btn btn-default btn-success">Enviar Contato</button>
            </div>
        </div>
    
        <?php $this->endWidget(); ?>
    
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
</div>