<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>综合测评系统</title>
	<link rel="stylesheet" href="/zhcp/Public/css/regis1.css" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
	<script type='text/javascript'>
		var checkAccount = "<?php echo U('Home/checkAccount');?>";
		var checkUname = "<?php echo U('Home/checkUname');?>";
		var checkVerify = "<?php echo U('Home/checkVerify');?>";
	</script>
  <script type="text/javascript">
    var up=0; 
    var add1=0;
    var add2=0;
    var add3=0;
    var add4=0;
    var add5=0;
    function addpictur1(){
      add1++;
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content1[]');
      input.setAttribute('id',"addtextone"+add1);
      input.setAttribute('value','加分项名称');
      // input.setAttribute('style','color:#999999');
      // input.setAttribute('onBlur','if(!value){value=defaultValue;this.style.color=#999}');
      // input.setAttribute('onFocus','if(value==defaultValue){value='111';this.style.color=#000}');
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo1[]');
      input.setAttribute('id',"addpicturone"+add1);
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      input.setAttribute('id',"uplo");
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function delpictur1(){
      var text=$("addtextone"+add1).index();
      var pictur=$("addpicturone"+add1).index();
      $("#addtextone"+add1).get(text).remove();
      $("#addpicturone"+add1).get(pictur).remove();
      add1--;
      if((add1==0)&&(add2==0)&&(add3==0)&&(add4==0)&&(add5==0)){
        $('#uplo').val('');
      }
    }
    function addpictur2(){
      add2++;
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content2[]');
      input.setAttribute('id',"addtexttwo"+add2);
      input.setAttribute('value','加分项名称');
      var pc = document.getElementById("org2");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo2[]');
      input.setAttribute('id',"addpicturtwo"+add2);
      var pc = document.getElementById("org2");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      input.setAttribute('id',"uplo");

      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function delpictur2(){
      var text=$("addtexttwo"+add2).index();
      var pictur=$("addpicturtwo"+add2).index();
      $("#addtexttwo"+add2).get(text).remove();
      $("#addpicturtwo"+add2).get(pictur).remove();
      add2--;
      if((add1==0)&&(add2==0)&&(add3==0)&&(add4==0)&&(add5==0)){
        $('#uplo').val('');
      }
    }
    function addpictur3(){
      add3++;
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content3[]');
      input.setAttribute('id',"addtextthree"+add3);
      input.setAttribute('value','加分项名称');

      var pc = document.getElementById("org3");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo3[]');
      input.setAttribute('id',"addpicturthree"+add3);

      var pc = document.getElementById("org3");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      input.setAttribute('id',"uplo");

      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function delpictur3(){
      var text=$("addtextthree"+add3).index();
      var pictur=$("addpicturthree"+add3).index();
      $("#addtextthree"+add3).get(text).remove();
      $("#addpicturthree"+add3).get(pictur).remove();
      add3--;
      if((add1==0)&&(add2==0)&&(add3==0)&&(add4==0)&&(add5==0)){
        $('#uplo').val('');
      }
    }
    function addpictur4(){
      add4++;
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content4[]');
      input.setAttribute('id',"addtextfour"+add4);
      input.setAttribute('value','加分项名称');

      var pc = document.getElementById("org4");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo4[]');
      input.setAttribute('id',"addpicturfour"+add4);

      var pc = document.getElementById("org4");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      input.setAttribute('id',"uplo");

      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function delpictur4(){
      var text=$("addtextfour"+add4).index();
      var pictur=$("addpicturfour"+add4).index();
      $("#addtextfour"+add4).get(text).remove();
      $("#addpicturfour"+add4).get(pictur).remove();
      add4--;
      if((add1==0)&&(add2==0)&&(add3==0)&&(add4==0)&&(add5==0)){
        $('#uplo').val('');
      }
    }
    function addpictur5(){
      add5++;
      var input = document.createElement('input');
      input.setAttribute('type', 'text');
      input.setAttribute('name', 'content5[]');
      input.setAttribute('id',"addtextfive"+add5);
      input.setAttribute('value','加分项名称');

      var pc = document.getElementById("org5");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('name', 'photo5[]');
      input.setAttribute('id',"addpicturfive"+add5);

      var pc = document.getElementById("org5");
      pc.insertBefore(input,null);
      var input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'up');
      input.setAttribute('value',"1");
      input.setAttribute('id',"uplo");
      
      var pc = document.getElementById("org1");
      pc.insertBefore(input,null);
    }
    function delpictur5(){
      var text=$("addtextfive"+add5).index();
      var pictur=$("addpicturfive"+add5).index();
      $("#addtextfive"+add5).get(text).remove();
      $("#addpicturfive"+add5).get(pictur).remove();
      add5--;
      if((add1==0)&&(add2==0)&&(add3==0)&&(add4==0)&&(add5==0)){
        $('#uplo').val('');
      }
    }
</script>
	<script type="text/javascript" src="/zhcp/Public/js/register.js"></script>
</head>
<body>

	<div id='logo'>
<p style="margin-left:79%;">欢迎你：<?php echo ($user_name); ?></p>
<a href="<?php echo U('Home/Index/index');?>" style="margin-left:49%;">综测填写</a>
<a href="<?php echo U('Home/Query/query');?>" style="margin-left:5%;">综测查看</a>
<a href="<?php echo U('Home/Index/changepw');?>" style="margin-left:5%;">密码修改</a>
<a href="<?php echo U('Home/Login/loginout');?>" style="margin-left:5%;">退出系统</a>
</div>
  
	<div id='reg-wrap'>
		<form action="<?php echo U('Home/Index/index');?>" method='post' name='register' enctype="multipart/form-data">
			<fieldset>
				<legend>综合测评填写<h3>填写的参考点请参考新版学生手册P16-P30</h3></legend>
        <input type="hidden" name="up" value="0">
		<table class="table" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="tr">
    <td width="6%" rowspan="<?php echo ($num); ?>" align="center" valign="middle">基础性素质测评(满分60，每一空满分2，最低为0)</td>
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
    <td class="td" rowspan="3" align="center" valign="middle">思想道德修养(满分18)</td>
    <td class="td" align="center" valign="middle">政治素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input  type="number" max="2" min="0" step="0.01" class="textgrade" name="1a"  required="required"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="1b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="1c"  required="required" ></td>
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">思想素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" step="0.01" min="0" class="textgrade" name="2a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" step="0.01" min="0" class="textgrade" name="2b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" step="0.01" min="0" class="textgrade" name="2c"  required="required" ></td>
    <!--1-->
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">道德素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="3a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="3b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="3c"  required="required" ></td>
    <!--1-->
  </tr>

  <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">组织法纪素养(满分12)</td>
    <td class="td" align="center" valign="middle">组织素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="4a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="4b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="4c"  required="required" ></td>
    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" align="center" valign="middle">法纪素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="5a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="5b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="5c"  required="required" ></td>
    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">学习发展素养(满分12)</td>
    <td class="td" align="center" valign="middle">学习与生活素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="6a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="6b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" type="number" max="2" min="0" class="textgrade" name="6c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
     <tr class="tr">
    <td class="td" align="center" valign="middle">实践与创新素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="7a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="7b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="7c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="1" align="center" valign="middle">科学文化素养(满分6)</td>
    <td class="td" align="center" valign="middle">科学文化素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="8a"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="8b"  required="required"  style="height:54px;"></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="8c"  required="required"  style="height:54px;"></td>
    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">身心健康素养(满分12)</td>
    <td class="td" align="center" valign="middle">身心素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="9a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="9b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="9c"  required="required" ></td>
    <!--1-->
  </tr>
       <tr class="tr">
    <td class="td" align="center" valign="middle">心理素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="10a"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="10b"  required="required" ></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="number" max="2" min="0" step="0.01" class="textgrade" name="10c"  required="required" ></td>
    <!--1-->
  </tr>
  <!--发展指标-->
  <tr>
    <td colspan="7" align="center" valign="middle">&nbsp;</td>
  </tr>
   <tr>
    <td rowspan="<?php echo ($dnum); ?>" align="center" valign="middle">发展性素质测评(满分40)</td>
    <td align="center" valign="middle">一级指标</td>
    <td colspan="4" align="center" valign="middle">参考点及其评分<h3>（上传佐证图片大小尽量不要超过8MB）</h3></td>
    <td align="center" valign="middle">自评分（若无加分项则留空不用填0）</td>
  </tr>
  <?php if(is_array($deve)): foreach($deve as $key=>$vo): ?><tr>
    <td align="center" valign="middle"><?php echo ($vo["deveonelevelindex_content"]); ?></td>
    <td colspan="4" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
   <!--  <textarea name="d<?php echo ($vo["deveonelevelindex_id"]); ?>" cols="40" rows="3" style="border:none;overflow:hidden;height:100%;width:100%;"></textarea> -->
   <ul>
    <li>
    <img src="/zhcp/Public/images/0.png" style="width:30px;height:30px;cursor: pointer;" onClick="addpictur<?php echo ($vo["deveonelevelindex_id"]); ?>()">
    <img src="/zhcp/Public/images/1.jpg" style="width:30px;height:30px;cursor: pointer;" onClick="delpictur<?php echo ($vo["deveonelevelindex_id"]); ?>()">
    <li>
      <div id="org<?php echo ($vo["deveonelevelindex_id"]); ?>"></div>
    </li>
  </ul>
    </td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="g<?php echo ($vo["deveonelevelindex_id"]); ?>" style="height:57px;"></td>
  </tr><?php endforeach; endif; ?>
</table>
<center>
<script type="text/javascript">
var url="<?php echo U('Home/Index/verify');?>"+"?";
</script>
        <img id="code" src="<?php echo U('Home/Index/verify');?>" onclick="this.src=url+Math.random()"><h3>看不清可点击验证码刷新！</h3>
       <h3>请输入验证码：</h3> <input type="text" name="code"/>
     </center> 
     <?php if($issub == 0): ?><input class="input_button" type="submit" value="提交测评" id="regis" style="margin-left: 500px;">
      <?php else: ?>
        <input class="input_nobutton" type="submit" value="修改测评" id="regis1" style="margin-left: 500px;"><?php endif; ?>
        <input type="hidden" name="issub" value="<?php echo ($issub); ?>">
        <input type="hidden" name="token" value="<?php echo ($token); ?>">
			</fieldset>
		</form>
	</div>
</body>
</html>