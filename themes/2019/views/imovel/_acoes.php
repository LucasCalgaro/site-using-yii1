<?php $model = new Contato; ?>

<!-- BOTÃO RECOMENTE -->
<div class="modal fade" id="recomende" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php $form = $this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Recomende este Imóvel</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'form-control', 'placeholder' => 'Informe seu nome.')); ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Informe seu e-mail.')); ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'envParaNome').$form->textField($model, 'envParaNome', array('class' => 'form-control', 'placeholder' => 'Nome de quem vai receber essa indicação.')); ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'envParaEmail').$form->textField($model, 'envParaEmail', array('class' => 'form-control', 'placeholder' => 'E-mail da pessoa que vai receber a indicaçao.')); ?>
					</div>
					
					
					
					<?php echo $form->labelEx($model,'comentario').$form->textArea($model, 'comentario', array('class' => 'form-control', 'placeholder' => '(Opcional) Escreva uma mensagem.')); ?>
				</div>

				<div class="modal-footer">
					<?php echo $form->hiddenField($model,'pagina',array('value' => $this->origem)); ?>
					<?php echo $form->hiddenField($model,'origem',array('value' => 'recomende')) ?>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Enviar Contato</button>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<!-- BOTÃO AGENDAR -->
<div class="modal fade" id="agendar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php $form = $this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agende seu Contato</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'form-control', 'placeholder' => 'Informe seu nome.')); ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Informe seu e-mail.')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-left:0px;">
						<?php echo $form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'form-control', 'placeholder' => 'Telefone para contato.')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-right:0px;">
						<?php echo $form->labelEx($model,'celular').$form->textField($model, 'celular', array('class' => 'form-control', 'placeholder' => 'Celular para contato.')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-left:0px;">
						<?php echo $form->labelEx($model,'data').$form->textField($model, 'data', array('class' => 'form-control', 'placeholder' => 'Data desejada.', 'alt' => 'date')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-right:0px;">
						<?php echo $form->labelEx($model,'horario').$form->textField($model, 'horario', array('class' => 'form-control', 'placeholder' => 'Horário desejado.', 'alt' => 'time')); ?>
					</div>
					
					<div class="form-group">
					<?php echo $form->labelEx($model,'comentario').$form->textArea($model, 'comentario', array('class' => 'form-control', 'placeholder' => '(Opcional) Escreva uma mensagem.')); ?>
					</div>
				</div>

				<div class="modal-footer">
					<?php echo $form->hiddenField($model,'pagina',array('value' => Util::rurl(Yii::app()->getController()->getAction()->id.'/'.$_GET['id']))); ?>
					<?php echo $form->hiddenField($model,'origem',array('value' => 'agendar')) ?>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Enviar Contato</button>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<!-- BOTÃO PROPOSTA -->
<div class="modal fade" id="proposta" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php $form = $this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Faça uma Proposta</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nome').$form->textField($model, 'nome', array('class' => 'form-control', 'placeholder' => 'Informe seu nome.')); ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'email').$form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Informe seu e-mail.')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-left:0px;">
						<?php echo $form->labelEx($model,'telefone').$form->textField($model, 'telefone', array('class' => 'form-control', 'placeholder' => 'Telefone para contato.')); ?>
					</div>
					
					<div class="form-group col-md-6" style="padding-right:0px;">
						<?php echo $form->labelEx($model,'celular').$form->textField($model, 'celular', array('class' => 'form-control', 'placeholder' => 'Celular para contato.')); ?>
					</div>
					
					<div class="form-group">
					<?php echo $form->labelEx($model,'proposta').$form->textArea($model, 'proposta', array('class' => 'form-control', 'placeholder' => 'Detalhe sua proposta para este imóvel.')); ?>
					</div>
				</div>

				<div class="modal-footer">
					<?php echo $form->hiddenField($model,'pagina',array('value' => Util::rurl(Yii::app()->getController()->getAction()->id.'/'.$_GET['id']))); ?>
					<?php echo $form->hiddenField($model,'origem',array('value' => 'proposta')) ?>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Enviar Contato</button>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>


<? if( count($galeria) > 0 ){ ?>
<script type="text/javascript" src="<? echo $this->baseUrl; ?>/js/jssor.slider.min.js"></script>
<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 4,
                $Align: 300
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
<style>
		.imagem{
			width: auto!important;
			margin: 0 auto!important;
		}

        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('<? echo Yii::app()->theme->baseUrl; ?>/img/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider thumbnail navigator skin 16 css */
        /*
        .jssort16 .p            (normal)
        .jssort16 .p:hover      (normal mouseover)
        .jssort16 .pav          (active)
        .jssort16 .pav:hover    (active mouseover)
        .jssort16 .pdn          (mousedown)
        */
        .jssort16 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 100px;
        }
        
        .jssort16 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 100px;
            border: none;
        }
        
        .jssort16 .p img {
            position: absolute;
            top: 0;
            left: 0;
            /*width: 300px;*/
            margin: 0 auto;
            height: 150px;
            filter: alpha(opacity=55);
            opacity: .55;
            transition: opacity .6s;
            -moz-transition: opacity .6s;
            -webkit-transition: opacity .6s;
            -o-transition: opacity .6s;
        }
        
        .jssort16 .pav img, .jssort16 .pav:hover img, .jssort16 .p:hover img {
            filter: alpha(opacity=100);
            opacity: 1;
            transition: none;
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
        }
        
        .jssort16 .pav:hover img, .jssort16 .p:hover img {
            filter: alpha(opacity=70);
            opacity: .7;
        }
        
        .jssort16 .title, .jssort16 .title_back {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 200px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            color: #000;
            font-size: 20px;
        }
        
        .jssort16 .title_back {
            background-color: #fff;
            filter: alpha(opacity=50);
            opacity: .5;
        }
        
        .jssort16 .pav .title_back {
            background-color: #000;
            filter: alpha(opacity=50);
            opacity: .5;
        }
        
        .jssort16 .pav .title {
            color: #fff;
        }
        
        .jssort16 .p.pav:hover .title_back, .jssort16 .p:hover .title_back {
            filter: alpha(opacity=40);
            opacity: .4;
        }
        
        .jssort16 .p.pdn img {
            filter: alpha(opacity=100);
            opacity: 1;
        }

        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('<? echo Yii::app()->theme->baseUrl; ?>/img/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
        
    </style>

	<div class="modal fade" id="galeria" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" style="width:80%;top:5%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Galeria de Imagem</span><small><span class="pull-right" style="margin: 5px 30px 0 0;">Você pode usar também as setas do teclado <kbd><i class="glyphicon glyphicon-arrow-left"></i></kbd> e <kbd><i class="glyphicon glyphicon-arrow-right"></i></kbd> ou arrate a foto para navegar.</small></h4>
				</div>
				<div class="modal-body">

					<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 610px!important; overflow: hidden; visibility: hidden;">
						<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
							<div style="filter: alpha(opacity=80); opacity: 0.8; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
							<div style="position:absolute;display:block;background:url('http://downgraf.com/wp-content/uploads/2014/09/01-progress.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
						</div>
						<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 500px; overflow: hidden;">
							<?
							foreach( end($galeria) as $v ){
								echo'<div style="display: none;">';
								echo'    <img class="imagem" data-u="image" src="'.$v.'" style="cursor:move;"/>';
								echo'    <div data-u="thumb">';
								echo'        <img src="'.$v.'" />';
								echo'    </div>';
								echo'</div>';
							}
							?>
						</div>


						<div data-u="thumbnavigator" class="jssort16" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;margin:0px 0 0 0;" data-autocenter="0">
							<div data-u="slides" style="cursor: move;">
								<div data-u="prototype" class="p">
									<div data-u="thumbnailtemplate" class="t"></div>
								</div>
							</div>
						</div>
						<span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        				<span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
					</div>
					<script>
						jssor_1_slider_init();
					</script>
				</div>
			</div>
		</div>
	</div>

<? } ?>