<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
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
		<form action="">
			<!-- 这个input用于后台获取父级类别 -->
			<input type="hidden" name="parentId" value="">
			<div class="input-group input-group-lg btn-group-lg">
				<input type="text" class="form-control"> <span
					class="input-group-btn">
					<button class="btn btn-default btn-group-lg" type="button">
						添加 <em class="glyphicon glyphicon-cloud"></em>
					</button>
				</span>
			</div>
			<div class="check-type">
				<label class="radio-inline"> <input type="radio"
					name="optionsRadios" id="optionsRadios1" value="option1" checked="">
					这是一个子类
				</label> <label class="radio-inline"> <input type="radio"
					name="optionsRadios" id="optionsRadios2" value="option2" checked="">
					这是一个产品
				</label>
			</div>
		</form>
	</div>
	<!-- 当前类别下子类或者商品的列表 -->
	<div class="table-list">
		<table class="table table-hover class-tabel">
			<tbody>
				<tr>
					<th class="col-md-1">1</th>
					<td class="col-md-9">类别（产品）名称</td>
					<td class="col-md-2">
						<button type="button" class="btn btn-warning update-name">修改名称</button>
						<button type="button" class="btn btn-danger delete-btn">删除</button>
					</td>
				</tr>
				<tr>
					<th class="col-md-1">1</th>
					<td class="col-md-9">类别（产品）名称</td>
					<td class="col-md-2">
						<button type="button" class="btn btn-warning update-name">修改名称</button>
						<button type="button" class="btn btn-danger delete-btn">删除</button>
					</td>
				</tr>
				<tr>
					<th class="col-md-1">1</th>
					<td class="col-md-9">类别（产品）名称</td>
					<td class="col-md-2">
						<button type="button" class="btn btn-warning update-name">修改名称</button>
						<button type="button" class="btn btn-danger delete-btn">删除</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>