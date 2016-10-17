<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>网站添加</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<form action='<?php echo site_url("Sites/addSites"); ?>' method="post">
    <ul style="text-align: center;margin-top:80px;">
        <li><b>网站添加</b></li>
        <input type="hidden" name="todo" value="save">
        <li><span>中文名：</span><input type="text" name="data[zhname]" placeholder="请输入网站中文名" required="required"/></li>
        <li><span>英文名：</span><input type="text" name="data[enname]" placeholder="请输入网站英文名或拼音" required="required"/></li>
        <li><span>域&nbsp;&nbsp;&nbsp;&nbsp;名：</span><input type="text" name="data[domain]" placeholder="请输入您的域名"/></li>
        <li><span>描&nbsp;&nbsp;&nbsp;&nbsp;述：</span><textarea name="data[des]"></textarea></li>
        <li><span>网站类型：</span><select type="checkbox" name="data[sitetypeid]" >
                <?php foreach ($list as $item):?>
                    <?php if($item->id==1): ?>
                        <option value="<?=$item->id?>" selected="selected"><?=$item->typename?></option>
                    <?php else: ?>
                        <option value="<?=$item->id?>"><?=$item->typename?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select></li>
        <li><input type="submit" value="添加"/>
            <input type="reset" value="重置" />
        </li>
    </ul>
</form>
</body>
</html>