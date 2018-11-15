<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
/*
	1、管理员修改自己密码
	2、前端ajax输入管理员原密码(oldpassword)、管理员新密码(newpassword)
	3、后端返回1为修改成功、返回-1为修改失败、返回-2为修改失败，密码并无改动、返回-1为修改失败(原密码输入错误)、

 */	
class adminController extends CommonController {
    public function index(){
    	if(IS_AJAX){
    		$oldpassword =I('post.oldpassword');
			$newpassword = I('post.newpassword');
			$classgroup_id=$_SESSION['classgroup_id'];
			$result=M('classgroup')->where(array('classgroup_id'=>$classgroup_id))->find();
			if($result['classgroup_password']==$oldpassword){
				$updata=array(
					'classgroup_password'=>$newpassword
					);
				$re=M('classgroup')->where(array('classgroup_id'=>$classgroup_id))->save($updata);
				if($re){
					echo 1;	
				}else{
					echo -2;
				}

			}else{
				echo -1;	
			}
			return;
    	}
    	$pclass_id=$_SESSION['pclass_id'];
    	$pclass_name=M('pclass')->where(array('pclass_id'=>$pclass_id))->field('pclass_name')->find();
    	$classgroup_id=$_SESSION['classgroup_id'];
    	$account=M('classgroup')->where(array('classgroup_id'=>$classgroup_id))->field('classgroup_account')->find();
    	$this->assign('account',$account['classgroup_account']);
    	$this->assign('name',$pclass_name['pclass_name']);
    	$this->display();
    	
    }
}