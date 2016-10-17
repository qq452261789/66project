<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>个人信息修改</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<form action='<?php echo site_url("Mine/updateMine"); ?>' method="post">
    <ul style="text-align: center;margin-top: 80px;">
        <input type="hidden" name="todo" value="save">
        <li><b>个人信息修改</b></li>
        <li><input type="hidden" name="id" value="<?=$mine->id?>" /></li>
        <li><span>用户名：</span><input type="text" name="data[username]" value="<?=$mine->username?>" required="required"/></li>
        <li><span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="data[pwd]" value="" /></li>
        <li><span>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span><input type="email" name="data[email]" value="<?=$mine->email?>" required="required"/></li>
        <li><span>手&nbsp;&nbsp;&nbsp;&nbsp;机：</span><input type="text" name="data[phone]" value="<?=$mine->phone?>" required="required" pattern=/(^[0-9]{3,4}\-{0,1}[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/ /></li>
        <li><input type="submit" value="修改"/></li>
    </ul>
</form>
</body>
</html>