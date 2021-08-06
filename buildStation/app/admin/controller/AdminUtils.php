<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminUtilsValidate;
use app\common\service\AdminUtilsService;
use hg\apidoc\annotation as Apidoc;

class AdminUtils
{
    /**
       随机字符串
     */
    public function strrand()
    {
        $param['strrand_ids'] = Request::param('ids/a', [1, 2, 3]);
        $param['strrand_len'] = Request::param('len/d', 12);

        validate(AdminUtilsValidate::class)->scene('strrand')->check($param);

        $data = AdminUtilsService::strrand($param);

        return success($data);
    }

    /**
     * 字符串转换
     */
    public function strtran()
    {
        $str = Request::param('str/s', '');

        $data = AdminUtilsService::strtran($str);

        return success($data);
    }

    /**
     * 时间戳转换
     */
    public function timestamp()
    {
        $param['type']  = Request::param('type', '');
        $param['value'] = Request::param('value', '');

        $data = AdminUtilsService::timestamp($param);

        return success($data);
    }

    /**
     * 字节转换
     */
    public function bytetran()
    {
        $param['type']  = Request::param('type', 'B');
        $param['value'] = Request::param('value', 1024);

        $data = AdminUtilsService::bytetran($param);

        return success($data);
    }

    /**
     * IP信息
     */
    public function ipinfo()
    {
        $ip = Request::param('ip/s', '');

        if (empty($ip)) {
            $ip = Request::ip();
        }

        $data = AdminUtilsService::ipinfo($ip);

        return success($data);
    }

    /**
     * 服务器信息
     */
    public function server()
    {
        $data = AdminUtilsService::server();

        return success($data);
    }
}
