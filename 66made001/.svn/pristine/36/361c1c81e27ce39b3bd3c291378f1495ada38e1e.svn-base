<div class="pageContent">
    <form action='<?php echo site_url("Users/addUser"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <input type="hidden" name="todo" value="save"/>
        <div layoutH="35">
            <style>
                p{margin-top: 16px;text-align: center;font-size: 20px;line-height: 26px;}
                input{width:200px;height:26px;}
                p .dj{width:127px;height:26px;}
            </style>
            <p><b>用户添加</b></p>
            <input type="hidden" name="location" value="<?=$location?>"/>
            <p><label>用户名：</label><input type="text" name="data[username]" placeholder="请输入用户名" required="required"/></p>
            <p><label>密　码：</label><input type="password" name="data[pwd]" placeholder="请输入密码" required="required"/></p>
            <p><label>邮　箱：</label><input type="email" name="data[email]" placeholder="请输入邮箱" required="required"/></p>
            <p><label>手　机：</label><input type="text" name="data[phone]" placeholder="请输入手机号码" required="required"  pattern=/(^[0-9]{3,4}\-{0,1}[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/ /></p>
            <p><label>等　级：</label>
                <select name="data[memberlevel]" class="dj">
                    <option value ="0">一般用户</option>
                    <option value ="1">等级一</option>
                    <option value ="2">等级二</option>
                    <option value="3">等级三</option>
                    <option value="4">等级四</option>
                    <option value="5">等级五</option>
                </select>
                <span><font style="color: red">* 会员等级</font></span>
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