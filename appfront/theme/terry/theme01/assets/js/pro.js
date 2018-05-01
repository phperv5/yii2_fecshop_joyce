// JavaScript Document for products show

//History sold, Digg, Product Review，同时输出
function ProAttendantNum(sProID) {
	var url = "/ajax/pro_attendant_num.asp?ProID=" + escape(sProID) + "&rnd=" + Math.random();
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSpitMsg = vMsg.split("|");
		if (vSpitMsg[0]!="") { $("#num_pro_sold_"+sProID).html(vSpitMsg[0]); }
		$("#num_pro_digg_"+sProID).html(vSpitMsg[1]);
		$("#num_pro_review_"+sProID).html(vSpitMsg[2]);
		$("#pro_rate_"+sProID).html(vSpitMsg[3]);
	});
}


//提交Digg，需同步处理；同时输出Digg数量和提示
function ProDiggIt(sProID) {
	var url = "/ajax/pro_digg_it.asp?ProID=" + escape(sProID) + "&rnd=" + Math.random();
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		vSpitMsg = vMsg.split("|");
		switch(vSpitMsg[0]) {
			case "er02001" : $("#sv_pro_digg_"+sProID).html("Product is null"); break;
			case "er00002" : $("#sv_pro_digg_"+sProID).html("Your IP is error."); break;
			case "er02501" : $("#sv_pro_digg_"+sProID).html("Please digg it once in 24 hours."); break;
			case "er02502" : $("#sv_pro_digg_"+sProID).html("Thank you."); $("#num_pro_digg_"+sProID).html(vSpitMsg[1]); break;
		}
	})
}



//技术支持
function ProTechService(sProSerID, sRtnDivID){
	var url = "/ajax/pro_service.asp?id=" + escape(sProSerID);
	$.get(url, function(sMsg){
		$("#"+sRtnDivID).html(sMsg);
	})
}








//订单
function IsOrderNeedSize(sIsNeedSize, sNidSize)
{
	var oSize=document.getElementById(sNidSize);
	if (sIsNeedSize=="Y")
	{
		if ((oSize.value=="")||(oSize==null))
		{
//			document.getElementById("alert_o_need_"+sNidSize).innerHTML = "Please select Language.";
			document.getElementById("id_pro_b_item_"+sNidSize).className="pro_b_item_e";
			return false;
		}
		else
		{
//			document.getElementById("alert_o_need_"+sNidSize).innerHTML = "";
			document.getElementById("id_pro_b_item_"+sNidSize).className="pro_b_item";
		}
	}
}

function IsOrderNeedColor(sIsNeedColor, sNidColor)
{
	var oColor=document.getElementById(sNidColor);
	if (sIsNeedColor=="Y")
	{
		if ((oColor.value=="")||(oColor==null))
		{
//			document.getElementById("alert_o_need_"+sNidColor).innerHTML = "Please select Version.";
			document.getElementById("id_pro_b_item_"+sNidColor).className="pro_b_item_e";
			return false;
		}
		else
		{
//			document.getElementById("alert_o_need_"+sNidColor).innerHTML = "";
			document.getElementById("id_pro_b_item_"+sNidColor).className="pro_b_item";
		}
	}
}

function IsOrderNeedQty(sIsNeedQty, sNidQty)
{
	var oQty=document.getElementById(sNidQty);
	if (sIsNeedQty=="Y")
	{
		if ((oQty.value=="")||(oQty==null)||(oQty.value=="0"))
		{
//			document.getElementById("alert_o_need_"+sNidQty).innerHTML = "Please input Quantity.";
			document.getElementById("id_pro_b_item_"+sNidQty).className="pro_b_item_e";
			return false;
		}
		else
		{
//			document.getElementById("alert_o_need_"+sNidQty).innerHTML = "";
			document.getElementById("id_pro_b_item_"+sNidQty).className="pro_b_item";
		}
	}
}


function ShoppingCartAdd(sProID, sAddMethod, sIsNeedSize, sNidSize, sIsNeedColor, sNidColor, sIsNeedQty, sNidQty){

	var vSize="";
	var vColor="";
	var vQty=1;

	if (sIsNeedSize=="Y"){
		if (IsOrderNeedSize(sIsNeedSize, sNidSize)==false){
			alert("Please select Language.");
			return false;
		}
		vSize = document.getElementById(sNidSize).value;
		document.formOrderAdd.oSize.value = vSize;
	}

	if (sIsNeedColor=="Y"){
		if (IsOrderNeedColor(sIsNeedColor, sNidColor)==false){
			alert("Please select Version.");
			return false;
		}
		vColor = document.getElementById(sNidColor).value;
		document.formOrderAdd.oColor.value = vColor;
	}
	

	if (sIsNeedQty=="Y"){
		if (IsOrderNeedQty(sIsNeedQty, sNidQty)==false){
			alert("Please input Quantity.");
			return false;
		}
		vQty = document.getElementById(sNidQty).value;
		document.formOrderAdd.oQty.value = vQty;
	}
	

	document.formOrderAdd.ProID.value = sProID;
	document.getElementById("AddMethod").value = sAddMethod;
	document.formOrderAdd.Action.value = "Add";
//	alert(document.getElementById("AddMethod").value);
	document.formOrderAdd.submit();
}


function AddToFavorites(sProID, sRtnDivID){
	var url = "/ajax/add_to_favorites.asp?psid=" + escape(sProID);
	$.get(url, function(sMsg){
		$("#"+sRtnDivID).html(sMsg);
	})
}

function MyFavoritesDelete(sProID){
	if(confirm("Are your sure delete this product from Your Favorites?")){
		document.formMyFavoritesDelete.ProID.value=sProID;
		document.formMyFavoritesDelete.submit();
	}
}




//计算单款产品金额小计(价格x数量): 多币种
function ProQtySubTotal(sInputID, sInputValueOri, sProPrice, sSpanID, sExportPreifxChat){
	var sInputValueNew = sInputID.value;
	if ((sProPrice!="")&&(sProPrice!=null)&&(sProPrice!=0)&&(sInputValueNew!="")&&(sInputValueNew!="0")&&(sInputValueNew!=sInputValueOri)){
		var sProPrice=sProPrice.replace(",","");
		var url = "/ajax/pro_qty_subtotal.asp?sProPrice=" + escape(sProPrice) + "&sQty=" + escape(sInputValueNew) + "&t="+Math.random();
		$.get(url, function(sMsg){
			$("#"+sSpanID).html(sExportPreifxChat + sMsg);
		});
	}
}


//2016-09-16
function ProEstimatedShippingCost(sPriceVIP, sProductWeight, sRtnDivID){
	var url = "/ajax/pro_shippingcost.asp?sPriceVIP=" + escape(sPriceVIP) + "&sProductWeight=" + escape(sProductWeight) + "&t="+Math.random();
	$.get(url, function(sMsg){
		vMsg = $.trim(sMsg);
		$("#"+sRtnDivID).html(vMsg);
	})
}