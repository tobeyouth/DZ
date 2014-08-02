<!-- 主要内容 -->
<div class="wrap clearfix">
	<div class="col-md-2">
		<div class="product-list slide-list">
			<div class="title">
				<h3>产品分类</h3>
				<em class="pointer"></em>
			</div>
			<div class="bd">
			<?php
				$i = 1;
				foreach ($big_class_arr as $big_id => $big) {
			?>
				<div class="list-item list-item-<?=$i?>">
					<div class="tag-item">
						<p class="name"><a href="javascript:void(0)"><?=$big['name']?></a>
						</p>
						<div class="recommend-key">
						<?php
							foreach ($big_pro_class_arr[$big_id] as $big_pro_class) {
						?>
							<a href="<?=$big_pro_class['url']?>"><?=$big_pro_class['name']?></a>
						<?php
							}
						?>
						</div>
					</div>
					<div class="list-layer">
					<?php
						foreach ($parent_class_arr[$big_id] as $parent_class_id) {
					?>
						<dl class="type-list">
							<dt>
								<a href="<?=$parent_class_list[$parent_class_id]['url']?>"><?=$parent_class_list[$parent_class_id]['name']?></a>
							</dt>
							<dd>
							<?php
								foreach ($parent_pro_class_arr[$parent_class_id] as $parent_pro_class) {
							?>
								<a href="<?=$parent_pro_class['url']?>" class="product"><?=$parent_pro_class['name']?></a>
							<?php
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
	<div class="col-md-10">
		<!-- 关键筛选 -->
		<div class="result-keys">
			<div class="hd">
				<span class="product-name">产品名</span>的搜索结果
			</div>
			<div class="bd">
				<dl class="conditions">
					<dt>品牌：</dt>
					<dd>
					<?php
						if ($show_brand) {
							foreach ($show_brand as $value) {
					?>
						<a href="<?=$value['url']?>"<? if ($value['id'] == $show_brand_id) {?> class="selected"<? }?>><?=$value['name']?></a>
					<?php
							}
						}
					?>
						<a href="" class="more">更多</a>
					</dd>
				</dl>
				<dl class="conditions">
					<dt>价格：</dt>
					<dd>
					<?php
						if ($price_range_list) {
							foreach ($price_range_list as $value) {
					?>
						<a href="<?=$value['url']?>"<? if ($value['price_range'] == $show_price_range) {?> class="selected"<? }?>><?=$value['price_range']?></a>
					<?php
							}
						}
					?>
					</dd>
				</dl>
				<dl class="conditions">
					<dt>类别：</dt>
					<dd>
					<?php
						if ($cur_class_pro_class_arr) {
							foreach ($cur_class_pro_class_arr as $value) {
					?>
						<a href="<?=$value['url']?>"<? if ($value['id'] == $show_classify_id) {?> class="selected"<? }?>><?=$value['name']?></a>
					<?php
							}
						}
					?>
					</dd>
				</dl>
				<!-- 详细参数 -->
				<!-- <div class="hide-box">
					<dl class="conditions">
						<dt>详细参数：</dt>
						<dd>
							<a href="" class="selected">佳能</a>
							<a href="">尼康</a>
							<a href="">索尼</a>
							<a href="">海鸥</a>
							<a href="">瑞格</a>
							<a href="">其他品牌</a>
							<a href="" class="more">更多</a>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>详细参数：</dt>
						<dd>
							<a href="" class="selected">2000-3000</a>
							<a href="">3000-5000</a>
							<a href="">5000-10000</a>
							<a href="">10000-30000</a>
							<a href="">30000-50000</a>
							<a href="">50000以上</a>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>详细参数：</dt>
						<dd>
							<a href="" class="selected">民用DV</a>
							<a href="">高清摄像机</a>
							<a href="">水下摄像机</a>
							<a href="">航拍摄像机</a>
						</dd>
					</dl>
				</div>
				<div class="more-btn">
					更多
					<em class="pointer"></em>
				</div> -->
			</div>
		</div>
		<!-- 结果筛选 -->
		<div class="result-choose clearfix">
			<span class="number">为您找到了<?=$pages->itemCount?>项搜索结果</span>
			<span class="choose-title">结果筛选：</span>
			<ul class="nav nav-pills">
				<li class="active">
					<a href="#">热门</a>
				</li>
				<li>
					<a href="#">上市时间</a>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						价格 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?=$order_url['price1']?>">从低到高</a></li>
						<li><a href="<?=$order_url['price2']?>">从高到低</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- 搜索结果 -->
		<ul class="result-list full-list">
		<?php
			if ($pro_list) {
				foreach ($pro_list as $key => $value) {
		?>
			<li class="item clearfix">
				<a href="<?=$value['url']?>" title="<?=$value['name']?>" class="hd" target="_blank">
					<img width="100%" src="<?=$value['src']?>" alt="<?=$value['name']?>" />
				</a>
				<div class="info">
					<p class="title">
						<a href="<?=$value['url']?>" title="<?=$value['name']?>" target="_blank">商品名</a>
					</p>
					<div class="info-table">
						<p>
							<span class="info-title">厂商：</span>
							<a href="javascript:void(0)"><?=$value['brand_name']?></a>
						</p>
						<p>
							<span class="info-title">分类：</span>
							<a href="javascript:void(0)"><?=$value['class_name']?></a>
						</p>
						<p>
							<span class="info-title">颜色：</span>
								<a href="javascript:void(0)"><?=$value['color']?></a>
						</p>
					</div>
				</div>
				<div class="price">
					<a href="javascript:void(0)" >￥<?=$value['price']?></a>
				</div>
			</li>
		<?php
				}
			}
		?>
		</ul>
		<?php
			$this->widget ( 'CLinkPager', array (
					'header' => '',
					'firstPageLabel' => '首页',
					'lastPageLabel' => '末页',
					'prevPageLabel' => '上一页',
					'nextPageLabel' => '下一页',
					'pages' => $pages,
					'maxButtonCount' => 5,
					'htmlOptions' => array (
						//'class' => 'pagination',
						'target' => '_self',
						'enctype'=>'multipart/form-data'
					) 
			) );
		?>
	</div>
</div>