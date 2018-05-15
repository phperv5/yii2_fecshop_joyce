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
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="../">Home</a> - <a href="../members/">My Account: <b class="red">312043814@qq.com</b></a> - My Favorites</div><div class="blank5px"></div><h1>My Favorites</h1>

            <div class="blank10px"></div>


            <table class="tab_comm">
                <tr class="tr_head">
                    <td>No.</td>
                    <td width="70">Photo</td>
                    <td>Product Name &amp; Item No</td>
                    <td>Price</td>
                    <td>Spec.</td>
                    <td>Remark</td>
                    <td>Remark</td>
                </tr>
                <?php if(is_array($coll) && !empty($coll)):  ?>
                    <?php  foreach($coll as $key=>$one):  ?>
                        <?php  $main_img = $one['image']['main']['image'];  ?>
                <tr class="tr_info">
                    <td class="px11"><?php echo $key+1;?></td>
                    <td width="70">
                        <div class="img60px"><a href="<?= Yii::$service->url->getUrl($one['url_key'])  ?>" target="_blank">
                                <img src="<?= Yii::$service->product->image->getResize($main_img,[120,120],false) ?>" width="60" height="60" border="0" hspace="0" vspace="0" alt="" align="absmiddle" /></a>
                        </div>
                    </td>
                    <td class="align_left">
                        <span class="pro_t_newrelease"></span> <a href="<?= Yii::$service->url->getUrl($one['url_key'])  ?>" target="_blank"><?= Yii::$service->store->getStoreAttrVal($one['name'],'name')  ?></a><br /><span class="px11 gray_dark">Item No.SK226</span> 　　<span class="green verdana px10">In Stock</span>
                    </td>
                    <td class="align_left">
                        <?php
                        $config = [
                            'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                            'view'  		=> 'cms/home/index/price.php',
                            'price' 		=> $one['price'],
                            'special_price' => $one['special_price'],
                        ];
                        echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                        ?>
                    </td>
                    <td class="align_left px11">
                        Weight:0.3KG<br />
                        Package:0*0*0cm
                        <br /><span class="gray_dark">(Inch: 0*0*0)</span>
                    </td>
                    <td class="align_left px11">
                        Sold: 7<br />
                        Diggs: 0
                    </td>
                    <td class="px10 gray">
                        <div class="blank5px"></div>
                        <input name="btn_buyitnow" type="button" class="btn_buyitnow_s_mem" value="" title="Buy It Now" onclick="javascript:ShoppingCartAdd('71861','BuyItNow','N','oSize','N','oColor','N','oQty');return false;" onmouseover="javascript:IsOrderNeedSize('N','oSize');IsOrderNeedColor('N','oColor');IsOrderNeedQty('N','oQty');return false;" />
                        <div class="blank5px"></div>
                        <a href="<?= Yii::$service->url->getUrl('customer/productfavorite',['type'=>'remove','favorite_id' => $one['favorite_id']]); ?>">
                            <?= Yii::$service->page->translate->__('Delete');?>
                        </a>
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
