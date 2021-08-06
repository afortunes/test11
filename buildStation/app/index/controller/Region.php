<?php

namespace app\index\controller;

use think\facade\Request;
use app\common\service\RegionService;
use app\common\validate\RegionValidate;
use hg\apidoc\annotation as Apidoc;

/**
 * @Apidoc\Title("地区")
 * @Apidoc\Sort("5")
 */
class Region
{
    /**
     * @Apidoc\Title("地区列表")
     * @Apidoc\Param(ref="paramPaging")
     * @Apidoc\Returned(ref="returnCode"),
     * @Apidoc\Returned("data", type="object", desc="返回数据",
     *      @Apidoc\Returned(ref="returnPaging"),
     *      @Apidoc\Returned("list", type="array", desc="数据列表", 
     *          @Apidoc\Returned(ref="app\common\model\RegionModel\list")
     *      )
     * )
     */
    public function list()
    {
        $region_pid = Request::param('region_pid/d', 0);

        $where[] = ['is_delete', '=', 0];
        $where[] = ['region_pid', '=', $region_pid];

        $order = [];

        $data = RegionService::list($where, $order);

        return success($data);
    }

    /**
     * @Apidoc\Title("地区信息")
     * @Apidoc\Param(ref="app\common\model\RegionModel\id")
     * @Apidoc\Returned(ref="returnCode")
     * @Apidoc\Returned("data", type="object", desc="返回数据",
     *      @Apidoc\Returned(ref="app\common\model\RegionModel\info")
     * )
     */
    public function info()
    {
        $param['region_id'] = Request::param('region_id/d', '');

        validate(RegionValidate::class)->scene('info')->check($param);

        $data = RegionService::info($param['region_id']);

        if ($data['is_delete'] == 1) {
            exception('地区已被删除');
        }

        return success($data);
    }

    /**
     * @Apidoc\Title("地区树形")
     * @Apidoc\Returned(ref="returnCode")
     * @Apidoc\Returned("data", type="object", desc="返回数据",
     *      @Apidoc\Returned(ref="app\common\model\RegionModel\info")
     * )
     */
    public function tree()
    {
        $data = RegionService::info('tree');

        return success($data);
    }
}
