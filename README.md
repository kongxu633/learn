## 简介

Nginx 1.6.2
Php 5.5.7n
ThinkPHP 3.2.3

数组统一用方括号表示

学习开发博客项目 建立通用后台

config.php

return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',        // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'learn',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'le_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    /* URL设置 */
    'URL_HTML_SUFFIX'       =>  '',  // URL伪静态后缀设置
    /* 调试信息 */
    // 'SHOW_PAGE_TRACE'       =>  true,
);

function.php

function p($array){
    dump($array,1,'<pre>',0);
}



#知识点
http://www.thinkphp.cn/code/367.html
http://www.52codes.net/article/881.html

_initialize() 为thinkphp封装的函数,__construct 为PHP的构造函数，_initialize就是为了避免我们频繁调用 parent::__construct();

换句话说：调用之类_initialize()的同时也会调用父类的构造函数 __construct() ,但是不能调用父类的_initialize

如果想调用父类的_initialize()，则还是需要在之类的_initialize里面加上 parent::_initialize()

__construct为PHP类的构造函数,调用子类的构造函数会覆盖父类的构造函数。同时调用则还是需要调用 parent::__construct();




#知识点
http://www.thinkphp.cn/code/472.html

3.2版本加入了命名空间，import的用法也有所影响，给大家一个例子。
先定义一个自定义类（存放路径为Application\Common\ORG\Util\MyClass.class.php），代码如下：
用法1：
<?php
 // 没有声明命名空间
 class MyClass
 {
    //
 }
 ?>
 使用import导入类，代码如下：
 <?php
 namespace Home\Controller;
 use Think\Controller;
 class IndexController extends Controller
 {
    public function index(){
        import('Common/ORG/Util/MyClass');
        $MyClass    = new \MyClass();
        dump($MyClass);
    }
 }
 ?>
 用法2：
 <?php
 // 声明命名空间
 namespace Common\ORG\Util;
 class MyClass
 {
    //
 }
 ?>
 利用命名空间直接导入，代码如下：
 <?php
 namespace Home\Controller;
 use Think\Controller;
 class IndexController extends Controller
 {
    public function index(){
        $MyClass    = new \Common\ORG\Util\MyClass();
        dump($MyClass);
    }
 }
 ?>
 或者
 <?php
 namespace Home\Controller;
 use Think\Controller;
 use Common\ORG\Util\MyClass;
 class IndexController extends Controller
 {
    public function index(){
        $MyClass    = new MyClass();
        dump($MyClass);
    }
 }
 ?>
 
 
#知识点
 
关联模型

#想到的

删除分类时，删除子分类
直接添加二级分类
管理员所有内页认证 门面？
提交token 防止重复刷新
利用concat解决递归
编辑文章时属性怎么样在模板中体现
文章关联模型怎么样在公共文件夹中放置
数据分页处理

193.134.255.114|208.65.155.24|149.126.86.26|86.127.118.172|62.197.198.241|193.90.147.89|103.25.178.59|83.94.121.187|41.201.164.20|163.28.116.53|81.175.29.185|220.255.5.231|216.58.212.186|118.143.88.96|91.213.30.157|77.42.249.20|193.90.147.88|116.92.194.176|118.143.88.102|220.255.6.152|95.143.84.165|216.58.197.89|216.58.194.87|220.255.6.55|149.126.86.48|149.3.177.89|193.134.255.88|85.182.250.35|212.188.7.162|195.249.20.245|194.78.99.82|173.194.215.125|208.117.227.186|85.182.250.29|85.182.250.153|208.117.227.18|212.188.7.158|173.194.198.199|83.94.121.162|212.188.10.212|202.86.162.172|41.206.96.134|210.153.73.119|209.85.235.98|172.217.25.206|212.188.7.54|212.188.10.240|220.255.5.178|193.134.255.39|216.21.170.50|216.21.170.35|64.233.181.125|197.199.253.24|216.58.194.119|216.58.221.115|212.188.7.94|212.188.10.208|216.58.197.245|85.182.250.50|212.188.10.219|172.217.2.3|173.194.195.93|173.194.65.125|85.182.250.99|64.233.166.190|173.194.66.196|64.15.113.184|64.233.160.125|216.58.221.29|216.58.223.46|64.233.183.125|64.233.167.125|220.255.6.113|64.233.179.125|216.58.200.221|173.194.194.125|216.58.197.28|216.58.192.187|64.233.179.113|216.58.217.254|216.58.195.214|216.58.197.157|64.233.169.125|74.125.30.118|74.125.22.125|209.85.234.195|64.233.176.125|216.58.217.185|64.233.171.125|216.58.193.195|173.194.70.125|77.42.253.42|216.58.214.253|172.217.25.187|220.255.6.54|216.58.214.57|216.58.222.96|216.58.218.250|172.217.5.21|216.58.194.46