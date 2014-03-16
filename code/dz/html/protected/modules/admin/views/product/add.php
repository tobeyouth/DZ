<?php
/**
 * @todo 利用局部视图，实现一个表单多个模型
 * http://www.fengbloger.net/feng/505.html
 * 
 */

echo $this->renderPartial('_form',array(
                'product_model'=>$product_model,
                'classify_model'=>$classify_model,
                'classify_arr'=>$classify_arr
        
));