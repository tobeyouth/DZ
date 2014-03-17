<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParamValue5
 *
 * @author sl
 */
class ParamValue5 extends CActiveRecord
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
			array('pro_id', 'required'),
			array('param_7', 'length', 'max'=>255),
			array('param_8', 'length', 'max'=>255),
			array('param_9', 'length', 'max'=>255),
			array('param_10', 'length', 'max'=>255),
			array('param_11', 'length', 'max'=>255),
			array('param_12', 'length', 'max'=>255),
			array('param_13', 'length', 'max'=>255),
			array('param_14', 'length', 'max'=>255),
			array('param_15', 'length', 'max'=>255),
			array('param_16', 'length', 'max'=>255),
			array('param_17', 'length', 'max'=>255),
			array('param_18', 'length', 'max'=>255),
			array('param_19', 'length', 'max'=>255),
			array('param_20', 'length', 'max'=>255),
			array('param_21', 'length', 'max'=>255),
			array('param_22', 'length', 'max'=>255),
			array('param_23', 'length', 'max'=>255),
			array('param_24', 'length', 'max'=>255),
			array('param_25', 'length', 'max'=>255),
			array('param_26', 'length', 'max'=>255),
			array('param_27', 'length', 'max'=>255),
			array('param_28', 'length', 'max'=>255),
			array('param_29', 'length', 'max'=>255),
			array('param_30', 'length', 'max'=>255),
			array('param_31', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pro_id, param_7, param_8, param_9, param_10, param_11, param_12, param_13, param_14, param_15, param_16, param_17, param_18, param_19, param_20, param_21, param_22, param_23, param_24, param_25, param_26, param_27, param_28, param_29, param_30, param_31', 'safe', 'on'=>'search'),
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
}

?>
