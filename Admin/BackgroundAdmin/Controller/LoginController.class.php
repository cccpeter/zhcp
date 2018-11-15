<?php
namespace BackgroundAdmin\Controller;
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
	    	$account =I('post.account');
			$password = I('post.password');
			$where=array('admin_account'=>$account,
				'admin_password'=>$password
				);
			$result=M('admin')->where($where)->find();
			if($result){
				echo 1;
				$_SESSION['admin_id']=$result['admin_id'];
				$_SESSION['admin_name']=$result['admin_name'];
				return;
			}else{
				echo -1;
				return;
		}

	}
    $this->display();
    }
}