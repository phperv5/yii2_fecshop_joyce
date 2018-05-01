<div class="main">
    <div class="page_where_l"><a href="/">Home</a> - <?= $product_name ?>
    </div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="exh_full_top"></div>
    <div class="exh_full_main">
        <div class="blank15px"></div>
        <fieldset>
            <div class="pro_list pro_list_nd">
                <div class="photo">
                    <a href="<?= $url  ?>" title="<?= $product_name ?>">
                        <img src="<?= Yii::$service->product->image->getResize($main_img,[120,120],false) ?>" width="120" height="120" border="0" hspace="0" vspace="0" alt="<?= $product_name ?>" align="absmiddle"/></a></div>
                <div class="brief">

                    <h2><span class="specialoffer"></span><a href="<?= $url  ?>"><?= $product_name ?></a></h2>
                    <div class="blank10px"></div>
<!--                    <span class="px11">Item No.--><?//= $sku ?><!--</span>-->
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
        </fieldset>

        <a name="WriteReview"></a>
        <div class="blank15px"></div>
        <?= Yii::$service->page->widget->render('flashmessage'); ?>
        <a name="na_write_rev"></a>
        <div class="fc_col_b">
            <span class="fc_tit">Write a Review</span>
            <form action="" method="post" name="form_rev_add">
                <?= \fec\helpers\CRequest::getCsrfInputHtml();  ?>
                <input name="editForm[product_spu]" value="<?= $spu ?>" id="product_spu" type="hidden">
                <input name="editForm[product_id]" value="<?= $product_id ?>" id="product_id" type="hidden">
                <dl class="px900">
                    <dt><span class="red">*</span> Rating:</dt>
                    <dd>
                        <div class="rate_star">
                            <span class="star_casing star_1" id="star_casing_1" rel="1"></span>
                            <span class="star_casing star_2" id="star_casing_2"" rel="2"></span>
                            <span class="star_casing star_3" id="star_casing_3"" rel="3"></span>
                            <span class="star_casing star_4" id="star_casing_4"" rel="4"></span>
                            <span class="star_casing star_5" id="star_casing_5"  rel="5"></span>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="px11" id="txt_pro_RateStars">Please select rating stars.</span>
                        <input name="editForm[rate_star]" value="5" id="review_price_field" type="hidden">
                        <div class="clear"></div>
                    </dd>
                    <div class="clear"></div>


                    <dt><span class="red">*</span> Your First &amp; Last Name:</dt>
                    <dd>
                        <input name="editForm[name]" type="text" id="ReviewerName" size="30" maxlength="50"
                               class="input_normal" onfocus="InputCss(this,'focus');"
                               onblur="CheckVerifyReviewerName(this,'txt_ReviewerName');">
                        <span id="txt_ReviewerName" class="alert"></span>
                    </dd>

                    <dt><span class="red">*</span> Your E-Mail Address:</dt>
                    <dd><input name="editForm[summary]" type="text" id="ReviewerEmail" size="45" maxlength="50"
                               class="input_normal" onfocus="InputCss(this,'focus');"
                               onblur="CheckVerifyReviewerEmail(this,'txt_ReviewerEmail');">
                        <span id="txt_ReviewerEmail" class="alert"></span>
                    </dd>


                    <dt><span class="red">*</span> Review Detail:</dt>
                    <dd>
                        <textarea name="editForm[review_content]" rows="6" id="ReviewDetail" class="input_normal"
                                  onfocus="InputCss(this,'focus');"
                                  onblur="CheckVerifyReviewDetail(this,'txt_ReviewDetail');"
                                  style="width:90%;"></textarea><span id="txt_ReviewDetail" class="alert"></span>
                    </dd>

                    <dt><span class="red_star">*</span>Verification Code:</dt>
                    <dd><input name="numVerify" id="numVerify" type="text" maxlength="4" size="10"
                               onkeypress="event.returnValue=IsDigit();" class="input_normal"
                               onfocus="InputCss(this,'focus');" onblur="CheckNumVerify(this,'txtIDnumVerify');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                class="span_num_verify" id="span_id_num_verify">6974</span><input
                                name="numVerifyConfirm" id="numVerifyConfirm" type="hidden" value="6974"/><span
                                id="txtIDnumVerify" class="alert"></span>&nbsp;&nbsp;&nbsp;&nbsp;<b class="px11"><a
                                    href="javascript:void(0);" onclick="GetNewVerifyCode();">No right? Get a new
                                Verification Code</a></b></dd>

                    <dt>&nbsp;</dt>
                    <dd><input type="submit" name="button" id="button" value="Submit Review" class="btn_submit"></dd>

                </dl>

            </form>
            <div class="blank5px"></div>
            <div class="dashed5px"></div>
    </div>
    <div class="exh_full_bottom"></div>
    <div class="clear"></div>
</div>
    <script>
        // add to cart js
        <?php $this->beginBlock('product_review_rate') ?>
        $(document).ready(function(){
            $(".rate_star .star_casing").click(function(){
                $(".rate_star .star_casing").removeClass('star_casing_on');
                $(this).addClass('star_casing_on');
                $num = $(this).attr('rel');
                for($i=1;$i<=$num;$i++){
                    $('.star_'+$i).addClass('star_casing_on');
                }
                $('#review_price_field').val($num);
            });
        });

        <?php $this->endBlock(); ?>
        <?php $this->registerJs($this->blocks['product_review_rate'],\yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>

    </script>