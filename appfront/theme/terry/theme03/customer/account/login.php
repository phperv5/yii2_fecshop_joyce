<div class="main container one-column">
    <?= Yii::$service->page->widget->render('flashmessage'); ?>
    <div class="page_where_l"><a href='../www.uobdii.html'>Home</a> - Member Sign In</div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="mn_full">
        <h1>Sign into your account</h1>
        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="float_right px13">New Customer? <a href="" class="btn_blue"><span class="white">Register Free</span></a></div>
        <div class="blank10px"></div>
        <div class="blank10px"></div>

        <form  action="<?= Yii::$service->url->getUrl("customer/account/login");  ?>" method="post"  id="login-form">
            <div id="u_sign_username" class="rowfull">
                <div class="rowf_sign_lt"><span class="red_star">*</span><b>User ID or E-Mail:</b></div>
                <div class="rowf_sign_ri">
                    <input name="editForm[email]" value="<?= $email; ?>" id="email"  class="ipt_large input-text required-entry validate-email"  style="width:300px;"/>
                </div>
                <div class="clear"></div>
            </div>

            <div id="u_sign_password" class="rowfull">
                <div class="rowf_sign_lt"><span class="red_star">*</span><b>Password:</b></div>
                <div class="rowf_sign_ri">
                    <input name="editForm[password]"  style="width:300px;" class="ipt_large input-text required-entry validate-password" id="pass" title="Password" type="password"/>
                </div>
                <div class="clear"></div>
            </div>

            <div class="rowfull">
                <div class="rowf_sign_lt">&nbsp;</div>
                <div class="rowf_sign_ri">
                    <input name="is_remember_uid" type="checkbox" id="is_remember_uid" value="1" checked="checked"/>Remember my User ID or E-mail address for this computer
                </div>
                <div class="clear"></div>
            </div>

            <div class="rowfull">
                <div class="rowf_sign_lt"></div>
                <div class="rowf_sign_ri">
                    <input name="Submit" type="submit" id="js_registBtn" class="btn_submit btn_big btn_prolong redBtn" value="Sign In" id="js_registBtn" /> &nbsp;&nbsp;&nbsp;
                    <a href="getPassword.asp.html" style="vertical-align:bottom;">Forgot password? </a>
                </div>
                <div class="clear"></div>
            </div>
        </form>
        <?= \fec\helpers\CRequest::getCsrfInputHtml();  ?>
        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>




