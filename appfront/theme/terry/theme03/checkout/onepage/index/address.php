<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<?php  $address_list = $parentThis['address_list'];   ?>
<?php  $cart_address_id = $parentThis['cart_address_id'];   ?>
<?php  $country_select = $parentThis['country_select'];   ?>
<?php  $state_html = $parentThis['state_html'];   ?>
<?php  $cart_address = $parentThis['cart_address'];   ?>
<div class="scene" id="ar_os_shippingAddress" style="display:">
    Your shipping address is null, please <a href="<?= Yii::$service->url->getUrl('customer/address/edit') ?>"><b class="px14">Add Your Shipping Address</b></a>.
</div>