<div class="pageContent">
    <style>
        .conts li{list-style:none;margin-top: 10px;}
        input{width: 150px;height:22px;}
    </style>
    <form action='<?php echo site_url("SourceType/addSourceType"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35">
            <ul style="text-align: center;margin-top: 80px;" class="conts">
                <input type="hidden" name="todo" value="save">
                <li><span>素材类型名：</span><input type="text" name="data[sourcetype]" placeholder="请输入素材类型名" /></li>
                <li><span>最大上传值：</span><input type="text" name="data[maxsize]" placeholder="请输入素材允许上传最大值" /></li>
            </ul>
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