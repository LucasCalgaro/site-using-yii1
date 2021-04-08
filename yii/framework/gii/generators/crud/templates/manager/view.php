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
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
array('label'=>'<i class="icon icon-star-empty"></i><b>Gerenciar</b>', 'url'=>'#','active'=>'true' ),
array('label'=>'<i class="icon icon-chevron-left"></i>Voltar','icon'=>'arrow-left','url'=>array('admin' ) ),
//array('label'=>'<i class="icon icon-pencil"></i>Novo <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('create' ) ),
//array('label'=>'<i class="icon icon-pencil"></i>Atualiza <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	//array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	//array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	//array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	//array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);

$this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'<h3 class="box-title">Visualiza <?php echo $this->modelClass." ' . \$model->{$this->tableSchema->primaryKey} . '"; ?></h3>',
        'decorationCssClass' => "box box-solid box-primary",
        'titleCssClass' => "box-header",
        'htmlOptions'=>array('style'=>'box-shadow:0 0 5px black;border-radius:0.5em;margin-bottom:10px;max-width:1000px;min-height:600px;'),
    )
);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
   foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); 

$this->endWidget('zii.widgets.CPortlet');

?>
