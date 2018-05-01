<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<p class="proPrice">
	<?php if(isset($special_price) && !empty($special_price)):  ?>
		<span class="bizhong pro_pri_curr_vip_s"><?= $special_price['code'] ?></span>
        <span orgp="<?= $special_price['value'] ?>" class="my_shop_price f14">
            <span class="icon"><?= $special_price['symbol'] ?></span><?= $special_price['value'] ?>
        </span>
		<span class="bizhong pro_pri_curr_vip_s">
            <?= $price['code'] ?></span>
	<?php else: ?>
		<span class="bizhong pro_pri_curr_vip_s"><?= $price['code'] ?></span><span orgp="<?= $price['value'] ?>" class="my_shop_price f14"><span class="icon"><?= $price['symbol'] ?></span><?= $price['value'] ?></span>
	<?php endif; ?>

<div class="hm_progrd_price" id="ProPriDisp_h_dp_51561">
    <?php if(isset($special_price) && !empty($special_price)):  ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:"><?= $special_price['symbol'] ?></span><?= $special_price['value'] ?></span>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:"><del orgp="<?= $price['value'] ?>" class="my_shop_price"><span class="icon"><?= $price['symbol'] ?></span><?= $price['value'] ?></del></span>
    <?php else: ?>
    <span class="pro_pri_curr_vip_s" name="cc_v_USD" style="display:"><?= $price['symbol'] ?></span><?= $price['value'] ?></span>
    <?php endif; ?>
</div>
</p>