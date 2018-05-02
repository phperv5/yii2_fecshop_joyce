<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<?php
$modules = [];
foreach (glob(__DIR__ . '/modules/*.php') as $filename) {
    $modules = array_merge($modules, require($filename));
}

return [
    'modules'=>$modules,
    'params' => [
        'appName' => 'console',
    ],
    
    //配置RabbitMq 部分

    'bootstrap' => [
        'queue', // The component registers own console commands
    ],
    'components' => [
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
//    'components' => [
//        'queue' => [
//            'class' => \yii\queue\amqp\Queue::class,
//            //'class' => 'zhuravljov\yii\queue\amqp\Queue',
////            'class' => 'fecshop\app\console\modules\Amqp\block\Queue',
//            'host'  => 'localhost',
//            'port'  => 5672,
//            'user'  => 'mqadmin',
//            'password' => 'mqadmin20177',
//            //'queueName' => 'queue',
//            'queueName' => 'productDropshipQN',
//            'exchangeName' => 'productDropshipEX',
//            'routingKey' => 'productDropshipRT',
//
//        ],
//    ],

    
];
