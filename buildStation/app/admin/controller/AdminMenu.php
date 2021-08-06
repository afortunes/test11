<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminMenuValidate;
use app\common\validate\AdminRoleValidate;
use app\common\validate\AdminUserValidate;
use app\common\service\AdminMenuService;
use app\common\service\AdminUserService;
use hg\apidoc\annotation as Apidoc;


class AdminMenu extends Base
{
    /**
     * @api {get} admin/AdminMenu/list 菜单列表
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/list
     * @apiDescription 菜单列表
     * * @apiParam {string}  type  1所有的  2去除不需要权限的
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
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
    public function list()
    {
        $param['type'] = Request::param('type/d', 1);
        $data['list'] = AdminMenuService::tree($param['type']);

        return success($data);
    }

    /**
     * @api {post} admin/AdminMenu/info 菜单详情
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/info
     * @apiDescription 菜单详情
     * @apiParam {string}  admin_menu_id 菜单id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_menu_id": 235,
    "menu_pid": 0,
    "menu_name": "组织管理",
    "menu_url": "",
    "is_menu": 1,
    "menu_sort": 100,
    "is_disable": 0,
    "is_unauth": 0,
    "is_unlogin": 0,
    "is_delete": 0,
    "create_time": "2021-07-06 16:00:26",
    "update_time": "2021-07-13 09:14:19",
    "delete_time": null,
    "icon": "el-icon-office-building",
    "code": "/organization"
    }
    }
     *
     */
    public function info()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');

        validate(AdminMenuValidate::class)->scene('info')->check($param);

        $data = AdminMenuService::info($param['admin_menu_id']);

        if ($data['is_delete'] == 1) {
            exception('菜单已被删除：' . $param['admin_menu_id']);
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminMenu/add 菜单添加
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/add
     * @apiDescription 菜单添加
     * @apiParam {string}  menu_pid 父id
     * @apiParam {string}  menu_name 菜单名称
     * @apiParam {string}  menu_url 菜单url
     * @apiParam {string}  menu_sort 排序
     * @apiParam {string}  is_menu 是否导航菜单
     * @apiParam {string}  icon 前端使用
     * @apiParam {string}  code 前端使用
     * @apiParam {string}  is_disable 是否禁用
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "menu_pid": "1",
    "menu_name": "",
    "menu_url": "/admin/AdminMenu/list",
    "menu_sort": 200,
    "is_menu": 1,
    "icon": 0,
    "code": 0,
    "is_disable": 0,
    "create_time": "2021-07-22 15:25:33",
    "admin_menu_id": 5
    }
    }
     *
     */
    public function add()
    {
        $param['menu_pid']  = Request::param('menu_pid/d', 0);
        $param['menu_name'] = Request::param('menu_name/s', '');
        $param['menu_url']  = Request::param('menu_url/s', '');
        $param['menu_sort'] = Request::param('menu_sort/d', 200);
        $param['is_menu'] = Request::param('is_menu/d', 0);
        $param['icon'] = Request::param('icon/s', 0);
        $param['code'] = Request::param('code/s', 0);
        $param['is_disable'] = Request::param('is_disable/d', 0);
        $param['is_unauth']     = Request::param('is_unauth/d', 0);

        validate(AdminMenuValidate::class)->scene('add')->check($param);

        $data = AdminMenuService::add($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminMenu/edit 菜单编辑
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/edit
     * @apiDescription 菜单编辑
     *
     * @apiParam {string}  admin_menu_id 当前菜单id
     * @apiParam {string}  menu_pid 父id
     * @apiParam {string}  menu_name 菜单名称
     * @apiParam {string}  menu_url 菜单url
     * @apiParam {string}  menu_sort 排序
     * @apiParam {string}  is_menu 是否导航菜单
     * @apiParam {string}  icon 前端使用
     * @apiParam {string}  code 前端使用
     * @apiParam {string}  is_disable 是否禁用
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_menu_id": "1",
    "menu_pid": "1",
    "menu_name": "",
    "menu_url": "/admin/AdminMenu/list",
    "menu_sort": 200,
    "is_menu": 1,
    "icon": 0,
    "code": 0,
    "is_disable": 0,
    "create_time": "2021-07-22 15:25:33",
    "admin_menu_id": 5
    }
    }
     *
     */
    public function edit()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['menu_pid']      = Request::param('menu_pid/d', 0);
        $param['menu_name']     = Request::param('menu_name/s', '');
        $param['menu_url']      = Request::param('menu_url/s', '');
        $param['menu_sort']     = Request::param('menu_sort/d', 200);
        $param['is_menu'] = Request::param('is_menu/d', 0);
        $param['icon'] = Request::param('icon/s', 0);
        $param['code'] = Request::param('code/s', 0);
        $param['is_disable'] = Request::param('is_disable/d', 0);
        $param['is_unauth']     = Request::param('is_unauth/d', 0);

        validate(AdminMenuValidate::class)->scene('edit')->check($param);

        $data = AdminMenuService::edit($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminMenu/dele 菜单删除
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/dele
     * @apiDescription 菜单删除
     * @apiParam {string}  admin_menu_id 当前菜单id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "admin_menu_id": "1",
    "delete_time": "",
    "is_delete": "1",
    }
    }
     *
     */
    public function dele()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');

        validate(AdminMenuValidate::class)->scene('dele')->check($param);

        $data = AdminMenuService::dele($param['admin_menu_id']);

        return success($data);
    }


    /**
     * @api {post} admin/AdminMenu/disable 菜单是否禁用
     * @apiGroup AdminMenu
     * @apiName admin/AdminMenu/disable
     * @apiDescription 菜单是否禁用
     * @apiParam {string}  admin_menu_id 当前菜单id
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
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['is_disable']    = Request::param('is_disable/d', 0);

        validate(AdminMenuValidate::class)->scene('disable')->check($param);

        $data = AdminMenuService::disable($param);

        return success($data);
    }


    /**
     * @return 是否无需权限
     */
    public function unauth()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['is_unauth']     = Request::param('is_unauth/d', 0);

        validate(AdminMenuValidate::class)->scene('unauth')->check($param);

        $data = AdminMenuService::unauth($param);

        return success($data);
    }

    /**
     * @return 是否无需登录
     */
    public function unlogin()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['is_unlogin']    = Request::param('is_unlogin/d', 0);

        validate(AdminMenuValidate::class)->scene('unlogin')->check($param);

        $data = AdminMenuService::unlogin($param);

        return success($data);
    }

    /**
     * @return 菜单角色
     */
    public function role()
    {
        $page          = Request::param('page/d', 1);
        $limit         = Request::param('limit/d', 10);
        $sort_field    = Request::param('sort_field/s', '');
        $sort_type     = Request::param('sort_type/s', '');
        $admin_menu_id = Request::param('admin_menu_id/d', '');

        validate(AdminMenuValidate::class)->scene('role')->check(['admin_menu_id' => $admin_menu_id]);

        $where[] = ['admin_menu_ids', 'like', '%' . str_join($admin_menu_id) . '%'];

        $order = [];
        if ($sort_field && $sort_type) {
            $order = [$sort_field => $sort_type];
        }

        $data = AdminMenuService::role($where, $page, $limit, $order);

        return success($data);
    }

    /**
     * @return 菜单角色解除
     */
    public function roleRemove()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['admin_role_id'] = Request::param('admin_role_id/d', '');

        validate(AdminMenuValidate::class)->scene('id')->check($param);
        validate(AdminRoleValidate::class)->scene('id')->check($param);

        $data = AdminMenuService::roleRemove($param);

        return success($data);
    }

    /**
     * @return 菜单用户
     */
    public function user()
    {
        $page          = Request::param('page/d', 1);
        $limit         = Request::param('limit/d', 10);
        $sort_field    = Request::param('sort_field/s ', '');
        $sort_type     = Request::param('sort_type/s', '');
        $admin_role_id = Request::param('admin_role_id/d', '');
        $admin_menu_id = Request::param('admin_menu_id/d', '');

        if ($admin_menu_id) {
            validate(AdminMenuValidate::class)->scene('user')->check(['admin_menu_id' => $admin_menu_id]);

            $where[] = ['admin_menu_ids', 'like', '%' . str_join($admin_menu_id) . '%'];

            $order = [];
            if ($sort_field && $sort_type) {
                $order = [$sort_field => $sort_type];
            }

            $data = AdminUserService::list($where, $page, $limit, $order);

            return success($data);
        } else {
            validate(AdminRoleValidate::class)->scene('id')->check(['admin_role_id' => $admin_role_id]);

            $where[] = ['admin_role_ids', 'like', '%' . str_join($admin_role_id) . '%'];

            $order = [];
            if ($sort_field && $sort_type) {
                $order = [$sort_field => $sort_type];
            }

            $data = AdminMenuService::user($where, $page, $limit, $order);

            return success($data);
        }
    }

    /**
     * @return 菜单用户解除
     */
    public function userRemove()
    {
        $param['admin_menu_id'] = Request::param('admin_menu_id/d', '');
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');

        validate(AdminMenuValidate::class)->scene('id')->check($param);
        validate(AdminUserValidate::class)->scene('id')->check($param);

        $data = AdminMenuService::userRemove($param);

        return success($data);
    }
}
