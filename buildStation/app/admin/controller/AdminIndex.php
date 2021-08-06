<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\service\AdminIndexService;
use app\common\service\MemberService;
use hg\apidoc\annotation as Apidoc;


class AdminIndex extends Base
{

    public function index()
    {
        $data = AdminIndexService::index();
        $msg  = '测试';

        return success($data, $msg);
    }

    public function member()
    {
        $date = Request::param('date/a', []);

        $range = ['total', 'today', 'yesterday', 'thisweek', 'lastweek', 'thismonth', 'lastmonth'];

        $number = [];
        $active = [];
        foreach ($range as $k => $v) {
            $number[$v] = MemberService::statNum($v);
            $active[$v] = MemberService::statNum($v, 'act');
        }
        $data['number']   = $number;
        $data['active']   = $active;
        $data['date_new'] = MemberService::statDate($date);
        $data['date_act'] = MemberService::statDate($date, 'act');

        return success($data);
    }
}
