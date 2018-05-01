// for sign in
function CheckFormSignIn(sRowOriCss) {
	if (CheckVerifySignUserID('Username', 'u_sign_username', 'alert_sign_username', sRowOriCss, 0)==false){
		return false;
	}
	if (CheckVerifySignPWD('Password', 'u_sign_password', 'alert_sign_password', sRowOriCss, 0)==false){
		return false;
	}
	return true;	
}


function CheckVerifySignUserID(sInputID, sDivID, sSpanAlertID, sRowOriCss, sIsGoTop) {
	var vError="";
	var vCheck = document.getElementById(sInputID).value;
	if (vCheck==""){ vError="Yes"; }
	else {
		if ((vCheck.length<3)||(vCheck.length>50)){ vError="Yes"; }
	}
	var vCharLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-_.@"
	for (i=0; i < vCheck.length; i++){
		var vCharSig = vCheck.charAt(i);
		vCharSig = vCharSig.toUpperCase();
		if (vCharLetters.indexOf(vCharSig) == -1){ vError="Yes"; }
	}

	if (vError=="Yes"){
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, sRowOriCss+' alert_div', '');
		return false;
	}
	else {
		ResetCSS(sDivID, sRowOriCss);
		return true;
	}
}


function CheckVerifySignPWD(sInputID, sDivID, sSpanAlertID, sRowOriCss, sIsGoTop) {
	var vError="";
	var vCheck = document.getElementById(sInputID).value;
	if (vCheck==""){ vError="Yes"; }
	else {
		if ((vCheck.length<4)||(vCheck.length>20)){ vError="Yes"; }
	}

	var vCharLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
	for (i=0; i < vCheck.length; i++){
		var vCharSig = vCheck.charAt(i);
		vCharSig = vCharSig.toUpperCase();
		if (vCharLetters.indexOf(vCharSig) == -1){ vError="Yes"; }
	}

	if (vError=="Yes"){
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, sRowOriCss+' alert_div', '');
		return false;
	}
	else {
		ResetCSS(sDivID, sRowOriCss);
		return true;
	}
}







function CheckFormReg() {
	if (CheckVerifyUserEmail('email', 'u_reg_email', 'alert_reg_email', 'Register', '', 0)==false){ return false; }
	if (CheckVerifyUserPwd('pwd', '', 'u_reg_password', 'alert_reg_pwd', 0)==false){ return false; }
	if (CheckVerifyUserPwd('pwd', 'pwd2', 'u_reg_password_confirm', 'alert_reg_pwd_2', 0)==false){ return false; }
	if (CheckVerifyUserMyName('uFirstName', 'u_reg_myname', 0)==false){ return false; }
	if (CheckVerifyUserMyName('uLastName', 'u_reg_myname', 0)==false){ return false; }
		if ((CheckVerifyUserMyName('uFirstName', 'u_reg_myname', 0)==true)&&(CheckVerifyUserMyName('uLastName', 'u_reg_myname', 0)==true)){ ResetCSS('u_reg_myname', 'rowfull'); SpanAlertOKNG('alert_reg_myname', 'OK', 'OK.');}
	if (CheckVerifyUserCountry('uCountry', 'u_reg_country', 'alert_reg_country', 0)==false){ return false; }
	if (CheckVerificationCode('numVerify', 'numVerifyConfirm', 'u_reg_verification_code', 'rowfull', 0)==false){ return false; }
	return true;
}



function CheckVerifyUserEmail(sInputID, sDivID, sSpanAlertID, sCheckSort, sUserID, sIsGoTop) {
	var vCheck = document.getElementById(sInputID).value;
	vCheck = $.trim(vCheck);
	if (IsEmailAddress(vCheck)==false) {
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'rowfull alert_div', '');
		return false;
	}
	var url = "/ajax/check_acc.asp?sCheckItem=email&email=" + escape(vCheck) + "&sCheckSort="+sCheckSort+"&sUserID="+sUserID+"&t="+Math.random();
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSpitMsg = vMsg.split("#}");
		var vMsgStatus = $.trim(vSpitMsg[0]);
		var vMsgRemark = $.trim(vSpitMsg[1]);
		if (vMsgStatus=='NG'){
			GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'rowfull alert_div', '');
			if (vMsgRemark!='.') { $("#"+sSpanAlertID).html(vMsgRemark); }
			return false;
		}
		else {
			ResetCSS(sDivID, 'rowfull');
			SpanAlertOKNG(sSpanAlertID, 'OK', 'OK.')
//			$("#"+sSpanAlertID).html('');
			return true;
		}
	});
}


function CheckVerifyUserPwd(sInputID, sInputConfirmID, sDivID, sSpanAlertID, sIsGoTop) {
	var vError="";
	var vCheck = document.getElementById(sInputID).value;
	if (sInputConfirmID!=""){
		var vCheConfirm = document.getElementById(sInputConfirmID).value;
	}

	if (vCheck==""){ vError="Yes"; }
	else {
		if ((vCheck.length<4)||(vCheck.length>20)){ vError="Yes"; }
	}

	if (sInputConfirmID!=""){
		if (vCheConfirm==""){ vError="Yes"; }
		else {
			if ((vCheConfirm.length<4)||(vCheConfirm.length>20)){ vError="Yes"; }
		}
	}

	var vCharLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
	for (i=0; i < vCheck.length; i++){
		var vCharSig = vCheck.charAt(i);
		vCharSig = vCharSig.toUpperCase();
		if (vCharLetters.indexOf(vCharSig) == -1){ vError="Yes"; }
	}

	if (sInputConfirmID!=""){
		for (i=0; i < vCheConfirm.length; i++){
			var vCharConfirmSig = vCheConfirm.charAt(i);
			vCharConfirmSig = vCharConfirmSig.toUpperCase();
			if (vCharLetters.indexOf(vCharConfirmSig) == -1){ vError="Yes"; }
		}
		if (vCheck!=vCheConfirm){
			$("#"+sSpanAlertID).html('Password and Confirm Password must match!');
//			GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'alert_div', '');
			ResetCSS(sDivID, 'rowfull alert_div');
			return false;
		}
	}

	if (vError=="Yes"){
//		if (sInputConfirmID!="") { GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'alert_div', sInputConfirmID); }
//		else { GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'alert_div', sInputID); }
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'rowfull alert_div', '');
//		ResetCSS(sDivID, 'rowfull alert_div');
		return false;
	}
	else {
		ResetCSS(sDivID, 'rowfull');
//		$("#"+sSpanAlertID).html('');
		SpanAlertOKNG(sSpanAlertID, 'OK', 'OK.')
		return true;
	}
}


function CheckVerifyUserMyName(sInputID, sDivID, sIsGoTop) {
	var vError="";
	var vCheck = document.getElementById(sInputID).value;
	if (vCheck==""){ vError="Yes"; }
	else {
		if ((vCheck.length<2)||(vCheck.length>20)){ vError="Yes"; }
	}

	if (vError=="Yes"){
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'rowfull alert_div', '');
		return false;
	}
	else {
		ResetCSS(sDivID, 'rowfull');
		return true;
	}

}


function CheckVerifyUserCountry(sInputID, sDivID, sSpanAlertID, sIsGoTop) {
	var vCheck = document.getElementById(sInputID).value;
	if (vCheck==""){
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, 'rowfull alert_div', '');
		return false;
	}
	else {
		ResetCSS(sDivID, 'rowfull');
		SpanAlertOKNG(sSpanAlertID, 'OK', 'OK.')
		return true;
	}
}



