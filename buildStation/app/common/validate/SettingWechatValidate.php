<?php

namespace app\common\validate;

use think\Validate;

class SettingWechatValidate extends Validate
{
    // 验证规则
    protected $rule = [
        'appid'     => ['require'],
        'appsecret' => ['require'],
        'qrcode'    => ['require', 'file', 'image', 'fileExt' => 'jpg,png,jpeg', 'fileSize' => '204800'],
    ];

    // 错误信息
    protected $message = [
        'appid.require'     => '请输入AppID',
        'appsecret.require' => '请输入AppSecret',
        'qrcode.require'    => '请选择图片',
        'qrcode.file'       => '请选择文件',
        'qrcode.image'      => '请选择图片格式文件',
        'qrcode.fileExt'    => '请选择jpg、png、jpeg格式图片',
        'qrcode.fileSize'   => '请选择小于200kb的图片',
    ];

    // 验证场景
    protected $scene = [
        'offiEdit' => ['appid', 'appsecret'],
        'miniEdit' => ['appid', 'appsecret'],
        'qrcode'   => ['qrcode'],
    ];
}
