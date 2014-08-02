<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>产品库</title>
	<link rel="stylesheet" href="<?=INDEX_CSS_URL?>bootstrap.css" />
	<link rel="stylesheet" href="<?=INDEX_CSS_URL?>iconfont.css">
	<link rel="stylesheet" href="<?=INDEX_CSS_URL?>product-<?=$this->css_name?>.css" />
	<script src="<?=INDEX_JS_URL?>jquery-1.11.0.min.js"></script>
	<script src="<?=INDEX_JS_URL?>bootstrap.min.js"></script>
</head>

<body>
	<!-- 首页顶部 -->
	<div class="wrap clearfix">
		<div class="col-md-9 header-search">
			<!-- logo -->
			<div class="logo-box">
				<a href="#" class="logo">
					Logo
				</a>
			</div>
			<!-- 内容 -->
			<div class="header-content">
				<div class="search-content">
					<div class="title">最详细的影视资料库</div>
					<div class="search-bar">
						<form action="<?=$this->search_url?>" method="get">
							<div class="form-inline">
								<input type="text" class="search-input" name="search" autofocus="true" autocomplete="off" x-webkit-speech x-webkit-grammar="builtin:translate" />
								<?=$this->search_hidden_input?>
								<button type="submit" class="btn btn-primary btn-lg search-btn">搜索</button>
							</div>
						</form>
					</div>
					<div class="hot-keys">
						<a href="" class="key">摄影机</a>
						<a href="" class="key">镜头</a>
						<a href="" class="key">三脚架</a>
						<a href="" class="key">录音设备</a>
						<a href="" class="key">话筒</a>
					</div>
				</div>
			</div>
		</div>
		<!-- 二维码 -->
		<div class="col-md-3">
			<div class="wexin-code content-wrap">
				<img class="" alt="Responsive image" src="https://res.wx.qq.com/mpres/htmledition/images//mp_qrcode1ac437.png">
			</div>
		</div>
	</div>
	<?php 
		echo $content;
	?>
</body>

</html>