<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="UTF-8">
    <title>素材添加</title>
    <style>
        * {margin: 0; padding: 0;}
        .content {margin:50px auto; width: 1000px; border: 1px solid #ccc; padding: 20px;}
        .content .drag {width: 1000px; min-height: 300px;border: 2px dashed #666;}
        .spn-img img {max-width: 126px;}
        #submitimg{padding:0 10px;}
        #submitimgid{margin: 10px auto;text-align: center;}
        b.delimg{background:#a00;display:block;cursor:pointer;width:20px;height:20px;position:absolute;
            text-align:center;line-height:20px;z-index:100;color:#fff;}
        .boximg{display:inline-block;margin:5px;border:1px solid #000;}
        #bodyMask{background:url("<?php echo base_url("static/images/tipsword.png")?>") !important;}
        #ModboxContent img{margin:60px auto;display:block;}
        #ModboxContent img.loading{background:url("<?php echo base_url("static/images/loading.gif")?>") no-repeat;display:block;height:60px;width:60px;}
        #ModboxContent{overflow-y:scroll;}
        .Modboxtitlebox .btn_close {background:url("<?php echo base_url("static/images/icon.gif")?>") 0 3102px  !important;cursor: pointer;display: block;float: right;height: 15px;margin-top: 6px;width: 15px;border:1px solid #fafafa}
        .Modboxtitlebox {background:#0e580c;color: #fff;font-size: 13px;height: 30px;line-height: 30px;padding: 0 8px;}
        .tabHeader{width: 100%;height: 40px;border: 1px solid #eef4f5;}
        li{list-style:none;}
        .tabHeader li{line-height: 40px;width:30%;float:left;background-color: #B0BABA;margin-left:1.7%;color: #fff;font-size:22px;text-align: center;}
        .hover{font-weight: bold;}
        #tabContent{width:100%;height:400px;border-bottom: solid 1px #ccc;}
        .cell{margin:6px -16px 6px 1.7%;float: left;}
        .cell li{width: 80px;text-align: center;}
    </style>
    <script type="text/javascript" src="<?php echo base_url("static/js/jquery.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/mytips.js")?>"></script>
</head>
<body>
<div style="width: 100%;height:400px;">
    <ul class="tabHeader">
        <li class="on" typeid="1">图片</li><li typeid="2">视频</li><li typeid="3">音乐</li>
    </ul>
    <div id="tabContent"></div>
</div>
<script type="text/javascript">
    $(function(){
        $("li[typeid='1']").css("background","#00FFFF");
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("Source/getSource"); ?>",
            data: "typeid=1",
            success: function(msg){
                $("#tabContent").append(msg);
            }
        });
    });
    $(function(){
        $(".tabHeader li").click(function(){
            !$("li").not($(this)).removeClass("hover").css("background","#B0BABA");
            $(this).css("background","#00FFFF").addClass("hover");
            $("#tabContent").children().remove();
            typeid = $(this).attr("typeid");
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("Source/getSource"); ?>",
                data: "typeid="+typeid,
                success: function(msg){
                    $("#tabContent").append(msg);
                }
            });
        });
    });
</script>
<div class="content">
    <form>
        <p><span>素材名称：</span><input type="text" name="sourcename" required="required" /></p>
        <div class="drag" id="dragbox" ondrop = "dropFile(event)" ondragenter = "return bgChange(1)" ondragover = "return false">
            <div class="spn-img" id="spn-img"></div>
        </div>
        <div id="submitimgid">
            <input type="button" id="submitimg" onclick="submitimgSend()" value="上传"/>
        </div>
    </form>
</div>
<script>
    $(function () {
        $("#spn-img").append("<div id='warns' style='text-align: center;line-height: 260px;'>批量拖入素材上传区域</div>");
    });
    var _MSG='';
    var _LEN=0;
    function bgChange(num){
        if(num==2){
            $("#dragbox").css({"backgroundColor":"#fff"})
        }else{
            $("#dragbox").css({"backgroundColor":"#efefef"})
        }
        return false;
    }

    function submitimgSend(){
        var data=[];
        var namestr=[];
        var STOP=false;
        //获取用户素材名和素材类型
        var sourcename = $("input[name='sourcename']").val();

        $("#spn-img .boximg img").each(function(i){
            var filename=$(this).attr("title");
            src=$(this).attr("src");
            if(src.length>5000000){
                STOP=true;
                alert("第"+(1+i)+"个素材的大小超过了限制5M!");
                return false;
            }

            namestr.push(filename);
            data.push(src);
        });
        if(STOP||data.length==0){
            return;
        }

        funsTool.showBodyMask();
        funsTool.showModbox('提交素材',240,400,function(){
            // 循环 post
            var len=namestr.length;
            _LEN=len;
            for(var i=0;i<len;i++){
                var datai=data[i];
                var sizei = (datai.length/1000);
                if(sourcename!=""){
                    var sourcenamei = sourcename+"_"+i;
                }else{
                    var sourcenamei = "";
                }
                var namestri=namestr[i];
                $.post(
                    '<?php echo site_url("Source/addSource"); ?>',
                    {"doaction":'ajaxUploadSomeImg',"data":datai,"namestr":namestri,"todo":"save","sourcename":sourcenamei,"size":sizei},
                    function(datas){
                        _MSG+=datas;
                        funsTool.insertModBox(_MSG);
                        _LEN--;
                        if(_LEN==0){
                            _MSG='';
                            $("#spn-img").html("");
                        }
                    }
                );
            }
        });



    }

    var fileUploadPreview = function (aFile) {
        if (typeof FileReader == "undefined") {
            alert("浏览器不支持");return;
        }
        var i;
        for (i = 0; i < aFile.length; i++) {
            var tmp = aFile[i];
            var reader = new FileReader();//文件读取API
            reader.readAsDataURL(tmp);//将文件读取为url
            reader.onload = (function (f) {
                return function (e) {
                    var add ="<span class='boximg'><b class='delimg' onclick='delPrevEl(this);'>╳</b><img src=\""+e.target.result+"\" title=\""+f.name+"\"></span>";
                    $("#spn-img").append($(add));
                }
            })(tmp)
        }
    };

    var dropFile = function (e) {
        $("#warns").remove();
        fileUploadPreview(e.dataTransfer.files);
        e.stopPropagation();
        e.preventDefault();
        bgChange(2);
    };

    function delPrevEl(that){
        $(that).parent(".boximg").remove();
    }

</script>
</body>
</html>