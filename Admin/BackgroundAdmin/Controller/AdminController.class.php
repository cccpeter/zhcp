<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
/*
	1、管理员修改自己密码
	2、前端ajax输入管理员原密码(oldpassword)、管理员新密码(newpassword)
	3、后端返回1为修改成功、返回-1为修改失败、返回-2为修改失败，密码并无改动、返回-1为修改失败(原密码输入错误)、
	4、系统管理项
 */	
class adminController extends CommonController {
    public function index(){
    	if(IS_AJAX){
    		$oldpassword =I('post.oldpassword');
			$newpassword = I('post.newpassword');
			$admin_id=$_SESSION['admin_id'];
			$result=M('admin')->where(array('admin_id'=>$admin_id))->find();
			if($result['admin_password']==$oldpassword){
				$updata=array(
					'admin_password'=>$newpassword
					);
				$re=M('admin')->where(array('admin_id'=>$admin_id))->save($updata);
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
    public function schoolyear(){
    	if(IS_AJAX){//添加学年的操作
    		$yearname=I('post.yearname');
    		$re=M('schoolyear')->add(array('schoolyear_name'=>$yearname,'schoolyear_nowyear'=>0));
    		if($re){
    			echo 1;
    		}else{
    			echo -1;
    		}
    		return;
    	}
    	$nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1,'schoolyear_del'=>0))->find();
    	$year=M('schoolyear')->where(array('schoolyear_del'=>0))->select();
    	$this->assign('nowyear',$nowyear);
    	$this->assign('year',$year);
    	$this->display();
    }
    public function changeschoolyear(){
    	if(IS_AJAX){//设置学年的操作
    		$year_id=I('post.changename');
    		$r=M('schoolyear')->select();
    		foreach ($r as $key => $school) {
    			$n=M('schoolyear')->where(array('schoolyear_id'=>$school['schoolyear_id']))->save(array('schoolyear_nowyear'=>0));
    		}
    		$re=M('schoolyear')->where(array('schoolyear_id'=>$year_id))->save(array('schoolyear_nowyear'=>1));
    		if($re){
    			echo 1;
    		}else{
    			echo -1;
    		}
    		return;
    	}
    }
    public function delschoolyear(){
    	if(IS_AJAX){//设置学年的操作
    		$year_id=I('post.delyear');
    		$re=M('schoolyear')->where(array('schoolyear_id'=>$year_id))->save(array('schoolyear_del'=>1));
    		if($re){
    			echo 1;
    		}else{
    			echo -1;
    		}
    		return;
    	}
    }
    public function grade(){
    	if(IS_AJAX){
    		$addgradename=I('post.addgradename');
    		$re=M('grade')->add(array('grade_name'=>$addgradename,'sys_id'=>1));
    		if($re){
    			echo 1;
    		}else{
    			echo -1;
    		}
    		return;
    	}
    	$grade=M('grade')->where(array('grade_del'=>0))->select();
    	$this->assign('grade',$grade);
    	$this->display();
    }
    public function delgrade(){
    	if(IS_AJAX){
    		$del_id=I('post.delgradename');
    		$re=M('grade')->where(array('grade_id'=>$del_id))->save(array('grade_del'=>1));
    		if($re){
    			echo 1;
    		}else{
    			echo -1;
    		}
    		return;
    	}
    }
    public function instructor(){
    	if(IS_POST){
    		$grade_id=I('post.grade_id');
    		$name=I('post.grade_id');
    		$accoount=I('post.accoount');
    		$password=I('post.password');
    		$isoff=M('instructor')->where(array('grade_id'=>$grade_id))->find();
    		if($isoff){
    			//该年级已经有辅导员
    			$this->error("该年级已经存在辅导员，无法再次进行添加！");
    		}else{
    			//该年级唯有辅导员
    			$re=M('instructor')->add(array(
    				'instructor_account'=>$accoount,
    				'instructor_password'=>$password,
    				'instructor_name'=>$name,
    				'sys_id'=>1,
    				'grade_id'=>$grade_id
    				));
    			if($re){
    				$this->success('添加辅导员成功');
    			}else{
    				$this->error("添加辅导员失败，请检查网络连接设置");
    			}
    		}
    		return;
    	}
    	$instructor=M('instructor')->select();
    	$i=0;
    	foreach ($instructor as $key => $value) {
    		$i++;
    	}
    	for($j=0;$j<$i;$j++){
    		$name=M('grade')->where(array('grade_id'=>$instructor[$j]['grade_id']))->field('grade_name')->find();
    		$instructor[$j]['grade_name']=$name['grade_name'];
    	}
    	$grade=M('grade')->where(array('grade_del'=>0))->select();
    	$this->assign('grade',$grade);
    	$this->assign('instructor',$instructor);
    	$this->display();
    }
    public function changeinstructor(){
    	if(IS_POST){
    		$grade=I('post.grade');
    		$name=I('post.name');
    		$account=I('post.account');
    		$password=I('post.password');
    		$instructor_id=I('post.instructor_id');
    		$re=M('instructor')->where(array('instructor_id'=>$instructor_id))->save(array(
    			'instructor_grade'=>$grade,
    			'instructor_name'=>$name,
    			'instructor_account'=>$account,
    			'instructor_password'=>$password
    			));
    		if($re){
    			$this->success("修改成功");
    		}else{
    			$this->error("修改失败，信息未更新不用修改！");
    		}
    		return;
    	}
    	$instructor_id=I('get.instructor_id');
    	$instructor=M('instructor')->where(array('instructor_id'=>$instructor_id))->find();
    	$grade=M('grade')->where(array('grade_del'=>0))->select();
    	$this->assign('instructor',$instructor);
    	// dump($instructor);
    	$this->assign('grade',$grade);
    	$this->display();
    }
}