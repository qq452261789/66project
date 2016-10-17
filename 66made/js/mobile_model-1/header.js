$(function(){
	var $nav_box = $(".nav_box");
	var $show_nav = $(".show_nav");
	var $nav_a_length = $nav_box.find("a").length;
	var $nav_a_height = $nav_box.find("a").eq(0).height();
	
	
	var $closs_nav = $(".closs_nav");
	var $nav_box_height = $nav_a_height*$nav_a_length;
	console.log($nav_box_height)
	
	$show_nav.click(function(){
		$(this).css({
			"display":"none",			
		})
		$(this).next().css({
			"display":"block"
		})
		$nav_box.css({"display":"block"});
		$nav_box.stop().animate({
			"height":$nav_box_height,
		})
	})
	$closs_nav.click(function(){
		$(this).css({
			"display":"none"
		})
		$(this).prev().css({
			"display":"block"
		})
		$nav_box.stop().animate({
			"height":0,
		})
		$nav_box.css({"display":"none"});
	})
	
})