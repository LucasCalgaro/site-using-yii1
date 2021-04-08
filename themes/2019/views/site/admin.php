<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<div class="row-fluid">
    <?php echo '<h3 class="text-center col-md-3"> Seja Bem Vindo ' . Yii::app()->user->name . '</h3>';?>
    <?php echo '<h3 class="text-left col-md-9 text-center"> Área Administrativa</h3>';?>
</div>
<div class="row-fluid">
    <div class="col-md-3">
        <div class="collection">
            <p class="collection-item text-center">MENU</p>
            <a href="<? echo Yii::app()->createUrl('/') ?>" class="collection-item">Voltar ao site</a>
            <a href="<? echo Yii::app()->createUrl('/site/logout') ?>" class="collection-item">Sair</a>
          </div>
    </div>
    <div class="col s12 m8">


        <div class="collection">
            <p class="collection-item text-center">OPÇÕES</p>
            <a href="<? echo Yii::app()->createUrl('/banner/admin') ?>" class="collection-item">Banner</a>
            <a href="<? echo Yii::app()->createUrl('/imovel/portal') ?>" class="collection-item">Exporta portal</a>
        </div>
                
    </div>
    <div class="col s2 m2 "></div>
</div>
