<!-- 右侧内容 -->
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<div class="col-xs-10 col-md-10 right-content">
	<h3>商品列表</h3>
<?php
if (! empty ( $parentArr )) {
	$links = array (
			$parentArr->name => array (
					'/admin/ProductClassify/addClass',
					'id' => $parentArr->id 
			),
			$classifyArr->name 
	);
} else {
	$links = array (
			$classifyArr->name => array (
					'/admin/ProductClassify/addClass',
					'id' => $classifyArr->id 
			) 
	);
}
$this->widget ( 'zii.widgets.CBreadcrumbs', array (
		'homeLink' => CHtml::link ( '首页', Yii::app ()->createUrl ( '/admin/index/index' ) ),
		'tagName' => 'ol',
		'encodeLabel' => true,
		'htmlOptions' => array (
				'class' => 'breadcrumb' 
		),
		'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
		'separator' => ' / ',
		'links' => $links 
) );
?>
	<div class="clearfix">
		<div class="input-group form-inline col-xs-9 col-md-9 pull-left">
			<input type="text" class="form-control"> <span
				class="input-group-btn">
				<button class="btn btn-default" type="button">搜索</button>
			</span>
		</div>
		<?php
		echo CHtml::link ( '添加商品', Yii::app ()->createUrl ( 'admin/product/add', array (
				'classify' => $classifyArr->id 
		) ), array (
				'class' => 'btn btn-info add-btn',
				'targe' => '_blank' 
		) );
		?>
	</div>
	<div class="product-list">
		<table class="table table-striped">
			<thead>
					 <?php
						if (! empty ( $data )) {
							?>
						<tr>
					<th class="col-md-2">商品ID</th>
					<th class="col-md-7">商品名</th>
					<th class="col-md-2">价格</th>
					<th class="col-md-2">类别</th>
					<th class="col-md-1">修改</th>
					<!--							<th class="col-md-1">删除</th>-->
				</tr>
			</thead>
			<tbody>
                                       
                        <?php
							foreach ( $data as $k => $v ) :
						?>
                                            <tr>
					<td><?php echo CHtml::decode($v->id);?></td>
					<td><?php echo CHtml::decode($v->name);?></td>
					<td><?php echo CHtml::decode($v->price);?></td>

					<td><?php echo CHtml::decode($v->classify->name)?></td>
					<td>
						<!--                                                   <a href="" class="btn btn btn-primary">修改</a>-->
                                                    <?php
								echo CHtml::link ( '修改', Yii::app ()->createUrl ( '/admin/product/update', array (
										'id' => $v->id,
										'classify' => $classifyArr->id 
								) ), array (
										'class' => 'btn btn btn-primary',
										'target' => '_blank' 
								) );
								?>
                                               </td>
				<td>
<!-- 					<a href="" class="btn btn-danger">删除</a> -->
					<?php 
							echo CHtml::ajaxButton('删除', 
													Yii::app()->createUrl('admin/Product/Delete'),
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
															'confirm'=>'确定删除该商品'.$v->name.'？'
														)
												
									);
						?>
				</td>
				<td>
					<?php 
						echo CHtml::link('添加详细',
							Yii::app()->createUrl('admin/product/addDetail',
							array(
								'classify'=>$classifyArr->id,
								'id'=>$v->id
							)),
							array(
								'class' => 'btn btn btn-primary',
								'target' => '_blank'
							)
						);
					?>
				</td>

				</tr>
                                        <?php
							endforeach
							;
							?>
                                       
						
					</tbody>
		</table>
	</div>
	<!-- 	<ul class="pagination"> -->
		<?php
							$this->widget ( 'CLinkPager', array (
									'header' => '',
									'firstPageLabel' => '首页',
									'lastPageLabel' => '末页',
									'prevPageLabel' => '上一页',
									'nextPageLabel' => '下一页',
									'pages' => $pages,
									'maxButtonCount' => 13,
									'htmlOptions' => array (
											'class' => 'pagination' 
									) 
							) );
							?>
			 <?php
						} else {
							echo "<h4>暂无商品</h4>";
						}
						?>
					
		</div>