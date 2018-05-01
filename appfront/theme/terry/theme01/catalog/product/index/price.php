<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<?php  $price_info = $parentThis['price_info'];   ?>
<?php if(isset($price_info['special_price']['value'])):  ?>
    <span class="pro_pri_tit_sale">Latest price:</span>
    <span class="pro_pri_curr_speical" name="cc_v_USD" style="display:"><strong><?= $price_info['price']['symbol']  ?><?= $price_info['price']['value'] ?></strong></span>
    <span class="pro_pri_tit_vip">Buy It Now:</span><span class="pro_pri_curr_vip" name="cc_v_USD" style="display:"><?= $price_info['special_price']['symbol']  ?><?= $price_info['special_price']['value'] ?></span>
<?php else:  ?>
	<div class="price no-special">
        <span class="pro_pri_tit_vip">Buy It Now:</span><span class="pro_pri_curr_vip" name="cc_v_USD" style="display:"><?= $price_info['price']['symbol']  ?><?= $price_info['price']['value'] ?></span>
	</div>
<?php endif; ?>