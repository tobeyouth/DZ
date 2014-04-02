<!-- 右侧内容 -->

<div class="col-xs-10 col-md-10 right-content">
<!--    <form action="" role="form">-->
<?php
    //CActiveForm
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product_jsq',
        'enableAjaxValidation' => false,
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
        <!-- 基础信息 -->
        <div class="form-block">
            <h4>基础信息</h4>
            <div class="form-group clearfix">
<!--                <label for="" class="col-sm-2 control-label">产品名称：</label>-->
            <?php
                    echo $form->labelEx($proModel,'name',array('class'=>'col-sm-2 control-label'));
            ?>
                <div class="col-sm-6">
                    <?php
                        echo $form->textField($proModel,'name',array('class'=>'form-control'));
                        echo $form->hiddenField($proModel,'id');
                    ?>
                </div>
                <div>
                    <?php
                        echo $form->error($proModel,'name');
                    ?>
                </div>
            </div>
<!--            <div class="form-group clearfix">
                <label for="" class="col-sm-2 control-label">品牌：</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="" >
                </div>
            </div>-->
            <div class="form-group clearfix">
                <?php
                    echo $form->labelEx($proModel,'price',array('class'=>'col-sm-2 control-label'));
                ?>
                <div class="input-group col-sm-6" style="padding:0px 15px;">
                    <span class="input-group-addon">$</span>
                    <?php
                        echo $form->textField($proModel,'price',array('class'=>'form-control'));
                    ?>
                </div>
                <div>
                    <?php
                        echo $form->error($proModel,'price');
                    ?>
                </div>
            </div>
            <div class="form-group clearfix">
<!--                <label for="" class="col-sm-2 control-label">颜色：</label>-->
                  <?php
                    echo $form->labelEx($proModel,'color',array('class'=>'col-sm-2 control-label'));
                ?> 
                <div class="col-sm-6">
                     <?php
                        echo $form->textField($proModel,'color',array('class'=>'form-control'));
                    ?>
                </div>
                    <div>
                    <?php
                        echo $form->error($proModel,'color');
                    ?>
                    </div>
            </div>
        </div>
        <!-- 产品信息 -->
        <?php
                    
            if(!empty($paramArr)){
                foreach($paramArr as $k=>$v){
                   if(0==$v['parent_id']){
                       echo "<div class='form-block'>";
                       echo "<h4>".CHtml::encode($v['name'])."</h4>";
                       foreach($v['child'] as $ks=>$vs){
                           echo "<div class='form-group clearfix'>";
                           echo "<label class='col-sm-2 control-label'>".$vs['name']."</label>";
                           echo "<div class='input-group col-sm-6'>";
                           if("text" == $vs['form_option']){
                                  echo $form->textField($paramValModel,"param_{$vs['id']}",array('class'=>'form-control'));
                                  echo $form->error($paramValModel,"param_{$vs['id']}");
                           }else if("checkbox"==$vs['form_option']){
                               echo $form->radioButtonList($paramValModel,"param_{$vs['id']}",array('0'=>'是','1'=>'否'),array('separator'=>'&nbsp;&nbsp;&nbsp;'));
                                echo $form->error($paramValModel,"param_{$vs['id']}");
                           }
                           echo "</div>";
                           echo "</div>";
                       }
                       echo "</div>";
                   }
                    
                    
                }
            
            }
            ?>
        <!-- 按钮 -->
        <div class="btn-box">
            <button type="submit" class="btn btn-primary btn-lg">保存</button>
            <button type="reset" class="btn btn-warning btn-lg">充填</button>
        </div>
<!--    </form>-->
<?php
    $this->endWidget();
    ?>
    
</div>