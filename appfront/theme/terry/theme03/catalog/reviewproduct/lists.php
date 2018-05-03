<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<div class="main container one-column">
<?= Yii::$service->page->widget->render('flashmessage'); ?>
	<div class="col-main">
		<div class="std">
			<div class="review_lists">
                <div class="pro_list pro_list_nd">
                    <div class="photo">
                        <a href="<?= $url  ?>" title="<?= $product_name ?>">
                            <img src="<?= Yii::$service->product->image->getResize($main_img,[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $product_name ?>" align="absmiddle"/></a></div>
                    <div class="brief">

                        <h2><span class="specialoffer"></span><a href="<?= $url  ?>"><?= $name ?></a></h2>
                        <div class="blank10px"></div>
                        <!--                    <span class="px11">Item No.--><?//= $sku ?><!--</span>-->
                        <div style="padding-left:20px">
                            <div class="rbc_cold">
								<span>
									<span class="average_rating" style="float:left;padding-top: 2px;"><?= Yii::$service->page->translate->__('Average rating :');?></span>
                                    <span class="point" style="float:left;">
                                        <span class="star<?= $reviw_rate_star_average ?>"></span>
                                    </span>
									<a style="float:left;padding-top: 2px;" rel="nofollow" href="<?= Yii::$service->url->getUrl('catalog/reviewproduct/lists',['spu'=>$spu,'_id'=>$_id]); ?>">
										(<span itemprop="count"><?= $review_count ?> <?= Yii::$service->page->translate->__('reviews');?></span>)
									</a>
								</span>
                                <div class="clear"></div>
                            </div>
                            <a href="<?= $url ?>"  class="submitbutton">
                                <span><span> <?= Yii::$service->page->translate->__('Add To Cart');?></span></span>
                            </a>

                            <a style="margin-left:10px" href="<?= $addReviewUrl ?>" onclick="" class="submitbutton">
                                <span><span> <?= Yii::$service->page->translate->__('Add Review');?></span></span>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="order_fun px11">
                        <div class="blank10px"></div>

                        <span class="pro_pri_tit_vip_m">Buy It Now:</span>
                        <span class="pro_pri_curr_vip_m" name="cc_v_USD" style="display:">
                        <?= $price_info['price']['symbol'] ?><?= $price_info['price']['value'] ?>
                    </span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
				<div class="product-Reviews"> 
					<div class="clear"></div>
					<div class="scroll_left">
						<a href=""><?= Yii::$service->page->translate->__('Product Review');?></a>
					</div>
					<div class="product-Reviews_top">
						<?php  if(is_array($coll) && !empty($coll)):  ?>
						<ul id="review_description">
							<?php foreach($coll as $one):  ?>
							<li>
								<div class="review_description_left">
                                    <span class="point">
                                        <span class="star<?= $one['rate_star'] ?>"></span>
                                    </span>
									<p><?= Yii::$service->page->translate->__('By');?> <?= $one['name'] ?></p>
									<span><?= $one['review_date'] ? date('Y-m-d H:i:s',$one['review_date']) : '' ?></span>
								</div>
								<div class="review_description_right">
									<input id="review_url_407" value="" type="hidden">
									<span class="review_description_right_span"><b><?= $one['summary'] ?></b></span>
									<div class="review_description_centen">
										<div class="addsize"></div>
										<div class="review-content">
											<?= $one['review_content'] ?>
										</div>
										<div class="moderation">
										<?php if($one['status'] == $noActiveStatus): ?>  
											<?= Yii::$service->page->translate->__('Your Review is awaiting moderation...');?>
										<?php elseif($one['status'] == $refuseStatus): ?>
											<?= Yii::$service->page->translate->__('Your Review is refused.');?>
										<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
					<?php if($pageToolBar): ?>
					<div class="pageToolbar">
						<label class="title"><?= Yii::$service->page->translate->__('Page:');?></label><?= $pageToolBar ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>