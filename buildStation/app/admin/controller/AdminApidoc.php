<?php

namespace app\admin\controller;

use app\common\service\AdminApidocService;
use hg\apidoc\annotation as Apidoc;


class AdminApidoc
{

    public function apidoc()
    {
        $data = AdminApidocService::apidoc();

        return success($data);
    }
}
