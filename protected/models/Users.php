<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $idusers
 * @property string $nome
 * @property string $email
 * @property string $facebook_id
 * @property string $cidade
 * @property string $genero
 * @property string $birthday
 * @property string $create_at
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, facebook_id', 'length', 'max'=>255),
			array('email, cidade', 'length', 'max'=>100),
			array('genero', 'length', 'max'=>45),
			array('birthday, create_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idusers, nome, email, facebook_id, cidade, genero, birthday, create_at', 'safe', 'on'=>'search'),
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
			'idusers' => 'Idusers',
			'nome' => 'Nome',
			'email' => 'Email',
			'facebook_id' => 'Facebook',
			'cidade' => 'Cidade',
			'genero' => 'Genero',
			'birthday' => 'Birthday',
			'create_at' => 'Create At',
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

		$criteria->compare('idusers',$this->idusers);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook_id',$this->facebook_id,true);
		$criteria->compare('cidade',$this->cidade,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
