<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>主页</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
    <ul style="text-align: center;margin-top: 80px;">
        <li>欢迎您<?=$username?>  <a href="<?php echo site_url("Logins/logout"); ?>">退出</a></li>
    </ul>
    <ul style="text-align: left;margin-top: 80px;">
        <li><a href="<?php echo site_url("Mine/detail"); ?>">个人信息</a></li>
        <li><a href="<?php echo site_url("Sites/index"); ?>">网站列表</a></li>
        <li><a href="<?php echo site_url("Source/getSource"); ?>">素材列表</a></li>
    </ul>
</body>
</html>