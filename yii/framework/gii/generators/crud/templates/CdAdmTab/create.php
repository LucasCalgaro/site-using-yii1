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
	'Criar',
);\n";
?>

$this->menu=array(
array('label'=>'<i class="icon icon-star-empty"></i><b>Gerenciar</b>', 'url'=>'#','active'=>'true' ),
array('label'=>'<i class="icon icon-home"></i>Menu principal','icon'=>'home','url'=>array('/')),
array('label'=>'<i class="icon icon-chevron-left"></i>Voltar','icon'=>'arrow-left','url'=>array('admin' ) ),
	//array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	//array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);

echo scUtil::getAbreNovaJanela($this, '0px'); // desligou altura

<?php
$aLegenda = str_replace('BaseTab', '', $this->modelClass);
$aLegenda = str_replace('Tab', '', $aLegenda);
?>
echo scUtil::getTituloDaJanela($this, 'Criar <?= $aLegenda ?>');

    echo $this->renderPartial('_form', array('model'=>$model,
                                             'fExecucaoPopUp' => $fExecucaoPopUp,
                                            )
                                    );

echo scUtil::getFechaNovaJanela($this);

?>
