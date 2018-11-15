<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	if(IS_AJAX){
	    	$account =I('post.account');
			$password = I('post.password');
			$where=array('classgroup_account'=>$account,
				'classgroup_password'=>$password
				);
			$result=M('classgroup')->where($where)->find();
			if($result){
				echo 1;
				$_SESSION['classgroup_id']=$result['classgroup_id'];
				$_SESSION['pclass_id']=$result['pclass_id'];
				return;
			}else{
				echo -1;
				return;
		}
	}
    $this->display();
    }
}