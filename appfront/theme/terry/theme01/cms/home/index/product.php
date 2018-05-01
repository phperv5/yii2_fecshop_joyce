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
    <?php foreach($parentThis['products'] as $item=>$product): ?>
<div class="hm_pro_grid <?php if($item>=5):?> hm_pro_gr_col_2 <?php  endif;  ?>?>">
                <div class="hm_pro_gr_item <?php if(!$item || $item==5):?>hm_pro_gr_item_noad_left<?php  endif;  ?>">
                    <div class="hm_progrd_photo"><a href="<?= $product['url'] ?>"><img src="<?= Yii::$service->product->image->getResize($product['image'],[200,200],false) ?>" width="180" height="180" border="0" hspace="0" vspace="0" alt="<?= $product['name'] ?>" align="absmiddle" /></a></div>
                    <div class="hm_progrd_name"><a href="<?= $product['url'] ?>" title="<?= $product['name'] ?>"><?= $product['name'] ?></a></div>
                    <div class="hm_progrd_price" id="ProPriDisp_h_dp_51561">
                        <?php
                        $config = [
                            'class' 		=> 'fecshop\app\appfront\modules\Catalog\block\category\Price',
                            'view'  		=> 'cms/home/index/price.php',
                            'price' 		=> $product['price'],
                            'special_price' => $product['special_price'],
                        ];
                        echo Yii::$service->page->widget->renderContent('category_newArrivals_price',$config);
                        ?>
                    </div>
<!--                    <div class="hm_progrd_rate"><div class="pro_g_r4_prate"><div class="rate_star_w75"><div class="rate_star_w75_bg"><div class="rate_star_w75_vw" style="width:72px;"></div></div></div><div class="rate_star_w75_tx">(<a href="reviews/pro51561.html" target="_blank">55</a>)</div></div></div>-->
                </div>
</div>
    <?php  endforeach;  ?>
<?php  endif;  ?>