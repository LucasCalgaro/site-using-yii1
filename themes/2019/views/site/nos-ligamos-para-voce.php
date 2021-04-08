<? //$this->breadcrumbs= $breadcrumbs; ?>

<div class="col-md-9 contato">
    
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Nós Ligamos Para Você</h1>
    
    <?
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo '<div class="alert alert-'.$key.'" role="alert">'.$message.'</div>';
            }
        }
        
        $form = $this->beginWidget('CActiveForm', array('id'=>'fichaForm', 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true)));
	
        echo $form->errorSummary($model, NULL, NULL, array("class" => "standard-error-summary"));
        
        echo '
        '.$form->hiddenField($model, 'titulo27').'
		<div class="row">
			<div class="col-md-4">
				'.$form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'col-md-12', )).'
			</div>

			<div class="col-md-4">
				'.$form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'col-md-12', )).'
			</div>

			<div class="col-md-4">
				'.$form->labelEx($model,'horario').$form->textField($model, 'horario', array('class' => 'col-md-12', )).'
			</div>
			
		</div>
		
		<div class="row text-center" style="margin-bottom:50px">
			'.CHtml::submitButton('Enviar dados para imobiliária', array('class' => 'btn btn-primary')).'
		</div>';

        
        $this->endWidget();
    ?>
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
