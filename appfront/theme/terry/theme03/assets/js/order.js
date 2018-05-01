// JavaScript Document for Inquiry
function CheckoutPaypalExpress(sc_mode)
{
	if (sc_mode=="2"){
		if (document.getElementById("o_ship_country").value==""){
			document.getElementById("form_jumpto_checkout_papal_ecs").action="";
			CountryCurrencyChoose('Choose',"/app/order.asp");
//			alert ("Please choose your shipping country or region.");
//			document.getElementById("oShipCountry").focus();
			return false;
		}
	}
	return true;
}


function GetShipToCountry() {
	if (document.getElementById("o_ship_country").value==""){
		return false;
	}
	return true;
}


function GotoWhereAction(strAction)
{
document.formAddOrder.Action.value=strAction;
document.formAddOrder.submit();
}

function OrderRemove(strItem)
{
document.formAddOrder.Action.value="Remove";
document.formAddOrder.operateItem.value=strItem;
document.formAddOrder.submit();
}

function OrderUpdate(strItem)
{
document.formAddOrder.Action.value="Update";
document.formAddOrder.operateItem.value=strItem;
document.formAddOrder.submit();
}

function OrderQtyUpdate(strItem)
{
document.formAddOrder.Action.value="Update";
document.formAddOrder.operateItem.value=strItem;
document.formAddOrder.submit();
}


function OrderSetCouponCode()
{
	if (document.getElementById("CouponCode").value==""){
		alert ("Please input in an acceptable coupon code.");
		document.getElementById("CouponCode").focus();
		return false;
	}
	document.formAddOrder.Action.value="SetCouponCode";
	document.formAddOrder.submit();
}


function ShowHideUpdateSpan(thisInputID,thisInputValueOri,thisSpanID,strItem)
{
var thisInputValue;
var txt_thisSpan="";
thisInputValue=thisInputID.value;
	if (thisInputValue!=thisInputValueOri){
		txt_thisSpan="<br /><a href=\"javascript:void(0);\" onclick=\"javascript:OrderQtyUpdate(&quot;"+strItem+"&quot;);return false;\"><b>Update</b></a>"
		document.getElementById(thisSpanID).innerHTML = txt_thisSpan;
	}
		else if (thisInputValue==thisInputValueOri){
		document.getElementById(thisSpanID).innerHTML = txt_thisSpan;
	}
}



function AddressBookChoose(addID) {
	document.getElementById("shippingAddressID").value=addID;
	document.getElementById("formOrderAddressChoose").submit();
}


//2010-10-5  准备废弃
function AddressBookReset() {
	document.getElementById("order_addr_ship_s").style.display="";
	document.getElementById("order_addr_ship_c").style.display="";
	document.getElementById("txt_alert_order_addr").innerHTML="";
	document.getElementById("txt_alert_order_addr").style.display="none";
	document.getElementById("order_addr_bill_s").style.display="none";
	document.getElementById("order_addr_bill_c").style.display="none";
}


function checkOrderAddressChoose() {
	if ((document.getElementById("shippingAddressID").value=="")||(document.getElementById("billingAddressID").value=="")){
		document.getElementById("txtAlertOrderAddressChoose").innerHTML="<img src=\"/images/ico/ico_f.gif\" hspace=\"5\" border=\"0\" align=\"absmiddle\" />Please select Shipping Address.<br /><br />";
		return false;
	}
	return true;
}






function CheckFormOrderConfirm() {
	if (CheckOrderEmail(document.getElementById("email"),'txtOrderEmail')==false){
		return false;
		}
	return true;	
}


function CheckOrderEmail(thisInputID,txtDivID) {
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





function VH_Country_Select(sIsShow, sCountryCurr){
	if (sIsShow="show"){
		var url = "/ajax/order_country_select.asp?val_country=" + escape(sCountryCurr);
		$.get(url, function(sMsg){
			$("#v_h_country_select").html(sMsg);
		})
	}
	AreaShowHide("v_h_country_select");
	AreaShowHide("v_h_country_slt_txt");
}

function Up_Country_Select(sCountryChooseID){
	if (sCountryChooseID.value==""){
		alert("Please select one valid value.");
		return false;
	}
	document.getElementById("o_ship_country").value=sCountryChooseID.value;
	GotoWhereAction("UpShipCountry");
}




function Up_Payment_Method(sPayMethod){
	var url = "/ajax/payment_method.asp?sPayMethod=" + escape(sPayMethod);
	$.get(url);
}






//操作单个区域显示隐藏
function OrderStepCSSswitch(areaID){
	var areaID=document.getElementById(areaID);
	if(areaID.className=="o_stp_s_off")	{
		areaID.className="o_stp_s_on";
	}
	else {
		areaID.className="o_stp_s_off";
	}
}


//判断是否选择Payment Method
function OrderChoosePaymentMethod(n_PaymentMethod,v_isDropShip) {
	var v_PaymentMethod = GetRadioBoxValue(n_PaymentMethod);
	if ((v_PaymentMethod=="")||(v_PaymentMethod=="undefined")){
		alert("Please choose Payment Method.");
		return false;
	}
//	if ((v_PaymentMethod=="PayPalECS")&&(v_isDropShip!="1")){
//		OrderGotoShoppingCart("BuyItNow");
//	}
//	else {
		window.location.href='order_address.asp';	
//	}
}


function OrderGotoShoppingCart(sAddMethod) {
	document.getElementById("AddMethod").value=sAddMethod;
	document.getElementById("formGotoShoppingCart").submit();
}