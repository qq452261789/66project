$(function() {

	var $li_img = $(".img_ul").find("li");
	//鼠标滑入显示隐藏分享代码	
	$li_img.mouseenter(function() {
		$(this).find(".shardow_box").css({
			"display": "block"
		});
		$(this).find(".share_box_2").css({
			"display": "block"
		});
	}).mouseleave(function() {
		$(this).find(".shardow_box").css({
			"display": "none"
		});
		$(this).find(".share_box_2").css({
			"display": "none"
		});
		$(this).find(".share_box_2_a").css({
			"display": "none"
		});
	})

	$(".show_share").click(function() {
			console.log(idx)
			if($(this).prev().css("display") == "none") {
				$(this).prev().css({
					"display": "block"
				})
			} else {
				$(this).prev().css({
					"display": "none"
				})
			}
			return false;
		})
		//点赞js  点击改变背景色和点赞的值
	$(".love_img").click(function() {
			//console.log( $(this).is(".activ_love") )
			if($(this).is(".activ_love") == false) {
				$(this).css({
					"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
				})
				$(this).html(Number($(this).html()) + 1);
				$(this).toggleClass("activ_love");
			} else {
				$(this).css({
					"background": "url(../../images/model-2/background/live_1.png) 0 5px  no-repeat"
				})
				$(this).html(Number($(this).html()) - 1);
				$(this).toggleClass("activ_love");
			}
			return false;
		})
		//点击弹出放大框 并把相应的信息拷贝到弹窗中
	var now = 0;
	var idx = 0;
	var _scroll_top;
	var $enlarge_box = $("#enlarge_box");
	var $enlarge_main = $(".enlarge_main");
	var $love_img_2 = $(".love_img_2");
	var $content = $("#content");

	//点击li放大图片之后进行处理
	$li_img.click(function() {
		$("body" || "html body").scrollTop("#enlarge_box")

		idx = $(this).index();
		$enlarge_box.css({
			"display": "block"
		});
		$content.css({"display":"none"})



		 _scroll_top = $(this).offset().top;
		

		var _url_img = $(this).css("backgroundImage"); 
		var abc  = _url_img.substring(5,_url_img.length-2)
		$('.enlarge_main_img').attr({src: " ",}).attr({
				src: abc,
		});

		var clone_img_text = $(this).find(".love_img").html();
		
		$love_img_2.html(" ").html(clone_img_text);

		if($(this).find(".love_img").is(".activ_love") == true) {
			$love_img_2.css({
				"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
			})
			$love_img_2.addClass("activ_love")
		} else {
			$love_img_2.css({
				"background": "url(../../images/model-2/background/live_2.png) 0 5px  no-repeat"
			})
		}
		
	})
	var $share_box_2_a = $(".share_box_2_a").click(function() {
		return false;
	});

	var $enlarge_prev = $(".enlarge_prev");
	var $enlarge_next = $(".enlarge_next");
	//点击 显示上一张图片
	$enlarge_prev.click(function() {
		if(idx > 0) {
			//var clone_img = $li_img.eq(idx - 1).children("img").clone();
			//$enlarge_main.children("img").remove();
			//$enlarge_main.append(clone_img);
			var _url_img = $li_img.eq(idx - 1).css("backgroundImage"); 
			var abc  = _url_img.substring(5,_url_img.length-2)
			console.log(_url_img.length)
			console.log(abc)
			$('.enlarge_main_img').attr({src: " ",}).attr({
					src: abc,
			});	
			var clone_img_text = $li_img.eq(idx - 1).find(".love_img").html();
			$love_img_2.html(" ").html(clone_img_text);

			if($li_img.eq(idx - 1).find(".love_img").is(".activ_love") == true) {
				$love_img_2.css({
					"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
				})
				$love_img_2.addClass("activ_love")
			} else {
				$love_img_2.css({
					"background": "url(../../images/model-2/background/live_2.png) 0 5px  no-repeat"
				})
			}
			idx -= 1;
		} else {
			//$(this).css({"cursor":"default"})
		}
	})
	if(idx > 0) {
		$enlarge_prev.css({
			"cursor": "pointer"
		})
	}
	//点击 显示下一张图片
	$enlarge_next.click(function() {
		if(idx <= $li_img.length - 2) {
			//var clone_img = $li_img.eq(idx + 1).children("img").clone();
			//$enlarge_main.children("img").remove();
			// $enlarge_main.append(clone_img);
			var _url_img = $li_img.eq(idx + 1).css("backgroundImage"); 
			var abc  = _url_img.substring(5,_url_img.length-2)
			console.log(_url_img.length)
			console.log(abc)
			$('.enlarge_main_img').attr({src: " ",}).attr({src: abc,});	
			var clone_img_text = $li_img.eq(idx + 1).find(".love_img").html();
			$love_img_2.html(" ").html(clone_img_text);
			
			if($li_img.eq(idx + 1).find(".love_img").is(".activ_love") == true) {
				$love_img_2.css({
					"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
				})
				$love_img_2.addClass("activ_love")
			} else {
				$love_img_2.css({
					"background": "url(../../images/model-2/background/live_2.png) 0 5px  no-repeat"
				})
			}
			idx += 1;
		} else {
			alert("已经是最后一张")
		}
	})
	$("#love_img_2").on("click", function() {
		console.log(idx)
		if($(this).is(".activ_love")) {
			$(this).css({
				"background": "url(../../images/model-2/background/live_2.png) 0 5px  no-repeat"
			})
			$(this).toggleClass("activ_love");
			var love_num = Number($(this).html()) - 1
			$(this).html(love_num);
			$li_img.eq(idx).find(".love_img").html(love_num).toggleClass("activ_love").css({
				"background": "url(../../images/model-2/background/live_2.png) 0 5px  no-repeat"
			});
		} else {
			var love_num_2 = Number($(this).html()) + 1;
			$(this).html(love_num_2).toggleClass("activ_love").css({
				"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
			})
			$li_img.eq(idx).find(".love_img").html(love_num_2).toggleClass("activ_love").css({
				"background": "url(../../images/model-2/background/live_3.png) 0 5px  no-repeat"
			});
		}
	});


	     
	//关掉放大弹窗
	$(".closs_enlarge_box").click(function() {
		$enlarge_box.css({
			"display": "none"
		});
		$("html body"||"body").scrollTop(_scroll_top);
		$content.css({"display":"block"})

	})
		//图片放大弹窗后js效果
	var $share_box_3 = $(".share_box_3");
	var $show_share_2 = $(".show_share_2")
	console.log($share_box_3.css("width"))
	$show_share_2.click(function() {
		if($share_box_3.css("width") === (0 + "px")) {
			$share_box_3.animate({
				"width": 180
			})
		} else {
			$share_box_3.animate({
				"width": 0
			})
		}
	})
	
	var _title, _source, _sourceUrl, _pic, _showcount, _desc, _summary, _site,
	_width = 600,
	_height = 600,
	_top = (screen.height - _height) / 2,
	_left = (screen.width - _width) / 2,
	_pic = 'http://www.66made.com/images/kaifayoushi_1.jpg';
	
	var $share_to_qq = $(".share_to_qq");
	var $share_to_weibo = $(".share_to_weibo");
	
	
	$share_to_qq.click(
		function shareToQzone(event) {
			event.preventDefault();
			var _shareUrl = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?';
			_shareUrl += 'url=' + encodeURIComponent(document.location); //参数url设置分享的内容链接|默认当前页location
			_shareUrl += '&showcount=' + _showcount || 0; //参数showcount是否显示分享总数,显示：'1'，不显示：'0'，默认不显示
			_shareUrl += '&desc=' + encodeURIComponent(_desc || '分享的描述'); //参数desc设置分享的描述，可选参数
			_shareUrl += '&summary=' + encodeURIComponent(_summary || '分享摘要'); //参数summary设置分享摘要，可选参数
			_shareUrl += '&title=' + encodeURIComponent(_title || document.title); //参数title设置分享标题，可选参数
			_shareUrl += '&site=' + encodeURIComponent(_site || ''); //参数site设置分享来源，可选参数
			_shareUrl += '&pics=' + encodeURIComponent(_pic || ''); //参数pics设置分享图片的路径，多张图片以＂|＂隔开，可选参数
			window.open(_shareUrl, '_blank', 'width=' + _width + ',height=' + _height + ',top=' + _top + ',left=' + _left + ',toolbar=no,menubar=no,scrollbars=no,resizable=1,location=no,status=0');
		}
	);
	//分享到新浪微博
	$share_to_weibo.click(function shareToSinaWB(event) {
		event.preventDefault();
		var _shareUrl = 'http://v.t.sina.com.cn/share/share.php?&appkey=895033136'; //真实的appkey，必选参数 
		_shareUrl += '&url=' + encodeURIComponent(document.location); //参数url设置分享的内容链接|默认当前页location，可选参数
		_shareUrl += '&title=' + encodeURIComponent(document.title); //参数title设置分享的标题|默认当前页标题，可选参数
		_shareUrl += '&source=' + encodeURIComponent(_source || '');
		_shareUrl += '&sourceUrl=' + encodeURIComponent(_sourceUrl || '');
		_shareUrl += '&content=' + 'utf-8'; //参数content设置页面编码gb2312|utf-8，可选参数
		_shareUrl += '&pic=' + encodeURIComponent(_pic || ''); //参数pic设置图片链接|默认为空，可选参数
		window.open(_shareUrl, '_blank', 'width=' + _width + ',height=' + _height + ',top=' + _top + ',left=' + _left + ',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
	})
	
})

	

//分享到新浪微博    
function shareToSinaWB(event) {
	event.preventDefault();
	var _shareUrl = 'http://v.t.sina.com.cn/share/share.php?&appkey=895033136'; //真实的appkey，必选参数 
	_shareUrl += '&url=' + encodeURIComponent(document.location); //参数url设置分享的内容链接|默认当前页location，可选参数
	_shareUrl += '&title=' + encodeURIComponent(document.title); //参数title设置分享的标题|默认当前页标题，可选参数
	_shareUrl += '&source=' + encodeURIComponent(_source || '');
	_shareUrl += '&sourceUrl=' + encodeURIComponent(_sourceUrl || '');
	_shareUrl += '&content=' + 'utf-8'; //参数content设置页面编码gb2312|utf-8，可选参数
	_shareUrl += '&pic=' + encodeURIComponent(_pic || ''); //参数pic设置图片链接|默认为空，可选参数
	window.open(_shareUrl, '_blank', 'width=' + _width + ',height=' + _height + ',top=' + _top + ',left=' + _left + ',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
}