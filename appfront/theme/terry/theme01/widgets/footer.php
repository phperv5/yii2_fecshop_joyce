<div class="ft_wrapper">
    <div class="ft_ext">
        <div style="background: rgb(250, 250, 250); margin: 0px; padding: 20px; clear: both; border-top-color: rgb(230, 230, 230); border-bottom-color: rgb(220, 220, 220); border-top-width: 2px; border-bottom-width: 1px; border-top-style: solid; border-bottom-style: solid;">
            <div style="width: 25%; float: left;"><strong>Shipment &amp; Payment</strong>
                <ul>
                    <li><a href="<?=  Yii::$service->url->getUrl('how-we-ship-the-item-to-you') ?>" rel="nofollow" target="_blank">Delivery
                            Options </a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('how-about-your-delivery-cost') ?>" rel="nofollow" target="_blank">Delivery
                            Cost </a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('customs-clearance-import-duty') ?>" rel="nofollow">Customs &amp; Import Tax</a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('payment') ?>" rel="nofollow">Payment</a></li>
                </ul>
            </div>

            <div style="width: 25%; float: left;"><strong>Return Information</strong>

                <ul>
                    <li><a href="<?=  Yii::$service->url->getUrl('return-policy') ?>" rel="nofollow" target="_blank">Return & Refund Policy</a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('products-warranty') ?>" rel="nofollow" target="_blank">Products Warranty</a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('privacy-policy') ?>" rel="nofollow">Privacy Policy</a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('after-sale-service') ?>" rel="nofollow">After-sale service</a></li>
                </ul>
            </div>

            <div style="width: 25%; float: left;"><strong>Customer Service</strong>

                <ul>
                    <li><a href="<?=  Yii::$service->url->getUrl('about-us') ?>" rel="nofollow">About us</a></li>
                    <li><a href="<?=  Yii::$service->url->getUrl('contact-us') ?>" rel="nofollow" target="_blank">Help & Contact us</a></li>
                </ul>
            </div>

            <div style="width: 25%; float: left;">Join Our Community<br/>
                <?=  Yii::$service->cms->staticblock->getStoreContentByIdentify('join_our_community','appfront') ?>
            </div>

            <div class="clear">&nbsp;</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
        <div class="ft_menu">
            <a href="/">Home</a>
            <span>|</span> <a href="<?=  Yii::$service->url->getUrl('contact-us') ?>">Help & Contact us</a> <span>|</span>
            <a href="<?=  Yii::$service->url->getUrl('payment') ?>">Payment</a>
            <span>|</span> <a href="<?=  Yii::$service->url->getUrl('about-us') ?>">About us</a> <span>|</span>
            <a href="<?=  Yii::$service->url->getUrl('return-policy') ?>">Return & Refund Policy</a> <span>
        <div class="blank10px"></div>
        <div class="align_center">
            <div class="blank5px"></div>
            <?=  Yii::$service->cms->staticblock->getStoreContentByIdentify('copy_right_img','appfront') ?>
            <div class="blank5px"></div>
        </div>
        <div class="ft_copyright">
            <?=  Yii::$service->cms->staticblock->getStoreContentByIdentify('copy_right','appfront') ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
