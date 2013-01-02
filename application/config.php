<?php
Config::$data = array(
	'routes' => array(
		array('default', '(/<controller>(/<action>(/<id>)))', array(
				'controller' => 'home',
				'action' => 'index'
			)
		)
	),
	'modules'=>array('database','orm'),
	'database' => array(
		'default' => array(
			'user'=>'root',
			'password' => '',
			'driver' => 'mysql',
			
			//'Connection' is required if you use the PDO driver
			'connection'=>'mysql:host=localhost;dbname=phpixie',
			
			// 'db' and 'host' are required if you use Mysql driver
			'db' => 'webcomics',
			'host'=>'localhost'
		)
	)
);