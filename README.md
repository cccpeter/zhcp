##evaluation_system  
##1、数据表导入的excel格式：/zhcp/Public/学生导入数据表头.xls和/zhcp/Public/教务成绩导入表.xls  
##2、存在的问题  
* 1)tp3.2.3框架自带的验证码偶尔会报错  
* 2)4种用户身份对应独立了四张表来做用户权限，最好合并一张表然后统一一个登录和权限控制器（量较大）  
* 3)后台的内容frame在大屏幕下会出现问题  
* 4)前台的代码凑合着看  
* 5)需求问题，老师在审核完一个学生后能直接点入下个学生审核   
  
3、框架Apache2 thinkphp3.2.3 php5.6 ubuntu14.04 mysql5.5或者5.6（不建议升级php7，tp3.2不能完美兼容php7，另外tp5需要重新码代码）  
  
4、部署问题  
* 1）Apache中的httpd.conf需要对上传的文件大小进行调整，LimitRequestBody参数自定  
* 2）php中的php.ini需要对上传文件、申请内存大小、以及http连接时间进行调整，upload_max_filesize memory_limit post_max_size max_execution_time  max_input_time 等参数的设置  
* 3）/zhcp/Public /zhcp/Admin/Runtime /zhcp/Home/Runtime /zhcp/logs需要给足权限  
* 4)  需要禁止Apache列出项目目录或者修改www目录下面的.htaccess 加入<Files *>Options -Indexes</Files>  
	  
5、文件夹解释  
* 1)/zhcp/public项目公共文件、包括用户上传的文件  
* 2)/zhcp/Admin/BackgroundAdmin管理员的代码目录  
* 3)/zhcp/Admin/Home辅导员的代码  
* 4)/zhcp/Application/BackgroundAdmin班级测评小组的代码  
* 5)/zhcp/Application/Home学生的代码  
* 6)/zhcp/logs系统的日志  
  
6、项目的地址  
* 代码库：git@github.com:cccpeter/zhcp.git  
* 连接：https://github.com/cccpeter/zhcp  
  
7、数据库见github上面  
	
