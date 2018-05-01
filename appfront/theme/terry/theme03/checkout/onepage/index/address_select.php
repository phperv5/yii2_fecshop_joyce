<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<?php $address_list = $parentThis['address_list']; ?>
<?php $address_select = $parentThis['address_select']; ?>
<?php $cart_address_id = $parentThis['cart_address_id']; ?>
<?php $country_select = $parentThis['country_select']; ?>
<?php $state_html = $parentThis['state_html']; ?>
<?php $cart_address = $parentThis['cart_address']; ?>

<!--地址列表-->
<input type="hidden" name="address_id" class="address_id" value="<?= $address_select['address_id'] ?>">

<div class="scene px13 line15em" id="ar_os_shippingAddress"
     <?php if (!$address_select): ?>style="display: none;"<?php endif; ?>>
    <div class="float_right"><a href="javascript:void(0);" class="change"><b class="px11">Change</b></a></div>
    Receiver: <span class="cur_address"><?= $address_select['first_name'] ?>&nbsp;<?= $address_select['first_name'] ?>
        <br>
        <?= $address_select['street1'] ?><br>
        <?php if ($address_select['street2']): ?>
            <?= $address_select['street2'] ?><br>
        <?php endif; ?>
        <?= $address_select['city'] ?>, <?= $address_select['state'] ?>, <?= $address_select['country'] ?><br>
        <?= $address_select['zip'] ?><br>
            Phone: <?= $address_select['telephone'] ?><br></span>
    <div class="blank10px"></div>
</div>
<!--地址列表-->
<div class="scene" id="shippingAddress_select" <?php if ($address_select): ?>style="display: none;"<?php endif; ?>>
    <div class="fr"><a href="javascript:void(0);"
                       onclick="javascript:window.location.href='<?= Yii::$service->url->getUrl('customer/address/edit') ?>'"><strong><img
                        src="<?= Yii::$service->image->getImgUrl('images/ico/edit.gif'); ?>" hspace="3" border="0">Entera
                New Address</strong></a></div>
    <strong class="verdana">Please Choose Your Shipping Address</strong>
    <div class="dashed5px"></div>
    <?php if (is_array($address_list) && !empty($address_list)): ?>
        <?php
        $n = 0;
        foreach ($address_list as $address_id => $one):
            $n++;
            ?>
            <div class="pos_addr_off" id="areaAddS295224" onmouseover="this.className='pos_addr_on';" onmouseout="this.className='pos_addr_off';">
                <div class="clear"></div>
                <div class="fr"></div>
                <div class="address-data">
                    <div class="pos_addr_lt">
                        <strong class="red_dark">Shipping Address #<?php echo $n; ?></strong>
                        <div class="blank5px"></div>
                        <span class="select_address">
                    <?= $one['first_name'] ?>&nbsp;<?= $one['first_name'] ?><br>
                            <?= $one['street1'] ?><br>
                            <?php if ($one['street2']): ?>
                                <?= $one['street2'] ?><br>
                            <?php endif; ?>
                            <?= $one['city'] ?>, <?= $one['state'] ?>, <?= $one['country'] ?><br>
                            <?= $one['zip'] ?><br>
                    Phone: <?= $one['telephone'] ?><br>
                    </span>
                        <div class="clear"></div>
                    </div>
                    <div class="pos_addr_slt">
                        <br><br><br>
                        <input type="button" class="btn_submit btn_mid choose_address" value="Ship to this address"
                               address_id="<?= $one['address_id'] ?>"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="dashed5px"></div>

        <?php endforeach; ?>
    <?php endif; ?>
    <span class="px11">- If you confirmed payment online and your shipping address, the system will automatically redirect you.</span>
</div>
</div>


