<?php
return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',        // 数据库类型
    'DB_HOST'               =>  '127.0.0.1',    // 服务器地址
    'DB_NAME'               =>  'learn',        // 数据库名
    'DB_USER'               =>  'root',         // 用户名
    'DB_PWD'                =>  'root',         // 密码
    'DB_PORT'               =>  '3306',         // 端口
    'DB_PREFIX'             =>  'le_',          // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',         // 数据库编码默认采用utf8
    
    /* URL设置 */
    'URL_HTML_SUFFIX'       =>  '',  // URL伪静态后缀设置
    'URL_CASE_INSENSITIVE'  =>  true,// URL不区分大小写 linux
    /* 调试信息 */
    //'SHOW_PAGE_TRACE'       =>  true,
    
    
    /* 系统配置文件 */
    'LOAD_EXT_CONFIG'       =>  'verify',
    
    
    /* rewrite */
    'URL_MODEL'             =>  2,
    
    /* 路由配置 */
    'URL_ROUTER_ON'   => true, //开启路由
    'URL_ROUTE_RULES' => array(
        'add'   =>  'Article/add',
    ),
);