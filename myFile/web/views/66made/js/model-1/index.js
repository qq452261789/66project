$(function(){
	
	/*鼠标滚动到关于我们渐进改变关于内容的透明度*/
	var $about_href = $(".about_href");	
	var $about_top = $("#about").offset().top  ;
	
	$(window||document.body).scroll(function (){
		var sts = $(this).scrollTop()+$(window).height();
		if(sts>=$about_top){
			$("#about_box").animate({
				"opacity":1
			},1000)}
		if(sts>=$about_href.offset().top){
			$about_href.animate({
				"opacity":1
			},1000)}
	});
	/*联系方式动画效果*/
	var $contact =$("#contact");
	var $contact_top = $contact.offset().top;
	console.log($contact_top)
	$(window||document.body).scroll(function (){
		var sts = $(this).scrollTop()+$(window).height();
		if(sts>=$contact_top){
			$contact.animate({
				"opacity":1
			},1200)}
	});
	
	var $banner_box = $("#banner_box");
	$(window||document.body).scroll(function ()
	{
		var st = $(this).scrollTop();
		pos_y = st/($banner_box.height())*(250)
		$banner_box.css({"background-position-y":pos_y});	
	});
	
	
	
})