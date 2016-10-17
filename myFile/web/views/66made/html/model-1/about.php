<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../css/public/base.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/model-1/about.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/model-1/header.css"/>
	</head>
	 <style type="text/css">
              .save_btn,.preview_btn{
                color:white;
                position:absolute;
                top:10px;
                left:10px;
                width:105px;
                font-size:20px;
                line-height: 30px;
                text-align: center;
                background-color:blue;
                opacity: 0.3;
                z-index: 10;
                border-radius: 5px;
                border:1px solid white;
              }
              .save_btn:hover{
                opacity:1;
              }
              .preview_btn{
                left:125px;
              }
              .preview_btn:hover{
                opacity:1;
              }
              body{
                position:relative;
              }
              #myfile{
                position:absolute;
                z-index: -100;
                left:-1000px;
              }
        </style>
	<body>
		<a href = "javascript:void(0);"class="save_btn">保存</a>
        <a href = "http://localhost/myFile/index.php/mypage/services_view"class="preview_btn">预览</a>
        <input type="file" name="myfile" id="myfile" accept="image/*">
        <div class="www">
		<!--页头-->
		<div id="header_box">
			<div id="header">
				<div id="log" class="left clearfix edit_text">
					<a href="index.html">
						JAMES <span id="">CONSULTING</span>
					</a>
				</div>
				<div id="nav" class="right clearfix">
					<a href="about.html" class="edit_text">
						关于
					</a>
					<a href="services.html" class="edit_text">
						服务
					</a>
					<a href="projects.html" class="edit_text">
						项目
					</a>
					<a href="clients.html" class="edit_text">
						客户
					</a>
					<a href="index.html#contact_box" class="edit_text">
						联系
					</a>
				</div>
			</div>
		</div>
		
		<div id="about_box">
			<div id="about">
				<div class="about_title">
                    <h2 class="edit_text">关于</h2>
                    <div></div>
                    <p class="edit_text">此处为段落文本。可以添加文字和编辑。点击“编辑文本”或双击添加内容。</p>
                </div>



				<div id="about_list" class="clearfix">
					<div class="about_list_div about_list_div_1">
						<div class="person clearfix">
							<div class="left person_picture">
								<img src="../../images/model-1/active/about_1.png"/>
							</div>
							<div class="left">
								<p class="edit_text person_name" >
									liaju
								</p>
								<p class="edit_text person_job">
									UI设计师
								</p>
							</div>
						</div>
						<div class="person_introduce edit_text">
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							
						</div>
					</div>
					<div class="about_list_div">
						<div class="person">
							<div id="" class="left person_picture clearfix">
								<img src="../../images/model-1/active/about_2.png"/>
							</div>
							<div class="left clearfix">
								<p class="edit_text person_name" >
									Alan
								</p>
								<p class="edit_text person_job">
									IOS工程师
								</p>
							</div>
						</div>
						<div class="person_introduce edit_text">
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
						</div>
					</div>
					<div class="about_list_div about_list_div_3">
						<div class="person">
							<div id="" class="left person_picture clearfix">
								<img src="../../images/model-1/active/about_3.png"/>
							</div>
							<div class="left clearfix">
								<p class="edit_text person_name" >
									Ray
								</p>
								<p class="edit_text person_job">
									产品经理
								</p>
							</div>
						</div>
						<div class="person_introduce edit_text">
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
						</div>
					</div>
					<div class="about_list_div">
						<div class="person">
							<div class="left person_picture clearfix">
								<img src="../../images/model-1/active/about_4.png"/>
							</div>
							<div class="left clearfix">
								<p class="edit_text person_name" >
									Rong
								</p>
								<p class="edit_text person_job">
									PHP工程师
								</p>
							</div>
						</div>
						<div class="person_introduce edit_text">
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
							我是一个段落。只需点击“编辑文本”或双击我来添加自己的内容。
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--页脚-->
		<div id="footer_box">
			<div id="footer" class="clearfix">
				<div id="" class="left clearfix">
					<a href="javascript:void(0)" class="edit_text footer_a1">
						2016  陆陆科技 
					</a>
					<a href="javascript:void(0)" class="edit_text footer_a2">
						66made.com
					</a>
				</div>
				<div id="share" class="right clearfix">
					<span id="share_weibo">
						<!--分享到微博-->
					</span>
					<span id="share_weixin">
						<!--分享到微信-->
					</span>
					<span id="share_qq">
						<!--分享到QQ-->
					</span>
				</div>
			</div>
		</div>
		 </div>


		<script src="../../js/public/jquery-1.12.0.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript">
		   $(function(){
		       
		        function encodeUTF8(str){
		        var temp = "",rs = "";
		        for( var i=0 , len = str.length; i < len; i++ ){
		            temp = str.charCodeAt(i).toString(16);
		            rs  += "\\u"+ new Array(5-temp.length).join("0") + temp;
		        }
		            return rs;
		        }
		        function decodeUTF8(str){
		            return str.replace(/(\\u)(\w{4}|\w{2})/gi, function($0,$1,$2){
		                return String.fromCharCode(parseInt($2,16));
		            }); 
		        } 
		        var top_ele ;
		        //选择图片模块
		        document.onclick = function(e){
		            var e = e || e.event;
		            var target = e.target || e.srcElement;
		            console.log(target);
		            if(target.className == "edit_image"){
		                 top_ele = target;
		                 console.log(2);
		                $("#myfile")[0].click();
		            }
		        }
		        $("#myfile").change(function(){
		            var file = "myfile";//指定文件域，即为上面input标签的id
		            $.ajaxFileUpload({
		                url: "<?php echo site_url("MadePage/uploadFile"); ?>", //用于文件上传的服务器端请求地址
		                secureuri: false, //是否需要安全协议，一般设置为false
		                async: false,
		                fileElementId: file, //文件上传域的ID
		                dataType: 'json', //返回值类型 一般设置为json
		                success: function (data){ //服务器成功响应处理函数
		                    // console.log(data[0].sourceurl);
		                    $(top_ele).attr('src','<?php echo base_url("'+data[0].sourceurl+'")?>');
		                }
		            });
		        });
		        //点击预览的时候将数据存入数据库
		        $(".save_btn").bind("click",function(){
		            $(".edit_text").attr("contenteditable","false");
		            var myhtml = $("#www").html();
		            var enmyhtml = encodeUTF8(myhtml);
		            $.ajax({
		                type: "POST",
		                url: "http://www.cpwix.com/index.php/MadePage/savePage",
		                data: "modsid=1&content="+enmyhtml+"&pageid=10&title=1" ,
		                datatype:"jsonp",
		                success: function(msg){
		                    alert("数据保存成功");
		                }
		            });     
		     
		        })

		    // 渲染模块
		        $.ajax({
		            type: "GET",
		            url: "http://www.cpwix.com/index.php/MadePage/getPage",
		            data: "modsid=1&pageid=10" ,
		            datatype:"jsonp",
		            success: function(msg){
		              console.log(JSON.parse(msg).message);
		              $(".edit_text").attr("contenteditable","true");  
		              if(JSON.parse(msg).message != "操作失败" || JSON.parse(msg).message == undefined ){
		              console.log(1);
		                var mm = JSON.parse(msg).pop();
		                $("#www").html(decodeUTF8(mm.content));   
		                $(".edit_text").attr("contenteditable","true");   
		                // new_element=document.createElement("script");
		                // new_element.setAttribute("type","text/javascript");
		                // new_element.setAttribute("src","<?php echo base_url("web/views/66made/js/model-1/index.js"); ?>");
		                // document.body.appendChild(new_element);
		                      
		              }

		            }
		        });
		    });
		</script>

		<script type="text/javascript">
			$(function(){
				var $log =$("#log");
				$log.click(function(){
					window.location.href = "index.html"
				})
			})
		</script>
			
	</body>
</html>
