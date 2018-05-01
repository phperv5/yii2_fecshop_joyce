<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => '',
            'username' => '',
            'password' => '',
            'charset' => '',
        ],
        'mongodb' => [
            'class' => 'yii\mongodb\Connection',
            // 有账户的配置
            //'dsn' => 'mongodb://username:password@localhost:27017/datebase',
            // 无账户的配置
            'dsn' => '',
            // 复制集
            //'dsn' => 'mongodb://10.10.10.252:10001/erp,mongodb://10.10.10.252:10002/erp,mongodb://10.10.10.252:10004/erp?replicaSet=terry&readPreference=primaryPreferred',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '',
            'port' => '',
            'password' => '',

        ],
    ],
];
