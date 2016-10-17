<style>
    *{ margin:0; padding:0;}
    #box{width:100%; min-height:1000px;}
    .a-upload {padding: 4px 10px;height: 40px;line-height: 40px;font-size:22px;position: relative;cursor: pointer;color:#183152;background:#f0f5f6;margin:2px 0px 0px 2px;
        border-radius: 4px;overflow: hidden;display: inline-block;*display: inline;*zoom: 1}
    .a-upload  input { position: absolute;font-size: 100px;right: 0;top: 0;opacity: 0;filter: alpha(opacity=0);cursor: pointer}
    .a-upload:hover {font-weight:bold;border-color: #ccc;text-decoration: none}
    .showpics{display: none}
    .showupload{display: block}
</style>
<div class="pageContent" id="box">
    <div id="showpics" class="showpics">
        <form action="<?php echo site_url("SysSources/addPics?todo=save"); ?>" method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
            <div layoutH="35" id="savePics" class="page">

            </div>
            <div class="formBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                    <li>
                        <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div id="showupload" class="showupload">
        <a href="javascript:;" class="a-upload">
            <input type="file" name="myfile[]" id="myfile" multiple="multiple" accept="image/*">点击这批量上传文件
        </a>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url("static/js/ajaxfileupload.js")?>"></script>
<script type="text/javascript">
    $(function(){
        $("#myfile").change(function(){
            var file = "myfile";
            $.ajaxFileUpload({
                url: "<?php echo site_url("SysSources/addPics?todo=upload"); ?>", //用于文件上传的服务器端请求地址
                secureuri: false, //是否需要安全协议，一般设置为false
                fileElementId: file, //文件上传域的ID
                dataType: 'json', //返回值类型 一般设置为json
                success: function (data){ //服务器成功响应处理函数
                    if(data.length>0){
                        $.each(data, function(a, b){
                            html = '<div style="float: left;margin-left: 10px;width: 82px;height: 100px;margin-top: 2px;" id="pic"'+a+'>';
                            $.each(b, function(m, n) {
                                if(m=='imgurl'){
                                    html += '<img src="'+n+'" width="80" height="80">';
                                }else{
                                    html += '<input type="hidden" name="data[pics]['+a+']['+m+']" value="'+n+'">';
                                }
                            });
                            html += '<input type="hidden" name="data[pics]['+a+'][sourcetypeid]" value="1">';
                            html += '<span style="width: 82px;height:19px;"><input type="text" name="data[pics]['+a+'][sourcename]" placeholder="请输入图片名称" style="width: 80px;" required="required"></span></div>';
                            $("#savePics").append(html);
                        });
                        $("#showpics").css("display","block");
                        $("#showupload").css("display","none");
                    }else{
                        alert("图片上传失败！");
                    }
                },
                error: function (data,e){//服务器响应失败处理函数
                    alert(e);
                }
            });
        });
    });
</script>