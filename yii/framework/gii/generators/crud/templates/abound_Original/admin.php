<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Gerenciar',
);\n";
?>

$this->menu=array(
array('label'=>'<i class="icon icon-star-empty"></i><b>Gerenciar</b>', 'url'=>'#','active'=>'true' ),
array('label'=>'<i class="icon icon-home"></i>Menu principal','icon'=>'home','url'=>array('/')),
array('label'=>'<i class="icon icon-pencil"></i>Novo <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('create' ) ),
	//array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	//array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->beginWidget('zii.widgets.CPortlet', array(
       'title'=>'<h3>Gerencia <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h3>',
       'htmlOptions'=>array('style'=>'box-shadow:0 0 5px black;border-radius:0.5em;margin-bottom:10px;'),
   ));
?>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo "<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
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
			'class'=>'CButtonColumn',
		),
	),
));

$this->endWidget('zii.widgets.CPortlet');

?>
