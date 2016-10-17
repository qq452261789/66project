<style>
    .content{width:100%;margin-top: 10px;text-align: center;}
    .buttonContent a{text-decoration: none;line-height: 25px;}
</style>
<div class="pageContent">
    <div layoutH="45" style="text-align: center;margin-top: 10px;">
        <?php if($source->sourcetypeid==2 || $source->sourcetypeid==3):?>
            <video src="<?php echo base_url($source->sourceurl)?>" autoplay="true" controls="true" width="400" height="400">您的浏览器不支持此视频。</video>
        <?php else:?>
            <img src="<?php echo base_url($source->sourceurl)?>" width="300" height="300" />
        <?php endif;?>
        <ul class="content"><?=$source->sourcename?></ul>
    </div>
    <div class="formBar">
        <ul>
            <li>
                <div class="button"><div class="buttonContent"><a href="<?php echo site_url("Sources/updateSources?todo=save&act=ok&id=".$source->id); ?>" type="button" target="ajaxTodo">正常</a></div></div>
            </li>
            <li>
                <div class="button"><div class="buttonContent"><a href="<?php echo site_url("Sources/updateSources?todo=save&act=upd&id=".$source->id); ?>"  target="ajaxTodo">禁用</a></div></div>
            </li>
            <li>
                <div class="button"><div class="buttonContent"><a href="<?php echo site_url("Sources/updateSources?todo=save&act=del&id=".$source->id); ?>" target="ajaxTodo" title="确定要删除吗?">删除</a></div></div>
            </li>
            <li>
                <div class="button"><div class="buttonContent"><button class="close">取消</button></div></div>
            </li>
        </ul>
    </div>
</div>