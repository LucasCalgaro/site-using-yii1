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
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid_On',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
        if($column->type == "double") {
          echo "\t\tarray(\n";
          echo "\t\t\t'name'=>'$column->name',\n";
          echo "\t\t\t'value'=>'money_format('%!i', \$data->$column->name)',\n";
          echo "\t\t\t'htmlOptions'=>array('style' => 'text-align: right;'),\n";
          echo "\t\t),\n";
        }
        else
        if($column->name == "nIdLoginAprovou") {
            ?>
                array(
                    'class'=>'CLinkColumn',
                    'header'=>'Aprovação',
                    'label'=>'Aprovação',
                    'labelExpression'=>'$data->nIdLoginAprovou != 0 ? false : "- APROVAR -"',
                    'urlExpression'=>'CHtml::normalizeUrl(array("aprovar<?php echo $this->modelClass; ?>","id"=>$data->ID))',
                    'htmlOptions'=>array('rel'=>'link_activador', 'style'=>'text-align: center'),
                    'visible' => Login::getPermissao(Yii::app()->user->Login->Id, "n<?php echo $this->modelClass; ?>", "Aprovar"),
                ),
                array('name'=>'nIdLoginAprovou', 'value'=>'$data->nIdLoginAprovou >0 ? Login::getNomeLogin($data->nIdLoginAprovou) : false', 
                      'htmlOptions'=>array('style'=>'text-align: center; width:120px;') ),
            <?php
        }
        else
  	  echo "\t\t'".$column->name."', // $column->type\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
                /*
		array(
			'header' => 'Ações',
			'class'=>'CButtonColumn',
		),
                */
		array(
                    'class'=>'CButtonColumn',
                    //'template' => '{view}{update}{delete}',
                    'template' => '{update}{delete}',
                    'header' => 'Ações',
                    'buttons'=>array(
                        'view' => array(
                            'visible' => 'true',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/view", array("id"=>$data->ID))',
                        ),
                        'update' => array(
                            'visible' => 'Yii::app()->user->Login->getPermissao(BaseOpcaoMenu::knKeyMenuCadPropOpc<?php echo $this->modelClass; ?>Alterar)',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/update", array("id"=>$data->ID))',
                        ),
                        'delete' => array(
                            'visible' => 'Yii::app()->user->Login->getPermissao(BaseOpcaoMenu::knKeyMenuCadPropOpc<?php echo $this->modelClass; ?>Excluir)',
                            'url'=>'Yii::app()->createUrl("<?php echo $this->class2var($this->modelClass); ?>/delete", array("id"=>$data->ID))',
                        ),
                    ),
		),
                
	),
));

Yii::app()->getClientScript()->registerScript(
"activador_script",
"$(document).on('click','[rel=link_activador]',function(e) {
        e.preventDefault();
        var a = $(this).find('a');
        $.ajax({ url: a.attr('href'), type: 'post', 
            success: function(newlabel){
                $('#<?php echo $this->class2id($this->modelClass); ?>-grid_On').yiiGridView('update'); // refresh gridview via AJAX
            }, 
            error: function(e){ 
                alert('error:'+e.responseText); 
            }
        });
    });",
CClientScript::POS_HEAD);

?>
