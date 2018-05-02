<div class="main">
    <?= Yii::$service->page->widget->render('flashmessage'); ?>
    <?php if (!empty($identity)): ?>
    <div class="exh_full_main">
        <h1><?= Yii::$service->page->translate->__('Select your new password'); ?></h1>
        <div class="account-create">
            <form action="<?= Yii::$service->url->getUrl('customer/account/resetpassword', ['resetToken' => $resetToken]); ?>"
                  method="post" id="form-validate">
                <?= \fec\helpers\CRequest::getCsrfInputHtml(); ?>
                <input type="hidden" name="editForm[resetToken]" value="<?= $resetToken ?>"/>
                <div class="lr_l">
                    <dl class="w700px">
                        <dt><span class="red_star">*</span>Your Email Adress:</dt>
                        <dd><input name="editForm[email]" id="email_address" type="text" id="email_address" size="45"
                                   maxlength="40" class="input_normal validate-email required-entry"/></dd>

                        <dt><span class="red_star">*</span>Password:</dt>
                        <dd><input name="editForm[password]" id="password" type="password"  size="45"
                                   maxlength="40" class="input_normal validate-password required-entry"/></dd>

                        <dt><span class="red_star">*</span>Confirm Password:</dt>
                        <dd><input name="editForm[confirmation]" id="confirmation"  type="password" size="45" maxlength="40"
                                   class="input_normal validate-cpassword required-entry"/></dd>

                        <div class="blank10px"></div>
                        <dt>&nbsp;</dt>
                        <dd>
                            <button type="button" class="btn_submit btn_mid" id="js_registBtn">Submit</button>
                        </dd>

                    </dl>
                </div>

            </form>
        </div>
        <br>
        <br>
        <br>
    </div>

</div>
<?php
$requiredValidate = Yii::$service->page->translate->__('This is a required field.');
$emailFormatValidate = Yii::$service->page->translate->__('Please enter a valid email address. For example johndoe@domain.com.');
$passwordLenghtValidate = Yii::$service->page->translate->__('Please enter 6 or more characters. Leading or trailing spaces will be ignored.');
$passwordMatchValidate = Yii::$service->page->translate->__('Please make sure your passwords match.');
//$minNameLength = 2;
//$maxNameLength = 20;
//$minPassLength = 6;
//$maxPassLength = 30;

?>
<script>
    <?php $this->beginBlock('customer_account_reset') ?>
    $(document).ready(function () {
        $("#js_registBtn").click(function () {
            validate = 1;
            $(".validation-advice").remove();
            $(".validation-failed").removeClass("validation-failed");

            var myreg = /[\w-.]+@[\w-]+(.[\w_-]+)+/;
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


            password = $("#password").val();
            confirmation = $("#confirmation").val();
            minPassLength = <?= $minPassLength ? $minPassLength : 4 ?>;
            maxPassLength = <?= $maxPassLength ? $maxPassLength : 30 ?>;
            passwordLength = password.length;

            //password length validate
            if (passwordLength < minPassLength || passwordLength > maxPassLength) {
                if (!$("#password").hasClass("validation-failed")) {
                    //alert(111);
                    $("#password").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $passwordLenghtValidate; ?> </div>');
                    $("#password").addClass("validation-failed");
                    validate = 0;
                }
            }
            //password validate
            if (confirmation != password) {
                if (!$("#confirmation").hasClass("validation-failed")) {
                    //alert(111);
                    $("#confirmation").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $passwordMatchValidate; ?></div>');
                    $("#confirmation").addClass("validation-failed");
                    validate = 0;
                }
            }
            if (validate) {
                $("#form-validate").submit();
            }
        });
    });
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['customer_account_reset'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>


<?php else: ?>
    <div>
        <?php
        $param = ['logUrlB' => '<a href="' . $forgotPasswordUrl . '">', 'logUrlE' => '</a> '];
        ?>
        <?= Yii::$service->page->translate->__('Your Reset Password Token is Expired, You can {logUrlB} click here {logUrlE} to retrieve it ', $param); ?>

    </div>
<?php endif; ?>
</div>