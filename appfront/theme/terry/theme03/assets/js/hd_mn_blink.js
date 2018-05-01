// JavaScript Document

var i=0;
function blink(){
	document.getElementById("hd_mn_inf_dir_blink").className="blink_text_color_"+i%6;
	i++;
}
setInterval(blink, 500);