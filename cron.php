<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';

require_once(dirname(__FILE__) . '/protected/extensions/yii-environment/Environment.php');

$env = new Environment();
$mode = $env->determineMode();
        
        
switch ($mode) {
    case "DEVELOPMENT":
        $username = 'root';
        $password = 'root';
        $db_connect = 'mysql:host=127.0.0.1;port=3306;dbname=test';
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
        $username = 'root';
        $password = 'root';
        $db_connect = 'mysql:host=127.0.0.1;port=3306;dbname=test';
        break;
        
}

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['db_connect'] = $db_connect;

$config=dirname(__FILE__).'/protected/config/cron.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

Yii::createConsoleApplication($config)->run();
    
Cronjob::model()->runCron();