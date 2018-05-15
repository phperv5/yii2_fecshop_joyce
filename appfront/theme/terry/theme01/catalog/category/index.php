<div class="main">
    <div class="page_where_l">
        <a href="/" rel="nofollow">Home</a> - <a href="/" rel="nofollow">Products</a> -<a
                href="/">Original Brand Tool</a></div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="main_left">
        <div class="col_t_x col_t_cate">
            <strong>Categories</strong>
            <?php $categories = Yii::$service->category->menu->getChildCate('0'); ?>
            <?php foreach ($categories as $category): ?>
                <div class="left_proclass_menu">
                    <h2 class="fir"><a href="<?= $category['url'] ?>"><?= $category['name'] ?></a></h2>
                    <?php $cates = Yii::$service->category->getChildCate($category['_id']); ?>
                    <?php if (isset($cates) && !empty($cates)): ?>
                        <div class="hd_wr_nav_main">
                            <div style="width: 600px;background-color: #fff;border: none;box-shadow: 3px 3px 3px #E1E1E1;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <?php foreach ($cates as $k => $c): ?>
                                        <?php if ($k % 3 == 0): ?>
                                            <tr>
                                        <?php endif; ?>
                                        <td><a href="<?= $c['url_key']; ?>"
                                               target="_blank"><?= $c['name']['name_en']; ?></a></td>
                                        <?php if ($k % 3 == 0): ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <div class="clear"></div>
        </div>
        <div class="col_d_b"></div>
        <div class="blank10px"></div>
        <!--categories end -->

        <div class="col_t_x col_t_tag col_t_tag_feature">
            <h3>Browse by Feature</h3>
            <?php
            $keywords = Yii::$service->product->keywords->getKeywordsList(3);
            foreach ($keywords as $v):
                ?>
                <a href="<?php if(isset($v['url']) && !empty($v['url'])) echo $v['url'];else echo  Yii::$service->url->getUrl('catalogsearch/index?q='.$v['keywords']);?>"><?= $v['keywords']; ?></a>
            <?php endforeach; ?>
            <div class="clear"></div>
        </div>
        <div class="col_d_b"></div>
        <div class="blank10px"></div>


        <div id="WishProFavorites"></div>
        <div id="WishProVisitedList"></div>


        <div class="col_d_t">Popular Search</div>
        <div class="col_m_tag">
            <?php
            $keywords = Yii::$service->product->keywords->getKeywordsList(2);
            foreach ($keywords as $v):
            ?>
                <a href="<?php if(isset($v['url']) && !empty($v['url'])) echo $v['url'];else echo  Yii::$service->url->getUrl('catalogsearch/index?q='.$v['keywords']);?>"><?= $v['keywords']; ?></a>
            <?php endforeach; ?>

            <div class="clear"></div>
        </div>
        <div class="col_d_b"></div>
        <div class="blank10px"></div>


    </div>

    <div class="main_scene">
        <div class="exh_top"></div>
        <div class="exh_main_pl">

            <h1><?= $name ?></h1>

            <!--            <div class="pro_exhibit_explain">-->
            <!--                UOBDII is authorized to sale an increasing number of original brands and their service. We always put-->
            <!--                our customers first and listen to you feedback, according to years&rsquo; sales record and customer-->
            <!--                feedback, we highly recommend you the most friendly-used tools made by these Companies: Autel, Foxwell,-->
            <!--                VXDIAG, XTOOL, OBDSTAR etc.&nbsp;-->
            <!--                <div class="blank10px"></div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../diagspeed-mb-key-obd2-benz-key-programmer.html"-->
            <!--                                            title="2017 Original V1.06.08 Diagspeed MB Key OBD2 Mercedes Benz Key Programmer(Powerful than VVDI Benz BGA Tool) Supports All keys Lost"><img-->
            <!--                                    src="../../upload/pro/diagspeed-mb-key-obd2-benz-key-programmer-180.jpg" width="70"-->
            <!--                                    height="70" border="0" hspace="0" vspace="0"-->
            <!--                                    alt="2017 Original V1.06.08 Diagspeed MB Key OBD2 Mercedes Benz Key Programmer(Powerful than VVDI Benz BGA Tool) Supports All keys Lost"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../diagspeed-mb-key-obd2-benz-key-programmer.html"-->
            <!--                       title="2017 Original V1.06.08 Diagspeed MB Key OBD2 Mercedes Benz Key Programmer(Powerful than VVDI Benz BGA Tool) Supports All keys Lost">2017-->
            <!--                        Original V1.06.08 Di...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../autel-maxidas-ds808k-full-set.html"-->
            <!--                                            title="【Ship from US No Tax】Latest AUTEL MaxiDAS DS808 KIT Tablet Diagnostic Tool Full Set Support Injector &amp; Key Coding Update Online"><img-->
            <!--                                    src="../../upload/pro/autel-maxidas-ds808k-full-set-ad-180.jpg" width="70"-->
            <!--                                    height="70"-->
            <!--                                    border="0" hspace="0" vspace="0"-->
            <!--                                    alt="【Ship from US No Tax】Latest AUTEL MaxiDAS DS808 KIT Tablet Diagnostic Tool Full Set Support Injector &amp; Key Coding Update Online"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../autel-maxidas-ds808k-full-set.html"-->
            <!--                       title="【Ship from US No Tax】Latest AUTEL MaxiDAS DS808 KIT Tablet Diagnostic Tool Full Set Support Injector &amp; Key Coding Update Online">【Ship-->
            <!--                        from US No Tax】Late...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../launch-x431-v-8-inch-tablet-wifi-bluetooth-diagnostic-tool.html"-->
            <!--                                            title="【Ship from US No Tax】Launch X431 V 8inch Tablet Wifi/Bluetooth Full System Diagnostic Tool Two Years Free Update Online"><img-->
            <!--                                    src="../../upload/pro/launch-x431-v-8-inch-tablet-wifi-bluetooth-diagnostic-tool-ad-180.jpg"-->
            <!--                                    width="70" height="70" border="0" hspace="0" vspace="0"-->
            <!--                                    alt="【Ship from US No Tax】Launch X431 V 8inch Tablet Wifi/Bluetooth Full System Diagnostic Tool Two Years Free Update Online"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../launch-x431-v-8-inch-tablet-wifi-bluetooth-diagnostic-tool.html"-->
            <!--                       title="【Ship from US No Tax】Launch X431 V 8inch Tablet Wifi/Bluetooth Full System Diagnostic Tool Two Years Free Update Online">【Ship-->
            <!--                        from US No Tax】Laun...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../detail.html"-->
            <!--                                            title="OBDSTAR X300 DP X-300DP PAD Tablet Key Programmer Full Configuration Free Shipping by DHL"><img-->
            <!--                                    src="../../upload/pro/obdstar-x300dp-diagnosis-programmer-key-master-180.3.jpg"-->
            <!--                                    width="70"-->
            <!--                                    height="70" border="0" hspace="0" vspace="0"-->
            <!--                                    alt="OBDSTAR X300 DP X-300DP PAD Tablet Key Programmer Full Configuration Free Shipping by DHL"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../obdstar-x300dp-diagnosis-programmer-key-master.html"-->
            <!--                       title="OBDSTAR X300 DP X-300DP PAD Tablet Key Programmer Full Configuration Free Shipping by DHL">OBDSTAR-->
            <!--                        X300 DP X-300DP P...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../obdstar-f104-chrysler-jeep-dodge-key-programmer.html"-->
            <!--                                            title="【Ship from US No Tax】 OBDSTAR F104 Chrysler Jeep &amp; Dodge Pin Code Reader and Key Programmer"><img-->
            <!--                                    src="../../upload/pro/obdstar-f104-chrysler-jeep-dodge-key-programmer-new-ad-180.jpg"-->
            <!--                                    width="70" height="70" border="0" hspace="0" vspace="0"-->
            <!--                                    alt="【Ship from US No Tax】 OBDSTAR F104 Chrysler Jeep &amp; Dodge Pin Code Reader and Key Programmer"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../obdstar-f104-chrysler-jeep-dodge-key-programmer.html"-->
            <!--                       title="【Ship from US No Tax】 OBDSTAR F104 Chrysler Jeep &amp; Dodge Pin Code Reader and Key Programmer">【Ship-->
            <!--                        from US No Tax】 OBD...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../launch-x431-diagun-iv.html"-->
            <!--                                            title="2017 New Released Launch X431 Diagun IV Powerful Diagnostic Tool Wifi Bluetooth Android 7.0 with 2 Years Free Update"><img-->
            <!--                                    src="../../upload/pro/launch-x431-diagun-iv-0180.jpg" width="70" height="70"-->
            <!--                                    border="0"-->
            <!--                                    hspace="0" vspace="0"-->
            <!--                                    alt="2017 New Released Launch X431 Diagun IV Powerful Diagnostic Tool Wifi Bluetooth Android 7.0 with 2 Years Free Update"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../launch-x431-diagun-iv.html"-->
            <!--                       title="2017 New Released Launch X431 Diagun IV Powerful Diagnostic Tool Wifi Bluetooth Android 7.0 with 2 Years Free Update">2017-->
            <!--                        New Released Launch ...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../launch-x431-v-heavy-duty-truck-diagnostic-module.html"-->
            <!--                                            title="Original Launch X431 V+ Wifi/Bluetooth Plus HD Heavy Duty Truck Diagnostic Module (2-in-1set)"><img-->
            <!--                                    src="../../upload/pro/launch-x431-v-heavy-duty-truck-diagnostic-module-180.2.jpg"-->
            <!--                                    width="70"-->
            <!--                                    height="70" border="0" hspace="0" vspace="0"-->
            <!--                                    alt="Original Launch X431 V+ Wifi/Bluetooth Plus HD Heavy Duty Truck Diagnostic Module (2-in-1set)"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../launch-x431-v-heavy-duty-truck-diagnostic-module.html"-->
            <!--                       title="Original Launch X431 V+ Wifi/Bluetooth Plus HD Heavy Duty Truck Diagnostic Module (2-in-1set)">Original-->
            <!--                        Launch X431 V+ W...</a>-->
            <!--                </div>-->
            <!--                <div class="pro_ee_featured">-->
            <!--                    <div class="img70px"><a href="../obdstar-dp-pad-tablet.html"-->
            <!--                                            title="OBDSTAR DP PAD Tablet IMMO ODO EEPROM PIC OBDII Tool for Japanese and South Korean Vehicles"><img-->
            <!--                                    src="../../upload/pro/obdstar-dp-pad-tablet-180.jpg" width="70" height="70"-->
            <!--                                    border="0"-->
            <!--                                    hspace="0" vspace="0"-->
            <!--                                    alt="OBDSTAR DP PAD Tablet IMMO ODO EEPROM PIC OBDII Tool for Japanese and South Korean Vehicles"-->
            <!--                                    align="absmiddle"/></a></div>-->
            <!--                    <a href="../obdstar-dp-pad-tablet.html"-->
            <!--                       title="OBDSTAR DP PAD Tablet IMMO ODO EEPROM PIC OBDII Tool for Japanese and South Korean Vehicles">OBDSTAR-->
            <!--                        DP PAD Tablet IMM...</a>-->
            <!--                </div>-->
            <!--                <div class="blank5px"></div>-->
            <!--            </div>-->
            <div class="blank10px"></div>
            <?php if (is_array($products) && !empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="pro_list pro_list_feaured" url='<?= $product['url'] ?>'>
                        <div class="photo">
                            <a href="<?= $product['url'] ?>"
                               title="<?= $product['name'] ?>">
                                <img src="<?= Yii::$service->product->image->getResize($product['image'], [230, 230], false) ?>"
                                     width="120" height="120" border="0" hspace="0" vspace="0" alt=""
                                     align="absmiddle"/></a>
                        </div>
                        <div class="brief">
                            <h2>
                                <span class="specialoffer"></span>
                                <a href="<?= $product['url'] ?>">
                                    <?= $product['name'] ?>
                                </a>
                            </h2>
                            <div class="clear"></div>
                            <span class="px11">Item No.<?= $product['sku']; ?></span>&nbsp;&nbsp;&nbsp;
                            <!--                            <img src="../../images/ico/freeshipping.gif" border="0" align="absmiddle"/>&nbsp;&nbsp;&nbsp;-->
                            <div class="fr w150px">
                                <div class="rate_star_w100">
                                    <div class="rate_star_w100_bg">
                                        <div class="rate_star_w100_vw" style="width:96px;"></div>
                                    </div>
                                </div>
                                <div class="rate_star_w100_tx"><a href="../../reviews/pro57665.html" target="_blank">(24)</a>
                                </div>
                            </div>
                            <div class="blank10px"></div>
                            <?= $product['short_description']; ?>
                            <div class="blank5px"></div>
                            <div class="clear"></div>

                        </div>
                        <div class="order_fun px11">
                            <div class="blank5px"></div>
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
                            <div class="blank5px"></div>
                            <div class="dashed_line"></div>
                            <div class="blank5px"></div>
                            <div class="blank5px"></div>
                            <input name="add_to_cart" type="button" class="btn_addtocart_s" value="" title="Add to Cart" onclick="javascript:addProductToCart('<?= $product['_id'] ?>');return false;"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?= $product_page; ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="exh_bottom"></div>
</div>
</div>
<script>
    <?php $this->beginBlock('owl_fecshop_slider') ?>

    $(document).ready(function () {

        $(".left_proclass_menu").bind('mouseover', function () {
            $(this).find('.hd_wr_nav_main').show();
        })
        $(".left_proclass_menu").bind('mouseout', function () {
            $('.hd_wr_nav_main').hide();
        })
    });
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['owl_fecshop_slider'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>









