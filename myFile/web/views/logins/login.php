<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>用户登陆</title>
        <script type="application/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
        <style>
            li{list-style:none;margin-top: 20px;}
            .input{width: 160px;height: 25px;}
        </style>
    </head>
    <body>
    <script>
        $(function () {
            change();
        });
        function change(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("Logins/yzm"); ?>",
                success: function(msg){
                    $("#yzm").html(msg);
                }
            });
        }

        function checkyzm(form){
            if($("input[name='data[username]']").val()==""){
                alert("您还没输入用户名！");
                return false;
            }
            if($("input[name='data[pwd]']").val()==""){
                alert("您还没输入密码！");
                return false;
            }
            if($("input[name='captcha']").val()==""){
                alert("您还没输入验证码！");
                return false;
            }
            var yzm = $("input[name='captcha']").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("Logins/checkyzm"); ?>",
                data: "captcha="+yzm,
                success: function(msg){
                    if(msg==1){
                        form.submit();
                    }else{
                        alert("验证码错误!");
                        return false;
                    }
                }
            });
        }
    </script>
        <form action='<?php echo site_url("Logins/login"); ?>' method="post" >
            <ul style="text-align: center;margin-top:80px;">
                <li><b>用户登陆</b></li>
                <input type="hidden" name="todo" value="save">
                <li><span>用户名：</span><input id="bb" class="input" type="text" name="data[username]" placeholder="请输入用户名/邮箱/手机" /></li>
                <li><span>密<font color="white">　</font>码：<input class="input" type="password" name="data[pwd]" placeholder="请输入密码"  /></li>
                <li><span>验证码：<input class="input" type="text" name="captcha" placeholder="请输入验证码" /> </li>
                <li><span id="yzm"></span><span onclick="change()">看不清，换一张</span></li>
                <li>
                    <span>记住密码</span><input type="checkbox" name="rempwd">
                    <a href="<?php echo site_url('Logins/register'); ?>">注册</a>
                    <a href="<?php echo site_url('Logins/find_password'); ?>">忘记密码</a>
                </li>
                <li><input type="button" value="登陆" onclick="checkyzm(this.form)"/>
                <input type="reset" value="重置" /></li>
            </ul>
        </form>
    </body>
</html>
