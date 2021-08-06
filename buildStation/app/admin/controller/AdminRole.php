<?php


namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\AdminRoleValidate;
use app\common\validate\AdminUserValidate;
use app\common\service\AdminRoleService;
use hg\apidoc\annotation as Apidoc;


class AdminRole extends Base
{
    /**
     * @api {post} admin/AdminRole/list 角色列表
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/list
     * @apiDescription 角色列表
     * @apiParam {string}  page
     * @apiParam {string}  limit
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "count": 3,
    "pages": 1,
    "page": 1,
    "limit": 10,
    "list": [
    {
    "admin_role_id": 3,
    "role_name": "前端",
    "role_desc": "",
    "role_sort": 200,
    "is_disable": 0,
    "create_time": null,
    "update_time": "2021-07-19 10:31:49"
    },
    {
    "admin_role_id": 2,
    "role_name": "演示",
    "role_desc": "",
    "role_sort": 200,
    "is_disable": 0,
    "create_time": null,
    "update_time": "2021-07-16 14:13:59"
    },
    {
    "admin_role_id": 1,
    "role_name": "超管",
    "role_desc": "",
    "role_sort": 200,
    "is_disable": 0,
    "create_time": null,
    "update_time": "2021-07-19 11:02:04"
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
//        $sort_field = Request::param('sort_field/s', '');
//        $sort_type  = Request::param('sort_type/s', '');
        $role_name  = Request::param('role_name/s', '');
        $role_desc  = Request::param('role_desc/s', '');

        $where = [];
        if ($role_name) {
            $where[] = ['role_name', 'like', '%' . $role_name . '%'];
        }
        if ($role_desc) {
            $where[] = ['role_desc', 'like', '%' . $role_desc . '%'];
        }

        $order = [];
//        if ($sort_field && $sort_type) {
//            $order = [$sort_field => $sort_type];
//        }

        $data = AdminRoleService::list($where, $page, $limit, $order);

        return success($data);
    }

    /**
     * @api {post} admin/AdminRole/info 角色信息
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/info
     * @apiDescription 角色信息
     * @apiParam {string}  admin_role_id
     * @apiSuccessExample {json} 成功返回:
        {
        "code": 200,
        "msg": "操作成功",
        "data": {
        "admin_role_id": 3,
        "admin_menu_ids": [
        235,
        245,
        240,
        242,
        241,
        243,
        244
        ],
        "role_name": "前端",
        "role_desc": "",
        "role_sort": 200,
        "is_disable": 0,
        "is_delete": 0,
        "create_time": null,
        "update_time": "2021-07-19 10:31:49",
        "delete_time": null
        }
        }
     *
     */
    public function info()
    {
        $param['admin_role_id'] = Request::param('admin_role_id/d', '');

        validate(AdminRoleValidate::class)->scene('info')->check($param);

        $data = AdminRoleService::info($param['admin_role_id']);

        if ($data['is_delete'] == 1) {
            exception('角色已被删除：' . $param['admin_role_id']);
        }

        return success($data);
    }

    /**
     * @api {post} admin/AdminRole/add 角色添加
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/add
     * @apiDescription 角色添加
     * @apiParam {string}  role_name 角色名称
     * @apiParam {string}  role_desc 角色描述
     * @apiParam {string}  role_sort 排序
     * @apiParam {string}  admin_menu_ids 角色包含的权限id(逗号隔开)
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "role_name": 3,
    "role_desc": '',
    "role_sort": 200,
    "admin_role_id": 200,
    "admin_menu_ids": [
    235,
    245,
    240,
    242,
    241,
    243,
    244
    ],
    "create_time": null,

    }
    }
     *
     */
    public function add()
    {
        $param['role_name']      = Request::param('role_name/s', '');
        $param['role_desc']      = Request::param('role_desc/s', '');
        $param['role_sort']      = Request::param('role_sort/d', 200);
        $param['admin_menu_ids'] = Request::param('admin_menu_ids/a', []);

        validate(AdminRoleValidate::class)->scene('add')->check($param);

        $data = AdminRoleService::add($param);

        return success($data);
    }

    /**
     * @api {post} admin/AdminRole/edit 角色编辑
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/edit
     * @apiDescription 角色编辑
     * @apiParam {string}  admin_role_id 角色id
     * @apiParam {string}  role_name 角色名称
     * @apiParam {string}  role_desc 角色描述
     * @apiParam {string}  role_sort 排序
     * @apiParam {string}  admin_menu_ids 角色包含的权限id(逗号隔开)
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "role_name": 3,
    "role_desc": '',
    "role_sort": 200,
    "admin_role_id": 200,
    "admin_menu_ids": [
    235,
    245,
    240,
    242,
    241,
    243,
    244
    ],
    "update_time": null,

    }
    }
     *
     */
    public function edit()
    {
        $param['admin_role_id']  = Request::param('admin_role_id/d', '');
        $param['role_name']      = Request::param('role_name/s', '');
        $param['role_desc']      = Request::param('role_desc/s', '');
        $param['role_sort']      = Request::param('role_sort/d', 200);
        $param['admin_menu_ids'] = Request::param('admin_menu_ids/a', []);

        validate(AdminRoleValidate::class)->scene('edit')->check($param);

        $data = AdminRoleService::edit($param, 'post');

        return success($data);
    }

    /**
     * @api {post} admin/AdminRole/dele 角色删除
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/dele
     * @apiDescription 角色删除
     * @apiParam {string}  admin_role_id 角色id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_role_id": 200,
    "is_delete": 1,
    "delete_time": '',

    }
    }
     *
     */
    public function dele()
    {
        $param['admin_role_id'] = Request::param('admin_role_id/d', '');

        validate(AdminRoleValidate::class)->scene('dele')->check($param);

        $data = AdminRoleService::dele($param['admin_role_id']);

        return success($data);
    }

    /**
     * @api {post} admin/AdminRole/disable 角色是否禁用
     * @apiGroup AdminRole
     * @apiName admin/AdminRole/disable
     * @apiDescription 角色是否禁用
     * @apiParam {string}  admin_role_id 角色id
     * @apiParam {string}  is_disable 1禁用 0否
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "admin_role_id": 200,
    "is_disable": 1,
    "update_time": '',
    }
    }
     *
     */
    public function disable()
    {
        $param['admin_role_id'] = Request::param('admin_role_id/d', '');
        $param['is_disable']    = Request::param('is_disable/d', 0);

        validate(AdminRoleValidate::class)->scene('disable')->check($param);

        $data = AdminRoleService::disable($param);

        return success($data);
    }

    /**
     * "角色用户"
     */ 
    public function user()
    {
        $page          = Request::param('page/d', 1);
        $limit         = Request::param('limit/d', 10);
        $sort_field    = Request::param('sort_field/s ', '');
        $sort_type     = Request::param('sort_type/s', '');
        $admin_role_id = Request::param('admin_role_id/s', '');

        validate(AdminRoleValidate::class)->scene('user')->check(['admin_role_id' => $admin_role_id]);

        $where[] = ['admin_role_ids', 'like', '%' . str_join($admin_role_id) . '%'];

        $order = [];
        if ($sort_field && $sort_type) {
            $order = [$sort_field => $sort_type];
        }

        $data = AdminRoleService::user($where, $page, $limit, $order);

        return success($data);
    }

    /**
     * "角色用户解除"
     */  
    public function userRemove()
    {
        $param['admin_role_id'] = Request::param('admin_role_id/d', '');
        $param['admin_user_id'] = Request::param('admin_user_id/d', '');

        validate(AdminRoleValidate::class)->scene('id')->check($param);
        validate(AdminUserValidate::class)->scene('id')->check($param);

        $data = AdminRoleService::userRemove($param);

        return success($data);
    }
}
