<form id="pagerForm" method="post" action="<?php echo site_url("Sites/index"); ?>">
    <input type="hidden" name="status" value="">
    <input type="hidden" name="keywords" value="" />
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="35" />
    <input type="hidden" name="orderField" value="" />
</form>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="edit" href="<?php echo site_url("Sites/updateSite?id={siteId}"); ?>" target="navTab"><span>修改/删除</span></a></li>
            <li class="line">line</li>
        </ul>
    </div>

    <table layoutH="75" width="100%" class="table">
        <thead style="text-align: center;">
        <tr>
            <th width="100">网站名称</th>
            <th width="100">域名</th>
            <th width="100">网站url</th>
            <th width="100">拥有者</th>
            <th width="100">状态</th>
        </tr>

        </thead>
        <tbody style="text-align: center;">
        <?php foreach ($list as $item): ?>
            <tr target="siteId" rel="<?=$item->id?>">
                <td><?=$item->zhname?></td>
                <td><?=$item->enname?></td>
                <td><?=$item->domain?></td>
                <td><?=$item->username?></td>
                <td><?php if($item->sitestate==0):?>正常
                    <?php elseif($item->sitestate==1):?><span style="color:#cc0000;height:100%;line-height: 21px;">禁用</span>
                    <?php elseif($item->sitestate==2):?><span style="color: gold;height:100%;line-height: 21px;">删除</span>
                    <?php endif;?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="35">35</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?=$page['count']?>条</span>
        </div>

        <div class="pagination" targetType="navTab" totalCount="<?=$page['count']?>" numPerPage="<?=$page['numPerPage']?>" pageNumShown="10" currentPage="<?=$page['pageNum']?>" ></div>

    </div>
    <script type="text/javascript">
        $(function(){
            $(".combox>option[value='<?=$page['numPerPage']?>']").attr('selected','selected');
        });
    </script>
</div>