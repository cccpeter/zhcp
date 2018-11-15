<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
Class CommonController extends Controller {
	Public function  _initialize(){
		if(!isset($_SESSSION['admin_id'])&&!isset($_SESSION['admin_name'])){
       	redirect(U('/BackgroundAdmin/Login/index'));
       }
	}
}
