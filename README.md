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