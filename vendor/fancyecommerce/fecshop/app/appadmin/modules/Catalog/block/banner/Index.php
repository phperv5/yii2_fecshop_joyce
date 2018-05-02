<?php
namespace fecshop\app\appadmin\modules\Catalog\block\banner;

use fec\helpers\CUrl;
use fecshop\app\appadmin\interfaces\base\AppadminbaseBlockInterface;
use fecshop\app\appadmin\modules\AppadminbaseBlock;
use Yii;

class Index extends AppadminbaseBlock implements AppadminbaseBlockInterface
{

    public function init()
    {
        $this->_editUrl = CUrl::getUrl('catalog/banner/manageredit');
        $this->_deleteUrl = CUrl::getUrl('catalog/banner/managerdelete'); //delete data url

        $this->_service = Yii::$service->product->banner;
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
        $data = [];
        return $data;
    }

    /**
     * config function ,return table columns config.
     */
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
                'orderField' => 'title',
                'label' => 'title',
                'width' => '110',
                'align' => 'left',
            ],
            [
                'orderField' => 'banner_url',
                'label' => 'banner图',
                'width' => '100',
                'height' => '100',
                'align' => 'left',
                'convert'        => ['string' => 'img'],
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
                    'middle_position'=>'中间区广告',
                ],
            ],
            [
                'orderField' => 'sort_order',
                'label' => 'sort_order',
                'width' => '110',
                'align' => 'left',
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
