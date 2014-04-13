<h2><?php echo 'Dialog';?></h2>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	'options'=>array(
				'title'=>'Dialog',
				'width'=>500,
				'height'=>300,
				'autoOpen'=>false,
				),
			));
echo 'dialog content here';
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php echo CHtml::link('Dialog', '#',
array('onclick'=>'$("#mydialog").dialog("open"); return false;')); ?>

<br />

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mymodal',
	'options'=>array(
				'title'=>'Modal Dialog',
				'width'=>400,
				'height'=>200,
				'autoOpen'=>false,
				'resizable'=>false,
				'modal'=>true,
				'overlay'=>array(
					'backgroundColor'=>'#000',
					'opacity'=>'0.5'
					),
				'buttons'=>array(
					'OK'=>'js:function(){alert("OK");}',
					'Cancel'=>'js:function(){$(this).dialog("close");}',
					),
				),
			));
echo 'Modal dialog content here ';
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php echo CHtml::link('Modal Dialog', '#',
array('onclick'=>'$("#mymodal").dialog("open"); return false;')); ?>
