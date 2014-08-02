<?php
/**
 * @todo 产品相关操作类
 * @author linzl
 * @since 2014年3月8日
 */
class ProductController extends CController{
    public $layout='//layouts/admin';
    private $_uptypes = array(
						    'image/jpg',
						    'image/jpeg',
						    'image/png',
						    'image/pjpeg',
						    'image/gif',
						    'image/bmp',
						    'image/x-png'
						);
    
    public function actionAdd(){
        $product_model = new Product;
        #ajax校验一下
        $classify = (int) Yii::app()->request->getParam('classify');
        $this->performAjaxValidation($product_model);
     	$product_classify_model = ProductClassify::model();
		$classifyArr = $product_classify_model->findByPk($classify);
		if(0!=$classifyArr->parent_id) {
			$parentArr = $product_classify_model->findByAttributes(array('id'=>$classifyArr->parent_id));
		}
		$paramValModel = new ParamValue($classify);

		$cmd = Yii::app()->db->createCommand();
		$cmd->select("*");
		$cmd->from('dz_param_name');
		$cmd->where('classify_id=:classify_id',array(':classify_id'=>$classify));
		$paramArr = $cmd->queryAll();
		if(empty($paramArr)){
			throw  new CHttpException('500','没有该分类下的详细参数，请去生成对应表单');
		}
		
		$paramOptionId = array();
		foreach ($paramArr as $val) {
			$paramOptionId[] = $val['id'];
		}
		$paramOptionIdStr = join($paramOptionId, ',');
		$cmd = Yii::app()->db->createCommand();
		$cmd->select("*");
		$cmd->from('dz_param_option_value');
		$cmd->where("param_name_id in({$paramOptionIdStr})");
		$res = $cmd->queryAll();
		//$res = $paramValModel->findAll('param_name_id in(:param_name_id)',array(':param_name_id'=>join($paramOptionId, ',')));
		$paramOptionValueArr = array();
		if ($res) {
			foreach ($res as $val) {
				$paramOptionValueArr[$val['param_name_id']][$val['id']] = $val['value'];
			}
		}
        if(isset($_POST['Product'])){
            $product_model->attributes = $_POST['Product'];
            $product_model->update_time = time();
            if(!$product_model->save()){
				echo 'no';
				die;
            }
            
            $paramValModel->pro_id = $product_model->attributes['id'];
            foreach ($_POST['ParamValue'] as $k=>$v){
            	$paramValModel->$k = $v;
            	$paramValModel->isAttributeSafe($k);
            }

            $paramValModel->isNewRecord = true;
            $saveFlag = $paramValModel->save(false);
            
            if ( $_FILES['picture']['name'] && in_array($_FILES['picture']["type"], $this->_uptypes) ) {
            	$pictureModel = new Picture;
            	$pictureModel->pro_id = $product_model->attributes['id'];
            	$pictureModel->ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION );
            	$pictureModel->add_time = time();
            	$pictureModel->isNewRecord = true;
            	$pictureModel->save(false);
            	
            	$dir = floor($pictureModel->attributes['id']/1000);
            	$dir = IMAGE_DIR.$dir;//"/server/dz/html/images/product/{$dir}/";
            	if ( !file_exists($dir) ) {
            		@mkdir($dir, 0777);
            	}
            	move_uploaded_file($_FILES['picture']['tmp_name'], $dir."{$pictureModel->attributes['id']}.{$pictureModel->attributes['ext']}");
            }
            
            if($saveFlag){
            	header("Content-type: text/html; charset=utf-8");
            	echo '<script>alert("修改成功")</script>';
            	$this->redirect(Yii::app()->createUrl('admin/product/list',array('classify'=>$classify)));
            }else{
            	header("Content-type: text/html; charset=utf-8");
            	echo '<script>alert("修改失败")</script>';
            	$this->redirect(Yii::app()->createUrl('admin/product/list',array('classify'=>$classify)));
            }
        }
        
        $this->render('add',array(
                'product_model'=>$product_model,
                'classify_model'=>$product_classify_model,
                'classify_arr'=>$classifyArr,
        		'parentArr'=>$parentArr,
        		'paramValModel'=>$paramValModel,
        		'paramArr'=>$paramArr,
        		'paramOptionValueArr'=>$paramOptionValueArr
        ));
    }
    
    
    
    public function actionUpdate($id)
    {
    	//$id = (int) Yii::app()->request->getParam('id');
    	$product_model = $this->loadModel($id);
    	$classify = (int) Yii::app()->request->getParam('classify');
        $this->performAjaxValidation($product_model);
    	$product_classify_model = ProductClassify::model();
		$classifyArr = $product_classify_model->findByPk($classify);
		if(0!=$classifyArr->parent_id) {
			$parentArr = $product_classify_model->findByAttributes(array('id'=>$classifyArr->parent_id));
		}
		
        if(isset($_POST['Product'])){
            $product_model->attributes = $_POST['Product'];
            $product_model->update_time = time();
            if($product_model->save()){
                $this->redirect(Yii::app()->createUrl('admin/product/list',array('classify'=>$classify)));
            }
        }
        $this->render('add',array(
                'product_model'=>$product_model,
                'classify_model'=>$product_classify_model,
                'classify_arr'=>$classifyArr,
        		'parentArr'=>$parentArr
        ));
    }
    
    public function actionDelete()
    {
    	if(Yii::app()->request->isAjaxRequest){
    		$id = (int)Yii::app()->request->getPost('id');
    		$model = Product::model();
    		if($model->updateByPk($id, array('is_del'=>1))){
    			echo json_encode(array('code'=>1,'msg'=>'删除成功'));
    		} else {
    			echo json_encode(array('code'=>0,'msg'=>'删除失败'));
    		}
    	}
    }
    
        public function actionList(){
            $product_model = new Product();
            $classify = (int) Yii::app()->request->getParam('classify');
            $criteria = new CDbCriteria;
            $criteria->condition = "classify_id=:classify_id and is_del=:is_del";
            $criteria->params=array('classify_id'=>$classify,'is_del'=>0);
            $criteria->order = "id desc";
            $count = $product_model->count($criteria);
            $pager = new CPagination($count);
            $pager->pageSize = 5;
            $pager->applyLimit($criteria);
            $data = $product_model->findAll($criteria);
	        $product_classify_model = ProductClassify::model();
			$classifyArr = $product_classify_model->findByPk($classify);
			if(0!=$classifyArr->parent_id) {
				$parentArr = $product_classify_model->findByAttributes(array('id'=>$classifyArr->parent_id));
			}
            $this->render('list',array(
                'data'=>$data,
            	'pages'=>$pager,
            	'classifyArr'=>$classifyArr,	
            	'parentArr'=>$parentArr			
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
    
    public function actionAddDetail($id)
    {
    	$proModel = $this->loadModel($id);
    	$classId = $proModel->classify_id;print_r($proModel);
    	$cmd = Yii::app()->db->createCommand();
    	$cmd->select("*");
    	$cmd->from('dz_param_name');
    	$cmd->where('classify_id=:classify_id',array(':classify_id'=>$classId));
    	$paramArr = $cmd->queryAll();
    	if(empty($paramArr)){
    		throw  new CHttpException('500','没有该分类下的详细参数，请去生成对应表单');
    	}
    	
    	$paramValModel = new ParamValue($classId);
    	$isExists = $paramValModel->exists('pro_id=:pro_id',array('pro_id'=>$proModel->id));
    	if($isExists){
    		$paramValueArr = $paramValModel->find('pro_id=:pro_id',array('pro_id'=>$proModel->id));
    		$paramValModel = $paramValModel->findByPk($paramValueArr->id);
    	}
    	
    	$paramOptionId = array();
    	foreach ($paramArr as $val) {
    		$paramOptionId[] = $val['id'];
    	}
    	$paramOptionIdStr = join($paramOptionId, ',');
    	$cmd = Yii::app()->db->createCommand();
    	$cmd->select("*");
    	$cmd->from('dz_param_option_value');
    	$cmd->where("param_name_id in({$paramOptionIdStr})");
    	$res = $cmd->queryAll();
    	$paramOptionValueArr = array();
    	if ($res) {
    		foreach ($res as $val) {
    			$paramOptionValueArr[$val['param_name_id']][$val['id']] = $val['value'];
    		}
    	}
    	$saveFlag = false;
    	$product_classify_model = ProductClassify::model();
    	$classifyArr = $product_classify_model->findByPk($classId);
    	if(0!=$classifyArr->parent_id) {
    		$parentArr = $product_classify_model->findByAttributes(array('id'=>$classifyArr->parent_id));
    	}
    	$cmd = Yii::app()->db->createCommand();
    	$cmd->select("id,ext");
    	$cmd->from('dz_picture');
    	$cmd->where('pro_id=:pro_id',array(':pro_id'=>$id));
    	$picure_arr = $cmd->queryAll();
    	if ($picure_arr) {
    		foreach ($picure_arr as $key=>$val) {
    			$dir = floor($val['id']/1000);
    			$picure_arr[$key]['src'] = "/images/product/{$dir}/{$val['id']}.{$val['ext']}";
    		}
    	}
    	
    	if(isset($_POST['ParamValue'])){
     		$paramValModel->pro_id = (int)$_POST['Product']['id'];
//     		$paramValueArr = $paramValModel->find('pro_id=:pro_id',array('pro_id'=>$paramValModel->pro_id));
    		foreach ($_POST['ParamValue'] as $k=>$v){
    			$paramValModel->$k = $v;
    			$paramValModel->isAttributeSafe($k);
    		}
    		$paramValModel->isNewRecord = !$isExists;
    		if(!$isExists){
    			$saveFlag = $paramValModel->save(false);
    		}else {
    			if($paramValueArr){
    				$saveFlag = $paramValModel->updateByPk($paramValueArr->id, $paramValModel->attributes);
    			}
    		}
    		
    		if ( $_FILES['picture']['name'] && in_array($_FILES['picture']["type"], $this->_uptypes) ) {
    			$pictureModel = new Picture;
    			$pictureModel->pro_id = $id;
    			$pictureModel->ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION );
    			$pictureModel->add_time = time();
    			$pictureModel->isNewRecord = true;
    			$pictureModel->save(false);
    			
    			$dir = floor($pictureModel->attributes['id']/1000);
    			$dir = "/server/dz/html/images/product/{$dir}/";
    			if ( !file_exists($dir) ) {
    				@mkdir($dir, 0777);
    			}
    			move_uploaded_file($_FILES['picture']['tmp_name'], $dir."{$pictureModel->attributes['id']}.{$pictureModel->attributes['ext']}");
    		}
    		
    		if($saveFlag){
    			header("Content-type: text/html; charset=utf-8");
    			echo '<script>alert("修改成功")</script>';
    			$this->redirect(Yii::app()->createUrl('admin/product/addDetail',array('id'=>$id)));
    		}else{
    			header("Content-type: text/html; charset=utf-8");
    			echo '<script>alert("修改失败")</script>';
    			$this->redirect(Yii::app()->createUrl('admin/product/addDetail',array('id'=>$id)));
    		}
    		
    	}
    	$this->render('addDetail',array(
    		'proModel'=>$proModel,
            'paramValModel'=>$paramValModel,
            'paramArr'=>$paramArr,
    		'classifyArr'=>$classifyArr,
    		'parentArr'=>$parentArr,
        	'paramOptionValueArr'=>$paramOptionValueArr,
    		'paramValueArr'=>$paramValueArr,
    		'picure_arr' => $picure_arr
    	));
    	
    	 
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
    	//echo $id;
        $model = Product::model()->findByPk($id);
        if('null'===$model){
            throw new CHttpException('404',' 您请求的页面不存在!');
        }
        return $model;
    }
}
