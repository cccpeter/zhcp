<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
Class CommonController extends Controller {
	Public function  _initialize(){
		if(!isset($_SESSSION['classgroup_id'])&&!isset($_SESSION['pclass_id'])){
       	redirect(U('/BackgroundAdmin/Login/index'));
       }
	}
}
