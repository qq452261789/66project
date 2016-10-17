<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>素材修改</title>
    <script type="text/javascript" src='<?php echo base_url("static/js/jq.js"); ?>'></script>
    <style>
        li{list-style:none;margin-top: 10px;}
    </style>
</head>
<body>
<?php $this->load->library('javascript'); ?>
<div style="text-align: left;margin-top: 160px;margin-left: 44%">
    <?php echo form_open_multipart('Source/updateSource');?>
    <ul>
        <input type="hidden" name="todo" value="save">
        <li><input type="hidden" name="id" value="<?=$source->id?>"/></li>
        <li><span>素材名称：</span><input type="text" name="data[sourcename]" required="required" value="<?=$source->sourcename?>"/></li>
        <li><span>素材原型：</span><img src="<?=base_url($source->sourceurl)?>" width="100" height="100" /></li>
        <li><span>添加素材：</span><input type="file" name="userfile" size="20" required="required"/></li>
        <li><span>素材类型：</span><select name="data[sourcetypeid]">
                <?php foreach ($list as $item): ?>
                    <?php if($item->id==$source->sourcetypeid):?>
                        <option value="<?=$item->id?>" selected="selected"><?=$item->sourcetype?></option>
                    <?php else:?>
                    <option value="<?=$item->id?>"><?=$item->sourcetype?></option>
                    <?php endif; ?>
                <?php endforeach;?>
            </select></li>
        <br /><br />
        <li>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <input type="submit" value="上传素材" /></li>

    </ul>
    </form>
</div>
</body>
</html>