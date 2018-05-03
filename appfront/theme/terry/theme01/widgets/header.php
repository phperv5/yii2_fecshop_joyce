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
                        <a href="<?= Yii::$service->url->getUrl('customer/productreview') ?>" rel="nofollow"><?= Yii::$service->page->translate->__('My Review'); ?><span id="myaccount_num_orders"></span></a>
                        <a id="myaccount_myfavorites" href="<?= Yii::$service->url->getUrl('customer/productfavorite') ?>" rel="nofollow"><?= Yii::$service->page->translate->__('My Favorites'); ?><span id="myaccount_num_orders"></span></a>
                    </ul>
                </div>
            </div>
            <div class="hd_wr_f_help">
                <div class="hd_wr_nav"><a href="support/support.html">Help</a>
                    <ul>
                        <a href="<?= Yii::$service->url->getUrl('help') ?>">Help Center</a>
                        <a href="<?= Yii::$service->url->getUrl('freed back') ?>">Feed Back</a>
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
    <div class="hd_pop_kw">
        <?php
            $keywords = Yii::$service->product->keywords->getKeywordsList(1);
            foreach($keywords as $v):
        ?>
          <a href="<?php if(isset($v['url']) && !empty($v['url'])) echo $v['url'];else echo  Yii::$service->url->getUrl('catalogsearch/index?q='.$v['keywords']);?>"><?= $v['keywords'];?></a>
        <?php endforeach;?>
    </div>
    <div class="clear">
    </div>
