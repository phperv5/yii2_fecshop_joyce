// JavaScript Document
//获取radio单选值
function GetRadioBoxValue(sRadioName){
	var obj = document.getElementsByName(sRadioName);		//这个是以标签的name来取控件
	for (i=0;i<obj.length;i++){
		if(obj[i].checked){
			return obj[i].value;
		}
	}
	return "undefined";
}


function IsDigit(){
	return ((event.keyCode >= 48) && (event.keyCode <= 57));
}


function InnerHTML(sDivID, sValue){
	document.getElementById(sDivID).innerHTML=sValue;
}


function IsEmailAddress(sEmail){
	if ((sEmail=="")||(sEmail.length<5)){
		return false;
	}
	if ((sEmail.charAt(0)==".")||(sEmail.charAt(0)=="@")||(sEmail.indexOf('@', 0) == -1)||(sEmail.indexOf('.', 0) == -1)||(sEmail.lastIndexOf("@")==sEmail.length-1)||(sEmail.lastIndexOf(".")==sEmail.length-1)){
		return false;
	}
	return true;
}


//搜索
function CF_Search(){
	if ((document.formSearch.q.value == "" )||(document.formSearch.q.value == "Product name or keywords")){
		alert ("Please input a search term.");
		document.formSearch.q.focus();
		return false;
	}
	return true;
}


function InputCss(sIptID, sSort){
	if (sSort=="focus"){
		sIptID.className="input_focus";
	}
	else if (sSort=="error"){
		sIptID.className="input_error";
	}
	else{
		sIptID.className="input_normal";
	}
}


function InputFocus(sIptID) {
	sIptID.className="input_focus";
}


function InputCheckInnerHTML(sDivID, sSort, sExStr){
	if (sSort=="ok") {
//		var txtValue="<img src=\"/images/ico/ico_t.gif\" hspace=\"5\" border=\"0\" align=\"absmiddle\" />";
		var txtValue="<span class=\"alert_ok\">ok</span>";
	}
	else {
//		var txtValue="<img src=\"/images/ico/ico_f.gif\" hspace=\"5\" border=\"0\" align=\"absmiddle\" /><br />" + str;
		var txtValue="<span class=\"alert_ng\">X</span><br />" + sExStr;
	}
	InnerHTML(sDivID, txtValue);
}

//2012-09-12,不换行
function InputCheckInner(sDivID, sSort, sExStr){
	if (sSort=="ok") {
		var txtValue = "<span class=\"alert_ok\">ok</span>";
	}
	else {
//		var txtValue = str;
		var txtValue="<span class=\"alert_ng\">X</span> " + sExStr;
	}
	InnerHTML(sDivID,txtValue);
}



//区域显示、隐藏
//操作单个区域显示隐藏
function AreaShowHide(areaID)
{
	var areaID=document.getElementById(areaID);
	if(areaID.style.display=="none")
	{
		areaID.style.display="";
	}
	else
	{
		areaID.style.display="none";
	}
}

//操作多个区域显示隐藏，无菜单
function AreaMultiShowHide(p_area_prefix,p_sum_area,p_curr_area)
{
	var area_id_current = p_area_prefix + p_curr_area;
	for (i=1;i<p_sum_area+1;i++)
	{
		area_id_circle = p_area_prefix + i;
		if (area_id_current == area_id_circle)
		{
			document.getElementById(area_id_circle).style.display = "";
		}
		else
		{
			document.getElementById(area_id_circle).style.display = "none";
		}
	}
}

//操作多个区域显示隐藏，含切换菜单css
function AreaMultiMenuShowHide(mA,aA,iAll,iA,css_on,css_off)
{
	var m,a,cM,cA;
	cM=mA+iA;
	cA=aA+iA;
	for (i=1;i<iAll+1;i++)
	{
		m=mA+i;
		a=aA+i;
		if (document.getElementById(m)!=undefined) {
			if (m==cM)
			{
				document.getElementById(m).className = css_on;
				document.getElementById(a).style.display = "";
			}
			else
			{
				document.getElementById(m).className = css_off;
				document.getElementById(a).style.display = "none";
			}
		}

	}
}




//货币类型转换成数字类型
function GetDecimal2Num(f,c)
{
	var t = Math.pow(10, c);
	return Math.round(f * t) / t;
}



//input错误警告，ajax方式
function AlertInputTxt(is_error,id_input,id_span,str_error)
{
	if (is_error=="yes")
	{
		InputCss(id_input,'error');
		InputCheckInnerHTML(id_span,"ng",str_error);
		return false;
	}
	else
	{
		InputCss(id_input,'');
		InputCheckInnerHTML(id_span,"ok","");
		return true;
	}
}







//begin js for proup
var millisec = 250;
var timeoutId;
var visiblePopup = null;

function PopupShowHide(popdivId)
{
	if(document.getElementById)
	{
		var obj = document.getElementById(popdivId);
		if(obj.style.visibility == "hidden" || obj.style.visibility == "")
		{
			obj.style.visibility = "visible";
    		PopupHide();
			visiblePopup=popdivId;
		}
		else
			PopupHide();
	}
	return false;
}

function HideDelay()
{
	PopupClear();
	timeoutId = setTimeout(function(){PopupHide()}, millisec);
}

function PopupHide()
{
	PopupClear();
	if(visiblePopup!=null)
	{
		var o = document.getElementById(visiblePopup);		
		visiblePopup=null;
		o.style.visibility = "hidden";
	}
	return false;
}

function PopupClear()
{
	if(typeof timeoutId != "undefined")
	{
		clearTimeout(timeoutId);
	}
}
//end for popup








//N秒后自动清空指定区域内容
function AreaBlankAuto(sSecs, sSecID, sAreaID){
	if(--sSecs>0) {
		setTimeout("AreaBlankAuto('"+sSecs+"','"+sSecID+"','"+sAreaID+"')",1000);
		if (sSecID!=""){document.getElementById(sSecID).innerHTML = sSecs;}
	} else {
		document.getElementById(sAreaID).innerHTML = "";
	}
}


//判断验证码是否正确
function CheckNumVerify(sIptID,sDivID){
	var isError="";
	if ((sIptID.value=="")||(sIptID.value.length!=4)||(sIptID.value!=document.getElementById("numVerifyConfirm").value)){
		isError="yes";
		strError="Invalid Verification Code."
	}

	if (isError=="yes"){
		InputCss(sIptID,'error');
		InputCheckInner(sDivID,"ng",strError);
		return false;
	}
	else {
		InputCss(sIptID,'');
		InputCheckInner(sDivID,"ok","");
		return true;
	}

}







//Header相关 2015-05-21 功能合并
function SiteHeader(sPageWhere) {
	var vFromURL = document.referrer;			//上一页URL
	var vCurrURL = window.location.href;		//当前URL
	var url = "/ajax/site_header.asp?PageWhere=" +sPageWhere+ "&FromURL=" + escape(vFromURL) + "&CurrURL=" + escape(vCurrURL) + "&t="+Math.random()
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSpitMsg = vMsg.split("#}");
		var vShoppingCart = $.trim(vSpitMsg[0]);
		var vSignInOrNo = $.trim(vSpitMsg[1]);
		var vImportantNotice = $.trim(vSpitMsg[2]);
			if (vShoppingCart!=""){$("#str_num_mycart").html(vShoppingCart);}
			if (vSignInOrNo!=""){$("#hd_f_signin").html(vSignInOrNo);}
			if (vImportantNotice!=""){$("#hd_important_notice").html(vImportantNotice);}
//		alert(sMsg);
//		alert(vImportantNotice);
	});
}


//邮件跟踪功
function EDMtracking() {
	var vCurrURL = window.location.href;		//当前URL
	var url = "/ajax/edm_tracking.asp?CurrURL=" + escape(vCurrURL) + "&t="+Math.random()
	$.get(url);
}


//以下与多币种相关函数
//选择国家、货币
function CountryCurrencyChoose(sAct, sReloadURL) {
	var url = "/ajax/country_currency.asp?act=" + escape(sAct) + "&ReloadURL=" + escape(sReloadURL);
	$.get(url, function(sMsg){
		layer.open({
			type: 1,
			title: false,
			area: '500px',
//			shade:false,
//			offset: 'rb',
//			offset: '45px',
			offset: ['45px','right'],
			shadeClose: true,
			shift:1,
			content: sMsg,
		});
		}
	)
}


function CountryCurrencyChange(sAct, sFormID, sReloadURL){
	var strSendTo = $("#"+sFormID).serialize()
	var url = "/ajax/country_currency.asp?act=" + escape(sAct) + "&ReloadURL=" + escape(sReloadURL);
	$.post(url, strSendTo, function(sMsg){
		layer.closeAll('page');
		if (sReloadURL!=""){window.location.href=sReloadURL;}
		else {CountryCurrencyInitialize('');}
	})
}


function CountryCurrencyInitialize(sCurrCode){
	var url = "/ajax/country_currency.asp?uCurrencyCode=" + escape(sCurrCode);
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSpitMsg = vMsg.split("}");
		$("#hd_country_curr_code").html(vSpitMsg[0]);
		sCurrCur = vSpitMsg[1];
		sCurrAll = vSpitMsg[2];
		if ((sCurrCur!="")&&(sCurrAll!="")){
			s_oValue=sCurrAll.split("|");
			for(i=0;i<s_oValue.length;i++){
				if (sCurrCur!=s_oValue[i]){
					var id_curr_code_v=document.getElementsByName("cc_v_"+s_oValue[i]);
					for(i_cur=0;i_cur<id_curr_code_v.length;i_cur++){
						if (id_curr_code_v[i_cur].style.display!="none"){
							id_curr_code_v[i_cur].style.display="none";
						}
					}
				} else if (sCurrCur==s_oValue[i]) {
					var id_curr_code_v=document.getElementsByName("cc_v_"+sCurrCur);
					for(i_cur=0;i_cur<id_curr_code_v.length;i_cur++){
						if (id_curr_code_v[i_cur].style.display!=""){
							id_curr_code_v[i_cur].style.display="";
						}
					}
				}
			}
		}
	})
}





//2016-04-01 改写

//返回页首: sDivScrTopID 定位；sDivScrTopDistance 增加或减少的像素
function GotoScrollTop(sIsGoTop, sDivScrTopID, sDivScrTopDistance, sDivCssID, sDivCssStr, sInputFocusID){
	if (sDivCssID!=""){
		ResetCSS(sDivCssID, sDivCssStr);
	}
	if ((sIsGoTop==1)&&(sDivScrTopID!="")){
		$('html,body').animate({scrollTop:$("#"+sDivScrTopID).offset().top-sDivScrTopDistance},1000);//定位到该位置
	}
	if (sInputFocusID!=""){
		document.getElementById(sInputFocusID).focus();
	}
}

//更改CSS
function ResetCSS(sDivID, sCssStr){
	if (sDivID!=""){
		document.getElementById(sDivID).className = sCssStr;
	}
}

//Alert 提示为OK
function SpanAlertOKNG(sDivID, sOKorNG, sMsg){
	if (sOKorNG=="OK"){
		ResetCSS(sDivID, "alert_ok")
		$("#"+sDivID).html(sMsg);
	} else if (sOKorNG=="NG"){
		ResetCSS(sDivID, "alert_ng")
		$("#"+sDivID).html(sMsg);
	}
}

//清除输入框提示
function InputFocusClearTip(sDivID, sCssStr, sValOri){
	if ($("#"+sDivID).val()==sValOri){
		$("#"+sDivID).val('');
		ResetCSS(sDivID, sCssStr);
	}
}


//判断验证码是否正确
function CheckVerificationCode(sInputID, sConfirmInputID, sDivID, sDivCssOri, sIsGoTop){
	var vCheck = document.getElementById(sInputID).value;
	if ((vCheck=="")||(vCheck.length!=4)||(vCheck!=document.getElementById(sConfirmInputID).value)){
		GotoScrollTop(sIsGoTop, sDivID, 50, sDivID, sDivCssOri+' alert_div', sIsGoTop);
		return false;
	}
	else {
		ResetCSS(sDivID, sDivCssOri);
		SpanAlertOKNG('alert_verification_code', 'OK', 'OK.')
		return true;
	}
}


//ajax中的分页函数
function PaginationAjax(sRtnDivID, sURLbasic, sURLpara, sIsBegin){
	var url;
	if (sIsBegin=="begin"){
		if (sURLpara!=""){
			url = sURLbasic + "?" + sURLpara + "&txtDivID_ajax=" + sRtnDivID + "&thisURL_ajax=" + sURLbasic;
		}
		else{
			url = sURLbasic + "?" + "txtDivID_ajax=" + sRtnDivID + "&thisURL_ajax=" + sURLbasic;
		}
	}
	else{
		if (sURLpara!=""){
			url = sURLbasic + "?" + sURLpara;
		}
		else{
			url = sURLbasic;
		}
	}
	document.getElementById(sRtnDivID).innerHTML = "<div class=\"blank5px\"></div><div class=\"loading\"></div>";
	$.get(url, function(sMsg){
		$("#"+sRtnDivID).html(sMsg);
	})
}



//2016-09-01 Send Email
function MailRelaySend(sIsDisplaySending, sRtnDivID, sMailTo, sMailTName, sMailCC, sMailSort, sRefID, sRefStr ) {
	if (sIsDisplaySending=="1"){ $("#"+sRtnDivID).html("<div class=\"loading_img_mail\"></div>Sending email ..."); }		//是否提示正在发送：必有sRtnDivID
	var url = "/ajax/email.send.asp";
	$.post(url, { sMailTo:sMailTo, sMailTName:sMailTName, sMailCC:sMailCC, sMailSort:sMailSort, sRefID:sRefID, sRefStr:sRefStr }, function(sMsg){
		vMsg = $.trim(sMsg);
		//注意不同服务商的返回值是不同的
//		if (vMsg.indexOf("string(2) \"OK\"")>=0) {		//判断发送成功
		if (vMsg=="OK") {		//判断发送成功
			if (sRtnDivID!=""){ $("#"+sRtnDivID).html("<b class=green>An email sent to <i>"+ sMailTo +"</i> successfully. Please check.</b>"); }
			MailSentUpdateReleaseStatus('success', sMailTo, sMailSort, sRefID, sRefStr);
		}
		else {
			if (sRtnDivID!=""){ $("#"+sRtnDivID).html("<b class=red>Delivery to the recipient <i>"+ sMailTo +"</i> failed. Please contact us.</b>"); }
		}
	})
}


//2016-09-01 Email发送成功,修改相关状态
function MailSentUpdateReleaseStatus(sSentStatus, sMailTo, sMailSort, sRefID, sRefStr){
	var url = "/ajax/email_sent_update.asp?sSentStatus=" + escape(sSentStatus) + "&sMailSort=" + escape(sMailSort) + "&sRefID=" + escape(sRefID) + "&sRefStr=" + escape(sRefStr) + "&t="+Math.random()
	$.post(url, { sSentStatus:sSentStatus, sMailTo:sMailTo, sMailSort:sMailSort, sRefID:sRefID, sRefStr:sRefStr });
}

//2016-09-01 快速支付后续处理
function PpecPhpSubseProce(sUserIDreg, sOrderIDnew, sOrderIDpaid, sUserID, sUserEmail, sUserName, sUserType, sUserMyName, sUserIsLimited){
	var url = "/ajax/order_after_ppec.asp";
	$.post(url, { sUserIDreg:sUserIDreg, sOrderIDnew:sOrderIDnew, sOrderIDpaid:sOrderIDpaid, sUserID:sUserID, sUserEmail:sUserEmail, sUserName:sUserName, sUserType:sUserType, sUserMyName:sUserMyName, sUserIsLimited:sUserIsLimited }, function(sMsg){
		vMsg = $.trim(sMsg);
		if (vMsg=="OK"){
			SiteHeader('Page');			
		}
	});
}


//2016-09-16 产品多币种价格
function ProMultiPriceRef(sContentID, sTrigID){
	layer.tips($("#"+sContentID).html(), '#'+sTrigID, {
		tips: [2, '#E2E2AB'],
		time: 30000,
		closeBtn: true,
	});
}


//2016-09-16 Wish产品列表 改写
function MyWishPro(sDispSort, sWishSort, sRtnDivID){
	if (sDispSort=="Row") {
		var url = "/ajax/pro_wish_row.asp?sWishSort=" +escape(sWishSort)+ "&t="+Math.random()
	}
	else if (sDispSort=="List") {
		var url = "/ajax/pro_wish_list.asp?sWishSort=" +escape(sWishSort)+ "&t="+Math.random()
	}
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		$("#"+sRtnDivID).html(sMsg);
	})
}


//2017-02-23
function ProPeriodPriceReset(sPeriodPriceProIDs, sPeriodPriceDisplayIDs, sPeriodPriceStyle){
	var url = "/ajax/pro_period_price.asp?sPeriodPriceProIDs=" + escape(sPeriodPriceProIDs) + "&sPeriodPriceStyle=" + escape(sPeriodPriceStyle) + "&t="+Math.random();
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSptMsgPPP = vMsg.split("#}");
		vPeriPriDisp = sPeriodPriceDisplayIDs.split("|");
			for(i=0;i<vSptMsgPPP.length;i++){
				if (vSptMsgPPP[i]!=""){
					$("#"+vPeriPriDisp[i]).html(unescape(vSptMsgPPP[i]));
				}
			}
	})
}


//2017-02-23
function ProRelatedPros(sRelatedIDsch, sNumEachRow, sRelatedTitleText, sRtnDivID) {
	var url = "/ajax/pro_related_row.asp?sRelatedIDsch=" +escape(sRelatedIDsch) + "&sNumEachRow=" +escape(sNumEachRow) + "&sRelatedTitleText=" +escape(sRelatedTitleText) +"&t="+Math.random()
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		$("#"+sRtnDivID).html(sMsg);
	})

}