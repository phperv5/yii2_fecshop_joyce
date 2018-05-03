// JavaScript Document

function CheckFormGetOrderInfo(){
	if ((document.getElementById("TransactionID").value=="") && (document.getElementById("OrderEmail").value=="")){
		CheckGetOrderInfoTransactionID(document.getElementById("TransactionID"),'txtIDTransactionID');
		return false;
	}
	if (document.getElementById("TransactionID").value!=""){
		if (CheckGetOrderInfoTransactionID(document.getElementById("TransactionID"),'txtIDTransactionID')==false){
			return false;
		}
	}

	if (document.getElementById("OrderEmail").value!=""){
		if (CheckGetOrderInfoEmail(document.getElementById("OrderEmail"),'txtIDorderEmail')==false){
			return false;
		}
		if (CheckGetOrderInfoOrderSN(document.getElementById("OrderSN"),'txtIDorderSN')==false){
			return false;
		}
	}

	if (CheckNumVerify(document.getElementById("numVerify"),'txtIDnumVerify')==false){
		return false;
	}
}

function CheckGetOrderInfoTransactionID(thisInputID,txtDivID) {
	var isError="";
	if ((thisInputID.value=="")||(thisInputID.value.length<10)){
		isError="yes";
		strError="Invalid. Please check it."
	}
	var Letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
	for (i=0; i < thisInputID.value.length; i++){
		var CheckChar = thisInputID.value.charAt(i);
		CheckChar = CheckChar.toUpperCase();
		if (Letters.indexOf(CheckChar) == -1){
			isError="yes";
			strError="Invalid. Please check it."
		}
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


function CheckGetOrderInfoEmail(thisInputID,txtDivID) {
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

function CheckGetOrderInfoOrderSN(thisInputID,txtDivID) {
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="Please check your Order Serial No."
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
