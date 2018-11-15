<?php
namespace Home\Controller;
use Think\Controller;
class QueryController extends CommonController {
    public function query(){
    	$user_id=$_SESSION['user_id'];
    	$nowyear=M('schoolyear')->where(array('schoolyear_nowyear'=>1))->find();
        $base1=M('basetwograde')->where(array(
            'user_id'=>$user_id,
            'schoolyear_id'=>$nowyear['schoolyear_id']
            ))->select();
        $deve1=M('deveonelevelgrade')->where(array(
            'user_id'=>$user_id,
            'schoolyear_id'=>$nowyear['schoolyear_id']
            ))->select();

        $basearry=M('basetwograde')->where(array(
            'user_id'=>$user_id,
            'schoolyear_id'=>$nowyear['schoolyear_id']
            ))->select();
        $devearray=M('deveonelevelgrade')->where(array(
            'user_id'=>$user_id,
            'schoolyear_id'=>$nowyear['schoolyear_id']
            ))->select();
        $i=0;
        $i1=0;
        //2维转1维
        foreach ($devearray as $value) {
           $i++;
        } 
        $i1=$i;
        $parray=array();
        $parray1=array();
        $deveid=array();
        for($j=0;$j<$i;$j++){
            $parray[$j]=explode(",",$devearray[$j]['deveonelevelgrade_url']);
            $deveid[$j]['deveonelevelgrade_id']=$devearray[$j]['deveonelevelindex_id'];
        }
        for($j=0;$j<$i1;$j++){
            $parray1[$j]=explode(",",$devearray[$j]['deveonelevelgrade_reason']);
        }
        $py=array();
        $i=0;
        $i1=0;
        $j=0;
        foreach ($parray as $key => $value) {
                foreach ($value as $ky => $ve) {
               		if($ve!=""){
               			$py[$i]['deveid']=$deveid[$j]['deveonelevelgrade_id'];
               			$py[$i]['url']=$ve; 
                   		$i++;
               		}
               }
               $j++;
           }   
       foreach ($parray1 as $key => $value) {
           foreach ($value as $ky => $ve) {
           		if($ve!=""){
           			$py[$i1]['reason']=$ve;
               		$i1++;
           		}
           }
       }   
       // dump($base1);
       $basenums=2+M('basetwolevelindex')->count();
    	$base=M('basetwolevelindex')->select();
    	$devenums=1+M('deveonelevelindex')->count();
    	$deve=M('deveonelevelindex')->select();
    	$this->assign('py',$py);
    	$this->assign('base',$base);
    	$this->assign('base1',$base1);
    	$this->assign('deve',$deve);
    	$this->assign('deve1',$deve1);
    	$this->assign('dnum',$devenums);
    	$this->assign('num',$basenums);
    	$user_name=$_SESSION['user_name'];
	    $this->assign('user_name',$user_name);
    	$this->display();
   }
}