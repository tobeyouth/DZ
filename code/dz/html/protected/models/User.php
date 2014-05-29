<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $age
 * @property string $creator_username
 * @property integer $create_time
 * @property string $update_username
 * @property integer $update_time
 * @property integer $update_password_time
 * @property integer $status
 * @property string $real_name
 * @property string $company
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, create_time, company', 'required'),
			array('age, create_time, update_time, update_password_time, status', 'numerical', 'integerOnly'=>true),
			array('username, creator_username, update_username', 'length', 'max'=>25),
			array('password, email', 'length', 'max'=>100),
			array('real_name, company', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, age, creator_username, create_time, update_username, update_time, update_password_time, status, real_name, company', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'age' => 'Age',
			'creator_username' => 'Creator Username',
			'create_time' => 'Create Time',
			'update_username' => 'Update Username',
			'update_time' => 'Update Time',
			'update_password_time' => 'Update Password Time',
			'status' => 'Status',
			'real_name' => 'Real Name',
			'company' => 'Company',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('creator_username',$this->creator_username,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_username',$this->update_username,true);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('update_password_time',$this->update_password_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('company',$this->company,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
