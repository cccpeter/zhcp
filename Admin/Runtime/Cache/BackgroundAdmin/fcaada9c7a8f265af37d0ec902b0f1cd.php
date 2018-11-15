<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>查询年级</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
</head>
<body onload="Init()">
<form name="frm" action="<?php echo U('/BackgroundAdmin/Index/querygrade');?>" method="post">
	<table class="table">
		<tr>
			<td class="th" colspan="10">选择管理的年级</td>
		</tr>
		<tr>
			<td align="left" valign="middle">
			选择管理的年级：
				<input type="hidden" name="txt" style="width:150px" onkeyup="SelectTip(0)" placeholder="选择管理的年级" /> 
				<span id="demo">
					<select name="demo" id="grade_id"  style="width:155px" size=1 onchange="txt.value=options[selectedIndex].text;">
						<?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["grade_id"]); ?>"><?php echo ($vo["grade_name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</span>
				<input type="submit" value="点击查询" class="input_button"/>
			</td>
		</tr>
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