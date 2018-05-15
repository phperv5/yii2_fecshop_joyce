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
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="../">Home</a> - <a href="../members/">My Account: <b class="red account-email"></b></a> - My Favorites</div><div class="blank5px"></div><h1>My Favorites</h1>

            <div class="blank10px"></div>


            <table class="tab_comm">
                <tr class="tr_head">
                    <td>No.</td>
                    <td width="70">Rating</td>
                    <td>Related Product or Article</td>
                    <td>Date</td>
                    <td>Remark</td>
                </tr>
                <?php if(is_array($coll) && !empty($coll)):  ?>
                    <?php  foreach($coll as $key=>$one):  ?>
                        <?php  $main_img = $one['image']['main']['image'];  ?>
                <tr class="tr_info">
                    <td class="px11"><?php echo $key+1;?></td>
                    <td width="70">
                        <a  href="#" class="review_star review_star_<?= $one['rate_star'] ?>" onclick="javascript:return false;"></a>
                    </td>
                    <td class="align_left">
                        <a class="product_img" href="<?= Yii::$service->url->getUrl($one['url_key']);  ?>">
                            <img src="<?= Yii::$service->product->image->getResize($main_image,[120,120],false) ?>" />
                        </a>
                    </td>
                    <td class="align_left">
                        <span class="review_date_time"><?= $one['review_date'] ? date('Y-m-d H:i:s',$one['review_date']) : '' ?></span>
                    </td>
                    <td class="align_left px11">
                        <div class="review-content">
                            <?= $one['review_content'] ?>
                        </div>
                    </td>
                </tr>
                        <?php  endforeach;  ?>
                <?php endif; ?>
            </table>


            <div class="page_nav">
                <?php if($pageToolBar): ?>
                    <div class="pageToolbar">
                        <?= $pageToolBar ?>
                    </div>
                <?php endif; ?></div>
            </div>
            <form method="post" name="formOrderAdd" id="formOrderAdd" action="../app/order.asp"><input type="hidden" name="ProID" value="" /><input type="hidden" name="oSize" value="" /><input type="hidden" name="oColor" value="" /><input type="hidden" name="oQty" value="" /><input type="hidden" name="Action" value="" /><input type="hidden" name="AddMethod" value="" /><input type="submit" style="display:none" /></form>

            <form name="formMyFavoritesDelete" method="post" action="my_favorites_app.asp">
                <input type="hidden" name="ProID" value="" />
                <input type="hidden" name="SetAction" value="del" />
                <input type="submit" style="display:none" />
            </form>

            <div class="clear"></div>
        </div>
        <div class="exh_bottom"></div>
    </div>
    <div class="main_bottom"></div>
</div>
