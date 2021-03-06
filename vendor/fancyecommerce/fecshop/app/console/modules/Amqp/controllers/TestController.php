<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\console\modules\Amqp\controllers;

use Yii;
use yii\console\Controller;
use fecshop\app\console\modules\Amqp\block\Push;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 * 这是一个测试RabbitMq 的一个例子。这里作为消息生产方。
 * 你可以通过执行 ./yii amqp/test/test 来生产数据。
 */
class TestController extends Controller
{
    protected $_numPerPage = 50;

    /**
     * 测试
     */
    public function actionTest()
    {
        // 这个是对象的方式，消息的传递和接收都是fecshop的时候使用
         Yii::$app->queue->push(new Push([
            'name'  => 'terry',
            'age'   => 31,
         ]));
    }
    
    
    public function actionListen()
    {
        Yii::$app->queue->listen();
        
    }
    
   
    
}
