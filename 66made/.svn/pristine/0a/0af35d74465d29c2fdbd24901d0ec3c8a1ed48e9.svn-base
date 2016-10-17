	
	/*点击显示隐藏导航编辑器*/
	var in_page_1 = document.getElementById("in_page_1");
	var in_page_2 = document.getElementById("in_page_2");
	var nav_edict = document.getElementById("nav_edict");
	
	in_page_1.onclick =function(e){
		this.style.display = "none";
		in_page_2.style.display = "block";
		nav_edict.style.display = "block";
		if(e.preventDefault) {
    		e.preventDefault();
    		e.stopPropagation();
	  	}else{
    		e.returnValue = false;
    		e.cancelBubble = true;
	  	}
	}
	
	/*关闭导航编辑快*/
	var closs_nav_edict =document.getElementById("closs_nav_edict") ;
	var nav_edict_c_ul_li =document.querySelectorAll("#nav_edict_c_ul>li");
	var show_small_nav_edit = getClass("div","show_small_nav_edit");
	var small_nav_edit =document.getElementById("small_nav_edit");


	closs_nav_edict.onclick = function (e){
		in_page_1.style.display = "block";
		in_page_2.style.display = "none";
		nav_edict.style.display = "none";
		small_nav_edit.style.display = "none";
		if(e.preventDefault) {
    		e.preventDefault();
    		e.stopPropagation();
	  	}else{
    		e.returnValue = false;
    		e.cancelBubble = true;
	  	}
	}
	
	var $choice_mobile_span1 = $(".choice_mobile_span1");
	var $choice_mobile_span2 = $(".choice_mobile_span2");
	var $choice_mobile = $(".choice_mobile");
	
	$choice_mobile_span1.click(function(){
		$choice_mobile.css({"background":" url(../images/choice_mobile_bg_2.png) 1px 20px no-repeat"})
	})
	$choice_mobile_span2.click(function(){
		$choice_mobile.css({"background":" url(../images/choice_mobile_bg.png) 1px 20px no-repeat"})
	})
	
	
	for(var num_a = 0 ;num_a<show_small_nav_edit.length;num_a++){		
		show_small_nav_edit[num_a].index = num_a;
		
		show_small_nav_edit[num_a].onclick =function(){	
			for(var num_a = 0 ;num_a<show_small_nav_edit.length;num_a++){
				show_small_nav_edit[num_a].style.display ="none";
				show_small_nav_edit[num_a].removeAttribute("id","is_show") ;
			}						
			show_small_nav_edit[this.index].style.display ="block";
			show_small_nav_edit[this.index].setAttribute("id","is_show") ;
			
			var abcs = nav_edict_c_ul_li[this.index].offsetTop;	
			small_nav_edit.style.top =abcs+ 125 +"px";
			small_nav_edit.style.display ="block";	
			
		}
	}
	for(var num_b = 0 ;num_b<nav_edict_c_ul_li.length;num_b++){	
		nav_edict_c_ul_li[num_b].index = num_b ;
		nav_edict_c_ul_li[num_b].onmouseover = function (){
			for(var num_a = 0 ;num_a<show_small_nav_edit.length;num_a++){
				show_small_nav_edit[this.index].style.display ="none"
			}
			show_small_nav_edit[this.index].style.display ="block"
			
		}
		nav_edict_c_ul_li[num_b].onmouseout = function (){
			for(var num_a = 0 ;num_a<show_small_nav_edit.length;num_a++){
				show_small_nav_edit[this.index].style.display ="none";
			}
			document.getElementById("is_show").style.display ="block";			
		}
	}
	
	/*拖拽span拉伸导航宽高*/
	var  line_nav  = document.getElementById("line_nav");
	var line_5 = document.getElementById("line_5")
	var user_nav =document.getElementById("user_nav");
	
	line_nav.onmousedown = function(e){
		var e = e ||window.event;
		var nav_h1 = e.clientY ;
		var nav_height = user_nav.getBoundingClientRect();
		var line_5_top =line_5.getBoundingClientRect();
		
		document.onmousemove = function(e) {
			var e = e || window.event ;
			var change_h  = e.clientY - nav_h1 ;
			user_nav.style.height = (nav_height.height +change_h) +"px";
			line_5.style.top =( line_5_top.top +change_h) + "px"
		}
		document.onmouseup = function() {
			document.onmousemove = null ;
		}
		e.cancelBubble = true;
	}
	
	
	









	/*点击出现隐藏相应的编辑框*/
	var edit_ul =document.getElementById("edit_ul");
	var edit_li = document.querySelectorAll("#edit_ul>li");	
	var action = edit_ul.getElementsByTagName("p");
	var edit =document.querySelectorAll("body>.edit");
	//var closs_edit = document.querySelectorAll("body > .closs_edit");
	var closs_edit=  getClass("span", "closs_edit") ;
	
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
	
	/*点击li 显示相应的编辑器*/
	for(var num_edit= 0;num_edit<edit_li.length;num_edit++){
		edit_li[num_edit].onclick = function() {
			for(var num_edit= 0;num_edit<edit_li.length;num_edit++){
				edit[num_edit].style.display = "none";
			}
			edit[this.index].style.display = "block";
		}	
	}
	/*遍历span 关闭编辑器弹窗*/
	for(var num_span= 0;num_span<closs_edit.length;num_span++){
		closs_edit[num_span].onclick = function(e) {
			for(var num_edit= 0;num_edit<edit.length;num_edit++){
				edit[num_edit].style.display = "none";
			}
			if(e.preventDefault) {
	    		e.preventDefault();
	    		e.stopPropagation();
		  	}else{
	    		e.returnValue = false;
	    		e.cancelBubble = true;
		  	}
		}	
	}
	
	
	
	
	
	/*当前 ，工具，帮助。升级弹窗*/
//	var status_span = document.querySelectorAll("#status>span");
//	var status_alert = document.querySelectorAll("#alert_status>.status_alert");
//	var lens = status_span.length;	
//	for(var i = 0;i < lens;i++){
//		status_span[i].index = i;
//	}
//	document.addEventListener("mousemove",function(e){
//		var e = e || e.event;
//		var target = e.target || e.srcElement;
//		
//
//		if(target.tagName == "SPAN" && target.parentNode.id == "status"){
//			for(var i = 0;i < lens;i++){
//				status_alert[i].style.display = "none";
//			}
//			status_alert[target.index].style.display = "block";
//			wl_flag = true;
//		}
//		if(target.className == "status_alert" && target.parentNode.id == "alert_status"){	
//			alert(123)
//		  
//		}
//	},false);
//	
	if(document.getElementById("add_page_box").style.display ="block"){
		document.addEventListener("click",function(e){
			var e = e || e.event;
			var target = e.target || e.srcElement;
			var add_page_box =document.getElementById("add_page_box");
			if(target.id != "add_page_btn" & target.className != add_page_box.childNodes.className ){
				document.getElementById("add_page_box").style.display ="none";
			}
		},false)
	}
	if(document.getElementById("add_page_box").style.display ="none"){
		document.addEventListener("click",function(e){
			var e = e || e.event;
			var target = e.target || e.srcElement;
			//console.log(target.id)
			if(target.id == "add_page_btn"){
				
				document.getElementById("add_page_box").style.display ="block";
			}
		},false)
	}
	
	/*保存网页工作弹窗*/
	var save_web_status = document.getElementById("save_web_status");
	var save_alert = document.getElementById("save_alert");
	var closs_save_alert =document.getElementById("closs_save_alert");
	
	save_web_status.onclick = function(){
		save_alert.style.display = "block"
	}
	closs_save_alert.onclick = function(){
		save_alert.style.display = "none"
	}
	
	/*发布弹窗*/
	var publish =document.getElementById("publish_web");
	var publish_alert = document.getElementById("publish_alert");
	var closs_publish = document.getElementById("closs_publish");
	publish.onclick= function(){
		publish_alert.style.display= "block"
	}
	closs_publish.onclick= function(){
		publish_alert.style.display= "none"
	}
	
	
	
	
	/*文本帮助弹窗*/
	var text_help = document.getElementById("text_help");
	var add_text_help_alert =document.getElementById("add_text_help_alert");
	var closs_add_text_help_alert  = document.getElementById("closs_add_text_help_alert")
	text_help.onclick = function(){
		add_text_help_alert.style.display= "block"
		if(e.preventDefault) {
    		e.preventDefault();
    		e.stopPropagation();
	  	}else{
    		e.returnValue = false;
    		e.cancelBubble = true;
	  	}
	}
	closs_add_text_help_alert.onclick = function(){
		add_text_help_alert.style.display= "none";
		if(e.preventDefault) {
    		e.preventDefault();
    		e.stopPropagation();
	  	}else{
    		e.returnValue = false;
    		e.cancelBubble = true;
	  	}
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
			var _window_top = document.body.scrollTop | document.documentElement.scrollTop;

			/*设置创建的合作的位置*/
			var _top= for_bg_img_li[this.index].offsetTop - for_bg_b_d.scrollTop+_window_top +5 +"px";	
			console.log(for_bg_img_li[this.index].offsetTop,_top)
			var _left = for_bg_img_li[this.index].offsetLeft + for_bg_img_li[this.index].offsetWidth+82+"px";
			
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
			_img_box.style.borderRadius =8+"px";
			_img_box.style.boxShadow ="0px 0px 5px #d8d8d8";
			_img_box.style.webkitBoxShadow="0px 0px 5px #d8d8d8";
			_img_box.style.MozWindowShadow="0px 0px 5px #d8d8d8";

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
	var edit_text = document.getElementById("edit_text") ;
	d_edit_text.onmousedown = function(e) {
			var e = e || window.event ;
			disX = e.clientX ;
			disY = e.clientY ;
			var divpos = edit_text.getBoundingClientRect();

			document.onmousemove = function(e) {
				var e = e || window.event ;
				changeX = e.clientX - disX ; 
				changeY = e.clientY - disY ;
				edit_text.style.left = (divpos.left + changeX) + "px" ;
				edit_text.style.top = (divpos.top + changeY) + "px" ;
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
		
		var for_add_box_div =document.querySelectorAll("#for_add_box>div") ;
		
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

