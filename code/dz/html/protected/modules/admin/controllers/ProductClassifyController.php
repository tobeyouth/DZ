<?php
/**
 * Description of ProductClassifyController
 *
 * @author sl
 */
class ProductClassifyController extends Controller
{
    public $layout='//layouts/admin';
    public function actionIndex()
    {
        $parent_id = intval($_GET['parent_id']);
        $product_classify_model = new ProductClassify;
        $res = $product_classify_model->findAll('parent_id='.$parent_id);
        $nav = $product_classify_model->getNav($parent_id);
        $this->render('create',
                    array('res'=>$res, 'nav'=>$nav, 'parent_id'=>$parent_id)
                );
    }
    
    public function actionAdd()
    {
        switch ($_POST['optionsRadios']) {
            case 1:
                $product_classify_model = new ProductClassify;
                $product_classify_model->name = $_POST['name'];
                $product_classify_model->eg_name = 'none';
                $product_classify_model->parent_id = intval($_POST['parent_id']);
                header("Content-type: text/html; charset=utf-8"); 
                if ($product_classify_model->save()) {
                    echo '<script>alert("添加成功")</script>';
                    $this->redirect(Yii::app()->createUrl('admin/productClassify/index', array('parent_id'=>$product_classify_model->parent_id)));
                } else {
                    echo '<script>alert("添加失败");history.go(-1)</script>';
                    
                }
                break;
            case 2:
                $product_model = new Product;
                $product_model->name = $_POST['name'];
                $product_model->eg_name = 'none';
                $product_model->color = 'none';
                $product_model->classify_id = intval($_POST['parent_id']);
                $product_model->brand_id = 0;
                $product_model->price = 0;
                $product_model->update_time = time();
                header("Content-type: text/html; charset=utf-8"); 
                if ($product_model->save(false)) {
                    echo '<script>alert("添加成功")</script>';
                    $param_name_model = new ParamName;
                    $sql = 'SELECT id FROM dz_param_name WHERE classify_id='.$product_model->classify_id.' LIMIT 1';
                    $res = $param_name_model->findBySql ($sql);
                    if ($res['id']) {
                    	$this->redirect(Yii::app()->createUrl('admin/productClassify/index', array('parent_id'=>$product_model->classify_id)));
                    } else {
                    	$this->redirect(Yii::app()->createUrl('admin/paramName/add', array('classify_id'=>$product_model->classify_id)));
                    }
                } else {
                    echo '<script>alert("添加失败");history.go(-1)</script>';
                }
                break;
            default:
                echo '<script>alert("你的提交方式有问题");history.go(-1)</script>';
                break;
        }
    }
    
    public function actionAddClass($id)
    {
    	$productClassifyModel = $this->loadModel((int)$id);
    	if(0!=$productClassifyModel->parent_id) {
    		$parentArr = $productClassifyModel->findByAttributes(array('id'=>$productClassifyModel->parent_id));
    	}
    	$subList = $productClassifyModel->findAll("parent_id=:parent_id and is_del=:is_del",array('is_del'=>0,'parent_id'=>(int)$id));
    	if(isset($_POST['ProductClassify'])){
    		$productClassifyModel->setIsNewRecord(true);
    		$productClassifyModel->id=0;
    		$productClassifyModel->attributes = $_POST['ProductClassify'];
    		$productClassifyModel->parent_id = $id;
    		if($productClassifyModel->save(false)){
    			header("Content-type: text/html; charset=utf-8");
    			echo "<script>alert('添加成功');</script>";
    			$this->redirect(Yii::app()->createUrl('/admin/ProductClassify/addClass',array('id'=>$id)));
    		}else{
    			header("Content-type: text/html; charset=utf-8");
    			echo "<script>alert('添加失败，请重试');</script>";
    			$this->redirect(Yii::app()->createUrl('/admin/ProductClassify/addClass',array('id'=>$id)));
    		}
    		
    	}
    	$this->render('addClass',array(
    		'model'=>$productClassifyModel,
    		'parentArr'=>$parentArr,
    		'subList'=>$subList,		
    	));
    	
    }
    
    public function actionDeleteClassify()
    {
    	if (Yii::app()->request->isAjaxRequest) {
    		$id = (int)Yii::app()->request->getPost('id');
    		$model = ProductClassify::model();
    		$flag = $model->updateAll(array('is_del'=>1),'id=:id or parent_id=:parent_id',array('id'=>$id,'parent_id'=>$id));
    		if ($flag) {
    			echo json_encode(array('code'=>1,'msg'=>'删除成功'));
    		} else {
    			echo json_encode(array('code'=>0,'msg'=>'删除失败'));
    		}
    	} 
    }
    
    public function loadModel($id)
    {
    	$model = ProductClassify::model()->findByPk($id);
    	if (null===$model) {
    		throw new CHttpException('404',' 您请求的页面不存在!');
    	}
    	return $model;
    }
    
    public function  actionTest(){
    	$this->render('test');
    	
    }
    
}

?>
