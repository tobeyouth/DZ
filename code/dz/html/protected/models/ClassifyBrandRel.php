<?php

/**
 * This is the model class for table "{{_classify_brand_rel}}".
 *
 * The followings are the available columns in table '{{_classify_brand_rel}}':
 * @property string $id
 * @property string $product_classify_id
 * @property string $brand_id
 * @property integer $is_del
 */
class ClassifyBrandRel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_classify_brand_rel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_classify_id, brand_id', 'required'),
			array('is_del', 'numerical', 'integerOnly'=>true),
			array('product_classify_id, brand_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_classify_id, brand_id, is_del', 'safe', 'on'=>'search'),
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
			'product_classify_id' => 'Product Classify',
			'brand_id' => 'Brand',
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
		$criteria->compare('product_classify_id',$this->product_classify_id,true);
		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('is_del',$this->is_del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClassifyBrandRel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
