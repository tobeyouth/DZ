<?php //Yii::app()->clientScript->registerCoreScript('jquery');?>
<div class="col-xs-10 col-md-10 right-content">
	<h3>当前所在分类</h3>
	<?php
	if(!empty($parentArr)){
		$links = array(
				$parentArr->name =>array('/admin/ProductClassify/addClass','id'=>$parentArr->id),
				$model->name,
		);
	}else{
		$links = array(
				$model->name=>array('/admin/ProductClassify/addClass', 'id'=>$model->id),
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
	<!-- 添加类别 -->
	<div class="add-wrap">
		<!-- 		<form action=""> -->
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
			<!-- 这个input用于后台获取父级类别 -->
		<input type="hidden" name="parentId" value="">
		<div class="input-group input-group-lg btn-group-lg">
			<!-- 				<input type="text" class="form-control">  -->
				<?php 
					echo $form->textField($model,'name',array('class'=>'form-control','value'=>''));
				?>
				<span class="input-group-btn"> <!-- 					<button class="btn btn-default btn-group-lg" type="button"> -->
				<!-- 						添加 <em class="glyphicon glyphicon-cloud"></em> --> <!-- 					</button> -->
				<?php 
					echo CHtml::submitButton('添加',array('class'=>'btn btn-default btn-group-lg'));
				?>
				</span>
		</div>
		<!-- 			<div class="check-type"> -->
		<!-- 				<label class="radio-inline"> <input type="radio" -->
		<!-- 					name="optionsRadios" id="optionsRadios1" value="option1" checked=""> -->
		<!-- 					这是一个子类 -->
		<!-- 				</label> <label class="radio-inline"> <input type="radio" -->
		<!-- 					name="optionsRadios" id="optionsRadios2" value="option2" checked=""> -->
		<!-- 					这是一个产品 -->
		<!-- 				</label> -->
		<!-- 			</div> -->
		<!-- 		</form> -->
			 <?php 
               		$this->endWidget();
				?>
	</div>
	<?php
	$this->beginWidget ( 'zii.widgets.jui.CJuiDialog', array (
			'id' => 'mydialog',
			'options' => array (
					'title' => '修改类别名称',
					'autoOpen' => false,
					'modal'=>true, 
					'buttons'=>array(
							'确定'=>'js:function(){alert("OK");}',
							'取消'=>'js:function(){$(this).dialog("close");}',
							),
			) 
	) );
echo "请输入新的类别名称:";
echo "<br>";
echo CHtml::textField('name');

	$this->endWidget ( 'zii.widgets.jui.CJuiDialog');
						
	?>
	<!-- 当前类别下子类或者商品的列表 -->
	<div class="table-list">
		<table class="table table-hover class-tabel">
			<tbody>
			<?php 
				if(!empty($subList)){
				foreach ($subList as $k=>$v){
			?>
				<tr>
					<th class="col-md-1"><?php echo ($k+1);?></th>
					<td class="col-md-9"><?php echo CHtml::decode($v->name);?></td>
					<td class="col-md-2">
						<!-- 						<button type="button" class="btn btn-warning update-name">修改名称</button> -->
					
					<?php 
					echo CHtml::link('修改名称', '#', array(
							'class'=>'btn btn-warning update-name',
							'id'=>'fuck',
							'onclick'=>"$('#mydialog').dialog('open'); return false;",
					));
						
					?>
					
						<?php 
							echo CHtml::ajaxButton('删除', 
													Yii::app()->createUrl('admin/ProductClassify/DeleteClassify'),
													array(
															'type'=>"post",
															'dataType'=>'json',
															'data'=>array('id'=>$v->id),
															'success'=>'js:function(data){
																			alert(data.msg);
																			location.href=window.location.href;
																		}'
														),
													array(
															'class'=>'btn btn-danger delete-btn',
															'confirm'=>'确定删除该类别？(注意:该类关联的资料也会连带删除。)'
														)
												
									);
						?>
					</td>
				</tr>
			<?php 
				   }
					}else{
						echo "<tr><strong>".$model->name."</Strong>-->下暂无类别</tr>";
					}
			?>

			</tbody>
		</table>
	</div>
</div>