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
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10"><?php echo ($classname); ?>班级学生管理</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="33%">学号</td>
			<td align="center" valign="middle" width="33%">姓名</td>
			<td align="center" valign="middle" width="33%">操作</td>
		</tr>
		<?php if(is_array($student)): foreach($student as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="33%"><?php echo ($vo["user_number"]); ?></td>
				<td align="center" valign="middle" width="33%"><?php echo ($vo["user_name"]); ?>
				</td>
				<td align="center" valign="middle" width="33%">
				<a class="detail"  href="<?php echo U('Home/Class/stuchange',array('user_id'=>$vo['user_id']));?>">信息修改</a>
				<a class="delete"  href="<?php echo U('Home/Class/studel',array('user_id'=>$vo['user_id']));?>">信息删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr>
		<td colspan="3">
	<a class="detail1" href="<?php echo U('/Home/Class/detal');?>" style="border-radius: 50px;margin-left:890px;">返回上页</a>
	</td>
	</tr>
	</table>
</body>
</html>