<?php
/**
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
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
 **
 * Estes é o Model da Tabela: "<?php echo $tableName; ?>".
 *
 * A seguir, os campos que compoem a Tabela '<?php echo $tableName; ?>':
<?php 
$fTemSituacao   = false;
$fTemFilial     = false;
$fTemTipoPessoa = false;
$fTemEstadoCivil= false;
$fTemCidade     = false;
foreach($columns as $column): ?>
 *   @property <?php echo $column->type.' $'.$column->name; echo $column->type==='string' ? "[". $column->size . "]" : false; echo $column->isPrimaryKey ? ' PK': false; echo "\n"; ?>
<?php 
    if($column->name == 'nIdFilial')
        $fTemFilial = true;
    else
    if($column->name == 'nStatus')
        $fTemSituacao = true;
    else
    if(strstr($column->name, 'TipoPes') )
        $fTemTipoPessoa = true;
    else
    if(strstr($column->name, 'EstadoCiv') )
        $fTemEstadoCivil = true;
    else
    if(strstr($column->name, 'nIdTabCidade') )
        $fTemCidade = true;
endforeach; ?>
<?php if(!empty($relations)): ?>
 *
 * The followings are the available model relations:
<?php foreach($relations as $name=>$relation): ?>
 * @property <?php
	if (preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
    {
        $relationType = $matches[1];
        $relationModel = $matches[2];

        switch($relationType){
            case 'HAS_ONE':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'BELONGS_TO':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'HAS_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            case 'MANY_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            default:
                echo 'mixed $'.$name."\n";
        }
	}
    ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?php echo $modelClass; ?> extends <?php echo "BaseActiveRecord\n"; ?>
{
<?php if($fTemEstadoCivil):?>
    const knEstCivSolteiro      =   1;
    const knEstCivCasado        =   2;
    const knEstCivViuvo         =   3;
    const knEstCivDivorciado    =   4;
    const knEstCivDesquitado    =   5;
    const knEstCivAmaziado      =   6;
    
<?php endif?>
<?php if($fTemTipoPessoa):?>
    const knTipPesFisica        =   1;
    const knTipPesJuridica      =   2;
    const knTipPesOutros        =   3;

<?php endif?>
<?php if($fTemEstadoCivil):?>
    public $aEstadoCivil = array(
        0                           => 'Estado Civil',
        self::knEstCivSolteiro      => 'Soleiro(a)',
        self::knEstCivCasado        => 'Casado(a)',
        self::knEstCivViuvo         => 'Viúvo(a)',
        self::knEstCivDesquitado    => 'Desquitado(a)',
        self::knEstCivAmaziado      => 'Amaziado(a)',
    );
    
<?php endif?>
<?php if($fTemTipoPessoa):?>
    public $aTipoPessoa = array(
        self::knTipPesFisica        => 'Física',
        self::knTipPesJuridica      => 'Jurídica',
        self::knTipPesOutros        => 'Outros',
    );

<?php endif?>

<?php if($fTemFilial):?>
    public function init()
    {
        $this->nIdFilial = Yii::app()->user->Filial->ID;
    }
    
<?php endif?>
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return <?php echo $modelClass; ?> the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
<?php if($connectionId!='db'):?>

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection()
    {
        return Yii::app()-><?php echo $connectionId ?>;
    }
<?php endif?>

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '<?php echo $tableName; ?>';
    }

<?php
    if(strstr($tableName, "Base") ) {?>
    public function getDbConnection()
    {
        //$aTmp = Yii::app();
        return Yii::app()->dbBASE;
    }
    <?php
    }?>
    
    public function getIdBancoDeDados()
    {
        return BaseBancoDeDados::kIdBd<?php echo $modelClass; ?>;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
<?php foreach($rules as $rule): ?>
            <?php echo $rule.",\n"; ?>
<?php endforeach; ?>
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
<?php foreach($relations as $name=>$relation): ?>
                <?php echo "'$name' => $relation,\n"; ?>
<?php endforeach; ?>
<?php if($modelClass!='TabFilial' && $fTemFilial) {?>
            'getTabFilial'      => array(self::BELONGS_TO,  'TabFilial',        array('nIdTabFilial'=>'ID') ),
<?php
}?>
<?php if($fTemCidade) {?>
            'getCidade'         => array(self::BELONGS_TO,  'BaseTabCidade',    array('nIdTabCidade'=>'ID') ),
<?php
}?>
<?php if($fTemSituacao) {?>
            'getLoginIncluiu'   => array(self::BELONGS_TO,  'BaseLogin',        array('nIdLoginIncluiu'=>'ID') ),
            'getLoginAlterou'   => array(self::BELONGS_TO,  'BaseLogin',        array('nIdLoginAlterou'=>'ID') ),
            'getLoginExcluiu'   => array(self::BELONGS_TO,  'BaseLogin',        array('nIdLoginExcluiu'=>'ID') ),
<?php }?>
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
<?php foreach($labels as $name=>$label): ?>
            <?php if($name == 'nStatus')
                    echo "'$name' => 'Status',\n"; 
                  else 
                  if($name == 'nIdLoginIncluiu')
                    echo "'$name' => 'Login Incluiu',\n"; 
                  else 
                  if($name == 'dDataIncluiu')
                    echo "'$name' => 'Data Inclusão',\n"; 
                  else 
                  if($name == 'nIdLoginAlterou')
                    echo "'$name' => 'Login Alterou',\n"; 
                  else 
                  if($name == 'dDataAlterou')
                    echo "'$name' => 'Data Alteração',\n"; 
                  else 
                  if($name == 'nIdLoginExcluiu')
                    echo "'$name' => 'Login Excluiu',\n"; 
                  else 
                  if($name == 'dDataExcluiu')
                    echo "'$name' => 'Data Exclusão',\n"; 
                  else {
                    // limpa label
                    $label = str_replace(" Tab ", " ", $label);
                    $label = str_replace("Id ", " ", $label);
                    $label = str_replace("Codigo", "Código", $label);
                    $label = str_replace("Municipio", "Município", $label);
                    $label = str_replace("Proprietario", "Proprietário", $label);
                    $label = str_replace("Locatario", "Locatário", $label);
                    $label = str_replace("Endereco", "Endereço", $label);
                    $label = str_replace("Uf", "UF", $label);
                    $label = str_replace("Cgc", "CGC", $label);
                    $label = str_replace("Cnpj", "CNPJ", $label);
                    $label = str_replace("Cep", "CEP", $label);
                    $label = str_replace("Cic", "CIC", $label);
                    $label = str_replace("Agencia", "Agência", $label);
                    $label = str_replace("Rg", "RG", $label);
                    $label = str_replace("cao", "ção", $label);
                    $label = str_replace("sao", "são", $label);
                    $label = str_replace("coes", "ções", $label);
                    $label = str_replace("Mae", "Mãe", $label);
                    $label = str_replace("Fone", "Telefone", $label);
                    $label = str_replace("Email", "e-Mail", $label);
                    $label = str_replace("Digito", "Dígito", $label);
                    $label = str_replace("Area", "Área", $label);
                    $label = str_replace("Saida", "Saída", $label);
                    if(substr($label, 0, 2) == 'A '
                    || substr($label, 0, 2) == 'N ' 
                    || substr($label, 0, 2) == 'D ') {
                        $label = substr($label, 2, strlen($label) );
                    }
                    $label = trim($label);
                    echo "'$name' => '$label',\n"; 
                  }
            ?>
<?php endforeach; ?>
        );
    }

    /*
    // Rotina de consistiencia padrao
    public function checkFormulario($attribute,$params)
    {
        switch($attribute){
        }
        return true;
    }
    */   
    
    /**
     * Cria Criteria padrao para todos os Searchs
     *
     */
    public function getCriteria()
    {
        $criteria=new CDbCriteria;

<?php
foreach($columns as $name=>$column)
{
    if($column->type==='string') {?>
        <?php echo "\$criteria->compare('t.$name',\$this->$name,true); // $column->type $column->size "; echo $column->isPrimaryKey ? 'PK': false; echo "\n";
    }
    else {?>
        <?php echo "\$criteria->compare('t.$name',\$this->$name); // $column->type "; echo $column->isPrimaryKey ? 'PK': false; echo "\n";
    }
}
?>

        return $criteria;
    }
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
     /*
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=self::getCriteria();

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    */

<?php if($fTemSituacao) {?>
    /*
    public function searchOff()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=self::getCriteria();
        $criteria->addCondition('t.nStatus=99');

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    */
<?php }?>
    
}