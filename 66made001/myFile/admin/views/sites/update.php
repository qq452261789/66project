<div class="pageContent">
    <style>
        .page ul li{list-style:none;line-height: 40px;}
        .page ul li select{width:144px;}
    </style>
    <form action='<?php echo site_url("Sites/updateSite"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35"  class="page">
            <ul style="text-align: center;margin-top: 80px;">
                <input type="hidden" name="todo" value="save" />
                <li><input type="hidden" name="id" value="<?=$site->id?>" /></li>
                <li><span>网站域名：</span><input type="text" name="data[enname]" value="<?=$site->enname?>" required="required" /></li>
                <li><span>状　　态：</span><select name="data[sitestate]">
                        <?php if($site->sitestate==0):?>
                            <option value="0" selected="selected">正常</option>
                        <?php else:?>
                            <option value="0">正常</option>
                        <?php endif;?>
                        <?php if($site->sitestate==1):?>
                            <option value="1" selected="selected">禁用</option>
                        <?php else:?>
                            <option value="1">禁用</option>
                        <?php endif;?>

                        <?php if($site->sitestate==2):?>
                            <option value="2" selected="selected">删除</option>
                        <?php else:?>
                            <option value="2">删除</option>
                        <?php endif;?>

                    </select></li>
            </ul>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>