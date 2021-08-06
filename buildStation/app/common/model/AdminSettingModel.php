<?php

namespace app\common\model;

use think\Model;
use hg\apidoc\annotation\Field;

class AdminSettingModel extends Model
{
    protected $name = 'admin_setting';

    /**
     * @Field("token_name,token_key,token_exp")
     */
    public function tokenInfo()
    {
    }

    /**
     * @Field("captcha_switch")
     */
    public function captchaInfo()
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
