<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>网站基本信息编辑</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<form action='<?php echo site_url("Sites/updateSites"); ?>' method="post">
    <ul style="text-align: center;margin-top: 80px;">
        <input type="hidden" name="todo" value="save">
        <li><input type="hidden" name="id" value="<?=$site->id?>" /></li>
        <li><span>中文名：</span><input type="text" name="data[zhname]" value="<?=$site->zhname?>" /></li>
        <li><span>英文名：</span><input type="text" name="data[enname]" value="<?=$site->enname?>"/></li>
        <li><span>域&nbsp;&nbsp;&nbsp;&nbsp;名：</span><input type="text" name="data[domain]" value="<?=$site->domain?>"/></li>
        <li><span>描&nbsp;&nbsp;&nbsp;&nbsp;述：</span><textarea name="data[des]"><?=$site->des?></textarea></li>
        <li><span>网站类型：</span><select type="checkbox" name="data[sitetypeid]" >
                <?php foreach ($list as $item):?>
                    <?php if($item->id==$site->sitetypeid): ?>
                        <option value="<?=$item->id?>" selected="selected"><?=$item->typename?></option>
                    <?php else: ?>
                        <option value="<?=$item->id?>"><?=$item->typename?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select></li>
        <li><input type="submit" value="提交"/><input type="button" value="取消" onclick="location='<?php echo site_url("Users/index"); ?>'"/></li>
    </ul>
</form>
</body>
</html>