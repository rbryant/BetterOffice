<?php
/**
 * All tests
 *
 * @package	extensions.browsehistory
 * @subpackage	test
 */

/**
 * additionnal functions and constants
 */
include_once __DIR__ . '/../../../globals.php';

// change the following paths if necessary
$yiit = YII_PATH . '/yiit.php';
$config = __DIR__ . '/../../../config/test.php';

require_once($yiit);

Yii::createWebApplication($config);
