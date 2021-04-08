<style type="text/css">span .hr{border-bottom: 1px solid #900}.Listtipo{float: left;list-style: outside none none;width: 160px;}.monuments label {background-image:url(http://mockup.fastbooking.com/location/css/radio.png);-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}.monuments input[type=radio] {display:none;}.monuments input[type=radio] + label {padding-left:20px;margin-bottom:5px;height:15px;display:inline-block;line-height:15px;background-repeat:no-repeat;background-position: 0 0;font-size:15px;vertical-align:middle;cursor:pointer;}.monuments input[type=radio]:checked + label {background-position: 0 -15px;}.map_canvas {float:left; width:100%;height:450px;clear:both;margin: 0;}.places { width:100%;margin:20px 0 0 20px;z-index: 999;}.monuments, .places_list {float: right;  margin: 0;  padding: 0; width:100%; clear:both;}
    .places_list {  margin-top: 20px;font-size: 12px;height: auto;max-height: 250px;  overflow-x: auto;}.place_item {cursor:pointer;padding:2px 0 4px 0;float:left; width:100%; clear:both; word-wrap: break-word;}.place_item:hover > strong {background:#333;color:#fff;}.place_item > strong {float:left;width:80%;padding:2px 0 2px 5px;font-weight: bold;text-shadow: none;font-size: 1em;clear: none;display: inline;}img.place_picto {margin-right: 5px;vertical-align: middle;float:left;width:15px;}div.route div.field { display:inline-block; }div.route div.submit { margin-left:40px; }.itineraryPanel { position:relative; display:none; }.itineraryPanel > div.print_itinerary { position:absolute; right:10px; top:18px; }.itineraryPanel > div.print_itinerary.walking { top:82px; }.adp, .adp table { width:100%; }dd{border-bottom: 1px solid #cfcfcf;padding: 2px 0 5px 4px;}dt{background: #ebebeb;padding: 5px}.dl{list-style: none;transition:  all 1s; margin: 0 0 0px;}.dl:hover{background: #f0f0f0;transition: all 1s;}.modal-backdrop{z-index: 9;}
    .figure__image { /*height: 222px;*/ margin: 0 0 7px; overflow: hidden; position: relative; width: auto; }
    .figure__image img { max-width: 100%; -moz-transition: all 0.3s; -webkit-transition: all 0.3s; transition: all 0.3s;}
    a:hover .figure__image img { -moz-transform: scale(1.1); -webkit-transform: scale(1.1); transform: scale(1.1); }

    .uk-h1, h1{
        font-size: 1.625rem!important;
    }

</style>
<?php
// Imovel::model()->somaVisualizacao($data);
// $this->setPageTitle($data->tp_bem .' para '. $data->finalidade.' em '. $data->cidade.' '.$data->uf. ' - '.Imovel::model()->getStringUf8($data->bairro).' | '.Yii::app()->params['Imobiliaria']);
?>

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/PhotoSwipe-master/dist/photoswipe.css"> 
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/PhotoSwipe-master/dist/default-skin/default-skin.css"> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/PhotoSwipe-master/dist/photoswipe.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/PhotoSwipe-master/dist/photoswipe-ui-default.min.js"></script> 

<div id="corpo" class="cont" uk-grid>
    <div class="sc-grid">
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> 
            <div class="pswp__bg"></div> 
            <div class="pswp__scroll-wrap"> 
                <div class="pswp__container"> 
                    <div class="pswp__item"></div> 
                    <div class="pswp__item"></div> 
                    <div class="pswp__item"></div> 
                </div> 
                <div class="pswp__ui pswp__ui--hidden"> 
                    <div class="pswp__top-bar"> 
                        <div class="pswp__counter"></div> 
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> 
                        <div class="pswp__preloader"> 
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div> 
                        </div> 
                    </div> 
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div> 
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> 
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button> 
                    <div class="pswp__caption"> 
                        <div class="pswp__caption__center"></div> 
                    </div> 
                </div> 
            </div> 
        </div>
        
        <div class="col-md-8  ver-imovel" >
            <h1 class="titulo-interno">
                <?php echo $model->tp_bem ?> <?php echo $model->finalidade ?> Em <?php echo $model->cidade ?>
            </h1>

            <a class="button is-active is-outlined col-md-12 btn btn-block unisanslight" href="<?= Yii::app()->createUrl('imovel/adicionarfavoritos', array('id'=> $model->cod_bem) ) ?>" style="text-align: right;margin: -10px 0 -10px 0;">
                <span class="icon">
                    <i class="fas fa-heart"></i>
                </span> 
                <span>Favoritar</span>
            </a>

            <div class="row">
                <div class="col-md-5 galeria">
                    <?php
                    $pathImg = $model->getPathWebImagens() . '/';
                    //$pathImg = 'http://encontraimoveis.com.br/img/';
                    /*
                    $aImg = '';
                    $aImg = substr($model->aImagem, 0, -1);
                    $Img = explode("|", $aImg);
                    */
                    $Img = $model->getArrayImagensExiste();
                    $total = count($Img);
                    if($total > 0) {
                        $r = end($Img);
                        if (strstr($r, 'r')) { 
                            $aArrayNome = explode("/", end($Img));
                            //$imagem = $pathImg . end($Img); 
                            $imagem = $pathImg . end($aArrayNome); 
                        } 
                        else { 
                            $aArrayNome = explode("/", $Img[0]);
                            //$imagem = $pathImg . $Img[0]; 
                            $imagem = $pathImg . end($aArrayNome); 
                        }
                    } 
                    else { $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg'; }
                    
                    if ($total == '1') { $s = 'Foto'; } 
                    else { $s = 'Fotos'; } 
                    ?>
                    <div> 
                        <span class="tag">
                            <?= $total . ' ' . $s ?>
                        </span>     
                        <div class="figure__image" title="">
                            <img id="btn" class="imgPrincipal img-responsive" src="<?= $imagem ?>" alt="">
                        </div>
                    </div>
                    <script type="text/javascript">
                        var openPhotoSwipe = function () {
                            var pswpElement = document.querySelectorAll('.pswp')[0];

                            // build items array
                            var items = [
                            <?php
                            for ($i = 0; $i < $total; $i++) {
                                $aArrayNome = explode("/", $Img[$i]);
                                echo '{';
                                echo '    src: \'' . $pathImg . end( $aArrayNome ) . '\',';
                                echo '    w: 1000,';
                                echo '    h: 800';
                                echo '},';
                            }
                            ?>
                            ];

                            // define options (if needed)
                            var options = {
                                // history & focus options are disabled on CodePen        
                                history: false,
                                focus: false,

                                showAnimationDuration: 0,
                                hideAnimationDuration: 0

                            };

                            var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                            gallery.init();
                        };

                        // openPhotoSwipe();

                        document.getElementById('btn').onclick = openPhotoSwipe;
                        <!--document.getElementById('abtn').onclick = openPhotoSwipe; -->
                    </script>
                </div>
                <div class="col-md-7 informacoes">
                    <h1 class="uk-heading-line"><span>Caracteristicas</span></h1>
                    <div class="uk-column-1-2 uk-text-nowrap">
                        <ul class="uk-list">
                                <li><strong>Valor R$: </strong> <?= Util::formata($model->vlr_oferta, 'real') ?></li>
                        </ul>
                        <ul class="uk-list">
                            <?php if ($model->vlr_condominio != '0.00') { ?>
                                <li><strong>Cond. (aprox): </strong><?= Util::formata($model->vlr_condominio, 'real') ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <hr>

                    <div class="uk-column-1-2">
                        <ul class="uk-list">
                            <li><strong>REF:</strong> <?= Util::formata($model->id, 'ref') ?></li>
                            <li><strong>Cidade:</strong> <?= Imovel::model()->getStringUf8($model->cidade) ?></li>
                            <li><strong>Bairro:</strong> <?= Imovel::model()->getStringUf8($model->bairro) ?></li>
                            <li><strong>Endereço:</strong> <?= Imovel::model()->getStringUf8($model->endereco_1) ?></li>
                            <li><strong>Complemento:</strong> <?= Imovel::model()->getStringUf8($model->endereco_2) ?></li>
                        </ul> 
                    </div>

                    <hr class="uk-divider-small">

                    <div class="uk-column-1-2">
                        <ul class="uk-list">
                            <?= implode('</li><li><i class="far fa-check-square"></i>&nbsp;', array_filter(explode('|', Imovel::model()->getStringUf8($model->benfeitorias)))); ?>
                        </ul>
                    </div>

                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 descAdicional">
                    <?php if (!empty($model->anuncio)) { ?>
                        <h2><span>Descrição Adicional</span></h2>
                        <p class="text-justify"></p>
                        <div><?= $model->anuncio ?></div>
                    <?php } ?>
                </div>
            </div>
        <?php
            $aProx = array('proximidade1', 'proximidade2', 'proximidade3', 'proximidade4', 'proximidade5');
            $proximidades = null;
            foreach($model as $k => $v){
                if( in_array($k, $aProx) ){
                    if( !empty($v) ){
                        $proximidades .= '<li><strong>'.$v.'</strong></li>';
                    }
                }
            }
            if( !empty($proximidades) ){ ?>
                <div class="col-md-12">
                    <h5>Na proximidade de:</h5>
                    <ul>
                        <?= $proximidades ?>
                    </ul>
                </div>
        <?php } ?>
        </div>
        
        <?php
        // testa se este imovel foi colocado como de interesse hoje, neste ultima hora
//        if(Yii::app()->user->getState('eMail') != null) {
//            $cFormInteresse = FicouInteressado::model()->find('aEmail = "' . Yii::app()->user->getState('eMail') . '" '
//                                                            . 'AND aReferImovel="' . $model->id . '" '
//                                                            . 'AND dData LIKE "' . date("Y-m-d H") . '%"' );
//        }
//
//        if(isset($cFormInteresse) 
//        && $cFormInteresse->ID > 0) {
//            // existe interesse no imovel
//            $this->renderPartial('/system/m_sidebar');
//        }
//        else {?>
<!--        <div class="col-md-4 sidebar" style="margin-top: 50px;">-->
        <?php 
        /* $cFormInteresse = new FicouInteressado;
            $cFormInteresse->aReferImovel = $model->id;
            $form = $this->beginWidget('CActiveForm', 
                                         array(
                                             'clientOptions'=>array('validateOnSubmit'=>true),
                                             'action' => array( 'imovel/EntrarEmContato', 'id'=>$model->cod_bem ), 
                                        )
                                        );
            echo $form->hiddenField($cFormInteresse, 'aReferImovel');
            ?>
            <div class="uk-section  uk-background-cover" uk-parallax="bgx: 100;bgy: -500;" style="">
                <div class="uk-container">
                    <h1 class=" uk-text-center" style="font-size: 30px">
                        Ficou interessado? <br>
                        <small>Entraremos em contato.</small>
                    </h1>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin" style="margin: 10px 0 !important;">
                            <!--<input class="uk-input " type="text" placeholder="Nome" value="" style="opacity: .85;border-radius: 6px;"> -->
                            <?php echo $form->textField($cFormInteresse,'aNome',array('size'=>40,'maxlength'=>40, 'placeholder'=>'Nome', 'class'=>'uk-input')); ?>
                        </div>

                        <div class="uk-margin" style="margin: 10px 0 !important;">
                            <!--<input class="uk-input" type="text" placeholder="Email" value=""  style="opacity: .85;border-radius: 6px;"> -->
                            <?php echo $form->textField($cFormInteresse,'aEMail',array('size'=>60,'maxlength'=>128, "placeholder"=>"Email", 'class'=>"uk-input")); ?>
                        </div>

                        <div class="uk-margin" style="margin: 10px 0 !important;">
                            <!--<input class="uk-input" type="text" placeholder="Telefone" value="" style="opacity: .85;border-radius: 6px;">-->
                            <?php echo $form->textField($cFormInteresse,'aTelefone',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Telefone", 'class'=>"uk-input")); ?>
                        </div>

                        <div class="uk-margin" style="margin: 10px 0 !important;">
                            <!--<textarea class="uk-textarea " type="text" placeholder="Comentário" value="" style="opacity: .85;border-radius: 6px;"></textarea>-->
                            <?php echo $form->textArea($cFormInteresse,'aComentario',array('rows'=>2, 'cols'=>50, 'placeholder'=>"Comentários", 'class'=>"uk-textarea ")); ?>
                        </div>

                        <div class="uk-margin" style="margin: 10px 0 !important;">
                            <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">Enviar</button>
                        </div>
                    </fieldset>
                </div>
            </div> */ ?>
        <!--</div>-->
        <?php //$this->endWidget(); 
                $this->renderPartial('/system/m_sidebar'); 
        //}?>
    </div>
</div>

<?php
// echo "<pre>";
// print_r(Imovel::model()->getCriterioParecidos($model->cod_bem, $model->bairro, $model->cidade, $model->tp_bem));
// echo "</pre>";
?>


<?php
if (!empty($redor)) {
    ?>
    <hr class="uk-divider-icon" width="100%">
    <h4 class="uk-text-center ">Imóveis semelhantes</h4>
    <div class="uk-child-width-1-4@m" uk-grid>
        <?php
// echo "<pre>";
//     print_r($redor);
// echo "</pre>";
        foreach ($redor as $key => $v) {
            // foreach (Imovel::model()->getCriterioParecidos($model->cod_bem, $model->bairro, $model->cidade, $model->tp_bem) as $key => $v) {
            /*
            $pathImg = 'http://encontraimoveis.com.br/img/';
            $aImg = '';
            $aImg = substr($v->aImagem, 0, -1);
            $Img = explode("|", $aImg);
            $total = count($Img);
            if (strstr($r, 'r')) {
                $r = end($Img);
            } else {
                $r = $Img[0];
            }
            */
            $aImg = '';
            $Img = $v->getArrayImagensExiste();
            if(count($Img) > 0) {
                $r = end($Img);
                if (strstr($r, 'img')) {
                    $arArrayNome = explode("/", $r);
                    $imagem = $v->getPathWebImagens() .  "/" . end($arArrayNome);
                } 
                else {
                    $arArrayNome = explode("/", $Img[0]);
                    $imagem = $v->getPathWebImagens() .  "/" . end($arArrayNome);
                }
            } 
            else {
                $imagem = $this->baseUrl . '/img/imovel-sem-foto3.jpg';
            } 
	?>
		
        <div uk-scrollspy="cls: uk-animation-slide-left;delay: 300;">
            <a href="<?= Yii::app()->createUrl('imovel/visualizar', array('finalidade'=>$v->urlFinali, 'id'=>$v->cod_bem) );?>">
                <div class="uk-card uk-card-default uk-card-default uk-card-hover">
                    <div class="uk-card-media-top" style="overflow: hidden;height: auto;">
                        <img src="<?= $imagem ?>" alt="" style="width:100%">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title" style="margin: 0 0 -10px 0;"><?= $v->tp_bem ?></h3>
                        <p class=""><?= $v->finalidade ?><br>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
			    <?= $v->bairro . ' - ' . $v->cidade ?>
			</p>
                        <div class="uk-card-footer" style="padding: 10px 0 20px 0;">
                            <div class="sc-valor "> <?= Util::formata($v->vlr_oferta, 'real')?> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
  <?php }
        ?>
    </div>
<?php
}
?>