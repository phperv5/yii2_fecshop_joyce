<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\block\productinfo;

use fec\helpers\CRequest;
use fec\helpers\CUrl;
use fecshop\app\appadmin\interfaces\base\AppadminbaseBlockEditInterface;
use fecshop\app\appadmin\modules\AppadminbaseBlockEdit;
use Yii;

/**
 * block catalog/productinfo.
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Batchimport extends AppadminbaseBlockEdit implements AppadminbaseBlockEditInterface
{
    protected $_attrBlockName = '\fecshop\app\appadmin\modules\Catalog\block\productinfo\index\Attr';
    private $_saveUrl;

    public function init()
    {
        /**
         * 通过Yii::mapGet() 得到重写后的class类名以及对象。Yii::mapGet是在文件@fecshop\yii\Yii.php中
         */
        $this->_attrBlockName = Yii::mapGetName($this->_attrBlockName);

        $this->_saveUrl = CUrl::getUrl('catalog/productinfo/batchimportsave');
        parent::init();
    }

    public function setService()
    {
        $this->_service = Yii::$service->product;
    }

    public function getLastData()
    {
        return [
            'saveUrl' => $this->_saveUrl,
        ];
    }

    /**
     * save article data,  get rewrite url and save to article url key.
     */
    public function save()
    {
//        $this->initParamType();
        /*
         * if attribute is date or date time , db storage format is int ,by frontend pass param is int ,
         * you must convert string datetime to time , use strtotime function.
         */
        $request_param = CRequest::param();
        $root_path = '../../';
        require $root_path . 'src/UploadFile.php';
        $file_path = $root_path . 'uploads/';
        $upload = new \UploadFile();
        $upload->savePath = $file_path;// 设置附件上传目录   默认上传目录为 ./uploads/

        if (!$upload->upload()) {
            // 上传错误提示错误信息
            exit(json_encode(['res' => 1, 'msg' => $upload->getErrorMsg()]));
        } else {
            // 上传成功 获取上传文件信息
            $fileInfo = $upload->getUploadFileInfo();
        }
        $filename = $fileInfo[0]['savepath'] . $fileInfo[0]['savename'];
        $errors = $this->productFileHandler($filename);
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

    /*
     * 信息导入处理
     */
    public function productFileHandler($filename)
    {
        $fd = fopen($filename, "r");
        $products = [];
        while (!feof($fd)) {
            $data = fgetcsv($fd);
            $t = array_filter($data);
            if (!empty($t)) {
                $products[] = array_map('trim',$data);
            }
        }
        fclose($fd);
        if(file_exists($filename))unlink($filename);

        foreach ($products as $key => $value) {
            if ($key == 0) continue;
            $product = [];
            $product['name']['name_en'] = $value[0];
            $product['spu'] = $value[1];
            $product['sku'] = $value[2];
            $product['weight'] = $value[3];
            $product['package'] = $value[4];
            $product['qty'] = (float)$value[5];
            $product['price'] = (float)$value[6];
            if($value[7]){
                $product['special_price'] = (float)$value[7];
            }
            $product['short_description']['short_description_en'] = $value[9];
            $product['meta_title']['meta_title_en'] = $value[9];
            $product['meta_keywords']['meta_keywords_en'] = $value[9];
            $product['meta_description']['meta_description_en'] = $value[9];
            $product['description']['description_en'] = $value[10];
            $product['tech_support']['tech_support_en'] = $value[11];
            $product['video']['video_en'] = $value[12];
            $product['is_in_stock'] = 1;
            $product['created_at'] = time();
            //$product['status'] = 2;

            $error = $this->_service->apiSave($product);
        }
        return $error;
    }


    public function getEditArr()
    {
    }
}