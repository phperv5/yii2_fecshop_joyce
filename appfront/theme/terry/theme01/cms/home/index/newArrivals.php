<?php $products = $parentThis['products'];?>
<div class="main_h_flashsale">
    <div class="main_h_fs_title"><span class="red">New Arrivals</span><span class="gray">  &amp; </span><span class="green">Flash Sale</span>
        <div class="fr"><span class="px12 arial no_bold"><a href="<?= Yii::$service->url->getUrl('new-arrvival.html'); ?>" class="gray">View More</a></span></div>
    </div>
    <div class="main_h_fs_are">
        <div class="main_h_fs_item">
            <div class="mhfsi_photo"><a href="<?= $products[0]['url'] ?>" title="<?= $products[0]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[0]['image'],[280,280],false) ?>" width="280" height="280" border="0" hspace="0" vspace="0" alt="<?= $products[0]['name'] ?>" align="absmiddle" /></a>
            </div>
            <div class="mhfsi_bri">
                <a href="<?= $products[0]['url'] ?>" title="<?= $products[0]['name'] ?>"><?= $products[0]['name'] ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_70844">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][0]['price'],
                        'special_price' => $parentThis['products'][0]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="pro_g_r4_prate">
                    <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                    <div class="rate_star_w75_tx">(<a href="javascript:void(0);">8</a>)</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="main_h_fs_are">
        <div class="main_h_fa_item">
            <div class="mhfai_bri">
                <a href="<?= $products[1]['url'] ?>" title="<?= $products[1]['name'] ?>"><?= $products[1]['name'] ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][1]['price'],
                        'special_price' => $parentThis['products'][1]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[1]['url'] ?>" title="<?= $products[1]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[1]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[1]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="main_h_fa_item">
            <div class="mhfai_bri">
                <a href="<?= $products[2]['url'] ?>" title="<?= $products[2]['name'] ?>"><?= $products[2]['name'] ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][2]['price'],
                        'special_price' => $parentThis['products'][2]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[1]['url'] ?>" title="<?= $products[2]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[2]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[2]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="main_h_fa_item">
            <div class="mhfai_bri">
                <a href="<?= $products[3]['url'] ?>" title="<?= $products[3]['name'] ?>"><?= $products[3]['name'] ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][3]['price'],
                        'special_price' => $parentThis['products'][3]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[3]['url'] ?>" title="<?= $products[3]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[3]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[3]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="main_h_fs_are">
        <div class="main_h_fs_item">
            <div class="mhfsi_photo"><a href="<?= $products[4]['url'] ?>" title="<?= $products[4]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[4]['image'],[280,280],false) ?>" width="280" height="280" border="0" hspace="0" vspace="0" alt="<?= $products[4]['name'] ?>" align="absmiddle" /></a>
            </div>
            <div class="mhfsi_bri">
                <a href="<?= $products[4]['url'] ?>" title="<?= $products[4]['name'] ?>"><?= $products[4]['name'] ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_70844">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][4]['price'],
                        'special_price' => $parentThis['products'][4]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="pro_g_r4_prate">
                    <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                    <div class="rate_star_w75_tx">(<a href="javascript:void(0);">8</a>)</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="main_h_fs_b">
        <div class="main_h_fa_item">
            <div class="mhfai_b_bri">
                <a href="<?= $products[5]['url'] ?>" title="<?= $products[5]['name'] ?>"><?= substr($products[5]['name'],0,30) ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][5]['price'],
                        'special_price' => $parentThis['products'][5]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[5]['url'] ?>" title="<?= substr($products[5]['name'],0,30) ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[5]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[5]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="main_h_fa_item">
            <div class="mhfai_b_bri">
                <a href="<?= $products[6]['url'] ?>" title="<?= $products[6]['name'] ?>"><?= substr($products[6]['name'],0,30) ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][6]['price'],
                        'special_price' => $parentThis['products'][6]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[1]['url'] ?>" title="<?= $products[6]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[6]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[6]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="main_h_fa_item">
            <div class="mhfai_b_bri">
                <a href="<?= $products[7]['url'] ?>" title="<?= $products[7]['name'] ?>"><?= substr($products[7]['name'],0,30) ?></a>
                <div class="blank10px"></div>
                <div id="ProPriDisp_h_n_71861">
                    <?php
                    $config = [
                        'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                        'view'  		=> 'cms/home/index/price.php',
                        'price' 		=> $parentThis['products'][7]['price'],
                        'special_price' => $parentThis['products'][7]['special_price'],
                    ];
                    echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                    ?>
                </div>
                <div class="blank10px"></div>
                <div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:75px;"></div></div></div>
                <div class="rate_star_w75_tx">(<a href="javascript:void(0);">3</a>)</div>
            </div>
            <div class="mhfai_photo">
                <a href="<?= $products[7]['url'] ?>" title="<?= $products[7]['name'] ?>">
                    <img src="<?= Yii::$service->product->image->getResize($products[7]['image'],[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $products[7]['name'] ?>" align="absmiddle" />
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>