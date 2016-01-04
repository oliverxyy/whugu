<?php
return array(
    'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
    'DEFAULT_GROUP'  => 'Home', //默认分组
    'MODULE_ALLOW_LIST' => array('Home','Admin'),
    'URL_MODEL' => 2,//开启rewrite模式
    'URL_ROUTER_ON' => true,//开启路由配置
    'URL_HTML_SUFFIX' => 'html',//配置默认后缀
    //"ERROR_PAGE" => '/404.html',
    /*'DB_CONFIG1' => array(//配置数据库连接
        'db_type' => 'mysql',
        'db_user' => 'root',
        'db_pwd' => 'admin',
        'db_host' => 'localhost',
        'db_port' => '3306',
        'db_name' => 'whu'
    ),*/
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'whugu',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'admin',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号

    //常量配置
    'SLIDER_PATH' => '/guwhu/Public/static/img/slider/',
    'SLIDER_PIC_PREFIX' => 'p',
    'PROJECT_PATH' => '/guwhu/',
);