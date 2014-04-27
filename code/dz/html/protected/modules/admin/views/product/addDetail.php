<?php
    echo $this->renderPartial('_addDetail_form',array(
                'proModel'=>$proModel,
                'paramValModel'=>$paramValModel,
                'paramArr'=>$paramArr,
    		'classify_arr'=>$classify_arr,
    		'parentArr'=>$parentArr,
        
));