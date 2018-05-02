<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\controllers;

use fecshop\app\appadmin\modules\Catalog\CatalogController;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class ProductinfoController extends CatalogController
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $data = $this->getBlock()->getLastData();

        return $this->render($this->action->id, $data);
    }

    public function actionManageredit()
    {
        $data = $this->getBlock()->getLastData();

        return $this->render($this->action->id, $data);
    }

    // catalog
    public function actionImageupload()
    {
        $this->getBlock()->upload();
    }

    // catalog product
    public function actionGetproductcategory()
    {
        $this->getBlock()->getProductCategory();
    }

    public function actionManagereditsave()
    {
        $data = $this->getBlock('manageredit')->save();

        return $this->render($this->action->id, $data);
    }

    public function actionManagerdelete()
    {
        $data = $this->getBlock('manageredit')->delete();
    }

    public function actionBatchimport()
    {
        $data = $this->getBlock()->getLastData();

        return $this->render($this->action->id, $data);
    }

    //批量导入保存
    public function actionBatchimportsave()
    {
        $data = $this->getBlock('batchimport')->save();

        return $this->render($this->action->id, $data);
    }

    //上传附件
    // catalog
    public function actionAttachmentupload()
    {
        $this->getBlock('imageupload')->attachmentupload();
    }

    public function actionEditcategory()
    {
        $data = $this->getBlock()->getLastData();

        return $this->render($this->action->id, $data);
    }

    //批量修改分类保存
    public function actionEditcategorysave()
    {
        $data = $this->getBlock('editcategory')->save();
    }
}
