<?php
namespace fecshop\app\console\modules\Amqp\block;

use yii\base\Object;
use Yii;

class Push extends Object implements \yii\queue\Job
{
    public $email;
    public $subject;
    public $htmlBody;

    /*
     * $d = 'name:'.$this->name.'####'.'age:'.$this->age;
     */
    public function execute($queue)
    {
        $to = $this->email;
        $subject = $this->subject;
        $htmlBody = $this->htmlBody;
        $sendInfo = compact('to', 'subject', 'htmlBody');
        if ($to) {
            try {
                Yii::$service->email->send($sendInfo);
            } catch (\Exception $e) {

            }
        }
    }
}