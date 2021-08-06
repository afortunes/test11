<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\ApiValidate;
use app\common\service\ApiService;
use hg\apidoc\annotation as Apidoc;

class Api
{
    /**
     * 接口列表
     */
    public function list()
    {
        $data = ApiService::list();

        return success($data);
    }

    /**
     * 接口信息
     */
    public function info()
    {
        $param['api_id'] = Request::param('api_id/d', '');

        validate(ApiValidate::class)->scene('info')->check($param);

        $data = ApiService::info($param['api_id']);

        if ($data['is_delete'] == 1) {
            exception('接口已被删除：' . $param['api_id']);
        }

        return success($data);
    }

    /**
     * 接口添加
     */
    public function add()
    {
        $param['api_pid']  = Request::param('api_pid/d', 0);
        $param['api_name'] = Request::param('api_name/s', '');
        $param['api_url']  = Request::param('api_url/s', '');
        $param['api_sort'] = Request::param('api_sort/d', 200);

        validate(ApiValidate::class)->scene('add')->check($param);

        $data = ApiService::add($param);

        return success($data);
    }

    /**
     * 接口修改
     */
    public function edit()
    {
        $param['api_id']   = Request::param('api_id/d', '');
        $param['api_pid']  = Request::param('api_pid/d', 0);
        $param['api_name'] = Request::param('api_name/s', '');
        $param['api_url']  = Request::param('api_url/s', '');
        $param['api_sort'] = Request::param('api_sort/d', 200);

        validate(ApiValidate::class)->scene('edit')->check($param);

        $data = ApiService::edit($param);

        return success($data);
    }

    /**
     * 接口删除
     */
    public function dele()
    {
        $param['api_id'] = Request::param('api_id/d', '');

        validate(ApiValidate::class)->scene('dele')->check($param);

        $data = ApiService::dele($param['api_id']);

        return success($data);
    }

    /**
     * 接口是否禁用
     */
    public function disable()
    {
        $param['api_id']     = Request::param('api_id/d', '');
        $param['is_disable'] = Request::param('is_disable/d', 0);

        validate(ApiValidate::class)->scene('disable')->check($param);

        $data = ApiService::disable($param);

        return success($data);
    }

    /**
     * 接口是否无需登录
     */
    public function unlogin()
    {
        $param['api_id']    = Request::param('api_id/d', '');
        $param['is_unlogin'] = Request::param('is_unlogin/d', 0);

        validate(ApiValidate::class)->scene('unlogin')->check($param);

        $data = ApiService::unlogin($param);

        return success($data);
    }

    public function api()
    {
        return $this->fetch('public/apidocs/index.html');
    }
}
