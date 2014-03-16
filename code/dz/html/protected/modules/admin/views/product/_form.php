<div class="col-xs-10 col-md-10 right-content">
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
        </div>
        <!-- 产品信息 -->
        <div class="form-block">
            <h4>产品类别</h4>
            <div class="form-group clearfix">
                <label for="" class="col-sm-2 control-label">产品大类：</label>
                <div class="col-sm-6">
                    <?php
                    
                        array_unshift($classify_arr, '请选择产品大类');
                        echo $form->dropDownList($classify_model,'id',$classify_arr,array(
                            'class'=>'form-control',
                             'ajax'=>array(
                                 'type'=>'post',
                                   'url'=>  Yii::app()->createUrl('admin/ajax/getsublist'),
                                    'update'=>'#ProductClassify_sub_id'
                                 
                             ),
                             )
                                );
                    ?>
                        
                </div>
            </div>
            <div class="form-group clearfix">
                <label for="" class="col-sm-2 control-label">产品子类</label>
                <div class="col-sm-6">
                    <?php
                        echo $form->dropDownList(
                                        $classify_model,
                                        'sub_id',
                                        array('请选择子分类'),
                                        array(
                                            'class'=>'form-control',
                                            'ajax'=>array(
                                                   'type'=>'post',
                                                    'url'=> Yii::app()->createUrl('admin/ajax/getSubSubList'),
                                                    'update'=>'#ProductClassify_sub_sub_id'
                                            )
                                        )
                                    );
                    
                    ?>
                </div>
            </div>
            <div class="form-group clearfix">
                <label for="" class="col-sm-2 control-label">产品子子类</label>
                <div class="col-sm-6">
                    <?php
                        echo $form->dropDownList(
                                    $classify_model,
                                    'sub_sub_id',
                                    array('请选择子子类'),
                                    array(
                                        'class'=>'form-control'
                                    )
                                   );
                    ?>
                </div>
            </div>
        </div>

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