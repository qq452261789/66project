<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/66made/css/public/base.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/66made/css/model-1/header.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("web/views/66made/css/model-1/about.css"); ?>">
        <style type="text/css">
            .sale_btn,.preview_btn{
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
            .sale_btn:hover{
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
    </head>
    <body>
    <div id="www">
    </div>
    </body>
<script type="text/javascript" src="<?php echo base_url("static/js/jq.js"); ?>"></script>
<script type="text/javascript">
 // $(function(){
        function decodeUTF8(str){
            return str.replace(/(\\u)(\w{4}|\w{2})/gi, function($0,$1,$2){
                return String.fromCharCode(parseInt($2,16));
            }); 
        } 
    // 渲染模块
        $.ajax({
            type: "GET",
            url: "http://www.cpwix.com/index.php/MadePage/getPage",
            data: "modsid=1&pageid=6" ,
            datatype:"jsonp",
            success: function(msg){
                var mm = JSON.parse(msg).pop();
                $("#www").html(decodeUTF8(mm.content));
                new_element=document.createElement("script");
                new_element.setAttribute("type","text/javascript");
                new_element.setAttribute("src","<?php echo base_url("web/views/66made/js/model-1/services.js"); ?>");
                document.body.appendChild(new_element);
            }
        }); 
</script>

</html>