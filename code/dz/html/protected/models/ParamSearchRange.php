<?php

/**
 * This is the model class for table "{{_param_search_range}}".
 *
 * The followings are the available columns in table '{{_param_search_range}}':
 * @property string $id
 * @property string $name
 * @property string $param_name_id
 * @property string $command
 * @property string $value
 * @property integer $sort
 * @property integer $is_del
 */
class ParamSearchRange extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_param_search_range}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, param_name_id, command, value', 'required'),
			array('sort, is_del', 'numerical', 'integerOnly'=>true),
			array('name, value', 'length', 'max'=>255),
			array('param_name_id', 'length', 'max'=>10),
			array('command', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, param_name_id, command, value, sort, is_del', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'param_name_id' => 'Param Name',
			'command' => 'Command',
			'value' => 'Value',
			'sort' => 'Sort',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('param_name_id',$this->param_name_id,true);
		$criteria->compare('command',$this->command,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('is_del',$this->is_del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParamSearchRange the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
