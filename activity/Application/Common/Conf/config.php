<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'127.0.0.1', //服务器地址
	'DB_NAME'=>'activity', //数据库名称
	'DB_USER'=>'admin', //数据库用户名
	'DB_PWD'=>'abcd1234', //数据库密码
	'DB_PORT'=>3306, //端口号
	'DB_PARAMS'=>array(),//数据库参数
	'DB_CHARSET'=>'utf8mb4', //数据库字符集
	'DB_DEBUG'=>TRUE,//数据库允许debug
    'MODULE_ALLOW_LIST'    =>    array('Home'), //允许访问的模块
    'DEFAULT_MODULE'       =>    'Home', //默认模块
    'DEFAULT_CONTROLLER' => 'Index', // 默认控制器名称

);