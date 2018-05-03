<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appfront\modules\checkout\block\onepage;

use fec\helpers\CRequest;
use Yii;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Orderdetail
{
    protected $_payment_method;
    protected $_orderInfo;

    public function getLastData()
    {
        //获取
        $request_param = CRequest::param();
        $order_id = $request_param['order_id'];
        //订单详细
        $orderDetail = $this->getCustomerOrderInfo($order_id);

        if (!$orderDetail) {
            die('data error!');
        }

        return [
            'payments' => '',
            'shippings' => '',
            'current_payment_method' => '',
            'cart_info' => $orderDetail,
            'currency_info' => '',
            'address_view_file' => '',
            'cart_address' => '',
            'cart_address_id' => '',
            'state_html' => '',
        ];
    }

    public function getCustomerOrderInfo($order_id)
    {
        if ($order_id) {
            $order_info = Yii::$service->order->getOrderInfoById($order_id);
            if (isset($order_info['customer_id']) && !empty($order_info['customer_id'])) {
                $identity = Yii::$app->user->identity;
                $customer_id = $identity->id;
                if ($order_info['customer_id'] == $customer_id) {
                    return $order_info;
                }
            }
        }

        return [];
    }

    /*
     * 订单提交支付
     */

    public function paySave()
    {
        $post = Yii::$app->request->post();
        if (is_array($post) && !empty($post)) {
            /**
             * 对传递的数据，去除掉非法xss攻击部分内容（通过\Yii::$service->helper->htmlEncode()）.
             */
            $post = \Yii::$service->helper->htmlEncode($post);
            // 检查前台传递的数据的完整
            if ($this->checkOrderInfoAndInit($post)) {
                // 将购物车数据，生成订单。
                Yii::$service->order->setSessionIncrementId($this->_orderInfo['increment_id']);
                Yii::$service->order->UpdateOrderInfo($this->_orderInfo['increment_id'], $this->_payment_method);
                if ($this->_payment_method == 'paypal_standard') {
                    $startUrl = Yii::$service->payment->getStandardStartUrl($this->_payment_method);
                    Yii::$service->url->redirect($startUrl);
                }
            } else {
            }
        }
        Yii::$service->page->message->addByHelperErrors();

        return false;
    }

    public function checkOrderInfoAndInit($post)
    {
        $payment_method = isset($post['payment_method']) ? $post['payment_method'] : '';
        $order_id = isset($post['order_id']) ? $post['order_id'] : '';
        if (!$order_id) {
            Yii::$service->helper->errors->add('order is error');

            return false;
        }
        $orderInfo = $this->getCustomerOrderInfo($order_id);
        if (!$orderInfo) {
            Yii::$service->helper->errors->add('order is error');

            return false;
        }
        // 验证支付方式
        if (!$payment_method) {
            Yii::$service->helper->errors->add('payment method can not empty');

            return false;
        } else {
            if (!Yii::$service->payment->ifIsCorrectStandard($payment_method)) {
                Yii::$service->helper->errors->add('payment method is not correct');

                return false;
            }
        }

        $this->_payment_method = $payment_method;
        $this->_orderInfo = $orderInfo;
        return true;
    }
}
