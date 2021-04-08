<?php
$aArrayCampos = array();
$nContaCampoTalvez = 0;
foreach($this->tableSchema->columns as $column) {
    if($column->name == 'nStatus') {
        // acabaram
        break;
    }
    if($column->autoIncrement
    || $column->name == 'nIdFilial') {
        // campo ignorado
        continue;
    }
    
    if($nContaCampoTalvez >= (($nNroAba-1)*$nQtdCampos) ) {
        $aArrayCampos[] = $column;
        if(count($aArrayCampos) >= $nQtdCampos) {
            // ja tenho o que preciso
            break;
        }
    }
    else {
        $nContaCampoTalvez++;
    }
}
        
?>
<?php echo '<?php echo scUtil::getAbreForm($this); ?>'; ?>

    <?php echo '<?php echo scUtil::getAbreCorpoDoForm($this); ?>'; ?>

    <?php
$nConta=0;
foreach($aArrayCampos as $column) {
    if($nConta == 0 //$nIdx == $nIdxCampoInicial
    || $nConta == count($aArrayCampos)/2) {
        // cria coluna
        if($nConta != 0) { //$nIdx != $nIdxCampoInicial) {
            // fecha coluna da esquerca ?>
    </div> <!-- span-6 Fecha -->
    
    <?php
        }?>
<div  class="col-md-6"> <!-- col-md-6 Abre -->
<?php
    }
?>
        <div class="row"> <!-- row campo (<?=$column->name?>) Abre -->
            <div  class="col-md-12"> <!-- col-md-12 Abre -->
		<?php echo "    <?php ";
                      if(strstr($column->name, 'IdTabCidade')
                      || strstr($column->name, 'IdTabNatur') ) {
                            echo "echo \$this->widget('ScAutoCompleteInsertNew',\n" .
                                        "\t\t\t\t\t\t\t\tarray(\n" .
                                        "\t\t\t\t\t\t\t\t\t'model' => \$model,\n" .
                                        "\t\t\t\t\t\t\t\t\t'id' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'attribute' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'name' => '$column->name', \n" .
                                        "\t\t\t\t\t\t\t\t\t'source'=>\$this->createUrl('baseTabCidade/pegaCidadesPorPrefixo'),\n" .
                                        "\t\t\t\t\t\t\t\t\t//'largura' => '9', \n" .
                                        "\t\t\t\t\t\t\t\t\t//'prepend' => '<i class=\"fa fa-map\"></i>',\n" . 
                                        "\t\t\t\t\t\t\t\t\t// para inclusao\n" .
                                        "\t\t\t\t\t\t\t\t\t'urlFormInclusao' => 'baseTabCidade/create',\n" .
                                        "\t\t\t\t\t\t\t\t\t'dialogName' => \"fancy-link-cidade\",\n" .
                                        "\t\t\t\t\t\t\t\t),\n" .
                                        "\t\t\t\t\t\t\t\ttrue\n" .
                                        "\t\t\t\t\t\t\t);\n";
                      }
                      else
                      if(strstr($column->name, 'IdTabProfis') ) {
                            echo "echo \$this->widget('ScAutoCompleteInsertNew',\n" .
                                        "\t\t\t\t\t\t\t\tarray(\n" .
                                        "\t\t\t\t\t\t\t\t\t'model' => \$model,\n" .
                                        "\t\t\t\t\t\t\t\t\t'id' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'attribute' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'name' => '$column->name', \n" .
                                        "\t\t\t\t\t\t\t\t\t'source'=>\$this->createUrl('tabProfissao/pegaProfissaoPorPrefixo'),\n" .
                                        "\t\t\t\t\t\t\t\t\t//'largura' => '9', \n" .
                                        "\t\t\t\t\t\t\t\t\t//'prepend' => '<i class=\"fa fa-exchange\"></i>',\n" . 
                                        "\t\t\t\t\t\t\t\t\t// para inclusao\n" .
                                        "\t\t\t\t\t\t\t\t\t'urlFormInclusao' => 'tabProfissao/create',\n" .
                                        "\t\t\t\t\t\t\t\t\t'dialogName' => \"fancy-link-profissao\",\n" .
                                        "\t\t\t\t\t\t\t\t),\n" .
                                        "\t\t\t\t\t\t\t\ttrue\n" .
                                        "\t\t\t\t\t\t\t);\n";
                      }
                      else
                      if(strstr($column->name, 'IdTabNacio') ) {
                            echo "echo \$this->widget('ScAutoCompleteInsertNew',\n" .
                                        "\t\t\t\t\t\t\t\tarray(\n" .
                                        "\t\t\t\t\t\t\t\t\t'model' => \$model,\n" .
                                        "\t\t\t\t\t\t\t\t\t'id' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'attribute' => '$column->name',\n" . 
                                        "\t\t\t\t\t\t\t\t\t'name' => '$column->name', \n" .
                                        "\t\t\t\t\t\t\t\t\t'source'=>\$this->createUrl('tabNacionalidade/pegaNacionalidadePorPrefixo'),\n" .
                                        "\t\t\t\t\t\t\t\t\t//'largura' => '9', \n" .
                                        "\t\t\t\t\t\t\t\t\t//'prepend' => '<i class=\"fa fa-flag\"></i>',\n" . 
                                        "\t\t\t\t\t\t\t\t\t// para inclusao\n" .
                                        "\t\t\t\t\t\t\t\t\t'urlFormInclusao' => 'tabNacionalidade/create',\n" .
                                        "\t\t\t\t\t\t\t\t\t'dialogName' => \"fancy-link-nacionalidade\",\n" .
                                        "\t\t\t\t\t\t\t\t),\n" .
                                        "\t\t\t\t\t\t\t\ttrue\n" .
                                        "\t\t\t\t\t\t\t);\n";
                      }
                      else
                      if($column->dbType == 'date'
                      || $column->dbType == 'datetime')
                          /*
  		        echo "                      echo \$form->widget('zii.widgets.jui.CJuiDatePicker',array(\n" .
                                        "\t\t\t\t\t'model' => \$model,\n" .
                                        "\t\t\t\t\t'attribute' => '$column->name',\n" .
                                        "\t\t\t\t\t'language' => 'pt-BR',\n" .
                                        "\t\t\t\t\t'options'=>array('showAnim'=>'slide',\n" .
                                        "\t\t\t\t\t\t\t'changeMonth' => 'true',\n" .
                                        "\t\t\t\t\t\t\t'changeYear' => 'true',\n" .
                                        "\t\t\t\t\t),\n" .
                                        "\t\t\t\t\t'htmlOptions'=>array('style'=>'height:20px;'),\n" .
                                        "\t\t\t\t), true); \n";
                            */
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-calendar\"></i>',\n"
. "                                                     //'largura' => '7', \n"
. "                                                     'data-tipo' => 'data', \n"
. "                                                     'style' => 'height:30px;max-width:160px !important; min-width:160px !important', \n"
. "                                                 ) \n"
. "                                             );";
                      else
                      if(strstr($column->dbType, "decimal") != false) {
                            // moeda ou percentual ??
                            if($column->dbType == "decimal(8,3)") {
                                // area
                                echo "echo scUtil::getLegendaCampo(\$form, \n"
    . "                                                 \$model, \n"
    . "                                                 '$column->name', \n"
    . "                                                 array('id'=>'$column->name',\n"
    . "                                                     'prepend' => 'm2', \n"
    . "                                                     'data-tipo' => 'medida', \n" 
    . "                                                     'data-reverso' => 'true', \n" 
    . "                                                     'data-formato' => '00000000.00', \n" 
    . "                                                     //'data-prefixo'=> '%', \n" 
    . "                                                     //'largura' => '6', \n"
    . "                                                 ) \n"
    . "                                             );";
                                /*
                                echo "\t\t\t\t  echo \$form->textFieldGroup(\$model, "
                                . "\t\t\t\t                         '$column->name', "
                                . "\t\t\t\t                         array('id'=>'$column->name', "
                                . "\t\t\t\t                               'data-tipo' => 'medida', "
                                . "\t\t\t\t                               'data-prefixo'=> 'm2') ); \n"; 
                                */
                            }
                            else
                            if($column->dbType == "decimal(12,2)") {
                                // moeda
                                //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'dinheiro') ); \n"; 
                                echo "echo scUtil::getLegendaCampo(\$form, \n"
    . "                                                 \$model, \n"
    . "                                                 '$column->name', \n"
    . "                                                 array('id'=>'$column->name',\n"
    . "                                                     'prepend' => 'R$', \n"
    . "                                                     'data-tipo' => 'dinheiro', \n" 
    . "                                                     //'largura' => '6', \n"
    . "                                                 ) \n"
    . "                                             );";
                            }
                            else {
                                // percentual
                                //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'medida', 'data-prefixo'=> '%') ); \n"; 
                                echo "echo scUtil::getLegendaCampo(\$form, \n"
    . "                                                 \$model, \n"
    . "                                                 '$column->name', \n"
    . "                                                 array('id'=>'$column->name',\n"
    . "                                                     'prepend' => '%', \n"
    . "                                                     'data-tipo' => 'medida', \n" 
    . "                                                     'data-reverso' => 'true', \n" 
    . "                                                     'data-formato' => '000.000', \n" 
    . "                                                     //'data-prefixo'=> '%', \n" 
    . "                                                     //'largura' => '4', \n"
    . "                                                 ) \n"
    . "                                             );";
                            }
                      }
                      else
                      if(stristr($column->name, 'CPF') 
                      || stristr($column->name, 'CIC') ) {
                        if(stristr($column->name, 'CNPJ')  
                        || stristr($column->name, 'CIC') ) {
                                echo "echo scUtil::getLegendaCampo(\$form, \n"
    . "                                                 \$model, \n"
    . "                                                 '$column->name', \n"
    . "                                                 array('id'=>'$column->name',\n"
    . "                                                     'prepend' => '<i class=\"fa fa-key\"></i>',\n"
    . "                                                     'data-tipo' => 'cpf_cnpj', \n" 
    . "                                                     //'largura' => '8', \n"
    . "                                                 ) \n"
    . "                                             );";
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cpf_cnpj') ); \n"; 
                        }
                        else {
                                echo "echo scUtil::getLegendaCampo(\$form, \n"
    . "                                                 \$model, \n"
    . "                                                 '$column->name', \n"
    . "                                                 array('id'=>'$column->name',\n"
    . "                                                     'prepend' => '<i class=\"fa fa-key\"></i>',\n"
    . "                                                     'data-tipo' => 'cpf', \n" 
    . "                                                     //'largura' => '7', \n"
    . "                                                 ) \n"
    . "                                             );";
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cpf') ); \n"; 
                        }
                      }
                      else
                      if(stristr($column->name, 'CNPJ') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-key\"></i>',\n"
. "                                                     'data-tipo' => 'cnpj', \n" 
. "                                                     //'largura' => '6', \n"
. "                                                 ) \n"
. "                                             );";
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cnpj') ); \n"; 
                      }
                      else
                      if(strstr($column->name, 'CEP') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-key\"></i>',\n"
. "                                                     //'largura' => '7', \n"
. "                                                     'data-tipo' => 'cep', \n" 
. "                                                 ) \n"
. "                                             );";
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cep') ); \n"; 
                      }
                      else
                      if(stristr($column->name, 'RG') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'N', \n"
. "                                                     //'largura' => '8', \n"
. "                                                     //'data-tipo' => 'N', \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'EMAIL') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-inbox\"></i>', \n"
. "                                                     //'data-tipo' => 'email', \n" 
. "                                                     //'largura' => '12', \n"
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'TIPOPESS') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'N', \n"
. "                                                     'data-tipo' => 'select', \n" 
. "                                                     'data' => \$model->aTipoPessoa, \n" 
. "                                                     //'largura' => '8', \n"
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'ESTADOCIV') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'N', \n"
. "                                                     'data-tipo' => 'select', \n" 
. "                                                     'data' => \$model->aEstadoCivil, \n" 
. "                                                     //'largura' => '8', \n"
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'FONE') 
                      || stristr($column->name, 'CELULAR') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-phone\"></i>', \n"
. "                                                     //'largura' => '8', \n"
. "                                                     'data-tipo' => 'telefone', \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'ENDER') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-home\"></i>', \n"
. "                                                     //'largura' => '12', \n"
. "                                                     'size' => $column->size, \n" 
. "                                                     'maxlength' => $column->size, \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(stristr($column->name, 'EMPRESA') ) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => '<i class=\"fa fa-industry\"></i>', \n"
. "                                                     //'largura' => '12', \n"
. "                                                     'size' => $column->size, \n" 
. "                                                     'maxlength' => $column->size, \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(strstr($column->dbType, "int") != false) {
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'inteiro2') ); \n"; 
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'N', \n"
. "                                                     'data-tipo' => 'inteiro2', \n" 
. "                                                     //'largura' => '6', \n"
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if($column->size > 40) {
                          // aplicar estilo redutor
                            //echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'size'=>$column->size, 'maxlength'=>$column->size, 'class'=>'col-xs-12 col-sm-11 col-md-10  col-pg-10') ); \n"; 
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'T', \n"
. "                                                     //'largura' => '12', \n"
. "                                                     'size' => $column->size, \n" 
. "                                                     'maxlength' => $column->size, \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
                      if(strstr($column->dbType, "text") != false) {
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'T', \n"
. "                                                     //'largura' => '12', \n"
. "                                                     'cols' => 40, \n" 
. "                                                     'rows' => 5, \n" 
. "                                                     //'maxlength' => $column->size, \n" 
. "                                                 ) \n"
. "                                             );";
                      }
                      else
//                            echo "\t\t\t\t  echo ".$this->generateActiveField($this->modelClass,$column)."; \n"; 
                            echo "echo scUtil::getLegendaCampo(\$form, \n"
. "                                                 \$model, \n"
. "                                                 '$column->name', \n"
. "                                                 array('id'=>'$column->name',\n"
. "                                                     'prepend' => 'T', \n"
. "                                                     //'largura' => '12', \n"
. "                                                     'size' => $column->size, \n" 
. "                                                     'maxlength' => $column->size, \n" 
. "                                                 ) \n"
. "                                             );";
               
		      /*echo "\t\t\t\t  echo \$form->error(\$model,'{$column->name}'); ?>\n";  */
                      echo "?>\n"; ?>
            </div> <!-- col-md-12 Abre -->
        </div> <!-- row campo Fecha -->
        
<?php
    $nConta++;
}?>
    </div> <!-- col-md-6 Fecha -->

    <?php echo '<?php echo scUtil::getFechaCorpoDoForm($this); ?>'; ?>
    
    <?php echo '<?php echo scUtil::getAbreAreaDeBotoes($this); ?>'; 
    ?>
    <div  class="col-md-12"> <!-- col-md-12 Abre -->
        <div class="row buttons">
<?php
            if($nNroAba > 1) {
                // tem anterior
                echo "\t\t\t<?php echo CHtml::button('Anterior',
                                     array('title'=>'Aba Anterior',
                                           //'onclick'=>'MyPrevTab(".$aIdTab.");'
                                           'onclick'=>'MyPrevTab(".$nNroAba.");'
                                          )
                                    );\n";
                echo "\t\t\techo '&nbsp;&nbsp;';  ?>\n";
            }
            if($nNroAba != -1) {
                echo "\t\t\t<?php echo CHtml::button('Próximo',
                                     array('title'=>'Próxima Aba',
                                           //'onclick'=>'MyNextTab(".$aIdTab.");'
                                           'onclick'=>'MyNextTab(".$nNroAba.");'
                                          )
                                    );\n";
                echo "\t\t\techo '&nbsp;&nbsp;';  ?>\n";
            }
            echo "<?php ";
?>            
                if($fExecucaoPopUp) {
                    if($model->isNewRecord) {
                        // criar
                        echo CHtml::ajaxButton(
                                'Criar',
                                array('<?=$this->getModelClass()?>/create'),
                                array(
                                    'id' => 'btnCreate',
                                    'success' => 'js:
                                                function (data){
                                                    $("btnCreate").attr("disabled","");
                                                    //$.fancybox.close(); 
                                                    parent.$.fancybox.close();
                                                }
                                            ',
                                    'type' => 'POST',
                                    'beforeSend' => 'js:
                                                function(){
                                                    $("btnCreate").attr("disabled","disabled");
                                                }
                                               ',

                        ));
                    }
                    else {
                        // altarar
                        echo CHtml::ajaxButton(
                                'Alterar',
                                array('<?=$this->getModelClass()?>/update'),
                                array(
                                    'id' => 'btnUpdate',
                                    'success' => 'js:
                                                function (data){
                                                    $("btnUpdate").attr("disabled","");
                                                    //$.fancybox.close(); 
                                                    parent.$.fancybox.close();
                                                }
                                            ',
                                    'type' => 'POST',
                                    'beforeSend' => 'js:
                                                function(){
                                                    $("btnUpdate").attr("disabled","disabled");
                                                }
                                               ',

                        ));
                    }
                }
                else {
                    echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar');
                }
<?php
            echo "?>\n";
?>
        </div>
    </div> <!-- col-md-12 Fecha -->
    
    <?php echo '<?php echo scUtil::getFechaAreaDeBotoes($this); ?>'; ?>
    
<?php echo '<?php echo scUtil::getFechaForm($this); ?>'; ?>
<!--</div><!-- row form Fecha -->
    

