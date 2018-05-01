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
        // change current layout File.
        //Yii::$service->page->theme->layoutFile = 'home.php';
        return [
            'newArrivals' => $this->getNewArrivals(),
            'bestSellerProducts1' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts2' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts3' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts4' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts5' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts6' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts7' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
            'bestSellerProducts8' => $this->getBestSellerProducts('599823c3625a9c1a0f792c82'),
        ];
    }

    public function getFeaturedProduct()
    {
        $featured_skus = Yii::$app->controller->module->params['homeFeaturedSku'];
        return $this->getProductBySkus($featured_skus);
    }

    public function getBestSellerProducts($category_id = null, $limit = 10)
    {
        $filter['select'] = [
            'sku', 'spu', 'name', 'image',
            'price', 'special_price',
            'special_from', 'special_to',
            'url_key', 'score',
        ];
        $filter['where'] = ['category' => $category_id];
        $filter['orderBy'] = ['score' => -1];
        $filter['limit'] = $limit;
        $products = Yii::$service->product->getProducts($filter);
        $products = Yii::$service->category->product->convertToCategoryInfo($products);
        return $products;
    }

    /*
     * new New Arrivals
     */
    public function getNewArrivals($limit = 8)
    {
        $filter['select'] = [
            'sku', 'spu', 'name', 'image',
            'price', 'special_price',
            'special_from', 'special_to',
            'url_key', 'score',
        ];

        $filter['orderBy'] = ['score' => -1];
        $filter['limit'] = $limit;
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
