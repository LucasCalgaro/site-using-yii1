<? //$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>

<div class="row">
<div class="col-md-9 contato">
    
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Cadastro de Ficha para Pessoa Física</h1>
    
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
            '.$form->hiddenField($model, 'titulo1').'
            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'cadastro').$form->dropDownList($model, 'cadastro', Yii::app()->util->selectOpcao('tipoCadastro'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    '.$form->labelEx($model,'imovel_pretendido').$form->dropDownList($model, 'imovel_pretendido', Yii::app()->util->selectOpcao('imovel'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'valor_aluguel').$form->textField($model, 'valor_aluguel', array('class' => 'col-md-12')).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">'
                    .$form->labelEx($model,'finalidade').$form->dropDownList($model, 'finalidade', Yii::app()->util->selectOpcao('finalidade'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-4">'
                    .$form->labelEx($model,'condominio_aprox').$form->textField($model, 'condominio_aprox', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">'
                    .$form->labelEx($model,'sera_montado').$form->textField($model, 'sera_montado', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">DADOS PESSOAIS</h2>
                '.$form->hiddenField($model, 'titulo2').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'celular').$form->textField($model, 'celular', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'col-md-12', )).'
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'uf').$form->dropDownList($model, 'uf', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-5">
                    '.$form->labelEx($model,'cidade').$form->textField($model, 'cidade', array('class' => 'col-md-12', )).'
                </div>

            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'endereco').$form->textField($model, 'endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-2">
                    '.$form->labelEx($model,'bairro').$form->textField($model, 'bairro', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-2">
                    '.$form->labelEx($model,'cep').$form->textField($model, 'cep', array('class' => 'col-md-12', )).'
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'cpf').$form->textField($model, 'cpf', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'rg').$form->textField($model, 'rg', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'data_nascimento').$form->textField($model, 'data_nascimento', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'estado_civil').$form->textField($model, 'estado_civil', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    '.$form->labelEx($model,'naturalidade').$form->textField($model, 'naturalidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'nacionalidade').$form->textField($model, 'nacionalidade', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'possui_imovel').$form->textField($model, 'possui_imovel', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-8">
                    '.$form->labelEx($model,'onde').$form->textField($model, 'onde', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    '.$form->labelEx($model,'alugou_imob_part').$form->textField($model, 'alugou_imob_part', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'imobiliaria').$form->textField($model, 'imobiliaria', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">DADOS PROFISSIONAIS</h2>
                '.$form->hiddenField($model, 'titulo3').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'empresa').$form->textField($model, 'empresa', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    '.$form->labelEx($model,'empresa_endereco').$form->textField($model, 'empresa_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-5">
                    '.$form->labelEx($model,'empresa_bairro').$form->textField($model, 'empresa_bairro', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    '.$form->labelEx($model,'empresa_cidade').$form->textField($model, 'empresa_cidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_estado').$form->dropDownList($model, 'empresa_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_cep').$form->textField($model, 'empresa_cep', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_telefone').$form->textField($model, 'empresa_telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_profissao').$form->textField($model, 'empresa_profissao', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_salario').$form->textField($model, 'empresa_salario', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_tempo_servico').$form->textField($model, 'empresa_tempo_servico', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_outra_renda').$form->dropDownList($model, 'empresa_outra_renda', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'empresa_quais').$form->textField($model, 'empresa_quais', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'empresa_valor').$form->textField($model, 'empresa_valor', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">DADOS CONJUGE</h2>
                '.$form->hiddenField($model, 'titulo4').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'conjuge_nome').$form->textField($model, 'conjuge_nome', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    '.$form->labelEx($model,'conjuge_endereco').$form->textField($model, 'conjuge_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_telefone').$form->textField($model, 'conjuge_telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_data_nascimento').$form->textField($model, 'conjuge_data_nascimento', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_empresa').$form->textField($model, 'conjuge_empresa', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_profissao').$form->textField($model, 'conjuge_profissao', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_tempo_servico').$form->textField($model, 'conjuge_tempo_servico', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'conjuge_salario').$form->textField($model, 'conjuge_salario', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">REFERÊNCIA COMERCIAL</h2>
                '.$form->hiddenField($model, 'titulo5').'
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'refcom_nome1').$form->textField($model, 'refcom_nome1', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'refcom_fone1').$form->textField($model, 'refcom_fone1', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'refcom_nome2').$form->textField($model, 'refcom_nome2', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'refcom_fone2').$form->textField($model, 'refcom_fone2', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">REFERÊNCIA BANCÁRIA</h2>
                '.$form->hiddenField($model, 'titulo6').'
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'refban_banco').$form->textField($model, 'refban_banco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'refban_fone').$form->textField($model, 'refban_fone', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    '.$form->labelEx($model,'refban_desde').$form->textField($model, 'refban_desde', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-5">
                    '.$form->labelEx($model,'refban_conta').$form->textField($model, 'refban_conta', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-5">
                    '.$form->labelEx($model,'refban_agencia').$form->textField($model, 'refban_agencia', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    '.$form->labelEx($model,'refban_cidade').$form->textField($model, 'refban_cidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'refban_estado').$form->dropDownList($model, 'refban_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>
            </div>

            <div class="row">
                <h2 class="col-md-12">PESSOAS QUE RESIDIRÃO NO IMÓVEL</h2>
                '.$form->hiddenField($model, 'titulo7').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'pesres_nome1').$form->textField($model, 'pesres_nome1', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-12">
                    '.$form->labelEx($model,'pesres_nome2').$form->textField($model, 'pesres_nome2', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-12">
                    '.$form->labelEx($model,'pesres_nome3').$form->textField($model, 'pesres_nome3', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-12">
                    '.$form->labelEx($model,'pesres_nome4').$form->textField($model, 'pesres_nome4', array('class' => 'col-md-12', )).'
                </div>
            </div>


            <div class="row text-center" style="margin-bottom:50px;">
                '.CHtml::submitButton('Enviar dados para imobiliária', array('class' => 'btn btn-primary')).'
            </div>';

            $this->endWidget();
    ?>
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
</div>
