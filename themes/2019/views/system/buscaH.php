<?php
$sFinalidade = Yii::app()->user->hasState('finalidade') ? Yii::app()->user->getState('finalidade') : null;
$sEstado = Yii::app()->user->hasState('estado') ? Yii::app()->user->getState('estado') : null;
$sCidade = Yii::app()->user->hasState('cidade') ? Yii::app()->user->getState('cidade') : null;
$sBairro = Yii::app()->user->hasState('bairro') ? Yii::app()->user->getState('bairro') : null;
$sTipo = Yii::app()->user->hasState('tipo') ? Yii::app()->user->getState('tipo') : null;
$sValorMin = Yii::app()->user->hasState('valor_min') ? Yii::app()->user->getState('valor_min') : null;
$sValorMax = Yii::app()->user->hasState('valor_max') ? Yii::app()->user->getState('valor_max') : null;
?>

<!-- <div class="col-md-12"> -->
<?php
$paArrayLegendaCombo = array(
    "finalidade"    => 'padrao',
    "estado"        => 'padrao',
    "cidade"        => 'padrao',
    "bairro"        => 'padrao',
    "tipo"          => 'padrao',
    //"valor"         => '', // 'valor', // 'slider',
    //"valor"         => 'slider',
);

// Indica que tem valor, entao liga os limites
$fTemEstado  = true;
$fTemCidade  = true;
$fTemValor  = false;
$fValorSlider = false;
$nVlrMinimo = false;
$nVlrMaximo = false;
$nFaixaInicial = false;
$nFaixaFinal = false;
$nIncrementoSlider = false;
$aUfParaCidades = false; // isso para qdo tem so um estado, ja fica com ele na memoria
if(empty($sEstado) ) {
    // estado constante...
    $sEstado = Yii::app()->params['uf'];
}
?>

<div id="buscar">
    <!-- <h3 class="text-center">BUSCA RÁPIDA</h3> -->
    <form action="<?= Yii::app()->createUrl('imovel/buscarapida') ?>#corpo" method="post" id="form-buscar">
    <div class="espacamento">
        <?php
        $nLin = 0;
        $nCol = 0;
        foreach($paArrayLegendaCombo as $paLegenda => $aValorLegenda) {
            $aOpcao = false;
            $fCombobox = true;
            switch($paLegenda) {
                case "finalidade" :
                    foreach (array('' => 'Finalidade', 'Venda' => 'Venda', 'Locacao' => 'Locação') as $k => $v) {
                        $aOpcao .= '<option value="' . $k . '" '
                                . (Yii::app()->user->getState('finalidade') == $k ? 'selected' : false) 
                                . '>' 
                                . $v 
                                . '</option>';
                    }
                    break;
                    
                case "estado" :
                    // Testa se ha mais de uma cidade na base
                    $tmp = Imovel::model()->getAllEstadosDaFederacao();
                    if(isset($tmp) ) {
                        if(count($tmp) > 1) {
                            $aOpcao .= '<option value="">Selecione um Estado</option>';
                            if (!empty($sFinalidade)) {
                                $tmp = Imovel::model()->getAllEstadosDaFederacao($sFinalidade);
                                foreach ($tmp as $k => $v) {
                                    if(!empty($v->uf)) {
                                        $aOpcao .= '<option value="' . $v->uf . '" '
                                                . (Yii::app()->user->getState('estado') == $v->uf ? 'selected' : false) 
                                                . '>' 
                                                . $v->uf
                                                . '</option>';
                                    }                            
                                }
                            } else {
                                $aOpcao .= '<option value="">Estado</option>';
                            }
                        }
                        else {
                            echo '<input type="hidden" id="estado" value="' . $tmp[0]->uf . '">';
                            $aUfParaCidades = $tmp[0]->uf;
                            $fTemEstado  = false;
                        }
                    }
                    else {
                        echo '<input type="hidden" id="estado" value="'.Yii::app()->params['uf'].'">';
                        $aUfParaCidades = Yii::app()->params['uf'];
                        $fTemEstado  = false;
                    }
                    break;
                    
                case "cidade" :
                    $tmp = Imovel::model()->getAllCidades($aUfParaCidades);
                    if(isset($tmp) ) {
                        if(count($tmp) > 1) {
                            $aOpcao .= '<option value="">Selecione uma Cidade</option>';
                            $tmp = Imovel::model()->getAllCidades($sEstado, $sFinalidade);
                            if(count($tmp) >= 1
                            && $sFinalidade != null
                            && $sEstado != null) {
                                foreach($tmp as $k => $v) {
                                    if(!empty($v->cidade)) {
                                        $aOpcao .= '<option value="' . $v->cidade . '" '
                                                . (Yii::app()->user->getState('cidade') == $v->cidade ? 'selected' : Yii::app()->params['uf']) 
                                                . '>' 
                                                . $v->cidadeBr
                                                . '</option>';
                                    }
                                }
                            }
                            else
                            if(count($tmp) == 1) {
                                echo '<input type="hidden" name="cidade" value="' . $tmp[0]->cidade . '">';
                                $fTemCidade = false;
                            }
                            /*
                            else {
                                $aOpcao .= '<option value="">Cidade</option>';
                            }
                            */
                        }
                        else 
                        if(count($tmp) == 1){
                            echo '<input type="hidden" id="cidade" value="' . $tmp[0]->cidade . '">';
                            $fTemCidade = false;
                        }
                        else {
                            echo '<input type="hidden" id="cidade" value="'. Yii::app()->params['Cidade'].'">';
                            $fTemCidade = false;
                        }
                    }
                    else {
                        echo '<input type="hidden" id="cidade" value="'. Yii::app()->params['Cidade'].'">';
                        $fTemCidade = false;
                    }
                    break;
                
                case "bairro" :
                    $aOpcao .= '<option value="">Selecione um Bairro</option>';
                    if(!empty($sFinalidade) 
                    && !empty($sEstado) 
                    && !empty($sCidade)) {
                        $tmp = Imovel::model()->findAll(array('condition' => 'finalidade = "' . $sFinalidade . '" AND cidade = "' . $sCidade . '"', 'group' => 'bairro'));
                        foreach ($tmp as $k => $v) {
                            if (!empty($v->bairro)) {
                                $aOpcao .= '<option value="' . $v->bairro . '" '
                                        . (Yii::app()->user->getState('bairro') == $v->bairro ? 'selected' : false) 
                                        . '>' 
                                        . $v->bairro
                                        . '</option>';
                            }
                        }
                    } else {
                        $aOpcao .= '<option value="">Bairro</option>';
                    }
                    break;
                
                case "tipo" :
                    $aOpcao .= '<option value="">Selecione um Tipo</option>';
                    // if(!empty($sFinalidade) && !empty($sEstado) && !empty($sCidade)) {
                    if(!empty($sFinalidade) && !empty($sCidade)) {
                        // $tmp = Imovel::model()->findAll(array('condition' => 'finalidade = "' . $sFinalidade . '" AND cidade = "' . $sCidade . '" AND bairro = "' . $sBairro . '"', 'group' => 'tp_bem'));
                        $tmp = Imovel::model()->findAll(array('condition' => 'finalidade = "' . $sFinalidade . '" AND cidade = "' . $sCidade . '"', 'group' => 'tp_bem'));
                        foreach ($tmp as $k => $v) {
                            if (!empty($v->tp_bem)) {
                                $aOpcao .= '<option value="' . $v->tp_bem . '" '
                                        . (Yii::app()->user->getState('tipo') == $v->tp_bem ? 'selected' : false) 
                                        . '>' 
                                        . $v->tp_bem
                                        . '</option>';
                            }
                        }
                    } else {
                        $aOpcao .= '<option value="">Tipo</option>';
                    }
                    break;
                
                case "valor" :
                    if(!isset($aValorLegenda) 
                    || $aValorLegenda == 'slider') {
                        $fCombobox = false;
                        $fTemValor = true;
                        $fValorSlider = true;

                        $aOpcao .= '<div class="row" style="margin: 0px auto; width: 80%;">'
                                 .      '<span class="col-2">Valor:  </span>'
                                 .      '<input type="text" id="valor_min" name="valor_min" readonly class="col-md-4 col-sm-4 col-xs-4 col-md-offset-1" style="padding:0  5px 0 5px; height:23px;margin:5px 7px 0;width:100px;"> '
                                 .      '<span class="col-1">a</span>'
                                 .      '<input type="text" id="valor_max" name="valor_max" readonly class="col-md-4 col-sm-4 col-xs-4" style="padding:0  5px 0 5px; height:23px;margin:5px 7px 0;width:100px;"> '
                                 . '</div>'
                                 . '<div style="margin: 5px 15px 0;" id="slider-range" name="slider-range"></div>';

                        $nVlrMinimo = abs(Imovel::model()->getMenorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
                        $nVlrMaximo = abs(Imovel::model()->getMaiorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
                        //$nIncrementoSlider = ($nVlrMaximo - $nVlrMinimo) / 20;
                        $nIncrementoSlider = ($nVlrMaximo - $nVlrMinimo) / 100;
                        //$nIncrementoSlider = 10;
                        $nIncrementoSlider = round($nIncrementoSlider, 0, PHP_ROUND_HALF_EVEN);
                        // $nFaixaInicial = !empty($sValorMin) ? Imovel::getValorSemPontos($sValorMin) : $nVlrMinimo + ($nIncrementoSlider * 1);
                        $nFaixaInicial = !empty($sValorMin) ? Imovel::model()->getValorSemPontos($sValorMin) : $nVlrMinimo + ($nIncrementoSlider * 20);
                        // $nFaixaFinal   = !empty($sValorMax) ? Imovel::getValorSemPontos($sValorMax) : $nVlrMinimo + ($nIncrementoSlider * 100);
                        $nFaixaFinal   = !empty($sValorMax) ? Imovel::model()->getValorSemPontos($sValorMax) : $nVlrMinimo + ($nIncrementoSlider * 80);
                    }
                    else {
                        // recebe valores
                        $fCombobox = false;
                        $fTemValor = true;

                        $aOpcao .= ''
                                .'<span class="val-span col-sm-1 col-3">Valor:  </span>'
                                .'<input type="text"  name="valor_min" class="val-min col-xl-4 col-lg-3 col-md-4 col-sm-3 col-8" style="padding: 0 5px 0 5px; height:30px;" onkeypress="mascara(this,moeda)"> '
                                .'<span class="a-span col-sm-1 col-3">a</span>'
                                .'<input type="text"  name="valor_max" class="col-xl-5 col-lg-4 col-md-5 col-sm-4 col-9 offset-sm-0 offset-1" style="padding:0 5px 0 5px; height:30px;" onkeypress="mascara(this,moeda)"> '
                                .''
                                .'<div style="margin-top: 5px;" id="slider-range" name="slider-range"></div>';
                        
                        
                        // $aOpcao .= '<div class="row">'
                        //          .      '<span class="col-md-1">Valor:  </span>'
                        //          .      '<input type="text"  name="valor_min" class="col-md-4 col-md-offset-1" style="padding:0  5px 0 5px; height:23px;" onkeypress="mascara(this,moeda)"> '
                        //          .      '<span class="col-md-1">a</span>'
                        //          .      '<input type="text"  name="valor_max"  class="col-md-4" style="padding:0  5px 0 5px; height:23px;" onkeypress="mascara(this,moeda)"> '
                        //          . '</div>'
                        //          . '<div style="margin-top: 5px;" id="slider-range" name="slider-range"></div>';

                        $nVlrMinimo = abs(Imovel::model()->getMenorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
                        $nVlrMaximo = abs(Imovel::model()->getMaiorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
                    }
                    break;
            }
            
            if(strlen($aOpcao) > 0) {
                // deve colocar opcao ...
                if($nLin == 0
                || $nCol >= 3) {
                    if($nLin > 0) {
                        // Coloca busca por referencia
                        // echo '<div class="col-md-3">' . "\n";
                        // echo    '<input type="text" name="referencia" id="referencia" placeholder="REFERÊNCIA IMÓVEL" class="col-md-12" />' . "\n";
                        // echo '</div>' . "\n";

                        echo '</div>' . "\n";
                    }
                    echo '<div class="row">' . "\n";
                    $nCol = 0;
                    $nLin++;
                }
                if($fCombobox) {
                    echo '<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">' . "\n";
                        echo    '<select id="' . $paLegenda . '" name="' . $paLegenda . '" class="form-control">' . "\n";
                        echo        $aOpcao . "\n";
                        echo    '</select>' . "\n";
                    echo '</div>' . "\n";
                }
                else {
                echo '<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">' . "\n";
                    echo        $aOpcao;
                echo '</div>' . "\n";
                }
                $nCol++;
            }
        }

        if($nLin == 0
        || $nCol > 3) {
            if($nLin > 0) {
                
                echo '</div>' . "\n"; // fecha linha
            }
            echo '<div class="row">' . "\n";
        } ?>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <input type="text" name="referencia" id="referencia" placeholder="REF. IMÓVEL" class="col-md-12" />
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <button type="submit" id="busca" class="btn btn-flat btn-block text-center col-md-12">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <?php
        /*
        echo '<div class="col-md-3">';
        echo    '<input type="text" name="referencia" id="referencia" placeholder="BUSCAR REFERÊNCIA" class="col-md-1" />';
        echo '</div>';
        */?>
        </div><!--// fecha linha-->
        
    </div>
    </form>
</div>

<?php
if($fTemValor 
&& $fValorSlider) {
    // extraido de: https://jqueryui.com/slider/#hotelrooms
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">' . "\n";
    //echo '<link rel="stylesheet" href="/resources/demos/style.css">' . "\n";
    echo '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>' . "\n";
    echo '<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>' . "\n";
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {

        /* TRATANDO FINALIDADE: Estado, Cidade e Bairro */
        jQuery('#finalidade').on('change', function () {
            var value = jQuery('option:selected', this).val();
            
<?php       if($fTemValor) { ?>
                setValores(<?=$nVlrMinimo?>, <?=$nVlrMaximo?>);
<?php       }?>
            if (value.length == 0) {
<?php           if($fTemEstado) { ?>
                    jQuery('#estado').html('<option value="">Estado</option>');
<?php           }?>
<?php           if($fTemCidade) { ?>
                    jQuery('#cidade').html('<option value="">Cidade</option>');
<?php           }?>
                jQuery('#bairro').html('<option value="">Bairro</option>');
                jQuery('#tipo').html('<option value="">Tipo</option>');
                return;
            } 
<?php       if(!$fTemEstado
            && $fTemCidade) { ?>
            // estado e fixo, carrega cidade
            jQuery('#cidade').html('<option>Aguarde...</option>');
            setDesativaBotaoEnviar();
            jQuery.ajax({
                method: "POST",
                url: "<?= Yii::app()->createUrl('ajax/cidade') ?>",
                data: {finalidade: value,
                       estado: $("#estado").val() }
            }).done(function (data) {
                jQuery('#cidade').html(data);
                jQuery('#bairro').html('<option value="">Bairro</option>');
                jQuery('#tipo').html('<option value="">Tipo</option>');
<?php           if($fTemValor) { ?>
                    getValoresDoAjax();
<?php           }?>
                setAtivaBotaoEnviar();
            });
            return;
<?php       }?>
<?php       if($fTemEstado) { ?>
            // carrega estado
            // jQuery('#busca').html('<button class="btn btn-default">Button</button>');
            jQuery('#estado').html('<option>Aguarde...</option>');
            setDesativaBotaoEnviar();
            jQuery.ajax({
                method: "POST",
                url: "<?= Yii::app()->createUrl('ajax/estado') ?>",
                data: {finalidade: value}
            }).done(function (data) {
                jQuery('#estado').html(data);
                jQuery('#cidade').html('<option value="">Cidade</option>');
                jQuery('#bairro').html('<option value="">Bairro</option>');
                jQuery('#tipo').html('<option value="">Tipo</option>');
<?php           if($fTemValor) { ?>
                getValoresDoAjax();
<?php           }?>
                setAtivaBotaoEnviar();
            });
            return;
<?php       }?>
<?php       if(!$fTemEstado
            && !$fTemCidade) { ?>
            // carrega bairro
            jQuery('#bairro').html('<option>Aguarde...</option>');
            setDesativaBotaoEnviar();
            jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/bairro') ?>", 
                        data: {finalidade: jQuery('#finalidade option:selected').val(), 
                               estado: $("#estado").val(), 
                               cidade: $("#cidade").val() }
            }).done(function (data) {
                jQuery('#bairro').html(data);
<?php           if($fTemValor) { ?>
                getValoresDoAjax();
<?php           }?>
                setAtivaBotaoEnviar();
            });
<?php       }?>
<?php       if(!$fTemEstado
            && !$fTemCidade) { ?>
            // carrega tipo
            jQuery('#tipo').html('<option>Aguarde...</option>');
            setDesativaBotaoEnviar();
            jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/tipo') ?>", 
                        data: {finalidade: jQuery('#finalidade option:selected').val(), 
                               estado: $("#estado").val(), 
                               cidade: $("#cidade").val() }
            }).done(function (data) {
                jQuery('#tipo').html(data);
<?php           if($fTemValor) { ?>
                getValoresDoAjax();
<?php           }?>
                setAtivaBotaoEnviar();
            });
<?php       }?>

        });

<?php   if($fTemEstado) { ?>
        /* TRATANDO ESTADO: Cidade, Bairro e Tipo */
        jQuery('#estado').on('change', function () {
            var value = jQuery('option:selected', this).val();
            if (value.length == 0) {
                jQuery('#cidade').html('<option value="">Cidade</option>');
                jQuery('#bairro').html('<option value="">Bairro</option>');
                jQuery('#tipo').html('<option value="">Tipo</option>');
            } else {
                jQuery('#cidade').html('<option>Aguarde...</option>');
                setDesativaBotaoEnviar();
                jQuery.ajax({
                    method: "POST",
                    url: "<?= Yii::app()->createUrl('ajax/cidade') ?>",
                    data: {finalidade: jQuery('#finalidade option:selected').val(), estado: value}
                }).done(function (data) {
                    jQuery('#cidade').html(data);
                    jQuery('#bairro').html('<option value="">Bairro</option>');
                    jQuery('#tipo').html('<option value="">Tipo</option>');
<?php               if($fTemValor) { ?>
                    getValoresDoAjax();
<?php               }?>
                    setAtivaBotaoEnviar();
                });
            }
        });
<?php   }?>

<?php   if($fTemCidade) { ?>
        /* TRATANDO CIDADE */
        jQuery('#cidade').on('change', function () {
            var value = jQuery('option:selected', this).val();
            if (value.length == 0) {
                jQuery('#bairro').html('<option value="">Bairro</option>');
                // jQuery('#tipo').html('<option value="">Tipo</option>');
            } else {
                jQuery('#bairro').html('<option>Aguarde...</option>');
                setDesativaBotaoEnviar();
                jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/bairro') ?>", 
                            data: {finalidade: jQuery('#finalidade option:selected').val(), 
<?php           if(!$fTemEstado) { ?>
                                   estado: $("#estado").val(),
<?php           } else { ?>
                                   estado: jQuery('#estado option:selected').val(), 
<?php           }?>
                                   cidade: value}
                }).done(function (data) {
                    jQuery('#bairro').html(data);
<?php               if($fTemValor) { ?>
                    getValoresDoAjax();
<?php               }?>
                    setAtivaBotaoEnviar();
                });
///////////
                jQuery('#tipo').html('<option>Aguarde...</option>');
                setDesativaBotaoEnviar();
                jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/tipo') ?>", 
                            data: {finalidade: jQuery('#finalidade option:selected').val(), 
<?php           if(!$fTemEstado) { ?>
                                   estado: $("#estado").val(),
<?php           } else { ?>
                                   estado: jQuery('#estado option:selected').val(), 
<?php           }?>
<?php           if(!$fTemCidade) { ?>
                                   cidade: $("#cidade").val(),
<?php           } else { ?>
                                   cidade: jQuery('#cidade option:selected').val(),
<?php           }?>
                                   bairro: jQuery('#bairro option:selected').val() }
                }).done(function (data) {
                    jQuery('#tipo').html(data);
<?php               if($fTemValor) { ?>
                    getValoresDoAjax();
<?php               }?>
                    setAtivaBotaoEnviar();
                });
                jQuery('#tipo').html('<option value="">Tipo</option>');
            }
        });
<?php   }?>
///////////
        
        /* TRATANDO BAIRRO */
        jQuery('#bairro').on('change', function () {
            var value = jQuery('option:selected', this).val();
            if (value.length == 0) {
                jQuery('#tipo').html('<option value="">Tipo</option>');
            } else {
                jQuery('#tipo').html('<option>Aguarde...</option>');
                setDesativaBotaoEnviar();
                jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/tipo') ?>", 
                            data: {finalidade: jQuery('#finalidade option:selected').val(), 
<?php           if(!$fTemEstado) { ?>
                                   estado: $("#estado").val(),
<?php           } else { ?>
                                   estado: jQuery('#estado option:selected').val(), 
<?php           }?>
<?php           if(!$fTemCidade) { ?>
                                   cidade: $("#cidade").val(),
<?php           } else { ?>
                                   cidade: jQuery('#cidade option:selected').val(),
<?php           }?>
                                   bairro: jQuery('#bairro option:selected').val() }
                }).done(function (data) {
                    jQuery('#tipo').html(data);
<?php               if($fTemValor) { ?>
                    getValoresDoAjax();
<?php               }?>
                    setAtivaBotaoEnviar();
                });
            }
        });
        
<?php   if($fTemValor) { ?>
        /* TRATANDO TIPO */
            jQuery('#tipo').on('change', function () {
                var value = jQuery('option:selected', this).val();
                if(value.length != 0) {
                  getValoresDoAjax();
                }
            });
<?php   }?>
        
    });
  
    function setDesativaBotaoEnviar()
    {
        $("#busca").attr("disabled", true);
    }
  
    function setAtivaBotaoEnviar()
    {
        $("#busca").attr("disabled", false);
    }
  
<?php
if($fTemValor) {
?>
    function converteFloatMoeda(valor){
        var inteiro = null, decimal = null, c = null, j = null;
        var aux = new Array();
        valor = ""+valor;
        c = valor.indexOf(".",0);
        if(c > 0){
            inteiro = valor.substring(0,c);
            decimal = valor.substring(c+1,valor.length);
        }else{
            inteiro = valor;
        }
        for (j = inteiro.length, c = 0; j > 0; j-=3, c++){
            aux[c]=inteiro.substring(j-3,j);
        }
        inteiro = "";
        for(c = aux.length-1; c >= 0; c--){
            inteiro += aux[c]+'.';
        }
        inteiro = inteiro.substring(0,inteiro.length-1);
        decimal = parseInt(decimal);
        if(isNaN(decimal)){
            decimal = "00";
        }else{
            decimal = ""+decimal;
            if(decimal.length === 1){
                decimal = decimal+"0";
            }
        }
        //valor = "R$ "+inteiro+","+decimal;
        valor = inteiro;
        return valor;
    }

    function setValores(dMin, dMax)
    {
        if(dMin >= dMax) {
            var nStep = 0;
            var nValMin = dMin;
            var nValMax = dMax;
        }
        else {
            var nStep = parseInt( (dMax - dMin) / 20 );
            var nValMin = dMin + (nStep*0);
            // var nValMin = dMin + (nStep*5);
            // var nValMax = dMin + (nStep*15);
            var nValMax = dMin + (nStep*100);
        }
<?php
        if($fValorSlider == true) {
            // valor em acceot 
?>
            $("#slider-range").slider('option', 'min', dMin);
            $("#slider-range").slider('option', 'max', dMax);
            // $("#slider-range").slider('option', 'step', nStep);
            $("#slider-range").slider('option', 'values', [nValMin, nValMax]);
<?php
        }
?>
        //$("#valor_min").val( converteFloatMoeda( nValMin ) );
        $("#valor_min").val( converteFloatMoeda( dMin ) );
        //$("#valor_max").val( converteFloatMoeda( nValMax ) );
        $("#valor_max").val( converteFloatMoeda( dMax ) );
    }

    function getValoresDoAjax()
    {
        setDesativaBotaoEnviar();
        jQuery.ajax({
            method: "POST",
            url: "<?= Yii::app()->createUrl('ajax/faixaValor') ?>",
            data: {finalidade: jQuery('#finalidade option:selected').val(),
<?php           if(!$fTemEstado) { ?>
                   estado: $("#estado").val(),
<?php           } else { ?>
                   estado: jQuery('#estado option:selected').val(), 
<?php           }?>
<?php           if(!$fTemCidade) { ?>
                   cidade: $("#cidade").val(),
<?php           } else { ?>
                   cidade: jQuery('#cidade option:selected').val(),
<?php           }?>
                   bairro: jQuery('#bairro option:selected').val(),
                   tipo: jQuery('#tipo option:selected').val() }
        }).done(function (data) {
            setValores( parseInt(data.split("|")[0]), parseInt( data.split("|")[1]) );
            setAtivaBotaoEnviar();
        });
    }

<?php
    if($fValorSlider == true) {
        // valor em acceot 
?>
        $( function() {
            $("#slider-range").slider({
              range: true,
              min: <?=$nVlrMinimo?>,
              max: <?=$nVlrMaximo?>,
              // step: <?=$nIncrementoSlider?>,
              animate: true,
              values: [ <?=$nFaixaInicial?>, <?=$nFaixaFinal?> ],
              slide: function( event, ui ) {
                //$("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $("#valor_min").val( converteFloatMoeda( ui.values[0] ) );
                $("#valor_max").val( converteFloatMoeda( ui.values[1] ) );
                //console.log(ui.values);
              }
            });
            $("#valor_min").val( converteFloatMoeda( $("#slider-range").slider("values", 0 ) ) );
            $("#valor_max").val( converteFloatMoeda( $("#slider-range").slider("values", 1 ) ) );
            /*
            $("#amount").val( " R$ "   + $("#slider-range").slider("values", 0 ) +
                              " a R$ " + $("#slider-range").slider("values", 1 ) );
            */
        } );
<?php
    }
    else {
        // valor em acceot 
?>
        function mascara(o,f)
        {
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }

        function execmascara()
        {
            v_obj.value=v_fun(v_obj.value)
        }

        function moeda(v)
        {
            v=v.replace(/\D/g,"") // permite digitar apenas numero

            v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 4 digitos
            return v;
        } 

<?php
    }
}
?>
  
</script>