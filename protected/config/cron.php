<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
/**/

$username =  $_SESSION['username'];
$password =  $_SESSION['password'];
$db_connect =  $_SESSION['db_connect'];



return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Better-Office',
        //'theme'=>'bootstrap',
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
        // path aliases
        'aliases' => array(
            // yiistrap configuration
            //'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
            // yiiwheels configuration
            //'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.controllers.*',
		'application.components.*',
                'ext.yii-mail.YiiMailMessage', // module yii-mail is required in order to sent confirmation email to the users
		'application.modules.bum.models.*',
		'application.modules.bum.components.*',
		'application.modules.bum.widgets.*',
		'ext.browsehistory.models.Browsehistory',
		'application.modules.dashboard.DashboardModule',
		),

		'modules'=>array(
			// Basic User Management module;
			'bum' => array(
				// needs yii-mail extension..
			),	
			 'dashboard' => array(
			      'debug' => true,
			      'portlets' => array(
                                    'News' => array('class' => 'News', 'visible' => true, 'column' => 2, 'weight' => 0), 
                                    'Companies' => array('class' => 'Companies', 'visible' => true, 'column' => 0, 'weight' => 2), 
                                    'Issues' => array('class' => 'Issues', 'visible' => true, 'column' => 0, 'weight' => 3),
                                    'Meetings' => array('class' => 'Meetings', 'visible' => true, 'column' => 0, 'weight' => 4),
                                    'Opportunities' => array('class' => 'Opportunities', 'visible' => true, 'column' => 1, 'weight' => 5),
                                    'Projects' => array('class' => 'Projects', 'visible' => true, 'column' => 1, 'weight' => 6),
                                    'Tasks' => array('class' => 'Tasks', 'visible' => true, 'column' => 1, 'weight' => 7),
			      ),
			    ),
                        'auth' => array(
                            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
                            'userClass' => 'User', // the name of the user model class.
                            'userIdColumn' => 'id', // the name of the user id column.
                            'userNameColumn' => 'name', // the name of the user name column.
                            'defaultLayout' => 'application.views.layouts.main', // the layout used by the module.
                            'viewDir' => null, // the path to view files to use with this module.
                          ),
  		    
                        // uncomment the following to enable the Gii tool
                        'gii'=>array(
                                'class'=>'system.gii.GiiModule',
                                'password'=>'radadmin',
                                'generatorPaths' => array(
                                  'ext.ajaxgii',//'bootstrap.gii'
                                ),
                                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                                'ipFilters'=>array('127.0.0.1','::1'),
                        ),

                ),

                // application components
                'components'=>array(
                        // uncomment the following to enable URLs in path-format
                        'authManager'=>array(
                                'class'=>'CDbAuthManager',
                                'connectionID'=>'db',
                                'assignmentTable' => 'authassignment',
                                'itemTable' => 'authitem',
                                'itemChildTable' => 'authitemchild',
                                'behaviors' => array(
                                    'auth' => array(
                                    'class' => 'auth.components.AuthBehavior',
                                    ),
                                ),
                        ),
                        'user'=>array(
                            'class' => 'auth.components.AuthWebUser',
                            'admins' => array('admin', 'foo', 'bar'), // users with full access
                                // enable cookie-based authentication
                                //'allowAutoLogin'=>true,
                                //'class' => 'BumWebUser',
                            //'loginUrl' => array('//bum/users/login'), // required			
                        ),
                       'bootstrap' => array(
                                'class' => 'ext.bootstrap.components.Bootstrap',
                                //'bootstrapCss' => true,
                                //'responsiveCss' => true,
                                //'minify' => true,
                                //'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
                                //'responsiveCss'=>true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
                                //'yiiCss' => true,
                                //'enableJS' => true,
                                'forceCopyAssets' => true,
                                'plugins'=>array(
                                  // Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
                                  // To prevent a plugin from being loaded set it to false as demonstrated below
                                        'transition'=>false, // disable CSS transitions
                                        'tooltip'=>array(
                                                   'selector'=>'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
                                                   'options'=>array(
                                                        'placement'=>'bottom', // place the tooltips below instead
                                                  ),
                                        ),
                            ),  
                        ),
                        // yiiwheels configuration
                        'yiiwheels' => array(
                            'class' => 'yiiwheels.YiiWheels',   
                        ),

                        'urlManager'=>array(
                                'urlFormat'=>'path',
                                'caseSensitive' => false,
                                'rules'=>array(
                                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                ),
                        ),
                        // required by bum module
                        'mail' => array(
                                'class' => 'ext.yii-mail.YiiMail', //  module yii-mail is required in order to sent confirmation emails to the users
                                'transportType' => 'php',
                                'viewPath' => 'bum.views.mail',
                                'logging' => false,
                                'dryRun' => false,
                        ),		

                        'db'=>array(
                                'connectionString' => $db_connect,
                                'emulatePrepare' => true,
                                'username' => $username,
                                'password' => $password,
                                'charset' => 'utf8',
                                'schemaCachingDuration'=>3600,
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
                                                'levels'=>'debug, error, warning',
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
		'adminEmail'=>'webmaster@example.com',
	),
);