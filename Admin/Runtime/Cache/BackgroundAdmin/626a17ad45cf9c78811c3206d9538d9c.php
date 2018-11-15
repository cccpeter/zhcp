<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
	<title></title>
	<script type="text/javascript">
	</script>
</head>
<body>
<form action="<?php echo U('BackgroundAdmin/Class/classaccount');?>" method="post">
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">班级账号管理</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="33%">班级</td>
			<td align="center" valign="middle" width="33%">账号</td>
			<td align="center" valign="middle" width="33%">密码</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="33%"><?php echo ($class_name); ?></td>
			<td align="center" valign="middle" width="33%">
			<input type="text" name="accout" value="<?php echo ($classgroup['classgroup_account']); ?>">
			</td>
			<td align="center" valign="middle" width="33%" color="red">
			<input type="text" name="password" value="<?php echo ($classgroup['classgroup_password']); ?>"> 
			</td>
		</tr>
		<tr>
		<td colspan="4">
		<input type="hidden" name="classgroup_id" value="<?php echo ($classgroup['classgroup_id']); ?>">
		<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>">
	<input type="submit" class="input_button" value="完成修改" style="margin-left:880px;">
	<a class="detail" href="<?php echo U('BackgroundAdmin/Class/detal',array('grade_id'=>$grade_id));?>" style="border-radius: 5px;margin-left:5px;">返回上页</a>
	</td>
	</tr>
	</table>
	</form>
</body>
</html>