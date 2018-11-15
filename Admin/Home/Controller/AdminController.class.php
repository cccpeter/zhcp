<?php
namespace Home\Controller;
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
			$instructor_id=$_SESSION['instructor_id'];
			$result=M('instructor')->where(array('instructor_id'=>$instructor_id))->find();
			if($result['instructor_password']==$oldpassword){
				$updata=array(
					'instructor_password'=>$newpassword
					);
				$re=M('instructor')->where(array('instructor_id'=>$instructor_id))->save($updata);
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
    	$this->display();
    	
    }
    // public function schoolyear(){
    // 	$this->display();
    // }
}