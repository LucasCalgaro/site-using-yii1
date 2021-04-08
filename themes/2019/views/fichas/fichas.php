<? //$this->breadcrumbs= $breadcrumbs; ,
$this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>
<div class="row">
<div class="col-md-9 fichas">
    
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    
    <h1 class="titulo-interno">Fichas de Cadastro</h1>
    
    <div class="links">
        <a class="btn-primary" href="<?=Yii::app()->createUrl('fichas/juridica')?>" title="Ficha Cadastro Pessoa Jurídica" target="_self" style="padding: 10px; font-weight: bold;">Ficha Cadastro Pessoa Jurídica</a>
        <a class="btn-primary" href="<?=Yii::app()->createUrl('fichas/fisica')?>" title="Ficha Cadastro Pessoa Física" target="_self" style="padding: 10px; font-weight: bold;">Ficha Cadastro Pessoa Física</a>
        <a class="btn-primary" href="<?=Yii::app()->createUrl('fichas/imovel')?>" title="Ficha Cadastro de Imóvel" target="_self" style="padding: 10px; font-weight: bold;">Ficha Cadastro de Imóvel</a>
        <a class="btn-primary" href="<?=Yii::app()->createUrl('fichas/avalie')?>" title="Ficha Avalie Meu Imóvel" target="_self" style="padding: 10px; font-weight: bold;">Ficha Avalie Meu Imóvel</a>
    </div>
    
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
</div>