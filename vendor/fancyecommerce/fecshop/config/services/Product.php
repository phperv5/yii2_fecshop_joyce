<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
    'product' => [
        'class' => 'fecshop\services\Product',
        /**
         * 分类页面的最大的产品总数
         * aggregate 的分页，是把全部产品查出来，然后php进去切分，类似于Es。
         * 因此对总数进行了限制。
         */
        'categoryAggregateMaxCount' => 6000,
        // 'customAttrGroup' => [], 详细参看@common/config/fecshop_local_services/Product.php 里面的配置
        // 子服务
        'childService' => [
            'image' => [
                'class'             => 'fecshop\services\product\Image',
                'imageFloder'       => 'media/catalog/product', # 产品图片存放路径。
                //'allowImgType' 	=> [ # 允许的图片类型
                //    'image/jpeg',
                //    'image/gif',
                //    'image/png',
                //    'image/jpg',
                //    'image/pjpeg',
                //], 
                'maxUploadMSize'=> 5, //MB  # 图片最大尺寸
                //'waterImg'        => 'product_water.jpg',  # 水印图片
            ],
            'price' => [
                'class' => 'fecshop\services\product\Price',
                'ifSpecialPriceGtPriceFinalPriceEqPrice' => true, // 设置为true后，如果产品的special_price > price， 则 special_price无效，价格为price
            ],
            'review' => [
                'class' => 'fecshop\services\product\Review',
                'filterByLang'    => false,    // 是否通过语言进行评论过滤？
            ],
            'favorite' => [
                'class' => 'fecshop\services\product\Favorite',
            ],
            'info' => [
                'class' => 'fecshop\services\product\Info',

            ],
            'stock' => [
                'class' => 'fecshop\services\product\Stock',
                'zeroInventory' => 0, // 是否零库存，1代表开启零库存。
            ],
            'keywords' => [
                'class' => 'fecshop\services\product\Keywords',
            ],
            'ads' => [
                'class' => 'fecshop\services\product\Ads',
            ],
            'config' => [
                'class' => 'fecshop\services\product\Config',
            ],
            'newarrivals' => [
                'class' => 'fecshop\services\product\Newarrivals',
            ],
            'menu' => [
                'class' => 'fecshop\services\product\Menu',  //菜单模块
            ],
            'banner' => [
                'class' => 'fecshop\services\product\Banner',  //菜单模块
            ],
            'prolist' => [
                'class' => 'fecshop\services\product\Prolist',  //首页产品
            ],
        ],
    ],
];
