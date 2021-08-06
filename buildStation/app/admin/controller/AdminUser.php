<?php


namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminUserValidate;
use app\common\service\AdminUserService;
use hg\apidoc\annotation as Apidoc;

class AdminUser extends Base
{
    /**
     * @api {post} admin/AdminUser/list 用户列表
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/list
     * @apiDescription 用户列表
     * @apiParam {string}  page
     * @apiParam {string}  limit
     * @apiParam {string}  username
     * @apiParam {string}  nickname
     * @apiParam {string}  email
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "count": 7,
    "pages": 1,
    "page": 1,
    "limit": 10,
    "list": [
    {
    "admin_user_id": 14,
    "username": "testy",
    "nickname": "",
    "phone": "",
    "email": "",
    "sort": 200,
    "is_disable": 0,
    "is_super": 0,
    "login_num": 16,
    "create_time": "2021-07-20 09:30:07",
    "admin_role_ids": "10,3",
    "login_time": "2021-07-22 16:55:22",
    "group_id": 17,
    "group_name": "广州杰尔古格"
    }
    ]
    }
    }
     *
     */
    public function list()
    {
        $page       = Request::param('page/d', 1);
        $limit      = Request::param('limit/d', 10);
//        $sort_field = Request::param('sort_field/s ', '');
//        $sort_type  = Request::param('sort_type/s', '');
        $username   = Request::param('username/s', '');
        $nickname   = Request::param('nickname/s', '');
        $email      = Request::param('email/s', '');

        $where = [];
        if ($username) {
            $where[] = ['username', 'like', '%' . $username . '%'];
        }
        if ($nickname) {
            $where[] = ['nickname', 'like', '%' . $nickname . '%'];
        }
        if ($email) {
            $where[] = ['email', 'like', '%' . $email . '%'];
        }

        $order = [];
//        if ($sort_field && $sort_type) {
//            $order = [$sort_field => $sort_type];
//        }

        $field = '';

        $data = AdminUserService::list($where, $page, $limit, $order, $field);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/info 用户信息
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/info
     * @apiDescription 用户信息
     * @apiParam {string}  admin_user_id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_user_id": 2,
    "admin_role_ids": [
    2
    ],
    "admin_menu_ids": [],
    "username": "admin",
    "nickname": "admin",
    "password": "e10adc3949ba59abbe56e057f20f883e",
    "phone": "",
    "email": "",
    "avatar": "static/img/favicon.ico",
    "remark": "",
    "sort": 200,
    "is_disable": 0,
    "is_super": 0,
    "is_delete": 0,
    "login_num": 1,
    "login_ip": "192.168.177.171",
    "login_region": "XXXX内网IP",
    "login_time": "2021-06-04 11:09:20",
    "logout_time": "2021-06-04 11:09:57",
    "create_time": null,
    "update_time": null,
    "delete_time": null,
    "group_id": 2,
    "is_open_switch": 0,
    "group_name": "SEM",
    "admin_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjY5NDkyNDYsIm5iZiI6MTYyNjk0OTI0NiwiZXhwIjoxNjI2OTkyNDQ2LCJkYXRhIjp7ImFkbWluX3VzZXJfaWQiOjIsImxvZ2luX3RpbWUiOiIyMDIxLTA2LTA0IDExOjA5OjIwIiwibG9naW5faXAiOiIxOTIuMTY4LjE3Ny4xNzEifX0.mqCS9eWc5hmQPFZrdkbQOyR--ib6OIiOalwR_8jRQrQ",
    "admin_role": [
    {
    "admin_role_id": 3,
    "role_name": "前端",
    "role_desc": "",
    "role_sort": 200,
    "is_disable": 0,
    "create_time": null,
    "update_time": "2021-07-19 10:31:49"
    }
    ],
    "menu_ids": {
    "1": 235,
    "2": 245,
    "27": 252
    },
    "admin_role_menu": {
    "1": 235,
    "2": 245
    },
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
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');

        validate(AdminUserValidate::class)->scene('info')->check($param);

        $data = AdminUserService::info($param['admin_user_id']);

        if ($data['is_delete'] == 1) {
            exception('用户已被删除：' . $param['admin_user_id']);
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/getUserMenu 用户所具备的导航菜单
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/getUserMenu
     * @apiDescription 用户所具备的导航菜单
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_user_id": 5,
    "admin_role_ids": "1,2,3",
    "admin_menu_ids": "253,257",
    "username": "test",
    "nickname": "test",
    "phone": "",
    "email": "",
    "is_super": 0,
    "avatar": "static/img/favicon.ico",
    "is_delete": 0,
    "group_name": "流程与IT",
    "list": [
    {
    "admin_menu_id": 235,
    "menu_pid": 0,
    "menu_name": "组织管理",
    "menu_url": "",
    "menu_sort": 100,
    "is_disable": 0,
    "is_unauth": 0,
    "is_unlogin": 0,
    "create_time": "2021-07-06 16:00:26",
    "update_time": "2021-07-13 09:14:19",
    "is_menu": 1,
    "icon": "el-icon-office-building",
    "code": "/organization",
    "children": [
    {
    "admin_menu_id": 245,
    "menu_pid": 235,
    "menu_name": "组织列表",
    "menu_url": "",
    "menu_sort": 100,
    "is_disable": 0,
    "is_unauth": 0,
    "is_unlogin": 0,
    "create_time": "2021-07-08 14:25:08",
    "update_time": "2021-07-13 09:02:15",
    "is_menu": 1,
    "icon": "el-icon-s-fold",
    "code": "/list",
    "children": [
    {
    "admin_menu_id": 240,
    "menu_pid": 245,
    "menu_name": "组织列表查询",
    "menu_url": "/admin/Group/list",
    "menu_sort": 100,
    "is_disable": 0,
    "is_unauth": 0,
    "is_unlogin": 0,
    "create_time": "2021-07-08 11:46:11",
    "update_time": "2021-07-09 11:52:16",
    "is_menu": 0,
    "icon": "",
    "code": "/organization-query",
    "children": []
    }
    ]
    }
    ]
    }
    ]
    }
    }
     *
     */
    public function getUserMenu()
    {
        $param['admin_user_id'] = admin_user_id();
        if(empty($param['admin_user_id'])){
            exception('账号登录状态已失效', 403);
        }

        validate(AdminUserValidate::class)->scene('info')->check($param);

        $data = AdminUserService::getUserMenu($param['admin_user_id']);

        if ($data['is_delete'] == 1) {
            exception('用户已被删除：' . $param['admin_user_id']);
        }

        return success($data);
    }



    /**
     * @api {post} admin/AdminUser/add 用户添加
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/add
     * @apiDescription 用户添加
     * @apiParam {string}  username 账号
     * @apiParam {string}  nickname 昵称
     * @apiParam {string}  password 密码
     * @apiParam {string}  email 邮箱
     * @apiParam {string}  phone 手机
     * @apiParam {string}  remark 备注
     * @apiParam {string}  sort 排序
     * @apiParam {string}  group_id 组id
     * @apiParam {string}  admin_role_ids 用户具备的角色id(逗号隔开)
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
    "remark": '',
    "sort": 2000,
    "group_id": 2,
    "create_time": "2021-07-22 15:25:33",
    "admin_role_ids": ''
    }
    }
     *
     */
    public function add()
    {
        $param['username'] = Request::param('username/s', '');
        $param['nickname'] = Request::param('nickname/s', '');
        $param['password'] = Request::param('password/s', '123456');
        $param['email']    = Request::param('email/s', '');
        $param['phone']    = Request::param('phone/s', '');
        $param['remark']   = Request::param('remark/s', '');
        $param['sort']     = Request::param('sort/d', 200);
        $param['group_id']     = Request::param('group_id/d', 0);
        $param['admin_role_ids']     = Request::param('admin_role_ids/s', '');

        validate(AdminUserValidate::class)->scene('add')->check($param);

        $data = AdminUserService::add($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/edit 用户修改
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/edit
     * @apiDescription 用户修改
     * @apiParam {string}  admin_user_id 账号id
     * @apiParam {string}  username 账号
     * @apiParam {string}  nickname 昵称
     * @apiParam {string}  email 邮箱
     * @apiParam {string}  phone 手机
     * @apiParam {string}  remark 备注
     * @apiParam {string}  sort 排序
     * @apiParam {string}  group_id 组id
     * @apiParam {string}  admin_role_ids 用户具备的角色id(逗号隔开)
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
    "remark": '',
    "sort": 2000,
    "group_id": 2,
    "update_time": "2021-07-22 15:25:33",
    "admin_role_ids": ''
    }
    }
     *
     */
    public function edit()
    {
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');
        $param['username']      = Request::param('username/s', '');
        $param['nickname']      = Request::param('nickname/s', '');
        $param['email']         = Request::param('email/s', '');
        $param['phone']         = Request::param('phone/s', '');
        $param['remark']        = Request::param('remark/s', '');
        $param['sort']          = Request::param('sort/d', 200);
        $param['group_id']     = Request::param('group_id/d', 0);
        $param['admin_role_ids']     = Request::param('admin_role_ids/s', '');

        validate(AdminUserValidate::class)->scene('edit')->check($param);

        $data = AdminUserService::edit($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/dele 用户删除
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/dele
     * @apiDescription 用户删除
     * @apiParam {string}  admin_user_id 用户id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_user_id": "1",
    "delete_time": "",
    "is_delete": "1",
    }
    }
     *
     */
    public function dele()
    {
        $param['admin_user_id'] = Request::param('admin_user_id', '');

        validate(AdminUserValidate::class)->scene('dele')->check($param);

        $data = AdminUserService::dele($param['admin_user_id']);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/avatar 重置头像
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/avatar
     * @apiDescription 重置头像
     * @apiParam {string}  admin_user_id 用户id
     * @apiParam {string}  avatar url
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
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');
//        $param['admin_user_id'] = admin_user_id();
        $param['avatar']        = Request::file('avatar_file');

        validate(AdminUserValidate::class)->scene('avatar')->check($param);

        $data = AdminUserService::avatar($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/pwd 重置密码
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/pwd
     * @apiDescription 重置密码
     * @apiParam {string}  admin_user_id 用户id
     * @apiParam {string}  password 密码
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
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');
//        $param['admin_user_id'] = admin_user_id();
        $param['password']      = Request::param('password/s', '');

        validate(AdminUserValidate::class)->scene('pwd')->check($param);

        $data = AdminUserService::pwd($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/rule 用户分配权限
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/rule
     * @apiDescription 用户分配权限
     * @apiParam {string}  admin_user_id 用户id
     * @apiParam {string}  admin_menu_ids 权限id（逗号隔开）
     * @apiParam {string}  is_open_switch 开关 （1打开 0关闭）
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_menu_ids": "",
    "is_open_switch": 1,
    "update_time": "2021-07-23 10:27:16",
    "admin_user_id": 2
    }
    }
     *
     */
    public function rule()
    {
        $param['admin_user_id']  = Request::param('admin_user_id/d', '');

        validate(AdminUserValidate::class)->scene('rule')->check($param);

        if (Request::isGet()) {
            $data = AdminUserService::rule($param);
        } else {
//            $param['admin_role_ids'] = Request::param('admin_role_ids/a', []);
            $param['admin_menu_ids'] = Request::param('admin_menu_ids/a', []);
            $param['is_open_switch'] = Request::param('is_open_switch/d', 0);

            $data = AdminUserService::rule($param, 'post');
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminUser/disable 用户是否禁用
     * @apiGroup AdminUser
     * @apiName admin/AdminUser/disable
     * @apiDescription 用户是否禁用
     * @apiParam {string}  admin_user_id 当前用户id
     * @apiParam {string}  is_disable 1是 0否
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_menu_id": "1",
    "update_time": "",
    "is_disable": "1",
    }
    }
     *
     */
    public function disable()
    {
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');

        $param['is_disable']    = Request::param('is_disable/d', 0);

        validate(AdminUserValidate::class)->scene('disable')->check($param);

        $data = AdminUserService::disable($param);

        return success($data);
    }

    /**
     * "用户是否超管"
     */
    public function super()
    {
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');

        $param['is_super']      = Request::param('is_super/d', 0);

        validate(AdminUserValidate::class)->scene('super')->check($param);

        $data = AdminUserService::super($param);

        return success($data);
    }
}
