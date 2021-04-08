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
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Atualiza',
);\n";
?>

$this->menu=array(
array('label'=>'<i class="icon icon-star-empty"></i><b>Gerenciar</b>', 'url'=>'#','active'=>'true' ),
array('label'=>'<i class="icon icon-chevron-left"></i>Voltar','icon'=>'arrow-left','url'=>array('admin' ) ),
	//array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	//array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	//array('label'=>'View <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	//array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);

echo scUtil::getAbreNovaJanela($this, '0px'); // desligou altura

<?php
$aLegenda = str_replace('BaseTab', '', $this->modelClass);
$aLegenda = str_replace('Tab', '', $aLegenda);
?>
echo scUtil::getTituloDaJanela($this, 'Atualizar <?= $aLegenda ?>');

    echo $this->renderPartial('_form', array('model'=>$model,
                                             'fExecucaoPopUp' => $fExecucaoPopUp,
                                            )
                                    );

echo scUtil::getFechaNovaJanela($this);

?>