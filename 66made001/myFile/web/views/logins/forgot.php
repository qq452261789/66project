<?php
/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-23 10:12
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户忘记密码</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<form action='<?php echo site_url("Logins/forgot"); ?>' method="post">
    <ul style="text-align: center;margin-top:80px;">
        <li><b>用户忘记密码</b></li>
        <input type="hidden" name="todo_1" value="save_1">
        <li> <span>您的注册邮箱</span><input type="email" name="email" placeholder="请输入邮箱" required="required" id="email"/></li>
        <li><a onclick="check()">发验证码</a></li>
        <li><span>验证码：</span><input type="text" name="data[code]" placeholder="请输入邮箱验证码" required="required"/></li>
        <li><input type="submit" value="提交"/>
        </li>
    </ul>
</form>
</body>
<script>
    function check() {
        var email =  $('#email').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("Myemail/check_email")?>",
            data: "email="+email,
            success: function(msg){
                console.log(msg);
                if(msg.split(",")[0].split(":")[1] == 300){
                    alert("邮箱还没注册，你先去注册一下吧！");
                }else{
                    alert("验证码已发出，请查收！!");
                }
            }
        });
    }
</script>
</html>

