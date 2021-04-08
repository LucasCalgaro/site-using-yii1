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

<div class="wide form">

    <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
                    'action'=>Yii::app()->createUrl(\$this->route),
                    'method'=>'get',
                )
            ); ?>\n"; ?>

    <div class='content' style="margin-left: 20px;">

<?php 
    foreach($this->tableSchema->columns as $column) {
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
            continue;
            echo "        <div class=\"row\">\n";
            echo "            <?php echo \$form->label(\$model,'{$column->name}'); ?>\n";
            echo "            <?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n";
            echo "        </div>\n\n";
    } ?>
    </div>
    <div class="row buttons">
        <?php echo "<?php echo CHtml::submitButton('Search'); ?>\n"; ?>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->