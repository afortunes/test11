<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminUserValidate;
use app\common\service\AdminLoginService;
use app\common\service\AdminSettingService;
use app\common\utils\CaptchaUtils;
use hg\apidoc\annotation as Apidoc;


class AdminLogin extends Base
{
    /**
     * @api {get} admin/AdminLogin/captcha 获取验证码
     * @apiGroup AdminLogin
     * @apiName admin/AdminLogin/captcha
     * @apiDescription 获取分类列表
     *
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "captcha_switch": true,
    "captcha_id": "captcha60f91864a2567",
    "captcha_src": "data:image/png;base64,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"
    }
    }
     *
     */
    public function captcha()
    {

        $con = mysqli_connect("208.109.16.245","processtomato","gel@lg190319",'processtomato');
        var_dump($con);exit;
        $setting = AdminSettingService::captchaInfo();
        if ($setting['captcha_switch']) {
            $data = CaptchaUtils::create();
        } else {
            $data['captcha_switch'] = $setting['captcha_switch'];
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminLogin/login 登录
     * @apiGroup AdminLogin
     * @apiName admin/AdminLogin/login
     * @apiDescription 登录
     *
     * @apiParam {string}  username 用户名
     * @apiParam {string}  password 密码
     * @apiParam {string}  captcha_id 验证码id(获取验证码接口的返回值)
     * @apiParam {string}  captcha_code 验证码
     *
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "登录成功",
    "data": {
    "admin_user_id": 5,
    "admin_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjY5Mzg1NTYsIm5iZiI6MTYyNjkzODU1NiwiZXhwIjoxNjI2OTgxNzU2LCJkYXRhIjp7ImFkbWluX3VzZXJfaWQiOjUsImxvZ2luX3RpbWUiOiIyMDIxLTA3LTIyIDE1OjIyOjM2IiwibG9naW5faXAiOiIxOTIuMTY4LjE3Ny4xNzEifX0.ikPJAIAHWxaujTUPiY5xD_Os2T4VdvNblU9MgewnoQ8"
    }
    }
     *
     */
    public function login()
    {
        $param['username']     = Request::param('username/s', '');
        $param['password']     = Request::param('password/s', '');
        $param['captcha_id']   = Request::param('captcha_id/s', '');
        $param['captcha_code'] = Request::param('captcha_code/s', '');

//        $mima = password_hash($param['password'],PASSWORD_DEFAULT);
//        if (password_verify($param['password'], $mima)) {
//
//        } else {
//        }

        validate(AdminUserValidate::class)->scene('login')->check($param);

        $setting = AdminSettingService::captchaInfo();
        if ($setting['captcha_switch']) {
            if (empty($param['captcha_code'])) {
                exception('请输入验证码');
            }
            $check = CaptchaUtils::check($param['captcha_id'], $param['captcha_code']);
            if (empty($check)) {
                exception('验证码错误');
            }
        }
        
        $data = AdminLoginService::login($param);

        return success($data, '登录成功');
    }

    /**
     * @api {post} admin/AdminLogin/logout 退出登录
     * @apiGroup AdminLogin
     * @apiName admin/AdminLogin/logout
     * @apiDescription 退出登录
     *
     *
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "退出成功",
    "data": {
    "logout_time": "2021-07-22 15:25:33",
    "admin_user_id": 5
    }
    }
     *
     */
    public function logout()
    {
        $param['admin_user_id'] = admin_user_id();

        validate(AdminUserValidate::class)->scene('id')->check($param);

        $data = AdminLoginService::logout($param['admin_user_id']);

        return success($data, '退出成功');
    }
}
