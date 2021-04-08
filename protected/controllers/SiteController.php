<?php

class SiteController extends Controller {

    // public function beforeAction(){
    //     Yii::app()->user->setState('finalidade', null);
    //     Yii::app()->user->setState('estado', null);
    //     Yii::app()->user->setState('cidade', null);
    //     Yii::app()->user->setState('bairro', null);
    //     Yii::app()->user->setState('tipo', null);
    //     Yii::app()->user->setState('referencia', null);
    //     return true;
    // }

    public function actions() {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }


    # PÁGINA INICIAL
    public function actionIndex() 
    {
        // Limpa Pesquisas
        foreach (Imovel::model()->paArrayCamposParaPesquisa as $aOpcao) {
            Yii::app()->user->setState($aOpcao, false);
        }

        $imagem = array();

         // $slide = Imovel::model()->findAll( array('condition' => 'destaque <= 4 AND incorporacao IS NOT NULL', 'order' => 'rand()' ) );
        //$destaqueListav = Imovel::model()->findAll( array('condition' => 'finalidade = "Venda"', 'order' => 'rand()', 'limit' => 1, 'distinct'=>true,));
        //$destaqueListal = Imovel::model()->findAll( array('condition' => 'finalidade = "Locacao"', 'order' => 'rand()', 'limit' => 1, 'distinct'=>true,));
        //$imbDes = Imovel::model()->findAll(array('condition' => 'destaque >= 1', 'limit' => '10'));
        //$slide = Imovel::model()->findAll( array('condition' => 'destaque = 1', 'order' => 'rand()', 'limit' => 1 ));

        $imbVenda = Imovel::model()->findAll(array('condition' => 'finalidade = "Venda"', 'limit' => '1', 'order'=>'RAND()'));
        $imbLocacao = Imovel::model()->findAll(array('condition' => 'finalidade = "Locacao"', 'limit' => '1', 'order'=>'RAND()'));
        //$imbLocDes = Imovel::model()->findAll(array('condition' => 'finalidade = "Locacao"', 'limit' => '2'));
        //$imbVenDes = Imovel::model()->findAll(array('condition' => 'finalidade = "Venda"', 'limit' => '2','order'=>'RAND()'));
        // $lancamento = Banner::model()->findAll(array('condition'=>'status = 1'));

        $this->render('index', array(
            'imbVenda'  => $imbVenda,
            'imbLocacao'=> $imbLocacao,
            //'imbVenDes' => $imbVenDes,
            //'imbLocDes' => $imbLocDes,
            //'imbDes'    => $imbDes,
            'imagens'   => $imagem,
            //'slide'     => $slide,
            //'destaqueListav'=> $destaqueListav,
            //'destaqueListal'=> $destaqueListal,
            'titulo'=>'Home'
        ));
    }

    # PÁGINA EMPRESA
    public function actionEmpresa(){
        $this->render('empresa', array(
            'breadcrumbs' => array('A Empresa'),
            'titulo'=>'A Empresa'
        ));
    }
    
    # PÁGINA ENGENHARIA
    public function actionEngenharia(){
        $this->render('engenharia', array(
            'breadcrumbs' => array('Engenheria'),
            'titulo'=>'Engenharia',
        ));
    }
    
    public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionContato() {
        $model = new ContactForm;
        if(isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate()) {
                
                $client_agent = ( !empty($_SERVER['HTTP_USER_AGENT']) ) 
                              ? $_SERVER['HTTP_USER_AGENT'] 
                              : ( ( !empty($_ENV['HTTP_USER_AGENT']) ) 
                                    ? $_ENV['HTTP_USER_AGENT'] 
                                    : $HTTP_USER_AGENT );
                
                $cBrw = new BrowserInfo($client_agent);
                
                $this->enviarEmail($model->name . " Entrou em Contato Conosco", 
                                   //"         IP: " . ${identity['IP_ADDR']} . "<br>\n" .
                                   "    Browser: " . $cBrw->Name . " " . $cBrw->Version . "<br>\n" .
                                   "   Detalhes: " . $cBrw->Agent . "<br>\n" .
                                   "       Nome: " . $model->name . "<br>\n" .
                                   "      eMail: " . $model->email. "<br>\n" .
                                   "   Telefone: " . $model->fone. "<br>\n" .
                                   "    Assunto: " . $model->subject. "<br>\n" .
                                   " Comentário: " . $model->body . "<br>\n" .
                                   "         Em: " . date("d-m-Y H:i:s") . "<br>\n");
                /*
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                $aDbg = Yii::app()->params['adminEmail'];
                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                */
                //Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                Yii::app()->user->setFlash('contact','Obrigado por contatar-nos. Nós responderemos o mais rápidos possível.');
                $this->refresh();
            }
        }

        $this->render('contato', array(
            'model' => $model,
            'breadcrumbs' => array('Formulário de Contato'),
            'titulo'=>'Contato'
        ));
    }

    public function actionLogin() {
        $model = new LoginForm;

        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->render('login',array('model'=>$model,'titulo'=>'Login'));
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    # PÁGINA TRABALHE CONOSCO
    public function actionTrabalheConosco(){

        $model = new TrabalheConoscoForm;

        if(isset($_POST['TrabalheConoscoForm'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $html .= '<ul>';
            foreach($_POST['TrabalheConoscoForm'] as $k => $v){
                if($k != 'verifyCode'){
                    $html .= '<li>' . $model->getAttributeLabel($k) .' : '. $v .'</li>';
                }
            }
            $html .= '</ul>';

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
            $mail->addAttachment($_FILES['TrabalheConoscoForm']['tmp_name']['curriculo'], $_FILES['TrabalheConoscoForm']['name']['curriculo']);
            $mail->isHTML(true);

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Trabalhe Conosco"');
            $mail->Body    = $html;

            $mail->send();

            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('trabalhe-conosco', array(
            'model' => $model,
            'breadcrumbs' => array('Trabalhe Conosco'),
            'titulo'=>'Trabalhe Conosco'
        ));
    }

    public function actionNosLigamosParaVoce(){

        $model = new Contato;

        if(isset($_POST['Contato'])) {

            $html = '<p>Você recebeu um contato.</p>';

            $html .= '<ul>';

            $titulos = array('titulo27');

            $html .= '<ul>';

            foreach($_POST['Contato'] as $k => $v){

                if( in_array($k, $titulos) ){
                    $html .= '<li><b>'.$model->getAttributeLabel($k).'</b></li>';
                }else{
                    if( !empty($v) ){
                        $html .= '<li>' . $model->getAttributeLabel($k) .' : '. $v .'</li>';
                    }
                }

            }

            $html .= '</ul>';

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

            $mail->Subject = utf8_decode('Contato recebido através do formulário "Nós Ligamos Para Você"');
            $mail->Body    = $html;

            $mail->send();

            Yii::app()->user->setFlash('success', 'Obrigado por nos contatar. Nós vamos responder-lhe logo que possível.');
            $this->refresh();
        }

        $this->render('nos-ligamos-para-voce', array(
            'model' => $model,
            'breadcrumbs' => array('Nós Ligamos Para Você')
        ));
    }

    public function actionDev(){
        if(Yii::app()->user->hasState("desenvolvimento")){
            $this->redirect(Yii::app()->homeUrl);
        }
    }

            public function actionErro(){
                    $this->render('erro', array(
            'breadcrumbs' => array('Página não encontrada') ,
        ));
            }

       public function actionAdmin() {
                    $this->render('admin');

       }

        public function actionLancamento($id){
            $model=Banner::model()->findByPk($id);
            $this->render('lancamento',array(
                'id'=>$id,
                'model' => $model,
            ));
        }

}
