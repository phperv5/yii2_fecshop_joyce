<?php

namespace fecshop\app\appfront\widgets;

use fecshop\interfaces\block\BlockCache;
use Yii;

class Menu implements BlockCache
{
    public function getLastData()
    {
        $categoryArr  = Yii::$service->product->menu->getMenuList();

        return [
            'categoryArr' => $categoryArr,
        ];
    }

    public function getCacheKey()
    {
        $lang           = Yii::$service->store->currentLangCode;
        $appName        = Yii::$service->helper->getAppName();
        $cacheKeyName   = 'menu';
        return self::BLOCK_CACHE_PREFIX.'_'.$lang.'_'.$appName.'_'.$cacheKeyName;
    }
}
