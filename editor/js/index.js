/*点击页数查找页数,显示隐藏导航编辑框*/
$(function() {

	/*点击添加页面显示 添加页面编辑器弹框*/
	var $add_page = $("#add_page");
	var $add_page_box = $("#add_page_box");
	$add_page = $("#add_page").click(function() {
		$add_page_box.css({
				"display": "block"
			})
			//$add_page_box.focus();
			//console.log($add_page_box.focus())
	});
	
	/*手机，pc端 模型弹窗消失隐藏*/
	var $phone_mode = $("#phone_mode");
	var $phone_alert = $("#phone_alert");
	
	$phone_mode.click(function(){
		$phone_alert.css({"display":"block"}).focus();
	})
	$phone_alert.click(function(){
		 $(this).show();
		 $(this).focus();
	})
	$phone_alert.blur(function(){
		 $(this).hide();
	 });	 
	
	
	
	/*状态栏弹窗消失隐藏*/
	var status_span = $("#status").find("span");	
	var status_alert = $(".status_alert");	
	
	status_span.mouseenter(function(){
		var status_span_indx = $(this).index() ;	
		status_alert.eq($(this).index()).css({
			"display":"block"
		}).siblings().hide()
		status_alert.eq($(this).index()).focus();
	});
	status_span.click(function(){
		var status_span_indx = $(this).index() ;	
		status_alert.eq($(this).index()).css({
			"display":"block"
		}).siblings().hide()
		status_alert.eq($(this).index()).focus();
	})
	status_alert.click(function(){
		 $(this).show();
		 $(this).focus();
	})
	status_alert.blur(function(){
		 $(this).hide();
	 });	 
	
	
	
	
	
	
	
	
	
	
	
	
	/*页面掉转点击显示隐藏*/
	var $show_pos = $("#show_pos");
	var $out_page = $("#out_page");
	var $closs_out_page = $("#closs_out_page")
	$show_pos.click(function() {
		$out_page.css({
			"display": "block"
		})
	})
	$closs_out_page.click(function() {
		$out_page.css({
			"display": "none"
		})
	})
	
	var $edit_text_c =$("#edit_text_c");
	var $edit_text_c_span = $edit_text_c.find("span");
	$edit_text_c_span.mouseenter(function() {
		$(this).children("img").eq(1).attr("src", "../images/sanjiao_r_2.png");

	}).mouseleave(function() {
		$(this).children("img").eq(1).attr("src", "../images/sanjiao_r.png")
	})	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
})