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
        'title'=>'<h3 class="box-title">Gerencia <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h3>',
        'decorationCssClass' => "box box-solid box-primary",
        'titleCssClass' => "box-header",
        'htmlOptions'=>array('style'=>'box-shadow:0 0 5px black;border-radius:0.5em;margin-bottom:10px;max-width:1000px;min-height:600px;'),
    )
);
?>

<p>
Você pode, opcionalmente, digitar um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no início de cada um dos seus valores de pesquisas para especificar como a comparação deverá ser feita.
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
                /*
                array(
                    'class'=>'CButtonColumn',
                ),
                */
                array(
                    'class'=>'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'header' => 'Ações',
                    'buttons'=>array(
                        'view' => array(
                            'visible' => 'true',
                            'url'=>'Yii::app()->createUrl("<?=$this->modelClass?>/view", array("id"=>$data->ID))',
                        ),
                        'update' => array(
                            //'visible' => 'RotGen::xPermiteAlterar($data, "nPedra")',
                            'visible' => 'true',
                            'url'=>'Yii::app()->createUrl("<?=$this->modelClass?>/update", array("id"=>$data->ID))',
                        ),
                        'delete' => array(
                            //'visible' => 'Login::getPermissao(Yii::app()->user->Login->Id, "nPedra", "Excluir") ? true : false',
                            'visible' => 'true',
                            'url'=>'Yii::app()->createUrl("<?=$this->modelClass?>/delete", array("id"=>$data->ID))',
                        ),
                    ),
                ),
            ),
));

$this->endWidget('zii.widgets.CPortlet');

?>
