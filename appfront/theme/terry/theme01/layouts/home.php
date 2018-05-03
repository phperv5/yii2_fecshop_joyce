<?php
$jsOptions = [
    # js config 1
    [
        'options' => [
            'position' => 'POS_END',
            //	'condition'=> 'lt IE 9',
        ],
        'js' => [
            'js/common.js',
            'js/jquery.js',
            'js/js.js',
            'js/plugins/owlcarousel/owl.carousel.min.js',
        ],
    ],
];

# css config
$cssOptions = [
    # css config 1.
    [
        'css' => [
            'css/style.css',
            'css/style_h.css',
            //'css/nav.css',
            'js/plugins/owlcarousel/assets/owl.carousel.min.css',
        ],
    ],
];
\Yii::$service->page->asset->jsOptions = $jsOptions;
\Yii::$service->page->asset->cssOptions = $cssOptions;
\Yii::$service->page->asset->register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $currentLangCode = Yii::$service->store->currentLangCode; ?>"
      lang="<?= $currentLangCode ?>">
<head>
    <?= Yii::$service->page->widget->render('head', $this); ?>
</head>
<body>
<?php $this->beginBody() ?>
<header id="header">
    <?= Yii::$service->page->widget->render('header', $this); ?>
    <?= Yii::$service->page->widget->render('menu', $this); ?>
</header>

<div class="main-container">
    <?= $content;?>
</div>
<div class="footer-container">
    <?= Yii::$service->page->widget->render('footer', $this); ?>
</div>
<?= Yii::$service->page->widget->render('scroll', $this); ?>
<?php $this->endBody() ?>
</body>
</html>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=94621973"></script>
<?php $this->endPage() ?>


