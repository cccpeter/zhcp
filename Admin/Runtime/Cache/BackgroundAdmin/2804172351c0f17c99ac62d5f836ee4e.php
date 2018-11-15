<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
	<title></title>
	<script type="text/javascript">
	function addgrade(){
		 var addgradename=$('#addgradename').val();
		 var url="<?php echo U('BackgroundAdmin/Admin/grade');?>";
		 if(addgradename!=""){
		 	$.post(url,{addgradename:addgradename},
  			function(data){
  				if(data==1){
  					alert('添加成功，请刷新页面查看');
  				}else if(data==-1){
  					alert('添加失败，请检查你的网络连接设置！');
  				}
  			},
  			"text");
		 }else{
		 	alert("请填写你要增加的学年");
		 }
	}
	function delgrade(){
		 var delgradename=$('#delgradename').val();
		 // alert(change_name);
		 var url="<?php echo U('BackgroundAdmin/Admin/delgrade');?>";
		 if(delgradename!=""){
		 	$.post(url,{delgradename:delgradename},
  			function(data){
  				if(data==1){
  					alert('删除当前学年成功，请刷新页面查看');
  				}else{
  					alert('删除失败，请检查你的网络连接设置！');
  				}
  			},
  			"text");
		 }else{
		 	alert("请选择删除的学年");
		 }
	}
	</script>
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td class="th" colspan="2">年级管理</td>
			</tr>
			<tr>
				<td>当前所有年级</td>
				<td>
					<?php if(is_array($grade)): foreach($grade as $key=>$vo): echo ($vo["grade_name"]); ?>级&nbsp;&nbsp;<?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<td>添加年级</td>
				<td>
					<input type="text" id="addgradename"/>
					<input class="input_button" type="button" value="添加" onclick="addgrade();">
				</td>
			</tr>
			<tr>
				<td>删除年级</td>
				<td>
					<select id="delgradename"  style="width:155px">
					<?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["grade_id"]); ?>"><?php echo ($vo["grade_name"]); ?></option><?php endforeach; endif; ?>
					</select>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="input_button" type="button" value="删除" onclick="delgrade();">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>