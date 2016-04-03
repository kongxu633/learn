## 简介

Nginx 1.6.2
Php 5.5.7n
ThinkPHP 3.2.3

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

