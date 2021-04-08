<?php //$this->breadcrumbs= $breadcrumbs; ,
//$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>

<div id="formulario" class="row">
<div class="col-md-9 contato">
    
    <?php if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Cadastro de Ficha para Pessoa Jurídica</h1>
    
    <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo '<div class="alert alert-'.$key.'" role="alert">'.$message.'</div>';
            }
        }

        $form = $this->beginWidget('CActiveForm', array('id'=>'fichaForm', 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true)));

        echo $form->errorSummary($model, NULL, NULL, array("class" => "standard-error-summary"));

        echo '
            '.$form->hiddenField($model, 'titulo8').'
            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'cadastro').$form->dropDownList($model, 'cadastro', Yii::app()->util->selectOpcao('tipoCadastro'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>
                <div class="col-md-4">
                    '.$form->labelEx($model,'imovel_pretendido').$form->dropDownList($model, 'imovel_pretendido', Yii::app()->util->selectOpcao('imovel'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>
                <div class="col-md-4">'
                    .$form->labelEx($model,'finalidade').$form->dropDownList($model, 'finalidade', Yii::app()->util->selectOpcao('finalidade'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'valor_aluguel').$form->textField($model, 'valor_aluguel', array('class' => 'col-md-12')).'
                </div>
                <div class="col-md-4">'
                    .$form->labelEx($model,'condominio_aprox').$form->textField($model, 'condominio_aprox', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">'
                    .$form->labelEx($model,'sera_montado').$form->textField($model, 'sera_montado', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">INFORMAÇÕES</h4>
                '.$form->hiddenField($model, 'titulo9').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'pj_razao_social').$form->textField($model, 'pj_razao_social', array('class' => 'col-md-12', )).'
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'pj_nome_fantasia').$form->textField($model, 'pj_nome_fantasia', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    '.$form->labelEx($model,'pj_email').$form->textField($model, 'pj_email', array('class' => 'col-md-12', )).'
                </div>
                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_telefone').$form->textField($model, 'pj_telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_fax').$form->textField($model, 'pj_fax', array('class' => 'col-md-12', )).'
                </div>
            </div>
            
            <div class="row">

                <div class="col-md-8">
                    '.$form->labelEx($model,'pj_endereco').$form->textField($model, 'pj_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'pj_bairro').$form->textField($model, 'pj_bairro', array('class' => 'col-md-12', )).'
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-5">
                    '.$form->labelEx($model,'pj_uf').$form->dropDownList($model, 'pj_uf', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'pj_cidade').$form->textField($model, 'pj_cidade', array('class' => 'col-md-12', )).'
                </div>
                
                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_cep').$form->textField($model, 'pj_cep', array('class' => 'col-md-12', )).'
                </div>
                
            </div>


            <div class="row">

                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_cnpj').$form->textField($model, 'pj_cnpj', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_inscricao_estadual').$form->textField($model, 'pj_inscricao_estadual', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_inscricao_municipal').$form->textField($model, 'pj_inscricao_municipal', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'pj_data_constituicao').$form->textField($model, 'pj_data_constituicao', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">DADOS DO SÓCIO 1</h4>
                '.$form->hiddenField($model, 'titulo10').'
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'s1_nome').$form->textField($model, 's1_nome', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'s1_email').$form->textField($model, 's1_email', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'s1_endereco').$form->textField($model, 's1_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'s1_bairro').$form->textField($model, 's1_bairro', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    '.$form->labelEx($model,'s1_estado').$form->dropDownList($model, 's1_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>
                <div class="col-md-4">
                    '.$form->labelEx($model,'s1_cidade').$form->textField($model, 's1_cidade', array('class' => 'col-md-12', )).'
                </div>
                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_cep').$form->textField($model, 's1_cep', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_telefone').$form->textField($model, 's1_telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_celular').$form->textField($model, 's1_celular', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_cpf').$form->textField($model, 's1_cpf', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_rg').$form->textField($model, 's1_rg', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_estado_civil').$form->dropDownList($model, 's1_estado_civil', Yii::app()->util->selectOpcao('civil'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_data_nascimento').$form->textField($model, 's1_data_nascimento', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_naturalidade').$form->textField($model, 's1_naturalidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_nacionalidade').$form->textField($model, 's1_nacionalidade', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_profissao').$form->textField($model, 's1_profissao', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'s1_tempo_servico').$form->textField($model, 's1_tempo_servico', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_salario').$form->textField($model, 's1_salario', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_outra_renda').$form->dropDownList($model, 's1_outra_renda', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'s1_quais').$form->textField($model, 's1_quais', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s1_valor').$form->textField($model, 's1_valor', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'s1_imovel').$form->dropDownList($model, 's1_imovel', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-8">
                    '.$form->labelEx($model,'s1_onde').$form->textField($model, 's1_onde', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">DADOS DO SÓCIO 2</h4>
                '.$form->hiddenField($model, 'titulo11').'
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'s2_nome').$form->textField($model, 's2_nome', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'s2_email').$form->textField($model, 's2_email', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'s2_endereco').$form->textField($model, 's2_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'s2_bairro').$form->textField($model, 's2_bairro', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    '.$form->labelEx($model,'s2_estado').$form->dropDownList($model, 's2_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>
                <div class="col-md-4">
                    '.$form->labelEx($model,'s2_cidade').$form->textField($model, 's2_cidade', array('class' => 'col-md-12', )).'
                </div>
                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_cep').$form->textField($model, 's2_cep', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_telefone').$form->textField($model, 's2_telefone', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_celular').$form->textField($model, 's2_celular', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_cpf').$form->textField($model, 's2_cpf', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_rg').$form->textField($model, 's2_rg', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_estado_civil').$form->dropDownList($model, 's2_estado_civil', Yii::app()->util->selectOpcao('civil'), array('class' => 'col-md-12', 'empty' => 'Selecione uma opção')).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_data_nascimento').$form->textField($model, 's2_data_nascimento', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_naturalidade').$form->textField($model, 's2_naturalidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_nacionalidade').$form->textField($model, 's2_nacionalidade', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_profissao').$form->textField($model, 's2_profissao', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'s2_tempo_servico').$form->textField($model, 's2_tempo_servico', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_salario').$form->textField($model, 's2_salario', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_outra_renda').$form->dropDownList($model, 's2_outra_renda', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-6">
                    '.$form->labelEx($model,'s2_quais').$form->textField($model, 's2_quais', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-3">
                    '.$form->labelEx($model,'s2_valor').$form->textField($model, 's2_valor', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    '.$form->labelEx($model,'s2_imovel').$form->dropDownList($model, 's2_imovel', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
                </div>

                <div class="col-md-8">
                    '.$form->labelEx($model,'s2_onde').$form->textField($model, 's2_onde', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">DADOS PROFISSIONAIS</h4>
                '.$form->hiddenField($model, 'titulo3').'
            </div>

            <div class="row">
                <div class="col-md-12">
                    '.$form->labelEx($model,'empresa').$form->textField($model, 'empresa', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    '.$form->labelEx($model,'empresa_endereco').$form->textField($model, 'empresa_endereco', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
                    '.$form->labelEx($model,'empresa_bairro').$form->textField($model, 'empresa_bairro', array('class' => 'col-md-12', )).'
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    '.$form->labelEx($model,'empresa_cidade').$form->textField($model, 'empresa_cidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-4">
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
                <h4 class="col-md-12">REFERÊNCIA COMERCIAL</h4>
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
                <h4 class="col-md-12">REFERÊNCIA BANCÁRIA</h4>
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
                <div class="col-md-7">
                    '.$form->labelEx($model,'refban_cidade').$form->textField($model, 'refban_cidade', array('class' => 'col-md-12', )).'
                </div>

                <div class="col-md-5">
                    '.$form->labelEx($model,'refban_estado').$form->dropDownList($model, 'refban_estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado')).'
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
