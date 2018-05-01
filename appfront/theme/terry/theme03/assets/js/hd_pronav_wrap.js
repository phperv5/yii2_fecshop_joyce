// JavaScript Document

$(function(){
	//获取要定位元素距离浏览器顶部的距离
	var navH = $(".pro_ctab").offset().top - 37;
	var navL = $(".pro_ctab").offset().left;
//	alert(navL);
	//滚动条事件
	$(window).scroll(function(){
		//获取滚动条的滑动距离
		var scroH = $(this).scrollTop();
		//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
		if(scroH>=navH){
			$(".pro_ctab").css({"position":"fixed","margin":"0 auto","top":37,"left":navL,"height":"31px","border-bottom":"solid 1px #ddd","overflow":"visible","visibility":"visible","width":""});
			$(".pro_ctab ul").css({"margin":"0px 0px 0px 15px"});
		}else if(scroH<navH){
			$(".pro_ctab").css({"position":"static","margin":"0 auto","height":"31px","border-bottom":"solid 1px #ddd","visibility":"visible"});
		}
//		console.log(scroH==navH);
	})
})