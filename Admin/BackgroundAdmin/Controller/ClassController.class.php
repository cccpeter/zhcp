<?php
namespace BackgroundAdmin\Controller;
use Think\Controller;
/*
1、班级学生的导入
2、班级学生密码重置
3、班级的增删改
4、班级测评小组的账号管理
 */
class classController extends CommonController {
    public function querygradeclass(){
        if(IS_POST){
            $grade_id=I('post.demo');
            redirect(U('BackgroundAdmin/Class/index',array('grade_id'=>$grade_id)));
        }
        $admin_id=$_SESSION['admin_id'];
        $sys_id=M('admin')->where(array('admin_id'=>$admin_id))->find();
        $grade=M('grade')->where(array('sys_id'=>$sys_id['admin_sys']))->select();
        $this->assign('grade',$grade);
        $this->display();
    }
    public function index(){
    	$grade=I('get.grade_id');
        $grade_name=M('grade')->where(array('grade_id'=>$grade))->find();
    	$pclassname=M('pclass')->where(array('grade_id'=>$grade['grade_id']))->select();
    	$this->assign('pclassname',$pclassname);
        $this->assign('grade_name',$grade_name['grade_name']."年级");
        $this->assign('grade_id',$grade);
    	$this->display();
    }
    public function querygrade(){
        if(IS_POST){
            $grade_id=I('post.demo');
            redirect(U('BackgroundAdmin/Class/detal',array('grade_id'=>$grade_id)));
        }
        $admin_id=$_SESSION['admin_id'];
        $sys_id=M('admin')->where(array('admin_id'=>$admin_id))->find();
        $grade=M('grade')->where(array('sys_id'=>$sys_id['admin_sys']))->select();
        $this->assign('grade',$grade);
        $this->display();
    }
    public function detal(){
    	if(IS_POST){
    		$grade=I('post.grade_id');
    		$addclass_name=I('post.classname');
    		$pclass=array(
    			'pclass_name'=>$addclass_name,
    			'grade_id'=>$grade['grade_id']
    			);
    		$re=M('pclass')->add($pclass);
    		if($re){
                $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="添加班级".$addclass_name."成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    			$this->success('添加班级成功');
    		}else{
    			$this->error('添加班级失败');
    		}
    		return;
    	}
    	$grade=I('get.grade_id');
    	$pclassname=M('pclass')->where(array('grade_id'=>$grade['grade_id']))->select();
    	$i=0;
    	foreach ($pclassname as $key => $value) {
    		$i++;
    	}
    	for($j=0;$j<$i;$j++){
    		$pclassid=$pclassname[$j]['pclass_id'];
    		$pclassname[$j]['nums']=M('user')->where(array('pclass_id'=>$pclassid))->count();
    	}
        $this->assign('grade_id',$grade);
    	$this->assign('pclassname',$pclassname);
    	$this->display();
    }
    public function excel_runimport(){
	    import("Org.Util.PHPExcel");
	    import("Org.Util.PHPExcel.Reader.Excel5");
       
        $PHPExcel = new \PHPExcel();
        if (! empty ( $_FILES ['file_stu'] ['name'] )){
	       $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
	       $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
	       $file_type = $file_types [count ( $file_types ) - 1];
           if (strtolower ( $file_type ) != "xlsx"){
                $this->error ( '不是后缀为.xlsx文件，重新上传');
           }
           /*设置上传路径*/
            $savePath = './Public/';
           /*以时间来命名上传的文件*/
            $str = time ( 'Ymdhis' ); 
            $file_name = $str . "." . $file_type;
            if (! copy ( $tmp_file, $savePath . $file_name )){
                 $this->error ('上传失败');
            }
          // $res = $this->read ( $savePath . $file_name );
          import("Org.Util.PHPExcel");
		//要导入的xls文件，位于根目录下的Public文件夹
		// dump($file_name);文件名
		$filename=$savePath.$file_name;//路径加文件名
		//创建PHPExcel对象，注意，不能少了\ 
		$PHPExcel=new \PHPExcel();

		//如果excel文件后缀名为.xls，导入这个类
		import("Org.Util.PHPExcel.Reader.Excel2007");
		$PHPReader=new \PHPExcel_Reader_Excel2007();
		//如果excel文件后缀名为.xlsx，导入这下类
		// import("Org.Util.PHPExcel.Reader.Excel5");
		// $PHPReader=new \PHPExcel_Reader_Excel5();
		//载入文件
		$PHPExcel=$PHPReader->load($filename);
		//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		$currentSheet=$PHPExcel->getSheet(0);
		//获取总列数
		$allColumn=$currentSheet->getHighestColumn();
		//获取总行数
		$allRow=$currentSheet->getHighestRow();
		//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		for($currentRow=1;$currentRow<=$allRow;$currentRow++){
			//从哪列开始，A表示第一列
			for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
				//数据坐标
				$address=$currentColumn.$currentRow;
				//读取到的数据，保存到数组$arr中
				$arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
			}
		
		}
			$classid=I('post.demo');
			$i=0;
			foreach ($arr as $key => $value) {
				$i++;
			}
			$suc="";
			for($j=2;$j<=$i;$j++){
				$userarr['user_number']=$arr[$j]['A'];
				$userarr['user_name']=$arr[$j]['B'];
				$userarr['sys_id']=1;
				$userarr['pclass_id']=$classid;
				$gradeid=M('pclass')->where(array('pclass_id'=>$classid))->field('grade_id')->find();
				$userarr['grade_id']=$gradeid['grade_id'];
				$userarr['user_pw']=$arr[$j]['F'];
				$userarr['user_password']=$arr[$j]['F'];
				$n=M('user')->where(array('user_number'=>$userarr['user_number']))->find();
				if($n==null){
					$re=M('user')->add($userarr);
					if($re){
						$suc.=$userarr['user_name']."信息导入成功</br>";
					}else{
						$suc.=$userarr['user_name']."信息导入失败，您的网络错误10001</br>";
					}
				}else{
						$suc.=$userarr['user_name']."信息导入失败,该同学学号已经存在</br>";
					}
			}
			$classname=M('pclass')->where(array('pclass_id'=>$classid))->field('pclass_name')->find();
			echo $suc;
             $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="导入班级id=".$classid."的学生信息成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
			$this->success($classname['pclass_name']."学生信息完成导入",'',10);
		}else{
			$this->error("没有上传文件，请重新选择文件上传");
		}
    } 
    public function repw(){
    	$pclassid=I('get.class_id');
    	if($pclassid=="all"){
    		dump("1111");
    	}else{
    		$user=M('user')->where(array('pclass_id'=>$pclassid))->select();
    	}
        $grade_id=M('pclass')->where(array('pclass_id'=>$pclassid))->find();
        $this->assign('grade_id',$grade_id['grade_id']);
    	$this->assign('user',$user);
    	$this->assign('classid',$pclassid);
    	$this->display();
    }
    public function repassword(){
    	$user_id=I('get.user_id');
    	if($user_id=="all"){
    		//全部重置
    		$classid=I('get.classid');
    		$user=M('user')->where(array('pclass_id'=>$classid))->select();
    		foreach ($user as $key => $value) {
    			$value['user_password']=$value['user_pw'];
    			$re=M('user')->where(array('user_id'=>$value['user_id']))->save($value);
    		}
            $m=new LogController();
            $time=date("Ymd",time());
            $ip= get_client_ip();
            $userid=$_SESSION['admin_id'];
            $usertype="系部管理员";
            $message="重置班级id=".$classid."密码成功";
            $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    		$this->success("该班级密码重置成功");
    	}else{
    		//个人重置
    		$user=M('user')->where(array('user_id'=>$user_id))->find();
    		$user['user_password']=$user['user_pw'];
    		$re=M('user')->where(array('user_id'=>$user['user_id']))->save($user);
            $m=new LogController();
            $time=date("Ymd",time());
            $ip= get_client_ip();
            $userid=$_SESSION['admin_id'];
            $usertype="系部管理员";
            $message="重置用户id=".$user_id."密码成功";
            $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    		$this->success('该学生密码重置成功');
    	}
    	
    }
    public function student(){
    	$pclassid=I('get.class_id');
        $grade_id=M('pclass')->where(array('pclass_id'=>$pclassid))->find();
    	$classname=M('pclass')->where(array('pclass_id'=>$pclassid))->field('pclass_name')->find();
    	$student=M('user')->where(array('pclass_id'=>$pclassid))->select();
        $this->assign('grade_id',$grade_id['grade_id']);
    	$this->assign('student',$student);
    	$this->assign('classname',$classname['pclass_name']);
    	$this->display();
    }
    public function stuchange(){
    	$user_id=I('get.user_id');
    	$classid=M('user')->where(array('user_id'=>$user_id))->field('pclass_id')->find();
    	$student=M('user')->where(array('user_id'=>$user_id))->find();
    	$classname=M('pclass')->where(array('pclass_id'=>$classid['pclass_id']))->find();
    	$gradename=M('grade')->where(array('grade_id'=>$classname['grade_id']))->find();
    	$classall=M('pclass')->where(array('grade_id'=>$classname['grade_id']))->select();
    	$student['grade_name']=$gradename['grade_name']."级";
    	$student['class_name']=$classname['pclass_name'];
    	//处理下拉框中的选项
    	$classa=array();
    	$i=0;
    	$n=1;
    	$classa[0]['pclass_id']=$classid['pclass_id'];
    	$classa[0]['pclass_name']=$classname['pclass_name'];
    	foreach ($classall as $key => $value) {
    		$i++;
    	}
    	for($j=0;$j<$i;$j++){
    		if($classall[$j]['pclass_id']==$classid['pclass_id']){
    			;
    		}else{
    			$classa[$n]=$classall[$j];
    			$n++;
    		}
    	}
    	$this->assign('classall',$classa);
    	$this->assign('student',$student);
    	$this->assign('classid',$classid['pclass_id']);
    	$this->display();
    }
    public function changestu(){
    	if(IS_POST){
    		// dump($_POST);
    		$user_id=I('post.user_id');
    		$class_id=I('post.demo');
    		$user_name=I('post.username');
            $us=M('user')->where(array('user_id'=>$user_id))->find();
    		$re=M('user')->where(array('user_id'=>$user_id))->save(array(
    			'pclass_id'=>$class_id,
    			'user_name'=>$user_name
    			));
            $m=new LogController();
            $time=date("Ymd",time());
            $ip= get_client_ip();
            $userid=$_SESSION['admin_id'];
            $usertype="系部管理员";
            $message="修改学生id=".$user_id." 信息成功,原学生姓名为".$us['user_name']."学生班级id=".$us['pclass_id'];
            $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    		$this->success("修改成功");
    	}else{
    		$this->error("你在作甚，你非法操作了，知道不！");
    	}
    }
    public function studel(){
    	$user_id=I('get.user_id');
        $us=M('user')->where(array('user_id'=>$user_id))->find();
    	$table=M('table')->where(array('user_id'=>$user_id))->delete();
    	$basetwograde=M('basetwograde')->where(array('user_id'=>$user_id))->delete();
    	$deveonelevelgrade=M('deveonelevelgrade')->where(array('user_id'=>$user_id))->delete();
    	$user=M('user')->where(array('user_id'=>$user_id))->delete();

        $m=new LogController();
        $time=date("Ymd",time());
        $ip= get_client_ip();
        $userid=$_SESSION['admin_id'];
        $usertype="系部管理员";
        $message="删除学生id=".$user_id." 信息成功,原信息为: 年级id=".$us['grade_id']." 班级id=".$us['pclass_id']." 学号=".$us['user_number']." 初始密码=".$us['user_pw'];
        $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    	$this->success("删除成功");
    }
    public function classaccount(){
    	if(IS_POST){
    		$classgroup_id=I('post.classgroup_id');
    		$password=I('post.password');
    		$accout=I('post.accout');
    		$class_id=I('post.class_id');
    		if($classgroup_id==0){
    			//新建
    			//组建字段
    			$add=array(
    				'classgroup_account'=>$accout,
    				'classgroup_password'=>$password,
    				'pclass_id'=>$class_id,
    				'sys_id'=>1
    				);
    			$re=M('classgroup')->add($add);
                 $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="增加班级id".$classgroup_id."的账号成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    			$this->success("保存成功");
    		}else{
    			$re=M('classgroup')->where(array('classgroup_id'=>$classgroup_id))->save(array(
    				'classgroup_account'=>$accout,
    				'classgroup_password'=>$password
    				));
                 $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="修改班级id".$classgroup_id."的账号成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
    			$this->success("保存成功");
    		}
    		return;
    	}
    	$class_id=I('get.class_id');
        $grade_id=M('pclass')->where(array('pclass_id'=>$class_id))->find();
    	$class_name=M('pclass')->where(array('pclass_id'=>$class_id))->field('pclass_name')->find();
    	$classgroup=M('classgroup')->where(array('pclass_id'=>$class_id))->find();
    	if($classgroup==null){
    		$classgroup['classgroup_account']="未设置";
    		$classgroup['classgroup_password']="未设置";
    		$classgroup['classgroup_id']=0;
    	}
        $this->assign('grade_id',$grade_id['grade_id']);
    	$this->assign('classgroup',$classgroup);
    	$this->assign('class_name',$class_name['pclass_name']);
    	$this->assign('class_id',$class_id);
    	$this->display();
    }
    public function querygradeexpect(){
        if(IS_POST){
            $grade_id=I('post.demo');
            redirect(U('BackgroundAdmin/Class/expect',array('grade_id'=>$grade_id)));
        }
        $admin_id=$_SESSION['admin_id'];
        $sys_id=M('admin')->where(array('admin_id'=>$admin_id))->find();
        $grade=M('grade')->where(array('sys_id'=>$sys_id['admin_sys']))->select();
        $this->assign('grade',$grade);
        $this->display();
    }
    public function expect(){
        $grade=I('get.grade_id');
        $grade_name=M('grade')->where(array('grade_id'=>$grade))->field('grade_name')->find();
        $this->assign('grade_name',$grade_name['grade_name']."年级");
        $pclassname=M('pclass')->where(array('grade_id'=>$grade))->select();
        $this->assign('pclassname',$pclassname);
        $this->display();
    }
    public function out(){
        // dump($_POST);
        // die;
        $class_id=I('post.demo');
        $nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->find();
        $schoolyear_id=$nowyear['schoolyear_id'];
        $table=M('table')->where(array('schoolyear_id'=>$schoolyear_id))->select();
        $grade=I('get.grade_id');
        $grade_name=M('grade')->where(array('grade_id'=>$grade))->find();
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        $i=0;
        $n=0;
        foreach ($table as $key => $value) {
            $i++;
        }
        $data=array();
        $m=0;
        foreach ($class_id as $key => $value) {
            $m++;
        }
        
        for($j=0;$j<$i;$j++){
            $number=M('user')->where(array('user_id'=>$table[$j]['user_id']))->find();
            for($z=0;$z<$m;$z++){
                if($number['pclass_id']==$class_id[$z]){
                    $data[$n]['user_number']=$number['user_number'];
		$user=M('user')->where(array('user_number'=>$number['user_number']))->find();
                    $data[$n]['user_name']=$user['user_name'];
                    $pclass_name=M('pclass')->where(array('pclass_id'=>$class_id[$z]))->find();
                    $data[$n]['class']=$pclass_name['pclass_name'];
                    $data[$n]['basescore']=$table[$j]['table_basescore'];
                    $data[$n]['devescore']=$table[$j]['table_devescore'];
                    $data[$n]['academicscore']=$table[$j]['table_academicscore'];
                    $data[$n]['passrate']=($table[$j]['table_passrate']).'%';
                    $data[$n]['average']=$table[$j]['table_average'];
                    $data[$n]['ranking']=$table[$j]['table_ranking'];
                    $data[$n]['totalscore']=$table[$j]['table_totalscore'];
                    $n++;
                }
            }
        }
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $filename=$grade_name['grade_name']."级";
        $headArr=array("学号","姓名","班级","基础性素质测评","发展性素质测评","平均学分绩点","通过率","学分加权平均分","成绩排名","综合测评总分");
        $this->getExcel($filename,$headArr,$data,$class_id);
    }

    private function getExcel($fileName,$headArr,$data,$class_id){
            //对数据进行检验
            if(empty($data) || !is_array($data)){
                die("该班级暂无可导出信息，请完成辅导员学生审核后再导出数据！");
            }
            //检查文件名
            if(empty($fileName)){
                exit;
            }

            $date = date("Y_m_d",time());
            $fileName .= "_{$date}.xls";

            //创建PHPExcel对象，注意，不能少了\
            $objPHPExcel = new \PHPExcel();
            $objProps = $objPHPExcel->getProperties();
            
            //设置表头
            $key = ord("A");
            foreach($headArr as $v){
                $colum = chr($key);
                $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
                $key += 1;
            }
            
            $column = 2;
            $objActSheet = $objPHPExcel->getActiveSheet();
            foreach($data as $key => $rows){ //行写入
                $span = ord("A");
                foreach($rows as $keyName=>$value){// 列写入
                    $j = chr($span);
                    $objActSheet->setCellValue($j.$column, $value);
                    $span++;
                }
                $column++;
        }
            ob_clean();
            $filename = iconv('utf-8',"utf-8",$filename);
            //重命名表
            // $objPHPExcel->getActiveSheet()->setTitle('test');
            //设置活动单指数到第一个表,所以Excel打开这是第一个表
            $objPHPExcel->setActiveSheetIndex(0);
             header ( 'Content-Type: application/vnd.ms-excel;charset=utf-8' );
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

             $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="导出班级id=".$class_id."的评测结果execl成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
            $objWriter->save('php://output'); //文件通过浏览器下载
            exit;
        }
    public function inputtable(){
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Reader.Excel5");
       
        $PHPExcel = new \PHPExcel();
        if (! empty ( $_FILES ['file_stu'] ['name'] )){
           $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
           $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
           $file_type = $file_types [count ( $file_types ) - 1];
           if (strtolower ( $file_type ) != "xlsx"){
                $this->error ( '不是后缀为.xlsx文件，重新上传');
           }
           /*设置上传路径*/
            $savePath = './Public/';
           /*以时间来命名上传的文件*/
            $str = time ( 'Ymdhis' ); 
            $file_name = $str . "." . $file_type;
            if (! copy ( $tmp_file, $savePath . $file_name )){
                 $this->error ('上传失败');
            }
          // $res = $this->read ( $savePath . $file_name );
          import("Org.Util.PHPExcel");
        //要导入的xls文件，位于根目录下的Public文件夹
        // dump($file_name);文件名
        $filename=$savePath.$file_name;//路径加文件名
        //创建PHPExcel对象，注意，不能少了\ 
        $PHPExcel=new \PHPExcel();

        //如果excel文件后缀名为.xls，导入这个类
        import("Org.Util.PHPExcel.Reader.Excel2007");
        $PHPReader=new \PHPExcel_Reader_Excel2007();
        //如果excel文件后缀名为.xlsx，导入这下类
        // import("Org.Util.PHPExcel.Reader.Excel5");
        // $PHPReader=new \PHPExcel_Reader_Excel5();
        //载入文件
        $PHPExcel=$PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            }
        
        }
            // $classid=I('post.demo');
            $i=0;
            foreach ($arr as $key => $value) {
                $i++;
            }
            $suc="";
            $nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->find();
            $grade=I('post.grade_id');
            dump($grade_id);
            for($j=2;$j<=$i;$j++){
                $ua['user_number']=$arr[$j]['A'];
                $ua['table_passrate']=$arr[$j]['B'];
                $ua['table_average']=$arr[$j]['C'];
                $ua['table_ranking']=$arr[$j]['D'];
                $ua['table_academicscore']=$arr[$j]['E'];
                $n=M('user')->where(array('user_number'=>$arr[$j]['A']))->find();

                if($n==null){//该同学不存在，有问题。
                    $suc.=$arr[$j]['A']."信息导入失败。原因：该学号并不存在，请先将该用户导入</br>";
                }else if($n['grade_id']!=$grade){
                     $suc.=$arr[$j]['A']."信息导入失败。原因：该学生并不属于当前年级</br>";
                }else{//该同学存在，没问题。
                    $ta=M('table')->where(array('user_id'=>$n['user_id'],'schoolyear_id'=>$nowyear['schoolyear_id']))->find();
                    $ua['schoolyear_id']=$nowyear['schoolyear_id'];
                    $ua['user_id']=$n['user_id'];
                    if($ta==null){//table不存在
                        $re=M('table')->add($ua);
                    }else{//table存在
                        $ua['table_totalscore']=($ta['table_basescore']+$ta['table_devescore'])*0.15+$arr[$j]['C']*0.85;
                        $re=M('table')->where(array('table_id'=>$ta['table_id']))->save($ua);
                    }
                    $suc.=$arr[$j]['A']."信息导入成功</br>";
                    }
            }
            $classname=M('pclass')->where(array('pclass_id'=>$classid))->field('pclass_name')->find();
            echo $suc;
             $m=new LogController();
                $time=date("Ymd",time());
                $ip= get_client_ip();
                $userid=$_SESSION['admin_id'];
                $usertype="系部管理员";
                $message="导入评测的学生评测信息成功";
                $re=$m->writelog($ip,$userid,$usertype,$time,$message);
            $this->success($classname['pclass_name']."学生评测信息完成导入",'',10);
        }else{
            $this->error("没有上传文件，请重新选择文件上传");
        }
    }
    public function querygradeinput(){
        if(IS_POST){
            $grade_id=I('post.demo');
            redirect(U('BackgroundAdmin/Class/input',array('grade_id'=>$grade_id)));
        }
        $admin_id=$_SESSION['admin_id'];
        $sys_id=M('admin')->where(array('admin_id'=>$admin_id))->find();
        $grade=M('grade')->where(array('sys_id'=>$sys_id['admin_sys']))->select();
        $this->assign('grade',$grade);
        $this->display();
    }
     public function input(){
        if(IS_GET){
            $grade_id=I('get.grade_id');
            $grade_name=M('grade')->where(array('grade_id'=>$grade_id))->field('grade_name')->find();
            $this->assign('grade_name',$grade_name['grade_name']."年级");
            $this->assign('grade_id',$grade_id);
            $this->display();
            return;
        }
     }
}