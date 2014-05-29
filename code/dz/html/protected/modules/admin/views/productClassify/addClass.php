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
					echo CHtml::submitButton('添加子类',array('class'=>'btn btn-default btn-group-lg'));
				?>
					<?php if ($form_builder_url) {?><a href="<?=$form_builder_url?>" class="btn" style="margin-left: 100px;">添加产品类</a><?php }?>
				</span>
		</div>
			 <?php 
               		$this->endWidget();
				?>
	</div>
	<?php
	$ajaxUrl = Yii::app()->createUrl('admin/ProductClassify/UpdateClassifyName');
	$this->beginWidget ( 'zii.widgets.jui.CJuiDialog', array (
			'id' => 'mydialog',
			'options' => array (
					'title' => '修改类别名称',
					'autoOpen' => false,
					'modal'=>true, 
					'buttons'=>array(
							'确定'=>'js:function(){
										var newName = $("#changeName").val();
										var id = $("#changeName").attr("cid");	
										if("" == newName){
											alert("新类别名称不能为空");
											return false;
										}		
										$.ajax({
											type:"post",
											url:"'.$ajaxUrl.'",
											dataType:"json",
											data:{name:newName,id:id},
											success:function(data){
													if(1==data.code){
														alert(data.msg);
														$("#mydialog").dialog("close");
														location.href=window.location.href;
													}else{
														alert(data.msg);
														$(this).dialog("close");
													}
											}
												
										})
									}',
							'取消'=>'js:function(){$(this).dialog("close");}',
							),
			) 
	) );
echo "<h4>请输入新的类别名称</h4>";
echo CHtml::telField('ProductClassify[name]','',array('id'=>'changeName','class'=>'form-control'));

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
					<td	class="col-md-4"><span class="glyphicon <?php echo $v->is_pro_class ? 'glyphicon-cog' : 'glyphicon-align-left'?>">
						<?php 
							echo CHtml::link($v->name,$v->is_pro_class
														?
							Yii::app()->createUrl('admin/product/list',array('classify'=>$v->id))
														:
							Yii::app()->createUrl('admin/ProductClassify/addClass',array('id'=>$v->id))
						);?>
					</td>
					<!-- 
					<td class="col-md-2"><span class="glyphicon glyphicon-cog">
						<?php 
							echo CHtml::link(CHtml::decode($v->name).'的商品',
								Yii::app()->createUrl('admin/product/list',array('classify'=>$v->id))
							);
						?>
					</span></td>
					<td class="col-md-3"><span class="glyphicon glyphicon-align-left">
						<?php 
							echo CHtml::link(CHtml::decode($v->name).'的类别',
									Yii::app()->createUrl('admin/ProductClassify/addClass',array('id'=>$v->id))
								);
						?>
					</span></td>
					 -->
					<td class="col-md-2">
						<!-- 						<button type="button" class="btn btn-warning update-name">修改名称</button> -->
					
					<?php 
					echo CHtml::link('修改名称', '#', array(
							'class'=>'btn btn-warning update-name',
							'id'=>'fuck',
							'onclick'=>"$('#mydialog').dialog('open');$('#changeName').attr('cid',$v->id);return false;",
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