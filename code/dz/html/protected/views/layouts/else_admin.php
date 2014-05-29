<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>添加产品类</title>

	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>frame.css">
        <script type="text/javascript" src="<?php echo ADMIN_JS_URL?>jquery-2.1.0.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>form-builder.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>frame.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>builder.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<style>
		body {
	        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	        padding-bottom: 10px;
	        background-color: #fff;
	      }
	     .form-horizontal .form-group {
	     	margin: 0px;
	     }
	     .form-horizontal .component {
	     	margin-top: 20px;
	     }
	     textarea {
	     	width:100%;
	     }
	      #components{
	        min-height: 600px;
	      }
	      #target{
	        min-height: 200px;
	        border: 1px solid #ccc;
	        padding: 5px;
	      }
	      #target .component{
	        border: 1px solid #fff;
	      }
	      #temp{
	        width: 500px;
	        background: white;
	        border: 1px dotted #ccc;
	        border-radius: 10px;
	      }

	      .popover-content form {
	        margin: 0 auto;
	        width: 213px;
	      }
	      .popover-content form .btn{
	        margin-right: 10px
	      }
	      #source{
	        min-height: 500px;
	      }
	      .btn-box {
	      	padding: 30px;
	      	text-align: center;
	      }
	</style>
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
							<li><a href="#">摄影</a>
							</li>
							<li><a href="#">录音</a>
							</li>
							<li><a href="#">美术</a>
							</li>
							<li><a href="#">道具</a>
							</li>
							<li role="presentation" class="divider"></li>
							<li><a href="#">添加大类</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户名 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">退出登录</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php 
            echo $content;
        ?>
</body>

</html>