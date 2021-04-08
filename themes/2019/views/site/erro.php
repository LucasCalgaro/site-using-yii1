<? //$this->breadcrumbs= $breadcrumbs; ?>
<div class="row">
	
<div class="col-md-9 construcao">
    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
    <h1 class="titulo-interno">Erro</h1>
    
    <p class="text-justify">Não entendemos a sua solicitação.</p>
    <p class="text-justify">Pode ser uma instabilidade momentanea no website ou uma tentativa maliciosa, vamos redirecionar você para a página principal.</p>
    <p class="text-justify">Caso essa mensagem volte a acontecer, entre em contato conosco informando o problema.</p>
</div>

<? $this->renderPartial('/system/m_sidebar'); ?>

</div>
<!-- <script type="text/javascript">
	setTimeout(function() {
		window.location.replace("<?=Yii::app()->createUrl('/')?>");
	}, 10000);
</script> -->