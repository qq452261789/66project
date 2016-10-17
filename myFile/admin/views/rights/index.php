<div class="pageContent" style="margin-left: 8px;">
    <div style="line-height: 8px;">&nbsp;</div>
<label>已有权限：</label>
<div style="margin: 8px;height: 120px;">
    <style>
        span{margin-right:8px;font-size: 14px;line-height: 20px;}
    </style>
<input type="hidden" name="roleid" value="<?=$roleid?>">
<?php foreach ($list as $v):?>
    <span id="<?=$v->funid?>" onclick="deletes('<?=$v->funid?>')"><?=$v->funname?></span>
<?php endforeach;?>
</div>
<label>全部权限：</label>
<div id="allr" style="margin:8px;height: 120px;">
    <?php foreach ($funs as $item): ?>
        <span id="<?=$item->id?>" onclick="adds('<?=$item->id?>')"><?=$item->funname?></span>
    <?php endforeach; ?>
</div>
<form method="post" id="actad" onsubmit="return validateCallback(this, navTabAjaxDone)">
    <input name="roleid" type="hidden" value="<?=$roleid?>"/>
    <input  name="funid" type="hidden" />
</form>
<script type="text/javascript">
    $(function(){
        <?php foreach ($list as $v):?>
            $("div[id='allr']>span[id='<?=$v->funid?>']").css("color","#fff");
            $("div[id='allr']>span[id='<?=$v->funid?>']").css("background","#00AAFF");
            $("div[id='allr']>span[id='<?=$v->funid?>']").css("border-radius","2px");
        <?php endforeach;?>
    });
    function deletes(a){
        $("form[id='actad']").attr("action","<?php echo site_url('Rights/deleteRight'); ?>");
        $("form[id='actad']>input[name='funid']").val(a);
        var form = $("form[id='actad']");
        form.submit();
    }
    function adds(a){
        $("form[id='actad']").attr("action","<?php echo site_url('Rights/addRight'); ?>");
        $("form[id='actad']>input[name='funid']").val(a);
        var form = $("form[id='actad']");
        form.submit();
    }
</script>
</div>


