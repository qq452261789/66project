<?php
/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-23 11:17
 */


defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户重置密码</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
    <ul style="text-align: center;margin-top:80px;">
        <li><b>用户重置密码</b></li>
        <input type="hidden" name="todo_2" value="save_2">
        <input type="hidden" name="email" value="<?=$user->id?>" /> <!--        对应的id-->
        <li> <span>密码</span><input type="password" name="password_1" placeholder="请输入密码" required="required" /></li>
        <li> <span>验证密码</span><input type="password" name="password_2" placeholder="请再次输入密码" required="required" /></li>
        <li><input type="button" onclick="resetdo()" value="提交"/>
        </li>
    </ul>
</body>
<script>
    function resetdo(){
        var id = $("input[name='email']").val();
        var todo_2 = $("input[name='todo_2']").val();
        var password_1 = $("input[name='password_1']").val();
        var password_2 = $("input[name='password_2']").val();
        if(password_1!==password_2){
            alert("两次输入的密码不同！");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("Logins/forgot"); ?>",
            data: "email="+id+"&todo_2="+todo_2+"&pwd="+password_1,
            success: function(msg){
//                console.log(msg);
//                alert( msg.split(",")[0].split(":")[1]);
                if(msg.split(",")[0].split(":")[1] == 200){
                    alert("恭喜，修改成功！！");
                }else{
                    alert("悲催，修改失败，重试吧！！");
                }
                window.location.href="<?php echo site_url("logins/login"); ?>";
            }
        });
    }
</script>
</html>