<?php

    # FUNÇÃO DO MEU VAR_DUMP
    function dump($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    # DEFINE IDIOMA (USADO PARA FORMATAÇÃO DE MOEDA)
    setlocale(LC_ALL, 'pt_BR');

    # RETORNA LINK COM WWW
    function getCurrentURL($link=false){
        if($link){
            $currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        }else{
            $currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://www." : "http://www.";
        }
        $currentURL .= $_SERVER["SERVER_NAME"];
        if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443"){
            $currentURL .= ":".$_SERVER["SERVER_PORT"];
        }
        $currentURL .= $_SERVER["REQUEST_URI"];
        return $currentURL;
    }

	# REDIRECIONA PARA WWW CASO NÃO ESTEJA
    // if( $_SERVER['HTTP_HOST'] != '127.0.0.1' && array_shift( explode('.', $_SERVER['HTTP_HOST']) ) != 'www'){
    //    header('Location: '.getCurrentURL());
    //    die();
    // }

    # CONFIGURAÇÃO DO YII
    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
//		  'defaultController' => 'site/manutencao',
        'name'=>'EAS Empreendimentos Imobilários',
        'sourceLanguage'=> 'pt_br',
        'preload'=>array('log'),
        'import'=>array(
            'application.models.*',
            'application.components.*',
            'application.extensions.PHPMailer.*',
        ),

        'modules'=>array(
            // 'gii'=>array(
            //     'class'=>'system.gii.GiiModule',
            //     'password'=>'pass',
            //     'ipFilters'=>array('127.0.0.1','::1'),
            // ),
        ),
        'components'=>array(
            'util'=>array(
				'class' => 'Util'),
            'user'=>array(
                'allowAutoLogin'=>false,
                'class'=>'application.components.UserLevel',
            ),
            'booster' => array(
                'class' => 'ext.booster.components.Booster',
            ),
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    '/' => 'site/index',
                    'fichas' => 'fichas/index',
                    'imovel' => 'imovel/visualizar',
                    'locacao' => 'imovel/locacao',
                    'venda' => 'imovel/venda',
                    'buscarapida' => 'imovel/buscarapida',
                    
                    'empresa' => 'site/empresa',
                    'engenharia' => 'site/engenharia',
                    'contato' => 'site/contato',
                    'trabalhe-conosco' => 'site/trabalheconosco',
                    'favoritos' => 'imovel/favoritos',
                    'fichas-cadastrais' => 'fichas/index',
                    'ficha-juridica' => 'fichas/juridica',
                    'ficha-fisica' => 'fichas/fisica',
                    'ficha-imovel' => 'fichas/imovel',
                    'avalie-seu-imovel' => 'fichas/avalie',

                    // Padrao
                    '<controller:\w+>'=>'<controller>/list',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/visualizar',
                    '<controller:\w+>/<id:\d+>'=>'<controller>/visualizar',
                ),
            ),   

            //
             'detectMobileBrowser' => array(
                 'class' => 'ext.yii-detectmobilebrowser.XDetectMobileBrowser',
             ),
            'db2'=>array(
                'class'=>'CDbConnection',
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../../gerenciador/protected/data/geradmin.sqlite',
            ),
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=chale_imoveis',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ),
            
            'errorHandler'=>array(
                'errorAction'=>'site/erro',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                    //array(
                    //    'class'=>'CWebLogRoute',
                    //),
                ),
            ),
        ),
        'params'=>array(
 #  ======= >> Informações do ../components/controler.php =======
            'codImob' => 1025,
            'rPasta' => 'encontra',
            'socketIp' => '',
            'socketPorta' => 4040,
            'theme' => '2019',
            'adminEmail' => '',
            'enviarEmail' => array(
                'emailDispara'      => '',    // E-mail para disparo de e-mails
                'emailRecepciona'   => '',    // E-mail que recebe os contatos
                'emailName'         => '',   // E-mail que recebe os contatos
                'emailSenha'        => '',         // Senha do e-mail de disparo
                'mailHost'          => 'mail.easimobiliaria.com.br',   // Host do Email
                'mailPort'          => 587,                     // Porta Servidor
            ),
            
#  ======= >> Busca de imagens dos imóveis =======
            'pathImagens' => "/opt/htdocs_geral/ei/common/imagens/img/",
            //'pathImagens' => "/home/chale/public_html/img/",
            'usarGlobPesqFotos' => true, // true. usa funcao glob para buscar fotos, false.nao
                                         // use glob se existir um link do endereco pathImagens
	                                  // para o encontraimoveis.com.br
            'urlImagens' => 'http://localhost/ei/common/imagens/img/',
            //'urlImagens' => "http://www.encontraimoveis.com.br/img/",
            
#  ======= >> Sistemas de URL Amigável dos imóveis (../models/Imovel.php) =======
            'aOrdemUrlAmigavel' => array(
                "finalidade",
                "cidade",
                "tp_bem",
                "bairro",
                "endereco_1",
            ),
            
#  ======= >> Informações da imobiliária (../theme/..) =======
            'Creci' => '',
            'Crea'  => '',
            'Imobiliaria' => 'EAS Empreendimentos Imobilários',
            'Endereco' => 'Avenida Tamandaré, 119, | Sala 12-A - Zona 01 | Maringá - Paraná',
            'EnderecoReduzido' => 'Av Tamandaré, 119 - Sala 12-A - Maringá/PR',
            'Cidade' => 'Maringá', 
            'Estado' => 'Paraná', 
            'uf' => 'PR',
                
            'Fone' => array(
                '0' => array(
                    'Title' => '',
                    'Link' => '',
                    'Number' => '' ,
                ),
            ),
            'Email' => array(
                '0' =>  array(
                     'Title' => '',
                     'Link' => '',
                ),
            ),
            'Celular' => array(
                //'0' => array(
                //    'Title' => '',
                //    'Link' => '',
                //    'Number' => '' ,
                //),
            ),
            'Whatsapp' => array(
                //'0' => array(
                //    'Title' => 'WhatsApp',
                //    'Link' => '5544997272562',
                //    'Number' => '(44) 99727-2562' ,
                //),
            ),

            'WhatsAppMsg' => 'Olá, tenho interesse nesse imóvel. Ref.: ',
            'Facebook' => '',
            'Instagram' => '',
            
            'GoogleMapsKey' => '',
            'GoogleMaps' => 'Av. Tamandaré, 119 - Maringá',
            
            'textoFichaImovel' => array(
                /*
                '1' => 'Não Tratar de locação e/ou venda diretamente ou por intermédio de outrem durante o prazo de vigência desta opção;',
                '2' => 'Após o vencimento do prazo de vigência desta, ocorrendo a hipótese de se efetivar a transação com pessoa indicada '
                     . 'pela empresa contratada, ou corretor, dentro do prazo de vigência desta, a remuneração constante no quadro acima, '
                     . 'Taxa de locação de _____% do valor do 1º Aluguel, com validade de 1 (um) ano, o enquanto perdurar o contrato de '
                     . 'locação, e taxa de administração de ______% ao mês sobre o valor do aluguel, enquanto perdurar o contrato de '
                     . 'locação, ou ________% do valor da venda do imóvel em caso venda do mesmo;',
                '3' => 'A referendar qualquer locação feita dentro das condições mínimas acima especificadas, bem como dar por firme e '
                     . 'valioso qualquer contrato de locação e/ou venda pactuado, que a empresa acima fica desde já expressamente autorizada '
                     . 'a receber e do mesmo modo passar recibo em seu nome;',
                '4' => 'A Contratada obriga-se a prestar seus serviços com zelo e solicitude, podendo anunciar a Locação e/ou venda do '
                     . 'imóvel,correndo todas as despesas por sua e própria custa.',
                */
            ),
            
            // Conteúdo da página site/empresa.php: 
            // Para Slogan: 'Subtitle' => '[Slogan]' + 'Content' => ''
            'textoEmpresa' => array(   
                '1' => array(                           //... Section Number
                    'SectionName' => 'sobre-nos',      //... Section Name   (<div id="...">)
                    'Title' => 'Quem somos',            //... Section Title  (<h1>...</h1>)
                    'Paragraphs' => array(              //... Content Paragraphs
                        '1' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                            //'ImageName' => '/img/logo.png',
                            //'ImagePosition' => 'pos-content', //pre-content ou pos-content
                            //'ImageWidth' => 500,
                        ),
                        '2' => array(
                            'Subtitle' => '',
                            'Content' => '<div class="text-center" style="margin-top: 50px;"><div class="">',
                            'ImageName' => '/img/logo/logo.png',
                            'ImagePosition' => 'pos-content', //pre-content ou pos-content
                            'ImageWidth' => 400,
                        ),
                        '3' => array(
                            'Subtitle' => '',
                            'Content' =>  '</div></div>',
                            //'ImageName' => '/img/logo.png',
                            //'ImagePosition' => 'pos-content', //pre-content ou pos-content
                            //'ImageWidth' => 500,
                        ),
                    ),
                ),
            ),
            /*'textoEngenharia' => array(   
                 '1' => array(                      //... Section Number
                    'SectionName' => '',  //... Section Name   (<div id="...">)
                    'Title' => '',   //... Section Title  (<h1>...</h1>)
                    'Paragraphs' => array(         //... Content Paragraphs
                        '1' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '2' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                            'ImageName' => '/img/engenharia1.jpeg',
                            'ImagePosition' => 'pre-content', //pre-content ou pos-content
                            'ImageWidth' => 500,
                        ),
                        
                        '3' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '4' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '5' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        
                        '6' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                            'ImageName' => '/img/engenharia2.jpeg',
                            'ImagePosition' => 'pos-content', //pre-content ou pos-content
                            'ImageWidth' => 500,
                        ),
                        '7' => array(
                            'Subtitle' => '',
                        ),
                        '8' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '9' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '10' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '11' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                        '12' => array(
                            'Subtitle' => '',
                            'Content' =>  '',
                        ),
                    ),
                ),
            ),*/
        ),
        
    );
