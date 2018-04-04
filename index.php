<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';

require_once(dirname(__FILE__) . '/protected/extensions/yii-environment/Environment.php');

$env = new Environment();
$mode = $env->determineMode();
        
        
switch ($mode) {
    case "DEVELOPMENT":
        $username = 'betteroffice';
        $password = 'betteroffice';
        $db_connect = 'mysql:host=localhost;dbname=better-office';
        break;
    case "PRODUCTION":
        $services_json = json_decode(getenv("VCAP_SERVICES"),true);
        $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
        $username = $mysql_config["username"];
        $password = $mysql_config["password"];
        $hostname = $mysql_config["hostname"];
        $port = $mysql_config["port"];
        $db = $mysql_config["name"];
        $link = mysql_connect("$hostname:$port", $username, $password);
        $db_selected = mysql_select_db($db, $link);
        $db_connect = 'mysql:host=' . $hostname .';dbname=' . $db;
        break;
    default:
        $username = 'betteroffice';
        $password = 'betteroffice';
        $db_connect = 'mysql:host=localhost;dbname=better-office';
        break;
        
}

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['db_connect'] = $db_connect;

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

Yii::createWebApplication($config)->run();

