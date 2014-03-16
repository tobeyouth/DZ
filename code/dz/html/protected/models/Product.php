<?php

/**
 * This is the model class for table "{{_product}}".
 *
 * The followings are the available columns in table '{{_product}}':
 * @property string $id
 * @property string $name
 * @property string $eg_name
 * @property string $classify_id
 * @property string $brand_id
 * @property string $price
 * @property string $update_time
 * @property integer $is_del
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('name','required','message'=>'产品名称不能为空'),
                        array('price','required','message'=>'产品价格不能为空'),
                        array('price','match','not'=>false,'pattern' => '/^[1-9][0-9]{0,9}$/','message'=>'价格为整数，且最多为10位且不能为0'),
//			array('name, eg_name, classify_id, brand_id, price, update_time', 'required'),
//			array('is_del', 'numerical', 'integerOnly'=>true),
//			array('name', 'length', 'max'=>255),
//			array('eg_name', 'length', 'max'=>100),
//			array('classify_id, brand_id, price, update_time', 'length', 'max'=>10),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
			array('eg_name, color,classify_id, brand_id, update_time, is_del', 'safe'),
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
                    'classify'=>array(self::BELONGS_TO,'ProductClassify','classify_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '产品名称',
			'eg_name' => 'Eg Name',
			'classify_id' => 'Classify',
			'brand_id' => 'Brand',
			'price' => '价格',
			'update_time' => 'Update Time',
			'is_del' => 'Is Del',
                        'color'=>'产品颜色'
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
		$criteria->compare('eg_name',$this->eg_name,true);
		$criteria->compare('classify_id',$this->classify_id,true);
		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('is_del',$this->is_del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
