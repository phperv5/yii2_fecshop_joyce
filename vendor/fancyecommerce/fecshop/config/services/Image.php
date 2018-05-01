<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
    'image' => [
        'class' => 'fecshop\services\Image',
        'imageFloder' => 'media/upload',
        'maxUploadMSize' => 8,  // MB
        'allowImgType' => [
            'image/jpeg',
            'image/gif',
            'image/png',
            'image/jpg',
            'image/pjpeg',
        ],
    ],
];
