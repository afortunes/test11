<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\service\RegionService;
use app\common\validate\RegionValidate;
use hg\apidoc\annotation as Apidoc;

class Region extends Base
{
    /**
     * 地区列表
     */
    public function list()
    {
        $sort_field    = Request::param('sort_field/s ', '');
        $sort_type     = Request::param('sort_type/s', '');
        $type          = Request::param('type/s', 'list');
        $region_pid    = Request::param('region_pid/d', 0) ?: 0;
        $region_id     = Request::param('region_id/d', '');
        $region_name   = Request::param('region_name/s', '');
        $region_pinyin = Request::param('region_pinyin/s', '');

        if ($type == 'tree') {
            $data = RegionService::info('tree');
        } else {
            if ($region_id || $region_name || $region_pinyin) {
                if ($region_id) {
                    $where[] = ['region_id', '=', $region_id];
                }
                if ($region_name) {
                    $where[] = ['region_name', '=', $region_name];
                }
                if ($region_pinyin) {
                    $where[] = ['region_pinyin', '=', $region_pinyin];
                }
            } else {
                $where[] = ['region_pid', '=', $region_pid];
            }

            $order = [];
            if ($sort_field && $sort_type) {
                $order = [$sort_field => $sort_type];
            }

            $data = RegionService::list($where, $order);
        }

        return success($data);
    }

    /**
     * 地区信息
     */
    public function info()
    {
        $param['region_id'] = Request::param('region_id/d', '');

        validate(RegionValidate::class)->scene('info')->check($param);

        $data = RegionService::info($param['region_id']);

        if ($data['is_delete'] == 1) {
            exception('地区已被删除：' . $param['region_id']);
        }

        return success($data);
    }

    /**
     * 地区添加
     */
    public function add()
    {
        $param['region_pid']       = Request::param('region_pid/d', 0);
        $param['region_level']     = Request::param('region_level/d', 1);
        $param['region_name']      = Request::param('region_name/s', '');
        $param['region_pinyin']    = Request::param('region_pinyin/s', '');
        $param['region_jianpin']   = Request::param('region_jianpin/s', '');
        $param['region_initials']  = Request::param('region_initials/s', '');
        $param['region_citycode']  = Request::param('region_citycode/s', '');
        $param['region_zipcode']   = Request::param('region_zipcode/s', '');
        $param['region_longitude'] = Request::param('region_longitude/s', '');
        $param['region_latitude']  = Request::param('region_latitude/s', '');
        $param['region_sort']      = Request::param('region_sort/d', 1000);

        if (empty($param['region_pid'])) {
            $param['region_pid'] = 0;
        }

        if (empty($param['region_level'])) {
            $param['region_level'] = 1;
        }

        validate(RegionValidate::class)->scene('add')->check($param);

        $data = RegionService::add($param);

        return success($data);
    }

    /**
     * 地区修改
     */
    public function edit()
    {
        $param['region_id']        = Request::param('region_id/d', '');
        $param['region_pid']       = Request::param('region_pid/d', 0);
        $param['region_level']     = Request::param('region_level/d', 1);
        $param['region_name']      = Request::param('region_name/s', '');
        $param['region_pinyin']    = Request::param('region_pinyin/s', '');
        $param['region_jianpin']   = Request::param('region_jianpin/s', '');
        $param['region_initials']  = Request::param('region_initials/s', '');
        $param['region_citycode']  = Request::param('region_citycode/s', '');
        $param['region_zipcode']   = Request::param('region_zipcode/s', '');
        $param['region_longitude'] = Request::param('region_longitude/s', '');
        $param['region_latitude']  = Request::param('region_latitude/s', '');
        $param['region_sort']      = Request::param('region_sort/d', 1000);

        if (empty($param['region_pid'])) {
            $param['region_pid'] = 0;
        }

        if (empty($param['region_level'])) {
            $param['region_level'] = 1;
        }

        validate(RegionValidate::class)->scene('edit')->check($param);

        $data = RegionService::edit($param);

        return success($data);
    }

    /**
     * 地区删除
     */
    public function dele()
    {
        $param['region_id'] = Request::param('region_id/d', '');

        validate(RegionValidate::class)->scene('dele')->check($param);

        $data = RegionService::dele($param['region_id']);

        return success($data);
    }
}
