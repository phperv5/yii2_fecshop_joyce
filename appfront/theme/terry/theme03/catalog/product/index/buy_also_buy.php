<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<?php  if(is_array($parentThis['products']) && !empty($parentThis['products'])): ?>
<div class="w95per">
    <fieldset class="sec">
        <legend><b class="px14 red_dark">Buy more related tools and Save more!</b></legend>
        <?php foreach($parentThis['products'] as $product): ?>
        <div class="pro_list">
            <div class="photo"><div class="special"><img src="<?= Yii::$service->image->getImgUrl('images/lazyload1.gif','appfront') ; ?>" align="absmiddle" alt="Featured"></div>
                <a href="<?= $product['url'] ?>" title="<?= $product['name'] ?>"><img src="/upload/pro/obdstar-x300-pro3-new-180.jpg" width="120" height="120" border="0" hspace="0" vspace="0" alt="【Ship from US No Tax】OBDSTAR X300 PRO3 X-300 Key Master with Immobiliser + Odometer Adjustment +EEPROM/PIC+OBDII" align="absmiddle"></a></div>
            <div class="brief_fs_suit">
                <div class="title"><a href="<?= $product['url'] ?>" target="_blank" title="<?= $product['name'] ?>"><?= $product['name'] ?></a></div>
                <b class="px11 gray">(Item No.<?= $product['sku'] ?>)</b><br>
                X300 PRO3 key master by OBDSTAR Company features with the immobiliser key programming function of SKP900,as well as new function e.g. Odometer adjustment, EEPROM/PIC and OBDII.<br>Its design is fully based on industrial standard, for example, it is designed with bilateral keyboards which make it easy to operate, besides its appearance is processed by special material and reaches to the shockproof level.&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/wholesale/obdstar-x300-pro3-key-master-english-version.html" target="_blank"><span>More Details »</span></a>
                <div class="blank10px"></div>
                　<img src="/images/ico/freeshipping.gif" border="0" align="absmiddle" alt="Free Shipping">
                <div class="clear"></div>
            </div>
            <div class="order_fun_suit">
                <span class="pro_pri_tit_sale_s">Latest price:</span><span class="pro_pri_curr_sale_s" name="cc_v_USD" style="display:"><strong>$549.00</strong></span>
                <span class="pro_pri_curr_sale_s" name="cc_v_EUR" style="display:none;"><strong>€466.65</strong></span>
                <span class="pro_pri_curr_sale_s" name="cc_v_GBP" style="display:none;"><strong>£428.22</strong></span>
                <span class="pro_pri_curr_sale_s" name="cc_v_AUD" style="display:none;"><strong>AU$702.72</strong></span>
                <span class="pro_pri_curr_sale_s" name="cc_v_JPY" style="display:none;"><strong>¥60,939</strong></span>
                <span class="pro_pri_tit_vip_m">Buy It Now:</span><span class="pro_pri_curr_vip_m" name="cc_v_USD" style="display:">$439.00</span>
                <span class="pro_pri_curr_vip_m" name="cc_v_EUR" style="display:none;">€373.15</span>
                <span class="pro_pri_curr_vip_m" name="cc_v_GBP" style="display:none;">£342.42</span>
                <span class="pro_pri_curr_vip_m" name="cc_v_AUD" style="display:none;">AU$561.92</span>
                <span class="pro_pri_curr_vip_m" name="cc_v_JPY" style="display:none;">¥48,729</span>
                <span class="pro_pri_of_sr" name="cc_v_USD" style="display:">20% off</span>
                <span class="pro_pri_of_sr" name="cc_v_EUR" style="display:none;">20% off</span>
                <span class="pro_pri_of_sr" name="cc_v_GBP" style="display:none;">20% off</span>
                <span class="pro_pri_of_sr" name="cc_v_AUD" style="display:none;">20% off</span>
                <span class="pro_pri_of_sr" name="cc_v_JPY" style="display:none;">20% off</span>
                <div class="blank10px"></div><span class="pro_b_item" id="id_pro_b_item_oQty_suit_48455"><b>Quantity: </b><input name="oQty_suit_48455" type="text" class="input" id="oQty_suit_48455" size="4" maxlength="6" onkeypress="event.returnValue=IsDigit();" value="1" onkeyup="ProQtySubTotal(this,'1','439.00','txt_single_subtotal_suit_48455');IsOrderNeedQty('Y','oQty_suit_48455');"><span class="px12"></span>　<b><span id="alert_o_need_oQty_suit_48455" class="alert"></span></b>　</span><span id="txt_single_subtotal_suit_48455" class="txt_subt_m"></span>
                <div class="blank5px"></div><a href="javascript:void(0);" onclick="javascript:ShoppingCartAdd('48455','Single','N','oSize_suit_48455','N','oColor_suit_48455','Y','oQty_suit_48455');return false;" title="Add to Cart"><img src="/images/btn/add_to_cart_suit.gif" alt="Add to Cart" border="0" align="absmiddle"></a>
                <div class="clear"></div></div>
            <div class="clear"></div>
        </div>
        <?php  endforeach;  ?>
        <div class="blank5px"></div>
    </fieldset>
</div>
<?php  endif;  ?>