// JavaScript Document

function ProRateStarsView(n){
	for (i=1; i<=5; i++){
		if (i<=n){
			document.getElementById("star_casing_"+i).className = "star_casing_on";
		}
		else{
			document.getElementById("star_casing_"+i).className = "star_casing";
			}
	}
	document.getElementById("pro_RateStars").value = n;
}


function ProReviewEdit(ProRevID){
	document.formProRevEdit.ProRevID.value=ProRevID;
	document.formProRevEdit.submit();
}

function ProReviewDelete(ProRevID){
if(confirm("Are your sure delete this review?")){
	document.formProRevDelete.ProRevID.value=ProRevID;
	document.formProRevDelete.submit();
	}
}



function CheckFormRevAdd(){
	if (CheckVerify_pro_RateStars(document.getElementById("pro_RateStars"),'txt_pro_RateStars')==false){
		return false;
		}
	if ((document.getElementById("ReviewerName")!=null)&&(document.getElementById("ReviewerName")!="undefined")){
//		alert (document.getElementById("ReviewerName").value);
		if (CheckVerifyReviewerName(document.getElementById("ReviewerName"),'txt_ReviewerName')==false){
			return false;
			}
		}
	if ((document.getElementById("ReviewerEmail")!=null)&&(document.getElementById("ReviewerEmail")!="undefined")){
//		alert (document.getElementById("ReviewerEmail").value);
		if (CheckVerifyReviewerEmail(document.getElementById("ReviewerEmail"),'txt_ReviewerEmail')==false){
			return false;
			}
		}
//	if (CheckVerifyReviewSubject(document.getElementById("ReviewSubject"),'txt_ReviewSubject')==false){
//		return false;
//		}
	if (CheckVerifyReviewDetail(document.getElementById("ReviewDetail"),'txt_ReviewDetail')==false){
		return false;
		}

	if (CheckNumVerify(document.getElementById("numVerify"),'txtIDnumVerify')==false){
		return false;
	}

	return true;
}






function CheckFormProReviewEdit() {
	if (CheckVerify_pro_RateStars(document.getElementById("pro_RateStars"),'txt_pro_RateStars')==false){
		return false;
		}
//	if (CheckVerifyReviewSubject(document.getElementById("ReviewSubject"),'txt_ReviewSubject')==false){
//		return false;
//		}
	if (CheckVerifyReviewDetail(document.getElementById("ReviewDetail"),'txt_ReviewDetail')==false){
		return false;
		}
	return true;
}

function CheckVerify_pro_RateStars(thisInputID,txtDivID) {
	var txtExtra="";
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="<b class=red px12>Please select rating stars.</b>"
	}

	if (isError=="yes"){
		InputCheckInnerHTML(txtDivID,"ng",strError);
		return false;
	}
	else {
		InputCheckInnerHTML(txtDivID,"ok","");
		return true;
	}

}



function CheckVerifyReviewSubject(thisInputID,txtDivID) {
	var txtExtra="";
	var isError="";
	if (thisInputID.value==""){
		isError="yes";
		strError="Please type review subject."
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


function CheckVerifyReviewDetail(id_input,id_span) {
	var txtExtra="";
	var is_error="";
	var str_error="";
	if (id_input.value==""){
		is_error="yes";
		str_error="Please type review detail."
	}
	return AlertInputTxt(is_error,id_input,id_span,str_error);
}


function CheckVerifyReviewerName(id_input,id_span) {
	var is_error="";
	var str_error="";
	if (id_input.value==""){
		is_error="yes";
		str_error="Please type Your First & Last Name."
	}
	return AlertInputTxt(is_error,id_input,id_span,str_error);
}

function CheckVerifyReviewerEmail(id_input,id_span) {
	var is_error="";
	var str_error="";
	if ((id_input.value=="")||(id_input.value.length<5)){
		is_error="yes";
		str_error="Please check it. Your email address should look like \"ab@cd.com\".";
	}
	if ((id_input.value.charAt(0)==".")||(id_input.value.charAt(0)=="@")||(id_input.value.indexOf('@', 0) == -1)||(id_input.value.indexOf('.', 0) == -1)||(id_input.value.lastIndexOf("@")==id_input.value.length-1)||(id_input.value.lastIndexOf(".")==id_input.value.length-1)){
		is_error="yes";
		str_error="Please check it. Your email address should look like \"ab@cd.com\".";
	}
	return AlertInputTxt(is_error,id_input,id_span,str_error);
}


function GetNewVerifyCode() {
	var url = "/ajax/pro_rev_wr_user_orno.asp?wrmode=renew";
	$.get(url, function(sMsg){
		$("#span_id_num_verify").html(sMsg);
		document.getElementById("numVerifyConfirm").value = str_return;
	})
}