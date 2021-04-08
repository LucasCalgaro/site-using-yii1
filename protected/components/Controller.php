<?php

class Controller extends CController {

    public $baseUrl;        // Recebe diretorio
    public $codImob;        // Recebe código da imobiliaria
    public $rPasta;         // Recebe nome da pasta remota
    public $socketIp;       // IP do servidor remoto
    public $socketPorta;    // Porta do servidor remoto
    public $emailDisp;      // E-mail para disparo de e-mails
    public $emailSenha;     // Senha do e-mail de disparo
    public $emailRecep;     // E-mail que recebe os contatos
    public $emailName;     // E-mail que recebe os contatos
    public $emailAssunto;   // Assunto
    public $emailDest;      // Destinatario
    public $mailHost;       // Host do Email
    public $mailPort;       // Porta Servidor
    public $origem;         // Retorna URL atual
    public $Cidade;         // Retorna URL atual
    public $menu = array();
    public $breadcrumbs = array();

    public function init() {
        // if(Yii::app()->detectMobileBrowser->showMobile) {
        // Yii::app()->theme = 'mobile';
        // } else {
        Yii::app()->theme = '2019';
        // }

        $this->baseUrl = (Yii::app()->theme ? Yii::app()->theme->baseUrl : Yii::app()->request->baseUrl);

        # ALIMENTA AS GLOBAIS
        $this->codImob = 179;
        $this->rPasta = 'encontra';
        $this->socketIp = '198.50.183.148';
        $this->socketPorta = 4040;

        $this->emailDisp    = Yii::app()->params['enviarEmail']['emailDispara'];
        $this->emailRecep   = Yii::app()->params['enviarEmail']['emailRecepciona']; // destino
        $this->emailName    = Yii::app()->params['enviarEmail']['emailName'];
        $this->emailSenha   = Yii::app()->params['enviarEmail']['emailSenha'];
        $this->mailHost     = Yii::app()->params['enviarEmail']['mailHost'];
        $this->mailPort     = Yii::app()->params['enviarEmail']['mailPort'];

        /* if(!Yii::app()->user->hasState("desenvolvimento")){
          $this->layout = 'login';
          if( isset($_POST) && !empty($_POST) ){
          if( $_POST['usuario'] == 'max' && $_POST['senha'] == 'cordon' ){
          Yii::app()->user->setState("desenvolvimento", true);
          Yii::app()->request->redirect('/');
          }
          }
          } */

        # Retorna a URL
        $server = $_SERVER['SERVER_NAME'];
        $endereco = $_SERVER ['REQUEST_URI'];
        $this->origem = "http://" . $server . $endereco;
    }

    # RSS = PROCURA TAG IMG

    public function buscaImg($html, $class = false) {
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        return '<img src="' . $xpath->evaluate("string(//img/@src)") . '" alt="Imagem" class="' . $class . '" />';
    }

    # RSS = REMOVE TAG IMG

    public function retiraImg($arr) {
        $txt = strip_tags($arr);
        return( $txt );
    }

    # RSS = FORMATA DATA

    function formataData($date) {
        $a = $date;
        $dataTime = date_create($a);
        date_format($dataTime, $date);
        return $dataTime->format("l, d M Y");
    }

    # RSS = FORMATA DATA BRASIL

    function formataPt($arr) {
        $array1 = array("Monday", "tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday",);
        $array2 = array("Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sabado", "Domingo",);
        return str_replace($array1, $array2, $arr);
    }

    // $aArquivoAttach deve ser $_FILES['TrabalheConoscoForm'] ou coisa semelhante
    public function enviarEmail($aAssunto, $aCorpo, $aArquivoAttach=false)
    {
        Util::enviarEmail( array(
                        'Host'                  => $this->mailHost,// 'mail.imobiliarialiderdracena.com.br';
                        'UserName'              => $this->emailDisp,
                        'Password'              => $this->emailSenha,
                        'Porta'                 => $this->mailPort,
                        'EmailOrigemDisplay'    => $this->emailDisp,
                        'NomeOrigem'            => $this->emailName, //'Imobiliaria Lider Dracena';
                        'EmailDestino'          => $this->emailRecep,
                        'UserName'              => $this->emailDisp, ///*'Imobiliaria Lider Dracena'*/);
                        'enviarArquivos'        => $aArquivoAttach,
                        'Assunto'               => $aAssunto, /*'Contato recebido através do formulário "Trabalhe Conosco"'*/
                        'Corpo'                 => $aCorpo
            
                    )
                );
    }
    
    
}

?>
