<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {

	public function verify()  
   {  
   		ob_clean();
       $Verify = new \Think\Verify();  
       $Verify->fontSize = 30;  
       $Verify->length   = 4;  
       $Verify->useNoise = false;  
       $Verify->entry();  
       $this->display();
  
   }  
  function check_verify($code, $id = ''){
	$config = array(
	'reset' => false // 验证成功后是否重置，这里才是有效的。
	);
	$verify = new \Think\Verify($config);
	return $verify->check($code, $id);
	}
  
    public function index(){
    	if(IS_POST){
    		// $post=$_POST;
    		$issub=I('post.issub');

    		if($_POST['token']==session('token')){
                session('token',md5(time()));
                //判断重复提交
                if($issub==0){
    				$this->sub();
	    		}
	    		if($issub==1){
	    			$this->change();
	    		}
            }else{
                $this->error("请不要重复提交！！！");
            }
    	}else{
    		$token=md5(time());//加token防止重复提交
    		session('token',$token);
    		$this->assign('token',$token);
	    	$user_id=$_SESSION['user_id'];
	    	$schoolyear_nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->field('schoolyear_id')->find();//当前评测学年
	    	$issub=M('basetwograde')->where(array(
	    		'user_id'=>$user_id,
	    		'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id']
	    		))->find();
	    	if($issub!=""){
	    		$issub=1;
	    	}else{
	    		$issub=0;
	    	}
	    	$basenums=2+M('basetwolevelindex')->count();
	    	$base=M('basetwolevelindex')->select();
	    	$devenums=1+M('deveonelevelindex')->count();
	    	$deve=M('deveonelevelindex')->select();
	    	$this->assign('issub',$issub);
	    	$this->assign('base',$base);
	    	$this->assign('deve',$deve);
	    	$this->assign('dnum',$devenums);
	    	$this->assign('num',$basenums);
	    	$user_name=$_SESSION['user_name'];
	    	$this->assign('user_name',$user_name);
	        $this->display();
	    }
    }
   public function sub(){
   			$user_name=$_SESSION['user_name'];
	    	$this->assign('user_name',$user_name);
    		$user_id=$_SESSION['user_id'];//当前学生
    		$schoolyear_nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->field('schoolyear_id')->find();//当前评测学年
    		$issub=M('basetwograde')->where(array(
	    		'user_id'=>$user_id,
	    		'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id']
	    		))->find();
	    	if($issub!=""){
	    		$issub=1;
	    	}else{
	    		$issub=0;
	    	}
	    	$this->assign('issub',$issub);
    		$up=I('post.up');

		//验证码
	$code = $_POST['code'];  

  if($this->check_verify($code) === true)  
    {  
       
    }else  
    {  
        $this->error("验证码错误，请返回页面重新刷新填写信息！") ;  
        return;
    }  
    		if($up==1){
	    		$deveonegrade=array();
	    		//上传图片
	    		$upload = new \Think\Upload(); // 实例化上传类
				$upload->maxSize = 8000*8000;// 设置附件上传大小 (-1) 是不限值大小
				$upload->exts = array(
				'jpg','gif','png','jpeg'
				);// 设置附件上传类型
				$upload->rootPath  = './Public/'; // 设置附件上传根目录
				$upload->savePath = 'Uploads/';// 设置附件子目录上传目录
				$upload->replace = true; //存在同名文件是否是覆盖
				// 是否使用子目录保存上传文件
				$upload->autoSub = false;
				// 采用date函数生成命名规则 传入Y-m-d参数
				//$upload->saveName = array('date''Y-m-d');
				//如果有多个参数需要传入的话 可以使用数组
				//$upload->saveName = array('myFun'array('__FILE__''val1''val2'));
				$info = $upload->upload();
				if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
				}else{// 上传成功 获取上传文件信息
					$filename=array();
					$file1="";
					$i=0;
					$photoname1="";
					$photoname2="";
					$photoname3="";
					$photoname4="";
					$photoname5="";
					 foreach($info as $file){
		   			    $filename[$i] = $file['savePath'].$file['savename'];
		   			    if($file['key']=="photo1"){
							$photoname1.=$file['savePath'].$file['savename'].",";
							$content1=I('post.content1');
		   			    }
		   			    if($file['key']=="photo2"){
							$photoname2.=$file['savePath'].$file['savename'].",";
							$content2=I('post.content2');
		   			    }
		   			    if($file['key']=="photo3"){
							$photoname3.=$file['savePath'].$file['savename'].",";
							$content3=I('post.content3');
		   			    	
		   			    }
		   			    if($file['key']=="photo4"){
							$photoname4.=$file['savePath'].$file['savename'].",";
							$content4=I('post.content4');
		   			    	
		   			    }
		   			    if($file['key']=="photo5"){
							$photoname5.=$file['savePath'].$file['savename'].",";
							$content5=I('post.content5');
		   			    	
		   			    }
		   			    $i++;
		   			 }
		   			 $content1=implode(',',$content1);
		   			 $content2=implode(',',$content2);
		   			 $content3=implode(',',$content3);
		   			 $content4=implode(',',$content4);
		   			 $content5=implode(',',$content5);
		   			 // dump($content2);
		   			 // $file1=implode(',',$filename);
		   			 // dump($photoname1);
		   			 // dump($photoname2);
		   			 // dump($photoname3);
		   			 // dump($photoname4);
		   			 // dump($photoname5);
					// die;
				}
			}
    		$one=array(
				'basetwograde_selfscorea'=>I('post.1a'),
				'basetwograde_selfscoreb'=>I('post.1b'),
				'basetwograde_selfscorec'=>I('post.1c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>1,
				'baseonelevelindex_id'=>1,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($one);
    		$two=array(
				'basetwograde_selfscorea'=>I('post.2a'),
				'basetwograde_selfscoreb'=>I('post.2b'),
				'basetwograde_selfscorec'=>I('post.2c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>1,
				'baseonelevelindex_id'=>2,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($two);
    		$three=array(
				'basetwograde_selfscorea'=>I('post.3a'),
				'basetwograde_selfscoreb'=>I('post.3b'),
				'basetwograde_selfscorec'=>I('post.3c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>1,
				'baseonelevelindex_id'=>3,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($three);
    		$four=array(
				'basetwograde_selfscorea'=>I('post.4a'),
				'basetwograde_selfscoreb'=>I('post.4b'),
				'basetwograde_selfscorec'=>I('post.4c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>2,
				'baseonelevelindex_id'=>4,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($four);
    		$five=array(
				'basetwograde_selfscorea'=>I('post.5a'),
				'basetwograde_selfscoreb'=>I('post.5b'),
				'basetwograde_selfscorec'=>I('post.5c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>2,
				'baseonelevelindex_id'=>5,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($five);
    		$six=array(
				'basetwograde_selfscorea'=>I('post.6a'),
				'basetwograde_selfscoreb'=>I('post.6b'),
				'basetwograde_selfscorec'=>I('post.6c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>2,
				'baseonelevelindex_id'=>6,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($six);
    		$seven=array(
				'basetwograde_selfscorea'=>I('post.7a'),
				'basetwograde_selfscoreb'=>I('post.7b'),
				'basetwograde_selfscorec'=>I('post.7c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>3,
				'baseonelevelindex_id'=>7,
				'user_id'=>$user_id
				);
   		$re=M('basetwograde')->add($seven);
    		$eight=array(
				'basetwograde_selfscorea'=>I('post.8a'),
				'basetwograde_selfscoreb'=>I('post.8b'),
				'basetwograde_selfscorec'=>I('post.8c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>4,
				'baseonelevelindex_id'=>8,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($eight);
    		$nine=array(
				'basetwograde_selfscorea'=>I('post.9a'),
				'basetwograde_selfscoreb'=>I('post.9b'),
				'basetwograde_selfscorec'=>I('post.9c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>5,
				'baseonelevelindex_id'=>9,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($nine);
    		$ten=array(
				'basetwograde_selfscorea'=>I('post.10a'),
				'basetwograde_selfscoreb'=>I('post.10b'),
				'basetwograde_selfscorec'=>I('post.10c'),
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'basetwolevelindex_id'=>5,
				'baseonelevelindex_id'=>10,
				'user_id'=>$user_id
				);
    		$re=M('basetwograde')->add($ten);
    		$dev=array(
    			'g1'=>I('post.g1'),//评分 content数组为reason原由数组
    			'g2'=>I('post.g2'),
    			'g3'=>I('post.g3'),
    			'g4'=>I('post.g4'),
    			'g5'=>I('post.g5'),
    			);
    		

    		if($dev['g1']!=''){
    			$deveonegrade=array(
    				'deveonelevelgrade_selfscore'=>$dev['g1'],
    				'deveonelevelgrade_reason'=>$content1,
    				'deveonelevelindex_id'=>1,
    				'deveonelevelgrade_url'=>$photoname1,
    				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
    				'user_id'=>$user_id
    				);
    			$re=M('deveonelevelgrade')->add($deveonegrade);
    		}
    		if($dev['g2']!=''){
    			$deveonegrade=array(
    				'deveonelevelgrade_selfscore'=>$dev['g2'],
    				'deveonelevelgrade_reason'=>$content2,
    				'deveonelevelindex_id'=>2,
    				'deveonelevelgrade_url'=>$photoname2,
    				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
    				'user_id'=>$user_id
    				);
    			$re=M('deveonelevelgrade')->add($deveonegrade);
    		}
    		if($dev['g3']!=''){
    			$deveonegrade=array(
    				'deveonelevelgrade_selfscore'=>$dev['g3'],
    				'deveonelevelgrade_reason'=>$content3,
    				'deveonelevelindex_id'=>3,
    				'deveonelevelgrade_url'=>$photoname3,
    				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
    				'user_id'=>$user_id
    				);
    			$re=M('deveonelevelgrade')->add($deveonegrade);
    		}
    		if($dev['g4']!=''){
    			$deveonegrade=array(
    				'deveonelevelgrade_selfscore'=>$dev['g4'],
    				'deveonelevelgrade_reason'=>$content4,
    				'deveonelevelindex_id'=>4,
    				'deveonelevelgrade_url'=>$photoname4,
    				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
    				'user_id'=>$user_id
    				);
    			$re=M('deveonelevelgrade')->add($deveonegrade);
    		}
    		if($dev['g5']!=''){
    			$deveonegrade=array(
    				'deveonelevelgrade_selfscore'=>$dev['g5'],
    				'deveonelevelgrade_reason'=>$content5,
    				'deveonelevelindex_id'=>5,
    				'deveonelevelgrade_url'=>$photoname5,
    				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
    				'user_id'=>$user_id
    				);
    			$re=M('deveonelevelgrade')->add($deveonegrade);
    		}

    		if($re){
    			$this->success("提交成功");
    		}else{
    			$this->error("提交失败");
    		}
   }
   public function change(){
   		$user_name=$_SESSION['user_name'];
		$this->assign('user_name',$user_name);
		$user_id=$_SESSION['user_id'];//当前学生
		$schoolyear_nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->field('schoolyear_id')->find();//当前评测学年
		$issub=M('basetwograde')->where(array(
			'user_id'=>$user_id,
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id']
			))->find();
		if($issub!=""){
			$issub=1;
		}else{
			$issub=0;
		}
		$this->assign('issub',$issub);
		$up=I('post.up');

			//验证码
	$code = $_POST['code'];  

    if($this->check_verify($code) === true)  
    {  
       
    }else  
    {  
        $this->error("验证码错误，请返回刷新页面重新填写信息！") ;  
        return;
    }  
		if($up==1){
			$deveonegrade=array();
			//上传图片
			$upload = new \Think\Upload(); // 实例化上传类
			$upload->maxSize =8000*8000 ;// 设置附件上传大小 (-1) 是不限值大小
			$upload->exts = array(
			'jpg','gif','png','jpeg'
			);// 设置附件上传类型
			$upload->rootPath  = './Public/'; // 设置附件上传根目录
			$upload->savePath = 'Uploads/';// 设置附件子目录上传目录
			$upload->replace = true; //存在同名文件是否是覆盖
			// 是否使用子目录保存上传文件
			$upload->autoSub = false;
			// 采用date函数生成命名规则 传入Y-m-d参数
			//$upload->saveName = array('date''Y-m-d');
			//如果有多个参数需要传入的话 可以使用数组
			//$upload->saveName = array('myFun'array('__FILE__''val1''val2'));
			$info = $upload->upload();
			if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
			}else{// 上传成功 获取上传文件信息
				$filename=array();
				$file1="";
				$i=0;
				$photoname1="";
				$photoname2="";
				$photoname3="";
				$photoname4="";
				$photoname5="";
				 foreach($info as $file){
	   			    $filename[$i] = $file['savePath'].$file['savename'];
	   			    if($file['key']=="photo1"){
						$photoname1.=$file['savePath'].$file['savename'].",";
						$content1=I('post.content1');
	   			    }
	   			    if($file['key']=="photo2"){
						$photoname2.=$file['savePath'].$file['savename'].",";
						$content2=I('post.content2');
	   			    }
	   			    if($file['key']=="photo3"){
						$photoname3.=$file['savePath'].$file['savename'].",";
						$content3=I('post.content3');
	   			    	
	   			    }
	   			    if($file['key']=="photo4"){
						$photoname4.=$file['savePath'].$file['savename'].",";
						$content4=I('post.content4');
	   			    	
	   			    }
	   			    if($file['key']=="photo5"){
						$photoname5.=$file['savePath'].$file['savename'].",";
						$content5=I('post.content5');
	   			    	
	   			    }
	   			    $i++;
	   			 }
	   			 $content1=implode(',',$content1);
	   			 $content2=implode(',',$content2);
	   			 $content3=implode(',',$content3);
	   			 $content4=implode(',',$content4);
	   			 $content5=implode(',',$content5);
	   			 // dump($content2);
	   			 // $file1=implode(',',$filename);
	   			 // dump($photoname1);
	   			 // dump($photoname2);
	   			 // dump($photoname3);
	   			 // dump($photoname4);
	   			 // dump($photoname5);
				// die;
			}
		}
		$one=array(
			'basetwograde_selfscorea'=>I('post.1a'),
			'basetwograde_selfscoreb'=>I('post.1b'),
			'basetwograde_selfscorec'=>I('post.1c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>1,
			'baseonelevelindex_id'=>1,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($one);
		$two=array(
			'basetwograde_selfscorea'=>I('post.2a'),
			'basetwograde_selfscoreb'=>I('post.2b'),
			'basetwograde_selfscorec'=>I('post.2c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>1,
			'baseonelevelindex_id'=>2,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($two);
		$three=array(
			'basetwograde_selfscorea'=>I('post.3a'),
			'basetwograde_selfscoreb'=>I('post.3b'),
			'basetwograde_selfscorec'=>I('post.3c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>1,
			'baseonelevelindex_id'=>3,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($three);
		$four=array(
			'basetwograde_selfscorea'=>I('post.4a'),
			'basetwograde_selfscoreb'=>I('post.4b'),
			'basetwograde_selfscorec'=>I('post.4c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>2,
			'baseonelevelindex_id'=>4,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($four);
		$five=array(
			'basetwograde_selfscorea'=>I('post.5a'),
			'basetwograde_selfscoreb'=>I('post.5b'),
			'basetwograde_selfscorec'=>I('post.5c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>2,
			'baseonelevelindex_id'=>5,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($five);
		$six=array(
			'basetwograde_selfscorea'=>I('post.6a'),
			'basetwograde_selfscoreb'=>I('post.6b'),
			'basetwograde_selfscorec'=>I('post.6c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>2,
			'baseonelevelindex_id'=>6,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($six);
		$seven=array(
			'basetwograde_selfscorea'=>I('post.7a'),
			'basetwograde_selfscoreb'=>I('post.7b'),
			'basetwograde_selfscorec'=>I('post.7c'),
			);
			$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>3,
			'baseonelevelindex_id'=>7,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($seven);
		$eight=array(
			'basetwograde_selfscorea'=>I('post.8a'),
			'basetwograde_selfscoreb'=>I('post.8b'),
			'basetwograde_selfscorec'=>I('post.8c'),
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>4,
			'baseonelevelindex_id'=>8,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($eight);
		$nine=array(
			'basetwograde_selfscorea'=>I('post.9a'),
			'basetwograde_selfscoreb'=>I('post.9b'),
			'basetwograde_selfscorec'=>I('post.9c')
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>5,
			'baseonelevelindex_id'=>9,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($nine);
		$ten=array(
			'basetwograde_selfscorea'=>I('post.10a'),
			'basetwograde_selfscoreb'=>I('post.10b'),
			'basetwograde_selfscorec'=>I('post.10c')
			);
		$where=array(
			'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
			'basetwolevelindex_id'=>5,
			'baseonelevelindex_id'=>10,
			'user_id'=>$user_id);
		$re=M('basetwograde')->where($where)->save($ten);
		$dev=array(
			'g1'=>I('post.g1'),//评分 content数组为reason原由数组
			'g2'=>I('post.g2'),
			'g3'=>I('post.g3'),
			'g4'=>I('post.g4'),
			'g5'=>I('post.g5'),
			);
		
		if($dev['g1']!=''){
			$deveonegrade=array(
				'deveonelevelgrade_selfscore'=>$dev['g1'],
				'deveonelevelgrade_reason'=>$content1,
				'deveonelevelgrade_url'=>$photoname1
				);
			$where=array(
				'deveonelevelindex_id'=>1,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id==""){
				$deveonegrade['deveonelevelindex_id']=1;
				$deveonegrade['schoolyear_id']=$schoolyear_nowyear['schoolyear_id'];
				$deveonegrade['user_id']=$user_id;
				$re=M('deveonelevelgrade')->add($deveonegrade);
			}else{
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->save($deveonegrade);
			}
		}else{
			$where=array(
				'deveonelevelindex_id'=>1,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id!=""){
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->delete();
			}
		}
		if($dev['g2']!=''){
			$deveonegrade=array(
				'deveonelevelgrade_selfscore'=>$dev['g2'],
				'deveonelevelgrade_reason'=>$content2,
				'deveonelevelgrade_url'=>$photoname2
				);
			$where=array(
				'deveonelevelindex_id'=>2,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id==""){
				$deveonegrade['deveonelevelindex_id']=2;
				$deveonegrade['schoolyear_id']=$schoolyear_nowyear['schoolyear_id'];
				$deveonegrade['user_id']=$user_id;
				$re=M('deveonelevelgrade')->add($deveonegrade);
			}else{
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->save($deveonegrade);
			}
		}else{
			$where=array(
				'deveonelevelindex_id'=>2,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id!=""){
				// dump($deveonelevelgrade_id);
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->delete();
			}
		}
		if($dev['g3']!=''){
			$deveonegrade=array(
				'deveonelevelgrade_selfscore'=>$dev['g3'],
				'deveonelevelgrade_reason'=>$content3,
				'deveonelevelgrade_url'=>$photoname3
				);
			$where=array(
				'deveonelevelindex_id'=>3,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id    				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id==""){
				$deveonegrade['deveonelevelindex_id']=3;
				$deveonegrade['schoolyear_id']=$schoolyear_nowyear['schoolyear_id'];
				$deveonegrade['user_id']=$user_id;
				$re=M('deveonelevelgrade')->add($deveonegrade);
			}else{
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->save($deveonegrade);
			}
		}else{
			$where=array(
				'deveonelevelindex_id'=>3,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id!=""){
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->delete();
			}
		}
		if($dev['g4']!=''){
			$deveonegrade=array(
				'deveonelevelgrade_selfscore'=>$dev['g4'],
				'deveonelevelgrade_reason'=>$content4,
				'deveonelevelgrade_url'=>$photoname4
				);
			$where=array(
				'deveonelevelindex_id'=>4,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id==""){
				$deveonegrade['deveonelevelindex_id']=4;
				$deveonegrade['schoolyear_id']=$schoolyear_nowyear['schoolyear_id'];
				$deveonegrade['user_id']=$user_id;
				$re=M('deveonelevelgrade')->add($deveonegrade);
			}else{
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->save($deveonegrade);
			}
		}else{
			$where=array(
				'deveonelevelindex_id'=>4,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id!=""){
				// dump($deveonelevelgrade_id);
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->delete();
			}
		}
		if($dev['g5']!=''){
			$deveonegrade=array(
				'deveonelevelgrade_selfscore'=>$dev['g5'],
				'deveonelevelgrade_reason'=>$content5,
				'deveonelevelgrade_url'=>$photoname5
				);
			$where=array(
				'deveonelevelindex_id'=>5,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->find();
			if($deveonelevelgrade_id==""){
				$deveonegrade['deveonelevelindex_id']=5;
				$deveonegrade['schoolyear_id']=$schoolyear_nowyear['schoolyear_id'];
				$deveonegrade['user_id']=$user_id;
				$re=M('deveonelevelgrade')->add($deveonegrade);
			}else{
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->save($deveonegrade);
			}
		}else{
			$where=array(
				'deveonelevelindex_id'=>5,
				'schoolyear_id'=>$schoolyear_nowyear['schoolyear_id'],
				'user_id'=>$user_id
				);
			$deveonelevelgrade_id=M('deveonelevelgrade')->where($where)->field('deveonelevelgrade_id')->find();
			if($deveonelevelgrade_id!=""){
				// dump($deveonelevelgrade_id);
				$re=M('deveonelevelgrade')->where(array('deveonelevelgrade_id'=>$deveonelevelgrade_id['deveonelevelgrade_id']))->delete();
			}
		}
		if($re){
			$this->success("修改成功");
		}else{
			$this->error("修改失败，您并没有需要修改项");
		}
   }
   public function changepw(){
   	if(IS_AJAX){
    		$oldpassword =I('post.oldpassword');
			$newpassword = I('post.newpassword');
			$user_id=$_SESSION['user_id'];
			$result=M('user')->where(array('user_id'=>$user_id))->find();
			if($result['user_password']==$oldpassword){
				$updata=array(
					'user_password'=>$newpassword
					);
				$re=M('user')->where(array('user_id'=>$user_id))->save($updata);
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
    	$username=$_SESSION['user_name'];
    	$this->assign('user_name',$username);
    	$this->display();
    	
   }
}