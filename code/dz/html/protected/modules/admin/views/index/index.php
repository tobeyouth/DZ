<!-- content -->
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<div class="container-fluid class-wrap">
    <!-- 右侧内容 -->
    <div class="bs-example">
        <div class="jumbotron">
            <h1>因为你的努力：</h1>
            <p>现在我们的平台中，已经有<span><?php echo $classifyCount;?></span>大类</p>
            <p><span><?php echo $productCount;?></span>件产品信息</p>
        </div>
    </div>
    <!-- 添加大类 -->
    <ul class="class-list">
    	<?php if(!empty($classifyArr)){
    		
    			foreach ($classifyArr as $k=>$v){
    				echo "<li>";
    				echo "<a target='_blank' href='".Yii::app()->createUrl("admin/ProductClassify/addClass",array("id"=>$v->id))."'>";
    				echo CHtml::encode($v->name);
    				echo "<span class='badge'>";
    				echo $k;
    				echo "</span>";
    				echo "</a>";
    				echo "</li>";
    			}
    		
    	}else{
    		echo "<li>暂无大类</li>";
    	}?>
        <li class="add-btn">
            <a href="" id="add-btn">
                <span class="glyphicon glyphicon-plus"></span>
                添加大类
            </a>
            <div class="class-add">
            <?php 
            	 $form = $this->beginWidget('CActiveForm', array(
				        'id' => 'product_add',
				        'enableAjaxValidation' => false,
				        'enableClientValidation' => false,
				        'clientOptions' => array(
				            'validateOnSubmit' => false,
				        ),
				        'htmlOptions' => array(
				            'enctype' => 'multipart/form-data'
				        ),
				            )
				    );
             ?>
<!--                 <form action=""> -->
                    <h4>请填写大类名称</h4>
                    <div class="input-group input-group-lg btn-group-lg">
<!--                         <input type="text" class="form-control"> -->
                    <?php 
                    	echo $form->textField($classifyModel,'name',array('class'=>"form-control"));
                    ?>
                        <span class="input-group-btn">
<!--                             <button class="btn btn-default btn-group-lg" type="button"> -->
                        <?php echo CHtml::submitButton('添加',array('class'=>"btn btn-default btn-group-lg"));?>
                                添加
                                <em class="glyphicon glyphicon-cloud"></em>
                            </button>
                        </span>
                    </div>
<!--                 </form> -->
               <?php 
               		$this->endWidget();
               ?>     
            </div>
        </li>
    </ul>
    <!-- 添加子类 -->

    <!-- 添加产品类别 -->
</div>