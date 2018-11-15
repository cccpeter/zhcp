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
	<form method='post' action="<?php echo U('Home/Class/out');?>">
	<table class="table">
		<tr>
			<td class="th" colspan="10">导出学生的测评结果</td>
		</tr>
		<tr>
			<td align="left" valign="middle">
			选择要导出的班级：
				<input type="hidden" name="txt" style="width:150px" onkeyup="SelectTip(0)" placeholder="选择班级" /> 
				<span id="demo">
						<?php if(is_array($pclassname)): foreach($pclassname as $key=>$vo): ?><p><input name="demo[]" type="checkbox" value="<?php echo ($vo["pclass_id"]); ?>" /><?php echo ($vo["pclass_name"]); ?></p><?php endforeach; endif; ?>
				</span>
				<input class="input_button" type='submit' value='开始导出'/>
			</td>
		</tr>
	</table>
</form>
</body>
</html>