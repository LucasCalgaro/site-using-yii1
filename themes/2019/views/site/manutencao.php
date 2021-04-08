<? //$this->breadcrumbs= $breadcrumbs; ?>
<? /* QUANDO ENTRAR AQUI, ARMAZENAR URL NA SESSION. IREI USAR ESSA INFORMAÇÃO NA TELA DE VISUALIZAÇÃO DO IMÓVEL */ ?>
<div class="col-md-9 construcao">
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    <h1 class="titulo-interno">Manutenção</h1>
    
    <p class="text-justify">Desculpe. Estamos em manutenção.</p>
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>
