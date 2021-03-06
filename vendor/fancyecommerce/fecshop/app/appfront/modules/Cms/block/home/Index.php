<?php
/*
 * 存放 一些基本的非数据库数据 如 html
 * 都是数组
 */

namespace fecshop\app\appfront\modules\cms\block\home;

use Yii;

class Index
{
    public function getLastData()
    {
        $this->initHead();
        $newArrivals = Yii::$service->product->newarrivals->getList();
        $proList = Yii::$service->product->prolist->getList();
        $emptyArr = ['_test_'];
        return [
            'newArrivals' => $this->getNewArrivals($newArrivals),
            'bestSellerProducts1' => $this->getBestSellerProducts('', isset($proList[0])?$proList[0]:$emptyArr),
            'bestSellerProducts2' => $this->getBestSellerProducts('', isset($proList[1])?$proList[1]:$emptyArr),
            'bestSellerProducts3' => $this->getBestSellerProducts('', isset($proList[2])?$proList[2]:$emptyArr),
            'bestSellerProducts4' => $this->getBestSellerProducts('', isset($proList[3])?$proList[3]:$emptyArr),
        ];
    }

    public function getFeaturedProduct()
    {
        $featured_skus = Yii::$app->controller->module->params['homeFeaturedSku'];
        return $this->getProductBySkus($featured_skus);
    }

    public function getBestSellerProducts($category_id = null, $skus = null, $limit = 10)
    {
        $filter['select'] = [
            'sku', 'spu', 'name', 'image',
            'price', 'special_price',
            'special_from', 'special_to',
            'url_key', 'score',
        ];
        //$filter['where'] = ['category' => $category_id];
        if ($skus) {
            $filter['where'] = ['in', 'sku', $skus];
        }
        $filter['orderBy'] = ['score' => -1];
        $filter['limit'] = $limit;
        $products = Yii::$service->product->getProducts($filter);
        $products = Yii::$service->category->product->convertToCategoryInfo($products);
        return $products;
    }

    /*
     * new New Arrivals
     */
    public function getNewArrivals($skus, $limit = 8)
    {
        $filter['select'] = [
            'sku', 'spu', 'name', 'image',
            'price', 'special_price',
            'special_from', 'special_to',
            'url_key', 'score',
        ];
        if ($skus) {
            $filter['where'] = ['in', 'sku', $skus];
        } else {
            $filter['orderBy'] = ['score' => -1];
            $filter['limit'] = $limit;
        }
        $products = Yii::$service->product->getProducts($filter);
        $products = Yii::$service->category->product->convertToCategoryInfo($products);
        return $products;
    }


    public function getProductBySkus($skus)
    {
        if (is_array($skus) && !empty($skus)) {
            $filter['select'] = [
                'sku', 'spu', 'name', 'image',
                'price', 'special_price',
                'special_from', 'special_to',
                'url_key', 'score',
            ];
            $filter['where'] = ['in', 'sku', $skus];
            $products = Yii::$service->product->getProducts($filter);
            $products = Yii::$service->category->product->convertToCategoryInfo($products);

            return $products;
        }
    }

    public function initHead()
    {
        $home_title = Yii::$app->controller->module->params['home_title'];
        $home_meta_keywords = Yii::$app->controller->module->params['home_meta_keywords'];
        $home_meta_description = Yii::$app->controller->module->params['home_meta_description'];

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => Yii::$service->store->getStoreAttrVal($home_meta_keywords, 'home_meta_keywords'),
        ]);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => Yii::$service->store->getStoreAttrVal($home_meta_description, 'home_meta_description'),
        ]);
        Yii::$app->view->title = Yii::$service->store->getStoreAttrVal($home_title, 'home_title');
    }
}
