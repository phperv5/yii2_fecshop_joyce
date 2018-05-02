<?php
use fecshop\app\appfront\helper\Format;
?>
<div class="main">
    <div class="page_where_l"><a href="../">Home</a> - Check Out for Order</div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="exh_full_top"></div>
    <form action="<?= Yii::$service->url->getUrl('checkout/onepage/orderpay'); ?>" method="post" id="onestepcheckout-form">
        <?= \fec\helpers\CRequest::getCsrfInputHtml(); ?>
        <input type="hidden" id="s_method_flatrate_flatrate2" name="order_id" value="<?= $cart_info['order_id'] ?>" class="validate-one-required-by-name">
        <div class="exh_full_main">
            <h1>Check Out for Order:&nbsp;&nbsp;<span class="px14 black">Serial No.<?= $cart_info['increment_id'] ?></span></h1>
            <div class="blank10px"></div>
            <span id="sRtnGetOrderFormStatus"></span>
            <div class="blank10px"></div>
            <div class="p_order_step">
                <div class="o_stp_s_off" id="m_os_shippingcart" onclick="javascript:AreaShowHide('ar_os_shippingcart');OrderStepCSSswitch('m_os_shippingcart');" style="cursor:pointer"><span class="sn">1</span> &nbsp;Order Details
                </div>
                <div class="scene_nopadding" id="ar_os_shippingcart" style="display:">
                    <table class="tab_comm">
                        <tr class="tr_head">
                            <td width="110">&nbsp;</td>
                            <td>Product Name</td>
                            <td width="100">Unit Price</td>
                            <td width="100">Qty.</td>
                            <td width="100">Subtotal</td>
                        </tr>
                        <?php  if(is_array($cart_info) && !empty($cart_info)): ?>
                            <?php  $products = $cart_info['products'];?>
                            <?php foreach($products as $product): ?>
                                <tr class="tr_info">
                                    <td>
                                        <div class="img90px">
                                            <a href="<?= $product['url'] ?>" title="<?= $product['name'] ?>" target="_blank">
                                                <img src="<?= Yii::$service->product->image->getResize($product['image'],[100,100],false) ?>" width="90" height="90" border="0" hspace="0" vspace="0" alt="<?= $product['name'] ?>" align="absmiddle">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align_left gray">
                                        <a href="<?= $product['url'] ?>" target="_blank"><span class="px13"><?= $product['name'] ?></span></a>
                                        <div class="blank10px"></div>
                                        <span class="gray px12">Item No.<?= $product['sku'] ?></span>

                                    </td>
                                    <td><?=  $currency_info['symbol'];  ?><?= Format::price($product['product_price']); ?></td>
                                    <td><?= $product['qty']; ?></td>
                                    <td><b><?=  $currency_info['symbol'];  ?><?= Format::price($product['product_row_price']); ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="tr_info">
                                <td>&nbsp;</td>
                                <td colspan="5" class="align_right verdana line18em">
                                    <b>Items Total: <span class="red_dark"><?=  $currency_info['symbol'];  ?><?= Format::price($cart_info['product_total']); ?></span></b>&nbsp;&nbsp;&nbsp;
                                    <b>
                                        <?php if (empty($cart_info['shipping_cost'])) { ?>
                                            <span class="green">Free Shipping</span>
                                            </span>
                                        <?php } else { ?>
                                            <b>Shipping Cost:<span class="red_dark"><?= $currency_info['symbol']; ?><?= Format::price($cart_info['shipping_cost']); ?></span></b>
                                        <?php } ?>
                                    </b>
                                    <br>
                                    <b class="red px16">Total Sum:<?=  $currency_info['symbol'];  ?><?= Format::price($cart_info['grand_total']) ?></b>
                                    <div class="blank10px"></div>
                                    <span class="px12">Ship to: <b class="blue px12"><?= $cart_info['customer_address_country'] ?></b>.</span>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
            <div class="p_order_step">
                <div class="o_stp_s_off" id="m_os_paymentMethod" onclick="javascript:AreaShowHide('ar_os_paymentMethod');OrderStepCSSswitch('m_os_paymentMethod');" style="cursor:pointer"><span class="sn">2</span> &nbsp;You Choosed Payment Method</div>
                <div class="scene" id="ar_os_paymentMethod" style=""><b><?= $cart_info['payment_method'] ?></b></div>
                <div class="clear"></div>
            </div>
            <div class="p_order_step">
                <div class="o_stp_s_off" id="m_os_shippingAddress" onclick="javascript:AreaShowHide('ar_os_shippingAddress');OrderStepCSSswitch('m_os_shippingAddress');" style="cursor:pointer">
                    <span class="sn">3</span> &nbsp;Shipping Address
                </div>
                <div class="scene px13 line15em" id="ar_os_shippingAddress">
                       Receiver: <span class="cur_address"><?= $cart_info['customer_firstname'] ?>&nbsp;<?= $cart_info['customer_lastname'] ?>
                        <br>
                        <?= $cart_info['customer_address_street1'] ?><br>
                        <?php if ($cart_info['customer_address_street2']): ?>
                            <?= $cart_info['customer_address_street2'] ?><br>
                        <?php endif; ?>
                        <?= $cart_info['customer_address_city'] ?>, <?= $cart_info['customer_address_state'] ?>, <?= $cart_info['customer_address_country'] ?><br>
                        <?= $cart_info['customer_address_zip'] ?><br>
                         Phone: <?= $cart_info['customer_telephone'] ?><br></span>
                    <div class="blank10px"></div>
                </div>
                <div class="clear"></div>

            </div>
            <div class="p_order_step">
                    <div class="o_stp_s_off"><span class="sn">3</span> &nbsp;Checkout and Payment Details</div>
                    <div class="scene">
                        <div class="blank5px"></div>
                        <label for="PayPalECS">
                            <input name="payment_method" type="radio" id="PayPalECS" value="paypal_standard" <?php if($cart_info['payment_method'] == 'paypal_standard'):?> checked  <?php endif;?> onclick="javascript:AreaMultiShowHide('area_pay_method_exp_',3,1);">
                            <img src="<?= Yii::$service->image->getImgUrl('images/pay/PayPal_mark_60x38.gif'); ?>" alt="PayPalECS" border="0" align="absmiddle"/>&nbsp;&nbsp;
                            <b class="px13 verdana">PayPal Express Checkout<span class=gray>the safer, easier way to pay.</span></b>
                        </label>

                        <div class="blank5px"></div>
                        <div <?php if($cart_info['payment_method'] != 'paypal_standard'): ?> style="display: none;" <?php endif;?> class="pay_ex_a" id="area_pay_method_exp_1">
                            <img align="right" alt="" border="0" hspace="5" src="<?= Yii::$service->image->getImgUrl('images/pay/pay_remark_paypal.gif'); ?>">If you have PayPal account, you can pay your order by your PayPal account.<br>
                            If you don't have PayPal account, it doesn't matter. You firstly charge your Paypal with you credit card or bank debit card , then also pay via PayPal.<br>
                            Payment can be submitted in any currency.&nbsp;<br>
                            Our PayPal account is: <b style="font-size: 18px;">carkeyunlock@gmail.com</b>
                            <div class="blank10px"></div>
                            <input name="" type="image" class="ipt_img onestepcheckout-button" src="<?= Yii::$service->image->getImgUrl('images/pay/pp-checkout-logo-large.png'); ?>" alt="Check out with PayPal" id="onestepcheckout-place-order">
                        </div>
                        <div class="dashed_line"></div>
                        <div class="blank5px"></div>
                        <div class="blank5px"></div>

                        <label for="Western Union">
                            <input name="payment_method" type="radio" id="Western Union" value="WesternUnion" <?php if($cart_info['payment_method'] == 'WesternUnion'): ?> checked <?php endif;?>  onclick="javascript:AreaMultiShowHide('area_pay_method_exp_',3,2);">
                            <img src="<?= Yii::$service->image->getImgUrl('images/pay/ico_western_union.gif'); ?>"   alt="Western Union" border="0" align="absmiddle">&nbsp;&nbsp;<b class="px13 verdana">Western Union</b>
                        </label>
                        <div class="blank5px"></div>
                        <div <?php if($cart_info['payment_method'] != 'WesternUnion'): ?> style="display: none;" <?php endif;?> class="pay_ex_a" id="area_pay_method_exp_2">
                            <p>
                                <strong>First Name: LEI<br>Last Name : CUI</strong><br>
                                <strong>City: SHENZHEN</strong><br>
                                <strong>Country:CHINA</strong><br>
                                <strong>Postal Code:518000</strong><br>
                                <strong>Tel: +8618617061230</strong><br>
                            </p>
                            <p>
                                Note: for easy and quick confirmation of your payment, please do not fix the exchange rate of money.
                                When you pay it, send the billing full information to company email box <b style="font-size: 18px;">carkeyunlock@gmail.com</b>
                                We will check it soon, and arrange your order as soon as possible.
                            </p>
                        </div>
                        <div class="dashed_line"></div>
                        <div class="blank5px"></div>
                        <div class="blank5px"></div>

                        <label for="MoneyGram">
                            <input name="payment_method" type="radio" id="MoneyGram" value="MoneyGram"  <?php if($cart_info['payment_method'] == 'MoneyGram'): ?> checked <?php endif;?> onclick="javascript:AreaMultiShowHide('area_pay_method_exp_',3,3);">
                            <img src="<?= Yii::$service->image->getImgUrl('images/pay/MoneyGram.jpg'); ?>" style="width: 96px;" alt="MoneyGram" border="0" align="absmiddle">&nbsp;&nbsp;<b class="px13 verdana">MoneyGram</b>
                        </label>
                        <div class="blank5px"></div>
                        <div <?php if($cart_info['payment_method'] != 'MoneyGram'): ?> style="display: none;" <?php endif;?> class="pay_ex_a" id="area_pay_method_exp_3">
                            <div>
                                <strong>First Name: LEI<br>Last Name : CUI</strong><br>
                                <strong>City: SHENZHEN</strong><br>
                                <strong>Country:CHINA</strong><br>
                                <strong>Postal Code:518000</strong><br>
                                <strong>Tel: +8618617061230</strong><br>
                            </div>
                            <p>Note:for easy and quick confirmation of your payment, please do not fix the exchange rate of money.
                                When you pay it, send the billing full information to company email box carkeyunlock@gmail.com
                                We will check it soon, and arrange your order as soon as possible.
                            </p>
                        </div>
                        <div class="dashed_line"></div>
                        <div class="blank5px"></div>
                        <div class="clear"></div>
                    </div>
                    <?= Yii::$service->page->widget->render('flashmessage'); ?>
                    <div class="clear"></div>
                </div>

            <div class="exh_full_bottom"></div>
            <div class="clear"></div>
        </div>
    </form>
    <script>
        <?php $this->beginBlock('placeOrder') ?>
        $(document).ready(function () {

            //下单(这个部分未完成。)
            $("#onestepcheckout-place-order").click(function(){

                //payment
                payment_method = $("[name='payment_method'] checked").val();

                //alert(shipment_method);
                if(!payment_method){
                    $(".checkout-payment-method-load").after('<div style=""  class="validation-advice"><?= Yii::$service->page->translate->__('This is a required field.');?></div>');
                }

            });
        });
        <?php $this->endBlock(); ?>
        <?php $this->registerJs($this->blocks['placeOrder'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>

    </script>


