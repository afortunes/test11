<?php
// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    // 调试模式
    'app_debug'        => env('app.debug', false),
    // 应用地址
    'app_host'         => env('app.host', ''),
    // 应用Trace调试
    'app_trace'        => env('app.trace', false),
    // 应用的命名空间
    'app_namespace'    => '',
    // 是否启用路由
    'with_route'       => true,
    // 是否启用事件
    'with_event'       => true,
    // 默认应用
    'default_app'      => 'index',
    // 默认时区
    'default_timezone' => env('app.default_timezone', 'Asia/Shanghai'),

    // 应用映射（自动多应用模式有效）
    'app_map'          => [],
    // 域名绑定（自动多应用模式有效）
    'domain_bind'      => [],
    // 禁止URL访问的应用列表（自动多应用模式有效）
    'deny_app_list'    => ['common'],

    // 异常页面的模板文件
    'exception_tmpl'   => app()->getThinkPath() . 'tpl/think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'    => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'   => false,


//    // 默认模块名
//    'default_module'         => '',
//    // 禁止访问模块
//    'deny_module_list'       => ['common'],
//    // 默认控制器名
//    'default_controller'     => '',
//    // 默认操作名
//    'default_action'         => '',
//    // 默认验证器
//    'default_validate'       => '',
//    // 默认的空控制器名
//    'empty_controller'       => 'Error',
//    // 操作方法后缀
//    'action_suffix'          => '',
//    // 自动搜索控制器
//    'controller_auto_search' => true,
    'url_convert'            => false,
//    'auto_multi_app' => true,
//    // 是否开启路由缓存
//    'route_check_cache'      => false,
];
