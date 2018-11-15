<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/zhcp/Public/css/admin.css" />
</head>
<body>
	<table class="table">
		<tr>
			<td colspan='2' class="th"><span class="span_people">&nbsp</span>欢迎来到管理后台</td>
		</tr>
		<tr>
			<td>登录IP</td>
			<td><?php echo ($_SERVER['REMOTE_ADDR']); ?></td>
		</tr>
		<tr>
			<td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td>
		</tr>

		<tr>
			<td>服务器环境</td>
			<td><?php echo ($_SERVER["SERVER_SOFTWARE"]); ?></td>
		</tr>
		<tr>
			<td>服务器IP</td>
			<td><?php echo ($_SERVER["SERVER_ADDR"]); ?></td>
		</tr>

</table>
</body>
</html>