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
	<form method='post' action="" >
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">密码重置</td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="33%">学号</td>
			<td align="center" valign="middle" width="33%">姓名</td>
			<td align="center" valign="middle" width="33%">重置</td>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["user_number"]); ?></td>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["user_name"]); ?>
				</td>
				<td align="center" valign="middle" width="20%">
				<a class="detail"  href="<?php echo U('BackgroundAdmin/Class/repassword',array('user_id'=>$vo['user_id']));?>">密码重置</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr>
		<td colspan="3">
		<a class="detail1" href="<?php echo U('/BackgroundAdmin/Class/repassword',array('classid'=>$classid,'user_id'=>'all'));?>" style="border-radius: 50px;margin-left:840px;">全部重置</a>
	<a class="detail1" href="<?php echo U('/BackgroundAdmin/Class/detal',array('grade_id'=>$grade_id));?>" style="border-radius: 50px;margin-left:5px;">返回上页</a>
	</td>
	</tr>
	</table>
</form>
</body>
</html>