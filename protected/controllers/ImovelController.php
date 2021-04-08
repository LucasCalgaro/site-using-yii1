<?php

class ImovelController extends Controller {

    public function beforeAction($action) {
        if ($this->action->Id != 'buscarapida') {
            if ($this->action->Id == 'venda') {
                Yii::app()->user->setState('finalidade', 'Venda');
            } else
            if ($this->action->Id == 'locacao') {
                Yii::app()->user->setState('finalidade', 'Locacao');
            } else {
                Yii::app()->user->setState('finalidade', null);
            }
            Yii::app()->user->setState('estado', null);
            Yii::app()->user->setState('cidade', null);
            Yii::app()->user->setState('bairro', null);
            Yii::app()->user->setState('tipo', null);
            Yii::app()->user->setState('referencia', null);
            Yii::app()->user->setState('valor_min', null);
            Yii::app()->user->setState('valor_max', null);
        }
        return true;
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'imovel', 'venda', 'locacao', 'favoritos', 'visualizar', 'imprimir', 'buscarapida', 'adicionarfavoritos', 'removerfavoritos', 'xmlzap', 'xmlcfacil', '_lista'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'portal', 'enviaportal', 'enviaportald', 'enviaportalsd', 'enviaportalret'),
                // 'users'=>array('@'),
                'users' => array(Yii::app()->user->name),
                'expression' => "Yii::app()->user->isInRole('ADMIN')", // ← EXPRESSÃO QUE VERIFICA O NÍVEL DE ACESSO DO USUÁRIO LOGADO
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                // 'users'=>array('admin'),
                'users' => array(Yii::app()->user->name),
                'expression' => "Yii::app()->user->isInRole('ADMIN')", // ← EXPRESSÃO QUE VERIFICA O NÍVEL DE ACESSO DO USUÁRIO LOGADO
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    # LISTANDO TODOS OS IMÓVEIS PARA LOCAÇÃO

    public function actionLocacao() 
    {
        
        error_log("F:" . __FILE__ . " L:" . __LINE__ . " actionLocacao: Entrando"
                . "=[" . date('d-m-Y') . "]"
                . "\n", 3, "/tmp/zacarias.log");
        
        # BUSCA IMÓVEIS
        $resultado = Imovel::model()->findAll('finalidade = "Locacao"');
        //$resultado = Imovel::model()->findAll('finalidade = "Locacao" and nSituacao = "1"');
        # SOMA TOTAL
        $total = count($resultado);

        # PAGINAÇÃO
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 12),
                // 'sort'=>array(
                //     'defaultOrder'=>'vlr_oferta ASC',
                // ),
        ));

        $models = $dataProvider->getData();

        # IMAGENS DOS IMÓVEIS
        $imagem = array();
        $this->render('listar', array(
            'model' => $models,
            'dataProvider' => $dataProvider,
            'itemCount' => $total,
            'imagens' => $imagem,
            'breadcrumbs' => array('Imóveis para Locação'),
            'titulo' => 'Imóveis para Locação'
        ));
    }

    # LISTANDO TODOS OS IMÓVEIS PARA VENDA

    public function actionVenda() {

        # BUSCA IMÓVEIS
        $resultado = Imovel::model()->findAll('finalidade = "Venda"');
        //$resultado = Imovel::model()->findAll('finalidade = "Venda" and nSituacao = "1"');
        # SOMA TOTAL
        $total = count($resultado);
        # PAGINAÇÃO
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 12),
                // 'sort'=>array(
                //     'defaultOrder'=>'vlr_oferta ASC',
                // ),
        ));
        $models = $dataProvider->getData();
        # IMAGENS DOS IMÓVEIS
        $imagem = array();
        $this->render('listar', array(
            'model' => $models,
            'dataProvider' => $dataProvider,
            'itemCount' => $total,
            'imagens' => $imagem,
            'breadcrumbs' => array('Imóveis para Venda'),
            'titulo' => 'Imóveis para Venda'
        ));
    }

    # PÁGINA BUSCAR IMÓVEL

    public function actionBuscaRapida() 
    {
        /* Tratamento do POST */
        /*
          foreach($_POST as $k => $v){
          if(empty($v)){
          unset($_POST[$k]);
          }else{
          Yii::app()->user->setState($k, $v);
          }
          }
         */
        foreach (Imovel::model()->paArrayCamposParaPesquisa as $aOpcao) {
            if (isset($_POST[$aOpcao]) && strlen(trim($_POST[$aOpcao])) > 0 && $_POST[$aOpcao] != "Aguarde ...") {
                Yii::app()->user->setState($aOpcao, $_POST[$aOpcao]);
            } 
            /*
            else {
                Yii::app()->user->setState($aOpcao, false);
                //unset($_POST[$aOpcao]);
            }
            */
        }

        # BUSCA IMÓVEIS
        $resultado = Imovel::model()->buscaRapida($_POST);

        if(count($resultado) == 1
        && isset($_POST['referencia']) ) {
            $model = $resultado[0];
            $this->redirect(array('visualizar', 'finalidade'=>$model->finalidade, 'id'=>$model->cod_bem));
            return;
        }
        
        # SOMA TOTAL
        $total = count($resultado);

        # PAGINAÇÃO
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 12),
        ));
        $models = $dataProvider->getData();

        $s = "";
        $s .= isset($_POST['finalidade']) ? $_POST['finalidade'] . ',' : false;   //[0]
        $s .= isset($_POST['estado']) ? $_POST['estado'] . ',' : false;       //[1]
        $s .= isset($_POST['bairro']) ? $_POST['bairro'] . ',' : false;       //[2]
        $s .= isset($_POST['tipo']) ? $_POST['tipo'] . ',' : false;         //[3]
        $s .= isset($_POST['referencia']) ? $_POST['referencia'] . ',' : false;   //[4]
        $s .= isset($_POST['valor_min']) ? $_POST['valor_min'] . ',' : false;    //[5]
        $s .= isset($_POST['valor_max']) ? $_POST['valor_max'] . ',' : false;    //[6]
        unset(Yii::app()->request->cookies['ckbusca']);
        $cookie = new CHttpCookie('ckbusca', $s);
        $cookie->expire = time() + 60 * 60 * 24 * 30;
        Yii::app()->request->cookies['ckbusca'] = $cookie;


        # IMAGENS DOS IMÓVEIS
        $imagem = array();

        # REGRA PARA IMAGENS
        if (!empty($total)) {

            # PERCORRE RESULTADO DAS IMAGENS
            foreach ($models as $data) {

                # SOLICITA IMAGEM NO SERVIDOR REMOTO
                $requisicao = $this->rPasta . '|' . $data->finalidade . '|' . $this->codImob . '|' . sprintf("%09d", $data->cod_bem) . '|0|2';
                $resposta = Imovel::model()->aGetArrayImgsSocket($requisicao);

                // if($resposta){
                # ALIMENTA ARRAY COM AS IMAGENS
                // foreach(Imovel::model()->aGetUrlImagensTodas($resposta, $data->cod_bem) as $k => $v ){
                //     $imagem[$k] = $v;
                // }
                // }
            }
        }

        $this->render('listar', array(
            'model' => $models,
            'dataProvider' => $dataProvider,
            'itemCount' => $total,
            'imagens' => $imagem,
            'breadcrumbs' => array('Busca Rápida'),
            'titulo' => 'Resultado da Busca'
        ));
    }

    // public function actionBuscaRapida()
    // {
    //     /* Tratamento do POST */
    //     foreach($_POST as $k => $v){
    //         if(empty($v)){
    //             unset($_POST[$k]);
    //         }else{
    //             Yii::app()->user->setState($k, $v);
    //         }
    //     }
    //     $resultado = Imovel::model()->buscaRapida($_POST);
    //     # SOMA TOTAL
    //     $total = count($resultado);
    //     # PAGINAÇÃO
    //     $dataProvider = new CArrayDataProvider($resultado, array(
    //         'pagination'=>array('pageSize'=>5),
    //     ));
    //     $criteria = Imovel::getCriterioBuscaRapida($_POST);
    //     $item_count = Imovel::model()->count($criteria);
    //     $pages = new CPagination($item_count);
    //     $pages->setPageSize(12);
    //     $pages->applyLimit($criteria);  // the trick is here!
    //     // Busca os modelos
    //     $models = Imovel::model()->findAll($criteria);
    //     $s.=$_POST['finalidade'].',';   //[0]
    //     $s.=$_POST['estado'].',';       //[1]
    //     $s.=$_POST['bairro'].',';       //[2]
    //     $s.=$_POST['tipo'].',';         //[3]
    //     $s.=$_POST['referencia'].',';   //[4]
    //     $s.=$_POST['valor_min'].',';    //[5]
    //     $s.=$_POST['valor_max'].',';    //[6]
    //     unset(Yii::app()->request->cookies['ckbusca']);
    //     $cookie = new CHttpCookie('ckbusca', $s);
    //     $cookie->expire = time()+60*60*24*30; 
    //     Yii::app()->request->cookies['ckbusca'] = $cookie;
    //     # IMAGENS DOS IMÓVEIS
    //     $imagem = array();
    //     # REGRA PARA IMAGENS
    //     if($item_count > 0){
    //         # PERCORRE RESULTADO DAS IMAGENS
    //         //foreach($models as $data){
    //         foreach($models as $data){
    //             # SOLICITA IMAGEM NO SERVIDOR REMOTO
    //             $requisicao = $this->rPasta . '|'
    //                         . $data->finalidade . '|'
    //                         . $this->codImob . '|'
    //                         . sprintf("%09d", $data->cod_bem) . '|0|2';
    //             $resposta = Imovel::model()->aGetArrayImgsSocket($requisicao);
    //             if($resposta){
    //                 # ALIMENTA ARRAY COM AS IMAGENS
    //                 foreach(Imovel::model()->aGetUrlImagensTodas($resposta, $data->cod_bem) as $k => $v ){
    //                     $imagem[$k] = $v;
    //                 }
    //             }
    //         }
    //     }
    //     // $this->render('listar', array(
    //     //     'model' => $models,
    //     //     //'dataProvider' => $dataProvider, 
    //     //     'dataProvider' => $dataProvider,
    //     //     'controleDePagina' => $pages, 
    //     //     'itemCount' => $item_count,
    //     //     'imagens' => $imagem,
    //     //     'breadcrumbs' => array('Busca Rápida'),
    //     //     'titulo' => 'Resultado da Busca'
    //     // ));
    //     $this->render('listar', array(
    //         'model' => $models,
    //         'dataProvider' => $dataProvider, 
    //         'itemCount' => $total,
    //         'imagens' => $imagem,
    //         'breadcrumbs' => array('Busca Rápida'),
    //         'titulo' => 'Busca Rápida'
    //     ));
    // }
    # VISUALIZAR IMÓVEL
    // public function actionVisualizar($finalidade, $bem, $cidade, $bairro, $id){
    public function actionVisualizar($finalidade, $id) 
    {
        
        $model = new Contato();

        if (empty($id)) {
            $this->redirect(array('/'));
        }

        ##################################################
        if (isset($_POST) && !empty($_POST)) {
            
//            error_log("F:" . __FILE__ . " L:" . __LINE__ . " " . __FUNCTION__ . ": Entrando"
//                . "=[" . date('d-m-Y') . "]"
//                . "\n", 3, "/tmp/zacarias.log");
            
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'server.scordon.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = $this->emailDisp;
            $mail->Password = $this->emailSenha;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            $html = null;

            $links = array('pagina');

            if ($_POST['Contato']['origem'] == 'recomende') {
                # HTML
                $html = '<p>Olá, <br /> ' . $_POST['Contato']["nome"] . ' recomendou um imóvel para você.</p>';
                # ALERTA
                Yii::app()->user->setFlash('success', 'Você recomendou este imóvel com sucesso.');
                # CAMPOS A SEREM IMPRESSO NO E-MAIL
                $campos = array('envParaNome', 'comentario');
                # EMAILS
                $mail->addAddress($_POST['Contato']["envParaEmail"], $_POST['Contato']["envParaNome"]);
                $mail->AddBCC($this->emailRecep, Yii::app()->params['Imobiliaria']);
                # ASSUNTO E-MAIL
                $this->emailAssunto = $_POST['Contato']["nome"] . ' recomendou um imóvel para você';
            }

            if ($_POST['Contato']['origem'] == 'agendar') {
                # HTML
                $html .= '<p>Olá, <br /> ' . $_POST['Contato']["nome"] . ' gostaria de agendar uma visita a um imóvel, abaixo as informações enviadas.</p>';
                # ALERTA
                Yii::app()->user->setFlash('success', 'Recebemos seu pedido de agendamento, logo entraremos em contato.');
                # CAMPOS A SEREM IMPRESSO
                $campos = array('nome', 'email', 'telefone', 'celular', 'data', 'horario', 'comentario');
                # EMAIL
                $mail->addAddress($this->emailRecep, Yii::app()->params['Imobiliaria']);
                # ASSUNTO
                $this->emailAssunto = $_POST['Contato']["nome"] . ' gostaria de agendar uma visita.';
            }

            if ($_POST['Contato']['origem'] == 'proposta') {
                # HTML
                $html .= '<p>Olá, <br /> ' . $_POST['Contato']["nome"] . ' fez uma proposta a um imóvel, abaixo as informações enviadas.</p>';
                # ALERTA
                Yii::app()->user->setFlash('success', 'Recebemos a sua proposta, logo entraremos em contato..');
                # CAMPOS A SEREM IMPRESSO
                $campos = array('nome', 'email', 'telefone', 'celular', 'proposta');
                # EMAIL
                $mail->addAddress($this->emailRecep, Yii::app()->params['Imobiliaria']);
                # ASSUNTO
                $this->emailAssunto = $_POST['Contato']["nome"] . ' fez uma proposta a um imóvel.';
            }

            $html .= '<ul>';

            foreach ($_POST['Contato'] as $k => $v) {
                if (in_array($k, $campos)) {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : ' . $v . '</li>';
                    }
                } else if (in_array($k, $links)) {
                    if (!empty($v)) {
                        $html .= '<li>' . $model->getAttributeLabel($k) . ' : <a href="' . $v . '" target="_blank">' . $v . '</a></li>';
                    }
                }
            }

            $html .= '</ul>';

            $mail->From = $this->emailDisp;
            $mail->FromName = Yii::app()->params['Imobiliaria'];

            $mail->isHTML(true);

            $mail->Subject = utf8_decode($this->emailAssunto);
            $mail->Body = utf8_decode($html);

            $mail->send();

            $this->refresh();
        }

        $model = Imovel::model()->find('cod_bem = "' . $id . '"');
        ##################################################
        $server = $_SERVER['SERVER_NAME'];
        $endereco = $_SERVER ['REQUEST_URI'];
        $urlf = "http://" . $server . $endereco;

        $aImg = substr($model['aImagem'], 0, -1);
        $Img = explode("|", $aImg);
        $r = end($Img);
        
        $imgf = "";
//        if (!empty($aImg)) {
//            if (strstr($r, 'r')) {
//                $imgf = "http://encontraimoveis.com.br/img/" . $r;
//            } else {
//                $imgf = "http://encontraimoveis.com.br/img/" . $Img[0];
//            }
//        }
//        else {
//            $imgf = $this->baseUrl.'/img/logotipo.png';
//        }
        // $descf = $model['aImagem'];
        $titlef = $model['tp_bem'] . ' para ' . $model['finalidade'] . ' em ' . $model['cidade'];

        unset(Yii::app()->request->cookies['urlFace']);
        $uFace = new CHttpCookie('urlFace', $urlf);
        $uFace->expire = time() + 60 * 60 * 24 * 30;
        Yii::app()->request->cookies['urlFace'] = $uFace;

        unset(Yii::app()->request->cookies['imgFace']);
        $iFace = new CHttpCookie('imgFace', '|' . $imgf . '|' . $urlf . '|' . $titlef);
        $iFace->expire = time() + 60 * 60 * 24 * 30;
        Yii::app()->request->cookies['imgFace'] = $iFace;

        ##################################################
        // Requisição Imagem
        $imagem = array();

        $requisicao = $this->rPasta . '|' . $model->finalidade . '|' . $this->codImob . '|' . sprintf("%09d", $model->cod_bem) . '|0|2';
        $resposta = Imovel::model()->aGetArrayImgsSocket($requisicao);

        foreach (Imovel::model()->aGetUrlImagensTodas($resposta, $model->cod_bem) as $k => $v) {
            $imagem[] = $v;
        }

        $this->render('imovel', array(
            'model' => $model,
            'imagem' => $imagem,
            'breadcrumbs' => array('Visualizando Imóvel')
        ));
    }

    public function actionImprimir($finalidade, $bem, $cidade, $id) {

        if (empty($id)) {
            $this->redirect(array('/'));
        }
        $model = Imovel::model()->find('cod_bem = "' . $id . '"');


        // Requisição Imagem
        $imagem = array();
        $requisicao = $this->rPasta . '|' . $model->finalidade . '|' . $this->codImob . '|' . sprintf("%09d", $model->cod_bem) . '|0|2';
        $resposta = Imovel::model()->aGetArrayImgsSocket($requisicao);
        foreach (Imovel::model()->aGetUrlImagensTodas($resposta, $model->cod_bem) as $k => $v) {
            $imagem[] = $v;
        }


        $this->render('imprime', array(
            'model' => $model,
            'imagem' => $imagem,
            'breadcrumbs' => array('Visualizando Imóvel')
        ));
    }

    public function actionFavoritos() {

        if (empty(Yii::app()->request->cookies['favoritos'])) {
            $this->render('favoritos-vazio', array('breadcrumbs' => array('Meus Favoritos')));
            exit;
        }

        # IMOVEIS
        $ids = array_filter(array_unique(explode(',', Yii::app()->request->cookies['favoritos'])));

        # BUSCA IMÓVEIS
        $resultado = Imovel::model()->Favoritos($ids);

        # SOMA TOTAL
        $total = count($resultado);

        # PAGINAÇÃO
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 12),
        ));
        $models = $dataProvider->getData();

        # IMAGENS DOS IMÓVEIS
        $imagem = array();

        # REGRA PARA IMAGENS
        if (!empty($total)) {

            # PERCORRE RESULTADO DAS IMAGENS
            foreach ($models as $data) {

                # SOLICITA IMAGEM NO SERVIDOR REMOTO
                $requisicao = $this->rPasta . '|' . $data->finalidade . '|' . $this->codImob . '|' . sprintf("%09d", $data->cod_bem) . '|0|2';
                $resposta = Imovel::model()->aGetArrayImgsSocket($requisicao);

                if ($resposta) {

                    # ALIMENTA ARRAY COM AS IMAGENS
                    foreach (Imovel::model()->aGetUrlImagensTodas($resposta, $data->cod_bem) as $k => $v) {
                        $imagem[$k] = $v;
                    }
                }
            }
        }

        $this->render('favoritos', array(
            'model' => $models,
            'dataProvider' => $dataProvider,
            'itemCount' => $total,
            'imagens' => $imagem,
            'breadcrumbs' => array('Meus Favoritos'),
            'titulo' => 'Meus Favoritos'
        ));
    }

    public function actionAdicionarFavoritos($id) {

        $aSelect = '';
        $duplicidade = 0;

        if (isset(Yii::app()->request->cookies['favoritos'])) {
            $idFav = explode(',', Yii::app()->request->cookies['favoritos']);
            if (is_array($idFav)) {
                for ($i = 0; $i < count($idFav); $i++) {
                    if ($id == $idFav[$i]) {
                        $duplicidade++;
                    }
                }
            }
        } else {
            Yii::app()->request->cookies['favoritos'] = new CHttpCookie('favoritos', Yii::app()->request->cookies['favoritos'] . ',' . $id);
        }

        if ($duplicidade == 0) {
            Yii::app()->request->cookies['favoritos'] = new CHttpCookie('favoritos', Yii::app()->request->cookies['favoritos'] . ',' . $id);
            $id = explode(',', Yii::app()->request->cookies['favoritos']);
            for ($i = 1; $i < count($id); $i++) {
                $aSelect .= ' (cod_bem = "' . $id[$i] . '") ';
                if ($i != count($id) - 1) {
                    $aSelect .= ' OR ';
                }
            }
        } else {
            $aSelect = '';
            $id = explode(',', Yii::app()->request->cookies['favoritos']);
            for ($i = 1; $i < count($id); $i++) {
                $aSelect .= ' (cod_bem = "' . $id[$i] . '") ';
                if ($i != count($id) - 1) {
                    $aSelect .= ' OR ';
                }
            }
        }

        $this->redirect(Yii::app()->createUrl('/favoritos'));
    }

    public function actionRemoverFavoritos($id) {

        $idFav = array_unique(array_filter(explode(',', Yii::app()->request->cookies['favoritos'])));
        $chave = array_search($id, $idFav);
        if (is_array($idFav)) {
            unset($idFav[$chave]);
            $aTmp = implode(',', $idFav);
            Yii::app()->request->cookies['favoritos'] = new CHttpCookie('favoritos', $aTmp);
        }

        $this->redirect(Yii::app()->createUrl('/favoritos'));
    }

    public function actionXmlCfacil() {
        // $resultado = Imovel::model()->findAll('lista >= 1');
        $resultado = Imovel::model()->findAll('');
        $total = count($resultado);
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 500),
        ));
        $models = $dataProvider->getData();

        $this->render('xmlcfacil', array(
            'model' => $models,
        ));
    }

    public function actionXmlZap() {
        $resultado = Imovel::model()->findAll('lista >= 1');
//            $resultado = Imovel::model()->findAll('');
        $total = count($resultado);
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 120),
        ));
        $models = $dataProvider->getData();

        $this->render('xmlzap', array(
            'model' => $models,
        ));
    }

    public function actionPortal() {
        // $resultado = Imovel::model()->findAll('finalidade = "Venda" AND dt_opcao = '.date(Y-m-d). ' ORDER BY vlr_oferta ASC');
        /*
          foreach($_POST as $k => $v){
          if(empty($v)){
          unset($_POST[$k]);
          }else{
          Yii::app()->user->setState($k, $v);
          }
          }
         */
        foreach (Imovel::model()->paArrayCamposParaPesquisa as $aOpcao) {
            if (isset($_POST[$aOpcao]) && strlen(trim($_POST[$aOpcao])) > 0 && $_POST[$aOpcao] != "Aguarde ...") {
                Yii::app()->user->setState($aOpcao, $_POST[$aOpcao]);
            } else {
                Yii::app()->user->setState($aOpcao, false);
                //unset($_POST[$aOpcao]);
            }
        }

        $resultado = Imovel::model()->findAll('');
        $total = count($resultado);
        $dataProvider = new CArrayDataProvider($resultado, array(
            'pagination' => array('pageSize' => 20),
            'sort' => array(
                'defaultOrder' => 'id ASC',
            ),
        ));
        $models = $dataProvider->getData();

        $resultado = Imovel::model()->buscaRapida($_POST);

        $this->render('portal', array(
            'model' => $models,
            'itemCount' => $total,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionEnviaPortal($id) {
        $command = Yii::app()->db->createCommand();
        $command->update('imovel', array('lista' => '1'), 'cod_bem = ' . $id);
        $command->execute();
        $this->redirect($_SERVER['HTTP_REFERER']);
        // Yii::app()->db
        // ->createCommand("UPDATE `imovel` SET `lista` = '1' WHERE `imovel`.`cod_bem` = ".$id)
        // ->execute();
    }

    public function actionEnviaPortalD($id) {
        $command = Yii::app()->db->createCommand();
        $command->update('imovel', array('lista' => '2'), 'cod_bem = ' . $id);
        $command->execute();
        $this->redirect($_SERVER['HTTP_REFERER']);
        // Yii::app()->db
        // ->createCommand("UPDATE `imovel` SET `lista` = '1' WHERE `imovel`.`cod_bem` = ".$id)
        // ->execute();
    }

    public function actionEnviaPortalSD($id) {
        $command = Yii::app()->db->createCommand();
        $command->update('imovel', array('lista' => '3'), 'cod_bem = ' . $id);
        $command->execute();
        $this->redirect($_SERVER['HTTP_REFERER']);
        // Yii::app()->db
        // ->createCommand("UPDATE `imovel` SET `lista` = '1' WHERE `imovel`.`cod_bem` = ".$id)
        // ->execute();
    }

    public function actionEnviaPortalRet($id) {
        $command = Yii::app()->db->createCommand();
        $command->update('imovel', array('lista' => '0'), 'cod_bem = ' . $id);
        $command->execute();
        $this->redirect($_SERVER['HTTP_REFERER']);
        // Yii::app()->db
        // ->createCommand("UPDATE `imovel` SET `lista` = '1' WHERE `imovel`.`cod_bem` = ".$id)
        // ->execute();
    }

}

?>
