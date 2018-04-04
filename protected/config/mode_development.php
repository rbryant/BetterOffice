<?php

/**
 * Development configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Show all details on each error
 * - Gii module enabled
 */
$username = 'betteroffice';
$password = 'betteroffice';
$db_connect = 'mysql:host=localhost;dbname=better-office';

return array(

	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../../yii/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../../yii/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../../yii/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => true,
	'yiiTraceLevel' => 3,

	// This is the specific Web application configuration for this mode.
	// Supplied config elements will be merged into the main config array.
	'configWeb' => array(

		// Modules
		'modules' => array(
			'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password' => false,
			),
		),

		// Application components
		'components' => array(

			// Asset manager
			'assetManager' => array(
				'linkAssets' => true, // publish symbolic links for easier developing
			),

			// Database
                        'db'=>array(
                                'connectionString' => $db_connect,
                                'emulatePrepare' => true,
                                'username' => $username,
                                'password' => $password,
                                'charset' => 'utf8',
                                'schemaCachingDuration'=>3600,
                                'enableProfiling' => true,
                                'enableParamLogging' => true,
                        ),
			// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, trace, info',
					),
					// Show log messages on web pages
					array(
						'class' => 'CWebLogRoute',
						//'categories' => 'system.db.CDbCommand', //queries
						'levels' => 'error, warning, trace, info',
						//'showInFireBug' => true,
					),
				),
			),

		),

	),

	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(
	),

);