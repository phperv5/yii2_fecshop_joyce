<div class="main container one-column">
    <?= Yii::$service->page->widget->render('flashmessage'); ?>
    <div class="page_where_l"><a href="../www.uobdii.html">Home</a> - Membership Registration</div><div class="page_where_r"><a href="javascript:history.go(-1);" rel="nofollow">&laquo; Go Back</a></div>
    <div class="blank8px"></div>
    <div class="mn_full">
        <h1>Membership Registration</h1>

        <div class="blank10px"></div>
        <span class="px11 gray"><span class="red_star px10">*</span> means required fields </span>
        <div class="float_right px13">New Customer? <a href="signin.asp�sSignReturnURL=.html" class="btn_blue"><span class="white">Sign In</span></a></div>
        <div class="blank10px"></div>

        <form action="<?= Yii::$service->url->getUrl('customer/account/register'); ?>" method="post" id="form-validate">

            <div id="u_reg_email" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b>E-mail Address:</b></div>
                <div class="rowf_per70">
                    <input name="editForm[email]" id="email_address" value="<?= $email ?>" title="Email Address" class="input-text validate-email required-entry" type="text">
                </div>
                <div class="clear"></div>
            </div>

            <div id="u_reg_password" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b>Password:</b></div>
                <div class="rowf_per70">
                    <input name="editForm[password]" id="password" title="Password" class="input-text required-entry validate-password" type="password">
                    <br /><span class="remark">4 to 20 characters (A-Z, a-z, 0-9, no space).<span class="red">Case sensitive.</span></span>
                </div>
                <div class="clear"></div>
            </div>

            <div id="u_reg_password_confirm" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b>Confirm Password:</b></div>
                <div class="rowf_per70">
                    <input type="password" name="pwd2" id="pwd2" maxlength="20" size="25" onblur="CheckVerifyUserPwd('pwd', 'pwd2', 'u_reg_password_confirm', 'alert_reg_pwd_2', 0);">
                    <span id="alert_reg_pwd_2" class="alert_remark"></span>
                </div>
                <div class="clear"></div>
            </div>


            <div id="u_reg_myname" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b> My Name is</b>:</div>
                <div class="rowf_per70">
                    <select name="uGender" id="uGender"><option value="" style="color:#999;">select</option><option value="Mr.">Mr.</option><option value="Ms.">Ms.</option></select>
                    &nbsp;&nbsp; <input name="uFirstName" id="uFirstName" type="text" size="25" maxlength="30" value="First Name" class="initval" onfocus="InputFocusClearTip('uFirstName', '', 'First Name');" onblur="CheckVerifyUserMyName('uFirstName', 'u_reg_myname', 0);">
                    &nbsp;&nbsp; <input name="uLastName" id="uLastName" type="text" size="25" maxlength="30" value="Last Name" class="initval" onfocus="InputFocusClearTip('uLastName', '', 'Last Name');" onblur="CheckVerifyUserMyName('uLastName', 'u_reg_myname', 0);">
                    <span id="alert_reg_myname" class="alert_remark"></span>
                </div>
                <div class="clear"></div>
            </div>


            <div id="u_reg_country" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b>Country / Region:</b></div>
                <div class="rowf_per70">

                    <select name="uCountry" id="uCountry" size="10" onchange="CheckVerifyUserCountry('uCountry', 'u_reg_country', 'alert_reg_country', 0);">
                        <option value="CA"><img src="../images/ico_country/CA.gif" border="0" align="absmiddle" />Canada</option>
                        <option value="FR"><img src="../images/ico_country/FR.gif" border="0" align="absmiddle" />France</option>
                        <option value="DE"><img src="../images/ico_country/DE.gif" border="0" align="absmiddle" />Germany</option>
                        <option value="IT"><img src="../images/ico_country/IT.gif" border="0" align="absmiddle" />Italy</option>
                        <option value="GB"><img src="../images/ico_country/GB.gif" border="0" align="absmiddle" />United Kingdom</option>
                        <option value="US"><img src="../images/ico_country/US.gif" border="0" align="absmiddle" />United States</option>
                        <option value="">---- All Countries &amp; Territories (A to Z) ----</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN" selected="selected">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="ZR">Congo</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote D'Ivoire</option>
                        <option value="HR">Croatia (local name: Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="CD">Democratic Republic of the Congo</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="FX">France Metropolitan</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and Mc Donald Islands</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran (Islamic Republic of)</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle Of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libyan Arab Jamahiriya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="KP">North Korea</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestine</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Islands</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia (Slovak Republic)</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and The South Sandwich Islands</option>
                        <option value="KR">South Korea</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SH">St. Helena</option>
                        <option value="PM">St. Pierre and Miquelon</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VA">Vatican City State (Holy See)</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="VI">Virgin Islands (U.S.)</option>
                        <option value="WF">Wallis And Futuna Islands</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                        <option value="GG">Guernsey</option>
                        <option value="TL">Timor-Leste (East Timor)</option>
                    </select>
                    <span id="alert_reg_country" class="alert_remark"></span>
                </div>
                <div class="clear"></div>
            </div>


            <div id="u_reg_usertype" class="rowfull">
                <div class="rowf_per25tr"><b>Best describes you:</b></div>
                <div class="rowf_per70">
                    <select name="usertype" id="usertype"><option value="0">please select</option><option value="1">Wholesale</option><option value="2">Common</option><option value="3">Drop-ship wholesale</option></select>
                </div>
                <div class="clear"></div>
            </div>


            <div id="u_reg_verification_code" class="rowfull">
                <div class="rowf_per25tr"><span class="red_star">*</span><b>Verification Code:</b></div>
                <div class="rowf_per70">
                    <input name="numVerify" id="numVerify" type="text" maxlength="4" size="10" onkeypress="event.returnValue=IsDigit();" onblur="CheckVerificationCode('numVerify', 'numVerifyConfirm', 'u_reg_verification_code', 'rowfull', 0);"> &nbsp; <span class="span_num_verify">2120</span><input name="numVerifyConfirm" id="numVerifyConfirm" type="hidden" value="2120" />
                    <span id="alert_verification_code" class="alert_remark"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="rowfull">
                <div class="rowf_per25tr">&nbsp;</div>
                <div class="rowf_per70">
                    <input name="Submit" type="submit"  value="Submit &amp; Continue" id="js_registBtn" class="redBtn btn_submit btn_big">
                    <div class="blank10px"></div>
                    <span class="gray_dark">Click "Submit &amp; Continue" button, which means you have read and agree to <a href="http://www.uobdii.com/info/Privacy-Policy" target="_blank"><b>Privacy Policy of UOBDII.com</b></a>.</span>
                </div>
                <div class="clear"></div>
            </div>
        </form>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php
$requiredValidate 			= Yii::$service->page->translate->__('This is a required field.');
$emailFormatValidate 		= Yii::$service->page->translate->__('Please enter a valid email address. For example johndoe@domain.com.');
$firstNameLenghtValidate 	= Yii::$service->page->translate->__('first name length must between');
$lastNameLenghtValidate 	= Yii::$service->page->translate->__('last name length must between');
$passwordLenghtValidate 	= Yii::$service->page->translate->__('Please enter 6 or more characters. Leading or trailing spaces will be ignored.');
$passwordMatchValidate 		= Yii::$service->page->translate->__('Please make sure your passwords match. ');
//$minNameLength = 2;
//$maxNameLength = 20;
//$minPassLength = 6;
//$maxPassLength = 30;

?>
<script>
    <?php $this->beginBlock('customer_account_register') ?>
    $(document).ready(function(){

        $("#js_registBtn").click(function(){
            validate = 1;
            $(".validation-advice").remove();
            $(".validation-failed").removeClass("validation-failed");

            var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            // empty check
            $(".account-register .required-entry").each(function(){
                val = $(this).val();
                if(!val){
                    $(this).addClass("validation-failed");
                    $(this).parent().append('<div class="validation-advice" id="advice-required-entry-firstname" style=""><?= $requiredValidate; ?></div>');
                    validate = 0;
                }
            });

            // email check
            $(".account-register .validate-email").each(function(){
                email = $(this).val();
                if(email){
                    if(!$(this).hasClass("validation-failed")){
                        if(!myreg.test(email)){
                            $(this).parent().append('<div class="validation-advice" id="advice-validate-email-email_address" style=""><?= $emailFormatValidate; ?></div>');
                            $(this).addClass("validation-failed");
                            validate = 0;
                        }
                    }
                }else{
                    validate = 0;
                }
            });

            //first name lenght check;
            firstname 	= $("#firstname").val();
            lastname 	= $("#lastname").val();
            password  	= $("#password").val();
            confirmation= $("#confirmation").val();
            minNameLength = <?= $minNameLength ? $minNameLength : 4 ?>;
            maxNameLength = <?= $maxNameLength ? $maxNameLength : 30 ?>;
            minPassLength = <?= $minPassLength ? $minPassLength : 4 ?>;
            maxPassLength = <?= $maxPassLength ? $maxPassLength : 30 ?>;
            firstNameLength = firstname.length;
            lastNameLength  = lastname.length;
            passwordLength  = password.length;
            //firstname length validate
            if(firstNameLength < minNameLength || firstNameLength > maxNameLength){
                if(!$("#firstname").hasClass("validation-failed")){
                    //alert(111);
                    $("#firstname").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $firstNameLenghtValidate; ?> '+minNameLength+' , '+maxNameLength+'</div>');
                    $("#firstname").addClass("validation-failed");
                    validate = 0;
                }
            }
            //lastname length validate
            if(lastNameLength < minNameLength || lastNameLength > maxNameLength){
                if(!$("#lastname").hasClass("validation-failed")){
                    //alert(111);
                    $("#lastname").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $lastNameLenghtValidate; ?> '+minNameLength+' , '+maxNameLength+'</div>');
                    $("#lastname").addClass("validation-failed");
                    validate = 0;
                }
            }
            //password length validate
            if(passwordLength < minPassLength || passwordLength > maxPassLength){
                if(!$("#password").hasClass("validation-failed")){
                    //alert(111);
                    $("#password").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $passwordLenghtValidate; ?> </div>');
                    $("#password").addClass("validation-failed");
                    validate = 0;
                }
            }
            //password validate
            if(confirmation != password){
                if(!$("#confirmation").hasClass("validation-failed")){
                    //alert(111);
                    $("#confirmation").parent().append('<div class="validation-advice" id="min_lenght" style=""><?= $passwordMatchValidate; ?></div>');
                    $("#confirmation").addClass("validation-failed");
                    validate = 0;
                }
            }


            if(validate){
                //	alert("validate success");
                $(this).addClass("dataUp");
                $("#form-validate").submit();
            }
        });
    });
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['customer_account_register'],\yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>





