<style type="text/css">
    select {padding:0 !important;}
</style>

<?php //$this->breadcrumbs= $breadcrumbs; ,
//$this->setPageTitle($breadcrumbs[0] . ' | '.Yii::app()->params['Imobiliaria']);
?>

<div id="formulario" class="row">
    <div class="col-md-9 contato">

        <?php if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>

        <h1 class="titulo-interno">Cadastro de Imoveis</h1>

        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo '<div class="alert alert-'.$key.'" role="alert">'.$message.'</div>';
            }
        }

        $form = $this->beginWidget('CActiveForm', array('id'=>'fichaForm', 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true)));

        echo $form->errorSummary($model, 'Verifique os seguintes campos antes de enviar a ficha.', NULL, array("class" => "standard-error-summary"));

        echo $form->hiddenField($model, 'titulo12');
        ?>
            <div class="row">
                <div class="col-md-12">
                    <?=$form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?=$form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'col-md-12', ))?>
                </div>

                <div class="col-md-3">
                    <?=$form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'col-md-12', ))?>
                </div>

                <div class="col-md-3">
                    <?=$form->labelEx($model,'celular').$form->textField($model, 'celular', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <?=$form->labelEx($model,'endereco').$form->textField($model, 'endereco', array('class' => 'col-md-12', ))?>
                </div>

                <div class="col-md-4">
                    <?=$form->labelEx($model,'bairro').$form->textField($model, 'bairro', array('class' => 'col-md-12', ))?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-5">
                    <?=$form->labelEx($model,'estado').$form->dropDownList($model, 'estado', Yii::app()->util->selectOpcao('estados'), array('class' => 'col-md-12', 'empty' =>'Selecione um estado'))?>
                </div>

                <div class="col-md-4">
                    <?=$form->labelEx($model,'cidade').$form->textField($model, 'cidade', array('class' => 'col-md-12', ))?>
                </div>

                <div class="col-md-3">
                    <?=$form->labelEx($model,'cep').$form->textField($model, 'cep', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">DADOS DO IMÓVEL</h4>
                <?=$form->hiddenField($model, 'titulo13')?>
            </div>

            <div class="row checkboxFix">
                <div class="col-md-2">
                    <?=$form->labelEx($model,'locacao').$form->checkBox($model,'locacao',array('value'=>'Sim','uncheckValue'=>''))?>
                </div>
            </div>

            <div class="row" id="checklocacao">
                <div class="col-md-4">
                    <?=$form->labelEx($model,'valor_aluguel').$form->textField($model, 'valor_aluguel', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-4">
                    <?=$form->labelEx($model,'valor_iptu_mes').$form->textField($model, 'valor_iptu_mes', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-4">
                    <?=$form->labelEx($model,'iptu').$form->dropDownList($model, 'iptu', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
            </div>

            <div class="row checkboxFix">
                <div class="col-md-2">
                    <?=$form->labelEx($model,'venda').$form->checkBox($model,'venda',array('value'=>'Sim','uncheckValue'=>''))?>
                </div>
            </div>

            <div class="row" class="checkvenda">
                <div class="col-md-4">
                    <?=$form->labelEx($model,'venda_valor').$form->textField($model, 'venda_valor', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-4">
                    <?=$form->labelEx($model,'comissao_venda').$form->textField($model, 'comissao_venda', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-4">
                    <?=$form->labelEx($model,'valor_condominio').$form->textField($model, 'valor_condominio', array('class' => 'col-md-12', ))?>
                </div>
            </div>
            <div class="row" class="checkvenda">
                <div class="col-md-6">
                    <?=$form->labelEx($model,'taxa_locacao_1_aluguel').$form->textField($model, 'taxa_locacao_1_aluguel', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-6">
                    <?=$form->labelEx($model,'taxa_adm_percentual').$form->textField($model, 'taxa_adm_percentual', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 fichaSub"><strong>Prazo de Vigência</strong></div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?=$form->labelEx($model,'prazo_de').$form->textField($model, 'prazo_de', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-6">
                    <?=$form->labelEx($model,'prazo_ate').$form->textField($model, 'prazo_ate', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row">
                <h4 class="col-md-12">AVALIAÇÃO DO IMÓVEL</h4>
                <?=$form->hiddenField($model, 'titulo14')?>
            </div>

            <div class="row">
                <div class="col-md-12 fichaSub"><strong>Terreno:</strong></div>
                <?=$form->hiddenField($model, 'titulo15')?>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <?=$form->labelEx($model,'area_total').$form->textField($model, 'area_total', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-4">
                    <?=$form->labelEx($model,'medidas').$form->textField($model, 'medidas', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-3">
                    <?=$form->labelEx($model,'terreno').$form->dropDownList($model, 'terreno', Yii::app()->util->selectOpcao('terreno'), array('class' => 'col-md-12', 'empty' =>'Selecione uma opção'))?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 fichaSub"><strong>Casa / Apartamento:</strong></div>
                <?=$form->hiddenField($model, 'titulo16')?>
            </div>


            <div class="row">
                <div class="col-md-3">
                    <?=$form->labelEx($model,'area_construida').$form->textField($model, 'area_construida', array('class' => 'col-md-12', ))?>
                </div>
                <div class="col-md-3">
                    <?=$form->labelEx($model,'tipo_construcao').$form->dropDownList($model, 'tipo_construcao', Yii::app()->util->selectOpcao('construcao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'cobertura').$form->dropDownList($model, 'cobertura', Yii::app()->util->selectOpcao('cobertura'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'portao_eletrico', array('style' => 'letter-spacing:-1px')).$form->dropDownList($model, 'portao_eletrico', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'esgoto').$form->dropDownList($model, 'esgoto', Yii::app()->util->selectOpcao('esgoto'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>                
            </div>

            <div class="row"> 
                <div class="col-md-3">
                    <?=$form->labelEx($model,'acabamento_gesso').$form->dropDownList($model, 'acabamento_gesso', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-3">
                    <?=$form->labelEx($model,'aquecimento_gas').$form->dropDownList($model, 'aquecimento_gas', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'elevador').$form->dropDownList($model, 'elevador', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'churrasqueira').$form->dropDownList($model, 'churrasqueira', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
                <div class="col-md-2">
                    <?=$form->labelEx($model,'piscina').$form->dropDownList($model, 'piscina', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="well marginTop">
                        </br>
                        <?php
                        foreach(Yii::app()->params['textoFichaImovel'] as $aSeq => $aTexto) {
                            echo '<p>' . $aSeq .  '. ' . $aTexto . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Quartos:</div>
                        <?=$form->hiddenField($model, 'titulo17')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'quarto').$form->dropDownList($model, 'quarto', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'quarto_piso').$form->dropDownList($model, 'quarto_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'quarto_armario').$form->dropDownList($model, 'quarto_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'quarto_porta').$form->dropDownList($model, 'quarto_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'quarto_janela').$form->dropDownList($model, 'quarto_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'quarto_outro').$form->textField($model, 'quarto_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Suítes:</div>
                        <?=$form->hiddenField($model, 'titulo18')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'suite').$form->dropDownList($model, 'suite', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'suite_piso').$form->dropDownList($model, 'suite_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'suite_armario').$form->dropDownList($model, 'suite_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'suite_porta').$form->dropDownList($model, 'suite_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'suite_janela').$form->dropDownList($model, 'suite_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'suite_outro').$form->textField($model, 'suite_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Banheiros:</div>
                        <?=$form->hiddenField($model, 'titulo19')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'banheiro').$form->dropDownList($model, 'banheiro', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'banheiro_piso').$form->dropDownList($model, 'banheiro_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'banheiro_armario').$form->dropDownList($model, 'banheiro_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'banheiro_porta').$form->dropDownList($model, 'banheiro_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'banheiro_janela').$form->dropDownList($model, 'banheiro_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'banheiro_outro').$form->textField($model, 'banheiro_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sala:</div>
                        <?=$form->hiddenField($model, 'titulo20')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'sala').$form->dropDownList($model, 'sala', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'sala_piso').$form->dropDownList($model, 'sala_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'sala_armario').$form->dropDownList($model, 'sala_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'sala_porta').$form->dropDownList($model, 'sala_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'sala_janela').$form->dropDownList($model, 'sala_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'sala_outro').$form->textField($model, 'sala_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cozinha:</div>
                        <?=$form->hiddenField($model, 'titulo21')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'cozinha').$form->dropDownList($model, 'cozinha', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'cozinha_piso').$form->dropDownList($model, 'cozinha_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'cozinha_armario').$form->dropDownList($model, 'cozinha_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'cozinha_porta').$form->dropDownList($model, 'cozinha_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'cozinha_janela').$form->dropDownList($model, 'cozinha_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'cozinha_outro').$form->textField($model, 'cozinha_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Lavanderia:</div>
                        <?=$form->hiddenField($model, 'titulo22')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'lavanderia').$form->dropDownList($model, 'lavanderia', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'lavanderia_piso').$form->dropDownList($model, 'lavanderia_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'lavanderia_armario').$form->dropDownList($model, 'lavanderia_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'lavanderia_porta').$form->dropDownList($model, 'lavanderia_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'lavanderia_janela').$form->dropDownList($model, 'lavanderia_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'lavanderia_outro').$form->textField($model, 'lavanderia_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Departamento Empregada:</div>
                        <?=$form->hiddenField($model, 'titulo23')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'dempregada').$form->dropDownList($model, 'dempregada', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'dempregada_piso').$form->dropDownList($model, 'dempregada_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'dempregada_armario').$form->dropDownList($model, 'dempregada_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'dempregada_porta').$form->dropDownList($model, 'dempregada_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'dempregada_janela').$form->dropDownList($model, 'dempregada_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'dempregada_outro').$form->textField($model, 'dempregada_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edícula:</div>
                        <?=$form->hiddenField($model, 'titulo24')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'edicula').$form->dropDownList($model, 'edicula', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'edicula_piso').$form->dropDownList($model, 'edicula_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'edicula_armario').$form->dropDownList($model, 'edicula_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'edicula_porta').$form->dropDownList($model, 'edicula_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'edicula_janela').$form->dropDownList($model, 'edicula_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'edicula_outro').$form->textField($model, 'edicula_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Garagem:</div>
                        <?=$form->hiddenField($model, 'titulo25')?>
                        <div class="row panel-body">
                            <div class="col-md-1">
                                <?=$form->labelEx($model,'garagem').$form->dropDownList($model, 'garagem', Yii::app()->util->selectOpcao(5), array('class' => 'col-md-12 selNumeric', 'empty' =>'0'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'garagem_piso').$form->dropDownList($model, 'garagem_piso', Yii::app()->util->selectOpcao('piso'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'garagem_armario').$form->dropDownList($model, 'garagem_armario', Yii::app()->util->selectOpcao('simnao'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'garagem_porta').$form->dropDownList($model, 'garagem_porta', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-2">
                                <?=$form->labelEx($model,'garagem_janela').$form->dropDownList($model, 'garagem_janela', Yii::app()->util->selectOpcao('portajanela'), array('class' => 'col-md-12', 'empty' =>'Selecione'))?>
                            </div>
                            <div class="col-md-3">
                                <?=$form->labelEx($model,'garagem_outro').$form->textField($model, 'garagem_outro', array('class' => 'col-md-12', ))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?=$form->labelEx($model,'observacao').$form->textArea($model, 'observacao', array('class' => 'col-md-12', ))?>
                </div>
            </div>

            <div class="row center">
                <?= CHtml::submitButton('Enviar dados para imobiliária', array('class' => 'btn btn-primary'))?>
            </div>
        <?php
            $this->endWidget();
        ?>
    </div>

    <?php $this->renderPartial('/system/m_sidebar'); ?>
</div>
