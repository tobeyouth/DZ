<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>表单页</title>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>frame.css">
	<!--<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>jquery-2.1.0.js"></script>-->
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>frame.js"></script>
</head>

<body>
	<!-- header -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">DZ产品管理后台</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">首页</a>
					</li>
					<li class="dropdown">
						<a href="#about" class="dropdown-toggle" data-toggle="dropdown">选择产品类别<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">摄影</a></li>
							<li><a href="#">录音</a></li>
							<li><a href="#">美术</a></li>
							<li><a href="#">道具</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户名 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">退出登录</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- content -->
	<div class="container-fluid row  frame-wrap">
		<!-- 左侧列表 -->
		<div class="col-xs-2 col-md-2 side-bar">
			<ul class="nav list-unstyled class-list">
				<li class="class-item slide">
					<a href="#" class="class-name">摄影</a>
					<ul class="list-unstyled type-list">
						<li class="type-item">
							<a href="#" class="type-name">摄影机</a>
						</li>
						<li class="type-item">
							<a href="" class="type-name">镜头</a>
						</li>
						<li class="type-item slide">
							<a href="#" class="type-name">云台/脚架</a>
							<ul class="list-unstyled sub-list">
								<li class="sub-item">
									<a href="#" class="sub-name">云台</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">脚架</a>
								</li>
							</ul>
						</li>
						<li class="type-item slide">
							<a href="#" class="type-name">摄影机配件</a>
							<ul class="list-unstyled sub-list">
								<li class="sub-item">
									<a href="#" class="sub-name">导演取景器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">电池</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">监视器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">无线/手动跟焦</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">滤色片</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">附件</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="class-item slide">
					<a href="#" class="class-name">移动升降</a>
					<ul class="list-unstyled type-list">
						<li class="type-item">
							<a href="#" class="type-name">摇臂</a>
						</li>
						<li class="type-item">
							<a href="#" class="type-name">轨道车</a>
						</li>
						<li class="type-item">
							<a href="#" class="type-name">遥控头</a>
						</li>
						<li class="type-item">
							<a href="#" class="type-name">稳定器</a>
						</li>
					</ul>
				</li>
				<li class="class-item slide">
					<a href="#" class="class-name">灯光</a>
					<ul class="list-unstyled type-list">
						<li class="type-item">
							<a href="#" class="type-name">灯</a>
						</li>
						<li class="type-item">
							<a href="#" class="type-name">灯腿</a>
						</li>
						<li class="type-item">
							<a href="#" class="type-name">调光器</a>
							<ul class="list-unstyled sub-list">
								<li class="sub-item">
									<a href="#" class="sub-name">镇流器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">火光发生器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">电子调压器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">自耦调压器</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">调光硅箱</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">调光台</a>
								</li>
							</ul>
						</li>
						<li class="type-item slide">
							<a href="#" class="type-name">附件</a>
							<ul class="list-unstyled sub-list">
								<li class="sub-item">
									<a href="#" class="sub-name">色纸</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">框架</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">蝶布</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">发电机</a>
								</li>
								<li class="sub-item">
									<a href="#" class="sub-name">电线</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<?php 
			echo $content;
		?>
	</div>
</body>

</html>