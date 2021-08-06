<?php

namespace app\admin\controller;


use think\route\dispatch\Controller;

/**
 * Base
 */
class Base extends Controller {

    /**
     * __construct
     * @param \think\Request $request
     * @return type
     */
    public function __construct(\think\Request $request = null) {
//        header("Access-Control-Allow-Origin:*");
//        // 响应类型
//        header('Access-Control-Allow-Methods:*');
//       // 响应头设置
//        header('Access-Control-Allow-Headers:*');

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header('Access-Control-Allow-Headers:Origin,Content-Type,Accept,token,X-Requested-With,device');
    }

}
