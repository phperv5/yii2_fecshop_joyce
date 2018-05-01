// JavaScript Document
function CheckFormGetPass(){
	if (CheckGetPassEmail(document.getElementById("email"),'txtIDgetPassEmail')==false){
		return false;
	}
	if (CheckNumVerify(document.getElementById("numVerify"),'txtIDnumVerify')==false){
		return false;
	}
}

function CheckGetPassEmail(thisInputID,txtDivID) {
	var isError="";
	if ((thisInputID.value=="")||(thisInputID.value.length<5)){
		isError="yes";
		strError="Please check it. Your email address should look like ab@cd.com."
	}
	if ((thisInputID.value.charAt(0)==".")||(thisInputID.value.charAt(0)=="@")||(thisInputID.value.indexOf('@', 0) == -1)||(thisInputID.value.indexOf('.', 0) == -1)||(thisInputID.value.lastIndexOf("@")==thisInputID.value.length-1)||(thisInputID.value.lastIndexOf(".")==thisInputID.value.length-1)){
		isError="yes";
		strError="Please check it. Your email address should look like ab@cd.com."
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

