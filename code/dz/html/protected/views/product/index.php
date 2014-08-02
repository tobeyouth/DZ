<!-- content -->
<div class="wrap clearfix">
	<!-- 面包屑 -->
	<ol class="breadcrumb">
		<li><a href="javascript:void(0)"><?=$product['parent_class_name']?></a></li>
		<li><a href="<?=$product['class_url']?>"><?=$product['class_name']?></a></li>
		<li class="active"><?=$product['name']?></li>
	</ol>
	<!-- 图片和简介 -->
	<div class="main-intro">
		<div class="img-block">
			<!-- 大图 -->
			<div class="large-img">
				<img src="<?=$picture_list[0]?>" width="400" height="400" alt="<?=$product['name']?>" id="largeImage" class="img-responsive" />
			</div>
			<ul class="img-list">
			<?php
				foreach ($picture_list as $src) {
			?>
				<li class="item">
					<a href="javascript:void(0)">
						<img width="80" height="80" src="<?=$src?>" alt="<?=$product['name']?>" />
					</a>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
		<div class="intro-block">
			<h1 class="product-name"><?=$product['name']?></h1>
			<p class="intro">产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介</p>
			<dl class="params">
				<dt>品牌：</dt>
				<dd>
					<a href="<?=$product['brand_url']?>"><?=$product['brand_name']?></a>
				</dd>
			</dl>
			<dl class="params">
				<dt>售价：</dt>
				<dd>
					<a href="javascript:void(0)">￥<?=$product['price']?></a>
				</dd>
			</dl>
			<dl class="params">
				<dt>类别：</dt>
				<dd>
					<a href="<?=$product['class_url']?>"><?=$product['class_name']?></a>
				</dd>
			</dl>
			<dl class="params">
				<dt>颜色：</dt>
				<dd>
					<a href="javascript:void(0)"><?=$product['color']?></a>
				</dd>
			</dl>
			<!-- <div class="btn-box">
				<a href="#" class="btn btn-info btn-lg">申请试用</a>
			</div> -->
		</div>
	</div>
	<div class="mt30">
		<!-- 各种列表 -->
		<div class="col-md-2 row">
			<!-- 所属分类 -->
			<div class="panel tag-panel">
				<div class="panel-heading">
					<h3 class="panel-title">所属分类</h3>
				</div>
				<div class="panel-body">
					<a href="javascript:void(0)" class="tag"><?=$product['parent_class_name']?></a>
					<a href="<?=$product['class_url']?>" class="tag"><?=$product['class_name']?></a>
				</div>
			</div>
			<!-- 同类其他品牌 -->
			<div class="panel tag-panel">
				<div class="panel-heading">
					<h3 class="panel-title">同类其他品牌</h3>
				</div>
				<div class="panel-body">
				<?php
					foreach ($show_brand as $value) {
				?>
					<a href="<?=$value['url']?>" class="tag"><?=$value['name']?></a>
				<?php
					}
				?>
				</div>
			</div>
		</div>
		<!-- 主要内容区域 -->
		<div class="col-md-10">
			<!-- 详细简介 -->
			<div class="detail-intro detail-text">
				<div class="hd">产品简介</div>
				<div class="bd">
					产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介产品简介
				</div>
			</div>
			<!-- 表格 -->
			<div class="detail-intro param-table">
				<div class="hd">参数列表</div>
				<div class="bd">
					<table class="table table-bordered table-hover">
						<tbody>
							<!-- <tr>
								<th width="">产品名：</th>
								<td>产品的名字</td>
							</tr>
							<tr>
								<th width="">品牌：</th>
								<td>产品的品牌</td>
							</tr>
							<tr>
								<th width="">市面售价：</th>
								<td>3000，00</td>
							</tr> -->
						<?php
							foreach ($param_name_arr as $value) {
								$key = "param_{$value['id']}";
						?>
							<tr>
								<th width=""><?=$value['name']?>：</th>
								<td><?=$param_value_arr[$key]?></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- 视频 -->
			<!-- <div class="detail-intro vedio-content">
				<div class="hd">产品视频</div>
				<div class="bd">
					<embed src="http://player.youku.com/player.php/Type/Folder/Fid/22144860/Ob/1/sid/XNjk3NzE2MTg0/v.swf" quality="high" width="940" height="720" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
				</div>
			</div> -->
		</div>
	</div>
	
</div>