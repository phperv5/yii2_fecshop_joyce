// JavaScript Document

function CheckFormSchProSer() {
	var q_sch_pro_ser=document.getElementById("q_sch_pro_ser");
	if ((q_sch_pro_ser.value=="")||(q_sch_pro_ser.value.toLowerCase()=="keyword")){
		alert("Please input valid keyword.");
		q_sch_pro_ser.value="";
		q_sch_pro_ser.focus();
		return false;
	}
	return true;	
}