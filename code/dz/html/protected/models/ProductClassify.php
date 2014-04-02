<?php

/**
 * This is the model class for table "{{_product_classify}}".
 *
 * The followings are the available columns in table '{{_product_classify}}':
 * @property string $id
 * @property string $name
 * @property string $eg_name
 * @property string $parent_id
 * @property string $sort
 * @property integer $is_del
 */
class ProductClassify extends CActiveRecord
{
        public $sub_id, $sub_sub_id, $nav=array();
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_product_classify}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, eg_name', 'required'),
			array('is_del', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('eg_name', 'length', 'max'=>80),
			array('parent_id', 'length', 'max'=>10),
			array('sort', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, eg_name, parent_id, sort, is_del', 'safe', 'on'=>'search'),
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
			'eg_name' => 'Eg Name',
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
		$criteria->compare('eg_name',$this->eg_name,true);
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
	 * @return ProductClassify the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * @todo 获取产品大类
         */
        
        public function getClassifyNames(){
             $data = $this->findAll("parent_id=0 and is_del=0");
             $returnArr = array();
             if(empty($data)) return $returnArr;
             foreach($data as $k=>$v){
                 $returnArr[$v->id] = $v->name;
                 //$returnArr[$k]['id'] = $v->id;
                 //$returnArr[$k]['eg_name'] = $v->eg_name;
             }
             return $returnArr;  
        }
        
        /**
         * 
         */
        public function getNav($parent_id)
        {
            $condition['select'] = 'id,name,parent_id';
            if ($parent_id) {
                $condition['condition'] = 'id='.$parent_id;
            }
            $tem_res = $this->find($condition);
            $tem_nav['id'] = $tem_res->id;
            $tem_nav['name'] = $tem_res->name;
            $tem_nav['parent_id'] = $tem_res->parent_id;
            $tem_nav['url'] = Yii::app()->createUrl('admin/productClassify/index', array('parent_id'=>$tem_res->id));
            $this->nav[] = $tem_nav;
            if ($tem_nav['parent_id']) {
                $nav = $this->getNav($tem_nav['parent_id']);
            } else {
                $nav = $this->nav;
                $this->nav = array();
                unset($nav[0]['url']);
                $nav = array_reverse($nav);
            }
            return $nav;
        }
}
