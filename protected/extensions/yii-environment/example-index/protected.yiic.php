<?php

// set environment
require_once(dirname(__FILE__) . '/extensions/yii-environment/Environment.php');
$env = new Environment();

// run Yii app
$config = $env->configConsole;
require_once($env->yiicPath);