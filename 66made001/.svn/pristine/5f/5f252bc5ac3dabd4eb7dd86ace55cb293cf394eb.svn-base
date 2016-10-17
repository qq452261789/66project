<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>个人信息详情</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<ul>
    <li><span>用户名：</span><?=$mine->username?></li>
    <li><span>邮箱：</span><?=$mine->email?></li>
    <li><span>手机：</span><?=$mine->phone?></li>
    <li><a href="<?php echo site_url("Mine/updateMine?id=".$mine->id); ?>">修改</a></li>
</ul>
</body>
</html>