<?php // $this->breadcrumbs= $breadcrumbs; ?>

<div id="formulario" class="row">
<div class="col-md-9 contato">
    
    <?php 
        if(isset($this->breadcrumbs)){
            $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); 
            
        } 
    ?>
    
    <h1 class="titulo-interno">Solicitação de Avaliação de Imóvel</h1>
    
    <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo '<div class="alert alert-'.$key.'" role="alert">'.$message.'</div>';
            }
        }
        $form = $this->beginWidget('CActiveForm', array('id'=>'fichaForm', 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true)));
   
        echo $form->errorSummary($model, NULL, NULL, array("class" => "standard-error-summary")); 
    ?>
   
    <?= $form->hiddenField($model, 'titulo26') ?> 
        <div class="row">
            <div class="col-md-12">
                <?= $form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'col-md-12', ))?> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-3">
                <?= $form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'col-md-12', ))?> 
            </div>

            <div class="col-md-3">
                <?= $form->labelEx($model,'celular').$form->textField($model, 'celular', array('class' => 'col-md-12', ))?> 
            </div> 	
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <?= $form->labelEx($model,'endereco').$form->textField($model, 'endereco', array('class' => 'col-md-12', ))?> 
            </div>

            <div class="col-md-4">
                <?= $form->labelEx($model,'bairro').$form->textField($model, 'bairro', array('class' => 'col-md-12', ))?> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-5">
                <?= $form->labelEx($model,'uf').$form->dropDownList($model, 'uf', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado'))?> 
            </div>

            <div class="col-md-4">
                <?= $form->labelEx($model,'cidade').$form->textField($model, 'cidade', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-3">
                <?= $form->labelEx($model,'cep').$form->textField($model, 'cep', array('class' => 'col-md-12', ))?>             
            </div>
        </div>

        <div class="row">
            <h4 class="col-md-12">DADOS DO IMÓVEL</h4>
            <?= $form->hiddenField($model, 'titulo13')?> 
        </div>


        <div class="row">
            <div class="col-md-6">
                <?= $form->labelEx($model,'finalidade').$form->dropDownList($model, 'finalidade', Yii::app()->util->selectOpcao('finalidade'), array('class' => 'col-md-12', 'empty' =>'Escolha a Finalidade'))?> 
            </div>

            <div class="col-md-6">
                <?= $form->labelEx($model,'tipo').$form->dropDownList($model, 'tipo', Yii::app()->util->selectOpcao('tipobem'), array('class' => 'col-md-12', 'empty' =>'Escolha o Tipo do Imóvel'))?> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->labelEx($model,'area_util').$form->textField($model, 'area_util', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-3">
                <?= $form->labelEx($model,'area_total').$form->textField($model, 'area_total', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-2">
                <?= $form->labelEx($model,'dormitorio').$form->textField($model, 'dormitorio', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-2">
                <?= $form->labelEx($model,'garagem').$form->textField($model, 'garagem', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-2">
                <?= $form->labelEx($model,'valor').$form->textField($model, 'valor', array('class' => 'col-md-12', ))?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->labelEx($model,'im_endereco').$form->textField($model, 'im_endereco', array('class' => 'col-md-12', ))?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->labelEx($model,'im_estado').$form->dropDownList($model, 'im_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado'))?> 
            </div>

            <div class="col-md-4">
                <?= $form->labelEx($model,'im_cidade').$form->textField($model, 'im_cidade', array('class' => 'col-md-12', ))?> 
            </div>
            <div class="col-md-4">
                <?= $form->labelEx($model,'im_bairro').$form->textField($model, 'im_bairro', array('class' => 'col-md-12', ))?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->labelEx($model,'informacoes').$form->textArea($model, 'informacoes', array('class' => 'col-md-12', ))?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->labelEx($model,'como_chegou').'<br/>'.Yii::app()->util->criaRadioButton($form, $model, Yii::app()->util->selectOpcao('comochegou'))?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->labelEx($model,'comentario').$form->textArea($model, 'comentario', array('class' => 'col-md-12', ))?>
            </div>
        </div>

        <div class="row text-center" style="margin-bottom:50px">
            <?= CHtml::submitButton('Enviar dados para imobiliária', array('class' => 'btn btn-primary'))?>
        </div>
    <?php    
        $this->endWidget();
    ?>
</div>

<?php $this->renderPartial('/system/m_sidebar'); ?>
</div>
