<?php //$this->breadcrumbs= $breadcrumbs;
   //$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>
<div id="fichas" class="row">
<div class="col-md-9 fichas">
    
    <?php if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Fichas de Cadastro</h1>
    
    <div class="links">
        <a class=" btn-primary" href="<?=Yii::app()->createUrl('index.php/ficha-juridica#formulario')?>" title="Ficha Cadastro Pessoa Jurídica" target="_self" style="padding: 10px">Ficha Cadastro Pessoa Jurídica</a>
        <a class=" btn-primary" href="<?=Yii::app()->createUrl('index.php/ficha-fisica#formulario')?>" title="Ficha Cadastro Pessoa Física" target="_self" style="padding: 10px">Ficha Cadastro Pessoa Física</a>
        <a class=" btn-primary" href="<?=Yii::app()->createUrl('index.php/ficha-imovel#formulario')?>" title="Ficha Cadastro de Imóvel" target="_self" style="padding: 10px">Ficha Cadastro de Imóvel</a>
        <a class=" btn-primary" href="<?=Yii::app()->createUrl('index.php/avalie-seu-imovel#formulario')?>" title="Ficha Avalie Meu Imóvel" target="_self" style="padding: 10px">Ficha Avalie Meu Imóvel</a>
    </div>
    
</div>

<?php $this->renderPartial('/system/m_sidebar'); ?>
</div>