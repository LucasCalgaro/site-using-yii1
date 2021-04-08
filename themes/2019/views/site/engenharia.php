<?php //$this->breadcrumbs= $breadcrumbs; ,
// $this->setPageTitle($titulo. ' | '.Yii::app()->params['Imobiliaria']);
?>

<?php 
/* QUANDO ENTRAR AQUI, ARMAZENAR URL NA SESSION. IREI USAR ESSA INFORMAÇÃO NA TELA DE VISUALIZAÇÃO DO IMÓVEL */ 
?>

<div class="row columns is-centered">
    <div class="col-lg-9">
    <?php if(isset($this->breadcrumbs)){ $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); } 
    if(isset(Yii::app()->params['textoEngenharia'])){
        foreach(Yii::app()->params['textoEngenharia'] as $aSection => $aTexto) {
            echo (isset($aTexto['SectionName'])) ? '<div id="'. $aTexto['SectionName'] .'" class="column is-7 engenharia">' : '<div class="column is-7 engenharia">';

            if(isset($aTexto['Title']) 
            && strlen($aTexto['Title']) > 0){ ?>
                    <h1 class="titulo-interno uniuansheavy"><?= $aTexto['Title'] ?></h1>
                    <div class="titulo-border"></div> <?php
            }

            if(isset($aTexto['Paragraphs'])){
                foreach($aTexto['Paragraphs'] as $aPSeq => $aParagraphsContent){
                    if(isset($aParagraphsContent['Content'])){
                        if (isset($aParagraphsContent['Subtitle'])    
                         && strlen($aParagraphsContent['Subtitle']) > 0 
                         && strlen($aParagraphsContent['Content']) > 0){ ?>
                            <h5 class="txt-subtitle"><?= $aParagraphsContent['Subtitle']?></h5> <?php
                        }
                        if (isset($aParagraphsContent['ImageName'])
                         && isset($aParagraphsContent['ImagePosition'])
                         && strlen($aParagraphsContent['ImageName']) > 0
                         && $aParagraphsContent['ImagePosition'] == 'pre-content'){
                            if(isset($aParagraphsContent['ImageWidth'])
                            && $aParagraphsContent['ImageWidth'] > 0){ ?>
                                <img src="<?= $this->baseUrl . $aParagraphsContent['ImageName']?>"
                                     style=" width: <?= $aParagraphsContent['ImageWidth'] ?>px; margin: 15px auto;"><?php
                            }
                            else { ?>
                                <img src="<?= $this->baseUrl . $aParagraphsContent['ImageName']?>" 
                                     style="margin: 15px auto;"><br><?php
                            }
                        }
                        if (strlen($aParagraphsContent['Content']) > 0){ ?>
                            <div class="text-justify txt-content" ><?=$aParagraphsContent['Content'] ?> </div> <?php 
                        }

                        if (isset($aParagraphsContent['ImageName'])
                         && isset($aParagraphsContent['ImagePosition'])
                         && strlen($aParagraphsContent['ImageName']) > 0
                         && $aParagraphsContent['ImagePosition'] == 'pos-content'){
                            if(isset($aParagraphsContent['ImageWidth'])
                            && $aParagraphsContent['ImageWidth'] > 0){ ?>
                                <img src="<?= $this->baseUrl . $aParagraphsContent['ImageName']?>"
                                     style=" width: <?= $aParagraphsContent['ImageWidth'] ?>px;margin: 15px auto;"><?php
                            }
                            else { ?>
                                <img src="<?= $this->baseUrl . $aParagraphsContent['ImageName']?>"
                                     style="margin: 15px auto;"> <?php
                            }
                        }

                        if (isset($aParagraphsContent['Subtitle'])    
                         && strlen($aParagraphsContent['Subtitle']) > 0 
                         && strlen($aParagraphsContent['Content']) == 0){ ?>
                            <h2 class="text-center txt-slogan" style="margin-top: 10px; padding-top: 0;"><small><?= $aParagraphsContent['Subtitle'] ?></small></h2> <?php 
                        }
                    }
                }
            } ?>    
            </div> <?php    
        }   
    } ?>
    </div>
    <?php $this->renderPartial('/system/m_sidebar'); ?>
</div>