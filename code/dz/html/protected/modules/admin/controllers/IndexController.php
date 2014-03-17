<?php 
/**
 * @todo 后台首页
 * @author linzl
 * @since 2014年3月4日
 */
	
class IndexController extends Controller{
	
	public $layout='//layouts/admin';
	
	public function actionIndex(){
            $model = new Brand;
            //$arr = array('name'=>'张三');
           //$model->attributes = $arr;
            $model->name="瑞鸽";
           if($model->save()){
               echo "success";
           }else{
               echo "error";
           }
		$this->render('list',array('fu'=>'9999'));
	}
	
	public function actionList(){
		$this->render('list');
	}
	
	public function actionAdd(){
		$product_model = Product::model();
		$this->render('form',array('model'=>$product_model));
	}
	
	public function actionJsq(){
		$this->render('jsq');
	}
        
        public function actionTest(){
            //$model = new ProductClassify;
            $model = new ParamName;
            
//            $class_arr = array('camera'=>'摄影机','ydsj'=>'移动升降','dingguang'=>'灯光','syjpj'=>'摄影机配件');
//            foreach ($class_arr as $k=>$v){
//                $model->id=0;
//                $model->name = $v;
//                $model->eg_name = $k;
//                if($model->save()){
//                    echo "success","<br>";
//                }else{
//                    echo "error","<br>";
//                }
//                $model->isNewRecord = true;
//            }
            $model->name="屏幕尺寸";
            $model->classify_id = 5;
            $model->unit="英寸";
            if($model->save()){
                echo "success";
            }else{
                echo "error";
            }
        }

}
?>