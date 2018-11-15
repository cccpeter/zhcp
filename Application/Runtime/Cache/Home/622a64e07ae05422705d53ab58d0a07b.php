<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>综合测评系统</title>
	<link rel="stylesheet" href="/evaluation_system/Public/css/regis1.css" />
  <link rel="stylesheet" href="/evaluation_system/Public/css/public.css" />
	<link rel="stylesheet" href="/evaluation_system/Public/css/new.css" />
	<script type="text/javascript" src="/evaluation_system/Public/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
   function addpictur(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content[]');
      var pc = document.getElementById("org");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo[]');
      var pc = document.getElementById("org");
      pc.insertBefore(input,null);
      
    }
</script>
	<script type="text/javascript" src="/evaluation_system/Public/js/register.js"></script>
</head>
<body>
<form action="U(Index:index)">
<!-- 	<div id='logo'></div>
	<div id='reg-wrap'>
		<form action="<?php echo U('Index/text');?>" method='post' name='register' enctype="multipart/form-data">
			<fieldset>
				<legend>综合测评填写</legend>
          <div class="well well-sm">
  <input type="button" value="点击此处选择上传图片" name="" class="input" onClick="addpictur();">
  <ul>
    <li>
      <div id="org"></div>
      <div id="or"></div>
    </li>
  </ul>
     <a href="javascript:;" class="a-upload">请选择上传文件1
    <input type="file" name="" id="">
</a>

<a href="javascript:;" class="file">请选择上传文件
    <input type="file" name="rwwd" id="">
</a>
        <input class="input_button" type="submit" value="提交" id="regis" style="margin-left: 500px;">
			</fieldset>
		</form>
	</div> -->
  <div id="header">我是头部（上）</div> 
<div id="centers"> 
<div class="c_left">我是中的左</div> 
<div class="c_right"  align="left">
  <ul>
    <li><input type="text" name="ty" ><input type="file" name="" id="">
    <img src="/evaluation_system/Public/images/0.png" style="width:40px;height:40px;cursor: pointer;" onClick="addpictur()">
    </li>
    <li><input type="text" name="ty"><input type="file" name="" id="">
    </li>
    <li>
      <div id="org"></div>
    </li>
    <input type="submit">
  </ul>
</div> 
<div class="clear">&nbsp;</div> 
</div> 
<div id="footer">我是底部（下）</div> 
</form>
</body>
</html>