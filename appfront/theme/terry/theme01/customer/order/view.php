<?php
use fecshop\app\appfront\helper\Format;
?>
<div class="main">
    <?php
    $leftMenu = [
        'class' => 'fecshop\app\appfront\modules\Customer\block\LeftMenu',
        'view'	=> 'customer/leftmenu.php'
    ];
    ?>
    <?= Yii::$service->page->widget->render($leftMenu,$this); ?>
    <div class="main_scene">
        <div class="exh_top"></div>
        <div class="exh_main">
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="<?= $homeUrl ?>">Home</a> - <a href="<?= Yii::$service->url->getUrl('customer/order') ?>">My Account: <b class="red account-email"></b></a> - My Order Form: <b class="red"><?=  $increment_id ?></b></div><div class="blank5px"></div>
            <h1>My Order Form: S/N.<b class="red"><?=  $increment_id ?></b></h1>
            <div class="blank10px"></div>
            <div class="p_sub_a">Order Status</div>
            <table class="tab_comm">
                <tr class="tr_head">
                    <td width="180"><b>Status</b></td>
                    <td width="150"><b>Added Time</b></td>
                    <td><b>Comments</b></td>
                </tr>

                <tr class="tr_info">
                    <td><font color=#333><?= Yii::$service->page->translate->__($order_status);?></font></td>
                    <td class="px11 gray"><?=  date('Y-m-d H:i:s',$created_at); ?></td>
                    <td></td>
                </tr>

            </table>
            <div class="blank15px"></div>
            <div class="p_sub_a">Order Information</div>
            <div class="p_con_a">
                <?php if($order_status == 'Unpaid'):?>
                <div class="fr"><br /><input type="button" class="btn_submit btn_big" value="Pay for this Order" onclick="location.href='<?= Yii::$service->url->getUrl('checkout/onepage/orderdetail?order_id='.$order_id); ?>'" /></div>
                <?php endif;?>
                <span class="px11">Order Serial Number: </span><b class="blue_dark"><?=  $increment_id ?></b><br />
                <span class="px11">Order Date: </span><span class="px11 verdana"><?=  date('Y-m-d H:i:s',$created_at); ?></span><br />
                <span class="px11">Order Total Sum: </span><b class="red px14"><?= $currency_symbol ?><?= Format::price($grand_total); ?></b>
            </div>

            <table class="tab_comm">
                <tr class="tr_head">
                    <td width="110">&nbsp;</td>
                    <td>Product Name</td>
                    <td width="100">Unit Price</td>
                    <td width="100">Qty.</td>
                    <td width="100">Subtotal</td>
                </tr>
                <?php if(is_array($products) && !empty($products)):  ?>
                    <?php foreach($products as $product): ?>
                <tr class="tr_info">
                    <td><div class="img90px">
                            <a href="<?=  Yii::$service->url->getUrl($product['redirect_url']) ; ?>" title="<?= $product['name'] ?>">
                                <img src="<?= Yii::$service->product->image->getResize($product['image'],[100,100],false) ?>" width="90" height="90" border="0" hspace="0" vspace="0" alt="<?= $product['name'] ?>" align="absmiddle" />
                            </a></div>
                    </td>
                    <td class="align_left gray">
                        <a href="<?=  Yii::$service->url->getUrl($product['redirect_url']) ; ?>" target="_blank"><span class="px13"><?= $product['name'] ?></span></a>
                        <div class="blank10px"></div>
                        <span class="gray px12">Item No.<?= $product['sku'] ?></span>
                    </td>
                    <td><?= $currency_symbol ?><?= Format::price($product['price']); ?></td>
                    <td><?= $product['qty'] ?></td>
                    <td><b><?= $currency_symbol ?><?= Format::price($product['row_total']); ?></b></td>
                </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr class="tr_info">
                    <td colspan="5" class="align_right verdana px13 line18em">
                        Items Total: <span class="red_dark"><?= $currency_symbol ?><?=  Format::price($subtotal); ?></span>
                        <br />
                        <?= Yii::$service->page->translate->__('Shipping Cost');?>:
                        <span class="green"><?= $currency_symbol ?><?=  Format::price($shipping_total); ?></span>
                        <div class="blank10px"></div>
                        <b class="red px16" style="border-top:1px solid #CCCCCC; padding-top:5px; padding-left:20px;">
                            Total Sum:<?=  Format::price($grand_total); ?>
                        </b>
                        <div class="blank5px"></div>
                    </td>
                </tr>
            </table>
            <div class="p_con_a">
                <b class="green_dark">Your Shipping Address:</b><br />
                Receiver: <?=  $customer_firstname ?> <?=  $customer_lastname ?><br />
                <?=  $customer_address_street1 ?><br />
                <?php if($customer_address_street2):?><?=  $customer_address_street2 ?><br /><?php endif;?>
                <?=  $customer_address_city ?>,<?=  $customer_address_state_name ?>,<?=  $customer_address_country_name ?><br />
                Post Code: <?= $customer_address_zip ?><br />
                Phone: <?=  $customer_telephone ?><br />
                <div class="blank10px"></div>
            </div>
            <div class="blank15px"></div>
<!--            <div class="p_sub_a">Order Comments</div>-->
<!--            <div class="p_con_a">-->
<!--                <div class="blank10px"></div>-->
<!--                <div class="p_sub_a"><span class="red_dark"><img src="../images/ico/edit.gif" border="0" align="absmiddle" hspace="5" />Post a New Comment</span></div>-->
<!--                <div class="p_con_a">-->
<!--                    <form action="order_comment_app.asp" method="post" name="formAddOrderComment" onsubmit="return OrderCommentAddSim();">-->
<!--                        <textarea name="CommentMessage" cols="120" rows="6" id="CommentMessage" class="input"></textarea><span class="alert" id="txtOrderCommentMessage"></span>-->
<!--                        <div class="blank5px"></div>-->
<!--                        <input type="submit" name="Submit5" value="Submit" class="btn_submit">-->
<!--                        <input name="OrderID" type="hidden" value="416375">-->
<!--                        <input type="hidden" name="UserID" value="351041">-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="clear"></div>-->
<!--            </div>-->
            <div class="clear"></div>
        </div>
        <div class="exh_bottom"></div>
    </div>
    <div class="main_bottom"></div>
</div>






