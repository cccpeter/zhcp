<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>查询专业班级</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
</head>
<body>
<form name="frm" action="<?php echo U('/BackgroundAdmin/Index/queryclass');?>" method="post">
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">审核测评<?php echo ($pclass_name); ?></td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="20%">学号</td>
			<td align="center" valign="middle" width="20%">姓名</td>
			<td align="center" valign="middle" width="20%">班级是否完成审核</td>
			<td align="center" valign="middle" width="20%">是否完成评测</td>
			<td align="center" valign="middle" width="20%">操作</td>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="20%"><?php echo ($vo["user_number"]); ?></td>
				<td  align="center" valign="middle" width="20%"><?php echo ($vo["user_name"]); ?></td>
				<?php if($vo["basetwograde_state"] == 1): ?><td class="font" align="center" valign="middle" width="20%">未完成</td>
					<?php else: ?>
					<td  align="center" valign="middle" width="20%">完成</td><?php endif; ?>
				<?php if($vo["isoff"] == -1): ?><td class="font" align="center" valign="middle" width="20%">未完成</td>
					<?php else: ?>
					<td  align="center" valign="middle" width="20%">完成</td><?php endif; ?>

				<td align="center" valign="middle" width="20%">
				
				<?php if($vo["isoff"] == -1): ?><a class="detail"  href="javascript:;">该同学未自评</a>
				<?php else: ?>
					<a class="change" href="<?php echo U('/BackgroundAdmin/Index/audit',array('user_id'=>$vo['user_id']));?>">开始审核</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</form>
</body>
</html>