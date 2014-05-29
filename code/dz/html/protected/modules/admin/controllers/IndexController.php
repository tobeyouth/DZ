<?php 
/**
 * @todo 后台首页
 * @author linzl
 * @since 2014年3月4日
 */
	
class IndexController extends Controller{
	
	public $layout='//layouts/admin_index';
	
	public function actionIndex()
	{
		#商品总数
    	$productCount = Product::model()->count('is_del=:is_del',array('is_del'=>0));
    	$classifyModel = new ProductClassify();
    	#类别总数
    	$classifyCount = $classifyModel->count('is_del=:is_del and parent_id=:parent_id',array('is_del'=>0,'parent_id'=>0));
    	$classifyArr = $classifyModel->findAll('is_del=:is_del and parent_id=:parent_id',array('is_del'=>0,'parent_id'=>0));
    	if(isset($_POST["ProductClassify"])){
    		$classifyModel->attributes = $_POST["ProductClassify"];
    		$classifyModel->parent_id = 0;
    		if($classifyModel->save(false)){
    			header("Content-type: text/html; charset=utf-8");
    			echo "<script>alert('添加成功');</script>";
    			$this->redirect(array("/admin/index/index"));
    		}else{
    			header("Content-type: text/html; charset=utf-8");
    			echo "<script>alert('添加失败，请重试');</script>";
    			$this->redirect(array("/admin/index/index"));
    		}
    	}
        $this->render('index',array(
        	'productCount'=>$productCount,
        	'classifyCount'=>$classifyCount,
        	'classifyArr'=>$classifyArr,
        	'classifyModel'=>$classifyModel			
        ));
	}
		

}
?>