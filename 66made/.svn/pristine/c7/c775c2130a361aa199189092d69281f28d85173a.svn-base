$(function(){
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
			console.log(bbb)
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