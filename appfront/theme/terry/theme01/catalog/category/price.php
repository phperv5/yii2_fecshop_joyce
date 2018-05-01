
<div class="order_fun px11">
    <div class="blank5px"></div>
    <?php if(isset($special_price) && !empty($special_price)):  ?>
    <span class="pro_pri_tit_sale_s">Latest price:</span><span class="pro_pri_curr_sale_s" name="" style="display:"><strong><?= $price['symbol'].$price['value'] ?></strong></span>
    <span class="pro_pri_tit_vip_m">Buy It Now:</span>
    <span class="pro_pri_curr_vip_m" name="" style="display:"><?= $special_price['symbol'].$special_price['value'] ?></span>
<!--    <span class="pro_pri_of_sr" name="" style="display:">20% off</span>-->
    <?php else: ?>
        <span class="pro_pri_tit_vip_m">Buy It Now:</span>
        <span class="pro_pri_curr_vip_m" name="" style="display:"><?= $price['symbol'].$price['value'] ?></span>
    <?php endif;  ?>
    <div class="blank5px"></div>
    <div class="dashed_line"></div>
    <div class="blank5px"></div>
    <div class="blank5px"></div>
    <input name="add_to_cart" type="button" class="btn_addtocart_s" value="" title="Add to Cart" onclick="javascript:ShoppingCartAdd();return false;"/>
</div>