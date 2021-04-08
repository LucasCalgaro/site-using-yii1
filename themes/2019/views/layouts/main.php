<?php 
$baseUrl = (Yii::app()->theme ? Yii::app()->theme->baseUrl : Yii::app()->request->baseUrl); 
$themePath = Yii::getPathOfAlias('webroot') .DIRECTORY_SEPARATOR .'themes' .DIRECTORY_SEPARATOR . Yii::app()->params['theme'];
$aImgPath = $themePath .DIRECTORY_SEPARATOR 
           .'img'     .DIRECTORY_SEPARATOR;

$aGetCapa = Util::getImagem($aImgPath.   'capa'  .DIRECTORY_SEPARATOR);
$aGetLogo = Util::getImagem($aImgPath.   'logo'  .DIRECTORY_SEPARATOR);
$aGetIcon = Util::getShorticon($aImgPath.'shorticon'.DIRECTORY_SEPARATOR);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="language" content="pt-br" />
        <meta content="" name="description">
        <meta name="keywords" content=""/>
        <meta name="robots" content="index, follow">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php
        if(count($aGetIcon) !== 0){ ?>
            <link rel="shortcut icon" href="<?= $baseUrl ?>/img/shorticon/<?= $aGetIcon[0] ?>" type="image/x-icon" /> <?php
        } ?>

        <?php
            $array = explode('|', Yii::app()->request->cookies['imgFace']);
        ?>
        
        <style>
            html{ 
                margin:0;
                padding:0;
                width:100%;
                height:100%;
                overflow: auto;
            }
        </style>
        <!--        <script src='https://www.google.com/recaptcha/api.js'></script>-->
        
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/jQuery/v1.11.3/jquery.js"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/uikit/v3.0.0/js/uikit.js"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/uikit/v3.0.0/js/uikit-icons.js"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/awesome/font-awesome-5.1.0/all.js"></script>
        <!--  Fancybox Version 2.1.5 -->
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript" src="<?= $baseUrl ?>/tools/bootstrap/v4.0.0/js/bootstrap.js"></script>


        <!--  TERCEIROS CSS -->
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/fancybox/source/jquery.fancybox.css?v=2.1.7"                 media="screen" />   
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"  media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/uikit/v3.0.0/css/uikit-rtl.css" />
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/uikit/v3.0.0/css/uikit.css"/>
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/bootstrap/v4.0.0/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/tools/awesome/font-awesome-5.1.0/all.css"/>
        
        <!--  LOCAL CSS -->
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/css/flaticon.css">
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/css/scordon.css">
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/css/scordon-responsive.css"> 
    </head>

    <body class="fadeIn">
        <style type="text/css">
            
        </style>
        <div class="uk-hidden-notouch">
            <nav class="uk-navbar-container uk-margin sc-navbar-color-transparent" uk-navbar>
                <div class="uk-navbar-left">
                    <?php
                        if(count($aGetLogo) !== 0) { ?>
                        <a class="uk-navbar-item uk-logo" href="<?= Yii::app()->createUrl('site/index') ?>">
                            <img src="<?= $baseUrl ?>/img/logo/<?= $aGetLogo[0] ?>" class="sc-responsive-logo-img">
                        </a> <?php
                        } ?>
                </div>
                <div class="uk-navbar-right">
                    <a href="<?= Yii::app()->createUrl('site/index') ?>" class="home-btn"><i class="fa fa-home"></i></a>
                    <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-reveal">
                    <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left" style=""></span>
                </a>
                </div>
            </div>

            <div id="offcanvas-reveal" uk-offcanvas="mode: reveal; overlay: true">
                <div class="uk-offcanvas-bar">

                    <button class="uk-offcanvas-close" type="button" uk-close></button>

                    <ul class="uk-nav uk-nav-default" style="margin-top: 25px;">
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/index') ?>" class="home-btn">Home</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('imovel/venda') ?>#lista">Venda</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('imovel/locacao') ?>#lista">Locação</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('imovel/favoritos') ?>#lista">Meus favoritos</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/empresa') ?>#corpo">Institucional</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/contato') ?>#corpo">Contato</a>
                        </li>
                    </ul>
                    <hr>
                    <ul class="uk-nav uk-nav-default" style="margin: 5px 0 0 0;">
                        <li><a class="uniuansbold"><?= Yii::app()->params['Creci'] ?></a></li>
                    <?php
                        if(isset(Yii::app()->params['Crea']) && strlen(Yii::app()->params['Crea']) > 0){ ?>
                            <li><a class="uniuansbold"><?= Yii::app()->params['Crea'] ?></a></li> <?php
                        }
                        foreach(Yii::app()->params['Fone'] as $fone){ ?>
                            <li>
                                <a class="uniuansbold">
                                    <?= $fone['Number'] ?>
                                </a>
                            </li><?php 
                        }
                        foreach(Yii::app()->params['Whatsapp'] as $key => $whats){ ?>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=<?= $whats['Link'] ?>" class="uniuansbold">
                                    <?= $whats['Number'] ?> <i class="fab fa-whatsapp" style="font-size: 20px; color: #57BA63; margin-bottom: -3px; margin-left: 5px;"></i>
                                </a>
                            </li><?php 
                        } 
                        foreach(Yii::app()->params['Email'] as $key => $email){ ?>
                            <li>
                                <a href="mailto:<?= $email['Link'] ?>" class="uniuansbold">
                                    <?= $email['Link'] ?>
                                </a>
                            </li><?php 
                        } ?>
                            <li><a class="uniuansbold"><?= Yii::app()->params['EnderecoReduzido']?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="uk-hidden-touch">
            <nav class="uk-navbar-container uk-margin sc-menu-main" uk-navbar style="margin-bottom: 0;">
                <div class="uk-navbar-left float-l"> <?php
                    if(count($aGetLogo) !== 0) { ?>
                    <a class="uk-navbar-item uk-logo" href="<?= Yii::app()->createUrl('site/index') ?>">
                        <img src="<?= $baseUrl ?>/img/logo/<?= $aGetLogo[0] ?>" style="max-height: 75px;">
                    </a> <?php 
                    } ?>
                </div>
                <nav class="uk-navbar-right float-r ">
                    <ul class="uk-navbar-nav list-auto none-mobile">
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/index') ?>" class="home-btn"><i class="fa fa-home" style="height: 45px; width: 45px;"></i></a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('imovel/venda') ?>#lista">Venda</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('imovel/locacao') ?>#lista">Locação</a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/empresa') ?>#corpo">Institucional</a>
                            <!-- <?php /*                           
                            <div class="uk-navbar-dropdown sc-navbar-color-transparent" style="height: auto; padding: 5px 20px;">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="<?=Yii::app()->createUrl('site/empresa') ?>#sobre-nos">Sobre nós</a></li><?php 
                                if(isset(Yii::app()->params['textoEngenharia'])){ ?>
                                    <li><a href="<?= Yii::app()->createUrl('site/engenharia') ?>#corpo">Engenharia</a></li><?php 
                                } ?>
                                </ul>
                            </div> */ ?>
                            -->
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/contato') ?>#corpo">Contato</a>
                        </li>
                    </ul>
                </nav>
            </nav>
            

        </div>
        <?php 
        // SELETOR DA CAPA
        if(count($aGetCapa) == 1){
            $this->renderPartial('/blocos/capa-fixa', array('baseUrl' => $baseUrl, 'aImg' => $aGetCapa));
        }
        else if(count($aGetCapa) > 1){
            $this->renderPartial('/blocos/capa-slider', array('baseUrl' => $baseUrl, 'aImg' => $aGetCapa));
        }
        else{
        
        } ?>
        
        <div class="container topoInfo uniuansheavy">
            <div class="">
                <div class="container">
                    
                <?php $this->renderPartial('/system/buscaH'); ?>
                </div>
            </div>
        </div>

        <div id="corpo"  class="cont">
            <div class="row">
                <div class="container">
                    <?= $content; ?>
                </div>
            </div>                
        </div>

        <footer class="footer-box" style="margin-top: 70px">
            <div class="sc-grid">
                <div class="col-lg-3 col-md-3 col-12 text-center">
                    <img src="<?= $baseUrl ?>/img/logo-mini.png" style="max-height: 150px;">
                </div>
                <div class="col-lg-3 col-md-3 col-12 text-center" style="margin-top: 20px;">
                    <p><a href="<?= Yii::app()->createUrl('site/index') ?>#corpo" style="text-decoration: none;">Início</a></p>
                    <p><a href="<?= Yii::app()->createUrl('site/empresa') ?>#corpo" style="text-decoration: none; ">Institucional</a></p>
                    <p><a href="<?= Yii::app()->createUrl('site/contato') ?>#corpo" style="text-decoration: none; ">Contato</a></p>
                </div>
                <div class="col-lg-3 col-md-3 col-12 text-center" style="margin-top: 20px;">
                    <p><a href="<?= Yii::app()->createUrl('imovel/venda') ?>#corpo" style="text-decoration: none;">Imóveis à venda</a></p>
                    <p><a href="<?= Yii::app()->createUrl('imovel/locacao') ?>#corpo" style="text-decoration: none;">Imóveis para alugar</a></p>
                    <p><a href="<?= Yii::app()->createUrl('imovel/favoritos') ?>#corpo" style="text-decoration: none;">Meus Favoritos</a></p>
                    <p><a href="<?= Yii::app()->createUrl('ficha/avalie') ?>#corpo" style="text-decoration: none;">Avalie seu Imóveil</a></p>
                    
                </div>
                <div class="col-lg-3 col-md-3 col-12" style="margin-top: 10px;">

                    <div class="address-box f-link-box" style="text-align: center;">
                        <p class="f-link-txt unisansbook">
                                <?php  foreach (explode('|', Yii::app()->params['Endereco']) as $v) {
                                    echo $v . '<br />';
                                    } 
                                ?>
                        </p>
                        <?php
                        if(isset(Yii::app()->params['Email']) && count(Yii::app()->params['Email']) !== 0){
                            foreach (Yii::app()->params['Email'] as $key => $email){ ?>
                                <a class="f-link f-link-txt unisansbook" href="mailto:<?= $email['Link'] ?>" target="_blank" style="margin: 3px 0; text-decoration: none;">
                                    <?= $email['Link'] ?>
                                </a><br><?php 
                            }
                        }
                        if(isset(Yii::app()->params['Whatsapp']) && count(Yii::app()->params['Whatsapp']) !== 0){
                            foreach (Yii::app()->params['Whatsapp'] as $key => $whats){?>
                                <a class="f-link-txt unisansbook" href="http://api.whatsapp.com/send?phone=<?= $whats['Link'] ?>" target="_blank" style="margin: 3px 0; text-decoration: none;">
                                    <?= $whats['Number'] ?> <img src="<?= $baseUrl ?>/img/social-whatsapp.svg" class="mini-icon-wpp">
                                </a><br><?php
                            }
                        }
                        if(isset(Yii::app()->params['Fone']) && count(Yii::app()->params['Fone']) !== 0){
                            foreach (Yii::app()->params['Fone'] as $key => $fone){ ?>
                                <a class="f-link-txt unisansbook" href="tel:<?= $fone['Link'] ?>" target="_blank" style="margin: 3px 0; text-decoration: none;">
                                    <?= $fone['Number'] ?>
                                </a><br><?php 
                            }
                        } ?>
                    </div>
                    <div class="address-box f-link-box text-center"> <?php 
                        if(isset(Yii::app()->params['Facebook']) && strlen(Yii::app()->params['Facebook']) !== 0){ ?>
                            <a href="<?= Yii::app()->params['Facebook'] ?>" style="text-decoration: none;" target="_blank">
                                <i class="fab fa-facebook-square" style="font-size: 25px; margin: 0 5px;"></i>
                            </a> <?php 
                        }
                        if(isset(Yii::app()->params['Instagram']) && strlen(Yii::app()->params['Instagram']) !== 0){ ?>
                            <a href="<?= Yii::app()->params['Instagram'] ?>" style="text-decoration: none;" target="_blank">
                                <i class="fab fa-instagram" style="font-size: 25px; margin: 0 5px;"></i>
                            </a> <?php 
                        } ?>
                    </div>
                </div>
            </div>

            <div class="sc-grid copyright-box">
                <div class="sc-col-12 ">
                    <div class="footer__bar">
                        <div class="sc-grid sc-space-no">
                            <div class="copyright sc-col-auto sc-col-lg-auto-no sc-col-lg-12">
                                <div class="sc-cell" style="font-size: 13px; font-weight: 400;">
                                    <?= Yii::app()->params['Imobiliaria'] ?> © <?= date('Y') ?>
                                </div>
                            </div>
                            <div class="signature-box sc-col-12 sc-col-lg-12">
                                <div class="sc-cell cs-lg-justleft">
                                    <div class="footer__assinatura">
                                        <span class="footer__assinatura-sCordon" style="display: inline-block; margin-right: 20px;">
                                            <a class="footer__assinatura-sCordon-link" target="_blank" title="Portal Encontra Imóveis"> 
                                                <img src="<?= $baseUrl ?>/img/logo-encontra.png" style="height: 32px; width: auto;">
                                            </a>
                                        </span>
                                        
                                        <span class="footer__assinatura-sCordon" style="display: inline-block; position: absolute; right: 0;">
                                            <span style="font-size: 10px; font-weight: 400;">Desenvolvido por:</span>
                                            <a class="footer__assinatura-sCordon-link" href="http://www.scordon.com.br" target="_blank" title="Sistemas Cordon"> 
                                                <img src="<?= $baseUrl ?>/img/logo-scordon-light.png" style="height: 32px; width: auto;">
                                            </a>
                                        </span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div style="background-color: transparent;">
            <a href="javascript:" id="return-to-top">
                <i class="fas fa-angle-up" style="font-size: 29px; margin: 10px 0 0 16px;"></i>
            </a>
        </div>
        
    </body>
    <style>
        
        
    </style>
    <script>
        // ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });
    </script>
</html>
