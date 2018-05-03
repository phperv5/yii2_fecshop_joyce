<?php
use fecshop\app\appfront\helper\Format;
?>
<?php  $cart_info = $parentThis['cart_info'];   ?>
<?php  $currency_info = $parentThis['currency_info'];   ?>
<?php  if(is_array( $cart_info) && !empty( $cart_info)): ?>
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
            <span class="px12">Ship to: <b class="blue px12"><?= $cart_info['shipping_country'] ?></b>.</span>
            <input type="button" name="ContinueOrder" value="Back to Modify" class="btn" onclick="window.location.href='<?= Yii::$service->url->getUrl('checkout/cart') ?>';">&nbsp;&nbsp;
    </tr>
<?php endif; ?>