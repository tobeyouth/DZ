<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParamValue
 *
 * @author sl
 */
class ParamValue extends CActiveRecord
{
    public $class_id;

    function __construct($class_id)
    {
        $this->class_id = $class_id;
    }
    /**
     * 用构造方法传入的类别id组成成参数名表名
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'dz_param_value_'.$this->class_id;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array();
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
		return array();
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

//		$criteria->compare('id',$this->id,true);
//		$criteria->compare('name',$this->name,true);
//		$criteria->compare('classify_id',$this->classify_id,true);
//		$criteria->compare('unit',$this->unit,true);
//                $criteria->compare('parent_id',$this->parent_id,true);
//		$criteria->compare('sort',$this->sort,true);
//		$criteria->compare('is_del',$this->is_del);

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
