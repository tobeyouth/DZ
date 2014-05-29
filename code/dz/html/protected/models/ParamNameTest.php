<?php

/**
 * This is the model class for table "{{_param_value_5}}".
 *
 * The followings are the available columns in table '{{_param_value_5}}':
 * @property string $id
 * @property string $pro_id
 * @property string $param_7
 * @property string $param_8
 * @property string $param_9
 * @property string $param_10
 * @property string $param_11
 * @property string $param_12
 * @property string $param_13
 * @property string $param_14
 * @property string $param_15
 * @property string $param_16
 * @property string $param_17
 * @property string $param_18
 * @property string $param_19
 * @property string $param_20
 * @property string $param_21
 * @property string $param_22
 * @property string $param_23
 * @property string $param_24
 * @property string $param_25
 * @property string $param_26
 * @property string $param_27
 * @property string $param_28
 * @property string $param_29
 * @property string $param_30
 * @property string $param_31
 */
class ParamValue5 extends CActiveRecord
{
	
	public  function __construct($classId){
		
	}
	
	
	/**
	 * @return string the associated database table name
	 */
// 	public function tableName()
// 	{
// 		return '{{_param_value_5}}';
// 	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
            
		return array(
			array('pro_id', 'required'),
			array('pro_id', 'length', 'max'=>10),
                        array('param_7, param_8, param_9, param_10, param_11, param_12, param_13, param_14, param_15, param_16, param_17, param_18, param_19, param_20, param_21, param_22, param_23, param_24, param_25, param_26, param_27, param_28, param_29, param_30, param_31', 'required','message'=>'必填项不能为空'),

			array('param_7, param_8, param_9, param_10, param_11, param_12, param_13, param_14, param_15, param_16, param_17, param_18, param_19, param_20, param_21, param_22, param_23, param_24, param_25, param_26, param_27, param_28, param_29, param_30, param_31', 'length', 'max'=>255),
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
			'pro_id' => 'Pro',
			'param_7' => 'Param 7',
			'param_8' => 'Param 8',
			'param_9' => 'Param 9',
			'param_10' => 'Param 10',
			'param_11' => 'Param 11',
			'param_12' => 'Param 12',
			'param_13' => 'Param 13',
			'param_14' => 'Param 14',
			'param_15' => 'Param 15',
			'param_16' => 'Param 16',
			'param_17' => 'Param 17',
			'param_18' => 'Param 18',
			'param_19' => 'Param 19',
			'param_20' => 'Param 20',
			'param_21' => 'Param 21',
			'param_22' => 'Param 22',
			'param_23' => 'Param 23',
			'param_24' => 'Param 24',
			'param_25' => 'Param 25',
			'param_26' => 'Param 26',
			'param_27' => 'Param 27',
			'param_28' => 'Param 28',
			'param_29' => 'Param 29',
			'param_30' => 'Param 30',
			'param_31' => 'Param 31',
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
		$criteria->compare('param_7',$this->param_7,true);
		$criteria->compare('param_8',$this->param_8,true);
		$criteria->compare('param_9',$this->param_9,true);
		$criteria->compare('param_10',$this->param_10,true);
		$criteria->compare('param_11',$this->param_11,true);
		$criteria->compare('param_12',$this->param_12,true);
		$criteria->compare('param_13',$this->param_13,true);
		$criteria->compare('param_14',$this->param_14,true);
		$criteria->compare('param_15',$this->param_15,true);
		$criteria->compare('param_16',$this->param_16,true);
		$criteria->compare('param_17',$this->param_17,true);
		$criteria->compare('param_18',$this->param_18,true);
		$criteria->compare('param_19',$this->param_19,true);
		$criteria->compare('param_20',$this->param_20,true);
		$criteria->compare('param_21',$this->param_21,true);
		$criteria->compare('param_22',$this->param_22,true);
		$criteria->compare('param_23',$this->param_23,true);
		$criteria->compare('param_24',$this->param_24,true);
		$criteria->compare('param_25',$this->param_25,true);
		$criteria->compare('param_26',$this->param_26,true);
		$criteria->compare('param_27',$this->param_27,true);
		$criteria->compare('param_28',$this->param_28,true);
		$criteria->compare('param_29',$this->param_29,true);
		$criteria->compare('param_30',$this->param_30,true);
		$criteria->compare('param_31',$this->param_31,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParamValue5 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
