<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<?php // Decide se deve usar campo de valor (preco)
$aNomesMoeda = "";
foreach($this->tableSchema->columns as $column)
{
    if(strstr($column->dbType, "decimal") != false) {
      if(strlen($aNomesMoeda) > 0)
        $aNomesMoeda .= ", ";
      $aNomesMoeda .= "#" . $column->name;
    }
}

if(strlen($aNomesMoeda) > 0) {
// os includes dos scripts necessarios  
echo "<?php\n";
    ?>
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/jquery/jquery.price_formate.min.js');

<?php 
echo "Yii::app()->clientScript->registerScript('preco_format','\n" .
                "\t\t\t$(\"$aNomesMoeda\").priceFormat({\n" .
                "\t\t\t\t\tprefix: \"R$ \",\n" .
                "\t\t\t\t\tcentsSeparator: \",\",\n" .
                "\t\t\t\t\tthousandsSeparator: \".\"\n" .
                "\t\t\t});\n" .
                "\t\t\t');\n";
echo "?>\n\n";
}
?>

<?php  // Decide se deve usar campo numerico mascarado
$fMascara = false;
foreach($this->tableSchema->columns as $column)
{
    if(strstr($column->dbType, "int") != false) {
      $fMascara = true;
      break;
    }
}


if($fMascara == true) {
// os includes dos scripts necessarios  
echo "<?php\n";
    ?>
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/jquery/jquery.mask.min.js');

Yii::app()->clientScript->registerScript('numero_format','
<?php // loop das entradas dos valores formatados
foreach($this->tableSchema->columns as $column)
{
    if(strstr($column->dbType, "int") != false) {
      // criar uma mascara dinamicamente, de acordo com seu tamanho 
      echo "\t\t\t\t$(\"#$column->name\").mask(\"99999999999\", { reverse: false } );\n";
    }
}
echo "'); ?>\n\n";
}
?>


<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<p class="note">Campos com <span class="required">*</span> são exigidos.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="row">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; // $column->dbType\n"; 
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
  		        echo "                      echo \$form->textField(\$model, '$column->name', array('id'=>'$column->name') ); \n"; 
                      }
                      else
  		        echo "                      echo ".$this->generateActiveField($this->modelClass,$column)."; \n"; 
               
		      echo "                      echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Criar' : 'Salvar'); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->