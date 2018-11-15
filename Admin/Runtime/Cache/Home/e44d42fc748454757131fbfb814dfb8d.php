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
<form action="<?php echo U('Home/Class/changestu');?>" method="post">
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">学生信息修改</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%">学号</td>
			<td align="center" valign="middle" width="25%">姓名</td>
			<td align="center" valign="middle" width="25%">班级</td>
			<td align="center" valign="middle" width="25%">年级</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="25%"><?php echo ($student['user_number']); ?></td>
			<td align="center" valign="middle" width="25%"><input type="text" name="username" value="<?php echo ($student['user_name']); ?>">
			</td>
			<td align="center" valign="middle" width="25%" color="red">
			<span id="demo">
					<select name="demo" id="pclass_id"  style="width:155px" size=1>
						<?php if(is_array($classall)): foreach($classall as $key=>$vo): ?><option value="<?php echo ($vo["pclass_id"]); ?>"><?php echo ($vo["pclass_name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</span>
			</td>
			<td align="center" valign="middle" width="25%"><?php echo ($student['grade_name']); ?></td>
		</tr>
		<tr>
		<td colspan="4">
		<input type="hidden" name="user_id" value="<?php echo ($student['user_id']); ?>">
	<input type="submit" class="input_button" value="完成修改" style="margin-left:880px;">
	<a class="detail" href="<?php echo U('/Home/Class/student',array('class_id'=>$classid));?>" style="border-radius: 5px;margin-left:5px;">返回上页</a>
	</td>
	</tr>
	</table>
	</form>
</body>
</html>