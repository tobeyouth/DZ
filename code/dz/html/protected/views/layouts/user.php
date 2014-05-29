<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>表单页</title>
	<?php  Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/css/user.css");?>
	<style>
</style>
</head>
<body>
	<div class="container" id="page">
	<!-- content -->
	<?php
            echo $content;
    ?>
    <div class="clear"></div>
    <hr/>
    <footer>
        <p class="powered"></p>
        <p class="copy"> © dz <?php echo date('Y',time())?>		</p>
    </footer>
    </div>
</body>

</html>