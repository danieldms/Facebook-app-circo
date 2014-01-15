<?php

/**
 * This is the model class for table "users_has_cartas".
 *
 * The followings are the available columns in table 'users_has_cartas':
 * @property integer $id_users_cartas
 * @property integer $users_idusers
 * @property integer $cartas_idcartas
 * @property string $create_at
 * @property string $post_id
 */
class UsersCartas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_has_cartas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_idusers, cartas_idcartas', 'required'),
			array('users_idusers, cartas_idcartas', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>45),
			array('create_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_users_cartas, users_idusers, cartas_idcartas, create_at, post_id', 'safe', 'on'=>'search'),
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
			'id_users_cartas' => 'Id Users Cartas',
			'users_idusers' => 'Users Idusers',
			'cartas_idcartas' => 'Cartas Idcartas',
			'create_at' => 'Create At',
			'post_id' => 'Post',
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

		$criteria->compare('id_users_cartas',$this->id_users_cartas);
		$criteria->compare('users_idusers',$this->users_idusers);
		$criteria->compare('cartas_idcartas',$this->cartas_idcartas);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('post_id',$this->post_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersCartas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
