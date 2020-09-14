<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require($_SERVER['DOCUMENT_ROOT'] . '/yii/yii2/vendor/autoload.php');
require($_SERVER['DOCUMENT_ROOT'] . '/yii/yii2/vendor/yiisoft/yii2/Yii.php');

$config = require($_SERVER['DOCUMENT_ROOT'] . '/app/config/test.php');

(new yii\web\Application($config))->run();