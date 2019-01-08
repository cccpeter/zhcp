# evaluation_system  
### 1、数据表导入的excel格式：/zhcp/Public/学生导入数据表头.xls和/zhcp/Public/教务成绩导入表.xls  

### 2、框架Apache2 thinkphp3.2.3 php5.6 ubuntu14.04 mysql5.5或者5.6  
  
### 3、部署问题  
* 1）Apache中的httpd.conf需要对上传的文件大小进行调整，LimitRequestBody参数自定  
* 2）php中的php.ini需要对上传文件、申请内存大小、以及http连接时间进行调整，upload_max_filesize memory_limit post_max_size max_execution_time  max_input_time 等参数的设置  
* 3）/zhcp/Public /zhcp/Admin/Runtime /zhcp/Home/Runtime /zhcp/logs需要给足权限  
* 4)  需要禁止Apache列出项目目录或者修改www目录下面的.htaccess 加入<Files *>Options -Indexes</Files>  

 
