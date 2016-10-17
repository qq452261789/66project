<div class="pageContent">
    <style>.myul li{list-style: none;height: 36px;line-height: 36px;}</style>
    <form action='<?php echo site_url("Users/updateUser"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35">
            <ul class="myul" style="text-align: center;margin-top: 80px;">
                <input type="hidden" name="location" value="<?=$location?>"/>
                <input type="hidden" name="todo" value="save" />
                <li><input type="hidden" name="id" value="<?=$user->id?>" /></li>
                <li><span>用户名：</span><input type="text" name="data[username]" value="<?=$user->username?>" required="required" /></li>
                <li><span>密<font color="#fff">　</font>码：</span><input type="password" name="data[pwd]" value="<?=$pwd?>" /></li>
                <li><span>邮<font color="#fff">　</font>箱：</span><input type="text" name="data[email]" value="<?=$user->email?>"  required="required" /></li>
                <li><span>手<font color="#fff">　</font>机：</span><input type="text" name="data[phone]" value="<?=$user->phone?>"  required="required" /></li>
                <li><span>状<font color="#fff">　</font>态：</span><select name="data[state]" style="width:144px;">
                        <?php if($user->state==0):?>
                            <option value="0" selected="selected">正常</option>
                        <?php else:?>
                            <option value="0">正常</option>
                        <?php endif;?>
                        <?php if($user->state==1):?>
                            <option value="1" selected="selected">禁用</option>
                        <?php else:?>
                            <option value="1">禁用</option>
                        <?php endif;?>
                        <?php if($user->state==2):?>
                            <option value="2" selected="selected">删除</option>
                        <?php else:?>
                            <option value="2">删除</option>
                        <?php endif;?>
                    </select></li>
                <p><label>等　级：</label>
                    <select name="data[memberlevel]" class="dj">
<!--                        <option value ="0">0</option>-->
<!--                        <option value ="1">等级一</option>-->
<!--                        <option value ="2">等级二</option>-->
<!--                        <option value="3">等级三</option>-->
<!--                        <option value="4">等级四</option>-->
<!--                        <option value="5">等级五</option>-->

                        <?php if($user->memberlevel == 0):?>
                            <option value="0" selected="selected">一般用户</option>
                        <?php else:?>
                            <option value="0">一般用户</option>
                        <?php endif;?>
                        <?php if($user->memberlevel==1):?>
                            <option value="1" selected="selected">等级一</option>
                        <?php else:?>
                            <option value="1">等级一</option>
                        <?php endif;?>
                        <?php if($user->memberlevel==2):?>
                            <option value="2" selected="selected">等级二</option>
                        <?php else:?>
                            <option value="2">等级二</option>
                        <?php endif;?>
                        <?php if($user->memberlevel==3):?>
                            <option value="3" selected="selected">等级三</option>
                        <?php else:?>
                            <option value="3">等级三</option>
                        <?php endif;?>
                        <?php if($user->memberlevel==4):?>
                            <option value="4" selected="selected">等级四</option>
                        <?php else:?>
                            <option value="4">等级四</option>
                        <?php endif;?>
                        <?php if($user->memberlevel==5):?>
                            <option value="5" selected="selected">等级五</option>
                        <?php else:?>
                            <option value="5">等级五</option>
                        <?php endif;?>
                    </select>
                    <span><font style="color: red">* 会员等级</font></span>
                </p>
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