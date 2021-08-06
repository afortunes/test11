<?php

namespace app\common\model;

use think\Model;
use hg\apidoc\annotation\Field;

class MemberLogModel extends Model
{
    protected $name = 'Member_log';

    /**
     * @Field("member_log_id")
     */
    public function id()
    {
    }

    /**
     * @Field("member_log_id,member_id,api_id,request_method,request_ip,request_region,request_isp,response_code,response_msg,create_time")
     */
    public function list()
    {
    }

    /**
     * 
     */
    public function info()
    {
    }

    /**
     * @Field("member_log_id")
     */
    public function dele()
    {
    }

    /**
     * @Field("log_type")
     */
    public function log()
    {
    }
}
