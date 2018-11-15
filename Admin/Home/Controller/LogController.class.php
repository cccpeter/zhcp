<?php
namespace Home\Controller;
use Think\Controller;
/*
    1、登录控制器
    2、输入管理员账号account和密码password
    3、输出：1表示登录成功，-1表示登录失败
    4、将登录成功的管理员的id、昵称、权限写入session
 */
class LogController extends Controller {
   /**
     *日志记录，按照"Ymd.log"生成当天日志文件
     * 日志路径为：入口文件所在目录/logs/$type/当天日期.log.php，例如 /logs/error/20120105.log.php
     * @param string $type 日志类型，对应logs目录下的子文件夹名
     * @param string $content 日志内容
     * @return bool true/false 写入成功则返回true
     */
    public function writelog($ip="",$userid="",$usertype="",$type="",$content=""){
        if(!$content || !$type){
            return FALSE;
        }    
        $dir=getcwd().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.$type;
        if(!is_dir($dir)){ 
            if(!mkdir($dir)){
                return false;
            }
        }
        $filename=$dir.DIRECTORY_SEPARATOR.date("Ymd",time()).'.log.txt';   
        // $logs=include $filename;
        // if($logs && !is_array($logs)){
        //     unlink($filename);
        //     return false;
        // }
        $logs="ip:".$ip."   userid:".$userid."   usertype:".$usertype."   时间:".date("Y-m-d H:i:s")."   操作内容:".$content."\r\n";
        $str=$logs;
        if(!$fp=fopen($filename,"a")){
            return false;
        }           
        if(!fwrite($fp, $str))
            return false;
        fclose($fp);
        return true;
    }
}
