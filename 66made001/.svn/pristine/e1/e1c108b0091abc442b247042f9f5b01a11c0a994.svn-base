<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陆陆科技后台管理</title>
	<link href="<?php echo base_url('static/themes/default/style.css')?>" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo base_url('static/themes/css/core.css')?>" rel="stylesheet" type="text/css" media="screen"/>
	<!--[if IE]>
	<link href="<?php echo base_url('static/themes/css/ieHack.css')?>" rel="stylesheet" type="text/css" media="screen"/>
	<![endif]-->
	<!--[if lte IE 9]>
	<script src="<?php echo base_url('static/js/speedup.js')?>" type="text/javascript"></script>
	<![endif]-->
	<script src="<?php echo base_url('static/js/jquery-1.11.3.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/js/jquery.cookie.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/js/jquery.validate.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/js/jquery.bgiframe.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/js/dwz.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/js/dwz.regional.zh.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/xheditor/xheditor-1.2.2.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('static/xheditor/xheditor_lang/zh-cn.js')?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
			DWZ.init("<?php echo base_url('static/dwz.frag.xml')?>", {
				loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
				statusCode:{ok:200, error:300, timeout:301}, //【可选】
				pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
				keys: {statusCode:"statusCode", message:"message"}, //【可选】
				ui:{hideMode:'offsets'}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
				debug:true,	// 调试模式 【true|false】
				callback:function(){
					initEnv();
					$("#themeList").theme({themeBase:"<?php echo base_url('static/themes')?>"}); // themeBase 相对于index页面的主题base路径
				}
			});
		});
	</script>
</head>
<body scroll="no">
<div id="layout">
	<div id="header">
		<div class="headerNav">
			<a class="logo" href="<?php echo site_url()?>">1111</a>
			<ul class="nav">
				<li><a href="<?php echo base_url()?>" target="_blank">主页</a></li>
				<li><a href="<?php echo site_url("Logins/logout"); ?>">退出</a></li>
			</ul>
			<ul class="themeList" id="themeList" style="color: ghostwhite;">
				<li>欢迎登录，<?=$adname?>！</li>

			</ul>
		</div>
		<!-- navMenu -->
	</div>

	<div id="leftside">
		<div id="sidebar_s">
			<div class="collapse">
				<div class="toggleCollapse"><div></div></div>
			</div>
		</div>
		<div id="sidebar">
			<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

			<div class="accordion" fillSpace="sidebar">
                <?php if(!empty($list)):?>
                    <?php foreach ($list as $item): ?>
                        <?php if(!empty($item->chid)):?>
                        <div class="accordionHeader">
                            <h2><span>Folder</span><?=$item->funname?></h2>
                        </div>
                        <div class="accordionContent">
                            <ul class="tree treeFolder tree">
                                <?php foreach ($item->chid as $v):?>
                                    <li><a href="<?php echo site_url($v->contrl."/".$v->funcs); ?>" target="navTab" rel="<?=strtolower($v->contrl)?>_<?=strtolower($v->funcs)?>"><?=$v->funname?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endif;?>
			</div>
		</div>
	</div>
	<div id="container">
		<div id="navTab" class="tabsPage">
			<div class="tabsPageHeader">
				<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
					<ul class="navTab-tab">
						<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
					</ul>
				</div>
				<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
				<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
				<div class="tabsMore">more</div>
			</div>
			<ul class="tabsMoreList">
				<li><a href="javascript:;">我的主...页</a></li>
			</ul>
			<div class="navTab-panel tabsPageContent layoutBox">
                <div class="page unitBox">
                    <div class="pageFormContent" layoutH="80">
                        <table width="98%" >



                        </table>
                    </div>
                </div>

            </div>
		</div>
	</div>

</div>

<div id="footer">Copyright &copy; 2016-2018 <a href="http://www.66made.com" target="_blank">后台</a> 版权所有 问题反馈 联系：912201127@qq.com</div>
</body>
</html>