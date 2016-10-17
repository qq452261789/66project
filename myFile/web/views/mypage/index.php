<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>上传图片</title>
	<style type="text/css">
    *{ margin:0; padding:0;}
    .a-upload {padding: 4px 10px;height: 40px;line-height: 40px;font-size:22px;position: relative;cursor: pointer;color:#183152;background:#f0f5f6;margin:2px 0px 0px 2px;
        border-radius: 4px;overflow: hidden;display: inline-block;*display: inline;*zoom: 1;}
    .a-upload  input { position: absolute;font-size: 100px;right: 0;top: 0;opacity: 0;filter: alpha(opacity=0);cursor: pointer;}
    .a-upload:hover {font-weight:bold;border-color: #ccc;text-decoration: none;}
    .showpics{display: none;}
    .showupload{display: block;}
	</style>
</head>
<body>
    <img src="<?php echo base_url("static/img/1.png")?>" alt="" / class = "imgchange">
    <div id="showupload" class="showupload">
        <a href="javascript:;" class="a-upload">
            <input type="file" name="myfile" id="myfile" accept="image/*">点击上传图片
        </a>
    </div>
<script type="text/javascript" src="<?php echo base_url("static/js/jq.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("static/js/ajaxfileuploads.js"); ?>"></script>
<script type="text/javascript">
    $(function(){
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
                    $(".imgchange").attr('src','<?php echo base_url("'+data[0].sourceurl+'")?>');
                }
            });
        });
    });
</script>
</body>
</html>