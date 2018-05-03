<input type="hidden" class="currentBaseUrl" value="<?= $currentBaseUrl ?>" />
<input type="hidden" class="logoutUrl" value="<?= $logoutUrl ?>" />
<input type="hidden" class="logoutStr" value="<?= Yii::$service->page->translate->__('Logout'); ?>" />
<input type="hidden" class="welcome_str" value="<?= Yii::$service->page->translate->__('Welcome!'); ?>" />
<div class="hd_wrapper">
    <div class="hd_wrap_fun">
        <div class="hd_wr_f_nav" id="hd_f_signin">
            <div class="login-text t_r">
            <a href="<?= Yii::$service->url->getUrl('customer/account/login') ?>" class="link_green" rel="nofollow"><b>Sign In</b></a>
            <span class="gray px11">or</span>
            <a href="<?= Yii::$service->url->getUrl('customer/account/register'); ?>" class="link_green" rel="nofollow"><b>Register</b></a>
            </div>
        </div>
        <div class="hd_wr_f_bar">
            <div class="hd_wr_f_my">
                <div class="hd_wr_nav"><a href="<?= Yii::$service->url->getUrl('customer/order') ?>" rel="nofollow"><?= Yii::$service->page->translate->__('My Account'); ?></a>
                    <ul>
                        <a href="<?= Yii::$service->url->getUrl('customer/order') ?>"
                           rel="nofollow"><?= Yii::$service->page->translate->__('My Orders'); ?><span
                                    id="myaccount_num_orders"></span></a>
                        <!--                        <a href="members/�action=inbox.html" rel="nofollow">My Tickets<span id="myaccount_num_orders"></span></a>-->
                        <a href="<?= Yii::$service->url->getUrl('customer/productreview') ?>" rel="nofollow"><?= Yii::$service->page->translate->__('My Review'); ?><span id="myaccount_num_orders"></span></a>
                        <!--                        <a href="members/�action=specialproducts.html" rel="nofollow">VIP Special Products<span id="myaccount_num_orders"></span></a>-->
                        <a id="myaccount_myfavorites" href="<?= Yii::$service->url->getUrl('customer/productfavorite') ?>" rel="nofollow"><?= Yii::$service->page->translate->__('My Favorites'); ?><span id="myaccount_num_orders"></span></a>
                    </ul>
                </div>
            </div>
            <div class="hd_wr_f_help">
                <div class="hd_wr_nav"><a href="support/support.html">Help</a>
                    <ul>
                        <a href="<?= Yii::$service->url->getUrl('help') ?>">Help Center</a>
                        <a href="<?= Yii::$service->url->getUrl('freed back') ?>">Freed Back</a>
                    </ul>
                </div>
            </div>
            <div class="hd_wr_f_help">
            <div class="hd_wr_nav">
                        <a class="current_currency" style="color: #039;padding-left:10px"><b><?= $currency['code'] ?></b></a>
                        <ul class="currency_list">
                            <?php foreach($currencys as $c):    ?>
                                <a rel="<?= $c['code'] ?>"><?= $c['code'] ?></a>
                            <?php endforeach; ?>
                        </ul>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="header" id="WebPageTop">
    <div class="hd_logo"><a href="<?= $homeUrl ?>" target="_top"><h1></h1></a></div>
    <?= Yii::$service->page->widget->render('topsearch',$this); ?>
    <div class="hd_cart">
        <a href="<?= Yii::$service->url->getUrl('checkout/cart') ?>" target="_top" rel="nofollow" id="hd_mycart">
            <span class="mycart-text">My Shopping Cart</span>
        </a>
    </div>
    <div class="hd_pop_kw"><a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=MB BGA Tool');?>">MB BGA Tool</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=VVDI2');?>">VVDI2</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=2017 Launch X431');?>">2017 Launch X431</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=XTruck USB Link');?>">XTruck USB Link</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=VXDIAG VCX NANO');?>">VXDIAG VCX NANO</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=Volvo VCADS');?>">Volvo VCADS</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=XTUNER');?>">XTUNER</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=Launch X431 V');?>">Launch X431 V</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=X100 Pad');?>">X100 Pad</a>
        <a href="<?= Yii::$service->url->getUrl('catalogsearch/index?q=CBAY Handy Baby');?>">CBAY Handy Baby</a>
    </div>
    <div class="clear">
    </div>
