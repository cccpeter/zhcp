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
	<form method='post' action="<?php echo U('BackgroundAdmin/Admin/instructor');?>">
	<table class="table">
		<tr>
			<td class="th" colspan="10">新增辅导员</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%">辅导员年级</td>
			<td align="center" valign="middle" width="25%">辅导员姓名</td>
			<td align="center" valign="middle" width="25%">辅导员账号</td>
			<td align="center" valign="middle" width="25%">辅导员密码</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%">
				<select name="grade_id"  style="width:155px">
					<?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["grade_id"]); ?>"><?php echo ($vo["grade_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="name">
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="accoount">
			</td>
			<td align="center" valign="middle" width="25%">
				<input type="text" name="password">
			</td>
		</tr>
		<tr>
			<td valign="middle" colspan="4">
				<input style="margin-left: 73em;" class="input_button" type='submit' value='添加'/>
			</td>
		</tr>
	</table>
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">班级管理</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="20%">辅导员年级</td>
			<td align="center" valign="middle" width="20%">辅导员姓名</td>
			<td align="center" valign="middle" width="20%">辅导员账号</td>
			<td align="center" valign="middle" width="20%">辅导员密码</td>
			<td align="center" valign="middle" width="20%">操作</td>
		</tr>
		<?php if(is_array($instructor)): foreach($instructor as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["grade_name"]); ?></td>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["instructor_name"]); ?>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["instructor_account"]); ?>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["instructor_password"]); ?>
				</td>
				<td align="center" valign="middle" width="20%">
				<a class="detail"  href="<?php echo U('BackgroundAdmin/Admin/changeinstructor',array('instructor_id'=>$vo['instructor_id']));?>">修改信息</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</form>
</body>
</html>