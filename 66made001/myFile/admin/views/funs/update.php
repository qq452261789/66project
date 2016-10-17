<div class="pageContent">
    <style>
        .page ul li{list-style:none;line-height: 40px;}
        .page ul li select{width:126px;}
    </style>
    <form action='<?php echo site_url("Funs/updateFun"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35" class="page">
            <ul style="text-align: center;margin-top: 80px;">
                <input type="hidden" name="todo" value="save">
                <li><input type="hidden" name="id" value="<?=$fun->id?>" /></li>
                <li><span>功能名：</span><input type="text" name="data[funname]" value="<?=$fun->funname?>" required="required" /></li>
                <li><span>控制器：</span><input type="text" name="data[contrl]" value="<?=$fun->contrl?>" required="required" /></li>
                <li><span>方法名：</span><input type="text" name="data[funcs]" value="<?=$fun->funcs?>" required="required" /></li>
                <li><span>是否菜单：</span>
                    <select name="data[isnav]">
                        <?php if($fun->isnav==0):?>
                            <option value='0' selected="selected">否</option>
                        <?php else:?>
                            <option value='0'>否</option>
                        <?php endif;?>
                        <?php if($fun->isnav==1):?>
                            <option value='1'  selected="selected">是</option>
                        <?php else:?>
                            <option value='1'>是</option>
                        <?php endif;?>
                    </select>
                </li>
                <li><span>所属分类：</span>
                    <select name="data[fid]">
                        <option value='0'>改为新分类</option>
                        <?php foreach ($floder as $item):?>
                            <?php if($item->id==$fun->fid):?>
                                <option value='<?=$item->id?>' selected="selected"><?=$item->funname?></option>
                            <?php else:?>
                            <option value='<?=$item->id?>'><?=$item->funname?></option>
                            <?php endif;?>
                        <?php endforeach;?>
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
    <script type="text/javascript">
        $(function (){
            $("select[name='data[fid]']").change(function(){
                if($("select[name='data[fid]']").val()==0){
                    $("input[name='data[contrl]']").val('#');
                    $("input[name='data[funcs]']").val('#');
                    $("input[name='data[contrl]']").attr('readonly','readonly');
                    $("input[name='data[funcs]']").attr('readonly','readonly');
                    $("#ismenu").attr('selected','selected');
                    $("select[name='data[isnav]']").attr('disabled','disabled');
                    $("select[name='data[isnav]']").val(1);
                }else{
                    $("input[name='data[contrl]']").removeAttr('readonly','readonly');
                    $("input[name='data[funcs]']").removeAttr('readonly','readonly');
                    $("select[name='data[isnav]']").removeAttr('disabled','disabled');
                }
            });
        });
    </script>
</div>