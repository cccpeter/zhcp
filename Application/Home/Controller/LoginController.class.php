<?php
namespace Home\Controller;
use Think\Controller;
/*
	1、登录控制器
	2、输入管理员账号account和密码password
	3、输出：1表示登录成功，-1表示登录失败
	4、将登录成功的管理员的id、昵称、权限写入session
 */
class LoginController extends Controller {
    public function index(){
    	if(IS_AJAX){
	    	$user_number =I('post.account');
			$password = I('post.password');
			$where=array('user_number'=>$user_number,
				'user_password'=>$password
				);
			$result=M('user')->where($where)->find();
			if($result){
				echo 1;
				$_SESSION['user_id']=$result['user_id'];
				$_SESSION['user_name']=$result['user_name'];
				$_SESSION['user_power']=$result['user_power'];
				return;
			}else{
				echo -1;
				return;
		}
	}
    $this->display();
    }
    public function loginout(){
    	session_unset();
      	session_destroy();
    	$this->success("退出系统成功");
    }
}