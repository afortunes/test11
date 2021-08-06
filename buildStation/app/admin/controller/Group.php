<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\GroupValidate;
use app\common\service\GroupService;

class Group extends Base
{
    /**
     * @api {get} admin/Group/list 组织列表
     * @apiGroup Group
     * @apiName admin/Group/list
     * @apiDescription 组织列表
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
        "list": [
        {
        "group_id": 1,
        "group_pid": 0,
        "group_name": "市场部",
        "group_sort": 200,
        "is_disable": 0,
        "create_time": "2021-06-25 14:15:31",
        "update_time": "2021-07-19 10:58:19",
        "parent_group_name": null,
        "children": [
        {
        "group_id": 9,
        "group_pid": 1,
        "group_name": "市场部1",
        "group_sort": 200,
        "is_disable": 0,
        "create_time": "2021-07-02 14:06:23",
        "update_time": "2021-07-19 11:01:29",
        "parent_group_name": "市场部",
        "children": [
        {
        "group_id": 15,
        "group_pid": 9,
        "group_name": "233",
        "group_sort": 200,
        "is_disable": 0,
        "create_time": "2021-07-08 14:18:46",
        "update_time": null,
        "parent_group_name": "市场部1",
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
        $data['list'] = GroupService::tree();
        return success($data);
    }

    /**
     * @api {post} admin/Group/info 组织信息
     * @apiGroup Group
     * @apiName admin/Group/info
     * @apiDescription 组织信息
     * @apiParam {string}  group_id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "操作成功",
    "data": {
    "group_id": 1,
    "group_pid": 0,
    "group_name": "市场部",
    "group_sort": 200,
    "is_disable": 0,
    "is_delete": 0,
    "create_time": "2021-06-25 14:15:31",
    "update_time": "2021-07-19 10:58:19",
    "delete_time": null,
    "group_no": "",
    "parent_group_name": null
    }
    }
     *
     */
    public function info()
    {
        $param['group_id'] = Request::param('group_id/d', '');

        validate(GroupValidate::class)->scene('info')->check($param);

        $data = GroupService::info($param['group_id']);

        if ($data['is_delete'] == 1) {
            exception('组织已被删除：' . $param['admin_menu_id']);
        }

        return success($data);
    }

    /**
     * @api {post} admin/Group/add 组织添加
     * @apiGroup Group
     * @apiName admin/Group/add
     * @apiDescription 组织添加
     * @apiParam {string}  group_pid 父级id
     * @apiParam {string}  group_name 名称
     * @apiParam {string}  group_sort 排序
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "group_pid": "1",
    "group_name": "",
    "group_sort": "200",
    "group_id": 2,
    "create_time": "2021-07-22 15:25:33",
    }
    }
     *
     */
    public function add()
    {
        $param['group_pid']  = Request::param('group_pid/d', 0);
        $param['group_name'] = Request::param('group_name/s', '');
        $param['group_sort'] = Request::param('group_sort/d', 200);

        validate(GroupValidate::class)->scene('add')->check($param);

        $data = GroupService::add($param);

        return success($data);
    }

    /**
     * @api {post} admin/Group/edit 组织修改
     * @apiGroup Group
     * @apiName admin/Group/edit
     * @apiDescription 组织修改
     * @apiParam {string}  group_id id
     * @apiParam {string}  group_pid 父级id
     * @apiParam {string}  group_name 名称
     * @apiParam {string}  group_sort 排序
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "group_pid": "1",
    "group_name": "",
    "group_sort": "200",
    "group_id": 2,
    "update_time": "2021-07-22 15:25:33",
    }
    }
     *
     */
    public function edit()
    {
        $param['group_id'] = Request::param('group_id/d', '');
        $param['group_pid']  = Request::param('group_pid/d', 0);
        $param['group_name'] = Request::param('group_name/s', '');
        $param['group_sort'] = Request::param('group_sort/d', 200);

        validate(GroupValidate::class)->scene('edit')->check($param);

        $data = GroupService::edit($param);

        return success($data);
    }

    /**
     * @api {post} admin/Group/dele 组织删除
     * @apiGroup Group
     * @apiName admin/Group/dele
     * @apiDescription 组织删除
     * @apiParam {string}  group_id  id
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "group_id": "1",
    "delete_time": "",
    "is_delete": "1",
    }
    }
     *
     */
    public function dele()
    {
        $param['group_id'] = Request::param('group_id/d', '');

        validate(GroupValidate::class)->scene('dele')->check($param);

        $data = GroupService::dele($param['group_id']);

        return success($data);
    }

    /**
     * @api {post} admin/Group/disable 组织是否禁用
     * @apiGroup Group
     * @apiName admin/Group/disable
     * @apiDescription 组织是否禁用
     * @apiParam {string}  group_id  id
     * @apiParam {string}  is_disable 1是 0否
     * @apiSuccessExample {json} 成功返回:
    {
    "code": 200,
    "msg": "成功",
    "data": {
    "group_id": "1",
    "update_time": "",
    "is_disable": "1",
    }
    }
     *
     */
    public function disable()
    {
        $param['group_id'] = Request::param('group_id/d', '');
        $param['is_disable']    = Request::param('is_disable/d', 0);

        validate(GroupValidate::class)->scene('disable')->check($param);

        $data = GroupService::disable($param);

        return success($data);
    }
}
