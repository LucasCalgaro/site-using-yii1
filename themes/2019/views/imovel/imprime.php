<?/*= phpinfo();*/?>
<?php $baseUrl = (Yii::app()->theme ? Yii::app()->theme->baseUrl : Yii::app()->request->baseUrl); ?> 
<style>
    *{background:0 0!important;color:#000!important;text-shadow:none!important;filter:none!important;-ms-filter:none!important}body{margin:0;padding:0;line-height:1.4em}.font-p{font-size:13px}.pl{margin:0 15px 0 15px!important}#corretor{display:none!important}#servicos{display:none!important}#cabecalho{display:none!important}#buscar{display:none!important}#rodape{display:none!important}#rodape2{display:none!important}.titulo-interno{font-size:20px}.imgPrincipal{max-width:300px!important}.infoComplementar li{float:left;list-style:outside none none;margin:5px 0;width:25%}
</style> 
<?php $script = 'window.print();';
        Yii::app()->clientscript->registerScript('print', $script, CClientScript::POS_READY);
?> 

<div class="col-md-12 ver-imovel">
    <table border=0 width=100%>
        <tr>
            <th class=text-center colspan=2>
            <h3>
                <span>
                    <?=$model->tipoBr .' para '. $model->finalidade.' em '. $model->cidadeBr.'/'.$model->uf?>
                </span>
            </h3>
        <tr>
        <td> 
            <?php   if( count( $imagem ) > 0 ){ $principal = end(end($imagem)); ?>
			<img class="imgPrincipal img-responsive" src="<?=$principal?>" style="max-width:300px;"/>			
            <?php   }else{ ?>
			<img src="<?=$this->baseUrl?>/img/imovel_visualizar.jpg" alt="" class="imgPrincipal img-responsive" />
            <?php   } ?> 
                        <td>
                            <div class="col-md-12 anuncio">
                                <h2><span>Informações</span></h2>
                            </div>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <strong>REF.:</strong> <?= Util::formata($model->id, 'ref')?> </li> 
                                <?php if(!empty($model->cidade)){ ?> <li><i class="fa fa-caret-right"></i> <strong>Cidade.:</strong> <?=$model->cidadeBr.'/'.$model->uf?> </li> <?php } ?> 
                                <?php if(!empty($model->bairro)){ ?> <li><i class="fa fa-caret-right"></i> <strong>Bairro.:</strong> <?=$model->bairroBr?> </li> <?php } ?> 
                                <?php if($model->trata_endereco == 0){ ?> <li><i class="fa fa-caret-right"></i> <strong>Endereço.:</strong> <?=$model->endereco_1?> 
                                    <?php if(!empty($model->endereco_2)){ echo ' - '.$model->endereco_2; } ?> </li> 
                                <?php } ?> 
                                <li></li> 
                                <?php if(!empty($model->tp_bem)){ ?>    <li><i class="fa fa-caret-right"></i> <strong>Tipo.:</strong> <?=$model->tipoBr?> </li>            <?php } ?> 
                                <?php if(!empty($model->finalidade)){?> <li><i class="fa fa-caret-right"></i> <strong>Finalidade.:</strong> <?=$model->finalidade?> </li>  <?php } ?> 
                                <?php if(!empty($model->aplicacao)){ ?> <li><i class="fa fa-caret-right"></i> <strong>Aplicação.:</strong> <?=$model->aplicacao?> </li>    <?php } ?> 
                                <?php if(!empty($model->estrutura)){ ?> <li><i class="fa fa-caret-right"></i> <strong>Estrutura.:</strong> <?=$model->estrutura?> </li>    <?php } ?> 
                                <?php if(!empty($model->estado)){ ?>    <li><i class="fa fa-caret-right"></i> <strong>Estado.:</strong> <?=$model->estado?> </li>          <?php } ?> 
                                <li></li> 
                                <?php if(!empty($model->vlr_oferta)){ ?> <li><i class="fa fa-caret-right"></i> <strong>Valor.:</strong> <?=Util::formata($model->vlr_oferta, 'real')?> </li> <?php } ?> 
                            </ul>
                        <tr>
                            <td colspan=2><p class=text-danger>Atenção: A disponibilidade e os valores dos imóveis estão sujeitos a alteração sem aviso prévio.</tr> <? if( !empty($model->anuncio) ) { ?> <tr><td colspan=2><div class="col-md-12 anuncio"><h2><span>Anúncio</span></h2><p class=text-justify> <?=nl2br($model->anuncio)?> </div></tr> <? } ?> <? if( !empty($model->descr_adicional) ) { ?> <tr><td><div class="col-md-12 descAdicional"><h2><span>Descrição Adicional</span></h2><p class=text-justify> <?=nl2br($model->descr_adicional)?> </div></tr> <? } ?> <? if( !empty($model->benfeitorias) ) { ?> <tr><td colspan=2 width=100%><div class="col-md-12 anuncio"><h2><span>Benfeitorias</span></h2></div><div class="col-md-12 infoComplementar"style=float:left><p class=text-justify><div class=col-md-12><ul><li><i class="fa fa-check-square-o"></i> <?=implode('</li><li><i class="fa fa-check-square-o"></i> ', array_filter(explode(', ', $model->benfeitorias ))) ?> <?
							?> </ul></div></div></tr> <? } ?> 
                                                        <?php $aProx = array('proximidade', 'proximidade2', 'proximidade3', 'proximidade4', 'proximidade5');
                                                        $proximidades = null;
                                                        foreach($model as $k => $v){
                                                                if( in_array($k, $aProx) ){
                                                                        if( !empty($v) ){
                                                                                $proximidades .= '<li><strong>'.$v.'</strong></li>';
                                                                        }
                                                                }
                                                        }	
?> 
                                                        <? if( !empty($proximidades) ){ ?> <tr><td colspan=2> <?
				echo '<div class="col-md-4">';
				echo '<h5>Na proximidade de:</h5>';
				echo '<ul>';
				echo $proximidades;
				echo '</ul>';
				echo '</div>';
			?> </tr> <? } ?> <tr><td> <?php if(!empty($model->area_total) || !empty($model->area_util)){ ?> <div class=col-md-4><h5>Sobre o Imóvel:</h5><ul> <?php if(!empty($model->area_total) AND ($model->area_total != '0.00')){ ?> <li><strong>Área Total</strong>:<br> <?=$model->area_total ?> mt²</li> <?php }else{ ?> <li><strong>Área Total</strong>:<br>Não informado</li> <?php } ?> <?php if(!empty($model->area_util) AND ($model->area_util != '0.00')){ ?> <li><strong>Área Util</strong>:<br> <?=$model->area_util ?> mt²</li> <?php }else{ ?> <li><strong>Área Util</strong>:<br>Não informado</li> <?php } ?> </ul></div> <?php } ?> </table><hr><table width=100%><tr><td><img alt=Logotipo src="<?=$baseUrl?>/img/logotipo.png"width=130px><td align=center><address class=font-p style="margin:10px 0 0 0">Rua Reinoldo Rau, 49<br>Centro - Jaragua do Sul / SC<br><span class=uniuansheavy>47 - 3371 - 1500</span></address><td><table border=0 align=right><tr><td colspan=5 class=text-center>Plantão<tr class=font-p><td>Vendas<td><p class="font-p pl uniuansheavy">47 - 9639 - 1500<p class="font-p pl uniuansheavy">47 - 9637 - 1500<td>Locação<td><span class="font-p pl uniuansheavy">47 - 9645 - 1500</span></table></table></div>