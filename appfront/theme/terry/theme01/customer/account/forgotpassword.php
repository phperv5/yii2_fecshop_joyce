<div class="main">
    <div class="page_where_l"><a href="/">Home</a> - Forget password</div>
    <div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>


    <div class="exh_full_top"></div>
    <div class="exh_full_main">
        <h1>Forget Password?</h1>

        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="w90per">
            <b class="red">Step 1: Please Input Your E-mail Address and Verification Code</b>
            <div class="blank5px"></div>
            <b class="gray">Step 2: Check Your E-mail Inbox and Get Your Password</b>
            <div class="blank5px"></div>
            <span class="remark"><span class="red_star">*</span>means required information</span>
        </div>
        <br/><br/>

        <form action="<?= Yii::$service->url->getUrl('customer/account/forgotpasswordsubmit'); ?>" method="post"
              id="form-validate">
            <div class="lr_l account-create">
                <dl class="w700px">

                    <dt><span class="red_star">*</span>Your Email Adress:</dt>
                    <dd><input name="editForm[email]" type="text" id="email_address" size="45" maxlength="40"
                               class="input_normal validate-email required-entry"/><span id="txtIDgetPassEmail"
                                                                                         class="red_dark"></span></dd>

                    <dt><span class="red_star">*</span>Verification Code:</dt>
                    <dd>
                        <input name="editForm[captcha]" id="numVerify" type="text" maxlength="4" size="10"
                               class="input_normal login-captcha-input required-entry">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="span_num_verify">3724</span>
                        <span id="txtIDnumVerify" class="red_dark"></span>
                    </dd>

                    <div class="blank10px"></div>
                    <dt>&nbsp;</dt>
                    <dd>
                        <button type="button" class="btn_submit btn_mid" id="js_registBtn"> Confirm &amp; Submit
                        </button>
                    </dd>
                </dl>
            </div>

        </form>

        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="blank10px"></div>
        <div class="blank10px"></div>
    </div>
    <div class="exh_full_bottom"></div>
    <div class="clear"></div>
</div>
<?php
$requiredValidate = 'This is a required field.';
$emailFormatValidate = 'Please enter a valid email address. For example johndoe@domain.com.';
?>
<script>
    <?php $this->beginBlock('forgot_password') ?>
    $(document).ready(function () {
        $("#js_registBtn").click(function () {
            validate = 1;
            $(".validation-advice").remove();
            $(".validation-failed").removeClass("validation-failed");
            var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            // empty check
            $(".account-create .required-entry").each(function () {
                val = $(this).val();
                if (!val) {
                    $(this).addClass("validation-failed");
                    $(this).parent().append('<div class="validation-advice" id="advice-required-entry-firstname" style=""><?= $requiredValidate; ?></div>');
                    validate = 0;
                }
            });
            // email check
            $(".account-create .validate-email").each(function () {
                email = $(this).val();
                if (email) {
                    if (!$(this).hasClass("validation-failed")) {
                        if (!myreg.test(email)) {
                            $(this).parent().append('<div class="validation-advice" id="advice-validate-email-email_address" style=""><?= $emailFormatValidate; ?></div>');
                            $(this).addClass("validation-failed");
                            validate = 0;
                        }
                    }
                } else {
                    validate = 0;
                }
            });
            if (validate) {
                $(this).addClass("dataUp");
                $("#form-validate").submit();
            }
        });
    });
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['forgot_password'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>