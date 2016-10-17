<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>陆陆后台管理</title>
<link href="<?php echo base_url('static/themes/css/login.css') ?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('static/themes/default/images/login_logo.gif') ?>" /></a>
			</h1>
			<div class="login_headerContent">
				<div class="navList">
					<ul>
						<li><a href="<?php echo base_url()?>" target="_blank">去首页</a></li>
						<li><a href="http://66made.com/about_two.html" target="_blank">帮助</a></li>
					</ul>
				</div>
				<h2 class="login_title"><img src="<?php echo base_url('static/themes/default/images/login_title.png') ?>" /></h2>
			</div>
		</div>
		<div id="login_content">
			<div class="loginForm">
				<form action="<?php echo site_url("Logins/login"); ?>" method="post">
                    <input type="hidden" name="todo" value="save">
					<p>
						<label>用户名：</label>
						<input type="text" name="data[adname]" size="20" class="login_input" />
					</p>
					<p>
						<label>密码：</label>
						<input type="password" name="data[pwd]" size="20" class="login_input" />
					</p>
                    <p>
                        <label>记住密码：</label>
                        <input type="checkbox" name="rempwd" >
                    </p>
					<div class="login_bar">
						<input class="sub" type="submit" value=" " />
					</div>
				</form>
				<div style="float: right;">
					<a href="tencent://message/?uin=903944126&amp;Site=QQ交谈&amp;Menu=yes">联系客服</a>
				</div>
			</div>
			<div class="login_banner"><img src="<?php echo base_url('static/themes/default/images/login_banner.jpg') ?>" /></div>
		</div>
		<div id="login_footer">
			Copyright 2016~2018　www.66made.com　All Rights Reserved.
		</div>
	</div>
</body>
</html>