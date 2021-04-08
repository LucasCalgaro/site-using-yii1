<?php

/**
 * This is the model class for table "imovel_images".
 *
 * The followings are the available columns in table 'imovel_images':
 * @property integer $id
 * @property string $titulo
 * @property string $imovel
 * @property string $local
 * @property string $finalidade
 * @property string $imagem
 * @property string $link
 * @property string $opcoes
 * @property string $status
 */
class Images extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public function getDbConnection()
	 {
		 return Yii::app()->db2;
	 }

	public function tableName()
	{
		return 'imovel_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo', 'length', 'max'=>64),
			array('imovel, imagem, link, opcoes', 'length', 'max'=>200),
			array('local', 'length', 'max'=>11),
			array('finalidade', 'length', 'max'=>20),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('imagem', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('id, titulo, imovel, local, finalidade, imagem, link, opcoes, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'imovel' => 'Imovel',
			'local' => 'Local',
			'finalidade' => 'Finalidade',
			'imagem' => 'Imagem',
			'link' => 'Link',
			'opcoes' => 'Opcoes',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('imovel',$this->imovel,true);
		$criteria->compare('local',$this->local,true);
		$criteria->compare('finalidade',$this->finalidade,true);
		$criteria->compare('imagem',$this->imagem,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('opcoes',$this->opcoes,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
