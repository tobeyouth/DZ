<!-- 主体内容 -->
<div class="wrap clearfix">
	<!-- 左侧列表 -->
	<div class="col-md-2">
		<div class="product-list">
			<div class="title">
				<h3>产品分类</h3>
				<em class="pointer"></em>
			</div>
			<div class="bd">
			<?php
				$i = 1;
				foreach ($big_class_arr as $big_id => $big_class) {
			?>
				<div class="list-item list-item-<?=$i?>">
					<div class="tag-item">
						<p class="name"><a href="javascript:void(0)"><?=$big_class['name']?></a>
						</p>
						<div class="recommend-key">
						<?php
							$j = 0;
							foreach ($pro_class_id_arr[$big_id] as $pro_class_id) {
								if (3 == $j) {
									break;
								}
						?>
							<a href="<?=$pro_class_list[$pro_class_id]['url']?>"><?=$pro_class_list[$pro_class_id]['name']?></a>
						<?php
								++$j;
							}
						?>
						</div>
					</div>
					<div class="list-layer">
					<?php
						foreach ($parent_class_arr[$big_id] as $class_id) {
					?>
						<dl class="type-list">
							<dt>
								<a href="<?=$parent_class_list[$class_id]['url']?>"><?=$parent_class_list[$class_id]['name']?></a>
							</dt>
							<dd>
							<?php
								foreach ($pro_class_list as $value) {
									if ($value['parent_id'] == $class_id) {
							?>
								<a href="<?=$value['url']?>" class="product"><?=$value['name']?></a>
							<?php
									}
								}
							?>
							</dd>
						</dl>
					<?php
						}
					?>
					</div>
				</div>
			<?php
					++$i;
				}
			?>
			</div>
			
		</div>
	</div>
	<!-- 主体内容 -->
	<div class="col-md-7">
		<!-- 轮播 -->
		<div id="carousel-generic" class="carousel slide tab-slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-generic" data-slide-to="0" class="active">
				</li>
				<li data-target="#carousel-generic" data-slide-to="1">
				</li>
				<li data-target="#carousel-generic" data-slide-to="2">
				</li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img height="340" class="img-responsive"  src="../images/default/index/slide/1.jpg" alt="">
					<div class="carousel-caption">
						<p>说明文字</p>
					</div>
				</div>
				<div class="item">
					<img height="340" class="img-responsive"  src="../images/default/index/slide/2.jpg" alt="">
					<div class="carousel-caption">
						<p>说明文字</p>
					</div>
				</div>
				<div class="item">
					<img height="340" class="img-responsive"  src="../images/default/index/slide/3.jpg" alt="">
					<div class="carousel-caption">
						<p>说明文字</p>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-generic" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-generic" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>
	<!-- 右侧列表 -->
	<div class="col-md-3">
		<!-- 公告 -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">
					<span class="glyphicon">&#xf0104;</span>
					<span>公告栏</span>
				</h3>
			</div>
			<ul class="panel-body  publish-list">
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
				<li><a href="">公告</a></li>
			</ul>
	  </div>
	</div>
</div>
<!-- 试用和新闻 -->
<div class="wrap clearfix">
	<!-- 产品试用 -->
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<span class="glyphicon">&#x343e;</span>
				<span>产品试用</span>
			</div>
			<ul class="panel-body probation-list">
				<li>
					<a href="">
						<img width="240" height="180" src="../images/default/index/test/1.jpg" alt="">
						<div class="intro">
							<p class="title">参与试用</p>
							<p>截止至2014.05.02</p>
						</div>
					</a>
				</li>
				<li>
					<a href="">
						<img width="240" height="180" src="../images/default/index/test/2.jpg" alt="">
						<div class="intro">
							<p class="title">参与试用</p>
							<p>截止至2014.05.02</p>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 行业新闻 -->
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<span class="glyphicon">&#x3433;</span>
				<span>行业新闻</span>
			</div>
			<ul class="panel-body news-list">
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">行业新闻</a></li>
			</ul>
		</div>
	</div>
</div>

<?php
	foreach ($big_class_arr as $big_id => $big_class) {
?>
<div class="wrap clearfix">
	<!-- 左侧列表 -->
	<div class="panel product-content">
		<div class="panel-heading">
			<span class="glyphicon"><?=$big_class['icon']?></span><span><?=$big_class['name']?></span>
		</div>
		<div class="panel-body">
			<div class="type-list">
			<?php
				foreach ($parent_class_arr[$big_id] as $parent_class_id) {
			?>
				<a href="<?=$parent_class_list[$parent_class_id]['url']?>"><?=$parent_class_list[$parent_class_id]['name']?></a>
			<?php
				}
			?>
			</div>
		</div>
	</div>
	<!-- 广告位 -->
	<div class="panel product-side">
		<div class="panel-heading">
			<a href="" class="more-link">更多摄像产品</a>
		</div>
		<div class="panel-body">
			<ol class="top-list">
				<li class="hot">
					<em>1</em>
					<a href="">产品热度榜</a>
				</li>
				<li class="hot">
					<em>2</em>
					<a href="">产品热度榜</a>
				</li>
				<li class="hot">
					<em>3</em>
					<a href="">产品热度榜</a>
				</li>
				<li>
					<em>4</em>
					<a href="">产品热度榜</a>
				</li>
				<li>
					<em>5</em>
					<a href="">产品热度榜</a>
				</li>
			</ol>
			<div class="ad-box">
				<a href=""><img src="../images/default/index/camera-logo/1.jpg" alt="" width="200" height="40" /></a>
				<a href=""><img src="../images/default/index/camera-logo/2.jpg" alt="" width="200" height="40" /></a>
			</div>
		</div>
	</div>
	<!-- 图片推荐 -->
	<div class="panel product-recommend">
		<div class="panel-heading">
			<ul class="recommend-list clearfix">
			<?php
				foreach ($pro_class_id_arr[$big_id] as $key=>$pro_class_id) {
			?>
				<li>
					<a href="#<?=$big_class['id_name']?>-<?=$key?>" data-toggle="tab"><?=$pro_class_list[$pro_class_id]['name']?></a>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
		<div class="panel-body">
		<?php
			foreach ($pro_class_id_arr[$big_id] as $key=>$pro_class_id) {
		?>
			<div class="recommend-content<? if (!$key) {?> active<? }?>" id="<?=$big_class['id_name']?>-<?=$key?>">
			<?php
				if ($total_pro_arr[$pro_class_id]) {
					foreach ($total_pro_arr[$pro_class_id] as $k => $v) {
						if (!$k) {
			?>
				<ul class="small-list clearfix">
			<?php
						}
						if ($k<6) {
			?>
					<li>
						<a href="<?=$v['url']?>" title="<?=$v['name']?>">
							<img width="100" height="100" src="<?=$v['src']?>" alt="<?=$v['name']?>" />
						</a>
						<p class="intro">
							<a href="<?=$v['url']?>" title="<?=$v['name']?>"><?=$v['name']?></a>
						</p>
					</li>
			<?php
						}
						if (6 == $k) {
			?>
				</ul>
				<ul class="large-list clearfix">
			<?php
						}
						if ($k>=6) {
			?>
					<li>
						<a href="<?=$v['url']?>" title="<?=$v['name']?>">
							<img width="100" height="100" src="<?=$v['src']?>" alt="<?=$v['name']?>" />
						</a>
						<p class="intro">
							<a href="">产品介绍产品介绍，链接到产品页面，链接到产品页面</a>
						</p>
					</li>
			<?php
						}
					}
			?>
				</ul>
			<?php
				}
			?>
			</div>
		<?php
			}
		?>
		</div>
	</div>
</div>
<?php
	}
?>