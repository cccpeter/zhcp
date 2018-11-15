<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title></title>
  <link rel="stylesheet" href="/zhcp/Public/css/public.css" />
  <script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="/zhcp/Public/js/public.js"></script>

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
</head>
<body>
<form action="<?php echo U('/Home/Index/auditscore');?>" method="post">
<div id="gallery">

 <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="table">
  <tr class="tr">
    <td width="6%" rowspan="<?php echo ($num); ?>" align="center" valign="middle">基础性素质测评</td>
    <td width="14%" rowspan="2" align="center" valign="middle">一级指标</td>
    <td width="14%" rowspan="2" align="center" valign="middle">二级指标</td>
    <td colspan="3" align="center" valign="middle">参照点及其评分</td>
    <td rowspan="2" align="center" valign="middle">审核分</td>
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
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
     <input type="text" class="textgrade" name="one"  required="required" value="<?php echo ($base1[0]['basetwograde_auditscore']); ?>" >
     </td>
  </tr>
  <tr class="tr">
    <td class="td" align="center" valign="middle">思想素质</td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
   <?php echo ($base1[1]['basetwograde_selfscorea']); ?>
    </td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[1]['basetwograde_selfscoreb']); ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php echo ($base1[1]['basetwograde_selfscorec']); ?></td>
     <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="two"  required="required"  value="<?php echo ($base1[1]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="three"  required="required"  value="<?php echo ($base1[2]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="four"  required="required"  value="<?php echo ($base1[3]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="five"  required="required"  value="<?php echo ($base1[4]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="six"  required="required"  value="<?php echo ($base1[5]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="senven"  required="required"  value="<?php echo ($base1[6]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="eight"  required="required"  value="<?php echo ($base1[7]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="nine"  required="required"  value="<?php echo ($base1[8]['basetwograde_auditscore']); ?>"></td>
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
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <input type="text" class="textgrade" name="ten"  required="required"  value="<?php echo ($base1[9]['basetwograde_auditscore']); ?>"></td>
    <!--1-->
  </tr>
  <!--发展指标-->
  <tr>
    <td colspan="7" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="<?php echo ($dnum); ?>" align="center" valign="middle">发展性素质测评</td>
    <td align="center" valign="middle">一级指标</td>
    <td colspan="3" align="center" valign="middle">参考点</td>
    <td align="center" valign="middle">自评分</td>
    <td align="center" valign="middle">审核分</td>
  </tr>
  <?php if(is_array($deve)): foreach($deve as $key=>$vo): ?><tr>
    <td align="center" valign="middle"><?php echo ($vo["deveonelevelindex_content"]); ?></td>
    <td colspan="3" align="left" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php if(is_array($py)): foreach($py as $key=>$dv): ?><!--记住name是不加美元符的!-->
      <?php if(($dv["deveid"]) == $vo["deveonelevelindex_id"]): ?>参考点：<?php echo ($dv["reason"]); ?></br>图片：
      <a href="/zhcp/Public/Uploads/<?php echo ($dv["url"]); ?>">
      <img src="/zhcp/Public/Uploads/<?php echo ($dv["url"]); ?>" width="62" height="62" alt="" />
      </a></br><?php endif; endforeach; endif; ?></td>
    <td  class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
    <?php if(is_array($deve1)): foreach($deve1 as $key=>$dv): if(($dv["deveonelevelindex_id"]) == $vo["deveonelevelindex_id"]): echo ($dv["deveonelevelgrade_selfscore"]); endif; endforeach; endif; ?></td>
    <td class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
     <?php if(is_array($deve1)): foreach($deve1 as $key=>$dv): if(($dv["deveonelevelindex_id"]) == $vo["deveonelevelindex_id"]): ?><input type="text" class="textgrade" name="g<?php echo ($vo["deveonelevelindex_id"]); ?>" style="height:57px;" value="<?php echo ($dv["deveonelevelgrade_auditscore"]); ?>"><?php endif; endforeach; endif; ?>
    </td><?php endforeach; endif; ?>
  </tr>
<!--   <tr>
    <td colspan="6" class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">该学年平均学分绩点</td>
    <td colspan="1" class="td" width="100px" height="41px" align="center" valign="middle" style="margin:0px; padding:0px; overflow:hidden;">
      <input type="text" class="textgrade" name="score"  required="required" value="<?php echo ($aca); ?>">
    </td>
  </tr> -->
   <input type="hidden" name="user_id" value="<?php echo ($userid); ?>">
</table>

</div>
<input class="input_button" type="submit" value="提交" id="regis" style="margin-left: 900px;">
<a class="detail1" href="<?php echo U('/Home/Index/queryclass',array('pclass_id'=>$pclassid));?>" style="margin-left:5px;">返回</a>
</form>
</body>
</html>