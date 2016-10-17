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
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/shouye.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/base.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/swipe.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/comm.css"); ?>">
<body class="body" id="body">
<button class="preview">保存</button>
<a href="http://test.net/myFile/index.php/mypage/view">预览</a>
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
    <img src="<?php echo base_url("web/views/lib/img/banner1.jpg"); ?>">
    <img src="<?php echo base_url("web/views/lib/img/banner2.jpg"); ?>">
    <img src="<?php echo base_url("web/views/lib/img/banner3.jpg"); ?>">
    <img src="<?php echo base_url("web/views/lib/img/banner4.jpg"); ?>">        
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
            <a href="###" class="shenghuo"><span class = "imgchange">图片可替换</span><img src="<?php echo base_url("web/views/lib/img/content1.jpg"); ?>" class="img1"></a>
        </div>
        <div class="leiRight">
                <a href="###" class="shiping"><img src="<?php echo base_url("web/views/lib/img/shiping.png"); ?>" class="img2"></a>
                <a href="###" class="yongping"><img src="<?php echo base_url("web/views/lib/img/content.jpg"); ?>" class="img2"></a>
                <a href="###" class="jiaju"><img src="<?php echo base_url("web/views/lib/img/jiaju.png"); ?>" class="img2"></a>
                <a href="###" class="kefu"><img src="<?php echo base_url("web/views/lib/img/kefu.png"); ?>" class="img2"></a>
            
        </div>
    </div>
    <div class="onsale-words">
     <span>特卖专区Sales</span>
    </div>
    <div class="onsale-ads">
    <a href="###"><img src="<?php echo base_url("web/views/lib/img/ad1.jpg"); ?>"></a>
    <a href="###"><img src="<?php echo base_url("web/views/lib/img/ad2.jpg"); ?>"></a>
    <a href="###"><img src="<?php echo base_url("web/views/lib/img/ad3.jpg"); ?>"></a>
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
<input type="file" name="myfile" id="myfile" accept="image/*">
<script type="text/javascript" src="<?php echo base_url("static/js/jq.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("static/js/ajaxfileuploads.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("web/views/lib/js/edit.js"); ?>"></script>
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
            if(target.tagName == "IMG"){
                 top_ele = target;
                document.getElementsByTagName("input")[0].click();
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
        $(".preview").bind("click",function(){
            // $("span").attr('contenteditable', 'false');
            // for(var i = 0;i < $("a").length;i++){
            //     $("a").eq(i).attr("src",alink[i]);
            // } 
            $("span").attr("contenteditable","false")
            var myhtml = $(".www").html();
            var enmyhtml = encodeUTF8(myhtml);
            $.ajax({
                type: "POST",
                url: "http://www.cpwix.com/index.php/MadePage/savePage",
                data: "modsid=1&content="+enmyhtml+"&pageid=3&title=1" ,
                datatype:"jsonp",
                success: function(msg){
                    alert("数据保存成功");
                }
            });     
     
        })

    //渲染模块
        $.ajax({
            type: "GET",
            url: "http://www.cpwix.com/index.php/MadePage/getPage",
            data: "modsid=1&pageid=3" ,
            datatype:"jsonp",
            success: function(msg){
                var mm = JSON.parse(msg).pop();
                if(mm.content.length > 10000){
                $(".www").html(decodeUTF8(mm.content))
            }
            }
        });

    });
 

</script>

</body>
</html>