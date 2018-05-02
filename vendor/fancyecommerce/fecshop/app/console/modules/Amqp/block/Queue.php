<?php
namespace fecshop\app\console\modules\Amqp\block;

class Queue extends \yii\queue\amqp\Queue
{
    public $routingKey;

    protected function handleMessage($id, $message)
    {
       // $message = unserialize($message);
        var_dump($message);
        //  do some thing ...
        // \Yii::info($message,'fecshop_debug');
        return true;
    }
    

}