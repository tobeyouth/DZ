<?php
/*
 * @todo 参数名
 * @author songliang
 * @since 2014-03-09
 */
class ParamNameController extends Controller
{
    public $layout='//layouts/else_admin';
    public function actionTest()
    {
        //$model = new ParamName;
//         foreach($name_arr as $key=>$val){
//             $model->id = 0;
//             $model->name = $val[0];
//             $model->classify_id = $val[1];
//             $model->parent_id = $val[2];
//             $model->unit = $val[3];
//             if($model->save()){
//                 echo $model->name.":success\n";
//             }else{
//                 echo $model->name.":error\n";
//             }
//             $model->isNewRecord = true;
//         }
        
//         $param_value_model = new ParamValue(5);
//         $param_value_model->pro_id = 100;
//         $param_value_model->param_8 = 3;
//         $param_value_model-> setIsNewRecord(true);
//
//         if($param_value_model->save()) {
//             echo 'ok';
//         }else {
//             echo 'fuck';
//         }
//         var_dump($param_value_model->findAll(array( 'limit'=>5)));
//         $sql = "INSERT INTO dz_param_value_5(pro_id,param_7) VALUES(111,555)";
//        $result = yii::app()->db->createCommand($sql);
//        $query = $result->query(); 
       // echo 'ok';
//        $update = $param_value_model->findByPk (array (
//                        'pro_id' => 100, 
//                        'param_8' => 3
//                ));
//        $update->param_10 = 5;
//        if ( $update->update ()) {
//            echo 'ok';
//        } else {
//            echo 'fuck';
//        }
         $sql = 'CREATE TABLE IF NOT EXISTS `dz_param_value_6` (
             `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
             `pro_id` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id`)
        ) ENGINE=InnoDB CHARSET=utf8';
        $connect = yii::app()->db->createCommand($sql);
        if ($connect->query()) {
             echo 'ok';
         }
         echo 'end';
    }
    
    /**
     * 
     */
    public function actionAdd()
    {
        $parent_id = intval($_GET['parent_id']);
        if (!$parent_id) {
        	die;
        }
        $this->render('add',array(
                'parent_id'=>$parent_id,
            ));
    }
    
    /**
     * 
     */
    public function actionAjax()
    {
        $arr = explode('@', $_POST['json']);
        $param_name_model = new ParamName;
        $product_classify_model = new ProductClassify;
        $param_option_arr = array();
        $param_value_column_arr = array();
        
        if ($arr) {
        	$param_value_column = '';
            foreach ($arr as $key=>$val) {
                if (!$key) {
                    $tem = explode('&', $val);
                    //$classify_id = $tem[1];
                    $name = explode('=', $tem[0]);
                    $classify_name = $name[1];
                    $parent_id = $tem[1];
                    
                    $product_classify_model->id = 0;
                    $product_classify_model->name = $classify_name;
                    $product_classify_model->parent_id = $parent_id;
                    $product_classify_model->is_pro_class = 1;
                    $product_classify_model->setIsNewRecord(true);
                    $product_classify_model->save(false);
                    
                    $classify_id = Yii::app()->db->getLastInsertID();//$product_classify_model->attributes['id'];
                } else {
                    $tem = explode(':', $val);
                    $type = $tem[0];
                    
                    if (!$tem[1]) {
                    	continue;
                    }
                    
                    if (strpos($tem[1],';')) {
                        $info = explode(';', $tem[1]);
                    } else {
                        $info[0] = $tem[1];
                    }
					
                    foreach ($info as $content) {
                        $content_arr = explode('&', $content);
                        foreach ($content_arr as $unit) {
                            $unit_arr = explode('=', $unit);
                            switch ($unit_arr[0]) {
                                case 'label':
                                	//$param_name_model->id = 0;
                                    $param_name_model->name = $unit_arr[1];
                                    $param_name_model->classify_id = $classify_id;
                                    $param_name_model->search_option = $type != 'text' && $type != 'textarea' ? 1 : 0;
                                    $param_name_model->form_option = $type;
                                    $param_name_model->save(false);
                                    $param_id = $param_name_model->attributes['id'];
                                    $param_value_column_arr[$param_id] = $param_id;
                                    ++$param_name_model->id;
                                    break;
                                case 'options':
                                	if ('radios' == $type || 'checkbox' == $type || 'select' == $type) {
                                		$param_option_arr[$param_id] = $unit_arr[1];
                                	}
                                    break;
                                default:
                                    break;
                            }
                            $param_name_model->isNewRecord = true;
                        }
                    }
                    unset($info);
                }
            }
            
            foreach ($param_option_arr as $param_id_k=>$param_val) {
	            if (strpos($param_val, ',')) {
	            	$param_val_arr = explode(',', $param_val);
	            } else {
	            	$param_val_arr[0] = $param_val;
	            }
	            
	            foreach ($param_val_arr as $p_v) {
		            /* $param_value_option_model->id = 0;
		            $param_value_option_model->value = $p_v;
		            $param_value_option_model->param_name_id = $param_id_k;
		            
		            $param_value_option_model->save();
		            $param_value_option_model->isNewRecord = true; */
		            $sql = 'INSERT INTO dz_param_option_value(value,param_name_id) VALUES("'.$p_v.'",'.$param_id_k.')';
		            $connect = yii::app()->db->createCommand($sql);
		            $connect->query();
	            }
            }
			
            foreach ($param_value_column_arr as $param_value_column_id) {
            	$param_value_column .= '`param_'.$param_value_column_id.'` varchar(255) CHARACTER SET utf8 DEFAULT NULL,';
            }
            
            $insert_sql = 'CREATE TABLE IF NOT EXISTS `dz_param_value_'.$classify_id.'` (
            		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            		`pro_id` int(10) unsigned NOT NULL,
            		'.$param_value_column.'
            		PRIMARY KEY (`id`)
            ) ENGINE=InnoDB CHARSET=utf8';
            $connect = yii::app()->db->createCommand($insert_sql);
            if ($connect->query()) {
            	echo $classify_id;
            }
        }
    }
}

?>
