<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>综合测评系统</title>
	<link rel="stylesheet" href="/evaluation_system/Public/css/regis1.css" />
	<link rel="stylesheet" href="/evaluation_system/Public/css/public.css" />
	<script type="text/javascript" src="/evaluation_system/Public/js/jquery-1.7.2.min.js"></script>
	<script type='text/javascript'>
		var checkAccount = "<?php echo U('checkAccount');?>";
		var checkUname = "<?php echo U('checkUname');?>";
		var checkVerify = "<?php echo U('checkVerify');?>";
	</script>
  <script type="text/javascript">
    function addpictur1(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content1[]');
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo1[]');
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function addpictur2(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content2[]');
      var pc = document.getElementById("org2");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo2[]');
      var pc = document.getElementById("org2");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function addpictur3(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content3[]');
      var pc = document.getElementById("org3");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo3[]');
      var pc = document.getElementById("org3");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function addpictur4(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content4[]');
      var pc = document.getElementById("org4");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo4[]');
      var pc = document.getElementById("org4");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function addpictur5(){
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content5[]');
      var pc = document.getElementById("org5");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo5[]');
      var pc = document.getElementById("org5");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
</script>
	<script type="text/javascript" src="/evaluation_system/Public/js/register.js"></script>
</head>
<body>

	<div id='logo'>
<p style="margin-left:79%;">欢迎你：<?php echo ($user_name); ?></p>
<a href="<?php echo U('Index/index');?>" style="margin-left:49%;">综测填写</a>
<a href="<?php echo U('Query/query');?>" style="margin-left:5%;">综测查看</a>
<a href="javascript:;" style="margin-left:5%;">密码修改</a>
<a href="javascript:;" style="margin-left:5%;">退出系统</a>
</div>
  
	<div id='reg-wrap'>
		<form action="<?php echo U('Index/index');?>" method='post' name='register' enctype="multipart/form-data">
			<fieldset>
				<legend>综合测评查看</legend>
        <input type="hidden" name="up" value="0">
		<table class="table" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="tr">
    <td width="6%" rowspan="<?php echo ($num); ?>" align="center" valign="middle">基础性素质测评</td>
    <td width="14%" rowspan="2" align="center" valign="middle">一级指标</td>
    <td width="14%" rowspan="2" align="center" valign="middle">二级指标</td>
    <td colspan="3" align="center" valign="middle">参照点及其评分</td>
    <td rowspan="<?php echo ($num); ?>" align="center" valign="middle"></td>
  </tr>
  <tr class="tr" >
    <td class="td" align="center" valign="middle">A点</td>
    <td class="td" align="center" valign="middle">B点</td>
    <td class="td" align="center" valign="middle">C点</td>
  </tr>
  <tr class="tr">
    <td class="td" rowspan="3" align="center" valign="middle">思想道德修养</td>
    <td class="td" align="center" valign="middle">政治素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input  type="text" class="textgrade" name="1a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="1b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="1c"  required="required" ></td>
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">思想素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="2a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="2b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="2c"  required="required" ></td>
    <!--1-->
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">道德素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="3a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="3b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="3c"  required="required" ></td>
    <!--1-->
  </tr>

  <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">组织法纪素养</td>
    <td class="td" align="center" valign="middle">组织素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="4a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="4b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="4c"  required="required" ></td>
    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" align="center" valign="middle">法纪素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="5a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="5b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="5c"  required="required" ></td>
    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">学习发展素养</td>
    <td class="td" align="center" valign="middle">学习与生活素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="6a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="6b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="6c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
     <tr class="tr">
    <td class="td" align="center" valign="middle">实践与创新素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="7a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="7b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="7c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="1" align="center" valign="middle">科学文化素养</td>
    <td class="td" align="center" valign="middle">科学文化素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="8a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="8b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="8c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">身心健康素养</td>
    <td class="td" align="center" valign="middle">身心素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="9a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="9b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="9c"  required="required" ></td>
    <!--1-->
  </tr>
       <tr class="tr">
    <td class="td" align="center" valign="middle">心理素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="10a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="10b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="10c"  required="required" ></td>
    <!--1-->
  </tr>
  <!--发展指标-->
  <tr>
    <td colspan="7" align="center" valign="middle">&nbsp;</td>
  </tr>
   <tr>
    <td rowspan="<?php echo ($dnum); ?>" align="center" valign="middle">发展性素质测评</td>
    <td align="center" valign="middle">一级指标</td>
    <td colspan="4" align="center" valign="middle">参考点及其评分</td>
    <td align="center" valign="middle">自评分</td>
  </tr>
  <?php if(is_array($deve)): foreach($deve as $key=>$vo): ?><tr>
    <td align="center" valign="middle"><?php echo ($vo["deveonelevelindex_content"]); ?></td>
    <td colspan="4" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
   <!--  <textarea name="d<?php echo ($vo["deveonelevelindex_id"]); ?>" cols="40" rows="3" style="border:none;overflow:hidden;height:100%;width:100%;"></textarea> -->
   <ul>
    <li>
    <img src="/evaluation_system/Public/images/0.png" style="width:30px;height:30px;cursor: pointer;" onClick="addpictur<?php echo ($vo["deveonelevelindex_id"]); ?>()">
    <li>
      <div id="org<?php echo ($vo["deveonelevelindex_id"]); ?>"></div>
    </li>
  </ul>
    </td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="g<?php echo ($vo["deveonelevelindex_id"]); ?>" style="height:57px;"></td>
  </tr><?php endforeach; endif; ?>
</table>
        <input class="input_button" type="submit" value="修改评测" id="regis" style="margin-left: 500px;">
			</fieldset>
		</form>
	</div>
</body>
</html>