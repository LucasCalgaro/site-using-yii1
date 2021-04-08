<style type="text/css">span .hr{border-bottom: 1px solid #900}.Listtipo{float: left;list-style: outside none none;width: 160px;}.monuments label {background-image:url(http://mockup.fastbooking.com/location/css/radio.png);-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}.monuments input[type=radio] {display:none;}.monuments input[type=radio] + label {padding-left:20px;margin-bottom:5px;height:15px;display:inline-block;line-height:15px;background-repeat:no-repeat;background-position: 0 0;font-size:15px;vertical-align:middle;cursor:pointer;}.monuments input[type=radio]:checked + label {background-position: 0 -15px;}.map_canvas {float:left; width:100%;height:450px;clear:both;margin: 0;}.places { width:100%;margin:20px 0 0 20px;z-index: 999;}.monuments, .places_list {float: right;	margin: 0;	padding: 0;	width:100%;	clear:both;}
    .places_list {	margin-top: 20px;font-size: 12px;height: auto;max-height: 250px;	overflow-x: auto;}.place_item {cursor:pointer;padding:2px 0 4px 0;float:left;	width:100%;	clear:both;	word-wrap: break-word;}.place_item:hover > strong {background:#333;color:#fff;}.place_item > strong {float:left;width:80%;padding:2px 0 2px 5px;font-weight: bold;text-shadow: none;font-size: 1em;clear: none;display: inline;}img.place_picto {margin-right: 5px;vertical-align: middle;float:left;width:15px;}div.route div.field { display:inline-block; }div.route div.submit { margin-left:40px; }.itineraryPanel { position:relative; display:none; }.itineraryPanel > div.print_itinerary { position:absolute; right:10px; top:18px; }.itineraryPanel > div.print_itinerary.walking { top:82px; }.adp, .adp table { width:100%; }dd{border-bottom: 1px solid #cfcfcf;padding: 2px 0 5px 4px;}dt{background: #ebebeb;padding: 5px}.dl{list-style: none;transition:  all 1s; margin: 0 0 0px;}.dl:hover{background: #f0f0f0;transition: all 1s;}.modal-backdrop{z-index: 9;}
</style>

<?php
// $this->breadcrumbs = $breadcrumbs; 
$this->setPageTitle($model->tp_bem . ' para ' . $model->finalidadeBr . ' em ' . $model->cidadeBr . ' ' . $model->uf . ' - ' . utf8_encode($model->bairroBr) . ' | ' . Yii::app()->params['Imobiliaria']);
?>
<div class="row">

    <div class="col-md-9 ver-imovel" id="impressao">

        <?php
        if (isset($this->breadcrumbs)) {
            $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs));
        }
        ?>
        <h1 class="titulo-interno" id="<?= Util::formata($model->id, 'ref') ?>"><?= $model->tp_bem . ' para ' . Util::getStringUTF8($model->finalidadeBr) . ' em ' . Util::getStringUTF8($model->cidade) . '/' . $model->uf ?></h1>

        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach ($flashMessages as $key => $message) {
                echo '<div class="alert alert-' . $key . '" role="alert">' . $message . '</div>';
            }
        }
        ?>
        <div class="row">
            <div class="col-md-5 galeria">

                <?php
                $aImg = substr($model->aImagem, 0, -1);
                $Img = explode("|", $aImg);
                $total = count($Img);
                $r = end($Img);
                if (!empty($aImg)) {
                    // print_r($total);
                    if ($total == '1') {
                        $s = 'Foto';
                    } else {
                        $s = 'Fotos';
                    }
                    ?>
                    <!-- <div class="field is-grouped is-grouped-multiline">
                      <div class="control">
                        <div class="tags has-addons">
                          <span class="tag is-dark"><?= $s ?></span>
                          <span class="tag is-info"><?= $total ?></span>
                        </div>
                      </div>
                    </div> -->
                    <span class="tag">
                    <?= $total . ' ' . $s ?>
                    </span>
                    <?php
                    // echo '<span class="badge badge-light text-right">'. $total.' '. $s. '</span>';
                    // echo '<p class="text-right label label-default">'. $total.' '. $s. '</p>';
                    if (strstr($r, 'r')) {
                        echo '<a class="fancybox" href="http://encontraimoveis.com.br/img/' . $r . '">
                                <img class="imgPrincipal img-responsive" src="http://encontraimoveis.com.br/img/' . $r . '" alt=""/>
                                <button type="button" data-toggle="modal" data-target="#album" class="btn red darken-2 btn-block "><i class="fa fa-picture-o"></i> Abrir Galeria de Fotos</button>
                                </a>';
                    } else {
                        echo '  <a class="fancybox" href="http://encontraimoveis.com.br/img/' . $Img[0] . '">
                                <img class="imgPrincipal img-responsive" src="http://encontraimoveis.com.br/img/' . $Img[0] . '" alt=""/>
                                <button type="button" data-toggle="modal" data-target="#album" class="btn red darken-2 btn-block "><i class="fa fa-picture-o"></i> Abrir Galeria de Fotos</button>
                                </a>';
                    }
                    echo'<div class="hidden d-none">';
                    for ($i = 0; $i < $total; $i++) {
                        echo '<a class="fancybox" href="http://encontraimoveis.com.br/img/' . $Img[$i] . '">
                                <img src="http://encontraimoveis.com.br/img/' . $Img[$i] . '" alt=""/>
                                </a>';
                    }
                    echo '</div>';
                }
                else {
                    echo'<div>';
                    echo    '<img src="' . $this->baseUrl . '/img/imovel-sem-foto3.jpg" alt="" style="width:100%">';
                    echo '</div>';
                }
                ?>
            </div>


            <div class="col-md-7 informacoes">
                <div class="redesocial pull-right text-center">
                    <h2>REDE SOCIAL</h2>
                    <div class="fb-share-button" data-href="<?= $this->origem ?>" data-layout="button_count" ></div> <br />
                    <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?= $this->origem ?>"></div>
                </div>

                <h2>Informações</h2>

                <ul>
                    <li> <i class="fa fa-caret-right"></i> <strong>REF.:</strong> <?= Util::formata($model->id, 'ref') ?> </li>
                    <?php if (!empty($model->cidade)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Cidade.:</strong> <?= Util::getStringUTF8($model->cidade) . '/' . $model->uf ?> </li> <? } ?>
                    <?php if (!empty($model->bairro)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Bairro.:</strong> <?= utf8_encode($model->bairro) ?> </li> <? } ?>
                    <?php if ($model->trata_endereco == 0) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Endereço.:</strong> <?= utf8_encode($model->endereco_1) ?> <? if(!empty($model->endereco_2)){ echo ' - '.$model->endereco_2; } ?> </li> <? } ?>
                    <li>&nbsp;</li>
                    <?php if (!empty($model->tp_bem)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Tipo.:</strong> <?= $model->tp_bem ?> </li> <? } ?>
                    <?php if (!empty($model->finalidadeBr)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Finalidade.:</strong> <?= Util::getStringUTF8($model->finalidadeBr) ?> </li> <? } ?>
                    <?php if (!empty($model->aplicacao)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Aplicação.:</strong> <?= Util::getStringUTF8($model->aplicacao) ?> </li> <? } ?>
                    <?php if (!empty($model->estrutura)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Estrutura.:</strong> <?= Util::getStringUTF8($model->estrutura) ?> </li> <? } ?>
                    <?php if (!empty($model->estado)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Estado.:</strong> <?= Util::getStringUTF8($model->estado) ?> </li> <? } ?>
                    <li>&nbsp;</li>
                    <?php if (!empty($model->observacao1) || !empty($model->observacao2) || !empty($model->observacao3) || !empty($model->observacao4)) { ?> <strong>Observações:</strong> <?php } ?>
                    <?php if (!empty($model->observacao1)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= utf8_encode($model->observacao1) ?> </li> <? } ?>
                    <?php if (!empty($model->observacao2)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= utf8_encode($model->observacao2) ?> </li> <? } ?>
                    <?php if (!empty($model->observacao3)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= utf8_encode($model->observacao3) ?> </li> <? } ?>
                    <?php if (!empty($model->observacao4)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= utf8_encode($model->observacao4) ?> </li> <? } ?>
                    <?php if (!empty($model->vlr_oferta)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Valor.:</strong> <?= Util::formata($model->vlr_oferta, 'real') ?> </li> <? }  ?>
                    <li>&nbsp;</li>
                    <li><p class="text-danger">Atenção: A disponibilidade e os valores dos imóveis estão sujeitos a alteração sem aviso prévio.</p></li>
                </ul>
            </div>
        </div>

        <div class="row">
<?php if (!empty($model->anuncio)) { ?>
                <div class="col-md-12 anuncio">
                    <h2><span>Anúncio</span></h2>
                    <p class="text-justify">
                <?= Imovel::model()->getStringUf8($model->anuncio) ?>
                    </p>
                </div>
<?php } ?>
        </div>

        <div class="row">
<?php if (!empty($model->descr_adicional)) { ?>
                <div class="col-md-12 descAdicional">
                    <h2><span>Descrição Adicional*</span></h2>
                    <p class="text-justify">
                <?= $model->descr_adicional ?>
                    </p>
                </div>
<?php } ?>
        </div>


        <div class="row">
            <div class="col-md-12 infoComplementar">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($model->benfeitorias)) { ?>
                            <h2><span>Benfeitorias</span></h2>
                            <p class="text-justify">
                            <div class="col-md-12">
                                <ul>
                                    <li><i class="fas fa-check-square"></i>
                       <?= implode('</li><li><i class="fas fa-check-square"></i>&nbsp;', array_filter(explode('|', Imovel::model()->getStringUf8($model->benfeitorias)))); ?>
                                    </li>
                                </ul>
                            </div>
                            </p>
                        <?php } ?>

                        <?php
                        $aProx = array('proximidade1', 'proximidade2', 'proximidade3', 'proximidade4', 'proximidade5');

                        $proximidades = null;

                        foreach ((array) $model as $k => $v) {
                            if (in_array($k, $aProx)) {
                                if (!empty($v)) {
                                    $proximidades .= '<li><strong>' . $v . '</strong></li>';
                                }
                            }
                        }

                        if (!empty($proximidades)) {
                            echo '<div class="col-md-4">';
                            echo '<h5>Na proximidade de:</h5>';
                            echo '<ul>';
                            echo $proximidades;
                            echo '</ul>';
                            echo '</div>';
                        }
                        ?>

<?php if (!empty($model->area_total) || !empty($model->area_util)) { ?>
                            <!-- <div class="col-md-4">
                            <h5>Sobre o Imóvel:</h5>
                            <ul>
                            <?php if (!empty($model->area_total) AND ( $model->area_total != '0.00')) { ?>
                                     <li> <strong>Área Total</strong>: <br /> <?= $model->area_total ?> mt²</li> 
                            <?php } else { ?>
                                     <li> <strong>Área Total</strong>: <br /> Não informado</li> 
                            <?php } ?>
                            <?php if (!empty($model->area_util) AND ( $model->area_util != '0.00')) { ?> 
                                    <li> <strong>Área Util</strong>: <br /> <?= $model->area_util ?> mt²</li> 
                            <?php } else { ?>
                                     <li> <strong>Área Util</strong>: <br /> Não informado</li> 
                            <?php } ?>
                        </ul>
                        </div> -->
<?php } ?>
                    </div>
                    <!-- <div class="row"> -->

                    <!-- <div class="col-md-4 outrasAcoes" style="top:60px;">
                      <div class="row"><a class="button is-active is-outlined col-md-12 btn btn-block unisanslight" href="<?= Yii::app()->createUrl('/favoritos/adicionar/' . $model->cod_bem) ?>" ><span class="icon"><i class="fa fa-star"></i></span> <span>Adicionar aos Favoritos</span></a></div>
                      <div class="row"><button type="button" class="button is-active is-outlined col-md-12 btn btn-block unisanslight" data-toggle="modal" data-target="#recomende"><span class="icon"><i class="fa fa-share"></i></span> <span>Recomende a um Amigo</span></button></div>
                      <div class="row"><button type="button" class="button is-active is-outlined col-md-12 btn btn-block unisanslight" data-toggle="modal" data-target="#agendar"><span class="icon"><i class="fa fa-clock-o"></i></span> <span>Agendar Contato</span></button></div>
                      <div class="row"><button type="button" class="button is-active is-outlined col-md-12 btn btn-block unisanslight" data-toggle="modal" data-target="#proposta"><span class="icon"><i class="fa fa-money"></i></span> <span>Fazer uma Proposta</span></button></div>
                      <? $Url = $model->urlFinali.'/'.$model->urlBem.'/'.$model->urlCidade.'/'.$model->cod_bem; ?>
                      <div class="row"><a onclick="JavaScript:AbrePopup('<?= Yii::app()->createUrl('/imprime/' . $Url) ?>','780','650')" href="#" class="button is-active is-outlined col-md-12 btn btn-block unisanslight"><span class="icon"><i class="fa fa-print"></i></span> <span>Imprimir Anúncio</span></a></div>            
                      </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="<?= $this->baseUrl ?>/css/impressao.css" media="print" />
        <script src="<?= $this->baseUrl ?>/js/jQuery.print.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#imprimirPagina').on('click', function () {
                    jQuery('#impressao').print({
                        mediaPrint: true
                    });
                });
            });
        </script>

        <div class="row">

            <div class="col-md-12 infoComplementar mapa">
                <!-- <h2><span>Veja no Mapa</span></h2> -->
                <!-- NEW KEY = AIzaSyAszNZ82yHUUxROPBSenIbcFw82BSVNzCo -->
                <?php
                /*                
                    function url_get_contents($url) {
                        if (function_exists('curl_exec')) {
                            $conn = curl_init($url);
                            curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
                            curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
                            curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
                            $url_get_contents_data = (curl_exec($conn));
                            curl_close($conn);
                        } elseif (function_exists('file_get_contents')) {
                            $url_get_contents_data = file_get_contents($url);
                        } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
                            $handle = fopen($url, "r");
                            $url_get_contents_data = stream_get_contents($handle);
                        } else {
                            $url_get_contents_data = false;
                        }
                        return $url_get_contents_data;
                    }

                    $SN = str_replace(', S/n', '', $model->endereco_1);
                    // $endereco = str_replace(' ', '+', $model->endereco_1);
                    $endereco = str_replace(' ', '+', $SN);
                    $uf = $model->uf;
                    $cidade = str_replace(' ', '+', utf8_decode($model->urlCidade));
                    // $bairro = str_replace(' ', '+', utf8_encode($model->bairro));
                    $bairro = str_replace(' ', '+', utf8_encode($model->urlBairro));
                    $pais = 'BR';
                    $mostraEnd = $model->trata_endereco;
                    if ($model->trata_endereco == '1') {
                        // Alto+da+Colina,+Londrina+-+PR
                        $address = $bairro . ',+' . $cidade . ',+-+' . $uf . ',+' . $model->cep;
                    } else {
                        $address = $endereco . ',+' . $bairro . ',+' . $cidade . ',+-+' . $uf . ',+' . $model->cep;
                    }
                    // $address = $endereco.',+'.$model->urlBairro.',+'.$model->urlCidade.',+'.$uf;
                    // echo $address;
                    // $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');



                    $geocode = url_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyAszNZ82yHUUxROPBSenIbcFw82BSVNzCo');

                    $output = json_decode($geocode);
                    if ($mostraEnd == '0') {
                        if (isset($output->results) && isset($output->results[0]) && isset($output->results[0]->geometry->location)) {
                            $lat = str_replace(',', '.', $output->results[0]->geometry->location->lat);
                            $lng = str_replace(',', '.', $output->results[0]->geometry->location->lng);
                        } else {
                            $lat = false;
                            $lng = false;
                        }
                        $distance = "";
                    } else {
                        if (isset($output->results) && isset($output->results[0]) && isset($output->results[0]->geometry->viewport)) {
                            $lat = str_replace(',', '.', $output->results[0]->geometry->viewport->northeast->lat);
                            $lng = str_replace(',', '.', $output->results[0]->geometry->viewport->northeast->lng);
                        } else {
                            $lat = false;
                            $lng = false;
                        }
                        $distance = "<h3><small class='text-danger text-center'>Bairro onde se localiza o imóvel, a marcação não corresponde ao exato local do imóvel.</small></h3>";
                    }
                    $maker = 'images/pins/centro.png';
                    if (($endereco == '') or $mostraEnd == '1') {
                        $distance = "<h3><small class='text-danger'>Bairro onde se localiza o imóvel, a marcação não corresponde ao exato local do imóvel.</small></h3>";
                        $maker = 'images/pins/circulo.png';
                    }
                    if (($endereco == '') or $mostraEnd == '1') {

                    }
                    ?>
                    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAszNZ82yHUUxROPBSenIbcFw82BSVNzCo&libraries=geometry,places"></script>
                    <script src="/js/FBMap.js"></script>
                    <?php
                    // echo $distance;
                    ?>
                    <div class="columns is-gapless">
                        <div class="column is-12">
                            <!-- <div id="map_canvas" class="map_canvas" style="height:300px; margin: 10px 0;"></div> -->
                        </div>
                    </div>
                    <div class="columns is-gapless">
                      <div class="column">
                        <div id="places" class="places col-md-12">
                          <ul id="monuments" class="monuments">
                            <li class="Listtipo"><input type="radio" name="place" id="m_airport" data-item="airport" /><label for="m_airport">Aeroporto</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_taxis" data-item="taxi_stand" /><label for="m_taxis">Taxi</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_cafe" data-item="cafe" /><label for="m_cafe">Cafe</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_restaurant" data-item="restaurant" /><label for="m_restaurant">Restaurante</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_museum" data-item="museum" /><label for="m_museum">Museu</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_art_gallery" data-item="art_gallery" /><label for="m_art_gallery">Galeria de Arte</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_gym" data-item="gym" /><label for="m_gym">Academia</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_school" data-item="school" /><label for="m_school">Escola</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_university" data-item="university" /><label for="m_university">Faculdade</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_hospital" data-item="hospital" /><label for="m_hospital">Hospital</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_pharmacy" data-item="pharmacy" /><label for="m_pharmacy">Farmacia</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_church" data-item="church" /><label for="m_church">Igreja</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_bakery" data-item="bakery" /><label for="m_bakery">Padaria</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_bar" data-item="bar" /><label for="m_bar">Bar</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_night_club" data-item="night_club" /><label for="m_night_club">Clube Noturno</label></li>
                            <li class="Listtipo"><input type="radio" name="place" id="m_bank" data-item="bank" /><label for="m_bank">Banco</label></li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="columns is-gapless">
                      <div class="column">
                                        <ul id="places_list" class="places_list col-md-12"></ul>
                      </div>
                    </div> 
                    <script type="text/javascript">
                $(document).ready(function () {
                    $('#map_canvas').FBMap({
                        lat: '<?php echo $lat ?>',
                        lng: '<?php echo $lng ?>',
                        link_text: '',
                        selectors: 'input[type="radio"]',
                        // marker: '<? echo $maker ?>',
                        visualRefresh: true
                    });
                });
                    </script>

    <?php  */   $this->renderPartial('/imovel/_acoes', array('galeria' => $imagem)); ?>
            </div>
        </div>
    </div>
                <?php $this->renderPartial('/system/m_sidebar'); ?>
</div>


<link rel="stylesheet" type="text/css" href="<?= $this->baseUrl ?>/css/impressao.css" media="print" />
<script src="<?= $this->baseUrl ?>/js/jQuery.print.js"></script>
<script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#imprimirPagina').on('click', function () {
                    jQuery('#impressao').print({
                        mediaPrint: true
                    });
                });
            });
</script>

<script type="text/javascript">function AbrePopup(url, popup_w, popup_h) {
        var config;
        config = "scrollbars=yes,toolbar=no,location=no, resizable=no, width=";
        config = config.concat(popup_w, ",height=", popup_h);
        window.open(url, 'directions', config);
    }
</script>


<script type="text/javascript">
    $(".fancybox")
            .attr('rel', 'gallery')
            .fancybox({
                padding: 0,
                margin: 5,
                nextEffect: 'fade',
                prevEffect: 'none',
                autoCenter: false,
                loop: false,
                helpers: {
                    title: {type: 'inside'},
                    thumbs: {
                        width: 50,
                        height: 50
                    }
                },
                afterLoad: function () {
                    $.extend(this, {
                        aspectRatio: false,
                        type: 'html',
                        width: '100%',
                        height: '100%',
                        content: '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
                    });
                }
            });
</script>
<style type="text/css"> .fancybox-skin{background: none!important; box-shadow: none!important; } .fancybox-lock .fancybox-overlay{overflow-x: hidden; } .fancybox-close{top: 0; right: 0; } #fancybox-thumbs ul{width: 5500px;}
</style>
