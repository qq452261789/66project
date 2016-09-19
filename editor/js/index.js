/*点击页数查找页数,显示隐藏导航编辑框*/
$(function() {
	var $in_page_1 = $("#in_page_1");
	var $in_page_2 = $("#in_page_2");
	var $nav_edict = $("#nav_edict");

	$in_page_1.click(function() {
		$(this).css({
			"display": "none"
		});
		$(this).next("div").css({
			"display": "block"
		});
		/*显示导航编辑块*/
		$nav_edict.css({
			"display": "block"
		})
	});
	/*关闭导航编辑快*/
	var closs_nav_edict = $("#closs_nav_edict");

	closs_nav_edict.click(function() {
		/*关闭导航编辑器*/
		$nav_edict.css({
			"display": "none"
		});
		/*显示收索框*/
		$in_page_1.css({
			"display": "block"
		});
		$in_page_2.css({
			"display": "none"
		});
	})

	/*点击添加页面显示 添加页面编辑器弹框*/
	var $add_page = $("#add_page");
	var $add_page_box = $("#add_page_box");
	var $closs_page_box = $("#closs_page_box")
	$add_page = $("#add_page").click(function() {
		$add_page_box.css({
				"display": "block"
			})
			//$add_page_box.focus();
			//console.log($add_page_box.focus())
	});
	/*关闭   添加页面编辑器弹框*/
	$closs_page_box.click(function() {
		$add_page_box.css({
			"display": "none"
		})
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

	/*鼠标滑入显示隐藏背景小提示*/
	var $_tishi = $("#_tishi");
	var $bg_tishi = $("#bg_tishi");

	$_tishi.mouseenter(function() {
		$bg_tishi.css({
			"display": "block"
		})
	}).mouseleave(function() {
		$bg_tishi.css({
			"display": "none"
		})
	})


	/*设置 ：鼠标已入放大读片*/
//	var $for_bg_img = $("#for_bg_img");
//	var  $for_bg_img_li = $for_bg_img.find("li");
//	$for_bg_img_li.mouseenter(function(){
//		
//		var _img = $(this).find("img").eq(0);
//		var _src = _img.attr("src");		
//		var $bg_img_a = $("<img />");
//		var _left = $(this).offset().left + $(this).width() +10;
//		var _top = $(this).offset().top-30;
//		var bg_name_value = $(this).find(".bg_name").html();
//		$bg_img_a.css({
//			"width":"100%",
//			"height":"140px"
//		})
//		$bg_img_a.attr("src",_src);
//		var bg_name = $("</p>");
//		bg_name.html(bg_name_value);
//		
//		var $bg_div = $("<div>");
//		$bg_div.addClass("remove_div");
//		$bg_div.css({
//			"width": "230px",
//			"height": "160px",
//			"padding": "10px",
//			"position": "absolute",
//			"left": _left,
//			"top":_top,
//			"zIndex": 15,
//			"background": "#fff",
//			"border":"solid 1px #f1f1f1",
//			"line-height":"20px"
//		})
//		
//		$bg_div.append($bg_img_a);
//		$bg_div.append(bg_name);
//		$("body").append($bg_div)		
//	}).mouseleave(function(){
//		var remove_div_1 = $(".remove_div") ;
//		remove_div_1.remove()
//		
//	})
	
	

	var $edit_text_c = $("#edit_text_s");
	var $edit_text_c_span = $edit_text_c.children("span");
	$edit_text_c_span.mouseenter(function() {
		$(this).children("img").eq(1).attr("src", "../images/sanjiao_r_2.png");

	}).mouseleave(function() {
		$(this).children("img").eq(1).attr("src", "../images/sanjiao_r.png")
	})
})