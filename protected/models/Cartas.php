<?php

/**
 * This is the model class for table "cartas".
 *
 * The followings are the available columns in table 'cartas':
 * @property integer $idcartas
 * @property string $nome
 * @property string $descricao
 * @property string $image
 * @property string $genero
 */
class Cartas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cartas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'length', 'max'=>255),
			array('image', 'length', 'max'=>100),
			array('genero', 'length', 'max'=>45),
			array('descricao', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcartas, nome, descricao, image, genero', 'safe', 'on'=>'search'),
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
			'idcartas' => 'Idcartas',
			'nome' => 'Nome',
			'descricao' => 'Descricao',
			'image' => 'Image',
			'genero' => 'Genero',
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

		$criteria->compare('idcartas',$this->idcartas);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('genero',$this->genero,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cartas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
