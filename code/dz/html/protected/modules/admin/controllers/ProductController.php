<?php
/**
 * @todo 产品相关操作类
 * @author linzl
 * @since 2014年3月8日
 */
class ProductController extends CController{
    public $layout='//layouts/admin';
    
    public function actionAdd(){
        $product_model = new Product;
        #ajax校验一下
        $this->performAjaxValidation($product_model);
        $product_classify_model = ProductClassify::model();
        $classify_arr = $product_classify_model->getClassifyNames();
        if(isset($_POST['Product'])){
            $product_model->attributes = $_POST['Product'];
            $product_model->classify_id = $_POST['ProductClassify']['sub_sub_id'];
            if($product_model->save()){
                $this->redirect(Yii::app()->createUrl('admin/product/list'));
            }
        }
        $this->render('add',array(
                'product_model'=>$product_model,
                'classify_model'=>$product_classify_model,
                'classify_arr'=>$classify_arr,
        ));
    }
    
        public function actionList(){
            $product_model = new Product();
            $page = (int)  Yii::app()->request->getParam('page');
            $offset = ($page-1)*5;
            $condition = array(
                'select'=>'*',
                'limit'=>5,
                'offset'=>$offset
            );
            $data = $product_model->with('classify')->findAll($condition);
            $this->render('list',array(
                'data'=>$data,
            ));
        }
    
     protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product_add') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    } 
    public function actionTest(){
        $product_model = new Product();
        
    }
    
    public function actionJsq(){
        $param_name_model = new ParamName;
        $param_name_arr = $param_name_model->findAll('classify_id=5 and is_del=0');
        print_r($param_name_arr);
        $this->render('jsq');
    }
}
