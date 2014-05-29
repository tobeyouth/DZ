<div class="col-xs-10 col-md-10 right-content">
<h3><strong><?php echo CHtml::decode($classify_arr->name);?></strong>-->商品基本信息添加</h3>
<?php 
	if(!empty($parentArr)){
		$links = array(
				$parentArr->name =>array('/admin/ProductClassify/addClass','id'=>$parentArr->id),
				$classify_arr->name,
		);
	}else{
		$links = array(
				$classify_arr->name=>array('/admin/ProductClassify/addClass', 'id'=>$classifyArr->id),
		);
	}
	$this->widget('zii.widgets.CBreadcrumbs', 
		array(
			'homeLink'=>CHtml::link('首页',Yii::app()->createUrl('/admin/index/index')),  	
			'tagName'=>'ol',
			'encodeLabel'=>true,			
			'htmlOptions'=>array(
				'class'=>'breadcrumb',
			),
			'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
			'separator'=>' / ',	
		    'links'=>$links,
		 ));
	?>

    <?php
    //CActiveForm
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product_add',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
            )
    );
    ?>
<!--    
        <!-- 基础信息 -->
        <div class="form-block">
            <h4>基础信息</h4>
            <div class="form-group clearfix">
            	<?php 
            		echo $form->hiddenField($product_model,'classify_id',array('value'=>$classify_arr->id));
                    echo $form->labelEx($product_model,'name',array('class'=>'col-sm-2 control-label'));
                ?>
                <div class="col-sm-6">
                    <?php
                        echo $form->textField($product_model,'name',array('class'=>'form-control'));
                    ?>
                </div>
                <div>
                    <?php
                        echo $form->error($product_model,'name');
                    ?>
                </div>
            </div>
            <div class="form-group clearfix">
                <?php
                    echo $form->labelEx($product_model,'price',array('class'=>'col-sm-2 control-label'));
                ?>
                <div class="input-group col-sm-6" style="padding:0px 15px;">
                    <span class="input-group-addon">$</span>
                    <?php
                        echo $form->textField($product_model,'price',array('class'=>'form-control'));
                    ?>
                </div>
                <div>
                    <?php
                        echo $form->error($product_model,'price');
                    ?>
                </div>
            </div>
            <div class="form-group clearfix">
                <?php
                    echo $form->labelEx($product_model,'color',array('class'=>'col-sm-2 control-label'));
                ?>
                <div class="col-sm-6">
                    <?php
                        echo $form->textField($product_model,'color',array('class'=>'form-control'));
                    ?>
                </div>
                <div>
                    <?php
                        echo $form->error($product_model,'color');
                    ?>
                </div>
            </div>
            <div class="form-group clearfix">
                  <?php
                    echo $form->labelEx($product_model,'picture',array('class'=>'col-sm-2 control-label'));
                ?> 
                <div class="col-sm-6">
                    <input type="file" name="picture" id="picture" />
                </div>
                    <div>
                    <?php
                        echo $form->error($product_model,'picture');
                    ?>
                    </div>
            </div>
        </div>
        <!-- 产品信息 -->
        <?php
		echo "<div class='form-block'>";
	    echo "<h4>产品信息</h4>";
				if(!empty($paramArr)){
					foreach ($paramArr as $k=>$v){
						echo "<div class='form-group clearfix'>";
		                           echo "<label class='col-sm-2 control-label'>".$v['name']."</label>";
		                           echo "<div class='input-group col-sm-6'>";
		                           if("text" == $v['form_option']){
		                                  echo $form->textField($paramValModel,"param_{$v['id']}",array('class'=>'form-control'));
		                                  echo $form->error($paramValModel,"param_{$v['id']}");
		                           }else if("checkbox"==$v['form_option']){
		                               echo $form->radioButtonList($paramValModel,"param_{$v['id']}",$paramOptionValueArr[$v['id']],array('separator'=>'&nbsp;&nbsp;&nbsp;'));
		                                echo $form->error($paramValModel,"param_{$v['id']}");
		                           } else if ("select"==$v['form_option']) {
										echo $form->dropDownList($paramValModel,"param_{$v['id']}", $paramOptionValueArr[$v['id']],array('class'=>'select'));
										echo $form->error($paramValModel,"param_{$v['id']}");
									} else if ("textarea"==$v['form_option']) {
										echo $form->textArea($paramValModel,"param_{$v['id']}", array('rows'=>6, 'cols'=>50));
										echo $form->error($paramValModel,"param_{$v['id']}");
									} else if ("radio"==$v['form_option']) {
										echo $form->radioButtonList($paramValModel,"param_{$v['id']}",$paramOptionValueArr[$v['id']],array('separator'=>'&nbsp;&nbsp;&nbsp;'));
										echo $form->error($paramValModel,"param_{$v['id']}");
									}
		                           echo "</div>";
		                           echo "</div>";
					}
				}
		echo "</div>";
        ?>
        
        <!-- 按钮 -->
        <div class="btn-box">
            <button type="submit" class="btn btn-primary btn-lg">保存</button>
            <button type="reset" class="btn btn-warning btn-lg">充填</button>
        </div>
    <!--</form>-->  
    <?php
    $this->endWidget();
    ?>
    
</div>