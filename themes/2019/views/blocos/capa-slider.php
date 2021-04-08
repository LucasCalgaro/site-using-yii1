<style>
 .capa-height{ height: 90vh !important; }
</style>
<div class="uk-section-default" style="margin: -50px 0 0 0;">
    <div class="uk-section uk-light capa-height" 
         style="padding: 0; overflow: hidden;" 
         uk-slideshow="autoplay: true; animation: slide; pause-on-hover: false">
        <ul class="uk-slideshow-items capa-height" style=""> <?php
            foreach($aImg as $aName){
                $imagem = $baseUrl.'/img/capa/'.$aName; ?>
                <li>
                    <div class="uk-background-cover capa-height" style="width: 100%; background-image: url(<?= $imagem ?>);"></div>
                </li> <?php
            } ?>
        </ul>
    </div>
</div>