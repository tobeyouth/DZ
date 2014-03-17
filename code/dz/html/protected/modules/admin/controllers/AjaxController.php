<?php

/**
 * @todo ajax 处理在这里
 */
class AjaxController extends Controller{
    
    public function actionGetSubList(){
        if(Yii::app()->request->isAjaxRequest){
            $classify_id = (int) $_POST['ProductClassify']['id'];
            $classify_model = ProductClassify::model();
            $data = $classify_model->findAll("parent_id={$classify_id} and parent_id<>0");
            
            if(empty($data)){
                echo CHtml::tag('option',array('value'=>'0'),'请选择子类',true);
                exit;
            }
            //echo CHtml::tag('option',array('value'=>'0'),'请选择子类',true);
            foreach ($data as $k=>$v){
                echo CHtml::tag('option',array('value'=>"$v->id"), CHtml::encode($v->name),true);
            }
            
        }
    }
    public function actionGetSubSubList(){
        if(Yii::app()->request->isAjaxRequest){
            $classify_id = (int) $_POST['ProductClassify']['sub_id'];
            $classify_model = ProductClassify::model();
            $data = $classify_model->findAll("parent_id={$classify_id} and parent_id<>0");
            
            if(empty($data)){
                echo CHtml::tag('option',array('value'=>'0'),'请选择子类',true);
            }
            foreach ($data as $k=>$v){
                echo CHtml::tag('option',array('value'=>"$v->id"), CHtml::encode($v->name),true);
            }
            
        }
    }
}