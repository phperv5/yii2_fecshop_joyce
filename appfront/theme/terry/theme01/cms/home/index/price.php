<div class="hm_progrd_price">
    <?php if(isset($special_price) && !empty($special_price)):  ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="">
        <?= $special_price['symbol'] ?><?= $special_price['value'] ?>
    </span>
    <span class="pro_pri_curr_sale" name="cc_v_USD" style="display:"><strong><?= $price['symbol'] ?><?= $price['value'] ?></strong></span>
    <?php else: ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:">
        <?= $price['symbol'] ?><?= $price['value'] ?>
        </span>
    <?php endif; ?>
</div>
