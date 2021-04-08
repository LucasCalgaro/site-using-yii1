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
    //array('label'=>'<i class="icon icon-pencil"></i>Novo <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('create' ) ),
	/* /array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')), */
	/* array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')), */
);

if(BaseLoginLiberacao::getOpcao(Yii::app()->user->Login->ID, BaseOpcaoMenu::knKeyMenuCadOpc<?php echo $this->modelClass; ?>Incluir) ) {
    $this->menu[] = array('label'=>'<i class="icon icon-pencil"></i>Novo <?php echo $this->modelClass; ?>','icon'=>'pencil','url'=>array('create' ) );
}

/*
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
*/

echo scUtil::getAbreNovaJanela($this, '0px'); // desligou altura

echo scUtil::getTituloDaJanela($this, 'Gerencia <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>');

/*
$this->beginWidget('zii.widgets.CPortlet', array(
       'title'=>'<h3>Gerencia <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h3>',
       'htmlOptions'=>array('style'=>'box-shadow:0 0 5px black;border-radius:0.5em;margin-bottom:10px;'),
   ));
*/

$arTabs['Ativas'] = array('label' =>'Ativas',
                  'content' =>$this->renderPartial('_adminOn', 
                                                   array('model'=>$model), 
                                                   true),
                'active'=>true);

if(Yii::app()->user->Login->isMaster()) {
  $arTabs['Inativas'] = array('label' =>'Inativas',
                    'content' =>$this->renderPartial('_adminOff', 
                                                     array('model'=>$model), 
                                                     true),
                  'active'=>false);
}
/*
$this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>$arTabs,
        // additional javascript options for the tabs plugin
        'options'=>array(
            'collapsible'=>true,
        ),
    )
);
*/
$this->widget('booster.widgets.TbTabs', array(// 'zii.widgets.jui.CJuiTabs', array(
    'id' => 'todasAsAbas_<?php echo $this->pluralize($this->class2name($this->modelClass)); ?>',
    'tabs' => $arTabs,
        /*
        // additional javascript options for the tabs plugin
        'options'=>array(
            'collapsible'=>false,
        ),
        */
        //'headerTemplate' =>'<li><a href="{url}"  title="{title}">{title}</a></li>',
    )
);
                
//$this->endWidget('zii.widgets.CPortlet');
echo scUtil::getFechaNovaJanela($this);

?>
