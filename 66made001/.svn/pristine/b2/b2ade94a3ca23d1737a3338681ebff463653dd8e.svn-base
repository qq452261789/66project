<div class="pageContent">
    <style>
        .page ul li{list-style:none;line-height: 40px;}
        .page ul li select{width:126px;}
    </style>
    <form action='<?php echo site_url("Funs/addFun"); ?>' method="post" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <div layoutH="35" class="page">
        <ul style="text-align: center;margin-top: 80px;">
            <input type="hidden" name="todo" value="save">
            <li><span>功能名：</span><input type="text" name="data[funname]" placeholder="请输入功能名" required="required" /></li>
            <li><span>控制器：</span><input type="text" name="data[contrl]" placeholder="请输入控制器" required="required" /></li>
            <li><span>方法名：</span><input type="text" name="data[funcs]" placeholder="请输入方法名" required="required" /></li>
            <li><span>是否菜单：</span>
                <select name="data[isnav]">
                    <option value='0'>否</option>
                    <option value='1' id="ismenu">是</option>
                </select>
            </li>
            <li><span>所属分类：</span>
                <select name="data[fid]">
                    <?php foreach ($floder as $item):?>
                    <option value='<?=$item->id?>'><?=$item->funname?></option>
                    <?php endforeach;?>
                    <option value='0'>添加为新分类</option>
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
                    $("select[name='data[isnav]']").val('1');
                }else{
                    $("input[name='data[contrl]']").removeAttr('readonly','readonly');
                    $("input[name='data[funcs]']").removeAttr('readonly','readonly');
                    $("select[name='data[isnav]']").removeAttr('disabled','disabled');
                }
            });
        });
    </script>
</div>