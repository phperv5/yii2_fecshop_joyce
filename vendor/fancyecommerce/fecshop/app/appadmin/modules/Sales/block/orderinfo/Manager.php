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
class Manager extends AppadminbaseBlock implements AppadminbaseBlockInterface
{
    /**
     * init param function ,execute in construct.
     */
    public function init()
    {
        /*
         * edit data url
         */
        $this->_editUrl = CUrl::getUrl('sales/orderinfo/manageredit');
        /*
         * delete data url
         */
        $this->_deleteUrl = CUrl::getUrl('sales/orderinfo/managerdelete');
        /*
         * service component, data provider
         */
        $this->_service = Yii::$service->order;
        parent::init();
    }

    public function getLastData()
    {

        // hidden section ,that storage page info
        $pagerForm = $this->getPagerForm();
        // search section
        $searchBar = $this->getSearchBar();
        // edit button, delete button,
        $editBar = $this->getEditBar();
        // table head
        $thead = $this->getTableThead();
        // table body
        $tbody = $this->getTableTbody();
        // paging section
        $toolBar = $this->getToolBar($this->_param['numCount'], $this->_param['pageNum'], $this->_param['numPerPage']);

        return [
            'pagerForm' => $pagerForm,
            'searchBar' => $searchBar,
            'editBar' => $editBar,
            'thead' => $thead,
            'tbody' => $tbody,
            'toolBar' => $toolBar,
        ];
    }

    /**
     * get search bar Arr config.
     */
    public function getSearchArr()
    {
        $data = [
            [    // 字符串类型
                'type' => 'inputtext',
                'title' => '订单号',
                'name' => 'increment_id',
                'columns_type' => 'string',
            ],
            [    // 字符串类型
                'type' => 'inputtext',
                'title' => 'Email',
                'name' => 'customer_email',
                'columns_type' => 'string',
            ],
            [    // 字符串类型
                'type' => 'inputtext',
                'title' => 'firstname',
                'name' => 'customer_firstname',
                'columns_type' => 'string',
            ],
            [    // selecit的Int 类型
                'type' => 'select',
                'title' => '订单状态',
                'name' => 'order_status',
                'columns_type' => 'string',  // int使用标准匹配， string使用模糊查询
                'value' => Yii::$service->order->getStatusArr(),
            ],
            [    // 时间区间类型搜索
                'type' => 'inputdatefilter',
                'name' => 'created_at',
                'columns_type' => 'int',
                'value' => [
                    'gte' => '创建时间开始',
                    'lt' => '创建时间结束',
                ],
            ],
        ];

        return $data;
    }

    /**
     * config function ,return table columns config.
     */
    public function getTableFieldArr()
    {
        $table_th_bar = [
//            [
//                'orderField' => $this->_primaryKey,
//                'label' => 'ID',
//                'width' => '50',
//                'align' => 'center',
//
//            ],
            [
                'orderField' => 'increment_id',
                'label' => '订单号',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'created_at',
                'label' => '创建时间',
                'width' => '50',
                'align' => 'left',
                'convert' => ['int' => 'date'],
                //'lang'			=> true,
            ],

            [
                'orderField' => 'customer_firstname',
                'label' => 'first name',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],
            [
                'orderField' => 'customer_lastname',
                'label' => 'last name',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'order_status',
                'label' => '订单状态',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'items_count',
                'label' => '总数',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'total_weight',
                'label' => '总重量',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'base_grand_total',
                'label' => '总金额（美元）',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'payment_method',
                'label' => '支付方式',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'shipping_method',
                'label' => '货运方式',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'base_shipping_total',
                'label' => '运费（美元）',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'shipping_number',
                'label' => 'shipping_number',
                'width' => '30',
                'align' => 'left',
                //'lang'			=> true,
            ],
            [
                'orderField' => 'delivery_remark',
                'label' => 'delivery_remark',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

            [
                'orderField' => 'customer_email',
                'label' => '邮箱',
                'width' => '50',
                'align' => 'left',
                //'lang'			=> true,
            ],

        ];

        return $table_th_bar;
    }

    /**
     * rewrite parent getTableTbodyHtml($data).
     */
    public function getTableTbodyHtml($data)
    {
        $fileds = $this->getTableFieldArr();
        $str = '';
        $csrfString = \fec\helpers\CRequest::getCsrfString();
        $user_ids = [];
        foreach ($data as $one) {
            $user_ids[] = $one['created_person'];
        }
        $users = Yii::$service->adminUser->getIdAndNameArrByIds($user_ids);
        foreach ($data as $one) {
            $str .= '<tr target="sid_user" rel="' . $one[$this->_primaryKey] . '">';
            $str .= '<td><input name="' . $this->_primaryKey . 's" value="' . $one[$this->_primaryKey] . '" type="checkbox"></td>';
            foreach ($fileds as $field) {
                $orderField = $field['orderField'];
                $display = $field['display'];
                $val = $one[$orderField];
                if ($orderField == 'created_person') {
                    $val = isset($users[$val]) ? $users[$val] : $val;
                    $str .= '<td>' . $val . '</td>';
                    continue;
                }
                if ($val) {
                    if (isset($field['display']) && !empty($field['display'])) {
                        $display = $field['display'];
                        $val = $display[$val] ? $display[$val] : $val;
                    }
                    if (isset($field['convert']) && !empty($field['convert'])) {
                        $convert = $field['convert'];
                        foreach ($convert as $origin => $to) {
                            if (strstr($origin, 'mongodate')) {
                                if (isset($val->sec)) {
                                    $timestramp = $val->sec;
                                    if ($to == 'date') {
                                        $val = date('Y-m-d', $timestramp);
                                    } elseif ($to == 'datetime') {
                                        $val = date('Y-m-d H:i:s', $timestramp);
                                    } elseif ($to == 'int') {
                                        $val = $timestramp;
                                    }
                                }
                            } elseif (strstr($origin, 'date')) {
                                if ($to == 'date') {
                                    $val = date('Y-m-d', strtotime($val));
                                } elseif ($to == 'datetime') {
                                    $val = date('Y-m-d H:i:s', strtotime($val));
                                } elseif ($to == 'int') {
                                    $val = strtotime($val);
                                }
                            } elseif ($origin == 'int') {
                                if ($to == 'date') {
                                    $val = date('Y-m-d', $val);
                                } elseif ($to == 'datetime') {
                                    $val = date('Y-m-d H:i:s', $val);
                                } elseif ($to == 'int') {
                                    $val = $val;
                                }
                            } elseif ($origin == 'string') {
                                if ($to == 'img') {
                                    $t_width = isset($field['img_width']) ? $field['img_width'] : '100';
                                    $t_height = isset($field['img_height']) ? $field['img_height'] : '100';
                                    $val = '<img style="width:' . $t_width . 'px;height:' . $t_height . 'px" src="' . $val . '" />';
                                }
                            }
                        }
                    }

                    if (isset($field['lang']) && !empty($field['lang'])) {
                        //var_dump($val);
                        //var_dump($orderField);
                        $val = Yii::$service->fecshoplang->getDefaultLangAttrVal($val, $orderField);
                    }
                }
                $str .= '<td>' . $val . '</td>';
            }
            $str .= '<td><a title="编辑" target="dialog" class="btnEdit" mask="true" drawable="true" width="1000" height="580" href="' . $this->_editUrl . '?' . $this->_primaryKey . '=' . $one[$this->_primaryKey] . '" >编辑</a>';
            //if ($one['order_status'] == Yii::$service->order->payment_status_processing) {
            $str .= '<a title="发货" target="dialog" class="buttonActive" mask="true" drawable="true" width="1000" height="580" href="' . CUrl::getUrl('sales/orderinfo/track?order_id=') . $one['order_id'] . '" ><span>发货</span></a>';
            //}
            $str .= '</td></tr>';
        }

        return $str;
    }
}
