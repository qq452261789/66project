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
	$(window||document.body).scroll(function (){
		var sts = $(this).scrollTop()+$(window).height();
		if(sts>=($contact_top+100)){
			$contact.animate({
				"opacity":1,
			},1200)}
	});
	
	var $banner_box = $("#banner_box");
	$(window||document.body).scroll(function (){
		var st = $(this).scrollTop();
		pos_y = st/($banner_box.height())*(250);
		$banner_box.css({"background-position-y":pos_y});	
	});
	
	var $user_send = $(".user_send");
	var $user_info = $(".check_info");
	$user_send.click(function(){
		var $user_email_val = $("#user_email").val();		
		var $user_name_val = $("#user_name").val();
		var CheckMail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 		//var CheckUsername = /^[\u4e00-\u9fa5a-zA-Z0-9]{4,18}$/;
 		if (CheckMail.test($user_email_val)&($user_name_val != "")){
 			$user_info.removeClass("check_info_active").html("成功发送");
 			//发送到后台后
 			var user_infos = {};
 			var arr01 = [];
			user_infos.name = $user_name_val ;
			user_infos.email = $user_email_val;
			user_infos.them  = $("#them").val();
			user_infos.content = $("#textarea").val();			
			arr01.push(user_infos);
			var bbb = JSON.stringify(arr01);			
			var bba = JSON.parse(bbb);
		
 			/*$.ajax({
 				type:'post',      
         		url:'',  
         		data:"bbb",  
        	 	dataType:'json',  
    	     	success:function(data){  
    	     		
	         	}  
 			})*/
 			
 			
 			$("#user_email").val("");
 			
 			$("#user_name").val("");
 			
 			$("#them").val("");
 			$("#textarea").val("");

 		}else{
 			$user_info.html("请输入正确的姓名或者邮箱").addClass("check_info_active")
 		}
	})
		
 		
		
	
	
})