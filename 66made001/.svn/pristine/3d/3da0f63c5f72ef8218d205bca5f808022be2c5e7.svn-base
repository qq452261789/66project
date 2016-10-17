<div class="pageContent">
    <style>
        .page ul li{list-style:none;line-height: 40px;}
        .page ul li select{width:142px;}
    </style>
    <form action='<?php echo site_url("Plugs/updatePlug"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35" class="page">
            <ul style="text-align: center;margin-top: 80px;">
                <input type="hidden" name="todo" value="save">
                <li><input type="hidden" name="id" value="<?=$plug->id?>" /></li>
                <li><span>插件名称：</span><input type="text" name="data[plugname]" value="<?=$plug->plugname?>" required="required" /></li>
                <li><span>插件内容：</span><input type="text" name="data[plugbody]" value="<?=$plug->plugbody?>" required="required" /></li>
                <li><span>插件价格：</span><input type="text" name="data[plugprice]" value="<?=$plug->plugprice?>" required="required" /></li>
                <li><span>是否显示：</span>
                    <select name="data[plugstate]">
                        <option value='0'>显示</option>
                        <option value='1'>不显示</option>
                    </select>
                </li>
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