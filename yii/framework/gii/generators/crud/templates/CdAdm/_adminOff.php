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
<?php echo "<?php"; ?> 
    Yii::app()->getComponent('yiiwheels')->registerAssetJs('bootbox.min.js');
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
        'type' =>  'hover', // 'table-hover bordered',
    //$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid_Off',
	'dataProvider'=>$model->searchOff(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
$fFlagFizExclusao = false;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
        if($column->name == "username") {
            echo "\t\tarray('name'=>'username', 'value'=>'\$data->username',\n" .
                 "\t\t\t'header' => 'Quem Excluiu'),\n";
        }
        else
        if($column->name == "nIdLoginExcluiu") {
            if($count < 7)
                $fFlagFizExclusao = true;
            echo "\t\tarray('name'=>'nIdLoginExcluiu', 'value'=>'\$data->nIdLoginExcluiu >0 ? Login::getNomeLogin(\$data->nIdLoginExcluiu) : false',\n" .
                      "\t\t\t'htmlOptions'=>array('style'=>'text-align: center; width:120px;') ),\n";
        }
        else
            echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";

        if($fFlagFizExclusao == false) {?>
            //echo "\t\tarray('name'=>'nIdLoginExcluiu', 'value'=>'\$data->nIdLoginExcluiu >0 ? Login::getNomeLogin(\$data->nIdLoginExcluiu) : false',\n" .
            //          "\t\t\t'htmlOptions'=>array('style'=>'text-align: center; width:120px;') ),\n";
            array('name'=>'nIdLoginExcluiu', 'value'=>'$data->nIdLoginExcluiu >0 ? Yii::app()->user->Login->getNomeLogin($data->nIdLoginExcluiu) : false',
                            'htmlOptions'=>array('style'=>'text-align: center; width:120px;') ),
<?php   }
?>                
                /*
		array(
			'header' => 'Ações',
			'class'=>'CButtonColumn',
		),
                */
		array(
                    'class'=>'CButtonColumn',
                    //'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                    'template' => '{update}',
                    'header' => 'Ações',
                    'buttons'=>array(
                        'view' => array(
                            'visible' => 'true',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/view", array("id"=>$data->ID))',
                            'label' => '',
                            'options'=>array( 'class'=>'fa fa-eye' ),
                            'imageUrl' => false,
                        ),
                        'update' => array(
                            'visible' => 'Yii::app()->user->Login->isMaster()',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/update", array("id"=>$data->ID))',
                            'label' => '',
                            'options'=>array( 'class'=>'fa fa-pencil' ),
                            'imageUrl' => false,
                        ),
                        'delete' => array(
                            'visible' => 'Yii::app()->user->Login->getPermissao(Yii::app()->user->Login->ID, "n<?php echo $this->modelClass; ?>", "Excluir") ? true : false',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/delete", array("id"=>$data->ID))',
                            'label' => '',
                            'options'=>array( 'class'=>'fa fa-times' ),
                            'imageUrl' => false,
                        ),
                    ),
		),
                
	),
));

?>
