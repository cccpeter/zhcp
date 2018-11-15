<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>综合测评系统后台</title>
	<link rel="stylesheet" href="/zhcp/Public/css/admin.css" />
	<script type="text/javascript" src="/zhcp/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/zhcp/Public/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">综合测评系统后台 </p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>辅导员:</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people"><?php echo ($_SESSION['instructor_name']); ?></span>
			</p>
			<p class="now_time">
				今天是：<?php echo ($day); ?>
				您的当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo U('Home/Index/loginout');?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">功能菜单</p>
			<div class="menu_box">
				<h2>综合测评审核</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Index/queryclass');?>" class="pos">测评审核</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>
			
			 <div class="menu_box">
				<h2>班级管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Class/detal');?>" class="pos">班级管理</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Class/index');?>" class="pos">导入学生账号</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Class/input');?>" class="pos">导入学生测评信息</a>				        	
				        </li> 
				    </ul>
				 <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Class/expect');?>" class="pos">导出测评结果</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>	
			<div class="menu_box">
				<h2>系统管理</h2>
				<div class="text">
				    <!-- <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Admin/schoolyear');?>" class="pos">设置当前学期</a>				        	
				        </li> 
				    </ul> -->
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Admin/index');?>" class="pos">密码修改</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>		
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo U('Home/Index/copy');?>"></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>©南苑计协开发部</p>
		</div>
	</div>

</body>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="/zhcp/Public/js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->