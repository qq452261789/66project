<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>商城首页</title>
	<style type="text/css">
		.input{
			position:absolute;
			z-index: -2;
			left:0;
			top:0;
		}
		.block{
			width:100px;
			height:100px;
			background-color: blue;

		}
		a{
			position:relative;
		}
		.imgchange{
			position:absolute;
			left:0;
			top:0;
			background-color:red;
			z-index:5;
		}
		.shenghuo{
			height:327px;
			display: inline-block;
		}
	</style>
</head>
<link rel="stylesheet" type="text/css" href="css/shouye.css">
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/swipe.css">
<link rel="stylesheet" type="text/css" href="css/comm.css">
<body class="body" id="body">
<button class="preview">预览</button>
<div id="fax">dfasd</div>

<div class="www">

<header class="header clearfix">
<div class="your-position">
<span>广州</span>
<span class="down-icon"></span>
</div>
<span class="search-icon"></span>
<span class="shop-title">生活一家</span>
</header>

<!-- 大图滚动 -->
<div class="wrap">
	<div class="inner">
	<img src="img/banner1.jpg">
	<img src="img/banner2.jpg">
	<img src="img/banner3.jpg">
	<img src="img/banner4.jpg">		
	</div>
    <p class="button">
	<span class="Span active"></span>
	<span class="Span "></span>
	<span class="Span "></span>
	<span class="Span "></span>
</p>
</div>
<!-- 图片 -->
	<div class="lei clearfix">
		<div class="leiLeft">
			<a href="###" class="shenghuo"><span class = "imgchange">图片可替换</span><img src="img/content1.jpg" class="img1"></a>
		</div>
		<div class="leiRight">
				<a href="###" class="shiping"><img src="img/shiping.png" class="img2"></a>
		        <a href="###" class="yongping"><img src="img/content.jpg" class="img2"></a>
		        <a href="###" class="jiaju"><img src="img/jiaju.png" class="img2"></a>
		        <a href="###" class="kefu"><img src="img/kefu.png" class="img2"></a>
			
		</div>
	</div>
	<div class="onsale-words">
	 <span>特卖专区Sales</span>
	</div>
	<div class="onsale-ads">
	<a href="###"><img src="img/ad1.jpg"></a>
	<a href="###"><img src="img/ad2.jpg"></a>
	<a href="###"><img src="img/ad3.jpg"></a>
	</div>
</div>	
<!-- 页脚 -->
<footer class="clearfix">
	<a href="###"><div class="footer1"></div></a>
	<a href="###"><div class="footer2"></div></a>
	<a href="###"><div class="footer3"></div></a>
	<a href="###"><div class="footer4"></div></a>
	<a href="###"><div class="footer5"></div></a>
</footer>
<input type="file" accept="img/*" class="input" id="myfile" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript">
// 假如存有该变量则将变量取出
        $.ajax({
            type: "GET",
            url: "http://www.cpwix.com/index.php/MadePage/getPage",
            data: "modsid=1&pageid=1" ,
            datatype:"jsonp",
            success: function(msg){
                var mm = JSON.parse(msg).pop();
                 console.log(mm.content.length);
                 if(mm.content.length > 10000){
                    $(".www").html(decodeUTF8(mm.content))                   
                 }

            }
        });
	    $(".input").on("change",function(){
	                    // var mm = this.files[0];
	                    // var fr = new FileReader();
	                    // fr.onload = function(e){
	                    //   top_ele.src = e.target.result;      
	                    // }
	                    // fr.readAsDataURL(mm);
	            var file = "myfile";//指定文件域，即为上面input标签的id
	            $.ajaxFileUpload({
	                url: "<?php echo site_url("MadePage/uploadFile"); ?>", //用于文件上传的服务器端请求地址
	                secureuri: false, //是否需要安全协议，一般设置为false
	                async: false,
	                fileElementId: file, //文件上传域的ID
	                dataType: 'json', //返回值类型 一般设置为json
	                success: function (data){ //服务器成功响应处理函数
	                    // console.log(data[0].sourceurl);
	                    $("top_ele").attr('src','<?php echo base_url("'+data[0].sourceurl+'")?>');
	                }
	            });
	    });

</script>
<script>
$(function(){  
         
})
</script>
<script type="text/javascript" src="js/edit.js"></script>
</body>
</html>