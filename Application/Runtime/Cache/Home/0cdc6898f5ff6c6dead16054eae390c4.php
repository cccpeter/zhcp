<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>综合测评系统</title>
	<link rel="stylesheet" href="/zhcp/Public/css/regis1.css" />
	<link rel="stylesheet" href="/zhcp/Public/css/public.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>

 <link rel="stylesheet" type="text/css" href="/zhcp/Public/css/style-projects-jquery.css" />    
    
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="/zhcp/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/zhcp/Public/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="/zhcp/Public/css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
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
				<legend>综合测评查看<h3>当前为同学们自评阶段，审核分全部为0</h3></legend>
        <input type="hidden" name="up" value="0">
    <div id="gallery">
		<table class="table" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="tr">
    <td width="6%" rowspan="<?php echo ($num); ?>" align="center" valign="middle">基础性素质测评</td>
    <td width="14%" rowspan="2" align="center" valign="middle">一级指标</td>
    <td width="14%" rowspan="2" align="center" valign="middle">二级指标</td>
    <td width="50%" colspan="3" align="center" valign="middle">参照点及其评分</td>
    <td width="15%" rowspan="2" align="center" valign="middle">审核分</td>
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
    <?php echo ($base1[0]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[0]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[0]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[0]['basetwograde_auditscore']); ?></td>
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">思想素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[1]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[1]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[1]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[1]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">道德素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[2]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[2]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[2]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[2]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>

  <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">组织法纪素养</td>
    <td class="td" align="center" valign="middle">组织素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[3]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[3]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[3]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[3]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" align="center" valign="middle">法纪素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[4]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
     <?php echo ($base1[4]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
     <?php echo ($base1[4]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[4]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">学习发展素养</td>
    <td class="td" align="center" valign="middle">学习与生活素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
     <?php echo ($base1[5]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[5]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[5]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[5]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
     <tr class="tr">
    <td class="td" align="center" valign="middle">实践与创新素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[6]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[6]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[6]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[6]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
    <tr class="tr">
    <td class="td" rowspan="1" align="center" valign="middle">科学文化素养</td>
    <td class="td" align="center" valign="middle">科学文化素质</td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[7]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[7]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[7]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[7]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
   <tr class="tr">
    <td class="td" rowspan="2" align="center" valign="middle">身心健康素养</td>
    <td class="td" align="center" valign="middle">身心素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[8]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[8]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[8]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[8]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
       <tr class="tr">
    <td class="td" align="center" valign="middle">心理素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[9]['basetwograde_selfscorea']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[9]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[9]['basetwograde_selfscorec']); ?></td>
    <td class="td" align="center" valign="middle"><?php echo ($base1[9]['basetwograde_auditscore']); ?></td>

    <!--1-->
  </tr>
  <!--发展指标-->
  <tr>
    <td colspan="7" align="center" valign="middle">&nbsp;</td>
  </tr>
   <tr>
    <td rowspan="<?php echo ($dnum); ?>" align="center" valign="middle">发展性素质测评</td>
    <td align="center" valign="middle">一级指标</td>
    <td colspan="3" align="center" valign="middle">参考点参考点及其评分<h3></h3></td>
    <td align="center" valign="middle">自评分</td>
    <td align="center" valign="middle">审核分</td>
  </tr>
  <?php if(is_array($deve)): foreach($deve as $key=>$vo): ?><tr>
    <td align="center" valign="middle"><?php echo ($vo["deveonelevelindex_content"]); ?></td>
    <td colspan="3" align="left" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php if(is_array($py)): foreach($py as $key=>$dv): if(($dv["deveid"]) == $vo["deveonelevelindex_id"]): ?>参考点：<?php echo ($dv["reason"]); ?></br>图片：
      <a href="/zhcp/Public/Uploads/<?php echo ($dv["url"]); ?>">
      <img src="/zhcp/Public/Uploads/<?php echo ($dv["url"]); ?>" width="62" height="62" alt="" />
      </a></br><?php endif; endforeach; endif; ?>
    </td>
<td class="td" width="100px" height="41px" align="center" valign="middle">
    <?php if(is_array($deve1)): foreach($deve1 as $key=>$dev): if(($dev["deveonelevelindex_id"]) == $vo["deveonelevelindex_id"]): echo ($dev["deveonelevelgrade_selfscore"]); ?>
        <!-- <td align="center" valign="middle"><?php echo ($dev["deveonelevelgrade_auditscore"]); ?></td --><?php endif; endforeach; endif; ?>
  </td>
  <td class="td" width="100px" height="41px" align="center" valign="middle">
    <?php if(is_array($deve1)): foreach($deve1 as $key=>$dev): if(($dev["deveonelevelindex_id"]) == $vo["deveonelevelindex_id"]): echo ($dev["deveonelevelgrade_auditscore"]); endif; endforeach; endif; ?>
  </td>
  </tr><?php endforeach; endif; ?>
</table>
</div>
			</fieldset>
		</form>
	</div>
</body>
</html>