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