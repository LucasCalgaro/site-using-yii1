<?php

class FichasController extends Controller {

    public function beforeAction($action) {
        Yii::app()->user->setState('finalidade', null);
        Yii::app()->user->setState('estado', null);
        Yii::app()->user->setState('cidade', null);
        Yii::app()->user->setState('bairro', null);
        Yii::app()->user->setState('tipo', null);
        Yii::app()->user->setState('referencia', null);
        return true;
    }

    # PÁGINA FICHAS CADASTRAIS - OPÇÕES

    public function actionIndex() {

        $this->render('fichas', array(
            'breadcrumbs' => array('Fichas Cadastrais'),
            'titulo' => 'Fichas de Cadastro'
        ));
    }

    # PÁGINA FICHA CADASTRO PESSOA FÍSICA

    public function actionFisica() {
        $model = new Contato();

        if (isset($_POST['Contato'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $titulos = array('titulo1', 'titulo2', 'titulo3', 'titulo4', 'titulo5', 'titulo6', 'titulo7');

            $html .= '<ul>';
            foreach ($_POST['Contato'] as $k => $v) {
                if (in_array($k, $titulos)) {
                    $html .= '<li><b>' . $model->getAttributeLabel($k) . '</b></li>';
                } else {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : ' . $v . '</li>';
                    }
                }
            }
            $html .= '</ul>';
            /*
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'server.scordon.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = $this->emailDisp;
            $mail->Password = $this->emailSenha;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            $mail->From = $this->emailDisp;
            $mail->FromName = Yii::$app->params['Imobiliaria']; // 'Imobiliária Zacarias';
            $mail->addAddress($this->emailRecep, Yii::$app->params['Imobiliaria']);
            $mail->isHTML(true);

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Ficha Pessoa Física"');
            $mail->Body = $html;

            $mail->send();
            */
            $client_agent = ( !empty($_SERVER['HTTP_USER_AGENT']) ) 
                          ? $_SERVER['HTTP_USER_AGENT'] 
                          : ( ( !empty($_ENV['HTTP_USER_AGENT']) ) 
                                ? $_ENV['HTTP_USER_AGENT'] 
                                : $HTTP_USER_AGENT );

            $cBrw = new BrowserInfo($client_agent);

            $this->enviarEmail($model->nome . " Ficha Fisica", 
                               //"         IP: " . ${identity['IP_ADDR']} . "<br>\n" .
                               "    Browser: " . $cBrw->Name . " " . $cBrw->Version . "<br>\n" .
                               "   Detalhes: " . $cBrw->Agent . "<br>\n" .
                               "         Em: " . date("d-m-Y H:i:s") . "<br>\n" .
                               "   Mensagem: " . $html);
            
            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('fisica', array(
            'model' => $model,
            'breadcrumbs' => array('Cadastro de Ficha para Pessoa Física'),
            'titulo' => 'Ficha Fisica'
        ));
    }

    # PÁGINA FICHA CADASTRO PESSOA JURÍDICA

    public function actionJuridica() {
        $model = new Contato();

        if (isset($_POST['Contato'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $titulos = array('titulo8', 'titulo9', 'titulo10', 'titulo11', 'titulo3', 'titulo5', 'titulo6');

            $html .= '<ul>';
            foreach ($_POST['Contato'] as $k => $v) {
                if (in_array($k, $titulos)) {
                    $html .= '<li><b>' . $model->getAttributeLabel($k) . '</b></li>';
                } else {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : ' . $v . '</li>';
                    }
                }
            }
            $html .= '</ul>';
            
            /*
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'server.scordon.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = $this->emailDisp;
            $mail->Password = $this->emailSenha;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            $mail->From = $this->emailDisp;
            $mail->FromName = Yii::$app->params['Imobiliaria'];
            $mail->addAddress($this->emailRecep, Yii::$app->params['Imobiliaria']);
            $mail->isHTML(true);

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Ficha Pessoa Jurídica"');
            $mail->Body = $html;

            $mail->send();
            */
            
            $client_agent = ( !empty($_SERVER['HTTP_USER_AGENT']) ) 
                          ? $_SERVER['HTTP_USER_AGENT'] 
                          : ( ( !empty($_ENV['HTTP_USER_AGENT']) ) 
                                ? $_ENV['HTTP_USER_AGENT'] 
                                : $HTTP_USER_AGENT );

            $cBrw = new BrowserInfo($client_agent);

            $this->enviarEmail($model->nome . " Ficha Jurídica", 
                               //"         IP: " . ${identity['IP_ADDR']} . "<br>\n" .
                               "    Browser: " . $cBrw->Name . " " . $cBrw->Version . "<br>\n" .
                               "   Detalhes: " . $cBrw->Agent . "<br>\n" .
                               "         Em: " . date("d-m-Y H:i:s") . "<br>\n" .
                               "   Mensagem: " . $html);
            
            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('juridica', array(
            'model' => $model,
            'breadcrumbs' => array('Cadastro de Ficha para Pessoa Jurídica'),
            'titulo' => 'Ficha Juridica'
        ));
    }

    # PÁGINA FICHA CADASTRO DE IMÓVEL

    public function actionImovel() {
        $model = new Contato();

        if (isset($_POST['Contato'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $titulos = array('titulo12', 'titulo13', 'titulo14', 'titulo15', 'titulo16', 'titulo17', 'titulo18', 'titulo19', 'titulo20', 'titulo21', 'titulo22', 'titulo23', 'titulo24');

            $html .= '<ul>';
            foreach ($_POST['Contato'] as $k => $v) {
                if (in_array($k, $titulos)) {
                    $html .= '<li><b>' . $model->getAttributeLabel($k) . '</b></li>';
                } else {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : ' . $v . '</li>';
                    }
                }
            }
            $html .= '</ul>';

            /*
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'server.scordon.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = $this->emailDisp;
            $mail->Password = $this->emailSenha;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            $mail->From = $this->emailDisp;
            $mail->FromName = Yii::$app->params['Imobiliaria'];
            $mail->addAddress($this->emailRecep, Yii::$app->params['Imobiliaria']);
            $mail->isHTML(true);

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Cadastro Ficha de Imóvel"');
            $mail->Body = $html;

            $mail->send();
            */
            
            $client_agent = ( !empty($_SERVER['HTTP_USER_AGENT']) ) 
                          ? $_SERVER['HTTP_USER_AGENT'] 
                          : ( ( !empty($_ENV['HTTP_USER_AGENT']) ) 
                                ? $_ENV['HTTP_USER_AGENT'] 
                                : $HTTP_USER_AGENT );

            $cBrw = new BrowserInfo($client_agent);

            $this->enviarEmail($model->nome . " Ficha de Imóvel", 
                               //"         IP: " . ${identity['IP_ADDR']} . "<br>\n" .
                               "    Browser: " . $cBrw->Name . " " . $cBrw->Version . "<br>\n" .
                               "   Detalhes: " . $cBrw->Agent . "<br>\n" .
                               "         Em: " . date("d-m-Y H:i:s") . "<br>\n" .
                               "   Mensagem: " . $html);
            
            
            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('imovel', array(
            'model' => $model,
            'breadcrumbs' => array('Cadastro Ficha de Imóvel')
        ));
    }

    # PÁGINA AVALIE SEU IMÓVEL

    public function actionAvalie() {
        $model = new Contato();

        if (isset($_POST['Contato'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $titulos = array('titulo13', 'titulo26');

            $html .= '<ul>';
            foreach ($_POST['Contato'] as $k => $v) {
                if (in_array($k, $titulos)) {
                    $html .= '<li><b>' . $model->getAttributeLabel($k) . '</b></li>';
                } else {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : ' . $v . '</li>';
                    }
                }
            }
            $html .= '</ul>';

            /*
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'server.scordon.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = $this->emailDisp;
            $mail->Password = $this->emailSenha;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            $mail->From = $this->emailDisp;
            $mail->FromName = Yii::$app->params['Imobiliaria'];
            $mail->addAddress($this->emailRecep, Yii::$app->params['Imobiliaria']);
            $mail->isHTML(true);

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Avalie Seu Imóvel"');
            $mail->Body = $html;

            $mail->send();
            */
            
            $client_agent = ( !empty($_SERVER['HTTP_USER_AGENT']) ) 
                          ? $_SERVER['HTTP_USER_AGENT'] 
                          : ( ( !empty($_ENV['HTTP_USER_AGENT']) ) 
                                ? $_ENV['HTTP_USER_AGENT'] 
                                : $HTTP_USER_AGENT );

            $cBrw = new BrowserInfo($client_agent);

            $this->enviarEmail($model->nome . " Ficha de Avaliação", 
                               //"         IP: " . ${identity['IP_ADDR']} . "<br>\n" .
                               "    Browser: " . $cBrw->Name . " " . $cBrw->Version . "<br>\n" .
                               "   Detalhes: " . $cBrw->Agent . "<br>\n" .
                               "         Em: " . date("d-m-Y H:i:s") . "<br>\n" .
                               "   Mensagem: " . $html);
            
            
            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('avalie', array(
            'model' => $model,
            'breadcrumbs' => array('Avalie Seu Imóvel'),
            'titulo' => 'Fichas avalie seu imóvel'
        ));
    }

    # PÁGINA NÓS LIGAMOS PARA VOCÊ

    public function actionNosLigamosParaVoce() {
        $this->render('construcao', array(
            'breadcrumbs' => array('Página em Construção')
        ));
    }

}

?>