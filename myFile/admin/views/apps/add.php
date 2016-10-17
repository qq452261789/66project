<div class="pageContent">
<form action='<?php echo site_url("Apps/addApp"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
    <input type="hidden" name="todo" value="save"/>
    <div layoutH="35">
        <style>
p{margin-top: 16px;text-align: center;font-size: 20px;line-height: 26px;}
            input{width:200px;height:26px;}
            .page ul li{list-style:none;line-height: 40px;}
            .page ul li select{width:142px;}
        </style>
        <ul style="text-align: center;margin-top: 80px;">
            <input type="hidden" name="todo" value="save">
            <li><span>应用名称：</span><input type="text" name="data[appname]" placeholder="请输入应用名称" required="required" /></li>
            <li><span>应用内容：</span><input type="text" name="data[appbody]" placeholder="请输入应用内容" required="required" /></li>
            <li><span>应用简介：</span><input type="text" name="data[appintro]" placeholder="请输入应用简介" required="required" /></li>
            <li><span>应用价格：</span><input type="text" name="data[appprice]" placeholder="请输入应用价格" /></li>
            <li><span>是否显示：</span>
                <select name="data[appstate]">
                    <option value='0'>显示</option>
                    <option value='1'>不显示</option>
                </select>
            </li>
        </ul>
</p>
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