<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
array('label'=>'<i class="icon icon-star-empty"></i><b>Gerenciar</b>', 'url'=>'#','active'=>'true' ),
array('label'=>'<i class="icon icon-home"></i>Menu principal','icon'=>'home','url'=>array('/')),
array('label'=>'<i class="icon icon-pencil"></i>Novo <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('create' ) ),
array('label'=>'<i class="icon icon-chevron-left"></i>Voltar','icon'=>'arrow-left','url'=>array('admin' ) ),
	//array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	//array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);

$this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'<h3 class="box-title"><?php echo $label; ?></h3>',
        'decorationCssClass' => "box box-solid box-primary",
        'titleCssClass' => "box-header",
        'htmlOptions'=>array('style'=>'box-shadow:0 0 5px black;border-radius:0.5em;margin-bottom:10px;'),
    )
);

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    )
); 

$this->endWidget('zii.widgets.CPortlet');

?>
