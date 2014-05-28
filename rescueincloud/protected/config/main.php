<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//$host = getenv('OPENSHIFT_MYSQL_DB_HOST');// . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT');
////$host = getenv('OPENSHIFT_MYSQL_DB_HOST'). ':' . getenv('OPENSHIFT_MYSQL_DB_PORT');
//$dbname = getenv('OPENSHIFT_APP_NAME');
//$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
//$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

$host = "localhost";
$dbname = "ems";
$username = "root";
$password = "";

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Rescue in cloud',
        'defaultController' => 'init',
        'theme'=>'layoutit',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
//		
//		'gii'=>array(
//			'class'=>'system.gii.GiiModule',
//			'password'=>'0000',
//			// If removed, Gii defaults to localhost only. Edit carefully to taste.
//			'ipFilters'=>array('127.0.0.1','::1'),
//		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8',
			'emulatePrepare' => true,
			'username' => $username,
			'password' => $password,
			'charset' => 'utf8',
                        'initSQLs'=>array('SET NAMES utf8')
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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ricardocb48@gmail.com',
	),
);