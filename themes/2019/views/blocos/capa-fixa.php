<?php

foreach($aImg as $aName){
$imagem = $baseUrl.'/img/capa/'.$aName; ?>
    <div class="uk-section-default" style="margin: -50px 0 0 0;">
        <div class="uk-section uk-light uk-background-cover" style="background-image: url(<?= $imagem ?>); height: 90vh;">,
            <div class="container"></div>
        </div>
    </div> <?php  
} ?>