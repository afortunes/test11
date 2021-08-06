<?php


namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminSettingValidate;
use app\common\service\AdminSettingService;
use hg\apidoc\annotation as Apidoc;

class AdminSetting extends Base
{
    /**
     * 缓存设置信息
     */
    public function cacheInfo()
    {
        $data = AdminSettingService::cacheInfo();

        return success($data);
    }

    /**
     * 缓存设置清除
     */
    public function cacheClear()
    {
        $data = AdminSettingService::cacheClear();

        return success($data);
    }

    /**
     * Token设置信息
     */
    public function tokenInfo()
    {
        $data = AdminSettingService::tokenInfo();

        return success($data);
    }

    /**
     * Token设置修改
     */
    public function tokenEdit()
    {
        $param['token_name'] = Request::param('token_name/s', '');
        $param['token_key']  = Request::param('token_key/s', '');
        $param['token_exp']  = Request::param('token_exp', 2);

//        validate(AdminSettingValidate::class)->scene('token_edit')->check($param);

        $data = AdminSettingService::tokenEdit($param);

        return success($data);
    }

    /**
     * 验证码设置信息
     */
    public function captchaInfo()
    {
        $data = AdminSettingService::captchaInfo();

        return success($data);
    }

    /**
     * 验证码设置修改
     */
    public function captchaEdit()
    {
        $param['captcha_switch'] = Request::param('captcha_switch/d', 0);

        validate(AdminSettingValidate::class)->scene('captcha_edit')->check($param);

        $data = AdminSettingService::captchaEdit($param);

        return success($data);
    }

    /**
     * 日志设置信息
     */
    public function logInfo()
    {
        $data = AdminSettingService::logInfo();

        return success($data);
    }

    /**
     * 日志设置修改
     */
    public function logEdit()
    {
        $param['log_switch'] = Request::param('log_switch/d', 0);

        validate(AdminSettingValidate::class)->scene('log_edit')->check($param);

        $data = AdminSettingService::logEdit($param);

        return success($data);
    }

    /**
     * API设置信息
     */
    public function apiInfo()
    {
        $data = AdminSettingService::apiInfo();

        return success($data);
    }

    /**
     * API设置修改
     */
    public function apiEdit()
    {
        $param['api_rate_num']  = Request::param('api_rate_num/d', 3);
        $param['api_rate_time'] = Request::param('api_rate_time/d', 1);

        validate(AdminSettingValidate::class)->scene('api_edit')->check($param);

        $data = AdminSettingService::apiEdit($param);

        return success($data);
    }
}
