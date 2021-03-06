<?php
?>
<?php echo "<?php\n"; ?>
/*
 * CdADM - Web -> Administrador de Bens e Contratos
 * ------------------------------------------------
 * 
 *   Funcao: 
 *  Criacao: <?=date('d-m-Y')?> - Seu Nome
 * Objetivo: 
 * 
 *  Histórico de Alteracoes
 *    Data   Autor      Descricao
 *
 *
 **/

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
<?php
$aPegaComPrefixo = str_replace("Tab", "", $this->modelClass);
$aPegaComPrefixo = "pega" . $aPegaComPrefixo . "PorPrefixo";
?>
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view', '<?= $aPegaComPrefixo ?>'),
                //'users'=>array('*'),
                'expression'=>'Yii::app()->user->Login->getPermissao(BaseOpcaoMenu::knKeyMenu<?php echo $this->modelClass; ?>, "iv")',  // iv -> (i)ndex (v)iew
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','createPopUp'),
                //'users'=>array('@'),
                'expression'=>'Yii::app()->user->Login->getPermissao(BaseOpcaoMenu::knKeyMenu<?php echo $this->modelClass; ?>, "uc")',  // uc -> (u)pdate (c)reate
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                //'users'=>array('admin'),
                'expression'=>'Yii::app()->user->Login->getPermissao(BaseOpcaoMenu::knKeyMenu<?php echo $this->modelClass; ?>, "ad")',  // ad -> (a)dmin (d)elete
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',
                      array(
                        'model'=>$this->loadModel($id),
                      )
                    );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new <?php echo $this->modelClass; ?>;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['<?php echo $this->modelClass; ?>']))
        {
            $model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
            if($model->save())
                //$this->redirect(array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>));
                $this->redirect(array('admin'));
        }

        $this->render('create',
                      array(
                        'model'=>$model,
                        'fExecucaoPopUp' => false,
                      )
                    );
    }

    public function actionCreatePopUp()
    {
        $model=new <?php echo $this->modelClass; ?>;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['<?php echo $this->modelClass; ?>']))
        {
            $model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
            if($model->save())
                //$this->redirect(array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>));
                $this->redirect(array('admin'));
        }

        $this->render('create',
                      array(
                        'model'=>$model,
                        'fExecucaoPopUp' => true,
                      )
                    );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['<?php echo $this->modelClass; ?>']))
        {
            $model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
            if($model->save())
                //$this->redirect(array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>));
                $this->redirect(array('admin'));
        }

        $this->render('update',
                      array(
                        'model'=>$model,
                        'fExecucaoPopUp' => false,
                      )
                    );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('<?php echo $this->modelClass; ?>');
        $this->render('index',
                      array(
                        'dataProvider'=>$dataProvider,
                      )
                    );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new <?php echo $this->modelClass; ?>('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['<?php echo $this->modelClass; ?>']))
            $model->attributes=$_GET['<?php echo $this->modelClass; ?>'];

        $this->render('admin',
                      array(
                        'model'=>$model,
                      )
                    );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return <?php echo $this->modelClass; ?> the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=<?php echo $this->modelClass; ?>::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param <?php echo $this->modelClass; ?> $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function action<?= $aPegaComPrefixo?>($term)
    {
        $request = trim($term);
        if($request != ''){
            $model = <?= $this->modelClass ?>::model()->findAll(array("condition"=>"LOWER(aDescricao) like LOWER('" . addslashes($request) . "%')", 
                                                      "group" => "aDescricao", 
                                                      "order" => 'aDescricao'));
            //$model = Produtor::model()->findAll(array("condition"=>"NOME like '$request%'", "group" => "NOME", "order" => 'NOME'));
            $data = array();
            foreach($model as $get){
                $data[] = array(
                    'id' => $get->ID,
                    'value' => $get->aDescricao,
                );
            }
            echo json_encode($data);
        }
    }
    
        
}
