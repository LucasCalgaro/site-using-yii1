<?php $empresaText= Yii::app()->params['textoEmpresa']; 
?>

    <div class="col-md-3 sidebar" style="margin-top:70px; color: #fff">
        <div id="servicos">
            <h3 class="text-center">SERVIÇOS</h3>
            <ul class="text-center"> <?php 
            
                if (Yii::app()->params['textoEmpresa']){ ?> 
                    <li><a href="<?=Yii::app()->createUrl('site/empresa')?>#corpo" title="Quem Somos" target="_self">Quem somos</a></li> <?php 
                } ?>
                <li><a href="<?=Yii::app()->createUrl('imovel/venda')?>#corpo" title="Imóveis à Venda" target="_self">Venda</a>
                <li><a href="<?=Yii::app()->createUrl('imovel/locacao')?>#corpo" title="Imóveis à Locação" target="_self">Locação</a>
                <li><a href="<?=Yii::app()->createUrl('imovel/favoritos')?>#corpo" title="Favoritos" target="_self">Meus Favoritos</a></li>
                <li><a href="<?=Yii::app()->createUrl('site/contato')?>#corpo" title="Fale Conosco" target="_self">Contato</a></li>
            </ul>
        </div>
    </div>
