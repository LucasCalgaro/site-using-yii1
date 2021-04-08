<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $titulo
 * @property string $link
 * @property string $imagem
 * @property boolean $status
 * @property string $descricao
 */
class Banner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo', 'length', 'max'=>60),
			array('link', 'length', 'max'=>120),
			array('imagem', 'length', 'max'=>255, 'on'=>'insert,update'),
			array('status, descricao', 'safe'),
			array('imagem', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update', 'maxSize' => 1024 * 1024 *2, 'tooLarge' => 'Imagem deve ter menos de 2MB'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, link, imagem, status, descricao', 'safe', 'on'=>'search'),
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
			'link' => 'Link',
			'imagem' => 'Imagem',
			'status' => 'Publicado ?',
			'descricao' => 'Descricao',
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
		$criteria->compare('link',$this->link,true);
		$criteria->compare('imagem',$this->imagem,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db2;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function aGetBanner(){
	    $criteria = new CDbCriteria();
	    $criteria->condition = 'status = 1';
	    $criteria->order = 'id ASC';
	    return self::findAll($criteria);
	}
}
