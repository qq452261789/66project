
	var edit_li = document.querySelectorAll("#edit_ul>li");
	var action = document.getElementsByClassName("action");
	console.log(edit_li)
	console.log(action)
	for(var i = 0; i < edit_li.length; i++) {
		edit_li[i].index = i;
		edit_li[i].onmouseover = function() {
			for(var j = 0; j < action.length; j++) {
				action[j].style.display = "none";
				edit_li[j].style.width = 48+"px";
			}
			action[this.index].style.display = "block";
			edit_li[this.index].style.width =130+"px";
		}
		edit_li[i].onmouseleave = function() {
			action[this.index].style.display = "none";
			edit_li[this.index].style.width =48+"px";
		}
	}

	var for_bg = document.getElementById("for_bg");
	var closs_for_bg = document.getElementById("closs_for_bg");
	edit_li[0].onclick = function() {
		for_bg.style.display = "block";
	}
	closs_for_bg.onclick = function(e) {
		for_bg.style.display = "none";
		e.cancelBubble = true ;
	}
	
	var for_add =document.getElementById("for_add");
	var closs_add =document.getElementById("closs_add");
	
	edit_li[1].onclick = function() {
		for_add.style.display = "block";
	}
	closs_add.onclick = function(e) {
		for_add.style.display = "none";
		e.cancelBubble = true ;
	}
	

	/*设置 ：鼠标已入放大读片*/
	var for_bg_img_li = document.querySelectorAll("#for_bg_img>li");
	var for_bg_b_d  =document.getElementById("for_bg_b_d");
	for(var k = 0 ;k<for_bg_img_li.length;k++){		
		for_bg_img_li[k].index = k;		
		for_bg_img_li[k].onmouseover =function(){
			/*创建img元素并赋值*/
			var _src = for_bg_img_li[this.index].querySelector("img").getAttribute("src");			
			var _big_img = document.createElement("img");
			_big_img.setAttribute("src",_src);			
			_big_img.style.width = "100%";
			_big_img.style.height = 140+"px";
			/*创建p元素并赋值*/
			var _big_p = document.createElement("p");
			var _P_val = for_bg_img_li[this.index].querySelector("div").innerHTML;
			_big_p.innerHTML = _P_val			
			var _img_box = document.createElement("div");
			/*设置创建的合作的位置*/
			var _top= for_bg_img_li[this.index].offsetTop+10 - for_bg_b_d.scrollTop + "px";			
			var _left = for_bg_img_li[this.index].offsetLeft + for_bg_img_li[this.index].offsetWidth+86+"px";
			
			/* 设置创建的盒子的样式*/
			_img_box.setAttribute("id","_img_box");
			_img_box.setAttribute("class","_img_box");
			_img_box.style.width = 230+"px";
			_img_box.style.height = 160+"px";
			_img_box.style.background = "#fff";
			_img_box.style.padding = 10+"px";
			_img_box.style.position = "absolute";
			_img_box.style.left = _left;
			_img_box.style.top = _top;
			_img_box.style.zIndex = 15;
			_img_box.style.border = "solid 1px #f1f1f1";
			_img_box.style.lineHeight =20+"px";			
			/*添加创建的元素*/
			_img_box.appendChild(_big_img);
			_img_box.appendChild(_big_p);
			document.body.appendChild(_img_box);	
		}
		for_bg_img_li[k].onmouseout = function(){
			document.getElementById("_img_box").remove();
		}
	}
	

	/*鼠标滑入显示隐藏背景小提示*/
	var _tishi = document.getElementById("_tishi");
	var bg_tishi = document.getElementById("bg_tishi");
	
	_tishi.onmouseover = function(){
		bg_tishi.style.display = "block"
	}
	_tishi.onmouseout = function(){
		bg_tishi.style.display = "none"
	}
	
	/*拖拽字体编辑框*/
	var d_edit_text = document.getElementById("d_edit_text");
	var edit_text = document.getElementById("edit_text")
	d_edit_text.onmousedown = function(e) {
			var e = e || window.event
			disX = e.clientX
			disY = e.clientY
			var divpos = edit_text.getBoundingClientRect();

			document.onmousemove = function(e) {
				var e = e || window.event
				changeX = e.clientX - disX
				changeY = e.clientY - disY
				edit_text.style.left = (divpos.left + changeX) + "px"
				edit_text.style.top = (divpos.top + changeY) + "px"
			}
			document.onmouseup = function() {
				document.onmousemove = null
			}
			e.cancelBubble = true;
		}
	/*点击改变现实所有图片的背景*/
	var show_all_page = document.getElementById("show_all_page")	
	var show_all_page_span = 	show_all_page.getElementsByTagName("span")
	show_all_page_span[0].onclick =function(){
		show_all_page.style.background = "url(../images/page_num.png) no-repeat"
	}
	show_all_page_span[1].onclick =function(){
		show_all_page.style.background = "url(../images/page_num_2.png) no-repeat"
	}
	
	
	
	
	
	
	
	
	
	/*点击显示   对齐方式 单匡*/
	var edit_text_s =document.getElementById("edit_text_s");	
	var edit_text_s_span = document.querySelectorAll("#edit_text_s>span");
	var edit_text_s_div = edit_text_s.getElementsByTagName("div");
	for(var _ij = 0 ;_ij<edit_text_s_span.length;_ij++){		
		edit_text_s_span[_ij].index = _ij;
		edit_text_s_span[_ij].onmouseover=function(){			
			edit_text_s_span[this.index].getElementsByTagName("img")[1].setAttribute("src","../images/sanjiao_r_2.png")	;	
		}
		edit_text_s_span[_ij].onmouseout=function(){			
			edit_text_s_span[this.index].getElementsByTagName("img")[1].setAttribute("src","../images/sanjiao_r.png");		
		}		
	}
	for(var _ix = 0 ;_ix<edit_text_s_span.length;_ix++){		
		edit_text_s_span[_ix].index = _ix;
		edit_text_s_span[_ix].onclick=function(){			
			edit_text_s_span[this.index].getElementsByTagName("div")[0].style.display = "block";		
		}
			
	}
	for(var _ia = 0 ;_ia<edit_text_s_div.length;_ia++){
		edit_text_s_div[_ia].index = _ia ;
		
		edit_text_s_div[_ia].onmouseover=function(){
			
			edit_text_s_div[this.index].style.display = "block";
			
		}
		edit_text_s_div[_ia].onmouseout=function(){
			
			edit_text_s_div[this.index].style.display = "none";
			
		}
	}

	
		/*添加文本切换*/ 
		/*点击店家文本导航（for_add_nav_div）    显示相应的快*/
		var for_add_nav_div = document.querySelectorAll("#for_add_nav>div") ;
		
		var for_add_box_div =document.getElementsByClassName("for_add_box");
		
		for(var i_num = 0;i_num<for_add_nav_div.length;i_num++){
			for_add_nav_div[i_num].index = i_num;
			for_add_nav_div[i_num].onclick =function(){
				for(var j_num = 0;j_num<for_add_nav_div.length;j_num++){
					for_add_box_div[j_num].style.display =  "none";
					for_add_nav_div[j_num].style.background = "none"
				}
				for_add_box_div[this.index].style.display =  "block";
				for_add_nav_div[this.index].style.background = "url(../images/add_text_bg.png) no-repeat"
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

