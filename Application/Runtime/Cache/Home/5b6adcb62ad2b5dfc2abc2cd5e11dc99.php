<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>综合测评系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href='/zhcp/Public/css/style.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">var url="<?php echo U('Home/Login/index');?>";</script>
	<script type="text/javascript">var indexurl="/zhcp/index.php/home/Index/index";</script>
	<script type="text/javascript">
		function login(){
	if($('#account').val() == ""){
    $('#msg').html("请输入账号");
    $('#account').focus;
    return ;
  }
  if($('#password').val() == ""){
    $('#msg').html("请输入密码");
    $('#password').focus;
    return ;
  }
  $.post(url,{account:$('#account').val(),password:$('#password').val()},
  function(data){
    //$('#msg').html("");
     // var jsa = eval(data); //数组
    	if(data==-1){
    		alert("账号密码输入错误");
    	}else{
    		location.href=indexurl;
    	}
  },
  "text");
		}
	</script>
</head>
<body>
<!--header start here-->
	<div class="login">
		 <div class="login-main">
		 		<div class="login-top">
		 			<img src="/zhcp/Public/images/head-img.png" alt=""/>
		 			<h1>欢迎 <span class="anc-color">登录综合测评系统</span> </h1>
		 			<input type="text"  id='account' required="">
		 			<input type="password" id='password' required="">
		 			<div class="login-bottom">
						<div class="clear"> </div>
		 			</div>
		 			<input type="submit" value='马上登录' id='login' onClick="login();" />
		 		</div>
		 	</div>
  </div>
  <div class="copyright">
		 <p>©南苑计协开发部</p>
	</div>
<!--header end here-->
</body>
</html>