<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid_On').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/

?>


<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid_Off',
	'dataProvider'=>$model->searchOff(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'header' => 'Ações',
			'class'=>'CButtonColumn',
		),
	),
));

?>
