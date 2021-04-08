<?php
$nQtdTotalCamnpos = count($this->tableSchema->columns);
// descobre se tem nIdLoginIncluiu, pois deve descontar nStatus, nIdLoginIncluiu, etc.. 7 campos
$nDescontaCampos = 0;
$nConta=0;
$nIdxCampoInicial = -1;
foreach($this->tableSchema->columns as $column) {
    if($column->name == 'nIdLoginIncluiu') {
        // descontar 7 campos
        $nQtdTotalCamnpos -= 7;
        break;
    }
    if($column->autoIncrement
    || $column->name == 'nIdFilial') {
        // campo ignorado
        $nQtdTotalCamnpos--;
    }
    else {
        $nConta++;
        if($nConta < $nQtdCampos)
            $nIdxCampoInicial++;
    }
}
//$nQtdCampos = 14;
//$nIdxCampoInicial = 0;
$nIdxCampoFinal = $nIdxCampoInicial + $nQtdCampos;
$nIdxCampoFinal = $nIdxCampoFinal>$nQtdTotalCamnpos ? $nQtdTotalCamnpos : $nIdxCampoFinal;
$nQtdCampos = ($nIdxCampoFinal-$nIdxCampoInicial) > $nQtdCampos ? $nQtdCampos : $nIdxCampoFinal-$nIdxCampoInicial;

?>
<div class="row"> <!-- row form Abre -->

    <?php
// gera duas colunas de 10 ou metade da qtd de campos
$nIdx = -1;
$nConta=0;
foreach($this->tableSchema->columns as $column) {
//for($nIdx=$nIdxCampoInicial; $nIdx <= $nIdxCampoFinal; $nIdx++) {
    $nIdx++;
    //echo " Campo:" . $nIdx . " " . $column->name;
    if($nIdx < $nIdxCampoInicial) {
        // ainda nao chegou no campo inicial
        continue;
    }
    /*
    if($nIdx >= $nIdxCampoFinal) {
        // passou do campo final
        break;
    }
    */
    if($nConta >= $nQtdCampos) {
        // passou do limite de campos da tela
        break;
    }
    
    if($column->name == 'nStatus') {
        // a partir daqui, os campos nao interessam, sao de seguranca e controle de usuarios
        break;
    }
    //$column = $this->tableSchema->columns[$nIdx];
    if($column->autoIncrement
    || $column->name == 'nIdFilial') {
        // campo ignorado
        continue;
    }
    
    if($nConta == 0 //$nIdx == $nIdxCampoInicial
    || $nConta == $nQtdCampos/2) {
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
        <div class="row"> <!-- row campo Abre -->
		<?php echo "\t<?php echo ".$this->generateActiveLabel($this->modelClass,$column).".'<br>';" . " // $column->dbType Idx:$nIdx\n"; 
                      if($column->dbType == 'date'
                      || $column->dbType == 'datetime')
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
                      else
                      if(strstr($column->dbType, "decimal") != false) {
                            // moeda ou percentual ??
                            if($column->dbType == "decimal(8,3)") {
                                // area
                                echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'medida', 'data-prefixo'=> 'm2') ); \n"; 
                            }
                            else
                            if($column->dbType == "decimal(12,2)") {
                                // moeda
                                echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'dinheiro') ); \n"; 
                            }
                            else {
                                // percentual
                                echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'medida', 'data-prefixo'=> '%') ); \n"; 
                            }
                      }
                      else
                      if(stristr($column->name, 'CPF') 
                      || stristr($column->name, 'CIC') ) {
                        if(stristr($column->name, 'CNPJ')  
                        || stristr($column->name, 'CIC') ) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cpf_cnpj') ); \n"; 
                        }
                        else {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cpf') ); \n"; 
                        }
                      }
                      else
                      if(stristr($column->name, 'CNPJ') ) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cnpj') ); \n"; 
                      }
                      else
                      if(strstr($column->name, 'CEP') ) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'cep') ); \n"; 
                      }
                      else
                      if(stristr($column->name, 'RG') ) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'rg') ); \n"; 
                      }
                      else
                      if(stristr($column->name, 'FONE') 
                      || stristr($column->name, 'CELULAR') ) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'telefone') ); \n"; 
                      }
                      else
                      if(strstr($column->dbType, "int") != false) {
                            echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name', 'data-tipo' => 'inteiro2') ); \n"; 
                      }
                      else
                            echo "\t\t\t\t  echo ".$this->generateActiveField($this->modelClass,$column)."; \n"; 
               
		      echo "\t\t\t\t  echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
        </div> <!-- row campo Fecha -->
<?php
    $nConta++;
}?>
    </div> <!-- col-md-6 Fecha -->

    <div  class="col-md-12"> <!-- col-md-12 Abre -->
        <br>
        <div class="row buttons">
<?php
            if($nNroAba > 1) {
                // tem anterior
                echo "\t\t\t<?php echo CHtml::button('Anterior',
                                     array('title'=>'Aba Anterior',
                                           'onclick'=>'MyPrevTab(".$aIdTab.");'
                                          )
                                    );\n";
                echo "\t\t\techo '&nbsp;&nbsp;';  ?>\n";
            }
            echo "\t\t\t<?php echo CHtml::button('Próximo',
                                 array('title'=>'Próxima Aba',
                                       'onclick'=>'MyNextTab(".$aIdTab.");'
                                      )
                                );\n";
            echo "\t\t\techo '&nbsp;&nbsp;';  ?>\n";
            
            echo "\t\t\t<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Criar' : 'Salvar'); ?>\n"; 
?>
        </div>
    </div> <!-- col-md-12 Fecha -->
    
</div><!-- row form Fecha -->
    

