<?
    $sFinalidade = Yii::app()->user->hasState('finalidade') ? Yii::app()->user->getState('finalidade') : null ;
    $sEstado     = Yii::app()->user->hasState('estado') ? Yii::app()->user->getState('estado') : null ;
    $sCidade     = Yii::app()->user->hasState('cidade') ? Yii::app()->user->getState('cidade') : null ;
    $sBairro     = Yii::app()->user->hasState('bairro') ? Yii::app()->user->getState('bairro') : null ;
    $sTipo       = Yii::app()->user->hasState('tipo')   ? Yii::app()->user->getState('tipo') : null ;
?>

<div class="col-md-3 sidebar">
    
    <div id="buscar">
        <h3 class="text-center">BUSCA RÁPIDA</h3>
        
        <form action="<?=Yii::app()->createUrl('imovel/buscarapida')?>" method="post">
            
            <div class="espacamento">
                <select id="finalidade" name="finalidade" class="form-control">
                    <? foreach(array('' => 'Finalidade', 'Venda' => 'Venda', 'Locacao' => 'Locação') as $k => $v){ ?>
                        <option value="<?=$k?>" <?=(Yii::app()->user->getState('finalidade') == $k ? 'selected' : null)?>><?=$v?></option>
                    <? } ?>
                </select>
                
                <select id="estado" name="estado" class="form-control">
                    <option value="">Selecione um Estado</option>
                    <?
                        if( !empty($sFinalidade) ){
                            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$sFinalidade.'"', 'group' => 'uf') );
                            foreach($tmp as $k => $v){
                                if( !empty( $v->uf ) ){
                                    echo '<option value="'.$v->uf.'" '.(Yii::app()->user->getState('estado') == $v->uf ? 'selected' : null).'>'.$v->uf.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="">Estado</option>';
                        }
                    ?>
                    
                    
                </select>
                
                <select id="cidade" name="cidade" class="form-control">
                    <option value="">Selecione uma Cidade</option>
                    <?
                        if( !empty($sFinalidade) && !empty($sEstado) ){
                            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$sFinalidade.'" AND uf = "'.$sEstado.'"', 'group' => 'cidade') );
                            foreach($tmp as $k => $v){
                                if( !empty( $v->cidade ) ){
                                    echo '<option value="'.$v->cidade.'" '.(Yii::app()->user->getState('cidade') == $v->cidade ? 'selected' : null).'>'.$v->cidadeBr.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="">Cidade</option>';
                        }
                    ?>
                    
                    
                </select>
                
                <select id="bairro" name="bairro" class="form-control">
                    <option value="">Selecione um Bairro</option>
                    <?
                        if( !empty($sFinalidade) && !empty($sEstado) && !empty($sCidade) ){
                            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$sFinalidade.'" AND uf = "'.$sEstado.'" AND cidade = "'.$sCidade.'"', 'group' => 'bairro') );
                            foreach($tmp as $k => $v){
                                if( !empty( $v->cidade ) ){
                                    echo '<option value="'.$v->bairro.'" '.(Yii::app()->user->getState('bairro') == $v->bairro ? 'selected' : null).'>'.$v->bairroBr.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="">Bairro</option>';
                        }
                    ?>
                </select>
                
                <select id="tipo" name="tipo" class="form-control">
                    <option value="">Selecione um Tipo</option>
                    <?
                        if( !empty($sFinalidade) && !empty($sEstado) && !empty($sCidade) ){
                            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$sFinalidade.'" AND uf = "'.$sEstado.'" AND cidade = "'.$sCidade.'" AND bairro = "'.$sBairro.'"', 'group' => 'tp_bem') );
                            foreach($tmp as $k => $v){
                                if( !empty( $v->cidade ) ){
                                    echo '<option value="'.$v->tp_bem.'" '.(Yii::app()->user->getState('tipo') == $v->tp_bem ? 'selected' : null).'>'.$v->tp_bem.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="">Tipo</option>';
                        }
                    ?>
                    
                </select>
            </div>
            
            <div class="espacamento referencia">
                <input type="text" name="referencia" id="referencia" placeholder="BUSCAR REFERÊNCIA" />
            </div>
            
            <div class="espacamento button">
                <button type="submit" class="btn btn-flat btn-block text-center">BUSCAR</button>
            </div>
        </form>
    </div>
    
    <div id="servicos">
        <h3 class="text-center">SERVIÇOS</h3>
        <ul>
            <li> <a href="<?=Yii::app()->createUrl('/empresa')?>" title="Quem Somos" target="_self">Empresa</a> </li>
            <li> <a href="<?=Yii::app()->createUrl('/favoritos')?>" title="Favoritos" target="_self">Favoritos</a> </li>
            <li> <a href="<?=Yii::app()->createUrl('/trabalhe-conosco')?>" title="Trabalhe Conosco" target="_self">Trabalhe Conosco</a> </li>
            <li> <a href="<?=Yii::app()->createUrl('/fichas-cadastrais')?>" title="Fichas Cadastrais" target="_self">Fichas Cadastrais</a> </li>
            <li> <a href="<?=Yii::app()->createUrl('/avalie-seu-imovel')?>" title="Avalie Sue Imóvel" target="_self">Avalie Seu Imóvel</a> </li>
            <li> <a href="<?=Yii::app()->createUrl('/nos-ligamos-para-voce')?>" title="Nós Ligamos Para Você" target="_self">Nós Ligamos Para Você</a> </li>
        </ul>
    </div>
    
    <div id="linksUteis">
        <h3 class="text-center">LINKS ÚTEIS</h3>
        <ul>
            <li> <a href="http://www.crecipr.gov.br/novo/" title="Comissões do CRECI" target="_blank">Comissões do CRECI</a> </li>
            <li> <a href="http://www.planalto.gov.br/ccivil_03/leis/l8245.htm" title="Lei Inquilinato" target="_blank">Lei Inquilinato</a> </li>
            <li> <a href="http://www.buscacep.correios.com.br/" title="Busca CEP" target="_blank">Busca CEP</a> </li>
            <li> <a href="http://www.portalbrasil.net/igpm.htm" title="Índices IGPM" target="_blank">Índices IGPM</a> </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    /* ATUALIZA ESTADO */
    jQuery('#finalidade').on('change', function(){
        var value = jQuery('option:selected',this).val();
        if( value.length == 0 ){
            jQuery('#estado').html('<option value="">Estado</option>');
            jQuery('#cidade').html('<option value="">Cidade</option>');
            jQuery('#bairro').html('<option value="">Bairro</option>');
            jQuery('#tipo').html('<option value="">Tipo</option>');
        }else{
            jQuery('#estado').html('<option>Aguarde...</option>');
            jQuery.ajax({
                method: "POST",
                url: "<?=Yii::app()->createUrl('ajax/estado')?>",
                data: { finalidade: value }
            }).done(function( data ) {
                jQuery('#estado').html(data);
            });
        }
    });
    
    /* ATUALIZA CIDADE */
    jQuery('#estado').on('change', function(){
        var value = jQuery('option:selected',this).val();
        if( value.length == 0 ){
            jQuery('#cidade').html('<option value="">Cidade</option>');
            jQuery('#bairro').html('<option value="">Bairro</option>');
            jQuery('#tipo').html('<option value="">Tipo</option>');
        }else{
            jQuery('#cidade').html('<option>Aguarde...</option>');
            jQuery.ajax({
                method: "POST",
                url: "<?=Yii::app()->createUrl('ajax/cidade')?>",
                data: { finalidade: jQuery('#finalidade option:selected').val(), estado: value }
            }).done(function( data ) {
                jQuery('#cidade').html(data);
            });
        }
    });
    
    /* ATUALIZA BAIRRO */
    jQuery('#cidade').on('change', function(){
        var value = jQuery('option:selected',this).val();
        if( value.length == 0 ){
            jQuery('#bairro').html('<option value="">Bairro</option>');
            jQuery('#tipo').html('<option value="">Tipo</option>');
        }else{
            jQuery('#bairro').html('<option>Aguarde...</option>');
            jQuery.ajax({
                method: "POST",
                url: "<?=Yii::app()->createUrl('ajax/bairro')?>",
                data: { finalidade: jQuery('#finalidade option:selected').val(), estado: jQuery('#estado option:selected').val(), cidade: value }
            }).done(function( data ) {
                jQuery('#bairro').html(data);
            });
        }
    });
    
    /* ATUALIZA TIPO */
    jQuery('#bairro').on('change', function(){
        var value = jQuery('option:selected',this).val();
        if( value.length == 0 ){
            jQuery('#tipo').html('<option value="">Tipo</option>');
        }else{
            jQuery('#tipo').html('<option>Aguarde...</option>');
            jQuery.ajax({
                method: "POST",
                url: "<?=Yii::app()->createUrl('ajax/tipo')?>",
                data: { finalidade: jQuery('#finalidade option:selected').val(), estado: jQuery('#estado option:selected').val(), cidade: jQuery('#cidade option:selected').val(), bairro: value }
            }).done(function( data ) {
                jQuery('#tipo').html(data);
            });
        }
    });
    
});
</script>