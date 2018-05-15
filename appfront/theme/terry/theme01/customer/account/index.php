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
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="<?= $homeUrl ?>">Home</a> - <a href="<?= Yii::$service->url->getUrl('customer/order') ?>">My Account: <b class="red account-email"></b></a> - My Orders List</div><div class="blank5px"></div><h1>My Orders List</h1>

            <div class="blank10px"></div>

            <table class="tab_comm">
                <tr class="tr_head">
                    <td>Order No.</td>
                    <td>Total Sum</td>
                    <td>Date</td>
                    <td>Status(Last)</td>
                    <td>Last update</td>
                </tr>
                <?php  if(is_array($order_list) && !empty($order_list)):  ?>
                    <?php foreach($order_list as $order):
                        $currencyCode = $order['order_currency_code'];
                        $symbol = Yii::$service->page->currency->getSymbol($currencyCode);
                    ?>
                <tr class="tr_info">
                    <td class="px13 verdana"><a href="<?=  Yii::$service->url->getUrl('customer/order/view',['order_id' => $order['order_id']]);?>"><b><?= $order['increment_id'] ?></b></a></td>
                    <td><?= $symbol ?><?= $order['grand_total'] ?></td>
                    <td class="px11 gray"><?= date('Y-m-d H:i:s',$order['created_at']) ?></td>
                    <td><font color=#333><?= Yii::$service->page->translate->__($order['order_status']); ?></font></td>
                    <td class="px11 gray"><?= date('Y-m-d H:i:s',$order['updated_at']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>

            <?php if($pageToolBar): ?>
                <div class="pageToolbar">
                    <?= $pageToolBar ?>
                </div>
            <?php endif; ?>

            <div class="clear"></div>
        </div>
        <div class="exh_bottom"></div>
    </div>
    <div class="main_bottom"></div>
</div>



