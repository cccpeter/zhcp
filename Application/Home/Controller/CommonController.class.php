<?php
namespace Home\Controller;
use Think\Controller;
Class CommonController extends Controller {
	Public function  _initialize(){
		if(!isset($_SESSSION['user_id'])&&!isset($_SESSION['user_name'])){
       		redirect(U('/home/Login/index'));
       }
	}
}
