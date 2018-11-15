<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
	<title></title>
	<script type="text/javascript">
	var changeurl="<?php echo U('BackgroundAdmin/Admin/index');?>";
	</script>
	<script type="text/javascript">
	function check(){
		 var new1=document.getElementById("newpassword1").value;
		 var new2=document.getElementById("newpassword2").value;
		 var sub=document.getElementById("change");
		 if(new1!=new2){
		 	var message="";
		 	message="两次密码输入不一致";
		 	document.getElementById("checkpw").innerHTML=message;
		 	sub.disabled=true;
		 }else{
		 	var message="";
		 	document.getElementById("checkpw").innerHTML=message;
		 	sub.disabled=false;
		 }
	}
	function revise(){
		 var new1=document.getElementById("newpassword1").value;
		 var new2=document.getElementById("newpassword2").value;
		 var old=document.getElementById("oldpassword").value;
		 
		 if(new1!=""&&new2!=""&&old!=""){
		 	$.post(changeurl,{oldpassword:old,newpassword:new1},
  			function(data){
  				if(data==1){
  					alert('修改成功');
  				}else if(data==-1){
  					alert('原密码有误，请重新输入');
  				}else{
  					alert('修改失败:密码无改动');
  				}
  			},
  			"text");
		 }else{
		 	alert("请将修改信息填写完毕");
		 }
	}
	</script>
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td class="th" colspan="2">修改密码</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><?php echo ($_SESSION['admin_name']); ?></td>
			</tr>
			<tr>
				<td>原密码：</td>
				<td><input type="password" id="oldpassword"/></td>
			</tr>
			<tr>
				<td>新密码：</td>
				<td><input type="password" id="newpassword1"/></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="password" id="newpassword2" onBlur="check();"/>
				<p id="checkpw"></p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="button" value="修改" class="input_button" id="change" onClick="revise();"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>