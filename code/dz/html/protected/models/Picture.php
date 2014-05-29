<?php

/**
 * This is the model class for table "{{_param_name}}".
 *
 * The followings are the available columns in table '{{_param_name}}':
 * @property string $id
 * @property string $name
 * @property string $classify_id
 * @property string $unit
 * @property string $sort
 * @property integer $is_del
 */
class Picture extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_picture}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pro_id, ext, add_time', 'required'),
			array('is_del', 'numerical', 'integerOnly'=>true),
			array('pro_id', 'length', 'max'=>10),
			array('ext', 'length', 'max'=>8),
            array('add_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pro_id, ext, add_time, is_del', 'safe', 'on'=>'search'),
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
			'pro_id' => 'Name',
			'ext' => 'Classify',
			'add_time' => 'Unit',
			'is_del' => 'Is Del',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('pro_id',$this->pro_id,true);
		$criteria->compare('ext',$this->ext,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('is_del',$this->is_del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParamName the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
