<div class="pageContent">
    <style>
        li{list-style:none;}
    </style>
<form action='<?php echo site_url("Role/updateRole"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
    <div layoutH="35">
        <ul style="text-align: center;margin-top: 80px;">
            <input type="hidden" name="todo" value="save">
            <li><input type="hidden" name="id" value="<?=$role->id?>" /></li>
            <li><span>角色名：</span><input type="text" name="data[rolename]" value="<?=$role->rolename?>" /></li>
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