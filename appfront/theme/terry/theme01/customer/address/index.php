<div class="main">
    <?php
    $leftMenu = [
        'class' => 'fecshop\app\appfront\modules\Customer\block\LeftMenu',
        'view' => 'customer/leftmenu.php'
    ];
    ?>
    <?= Yii::$service->page->widget->render($leftMenu, $this); ?>
    <div class="main_scene">
        <div class="exh_top"></div>
        <div class="exh_main">
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="../">Home</a> - <a href="<?= Yii::$service->url->getUrl('customer/order') ?>">My Account: <b class="red account-email"></b></a> - Manage Address Book</div>
            <div class="blank5px"></div>
            <h1>Manage Address Book</h1>
            <fieldset>
                <?php if (is_array($coll) && !empty($coll)): ?>
                    <legend>Your Shipping Address Book</legend>
                    <?php foreach ($coll as $one): ?>
                        <div class="blank5px"></div>
                        <div class="fr">
                            <a href="javascript:window.location.href='<?= Yii::$service->url->getUrl('customer/address/edit',['address_id' => $one['address_id']]); ?>'">
                                <img src="<?= Yii::$service->image->getImgUrl('images/ico/edit.gif');?>" hspace="3" align="absmiddle" border="0"/>Edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:deleteAddress(<?= $one['address_id'] ?>)">
                                <img src="<?= Yii::$service->image->getImgUrl('images/ico/del.gif');?>" hspace="3" align="absmiddle" border="0"/>Delete
                            </a>
                        </div>

                        <b class="red_dark">Serial #1</b><br/>
                        <b><?= $one['first_name'] ?>&nbsp;<?= $one['last_name'] ?></b><br/>
                        <?= $one['street1'] ?><br/>
                        <?= $one['street2'] ?><br/>
                        <?= $one['city'] ?>, <?= $one['state'] ?>, <?= $one['country'] ?><br/>
                        <?= $one['zip'] ?><br/>
                        Phone:<?= $one['telephone'] ?><br/>
                        <div class="blank5px"></div>
                        <div class="dashed5px"></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <legend>Your Shipping Address Book</legend>
                    Your shipping address is null, please <a href="<?= Yii::$service->url->getUrl('customer/address/edit') ?>">Add Your Shipping Address</a>.
                <?php endif; ?>

            </fieldset>
            <div class="blank5px"></div>
            <div class="blank5px"></div>
            <input onclick="javascript:window.location.href='<?= Yii::$service->url->getUrl('customer/address/edit') ?>'" class="btn_submit" value="<?= Yii::$service->page->translate->__('Add New Address');?>" name="" type="button">
            <div class="clear"></div>
        </div>
        <div class="exh_bottom"></div>
    </div>
    <div class="main_bottom"></div>
</div>
<script>
    function deleteAddress(address_id){
        var r=confirm('do you readly want delete this address?');
        if (r==true){
            url = "<?= Yii::$service->url->getUrl('customer/address') ?>?method=remove&address_id="+address_id;

            window.location.href=url;
        }
    }
</script>








