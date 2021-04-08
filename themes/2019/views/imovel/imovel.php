<style type="text/css">span .hr{border-bottom: 1px solid #900}.Listtipo{float: left;list-style: outside none none;width: 160px;}.monuments label {background-image:url(http://mockup.fastbooking.com/location/css/radio.png);-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}.monuments input[type=radio] {display:none;}.monuments input[type=radio] + label {padding-left:20px;margin-bottom:5px;height:15px;display:inline-block;line-height:15px;background-repeat:no-repeat;background-position: 0 0;font-size:15px;vertical-align:middle;cursor:pointer;}.monuments input[type=radio]:checked + label {background-position: 0 -15px;}.map_canvas {float:left; width:100%;height:450px;clear:both;margin: 0;}.places { width:100%;margin:20px 0 0 20px;z-index: 999;}.monuments, .places_list {float: right;	margin: 0;	padding: 0;	width:100%;	clear:both;}
    .places_list {	margin-top: 20px;font-size: 12px;height: auto;max-height: 250px;	overflow-x: auto;}.place_item {cursor:pointer;padding:2px 0 4px 0;float:left;	width:100%;	clear:both;	word-wrap: break-word;}.place_item:hover > strong {background:#333;color:#fff;}.place_item > strong {float:left;width:80%;padding:2px 0 2px 5px;font-weight: bold;text-shadow: none;font-size: 1em;clear: none;display: inline;}img.place_picto {margin-right: 5px;vertical-align: middle;float:left;width:15px;}div.route div.field { display:inline-block; }div.route div.submit { margin-left:40px; }.itineraryPanel { position:relative; display:none; }.itineraryPanel > div.print_itinerary { position:absolute; right:10px; top:18px; }.itineraryPanel > div.print_itinerary.walking { top:82px; }.adp, .adp table { width:100%; }dd{border-bottom: 1px solid #cfcfcf;padding: 2px 0 5px 4px;}dt{background: #ebebeb;padding: 5px}.dl{list-style: none;transition:  all 1s; margin: 0 0 0px;}.dl:hover{background: #f0f0f0;transition: all 1s;}.modal-backdrop{z-index: 9;}

    #share-box {
        top: 30px !important;
        padding: 5px 5px;
    }
    #share-box .fa-facebook-square{ color: #3B5998; font-size: 28px; }
    #share-box .fa-linkedin{ color: #0073b1; font-size: 28px; }
    #share-box .fa-whatsapp-square{ color: #00C853; font-size: 28px; }
    #share-box .fa-twitter-square{ color: #1da1f2; font-size: 28px; }
</style>

<?php
// $this->breadcrumbs = $breadcrumbs; 
$this->setPageTitle(Util::getStringUTF8(Util::formata($model->finalidade, 'finalidade') . ' | ' . $model->tp_bem . ' em ' .  Util::getStringUTF8($model->bairro) .' | '. $model->cidade . '-' . $model->uf . ' | ' . Yii::app()->params['Imobiliaria']));
?>
<div class="row">

    <div class="col-md-9 ver-imovel" id="impressao">

        <?php
        if (isset($this->breadcrumbs)) {
            $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs));
        }
        ?>
        <h1 class="ubuntu text-colorbase" style=""> id="<?= Util::formata($model->id, 'ref') ?>"><?= Util::getStringUTF8($model->tp_bem) . ' para ' . Util::formata($model->finalidade, 'finalidade') . ' em ' . Util::getStringUTF8($model->cidade) . '/' . $model->uf ?></h1>

        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach ($flashMessages as $key => $message) {
                echo '<div class="alert alert-' . $key . '" role="alert">' . $message . '</div>';
            }
        }
        ?>
        <div class="row">
            <div class="col-md-5 galeria"> <?php
            $Img = $model->getArrayImagensExiste();
            
            for ($nIdx = 0; $nIdx < count($Img); $nIdx++) {
                $Img[$nIdx] = str_replace($model->getPathRealImagens(), "", $Img[$nIdx]);
            }
            $total = count($Img);
            if($total > 0) {
                $r = end($Img);
                /*
                $s = ($total == '1') ? 'Foto' : 'Fotos'; ?>
                <span class="tag"><?= $total . ' ' . $s ?></span> <?php
                */
                
                if (strstr($r, 'r')) {
                    $aImagem = $r;
                } else {
                    $aImagem = $Img[0];
                } ?>
                
                <a class="fancybox" href="<?= $model->getPathWebImagens() . $aImagem ?>">
                    <img class="imgPrincipal" src="<?= $model->getPathWebImagens() . $aImagem ?>" alt=""/>
                    <button type="button" data-toggle="modal" data-target="#album" class="btn red darken-2 btn-block"><i class="far fa-image"></i> Abrir Galeria de Fotos</button>
                </a>
                
                <!-- Carrega as imagens pro fancybox -->
                <div class="hidden d-none"> <?php
                    for($i = 1; $i < $total; $i++){
                        if($Img[$i] == $aImagem) { continue; }?>
                        <a class="fancybox" href="<?= $model->getPathWebImagens() . $Img[$i] ?>">
                            <img src="<?= $model->getPathWebImagens() . $Img[$i] ?>" alt=""/>
                        </a> <?php
                    } ?>
                </div><?php
            } 
            else { ?>
                <div><img src="<?= $this->baseUrl ?>/img/imovel-sem-foto3.jpg" alt="" style="width:100%"></div> <?php
            } ?>
            </div>


            <div class="col-md-7 informacoes text-colorbase" style="">
                <div>
                    <div class="pull-right" style="text-align: right; float: right;">
                        <a style="display: block;min-height: 20px; padding: 0 5px;">
                            <i class="fas fa-share-alt" style="font-size: 20px;"></i>
                        </a>
                        <div class="uk-navbar-dropdown" id="share-box" uk-dropdown="pos: bottom-center; mode: click;" style="min-width: 0; width: auto; box-shadow: 0 0 10px rgba(100, 100, 100, 0.35);">
                            <div class="uk-navbar-center">
                                <ul class="uk-navbar-nav">
                                    <li style="margin: 0; padding: 0;">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->origem ?>" target="_blank" style="display: block; min-height: 28px; padding: 0 5px; min-width: 28px;"><i class="fab fa-facebook-square"></i></a>
                                    </li>
                                    <li style="margin: 0; padding: 0;">
                                        <a href="https://api.whatsapp.com/send?text=<?= $this->origem ?>" target="_blank" style="display: block; min-height: 28px; padding: 0 5px; min-width: 28px;">
                                            <i class="fab fa-whatsapp-square"></i>
                                        </a>
                                    </li>
                                    <li style="margin: 0; padding: 0;">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $this->origem ?>" target="_blank" style="display: block; min-height: 28px; padding: 0 5px; min-width: 28px;">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li style="margin: 0; padding: 0;">
                                        <a href="https://twitter.com/intent/tweet?text=<?= $this->origem ?>" target="_blank" style="display: block; min-height: 28px; padding: 0 5px; min-width: 28px;">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h2>Informações</h2>
                </div>
                <ul>
                    <li> <i class="fa fa-caret-right"></i> <strong>REF.:</strong> <?= Util::formata($model->id, 'ref') ?> </li>
                    <?php if (!empty($model->cidade)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Cidade.:</strong> <?= Util::getStringUTF8($model->cidade) . '/' . $model->uf ?> </li> <?php } ?>
                    <?php if (!empty($model->bairro)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Bairro.:</strong> <?= Util::getStringUTF8($model->bairro) ?> </li> <?php } ?>
                    <?php if ($model->trata_endereco == 0) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Endereço.:</strong> <?= Util::getStringUTF8($model->endereco_1) ?> <?php if (!empty($model->endereco_2)) {
                        echo ' - ' . Util::getStringUTF8($model->endereco_2);
                    } ?> </li> <?php } ?>
                    <li>&nbsp;</li>
                    <?php if (!empty($model->tp_bem)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Tipo.:</strong> <?= Util::getStringUTF8($model->tp_bem) ?> </li> <?php } ?>
                    <?php if (!empty($model->finalidade)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Finalidade.:</strong> <?= Util::formata($model->finalidade, 'finalidade') ?> </li> <?php } ?>
                    <?php if (!empty($model->aplicacao)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Aplicação.:</strong> <?= Util::getStringUTF8($model->aplicacao) ?> </li> <?php } ?>
                    <?php if (!empty($model->estrutura)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Estrutura.:</strong> <?= Util::getStringUTF8($model->estrutura) ?> </li> <?php } ?>
                    <?php if (!empty($model->estado)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Estado.:</strong> <?= Util::getStringUTF8($model->estado) ?> </li> <?php } ?>
                    <li>&nbsp;</li>
                    <?php if (!empty($model->observacao1) || !empty($model->observacao2) || !empty($model->observacao3) || !empty($model->observacao4)) { ?>
                        <strong>Observações:</strong>
                    <?php } ?>
                    <?php if (!empty($model->observacao1)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= Util::getStringUTF8($model->observacao1) ?> </li> <?php } ?>
                    <?php if (!empty($model->observacao2)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= Util::getStringUTF8($model->observacao2) ?> </li> <?php } ?>
                    <?php if (!empty($model->observacao3)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= Util::getStringUTF8($model->observacao3) ?> </li> <?php } ?>
                    <?php if (!empty($model->observacao4)) { ?> <li> <i class="fa fa-caret-right"></i> <strong></strong> <?= Util::getStringUTF8($model->observacao4) ?> </li> <?php } ?>
<?php if (!empty($model->vlr_oferta)) { ?> <li> <i class="fa fa-caret-right"></i> <strong>Valor.:</strong> <?= Util::formata($model->vlr_oferta, 'real') ?> </li> <?php } ?>
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
    <?= Util::getStringUTF8($model->descr_adicional) ?>
                    </p>
                </div>
<?php } ?>
        </div>


        <div class="row">
            <div class="col-md-12 infoComplementar">
                            <!-- <h2><span>Outras Informações</span></h2> -->
                <div class="row">
                    <div class="col-md-12">

                        <?php if (!empty($model->benfeitorias)) { ?>
                            <h2><span>Benfeitorias</span></h2>
                            <p class="text-justify">
                            <div class="col-md-12 text-colorbase">
                                <ul style="">
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
                    </div>
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
                <?php
                if ($model->lat && $model->lng != '0.000000') {
                    // echo $model->lat."<br>".$model->lng;
                    //$lat = $model->lat;
                    //$lng = $model->lng;
                    //$distance = "";
                    ?>
                    <h2><span>Veja no Mapa</span></h2>

                    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>

                    <div id="mapdiv" style="height: 400px; width: 100%; "></div>

                    <script>
                        map = new OpenLayers.Map("mapdiv");
                        map.addLayer(new OpenLayers.Layer.OSM());

                        var lonLat = new OpenLayers.LonLat( <?=$model->lng?>, <?=$model->lat?> )
                        //var lonLat = new OpenLayers.LonLat( -0.1279688 ,51.5077286 )
                              .transform(
                                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                                map.getProjectionObject() // to Spherical Mercator Projection
                              );
                        var zoom=16;

                        var markers = new OpenLayers.Layer.Markers( "Markers" );
                        map.addLayer(markers);

                        markers.addMarker(new OpenLayers.Marker(lonLat));

                        map.setCenter (lonLat, zoom);
                    </script>

                    <?php
                } 
                ?>
                <?php $this->renderPartial('/imovel/_acoes', array('galeria' => $imagem)); ?>
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
                        content: '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
                                // content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
                    });
                }
            });
</script>
<style type="text/css"> .fancybox-skin{background: none!important; box-shadow: none!important; } .fancybox-lock .fancybox-overlay{overflow-x: hidden; } .fancybox-close{top: 0; right: 0; } #fancybox-thumbs ul{width: 5500px;}
</style>
