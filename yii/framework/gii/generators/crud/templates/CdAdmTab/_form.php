<?php echo "<?php\n"; ?>
/*
 * CdADM - Web -> Administrador de Bens e Contratos
 * ------------------------------------------------
 * 
 *   Funcao: 
 *  Criacao: <?=date('d-m-Y')?> - Seu Nome
 * Objetivo: 
 * 
 *  Histórico de Alteracoes
 *    Data   Autor      Descricao
 *
 *
 **/
 
// Precisa destas duas linhas ...
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery'.DIRECTORY_SEPARATOR.'fn.mascaras.js');
Yii::app()->clientScript->registerScript('numero_format', '$("input").mascaras();');

<?php echo "?>\n"; ?>

<!-- REGRAS DE ESTILO -->
<style type="text/css">
    .tab-content {overflow:hidden;}
    .help-block.error {display:none !important;}
</style>

<!-- INSTRUÇÃO JS -->
<script type="text/javascript">
    
    function MyNextTab(elem) 
    {
        //var nIdx = jQuery(elem).tabs("option","active");
        //jQuery(elem).tabs("option","active",nIdx+1);
        $('#aba' + (elem+1) ).tab('show');
    }
    function MyPrevTab(elem) 
    {
        //var nIdx = jQuery(elem).tabs("option","active");
        //jQuery(elem).tabs("option","active",nIdx-1);
        $('#aba' + (elem-1) ).tab('show');
    }
    
    jQuery(document).ready(function(){
        
        //if( jQuery('.help-block.error').length > 0 ){
        if( jQuery('.has-error').length > 0 ){
            
            //jQuery.each(jQuery('.help-block.error'), function(i,v){
            jQuery.each(jQuery('.has-error'), function(i,v){
                
                var div = jQuery(v).closest('.tab-content');        // Conteúdo do TAB
                var ID = jQuery(v).closest('.tab-pane').attr('id'); // ID do TAB
                
                // ESTOU EM UMA ABA SECUNDARIA, AQUI ENCONTRO NOME DA ABA PAI
                if( jQuery(div).closest('[data-referencia]').length > 0 ){
                    jQuery('.nav.nav-tabs a[href="#'+jQuery(div).closest('[data-referencia]').attr('data-referencia')+'"]').css({color:'red', borderRightColor:'red', borderTopColor:'red', borderLeftColor:'red', backgroundColor:'#FFCCCC'});
                }
                
                // PROCURO ALGUM CHECKBOX DO TIPO TOGGLE
                if( jQuery(v).closest('.tab-pane').find('[type="checkbox"]').hasClass('toggle') ){
                    jQuery(v).closest('.tab-pane').find('[type="checkbox"]').prop('checked', true);
                    jQuery(v).closest('.tab-pane').find('.checkboxToggle').show();
                }
                
                // MUDAR STILO DAS ABAS COM ERRO
                jQuery('.nav.nav-tabs a[href="#'+ID+'"]').css({color:'red', borderRightColor:'red', borderTopColor:'red', borderLeftColor:'red', backgroundColor:'#FFCCCC'});
            });
            
        }
        
    }); // ready
</script>

<?='<?php echo scUtil::getAbreForm($this); ?>'."\n" ?>
<!-- <div class="form"> -->

    <?='<?php'?> 
    /*
    $form=$this->beginWidget('booster.widgets.TbActiveForm', //'CActiveForm', 
                             array(
                                'id'=><?='"'.$this->class2id($this->modelClass).'-form"'?>,
                                'enableAjaxValidation'=>false,
                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                             )
                        );
    */
    $form = scUtil::getBeginWidgetForm($this, <?='"'.$this->class2id($this->modelClass).'-form"'?>);
    <?='?>'?> 
    
    <p class="note">Campos com <span class="required">*</span> são exigidos.</p>

    <?php echo "<?php\n\techo \$form->errorSummary(\$model);\n"; ?>

    <?php
    // CRIRAR ABAS
    // descobre se tem nIdLoginIncluiu, pois deve descontar nStatus, nIdLoginIncluiu, etc.. 7 campos
    $nDescontaCampos = 0;
    $fDeveGerarFancy = false;
    foreach($this->tableSchema->columns as $column) {
        if($column->name == 'nIdLoginIncluiu') {
            // descontar 7 campos
            $nDescontaCampos = 7;
            break;
        }
        if(strstr($column->name, 'IdTabCidade')
        || strstr($column->name, 'IdTabNatur') 
        || strstr($column->name, 'IdTabProfis') 
        || strstr($column->name, 'IdTabNacio') ) {
            $fDeveGerarFancy = true;
        }
    }
    
    $nQtdCamposPorAba = 14; // 7 de cada lado
    $nQtdAbas = (int)((count($this->tableSchema->columns)-$nDescontaCampos) /  $nQtdCamposPorAba) + 1;
    ?>
// Array para Abas
    $aAbas = array();
    <?php
    //$nContaAba=1;
    //for($nCampo=0; $nCampo < count($this->tableSchema->columns); $nCampo+=$nQtdCamposPorAba) {
    for($nContaAba=1; $nContaAba <= $nQtdAbas; $nContaAba++) {
        if($nContaAba==1) {?>
$aAbas['<?=$this->modelClass?> <?=$nContaAba?>'] = array(
                'label' => '<?=$this->modelClass?> <?=$nContaAba?>', 
                'content' => $this->renderPartial(
                        "_aba_<?=$nContaAba?>", 
                        array(
                            'form' => $form, 
                            'model' => $model,
                            'fExecucaoPopUp' => $fExecucaoPopUp,
                        ), true
                    ),
                    'active'=>true,
                    'linkOptions' => array('id'=>'aba<?=$nContaAba?>')
                );
    <?php
        }
        else {?>
$aAbas['<?=$this->modelClass?> <?=$nContaAba?>'] = array(
               'label' => '<?=$this->modelClass?> <?=$nContaAba?>', 
               'content' => $this->renderPartial(
                       "_aba_<?=$nContaAba?>", 
                       array(
                           'form' => $form, 
                           'model' => $model,
                           'fExecucaoPopUp' => $fExecucaoPopUp,
                       ), true
                    ),
                    'linkOptions' => array('id'=>'aba<?=$nContaAba?>')
                );
    <?php
        }
    }?>
# ABAS
    $this->widget('booster.widgets.TbTabs', array(// 'zii.widgets.jui.CJuiTabs', array(
            'id' => 'todasAsAbas_<?=$this->modelClass?>',
            'tabs' => $aAbas,
            /*
            // additional javascript options for the tabs plugin
            'options'=>array(
                'collapsible'=>false,
            ),
            */
            //'headerTemplate' =>'<li><a href="{url}"  title="{title}">{title}</a></li>',
        )
    );
        
    //$this->endWidget(); // fecha widget form
    scUtil::getEndWidgetForm($this);
<?php echo "?>\n";?>
<?='<?php echo scUtil::getFechaForm($this);'. "?>\n" ?>

<?php
if($fDeveGerarFancy) {?>
<?='<?php'?> 
$aConfig = array(
    'openEffect' =>'elastic',
    'closeEffect' => 'elastic',

    'autoSize'          =>   true,         //if using newer fancybox
    'width'             =>   900,
    'height'            =>   600,
    'transitionIn'      => 'none',
    'transitionOut'     => 'elastic',

    'onComplete'        => 'function(){
        $.fancybox.resize();
    }',

    'overlayShow'       =>   true,

    'beforeShow'        => 'function() {
            this.inner.find("iframe").contents().find("body").click( $.fancybox.close );    
    }',

    'closeClick' => true,
    'type' => 'iframe',
    'iframe' => array(
        'preload' => false // fixes issue with iframe and IE
    ),
);

<?php    

    $fGerouCidade = false;
    $fGerouProfissao = false;
    $fGerouNacionalidade = false;
    foreach($this->tableSchema->columns as $column) {
        if((strstr($column->name, 'IdTabCidade') || 
            strstr($column->name, 'IdTabNatur') )
        && $fGerouCidade == false) {
            $fGerouCidade = true;?>
$this->widget('ext.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link-cidade',
    
    'config' => $aConfig,
    )
);
    
<?php
        }
        if(strstr($column->name, 'IdTabProfis') 
        && $fGerouProfissao == false) {
            $fGerouProfissao = true;?>
$this->widget('ext.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link-profissao',
    
    'config' => $aConfig,
    )
);
    
<?php
        }
        else
        if(strstr($column->name, 'IdTabNacio') 
        && $fGerouNacionalidade == false) {
            $fGerouNacionalidade = true;?>
$this->widget('ext.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link-nacionalidade',
    
    'config' => $aConfig,
    )
);
    
<?php
        }
    }
    echo "?>\n";
}
?>
    
<!-- </div> -->