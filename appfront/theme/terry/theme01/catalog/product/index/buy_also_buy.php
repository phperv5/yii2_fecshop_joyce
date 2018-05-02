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
                <a href="<?= $product['url'] ?>" title="<?= $product['name'] ?>"><img src="<?= Yii::$service->product->image->getResize($product['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $product['name'] ?>" align="absmiddle"></a></div>
            <div class="brief_fs_suit">
                <div class="title"><a href="<?= $product['url'] ?>" target="_blank" title="<?= $product['name'] ?>"><?= $product['name'] ?></a></div>
                <b class="px11 gray">(Item No.<?= $product['sku'] ?>)</b><br>
                <?= $product['short_description']; ?>
                <a href="<?= $product['url'] ?>" target="_blank"><span>More Details »</span></a>
                <div class="blank10px"></div>
                <!-- 　<img src="/images/ico/freeshipping.gif" border="0" align="absmiddle" alt="Free Shipping"> -->
                <div class="clear"></div>
            </div>
            <div class="order_fun_suit">
                            <?php
                            $config = [
                                'class' => 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                                'view' => 'catalog/category/price.php',
                                'price' => $product['price'],
                                'special_price' => $product['special_price'],
                                'special_from' => $product['special_from'],
                                'special_to' => $product['special_to'],
                            ];
                            echo Yii::$service->page->widget->renderContent('category_product_price', $config);
                            ?>
                <div class="blank10px"></div><span class="pro_b_item" id="id_pro_b_item_oQty_suit_48455"><b>Quantity: </b><input name="oQty_suit_48455" type="text" class="input" id="oQty_suit_48455" size="4" maxlength="6" onkeypress="event.returnValue=IsDigit();" value="1" onkeyup="ProQtySubTotal(this,'1','439.00','txt_single_subtotal_suit_48455');IsOrderNeedQty('Y','oQty_suit_48455');"><span class="px12"></span>　<b><span id="alert_o_need_oQty_suit_48455" class="alert"></span></b>　</span><span id="txt_single_subtotal_suit_48455" class="txt_subt_m"></span>
                <div class="blank5px"></div>
                <input name="add_to_cart" type="button" class="btn_addtocart_s" value="" title="Add to Cart" onclick="javascript:addProductToCart('<?= $product['product_id'] ?>');return false;"/>
                <div class="clear"></div></div>
            <div class="clear"></div>
        </div>
        <?php  endforeach;  ?>
        <div class="blank5px"></div>
    </fieldset>
</div>
<?php  endif;  ?>