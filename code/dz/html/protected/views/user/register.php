<?php 
	Yii::app()->bootstrap->register();
?>
<?php
$this->pageTitle = Yii::app()->name . ' - Login';
?>
<div class="form " style="padding-top: 100px;">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'inlineErrors'=>false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => 'form-signin')
    )); ?>
    <h2 class="form-signin-heading">请注册</h2>
    <?php echo $form->textFieldRow($model, 'username', array('class' => 'input-block-level',
        'placeholder' => '用户名')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'input-block-level',
        'placeholder' => '密码')); ?>
    <?php //echo $form->textFieldRow($model,'verificationCode',array('class'=>'input-small'));?>
    <br>
    <?php
   // $this->widget('CCaptcha',array('showRefreshButton'=>true,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击切换验证码'),
       // 'buttonLabel'=>'点击切换验证码'));
    ?>
    <br>
    <?php echo CHtml::submitButton('登 录', array('class' => 'btn btn-large btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>