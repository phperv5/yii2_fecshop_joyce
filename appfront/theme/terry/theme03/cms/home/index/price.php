<div class="hm_progrd_price">
    <?php if(isset($special_price) && !empty($special_price)):  ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:">
        <?= $special_price['symbol'] ?><?= $special_price['value'] ?>
    </span>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:">
        <del></del><?= $price['symbol'] ?><?= $price['value'] ?></del>
    </span>
    <?php else: ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:">
        <?= $price['symbol'] ?><?= $price['value'] ?>
        </span>
    <?php endif; ?>
</div>
