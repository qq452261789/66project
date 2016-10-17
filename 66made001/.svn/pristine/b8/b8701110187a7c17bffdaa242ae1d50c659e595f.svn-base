<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<form action='<?php echo site_url("Logins/register"); ?>' method="post">
    <ul style="text-align: center;margin-top:80px;">
        <li><b>用户注册</b></li>
        <input type="hidden" name="todo" value="save">
        <li><span>用户名：</span><input type="text" name="data[username]" placeholder="请输入用户名" required="required"/></li>
        <li><span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="data[pwd]" placeholder="请输入密码" required="required"/></li>
        <li><span>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span><input type="email" name="data[email]" placeholder="请输入邮箱" required="required" id="email"/></li>
        <li><a onclick="check()">发验证码</a></li>
        <li><span>验证码：</span><input type="text" name="data[code]" placeholder="请输入邮箱验证码" required="required"/></li>
        <li><span>手&nbsp;&nbsp;&nbsp;&nbsp;机：</span><input type="text" name="data[phone]" placeholder="请输入手机号码" required="required"></li>
        <li><span>是否注册会员</span><input type="checkbox" name="regvip" >  <a href="<?php echo site_url('Logins/login'); ?>">登陆</a></li>
        <li><input type="submit" value="注册"/>
            <input type="reset" value="重置" />
        </li>
    </ul>
</form>
</body>
<script>
    function check() {
        var email =  $('#email').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("Myemail/email"); ?>",
            data: "email="+email,
            success: function(msg){
                if(msg.split(",")[0].split(":")[1] == 300){
                    alert("邮箱已注册，换一个吧");
                }else{
                    alert("验证码已发出，请查收！");
                }
            }
        });
    }
</script>

</html>