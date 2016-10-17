<div class="pageContent">
    <style>.myul li{list-style: none;height: 36px;line-height: 36px;}</style>
    <form action='<?php echo site_url("Admin/updateAdmin"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35">
        <ul class="myul" style="text-align: center;margin-top: 80px;">
            <input type="hidden" name="todo" value="save" />
            <li><input type="hidden" name="id" value="<?=$admin->id?>" /></li>
            <li><span>用户名：</span><input type="text" name="data[adname]" value="<?=$admin->adname?>" required="required" /></li>
            <li><span>密<font color="#fff">　</font>码：</span><input type="password" name="data[pwd]" value="<?=$pwd?>" /></li>
            <li><span>邮<font color="#fff">　</font>箱：</span><input type="email" name="data[email]" value="<?=$admin->email?>"  required="required" /></li>
            <li><span>手<font color="#fff">　</font>机：</span><input type="text" name="data[phone]" value="<?=$admin->phone?>"  required="required" /></li>
            <li><span>状<font color="#fff">　</font>态：</span><select name="data[state]" style="width:144px;">
                    <?php if($admin->state==0):?>
                        <option value="0" selected="selected">正常</option>
                    <?php else:?>
                        <option value="0">正常</option>
                    <?php endif;?>
                    <?php if($admin->state==1):?>
                        <option value="1" selected="selected">禁用</option>
                    <?php else:?>
                        <option value="1">禁用</option>
                    <?php endif;?>
                    <?php if($admin->state==2):?>
                        <option value="2" selected="selected">删除</option>
                    <?php else:?>
                        <option value="2">删除</option>
                    <?php endif;?>
            </select></li>
            <li><span>角&nbsp;&nbsp;&nbsp;&nbsp;色：</span><select name="data[roleid]" style="width:144px;">
                    <?php foreach ($roles as $item): ?>
                        <?php if($item->id==$admin->roleid):?>
                            <option value="<?=$item->id?>" selected="selected"><?=$item->rolename?></option>
                        <?php else:?>
                        <option value="<?=$item->id?>"><?=$item->rolename?></option>
                        <?php endif;?>
                    <?php endforeach; ?>
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