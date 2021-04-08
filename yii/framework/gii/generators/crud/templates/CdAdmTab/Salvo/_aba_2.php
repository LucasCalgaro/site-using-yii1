<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/*
 * CdADM - Web -> Administrador de Bens e Contratos
 * ------------------------------------------------
 * 
 *   Funcao: 
 *  Criacao: <?=date('d-m-Y')?> - Seu Nome
 * Objetivo: 
 * 
 *  Histórico de Alteracoes
 *    Data   Autor      Descricao
 *
 *
 **/
?>
<?php
$nQtdTotalCampos = count($this->tableSchema->columns);
// descobre se tem nIdLoginIncluiu, pois deve descontar nStatus, nIdLoginIncluiu, etc.. 7 campos
$nDescontaCampos = 0;
foreach($this->tableSchema->columns as $column) {
    if($column->name == 'nIdLoginIncluiu') {
        // descontar 7 campos
        $nQtdTotalCampos -= 7;
        break;
    }
}
$nQtdCampos = 14;
$nIdxCampoInicial = ($nQtdCampos*1);
$nIdxCampoFinal = $nIdxCampoInicial + $nQtdCampos;
$nIdxCampoFinal = $nIdxCampoFinal>$nQtdTotalCampos ? $nQtdTotalCampos : $nIdxCampoFinal;
$nQtdCampos = ($nIdxCampoFinal-$nIdxCampoInicial) > $nQtdCampos ? $nQtdCampos : $nIdxCampoFinal-$nIdxCampoInicial;
?>
<div class="row"> <!-- row form -->

    <?php
// gera duas colunas de 10 ou metade da qtd de campos
$nIdx = -1;
$nConta=0;
foreach($this->tableSchema->columns as $column) {
//for($nIdx=$nIdxCampoInicial; $nIdx <= $nIdxCampoFinal; $nIdx++) {
    $nIdx++;
    //echo " Campo:" . $nIdx . " " . $column->name;
    if($nIdx < $nIdxCampoInicial) {
        continue;
    }
    if($nIdx >= $nIdxCampoFinal)
        break;
    if($column->name == 'nStatus')
        break;
    //$column = $this->tableSchema->columns[$nIdx];
    if($column->autoIncrement)
        continue;
    
    if($nIdx == $nIdxCampoInicial
    || $nConta == $nQtdCampos/2) {
        // cria coluna
        if($nIdx != $nIdxCampoInicial) {
            // fecha coluna da esquerca ?>
    </div> <!-- span-6 -->
    <?php
        }?>
<div  class="col-md-6">
<?php
    }
?>
        <div class="row"> <!-- row campo -->
		<?php echo "\t<?php echo ".$this->generateActiveLabel($this->modelClass,$column).".'<br>';" . " // $column->dbType\n"; 
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
                      if(strstr($column->dbType, "decimal") != false
                      || strstr($column->dbType, "int") != false) {
  		        echo "\t\t\t\t  echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name') ); \n"; 
                      }
                      else
  		        echo "\t\t\t\t  echo ".$this->generateActiveField($this->modelClass,$column)."; \n"; 
               
		      echo "\t\t\t\t  echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
        </div> <!-- row campo -->
<?php
    $nConta++;
}?>
    </div> <!-- col-md-6 -->
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Criar' : 'Salvar'); ?>\n"; ?>
	</div>


</div><!-- row form -->