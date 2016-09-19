
var edit_li = document.querySelectorAll("#edit_ul>li")
var action = document.getElementsByClassName("action")
console.log(edit_li)
console.log(action)
for(var i = 0; i < edit_li.length; i++) {
	edit_li[i].index = i;
	edit_li[i].onmouseover = function() {
		for(var j = 0; j < action.length; j++) {
			action[j].style.display = "none"
		}
		action[this.index].style.display = "block"
	}
	edit_li[i].onmouseleave = function() {
		action[this.index].style.display = "none"
	}
}

var for_bg = document.getElementById("for_bg");
var closs_for_bg = document.getElementById("closs_for_bg");
	edit_li[0].onclick = function() {
		for_bg.style.display = "block";
	}
	closs_for_bg.onclick = function(e) {
		for_bg.style.display = "none";
		e.cancelBubble = true
	}
	

	/*设置 ：鼠标已入放大读片*/
	var for_bg_img_li = document.querySelectorAll("#for_bg_img>li");
	
	for(var k = 0 ;k<for_bg_img_li.length;k++){
		for_bg_img_li[k].index = k;
		
		for_bg_img_li[k].onmouseover =function(){
			
			console.log(for_bg_img_li[this.index].firstChild);
		}
	}
	
//	$for_bg_img_li.mouseenter(function(){		
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









