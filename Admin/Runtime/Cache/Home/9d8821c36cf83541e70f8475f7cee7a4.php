<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>查询专业班级</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
</head>
<body onload="Init()">
<form name="frm" action="<?php echo U('/Home/Index/queryclass');?>" method="post">
	<table class="table">
		<tr>
			<td class="th" colspan="10">选择审核的专业班级</td>
		</tr>
		<tr>
			<td align="left" valign="middle">
			选择审核的专业班级：
				<input type="hidden" name="txt" style="width:150px" onkeyup="SelectTip(0)" placeholder="选择审核的专业班级" /> 
				<span id="demo">
					<select name="demo" id="pclass_id"  style="width:155px" size=1 onchange="txt.value=options[selectedIndex].text;">
						<?php if(is_array($pclass)): foreach($pclass as $key=>$vo): ?><option value="<?php echo ($vo["pclass_id"]); ?>"><?php echo ($vo["pclass_name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</span>
				<input type="submit" value="点击查询" class="input_button"/>
			</td>
		</tr>
	</table>
	<table class="table" width="100%">
		<tr>
			<td class="th" colspan="10">审核测评<?php echo ($pclass_name); ?></td>
		</tr>
		<tr>
			<td align="center" valign="middle" width="16%">学号</td>
			<td align="center" valign="middle" width="16%">姓名</td>
			<td align="center" valign="middle" width="16%">辅导员是否完成审核</td>
			<td align="center" valign="middle" width="16%">班级是否完成审核</td>
			<td align="center" valign="middle" width="16%">是否完成评测</td>
			<td align="center" valign="middle" width="17%">操作</td>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
				<td align="center" valign="middle" width="16%"><?php echo ($vo["user_number"]); ?></td>
				<td  align="center" valign="middle" width="16%"><?php echo ($vo["user_name"]); ?></td>
				<?php if($vo["basetwograde_state"] == 3): ?><td align="center" valign="middle" width="16%">完成</td>
					<?php else: ?>
					<td  class="font" align="center" valign="middle" width="16%">未完成</td><?php endif; ?>
				<?php if($vo["basetwograde_state"] != 1): ?><td align="center" valign="middle" width="16%">完成</td>
					<?php else: ?>
					<td  class="font" align="center" valign="middle" width="16%">未完成</td><?php endif; ?>
				<?php if($vo["isoff"] == -1): ?><td class="font" align="center" valign="middle" width="16%">未完成</td>
					<?php else: ?>
					<td  align="center" valign="middle" width="16%">完成</td><?php endif; ?>

				<td align="center" valign="middle" width="17%">
					<a class="detail" href="<?php echo U('Home/Index/audit',array('user_id'=>$vo['user_id']));?>">开始审核</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</form>
<script language="javascript">
	var TempArr=[];//存贮option
		function Init(){
			var SelectObj=document.frm.elements["demo"]
			/*先将数据存入数组*/
			with(SelectObj)
			for(i=0;i<length;i++)TempArr[i]=[options[i].text,options[i].value]
	}

	function SelectTip(flag){
		var TxtObj=document.frm.elements["txt"]
		var SelectObj=document.getElementById("demo")
		var Arr=[]
		with(SelectObj){
			var SelectHTML=innerHTML.match(/<[^>]*>/)[0]
			for(i=0;i<TempArr.length;i++)
				if(TempArr[i][0].indexOf(TxtObj.value)==0||flag)//若找到以txt的内容开头的，添option。若flag为true,对下拉框初始化
			Arr[Arr.length]="<option value='"+TempArr[i][1]+"'>"+TempArr[i][0]+"</option>"
			innerHTML=SelectHTML+Arr.join()+"</SELECT>"
		}
	}
</script>
</body>
</html>