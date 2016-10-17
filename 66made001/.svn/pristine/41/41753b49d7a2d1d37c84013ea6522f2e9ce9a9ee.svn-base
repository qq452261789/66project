<form id="pagerForm" method="post" action="<?php echo site_url("Users/index"); ?>">
	<input type="hidden" name="status" value="">
	<input type="hidden" name="keywords" value="" />
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="35" />
	<input type="hidden" name="orderField" value="" />
</form>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="<?php echo site_url("Users/addUser?location=".$location); ?>" target="navTab" rel="admin_add"><span>添加</span></a></li>
			<li><a class="edit" href="<?php echo site_url("Users/updateUser?id={userId}&location=".$location); ?>" target="navTab"><span>修改</span></a></li>
			<li><a class="delete" href="<?php echo site_url("Users/deleteUser?id={userId}&location=".$location); ?>" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>

	<table layoutH="75" width="100%" class="table">
		<thead style="text-align: center;">
		<tr>
			<th width="100">用户名</th>
			<th width="100">邮箱</th>
			<th width="100">手机号</th>
			<th width="100">等级</th>
			<th width="100">状态</th>
		</tr>

		</thead>
		<tbody style="text-align: center;">
		<?php foreach ($list as $item): ?>
				<tr target="userId" rel="<?=$item->id?>">
				<td><?=$item->username?></td>
				<td><?=$item->email?></td>
				<td><?=$item->phone?></td>
					<td><?php if($item->memberlevel==0):?>一般用户
						<?php elseif($item->memberlevel==1):?><span style="height:100%;line-height: 21px;">等级一</span>
						<?php elseif($item->memberlevel==2):?><span style="height:100%;line-height: 21px;">等级二</span>
						<?php elseif($item->memberlevel==3):?><span style="height:100%;line-height: 21px;">等级三</span>
						<?php elseif($item->memberlevel==4):?><span style="height:100%;line-height: 21px;">等级四</span>
						<?php elseif($item->memberlevel==5):?><span style="height:100%;line-height: 21px;">等级五</span>
						<?php endif;?></td>
				<td><?php if($item->state==0):?>正常
					<?php elseif($item->state==1):?><span style="color:#cc0000;height:100%;line-height: 21px;">禁用</span>
					<?php elseif($item->state==2):?><span style="color: gold;height:100%;line-height: 21px;">删除</span>
					<?php endif;?></td>
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