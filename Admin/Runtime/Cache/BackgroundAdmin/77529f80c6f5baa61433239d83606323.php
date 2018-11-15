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
<form action="<?php echo U('BackgroundAdmin/Admin/changeinstructor');?>" method="post">
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">辅导员信息修改</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%">年级</td>
			<td align="center" valign="middle" width="25%">姓名</td>
			<td align="center" valign="middle" width="25%">账号</td>
			<td align="center" valign="middle" width="25%">密码</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%">
				<select id="grade"  style="width:155px">
					<?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["grade_id"]); ?>"><?php echo ($vo["grade_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="name" value="<?php echo ($instructor['instructor_name']); ?>">
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="account" value="<?php echo ($instructor['instructor_account']); ?>">
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="password" value="<?php echo ($instructor['instructor_password']); ?>">
			</td>
		</tr>
		<tr>
		<td colspan="4">
		<input type="hidden" name="instructor_id" value="<?php echo ($instructor['instructor_id']); ?>">
			<input type="submit" class="input_button" value="完成修改" style="margin-left:880px;">
			<a class="detail" href="<?php echo U('/BackgroundAdmin/Admin/instructor',array('instructor_id'=>$instructor_id));?>" style="border-radius: 5px;margin-left:5px;">返回上页</a>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>