<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\block\email;

use fec\helpers\CUrl;
use Yii;
use fecshop\app\console\modules\Amqp\block\Push;

class Manageredit
{
    public $_saveUrl;
    public $_to;

    public function __construct()
    {
        $this->_saveUrl = CUrl::getUrl('catalog/email/managereditsave');
        $this->_to = Yii::$app->request->get('to');
    }

    // 传递给前端的数据 显示编辑form
    public function getLastData()
    {
        return [
            'saveUrl' => $this->_saveUrl,
            'to' => $this->_to,
        ];
    }

    /**
     * save article data,  get rewrite url and save to article url key.
     */
    public function save()
    {
        $editForm = Yii::$app->request->post('editForm');
        if (!$editForm['subject']) {
            exit(json_encode(['statusCode' => '300', 'message' => 'subject不能为空']));
        }
        if (!$editForm['htmlBody']) {
            exit(json_encode(['statusCode' => '300', 'message' => '邮件内容不能为空']));
        }
        if ($editForm['toall']) {
            $emailArr = Yii::$service->customer->getAllUserEmail();
            foreach ($emailArr as $email) {
                $subject = $editForm['subject'];
                $htmlBody = $editForm['htmlBody'];
                $sendInfo = compact('email', 'subject', 'htmlBody');
                Yii::$app->queue->delay(2)->push(new Push($sendInfo));
            }
        } else {
            $email = $editForm['to'];
            $subject = $editForm['subject'];
            $htmlBody = $editForm['htmlBody'];
            $sendInfo = compact('email', 'subject', 'htmlBody');
            Yii::$app->queue->delay(2)->push(new Push($sendInfo));
        }
        echo json_encode([
            'statusCode' => '200',
            'message' => 'save success',
        ]);
        exit;
    }
}
