<? //$this->breadcrumbs= $breadcrumbs; ?>

<div class="row">
	<div class="col-md-12 construcao">
	    <? if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } ?>
	    <h1 class="titulo-interno ubuntu text-colorbase">Meus Favoritos</h1>
	    
	    <p class="text-justify ubuntu text-colorbase">Você não tem nenhum imóvel adicionado aos favoritos.</p>
	</div>
</div>