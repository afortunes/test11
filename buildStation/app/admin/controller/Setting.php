<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\SettingValidate;
use app\common\service\SettingService;
use hg\apidoc\annotation as Apidoc;

class Setting extends Base
{
    /**
     * Token设置信息
     */
    public function tokenInfo()
    {
        $data = SettingService::tokenInfo();

        return success($data);
    }

    /**
     * Token设置修改
     */
    public function tokenEdit()
    {
        $param['token_name'] = Request::param('token_name/s', '');
        $param['token_key']  = Request::param('token_key/s', '');
        $param['token_exp']  = Request::param('token_exp/d', 720);

        validate(SettingValidate::class)->scene('token_edit')->check($param);

        $data = SettingService::tokenEdit($param);

        return success($data);
    }

    /**
     * 验证码设置信息
     */
    public function captchaInfo()
    {
        $data = SettingService::captchaInfo();

        return success($data);
    }

    /**
     * 验证码设置修改
     */
    public function captchaEdit()
    {
        $param['captcha_register'] = Request::param('captcha_register/d', 0);
        $param['captcha_login']    = Request::param('captcha_login/d', 0);

        validate(SettingValidate::class)->scene('captcha_edit')->check($param);

        $data = SettingService::captchaEdit($param);

        return success($data);
    }

    /**
     * 日志设置信息
     */
    public function logInfo()
    {
        $data = SettingService::logInfo();

        return success($data);
    }

    /**
     * 日志设置修改
     */
    public function logEdit()
    {
        $param['log_switch'] = Request::param('log_switch/d', 0);

        validate(SettingValidate::class)->scene('log_edit')->check($param);

        $data = SettingService::logEdit($param);

        return success($data);
    }

    /**
     * API设置信息
     * )
     */
    public function apiInfo()
    {
        $data = SettingService::apiInfo();

        return success($data);
    }

    /**
     * API设置修改
     */
    public function apiEdit()
    {
        $param['api_rate_num']  = Request::param('api_rate_num/d', 3);
        $param['api_rate_time'] = Request::param('api_rate_time/d', 1);

        validate(SettingValidate::class)->scene('api_edit')->check($param);

        $data = SettingService::apiEdit($param);

        return success($data);
    }
}
