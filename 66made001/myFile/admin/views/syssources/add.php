<style>
    .connt li{margin-top: 10px;}
</style>
<div class="pageContent" style="text-align: left;margin-top: 160px;margin-left: 44%">
    <form action="<?php echo site_url("SysSources/".$action."?todo=save"); ?>" method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <ul class="connt">
            <input type="hidden" name="todo" value="save">
            <li><span>素材名称：</span><input type="text" name="data[sourcename]" required="required" placeholder="请输入素材名称"/></li>
            <li><span>添加素材：</span><input type="file" name="myfile" size="20" required="required" /></li>
            <li><span>素材类型：</span><select name="data[sourcetypeid]">
                    <?php foreach ($list as $item): ?>
                        <option value="<?=$item->id?>"><?=$item->sourcetype?></option>
                    <?php endforeach;?>
                </select></li>
            <br /><br />
            <li>　　　　　<input type="submit" value="点击上传" /></li>
        </ul>
    </form>
</div>
<script type="text/javascript" src="<?php echo base_url("static/js/ajaxfileupload.js")?>"></script>
<script type="text/javascript">
    $(function(){
        var type = '<?=$action?>';
        if(type=='addMuss'){
            $(":file").attr("accept","audio/*");
        }
        if(type=='addVids'){
            $(":file").attr("accept","video/*");
        }
        $(":file").change(function(){
            var file = 'file';
            $.ajaxFileUpload({
                url: "<?php echo site_url("SysSources/uploadFile"); ?>", //用于文件上传的服务器端请求地址
                secureuri: false, //是否需要安全协议，一般设置为false
                fileElementId: file, //文件上传域的ID
                dataType: 'json', //返回值类型 一般设置为json
                success: function (data) { //服务器成功响应处理函数
                    if(data.sourceurl!='undefined'){
                        $("#form").append('<input type="hidden" name="data[sourceurl]" value="'+data.sourceurl+'"/>');
                        $("#new > img").attr("src",data.imgurl);
                        $("#new").css("display","block");
                    }else{
                        alert("上传失败！");
                    }
                }
            });
        });
    });
</script>