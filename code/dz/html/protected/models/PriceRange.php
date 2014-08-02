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
class PriceRange extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{_price_range}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('classify_id, price_range', 'required'),
            array('is_del', 'numerical', 'integerOnly'=>true),
            array('classify_id', 'length', 'max'=>10),
            array('price_range', 'length', 'max'=>20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, classify_id, price_range, is_del', 'safe', 'on'=>'search'),
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
            'classify_id' => 'Classify',
            'price_range' => 'Price',
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
        $criteria->compare('classify_id',$this->classify_id,true);
        $criteria->compare('price_range',$this->price_range,true);
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
