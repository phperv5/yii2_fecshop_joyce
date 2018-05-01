// JavaScript Document
function CheckFormTicketRequest() {
	if (CheckVerifyInfoTitle(document.getElementById("InfoTitle"),'txtInfoTitle')==false){
		return false;
		}
	if (CheckVerifyInfoDetail(document.getElementById("InfoDetail"),'txtInfoDetail')==false){
		return false;
		}
	return true;
}


function CheckFormSupportQuestion() {
	if (CheckVerifyInfoTitle(document.getElementById("InfoTitle"),'txtInfoTitle')==false){
		return false;
		}
	if (CheckVerifyInfoDetail(document.getElementById("InfoDetail"),'txtInfoDetail')==false){
		return false;
		}
	if (CheckVerifyuName(document.getElementById("uName"),'txtuName')==false){
		return false;
		}
	if (CheckVerifyuEmail(document.getElementById("uEmail"),'txtuEmail')==false){
		return false;
		}
	if (CheckNumVerify(document.getElementById("numVerify"),'txtIDnumVerify')==false){
		return false;
	}
	return true;
}





function CheckVerifyInfoTitle(thisInputID,txtDivID) {
	var txtExtra="";
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="Please type subject."
	}

	if (isError=="yes"){
		InputCss(thisInputID,'error');
		InputCheckInnerHTML(txtDivID,"ng",strError);
		return false;
	}
	else {
		InputCss(thisInputID,'');
		InputCheckInnerHTML(txtDivID,"ok","");
		return true;
	}

}



function CheckVerifyInfoDetail(thisInputID,txtDivID) {
	var txtExtra="";
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="Please type subject."
	}

	if (isError=="yes"){
		InputCss(thisInputID,'error');
		InputCheckInnerHTML(txtDivID,"ng",strError);
		return false;
	}
	else {
		InputCss(thisInputID,'');
		InputCheckInnerHTML(txtDivID,"ok","");
		return true;
	}

}





function CheckVerifyuName(thisInputID,txtDivID) {
	var txtExtra="";
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="Please type your First & Last Name."
	}

	if (isError=="yes"){
		InputCss(thisInputID,'error');
		InputCheckInnerHTML(txtDivID,"ng",strError);
		return false;
	}
	else {
		InputCss(thisInputID,'');
		InputCheckInnerHTML(txtDivID,"ok","");
		return true;
	}

}


function CheckVerifyuEmail(thisInputID,txtDivID) {
	var txtExtra="";

	var isError="";
	if ((thisInputID.value=="")||(thisInputID.value.length<5)){
		isError="yes";
		strError="Please check it. Your email address should look like \"ab@cd.com\".";
	}
	if ((thisInputID.value.charAt(0)==".")||(thisInputID.value.charAt(0)=="@")||(thisInputID.value.indexOf('@', 0) == -1)||(thisInputID.value.indexOf('.', 0) == -1)||(thisInputID.value.lastIndexOf("@")==thisInputID.value.length-1)||(thisInputID.value.lastIndexOf(".")==thisInputID.value.length-1)){
		isError="yes";
		strError="Please check it. Your email address should look like \"ab@cd.com\".";
	}


	if (isError=="yes"){
		InputCss(thisInputID,'error');
		InputCheckInnerHTML(txtDivID,"ng",strError);
		return false;
	}
	else {
		InputCss(thisInputID,'');
		InputCheckInnerHTML(txtDivID,"ok","");
		return true;
	}

}
