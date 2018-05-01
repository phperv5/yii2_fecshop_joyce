var isIE = /msie/i.test(navigator.userAgent);
function gID(id){return document.getElementById(id);}
function ScrollDiv(id,pScrollY){
	var ScrollY = document.documentElement.scrollTop || document.body.scrollTop;
	if (pScrollY ==null) { pScrollY=0; }
	var moveTop = .1 * (ScrollY - pScrollY);
	moveTop = (moveTop > 0) ? Math.ceil(moveTop) : Math.floor(moveTop);
	gID(id).style.top = parseInt(gID(id).style.top) + moveTop + "px";
	pScrollY = pScrollY + moveTop; 
	setTimeout("ScrollDiv('"+id+"',"+pScrollY+");",50);
}
function addObjEvent(obj,eventName,eventFunc){
	if (obj.attachEvent){
		obj.attachEvent(eventName,eventFunc);
	}else if (obj.addEventListener){
		var eventName2 = eventName.toString().replace(/on(.*)/i,'$1');
		obj.addEventListener(eventName2,eventFunc, false);
	}else{
		obj[eventName] = eventFunc;
	}
}
function delObjEvent(obj,eventName,eventFunc){
	if (obj.detachEvent) {
		obj.detachEvent(eventName,eventFunc);
	}else if (obj.removeEventListener){
		var eventName2 = eventName.toString().replace(/on(.*)/i,'$1');
		obj.removeEventListener(eventName2,eventFunc, false);
	}else{
		obj[eventName] = null;
	}
}
function MoveDiv(obj,e){
	e = e||window.event;
	var ie6=isIE;
	if (/msie 9/i.test(navigator.userAgent)) {ie6=false;}
	if (ie6 && e.button == 1 || !ie6 && e.button == 0) {}else{return false;}
	obj.style.position='absolute';
	obj.ondragstart =function(){return false;}
	var x = e.screenX - obj.offsetLeft;
	var y = e.screenY - obj.offsetTop;
	addObjEvent(document,'onmousemove',moving);
	addObjEvent(document,'onmouseup',endMov);
	e.cancelBubble = true;
	if (isIE) {
		obj.setCapture();
	} else {
		window.captureEvents(Event.mousemove);
	}
	if (e.preventDefault) {
		e.preventDefault();
		e.stopPropagation();
	}
	e.returnValue = false;
	return false;
	function moving(e){
		obj.style.left = (e.screenX - x) + 'px';
		obj.style.top = (e.screenY - y) + 'px';
		return false;
	}
	function endMov(e){
		delObjEvent(document,'onmousemove',moving);
		delObjEvent(document,'onmouseup',arguments.callee);
		if (isIE) {
			obj.releaseCapture();
		} else {
			window.releaseEvents(Event.mousemove);
		}
	}
}
var strChatOnline = '<div id=\"chat_online_sus_r\" class=\"chat_online_sus_r\"><div class=\"fun_im_t\"><a href=\"javascript:void(0);\" onclick=\"document.getElementById(\'chat_online_sus_r\').style.display = \'none\';\"><img src="/images/ico/close_s.png" border="0" /></a></div><div class=\"fun_im_m\"><a href=\"http://ls.uobdii.org/chat.php\" target=\"_blank\" rel=\"nofollow\"><img src=\"http://ls.uobdii.org/image.php?id=04&type=inlay\" width=\"85\" height=\"140\" border=\"0\" alt=\"Live Support\"></a><br /><br /><a href=\"Skype:Sales@UOBDII.com?chat\" title=\"Skype Me\" target=\"_blank\"><img src=\"/upload/advs/2010091304239405.gif\" width=\"85\" height=\"36\" border=\"0\" hspace=\"0\" vspace=\"0\" alt=\"Skype Me\" align=\"absmiddle\" /></a></div><div class=\"fun_im_b\"></div><div>';
document.write (strChatOnline);
gID("chat_online_sus_r").style.top = "100px";
gID("chat_online_sus_r").style.left = document.documentElement.clientWidth - gID("chat_online_sus_r").offsetWidth -10 +"px";
ScrollDiv('chat_online_sus_r');
