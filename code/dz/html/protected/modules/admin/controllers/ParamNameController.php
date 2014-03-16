<?php

/*
 * @todo 参数名
 * @author songliang
 * @since 2014-03-09
 */

class ParamNameController extends Controller
{
    public $layout='//layouts/admin';
    public function actionTest()
    {
         $model = new ParamName;
         $name_arr = array(
//             array('产品信息',5,0,''),
//             array('视频输入',5,0,''),
//             array('视频输出',5,0,''),
//             array('屏幕尺寸',5,1,'英寸'),
//             array('像素',5,1,''),
//             array('点距',5,1,'mm'),
//             array('显示比例',5,1,''),
//             array('亮度',5,1,'cd/㎡'),
//             array('对比度',5,1,''),
//             array('反应速度',5,1,'ms'),
//             array('可视视角',5,1,''),
//             array('电源电压',5,1,'v'),
//             array('功率消耗',5,1,'w'),
//             array('外观尺寸',5,1,'mm'),
//             array('重量',5,1,'v'),
//             array('复合视频',5,2,''),
//             array('分量（Y/Pb/Pr）',5,3,''),
//             array('HD/SD-SDI',5,3,''),
//             array('HDMI',5,3,''),
//             array('音频监听',5,3,''),
//             array('音频输入',5,3,''),
//             array('SDI 嵌入音频',5,3,''),
//             array('VF总线输入',5,2,''),
//             array('TALLY显示',5,3,''),
         );
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
    }
}

?>
