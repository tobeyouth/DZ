<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'theme'=>'bootstrap',	
	'name'=>'My Web Application',
	'language'=>'zh_cn',
	// preloading 'log' component
//	'preload'=>array('log'),
	'defaultController'=>'admin/index',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.srbac.models.*',
		'application.modules.srbac.controllers.SBaseController',
		'ext.bootstrap-theme.widgets.*',
		'ext.bootstrap-theme.helpers.*',
		'ext.bootstrap-theme.behaviors.*',
				
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
				'generatorPaths'=>array(
						'bootstrap.gii',
				),
				
			'password'=>'dz@yingcool',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('119.57.166.6'),
		),
			'admin',
			'index',
			'srbac' => array(
				'userclass'=>'User', //可选,默认是 User
				'userid'=>'id', //可选,默认是 userid
				'username'=>'username', //可选，默认是 username
				'delimeter'=>'  ',//模块中添加operation时，插入Srbac之后的字段
				'debug'=>true, //可选,默认是 false，只有当debug为false时，模块才能生效
				'pageSize'=>10, //可选，默认是 15
				'superUser' =>'Admin', //可选，建议将此名称改为超级管理员名称，有利于角色的统一
				'css'=>'srbac.css', //可选，默认是 srbac.css
				'layout'=>
				'application.views.layouts.main', //可选,默认是
				// application.views.layouts.main, 必须是一个存在的路径别名
				'notAuthorizedView'=>'srbac.views.authitem.unauthorized', // 可选,默认是	unauthorized.php
				//srbac.views.authitem.unauthorized, 必须是一个存在的路径别名
				'alwaysAllowed'=>array(    //可选,默认是 gui
						'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
						'SiteError', 'SiteContact'),
				'userActions'=>array(//可选,默认是空数组
						'Show','View','List'),
				'listBoxNumberOfLines' => 15, //可选,默认是10
				'imagesPath' => 'srbac.images', //可选,默认是 srbac.images
				'imagesPack'=>'noia', //可选,默认是 noia
				'iconText'=>true, //可选,默认是 false
				'header'=>'srbac.views.authitem.header', //可选,默认是
				// srbac.views.authitem.header, 必须是一个存在的路径别名
				'footer'=>'srbac.views.authitem.footer', //可选,默认是
				// srbac.views.authitem.footer, 必须是一个存在的路径别名
				'showHeader'=>true, //可选,默认是false
				'showFooter'=>true, //可选,默认是false
				'alwaysAllowedPath'=>'srbac.components', //可选,默认是 srbac.components
				
				// 必须是一个存在的路径别名
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap'
		),
			
			
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'autoUpdateFlash'=>FALSE,	
		),
			
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=server.yingcool.me;dbname=dz',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'tablePrefix'=>'dz'
		),
		
		'authManager'=>array(
				'class'=>'application.modules.srbac.components.SDbAuthManager',
				'defaultRoles'=>array('guest'),//默认角色
				'itemTable' => 'dz_authItem',//认证项表名称（可修改）
				'itemChildTable' => 'dz_authItemChild',//认证项父子关系（可修改）
				'assignmentTable' => 'dz_authAssignment',//认证项赋权关系（可修改）
		),
		
		
		
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	)
	
	
);