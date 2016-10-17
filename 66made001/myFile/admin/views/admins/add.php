<div class="pageContent">
<form action='<?php echo site_url("Admin/addAdmin"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
    <input type="hidden" name="todo" value="save"/>
    <div layoutH="35">
        <style>
            p{margin-top: 16px;text-align: center;font-size: 20px;line-height: 26px;}
            input{width:200px;height:26px;}
        </style>
        <p><b>管理员添加</b></p>
        <p><label>用户名：</label><input type="text" name="data[adname]" placeholder="请输入用户名" required="required"/></p>
        <p><label>密　码：</label><input type="password" name="data[pwd]" placeholder="请输入密码" required="required"/></p>
        <p><label>邮　箱：</label><input type="email" name="data[email]" placeholder="请输入邮箱" required="required"/></p>
        <p><label>手　机：</label><input type="text" name="data[phone]" placeholder="请输入手机号码" required="required"  pattern=/(^[0-9]{3,4}\-{0,1}[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/ /></p>
        <p><label>角　色：</label><select name="data[roleid]" style="width:206px;height:30px;">
                <?php foreach ($roles as $item): ?>
                <option value="<?=$item->id?>"><?=$item->rolename?></option>
                <?php endforeach; ?>
            </select></p>
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