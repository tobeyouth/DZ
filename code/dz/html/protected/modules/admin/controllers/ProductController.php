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
    
    public function actionJsq($id){
        $proModel = $this->loadModel($id);
        $classId = $proModel->classify_id;
        $cmd = Yii::app()->db->createCommand();
        $cmd->select("*");
        $cmd->from('dz_param_name');
        $cmd->where('classify_id=:classify_id',array(':classify_id'=>$classId));
        $paramArr = $cmd->queryAll();
        $paramValModel = new ParamValue5();
        $paramArr = $this->getMenuTree($paramArr);
        if(isset($_POST['ParamValue5'])){
            $paramValModel->attributes = $_POST['ParamValue5'];
            $paramValModel->pro_id = (int)$_POST['Product']['id'];
            if($paramValModel->save()){
                echo "success";
            }else{
                echo "error";
            }
        }
        $this->render('jsq',
                    array(
                        'proModel'=>$proModel,
                        'paramValModel'=>$paramValModel,
                        'paramArr'=>$paramArr
                        )
                );
    }
    
    /**
     * 处理数组
     * @param array $data
     * @return type
     */
    function getMenuTree(array $data)
    {
        $tree = array();
        foreach($data as &$item) {
            if($item['parent_id'] == 0) {
                $tree[ $item['id'] ] = $item; 
            } else if( isset($data[ $item['parent_id'] ]) ) {
                $tree[ $item['parent_id'] ]['child'][] = $item;
            }
        }
        return $tree;
    }
    
    
    public function loadModel($id){
        $model = Product::model()->findByPk($id);
        if('null'===$model){
            throw new CHttpException('404',' 您请求的页面不存在!');
        }
        return $model;
    }
}
