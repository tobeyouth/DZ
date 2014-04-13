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
class ParamName extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_param_name}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, classify_id, parent_id', 'required'),
			array('is_del', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('classify_id', 'length', 'max'=>10),
			array('unit', 'length', 'max'=>20),
            array('parent_id', 'length', 'max'=>10),
			array('sort', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, classify_id, unit, parent_id, sort, is_del', 'safe', 'on'=>'search'),
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
			'classify_id' => 'Classify',
			'unit' => 'Unit',
                        'parent_id' => 'Parent',
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
		$criteria->compare('classify_id',$this->classify_id,true);
		$criteria->compare('unit',$this->unit,true);
                $criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('sort',$this->sort,true);
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
        
        public function createParamValueTable($class_id, $columns)
        {
            if (!empty($columns) && is_array($columns) ) {
                self::model()->createTable('dz_param_value_'.$class_id, $columns, 'CHARSET=utf8');
            }
            
        }
}
