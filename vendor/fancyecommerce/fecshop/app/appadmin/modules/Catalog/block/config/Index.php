<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\block\config;

use fec\helpers\CUrl;
use fecshop\app\appadmin\interfaces\base\AppadminbaseBlockInterface;
use fecshop\app\appadmin\modules\AppadminbaseBlock;
use Yii;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Index extends AppadminbaseBlock implements AppadminbaseBlockInterface
{
    /**
     * init param function ,execute in construct.
     */
    public function init()
    {
        $this->_editUrl = CUrl::getUrl('catalog/config/manageredit');
        $this->_deleteUrl = CUrl::getUrl('catalog/config/managerdelete'); //delete data url

        $this->_service = Yii::$service->product->config;
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
        ];
        return $data;
    }

    /**
     * config function ,return table columns config.
     */
    public function getTableFieldArr()
    {
        $table_th_bar = [
            [
                'orderField' => $this->_primaryKey,
                'label' => 'ID',
                'width' => '50',
                'align' => 'center',
            ],
            [
                'orderField' => 'keywords',
                'label' => 'keywords',
                'width' => '110',
                'align' => 'left',
            ],
            [
                'orderField' => 'url',
                'label' => 'url',
                'width' => '110',
                'align' => 'left',
            ],
            [
                'orderField' => 'type',
                'label' => '类型',
                'width' => '50',
                'align' => 'left',
                'display' => [
                    1    => 'search keywords',
                    2    => 'Popular Search',
                    3    => 'Browse by Feature',
                ],
            ],
            [
                'orderField'    => 'created_at',
                'label'            => '创建时间',
                'width'            => '110',
                'align'        => 'center',
                'convert'        => ['int' => 'datetime'],
            ],
            [
                'orderField'    => 'updated_at',
                'label'            => '更新时间',
                'width'            => '110',
                'align'        => 'center',
                'convert'        => ['int' => 'datetime'],
            ],

        ];

        return $table_th_bar;
    }

}
