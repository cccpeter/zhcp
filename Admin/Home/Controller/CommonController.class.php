<?php
namespace Home\Controller;
use Think\Controller;
Class CommonController extends Controller {
	Public function  _initialize(){
		if(!isset($_SESSSION['instructor_account'])&&!isset($_SESSION['instructor_name'])){
       	redirect(U('Home/Login/index'));
       }
	}
}
