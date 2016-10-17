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
            z-index:-1;
        }
        .shenghuo{
            height:327px;
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/shouye.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/swipe.css">
    <link rel="stylesheet" type="text/css" href="css/comm.css">
</head>

<body class="body" id="body">
<a class="back" href="shouye.html">返回编辑</a>
<a target = "_blank" class="publish" href="publish.html">发布</a>
<div class="www">
</div>
<footer class="clearfix">
    <a href="###"><div class="footer1"></div></a>
    <a href="###"><div class="footer2"></div></a>
    <a href="###"><div class="footer3"></div></a>
    <a href="###"><div class="footer4"></div></a>
    <a href="###"><div class="footer5"></div></a>
</footer>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        function decodeUTF8(str){
            return str.replace(/(\\u)(\w{4}|\w{2})/gi, function($0,$1,$2){
                return String.fromCharCode(parseInt($2,16));
            }); 
        } 
        //渲染模块
        $.ajax({
            type: "GET",
            url: "http://www.cpwix.com/index.php/MadePage/getPage",
            data: "modsid=1&pageid=1" ,
            datatype:"jsonp",
            success: function(msg){
                $(".www").html(decodeUTF8(JSON.parse(msg).pop().content))
            }
        });

    })

</script>
</body>
</html>