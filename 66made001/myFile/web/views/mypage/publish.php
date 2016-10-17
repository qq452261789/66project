<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>商城首页</title>
    <style type="text/css">
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/shouye.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/base.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/swipe.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/lib/css/comm.css"); ?>">
</head>

<body class="body" id="body">
<div class="www">
</div>

<script type="text/javascript" src="<?php echo base_url("static/js/jq.js"); ?>"></script>
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
            data: "modsid=1&pageid=2" ,
            datatype:"jsonp",
            success: function(msg){
                var mm = JSON.parse(msg).pop();
                $(".www").html(decodeUTF8(mm.content))
            }
        });
})

</script>
</body>
</html>