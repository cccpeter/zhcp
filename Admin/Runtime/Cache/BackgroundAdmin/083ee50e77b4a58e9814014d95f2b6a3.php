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
	<form method='post' action="<?php echo U('BackgroundAdmin/Class/detal');?>">
	<table class="table">
		<tr>
			<td class="th" colspan="10">新建班级</td>
		</tr>
		<tr>
			<td align="left" valign="middle">
			请输入你添加班级的名称
			<input type="text" name="classname" required="" />
			<input type="hidden" name="grade_id" value="<?php echo ($grade_id); ?>"/>
			<input class="input_button" type='submit' value='添加'/>
			</td>
		</tr>
	</table>
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">班级管理</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="33%">班级名字</td>
			<td align="center" valign="middle" width="33%">学生人数</td>
			<td align="center" valign="middle" width="33%">操作</td>
		</tr>
		<?php if(is_array($pclassname)): foreach($pclassname as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="33%"><?php echo ($vo["pclass_name"]); ?></td>
				<td align="center" valign="middle" width="33%"><?php echo ($vo["nums"]); ?>
				</td>
				<td align="center" valign="middle" width="33%">
				<a class="detail"  href="<?php echo U('BackgroundAdmin/Class/repw',array('class_id'=>$vo['pclass_id']));?>">密码重置</a>
				<a class="change"  href="<?php echo U('BackgroundAdmin/Class/student',array('class_id'=>$vo['pclass_id']));?>">学生管理</a>
				<br><br> 
				<a class="delete" href="<?php echo U('BackgroundAdmin/Class/classaccount',array('class_id'=>$vo['pclass_id']));?>">班级账号管理</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</form>
</body>
</html>