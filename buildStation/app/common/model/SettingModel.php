<?php

namespace app\common\model;

use think\Model;
use hg\apidoc\annotation\Field;

class SettingModel extends Model
{
    protected $name = 'setting';

    /**
     * @Field("token_name,token_key,token_exp")
     */
    public function tokenInfo()
    {
    }

    /**
     * @Field("captcha_register,captcha_login")
     */
    public function captchaInfo()
    {
    }

    /**
     * @Field("captcha_register")
     */
    public function captchaRegister()
    {
    }

    /**
     * @Field("captcha_login")
     */
    public function captchaLogin()
    {
    }

    /**
     * @Field("log_switch")
     */
    public function logInfo()
    {
    }

    /**
     * @Field("api_rate_num,api_rate_time")
     */
    public function apiInfo()
    {
    }
}
