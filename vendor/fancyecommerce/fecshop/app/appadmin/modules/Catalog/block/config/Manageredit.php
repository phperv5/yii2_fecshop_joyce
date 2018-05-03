<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\block\config;

use fec\helpers\CRequest;
use fec\helpers\CUrl;
use fecshop\app\appadmin\interfaces\base\AppadminbaseBlockEditInterface;
use fecshop\app\appadmin\modules\AppadminbaseBlockEdit;
use Yii;

/**
 * block cms\article.
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Manageredit extends AppadminbaseBlockEdit implements AppadminbaseBlockEditInterface
{
    public $_saveUrl;
    public $_type;

    public function __construct()
    {
        parent::init();
        $this->_saveUrl = CUrl::getUrl('catalog/config/managereditsave');
    }

    // 传递给前端的数据 显示编辑form
    public function getLastData($type)
    {
        $this->_type = $type;
        $this->_one = $this->_service->getOne($this->_type);
        return [
            'one' => $this->_one,
            'saveUrl' => $this->_saveUrl,
            'type' => $this->_type,
        ];
    }

    public function setService()
    {
        $this->_service = Yii::$service->product->config;
    }

    public function getEditArr()
    {
        return [
        ];
    }

    /**
     * save article data,  get rewrite url and save to article url key.
     */
    public function save()
    {
        $request_param = CRequest::param();
        $param = $request_param[$this->_editFormData];
        $this->_one = $this->_service->getOne($param['type']);
        $this->_param['type'] = $param['type'];
        $this->_param['content'] = $param;
        $this->_param['_id'] = $this->_one['_id'];
        $this->_service->save($this->_param);
        $errors = Yii::$service->helper->errors->get();
        if (!$errors) {
            echo json_encode([
                'statusCode' => '200',
                'message' => 'save success',
            ]);
            exit;
        } else {
            echo json_encode([
                'statusCode' => '300',
                'message' => $errors,
            ]);
            exit;
        }
    }
}
