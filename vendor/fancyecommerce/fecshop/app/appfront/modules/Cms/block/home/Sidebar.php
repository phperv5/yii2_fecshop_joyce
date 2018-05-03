<?php
/*
 * 存放 一些基本的非数据库数据 如 html
 * 都是数组
 */

namespace fecshop\app\appfront\modules\cms\block\home;

use Yii;

class Sidebar
{
    public function getLastData()
    {
        $about_us = Yii::$service->product->config->getOne('about_us');
        return [
            'about_us' => $about_us['content'],
        ];
    }

}
