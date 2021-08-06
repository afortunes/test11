<?php


namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminUserCenterValidate;
use app\common\service\AdminUserCenterService;
use app\common\service\AdminMenuService;
use hg\apidoc\annotation as Apidoc;

class AdminUserCenter extends Base
{
    /**
     * @api {post} admin/AdminUserCenter/info 用户个人信息
     * @apiGroup AdminUserCenter
     * @apiName admin/AdminUserCenter/info
     * @apiDescription 用户个人信息
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_user_id": 1,
    "avatar": "static/img/favicon.ico",
    "username": "skyselang",
    "nickname": "skyselang",
    "email": "",
    "phone": "",
    "create_time": null,
    "update_time": "2021-05-29 17:57:48",
    "login_time": "2021-06-11 15:03:31",
    "logout_time": "2021-06-08 15:46:10",
    "is_delete": 0,
    "group_name": "市场部",
    "roles": [
    "/admin/AdminMenu/add",
    "/admin/AdminMenu/edit"
    ]
    }
    }
     *
     */
    public function info()
    {
        $param['admin_user_id'] = admin_user_id();

        validate(AdminUserCenterValidate::class)->scene('info')->check($param);

        $data = AdminUserCenterService::info($param['admin_user_id']);

        if ($data['is_delete'] == 1) {
            exception('账号已被删除！');
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminUserCenter/edit 用户个人修改信息
     * @apiGroup AdminUserCenter
     * @apiName admin/AdminUserCenter/edit
     * @apiDescription 用户个人修改信息
     * @apiParam {string}  admin_user_id 账号id
     * @apiParam {string}  username 账号
     * @apiParam {string}  nickname 昵称
     * @apiParam {string}  email 邮箱
     * @apiParam {string}  phone 手机
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_user_id": "1",
    "username": "",
    "nickname": "",
    "email": 200,
    "phone": 1,
    "update_time": "2021-07-22 15:25:33",
    }
    }
     *
     */
    public function edit()
    {
        $param['admin_user_id'] = admin_user_id();
        $param['username']      = Request::param('username/s', '');
        $param['nickname']      = Request::param('nickname/s', '');
        $param['phone']         = Request::param('phone/s', '');
        $param['email']         = Request::param('email/s', '');

        validate(AdminUserCenterValidate::class)->scene('edit')->check($param);

        $data = AdminUserCenterService::edit($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUserCenter/pwd 修改密码
     * @apiGroup AdminUserCenter
     * @apiName admin/AdminUserCenter/pwd
     * @apiDescription 修改密码
     * @apiParam {string}  password 密码
     * @apiParam {string}  password_old 旧密码
     * @apiParam {string}  password_new 新密码
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "update_time": "2021-07-23 10:27:16",
    "admin_user_id": 2
    }
    }
     *
     */
    public function pwd()
    {
        $param['admin_user_id'] = admin_user_id();
        $param['password_old']  = Request::param('password_old/s', '');
        $param['password_new']  = Request::param('password_new/s', '');

        validate(AdminUserCenterValidate::class)->scene('pwd')->check($param);

        $data = AdminUserCenterService::pwd($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUserCenter/avatar 用户修改头像
     * @apiGroup AdminUserCenter
     * @apiName admin/AdminUserCenter/avatar
     * @apiDescription 用户修改头像
     * @apiParam {string}  avatar 头像url
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_user_id": "1",
    "update_time": "",
    "avatar": "",
    }
    }
     *
     */
    public function avatar()
    {
        $param['admin_user_id'] = admin_user_id();
        $param['avatar']        = Request::file('avatar_file');

        validate(AdminUserCenterValidate::class)->scene('avatar')->check($param);

        $data = AdminUserCenterService::avatar($param);

        return success($data);
    }

    /**
     * "我的日志"
     */
    public function log()
    {
        $page            = Request::param('page/d', 1);
        $limit           = Request::param('limit/d', 10);
        $sort_field      = Request::param('sort_field/s ', '');
        $sort_type       = Request::param('sort_type/s', '');
        $log_type        = Request::param('log_type/d', '');
        $request_keyword = Request::param('request_keyword/s', '');
        $menu_keyword    = Request::param('menu_keyword/s', '');
        $create_time     = Request::param('create_time/a', []);
        $admin_user_id   = admin_user_id();

        validate(AdminUserCenterValidate::class)->scene('log')->check(['admin_user_id' => $admin_user_id]);

        $where   = [];
        $where[] = ['admin_user_id', '=', $admin_user_id];
        if ($log_type) {
            $where[] = ['log_type', '=', $log_type];
        }
        if ($request_keyword) {
            $where[] = ['request_ip|request_region|request_isp', 'like', '%' . $request_keyword . '%'];
        }
        if ($menu_keyword) {
            $admin_menu     = AdminMenuService::likeQuery($menu_keyword);
            $admin_menu_ids = array_column($admin_menu, 'admin_menu_id');
            $where[]        = ['admin_menu_id', 'in', $admin_menu_ids];
        }
        if ($create_time) {
            $where[] = ['create_time', '>=', $create_time[0] . ' 00:00:00'];
            $where[] = ['create_time', '<=', $create_time[1] . ' 23:59:59'];
        }

        $order = [];
        if ($sort_field && $sort_type) {
            $order = [$sort_field => $sort_type];
        }

        $data = AdminUserCenterService::log($where, $page, $limit, $order);

        return success($data);
    }
}
