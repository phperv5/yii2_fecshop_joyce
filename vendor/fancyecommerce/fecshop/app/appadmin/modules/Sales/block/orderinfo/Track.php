<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Sales\block\orderinfo;

use fec\helpers\CUrl;
use fecshop\app\appadmin\interfaces\base\AppadminbaseBlockInterface;
use fecshop\app\appadmin\modules\AppadminbaseBlock;
use Yii;

/**
 * block cms\article.
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Track
{
    /**
     * init param function ,execute in construct.
     */
    public function init()
    {

        /*
         * service component, data provider
         */
        $this->_service = Yii::$service->order;

    }

    public function getLastData()
    {
        $order_id = Yii::$app->request->get('order_id');
        return [
            'order_id' => $order_id,
            'saveUrl' => Yii::$service->url->getUrl('sales/orderinfo/tracksave'),
        ];
    }

    public function save()
    {
        $editForm = Yii::$app->request->post('editForm');
        $order_id = $editForm['order_id'];
        $editForm['order_status'] = Yii::$service->order->payment_status_suspected_fraud; //shipped

        $orderModel = Yii::$service->order->getByPrimaryKey($order_id);
        if (is_array($editForm) && $orderModel['order_id']) {
            foreach ($editForm as $k => $v) {
                if (isset($orderModel[$k])) {
                    $orderModel[$k] = $v;
                }
            }
            $orderModel->save();
        }
        //发送邮件
        if (isset($editForm['is_email_status'])) {
            $this->sendMail($orderModel->customer_email,'Norman-keys,'.'your order:'.$orderModel->increment_id.' is shipped.','your order:'.$orderModel->increment_id.' is shipped.',$orderModel->customer_firstname.' '.$orderModel->customer_lastname);
        }
        echo json_encode([
            'statusCode' => '200',
            'message' => 'save success',
        ]);
        exit;
    }


    /*
     * zhuang
     * 发送邮件
     */
    public function sendMail($to, $subject, $htmlBody, $senderName)
    {
        $sendInfo = compact('to', 'subject', 'htmlBody', 'senderName');
        Yii::$service->email->send($sendInfo);
    }

}