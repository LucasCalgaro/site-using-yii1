<? $baseUrl = (Yii::app()->theme ? Yii::app()->theme->baseUrl : Yii::app()->request->baseUrl); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pt-br" />
        
        <!-- JQUERY -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- PERSONALIZAÇÃO -->
        <link rel="stylesheet" href="<?=$baseUrl?>/css/scordon.css">
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    
    <body>
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
        
        <div id="cabecalho">
            <div class="container">
                <div class="col-md-12 navegacao">
                    <nav>
                        <a style="" href="<?=Yii::app()->createUrl('manutencao')?>" title="Imóveis a Venda" target="_self">VENDA</a>
                        <a style="" href="<?=Yii::app()->createUrl('manutencao')?>" title="Imóveis para Locação" target="_self">LOCAÇÃO</a>
                        <!--<a href="<?=Yii::app()->createUrl('/busca')?>" title="Buscar seu Imóvel" target="_self">BUSCA</a>-->
                        <a style="" href="<?=Yii::app()->createUrl('manutencao')?>" title="Meus Favoritos" target="_self">FAVORITOS</a>
                        <a style="" href="<?=Yii::app()->createUrl('manutencao')?>" title="Quem Somos" target="_self">EMPRESA</a>
                        <a style="" href="<?=Yii::app()->createUrl('manutencao')?>" title="Entre em Contato" target="_self">CONTATO</a>
						<a style="position: relative; top: -4px;" href="http://fernandesnascimento.com.br/corretor/livehelp.php?&amp;dynamic=Ywebsite=1&amp;serversession=1&amp;pingtimes=10" target="_blank" >
							<img src="http://fernandesnascimento.com.br/corretor/image.php?website=1&amp;what=getstate" border=0 >
						</a>


                    </nav>
                </div>
                
                <div class="col-md-6">
                    <a class="logotipo" href="<?=Yii::app()->createUrl('manutencao')?>" title="Página Inicial" target="_self"> <img src="<?=$baseUrl?>/img/logotipo.png" alt="Logotipo" /> </a>
                </div>
                <div class="col-md-6 topoInfo text-right">
                    <p class="telefone">(18) 3304-4861</p>
                    <p class="endereco">
                        Rua Afonso Pena, n° 1234<br />
                        Araçatuba - SP<br />
                        contato@fernandesnascimento.com.br
                    </p>
                </div>
            </div>
        </div>
        
        <div id="corpo">
            <div class="container">
                <?=$content;?>
            </div>
        </div>
        
        <div id="rodape">
            
            <div class="container">
                
                <div class="col-md-2 text-center rodape-logo">
                    <a href="<?=Yii::app()->createUrl('manutencao')?>" title="Imobiliaria Fernandes e Nascimento" target="_self"><img src="<?=$baseUrl?>/img/logo-rodape.png" alt="Logo Fernandes e Nascimento LTDA" /></a>
                </div>
                
                <div class="col-md-3">
                    <address>
                        Rua Afonso Pena 1234<br />
                        Bairro Vila Mendonça<br />
                        16015-040<br />
                        Araçatuba-SP
                    </address>
                </div>
                
                <div class="col-md-2">
                    <p class="telefone">(18) 3304-4861</p>
                </div>
                
                <div class="col-md-4">
                    <a href="mailto:contato@fernandesnascimento.com.br" class="email">contato@fernandesnascimento.com.br</a>
                </div>
                
            </div>
            
        </div>
        
        <div id="rodape2" class="text-center">
            <div class="container">
                <div class="col-md-12 text-center">
                    <div class="pull-right">
                        <a href="http://www.scordon.com.br" title="Sistemas Cordon" target="_blank"> <img src="<?=$baseUrl?>/img/logo-cordon.png" /> </a>
                        <a href="http://www.encontraimoveis.com.br" title="Encontra Imoveis" target="_blank"> <img src="<?=$baseUrl?>/img/logo-encontra.png" /> </a>
                    </div>
                    <p>
                        &copy; <?=date('Y')?> - Fernandes e Nascimento LTDA.<br />
                        Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
		<!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
		<script src="https://apis.google.com/js/platform.js" async defer>
		  {lang: 'pt-BR'}
		</script>
    </body>
    
    <!-- BOOSTRAP JAVASCRIPT -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
</html>
