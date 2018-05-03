<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
// 本文件在app/web/index.php 处引入。
// fecshop的核心模块
$modules = [];
foreach (glob(__DIR__ . '/modules/*.php') as $filename) {
    $modules = array_merge($modules, require($filename));
}
$params = require __DIR__ .'/params.php';
return [
    'modules'=>$modules,
    /* only config in front web */
    //'bootstrap' => ['store'],
    'params'    => $params,
    'bootstrap' => [
        'queue', // The component registers own console commands
    ],
    'components' => [
        'user' => [
            'identityClass' => 'fecadmin\models\AdminUser',
            'enableAutoLogin' => true,
        ],

        'errorHandler' => [
            'errorAction' => 'fecadmin/error',
        ],

        'urlManager' => [
            'rules' => [
                '' => 'fecadmin/index/index',
            ],
        ],
        'db' => [
            'class' => \yii\db\Connection::class,
        ],
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // DB connection component or its config
            'tableName' => 'queue', // Table name
            'channel' => 'default', // Queue channel key
            'mutex' => \yii\mutex\MysqlMutex::class, // Mutex that used to sync queries
        ],
    ],
];
