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
            <div class="align_right px11 verdana" style="margin-top:-10px;"><a href="<?= $homeUrl ?>">Home</a> - <a href="<?= Yii::$service->url->getUrl('customer/order') ?>">My Account: <b class="red account-email"></b></a> - Edit Address Information</div><div class="blank5px"></div><h1>Edit Address Information</h1>
            <form class="addressedit" action="<?= Yii::$service->url->getUrl('customer/address/edit'); ?>" method="post" id="form-validate">
                <input name="address[address_id]" value="<?= $address_id; ?>" type="hidden">
                <input name="redirect_url" value="<?= Yii::$app->request->get('redirect_url'); ?>" type="hidden">
                <dl>
                    <dt><span class="red_star">*</span>Email Address:</dt>
                    <dd>
                        <input class="input-text required-entry input_normal" maxlength="255" title="Email" value="<?= $email ?>" name="address[email]" id="customer_email"   type="text">
                    </dd>
                    <dt><span class="red_star">*</span>Received Name is:</dt>
                    <dd>
                        <div class="fl w200px"><b class="px11">First Name</b></div>
                        <div class="fl w10px"></div>
                        <div class="fl w200px"><b class="px11">Last Name</b></div>
                        <div class="clear"></div>

                        <div class="fl w200px">
                            <input class="input-text required-entry input_normal" maxlength="255" title="First Name" value="<?= $first_name ?>" name="address[first_name]" id="firstname" type="text">
                        </div>

                        <div class="fl w10px"></div>
                        <div class="fl w200px">
                            <input class="input-text required-entry input_normal" maxlength="255" title="Last Name" value="<?= $last_name ?>" name="address[last_name]" id="lastname" type="text">
                        </div>
                    </dd>

                    <dt><span class="red_star">*</span>Address Line1:</dt>
                    <dd>
                        <input class="input-text required-entry input_normal" maxlength="255" title="Last Name" value="<?= $street1 ?>" name="address[street1]" id="lastname" type="text">
                    </dd>

                    <dt>Address Line2:</dt>
                    <dd>
                        <input class="input-text optional input_normal" maxlength="255" title="street2" value="<?= $street2 ?>" name="address[street2]" id="lastname" type="text">
                    </dd>

                    <dt><span class="red_star">*</span>City:</dt>
                    <dd>
                        <input class="input-text required-entry input_normal" maxlength="255" title="Last Name" value="<?= $city ?>" name="address[city]" id="lastname" type="text">
                    </dd>

                    <dt><span class="red_star">*</span>Country / Region:</dt>
                    <dd>
                        <select id="address:country" class="address_country validate-select" title="Country" name="address[country]">
                            <?= $countrySelect;  ?>
                        </select>
                    </dd>

                    <dt><span class="red_star" id="is_must_or_not_addProvince" style="display:none">*</span>State/Province/Region:
                    </dt>
                    <dd>
                        <div class="input-box state_html">
                            <?= $stateHtml;  ?>
                        </div>
                    </dd>

                    <dt>
                        <span class="red_star">*</span>ZIP/Postal Code:
                    </dt>
                    <dd>
                        <input class="input-text required-entry input_normal" maxlength="255" title="Last Name" value="<?= $zip ?>" name="address[zip]" id="lastname" type="text">
                    </dd>

                    <dt><span class="red_star">*</span>Phone Number:</dt>
                    <dd>
                        <input class="input-text required-entry input_normal" maxlength="255" title="Last Name" value="<?= $telephone ?>" name="address[telephone]" id="lastname" type="text">
                    </dd>

                    <!--                    <dt>Fax Number:</dt>-->
                    <!--                    <dd><input name="addFax" id="addFax" type="text" size="35" maxlength="100" value="" class="input_normal" onfocus="InputCss(this,'focus');" onblur="InputCss(this,'');"></dd>-->

                    <dt>&nbsp;</dt>
                    <dd>
                        <input name="address[is_default]" value="1" title="Save in address book" id="address:is_default" class="address_is_default checkbox" <?= $is_default_str; ?> type="checkbox"> Set it to my
                        Default Address
                    </dd>

                    <div class="blank10px"></div>
                    <dt>&nbsp;</dt>
                    <dd><div  style="width: 112px;" class="btn_submit submitbutton" onclick="submit_address()">  Submit &amp; Save   </div></dd>
                </dl>

            </form>
            <div class="clear"></div>
        </div>
        <div class="exh_bottom"></div>
    </div>
    <div class="main_bottom"></div>
</div>


<script>
    <?php $this->beginBlock('editCustomerAddress') ?>
    $(document).ready(function(){
        $(".address_country").change(function(){
            //alert(111);
            ajaxurl = "<?= Yii::$service->url->getUrl('customer/address/changecountry') ?>";
            country = $(this).val();
            $.ajax({
                async:false,
                timeout: 8000,
                dataType: 'json',
                type:'get',
                data: {
                    'country':country,
                },
                url:ajaxurl,
                success:function(data, textStatus){
                    $(".state_html").html(data.state);
                },
                error:function (XMLHttpRequest, textStatus, errorThrown){

                }
            });

        });

    });
    function submit_address(){
        i = 1;
        jQuery(".addressedit input").each(function(){
            type = jQuery(this).attr("type");
            if(type != "hidden"){
                value = jQuery(this).val();
                if(!value){
                    //alert($(this).hasClass('optional'));
                    if(!$(this).hasClass('optional')){
                        i = 0;
                    }
                }
            }
        });

        jQuery(".addressedit select").each(function(){
            value = jQuery(this).val();
            if(!value){
                i = 0;
            }
        });
        if(i){
            jQuery(".addressedit").submit();
        }else{
            alert("You Must Fill All Field");
            return false;
        }
    }

    <?php $this->endBlock(); ?>
    <?php $this->registerJs($this->blocks['editCustomerAddress'],\yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>

</script>










