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
		if(sts>=($contact_top+100)){
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
	var $user_email_val = $("#user_email").val();
	var $user_name_val = $("#user_name").val();
	var user_send = $(".user_send")
	
	user_send.click(function(){
		var CheckMail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 		var CheckUsername = /^[\u4e00-\u9fa5a-zA-Z0-9]+$/;
 		var aaaa=CheckUsername.test($user_name_val);
 		console.log(aaaa);
 		
// 		if (CheckMail.test($user_email_val)&CheckUsername.test($user_name_val)){
// 			alert("正确")
// 		}else{
// 			alert("错误")
// 		}
	})
		
 		
		
	
	
})