<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appfront\modules\Customer\block\order;

use Yii;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Index
{
    protected $numPerPage = 15;
    protected $pageNum;
    protected $orderBy;
    protected $customer_id;
    protected $_page = 'p';
    protected $order_status = null;

    /**
     * 初始化类变量.
     */
    public function initParam()
    {
        if (!Yii::$app->user->isGuest) {
            $identity = Yii::$app->user->identity;
            $this->customer_id = $identity;
        }
        $this->pageNum = (int)Yii::$app->request->get('p');
        $this->pageNum = ($this->pageNum >= 1) ? $this->pageNum : 1;
        $this->orderBy = ['order_id' => SORT_DESC];
        $this->order_status = Yii::$app->request->get('order_status');
    }

    public function getLastData()
    {
        $this->initParam();
        $return_arr = [];
        if ($this->order_status) {
            $where['order_status'] = $this->order_status;
        }
        if ($this->customer_id) {
            $where['customer_id'] = $this->customer_id->id;
            $filter = [
                'numPerPage' => $this->numPerPage,
                'pageNum' => $this->pageNum,
                'orderBy' => $this->orderBy,
                'where' => [$where],
                'asArray' => true,
            ];

            $customer_order_list = Yii::$service->order->coll($filter);
            $return_arr['order_list'] = $customer_order_list['coll'];
            $count = $customer_order_list['count'];
            $pageToolBar = $this->getProductPage($count);
            $return_arr['pageToolBar'] = $pageToolBar;
            $return_arr['order_status_arr'] = Yii::$service->order->getStatusArr();
            $return_arr['order_status'] = $this->order_status;
        }

        return $return_arr;
    }

    protected function getProductPage($countTotal)
    {
        if ($countTotal <= $this->numPerPage) {
            return '';
        }
        $config = [
            'class' => 'fecshop\app\appfront\widgets\Page',
            'view' => 'widgets/page.php',
            'pageNum' => $this->pageNum,
            'numPerPage' => $this->numPerPage,
            'countTotal' => $countTotal,
            'page' => $this->_page,
        ];

        return Yii::$service->page->widget->renderContent('category_product_page', $config);
    }
}
