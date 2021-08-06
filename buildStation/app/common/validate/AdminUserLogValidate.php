<?php

namespace app\common\validate;

use think\Validate;

class AdminUserLogValidate extends Validate
{
    // 验证规则
    protected $rule = [
        'admin_user_log_id' => ['require'],
    ];

    // 错误信息
    protected $message = [
        'admin_user_log_id.require' => '缺少参数：日志id',
    ];

    // 验证场景
    protected $scene = [
        'id'   => ['admin_user_log_id'],
        'info' => ['admin_user_log_id'],
        'dele' => ['admin_user_log_id'],
    ];
}
