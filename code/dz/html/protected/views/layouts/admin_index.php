<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>表单页</title>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>frame.css">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>index.css">
	<!--<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>-->
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>frame.js"></script>-->
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>index.js"></script>
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
				<a class="navbar-brand" href="<?php echo "http://yingcool.me/"?>">DZ产品管理后台</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo "http://yingcool.me/"?>">首页</a>
					</li>
<!-- 					<li class="dropdown"> -->
<!-- 						<a href="#about" class="dropdown-toggle" data-toggle="dropdown">选择产品类别<b class="caret"></b></a> -->
<!-- 						<ul class="dropdown-menu"> -->
<!-- 							<li><a href="#">摄影</a></li> -->
<!-- 							<li><a href="#">录音</a></li> -->
<!-- 							<li><a href="#">美术</a></li> -->
<!-- 							<li><a href="#">道具</a></li> -->
<!-- 							<li role="presentation" class="divider"></li> -->
<!-- 							<li><a href="#">添加大类</a></li> -->
<!-- 						</ul> -->
<!-- 					</li> -->
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
	<?php
            echo $content;
    ?>
</body>

</html>