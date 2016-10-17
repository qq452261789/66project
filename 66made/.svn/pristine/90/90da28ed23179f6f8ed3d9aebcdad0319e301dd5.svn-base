$(function(){
	var $img_li = $(".img_ul").find("li");
	var $show_img_box = $(".show_img_box");
	var $go_back =$(".go_back");
	var $prev_img = $('.prev_img');
	var $next_img = $(".next_img");
	
	
	
	var idx = " ";
	
	$img_li.click(function(){
		idx =$(this).index();
		$show_img_box.css({"display":"block"});
		var clone_img = $(this).children("img").clone();
		$(".clone_img_box").children("img").remove();
		$(".clone_img_box").append(clone_img);
	
	})
	$go_back.click(function(){
		$show_img_box.css({"display":"none"});
		$("html body"|| "body").scrollTop($img_li.eq(idx).offset().top);
	});
	
	
	$prev_img.click(function(){
		if(idx>0){
			var new_img = $img_li.eq(idx-1).find("img").clone();		
			$(".clone_img_box").children("img").remove();
			$(".clone_img_box").append(new_img);
			idx -= 1;
		}else{
			$(this).css("background") == "";
			return false;
		}
	})
	$next_img.click(function(){
		if(idx<$img_li.length-1){
			var new_img = $img_li.eq(idx+1).find("img").clone();		
			$(".clone_img_box").children("img").remove();
			$(".clone_img_box").append(new_img);
			idx += 1;
		}else{
			return false;
		}
	})
	
	
	
	
	
})


































