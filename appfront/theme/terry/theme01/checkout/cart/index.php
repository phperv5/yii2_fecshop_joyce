<?php
use fecshop\app\appfront\helper\Format;

?>
<div class="main">
    <div class="page_where_l"><a href="../">Home</a> - Shopping Cart</div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="exh_full_top"></div>
    <div class="exh_full_main">
        <h1>Shopping Cart</h1>
        <div class="blank10px"></div>
        <?php if (!empty($cart_info['products'])) { ?>
            <table class="tab_comm" id="#shopping-cart-table">
                <tr class="tr_head">
                    <td width="120">&nbsp;</td>
                    <td>Product Name</td>
                    <td width="100">Unit Price</td>
                    <td width="100">Qty.</td>
                    <td width="100">Subtotal</td>
                </tr>
                <?php foreach ($cart_info['products'] as $product_one): ?>
                    <tr class="tr_info">
                        <td>
                            <div class="img100px"><a href="<?= $product_one['url'] ?>"
                                                     title="<?= $product_one['name'] ?>" target="_blank">
                                    <img src="<?= Yii::$service->product->image->getResize($product_one['image'], [100, 100], false) ?>"
                                         width="100" height="100" border="0" hspace="0" vspace="0"
                                         alt="<?= $product_one['name'] ?>" align="absmiddle"/></a>
                            </div>
                        </td>
                        <td class="align_left gray">
                            <a href="<?= $product_one['url'] ?>"><span
                                        class="px13"><?= $product_one['name'] ?></span></a>
                            <div class="blank10px"></div>
                            Item No.<?= $product_one['sku'] ?>
                            <div class="blank10px"></div>
                            <a href="javascript:void(0)" rel="<?= $product_one['item_id']; ?>" title="Remove item"
                               class="btn-remove btn-remove2"><?= Yii::$service->page->translate->__('Remove item'); ?></a>
                        </td>
                        <td><?= $currency_info['symbol']; ?><?= Format::price($product_one['product_price']); ?></td>
                        <td>
                            <div class="amount-wrapper">
                                <div class="item-amount">
                                    <a href="javascript:void(0)" class="J_Minus minus cartdown"
                                       rel="<?= $product_one['item_id']; ?>" num="<?= $product_one['qty']; ?>"
                                       style="display: block;height: 23px;width: 17px;border: 1px solid #e5e5e5;background: #f0f0f0;text-align: center;line-height: 23px;color: #444;float: left">-</a>
                                    <input type="text" rel="<?= $product_one['item_id']; ?>"
                                           value="<?= $product_one['qty']; ?>" class="text text-amount J_ItemAmount"
                                           maxlength="12" autocomplete="off"
                                           style="width: 39px;  height: 15px;  line-height: 15px;  border: 1px solid #aaa;  color: #343434;  text-align: center;  padding: 4px 0;  background-color: #fff;float: left">
                                    <a href="javascript:void(0)" class="J_Plus plus cartup"
                                       rel="<?= $product_one['item_id']; ?>" num="<?= $product_one['qty']; ?>"
                                       style="display: block;height: 23px;width: 17px;border: 1px solid #e5e5e5;background: #f0f0f0;text-align: center;line-height: 23px;color: #444;float: left">+</a>
                                </div>
                                <div class="amount-msg J_AmountMsg"></div>
                            </div>
                        </td>
                        <td>
                            <b><?= $currency_info['symbol']; ?><?= Format::price($product_one['product_row_price']); ?></b>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr class="tr_info" id="trShipToCountryChoose">
                    <td colspan="5" class="align_right px11">
                            <span id="v_h_country_select" style="">
                            Ship my order(s) to:
                            <select name="shipping_country" id="oShipCountry" class="input">
                                <option value="">please select your country or region</option>
                                <?php foreach ($country as $code => $c) { ?>
                                    <option value="<?= $code; ?>" <?php if ($cart_info['shipping_country'] == $code) echo 'selected'; ?>><?= $c; ?></option>
                                <?php } ?>
                            </select>
                            </span>
                    </td>
                </tr>
                <tr class="tr_info">
                    <td colspan="5" class="align_right px11">
                            <span>
                                <select name="shipping_method" id="oShipMethod" class="input">
                                          <option value="">select shipping method</option>
                                    <?php foreach ($allShipMethod as $k => $v) { ?>
                                        <option value="<?= $k; ?>" <?php if ($cart_info['shipping_method'] == $k) echo 'selected'; ?>><?= $v['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </span>
                    </td>
                </tr>

                <tr class="tr_info">
                    <td colspan="5" class="align_right verdana line18em">
                        <b>Items Total: <span
                                    class="red_dark"><?= $currency_info['symbol']; ?><?= Format::price($cart_info['product_total']); ?></span></b>&nbsp;&nbsp;&nbsp;
                        <b>
                            <?php if (empty($cart_info['shipping_cost'])) { ?>
                                <span class="green">Free Shipping</span>
                                </span>
                            <?php } else { ?>
                                <b>Shipping Cost:<span
                                            class="red_dark"><?= $currency_info['symbol']; ?><?= Format::price($cart_info['shipping_cost']); ?></span></b>
                            <?php } ?>
                        </b>
                        <br/>
                        <b class="red px16">Total
                            Sum:<?= $currency_info['symbol']; ?><?= Format::price($cart_info['grand_total']) ?></b>
                    </td>
                </tr>
                <tr class="tr_info">
                    <td colspan="5" class="align_right">
                        <span id="v_apply_couponcode" style="display:"><strong>Coupon Code: </strong>
							<input type="hidden" class="couponType" value="<?= $cart_info['coupon_code'] ? 1 : 2; ?>"/>
							<input type="text" style="width:80px; height:18px; margin-top:10px;" id="coupon_code"
                                   name="coupon_code" value="<?= $cart_info['coupon_code']; ?>">
                            <a href="javascript:void(0)"
                               class="btn_near"><span><span><?= Yii::$service->page->translate->__($cart_info['coupon_code'] ? 'Cancel Coupon' : 'Apply'); ?></span></span> </a>
                        </span>
                    </td>
                </tr>
            </table>
            <div class="blank10px"></div>
            <div class="fl" style="margin-top:10px;">
                <input name="Continue_Shopping" type="button" class="btn_near btn_mid" value="Continue Shopping"
                       onclick="javascript:window.location.href='/';return false;">
            </div>
            <div class="float_right" style="margin-top:10px;">
                <input name="Proceed_to_Checkout" type="button" class="btn_near btn_mid" value="Proceed to Checkout">
            </div>

            <div class="blank10px"></div>
            <div class="blank10px"></div>
            <div class="blank10px"></div>
            <br/>
            <p style="text-align:justify"><span style="color:#993300"><strong>Continue Shopping:</strong></span>&nbsp;Please
                click <strong>Continue Shopping</strong>&nbsp;if you have not finish your order. And your present order&nbsp;will
                not be cleared.<br/>
                <span style="color:#993300"><strong>Check out with PayPal:</strong></span> If you&nbsp;wanna&nbsp;finish
                your&nbsp;order, click this button&nbsp;and&nbsp;<strong>You will be taken directly to PayPal to Check
                    out</strong>.&nbsp;It is <strong>easy, safe and secure</strong>.<br/>
                <span style="color:#993300"><strong>Proceed to Checkout:&nbsp;</strong></span>If you are our membership
                or you want to <strong>check out with Western Union or Bank Transfer</strong>, click this button to
                finish your order.<br/>
                <span style="color:#993300"><strong>Coupon Code:</strong></span> If you&nbsp;wanna use&nbsp;<strong>Coupon
                    Code for Discounts</strong>, please input it into&nbsp;coupon code text field and <strong>click
                    &quot;Apply&quot; button</strong>. <a href="/info/how-to-use-coupon-code-2391.html">How to&nbsp;use
                    coupon code? click here.</a><br/>
                <br/>
                <br/>
                <br/>
                &nbsp;</p>
        <?php } else { ?>
            <div class="align_center px22 red_dark"><br><br><br><br>Your shopping cart is empty.<br><br><br><br></div>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
<script>
    // add to cart js
    <?php $this->beginBlock('changeCartInfo') ?>
    $(document).ready(function () {
        currentUrl = "<?= Yii::$service->url->getUrl('checkout/cart') ?>"
        updateCartInfoUrl = "<?= Yii::$service->url->getUrl('checkout/cart/updateinfo') ?>"

        $("[name='Proceed_to_Checkout']").click(function () {
            var _value = $('#oShipMethod').val();
            if (!_value) {
                alert('Please select shipping method')
                return false;
            }
            location.href = "<?= Yii::$service->url->getUrl('checkout/onepage'); ?>";
        })

        $(".cartdown").click(function () {
            $item_id = $(this).attr("rel");
            num = $(this).attr("num");
            if (num > 1) {
                $data = {
                    item_id: $item_id,
                    up_type: "less_one"
                };
                jQuery.ajax({
                    async: true,
                    timeout: 6000,
                    dataType: 'json',
                    type: 'get',
                    data: $data,
                    url: updateCartInfoUrl,
                    success: function (data, textStatus) {
                        if (data.status == 'success') {
                            window.location.href = currentUrl;
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    }
                });
            }
        });

        $(".cartup").click(function () {
            $item_id = $(this).attr("rel");
            $data = {
                item_id: $item_id,
                up_type: "add_one"
            };
            jQuery.ajax({
                async: true,
                timeout: 6000,
                dataType: 'json',
                type: 'get',
                data: $data,
                url: updateCartInfoUrl,
                success: function (data, textStatus) {
                    if (data.status == 'success') {
                        window.location.href = currentUrl;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });

        });

        $(".btn-remove").click(function () {
            $item_id = $(this).attr("rel");

            $data = {
                item_id: $item_id,
                up_type: "remove"
            };
            jQuery.ajax({
                async: true,
                timeout: 6000,
                dataType: 'json',
                type: 'get',
                data: $data,
                url: updateCartInfoUrl,
                success: function (data, textStatus) {
                    if (data.status == 'success') {
                        window.location.href = currentUrl;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });

        });

        $(".add_coupon_submit").click(function () {
            coupon_code = $("#coupon_code").val();
            coupon_type = $(".couponType").val();
            coupon_url = "";
            if (coupon_type == 2) {
                coupon_url = "<?=  Yii::$service->url->getUrl('checkout/cart/addcoupon'); ?>";
            } else if (coupon_type == 1) {
                coupon_url = "<?=  Yii::$service->url->getUrl('checkout/cart/cancelcoupon'); ?>";
            }
            if (!coupon_code) {
                alert("coupon can not empty!");
            }
            //coupon_url = $("#discount-coupon-form").attr("action");
            jQuery.ajax({
                async: true,
                timeout: 6000,
                dataType: 'json',
                type: 'post',
                data: {"coupon_code": coupon_code},
                url: coupon_url,
                success: function (data, textStatus) {
                    if (data.status == 'success') {
                        window.location.href = currentUrl;
                    } else if (data.content == 'nologin') {
                        window.location.href = "<?=  Yii::$service->url->getUrl('customer/account/login'); ?>";
                    } else {
                        $(".coupon_add_log").html(data.content);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });
        });

        //修改发货国家
        $('#oShipCountry').change(function () {
            var shipping_country = $(this).val();
            jQuery.ajax({
                async: true,
                timeout: 6000,
                dataType: 'json',
                type: 'post',
                data: {"shipping_country": shipping_country},
                url: "<?= Yii::$service->url->getUrl('checkout/cart/updateshipping') ?>",
                success: function (data, textStatus) {
                    if (data.status == 'success') {
                        window.location.href = currentUrl;
                    } else if (data.content == 'nologin') {
                        window.location.href = "<?=  Yii::$service->url->getUrl('customer/account/login'); ?>";
                    } else {
                        $(".coupon_add_log").html(data.content);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });
        })
        //修改发货方式
        $('#oShipMethod').change(function () {
            var oShipMethod = $(this).val();
            jQuery.ajax({
                async: true,
                timeout: 6000,
                dataType: 'json',
                type: 'post',
                data: {"shipping_method": oShipMethod},
                url: "<?= Yii::$service->url->getUrl('checkout/cart/updateshippingmethod') ?>",
                success: function (data, textStatus) {
                    if (data.status == 'success') {
                        window.location.href = currentUrl;
                    } else if (data.content == 'nologin') {
                        window.location.href = "<?=  Yii::$service->url->getUrl('customer/account/login'); ?>";
                    } else {
                        $(".coupon_add_log").html(data.content);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });
        })
    });

    <?php $this->endBlock(); ?>
    <?php $this->registerJs($this->blocks['changeCartInfo'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>
</script>