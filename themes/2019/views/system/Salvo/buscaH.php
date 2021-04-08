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
    "finalidade",
    "estado",
    "cidade",
    "bairro",
    "tipo",
    // "valor",
);

// Indica que tem valor, entao liga os limites
$fTemEstado  = true;
$fTemCidade  = true;
$fTemValor  = false;
$nVlrMinimo = false;
$nVlrMaximo = false;
$nFaixaInicial = false;
$nFaixaFinal = false;
$nIncrementoSlider = false;
$aUfParaCidades = false; // isso para qdo tem so um estado, ja fica com ele na memoria
?>

<div id="buscar">
    <!-- <h3 class="text-center">BUSCA RÁPIDA</h3> -->
    <form action="<?= Yii::app()->createUrl('imovel/buscarapida') ?>" method="post" id="form-buscar">
    <div class="espacamento">
        <?php
        $nLin = 0;
        $nCol = 0;
        foreach($paArrayLegendaCombo as $paLegenda) {
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
                    if(empty($sEstado) ) {
                        // estado constante...
                        $sEstado = Yii::app()->params['uf'];
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
                            if(count($tmp) == 0) {
                                echo '<input type="hidden" name="cidade" value="' . $tmp[0]->cidade . '">';
                                $fTemCidade = false;
                            }
                            /*
                            else {
                                $aOpcao .= '<option value="">Cidade</option>';
                            }
                            */
                        }
                        else {
                            echo '<input type="hidden" id="cidade" value="' . $tmp[0]->cidade . '">';
                            $fTemCidade = false;
                        }
                    }
                    // else {
                    //     echo '<input type="hidden" id="cidade" value="Jaragua do Sul">';
                    //     $fTemCidade = false;
                    // }
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
                    $fCombobox = false;
                    $fTemValor = true;
                    
                    $aOpcao .= '<div class="row" style="margin: 0px auto; width: 80%;">'
                             .      '<span class="col-md-2">Valor:  </span>'
                             .      '<input type="text" id="valor_min" name="valor_min" readonly class="col-md-4 col-md-offset-1" style="padding:0  5px 0 5px; height:23px;margin:5px 7px 0;width:100px;"> '
                             .      '<span class="">a</span>'
                             .      '<input type="text" id="valor_max" name="valor_max" readonly class="col-md-4" style="padding:0  5px 0 5px; height:23px;margin:5px 7px 0;width:100px;"> '
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
                if($fCombobox) { ?>
                    <div class="col-lg-3 col-md-6">
                        <select id="<?= $paLegenda ?>" name="<?= $paLegenda ?>" class="form-control">
                            <?= $aOpcao ?>
                        </select>
                    </div> <?php
                } 
                else { ?>
                    <div class="col-lg-4 col-md-6">
                        <?= $aOpcao ?>
                    </div> <?php 
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
        }?>
            <div class="col-lg-2 col-md-6">
                <input type="text" name="referencia" id="referencia" placeholder="REFERÊNCIA IMÓVEL" class="col-md-12" />
            </div>
            <div class="col-lg-1 col-md-12">
                <button type="submit" class="btn btn-flat btn-block text-center col-md-12 " style="color:#fefefe;" id="busca">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </div> 
    </div>
    </form>
</div>

<?php
if($fTemValor) { ?>
<!--    extraido de: https://jqueryui.com/slider/#hotelrooms-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!--    <link rel="stylesheet" href="/resources/demos/style.css">-->
    
<?php } ?>

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
            });
            return;
<?php       }?>
<?php       if($fTemEstado) { ?>
            // carrega estado
            // jQuery('#busca').html('<button class="btn btn-default">Button</button>');
            jQuery('#estado').html('<option>Aguarde...</option>');
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
            });
            return;
<?php       }?>
<?php       if(!$fTemEstado
            && !$fTemCidade) { ?>
            // carrega bairro
            jQuery('#bairro').html('<option>Aguarde...</option>');
            jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/bairro') ?>", 
                        data: {finalidade: jQuery('#finalidade option:selected').val(), 
                               estado: $("#estado").val(), 
                               cidade: $("#cidade").val() }
            }).done(function (data) {
                jQuery('#bairro').html(data);
<?php           if($fTemValor) { ?>
                getValoresDoAjax();
<?php           }?>
            });
<?php       }?>
<?php       if(!$fTemEstado
            && !$fTemCidade) { ?>
            // carrega tipo
            jQuery('#tipo').html('<option>Aguarde...</option>');
            jQuery.ajax({method: "POST", url: "<?= Yii::app()->createUrl('ajax/tipo') ?>", 
                        data: {finalidade: jQuery('#finalidade option:selected').val(), 
                               estado: $("#estado").val(), 
                               cidade: $("#cidade").val() }
            }).done(function (data) {
                jQuery('#tipo').html(data);
<?php           if($fTemValor) { ?>
                getValoresDoAjax();
<?php           }?>
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
                });
///////////
                jQuery('#tipo').html('<option>Aguarde...</option>');
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
        $("#slider-range").slider('option', 'min', dMin);
        $("#slider-range").slider('option', 'max', dMax);
        // $("#slider-range").slider('option', 'step', nStep);
        $("#slider-range").slider('option', 'values', [nValMin, nValMax]);

        //$("#valor_min").val( converteFloatMoeda( nValMin ) );
        $("#valor_min").val( converteFloatMoeda( dMin ) );
        //$("#valor_max").val( converteFloatMoeda( nValMax ) );
        $("#valor_max").val( converteFloatMoeda( dMax ) );
    }

    function getValoresDoAjax()
    {
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
        });
    }

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
?>
  
</script>