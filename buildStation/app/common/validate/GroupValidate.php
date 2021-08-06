<?php

namespace app\common\validate;

use think\Validate;
use think\facade\Db;

class GroupValidate extends Validate
{
    // 验证规则
    protected $rule = [
        'group_id' => ['require'],
        'group_name'     => ['require', 'checkGroupName'],
    ];

    // 错误信息
    protected $message = [
        'group_id.require' => '缺少参数：组id',
        'group_name.require'     => '请输入组织名称',
    ];

    // 验证场景
    protected $scene = [
        'id'         => ['group_id'],
        'info'       => ['group_id'],
        'add'        => ['group_name'],
        'edit'       => ['group_id', 'group_name'],
        'dele'       => ['group_id'],
        'disable'    => ['group_id'],
        'unauth'     => ['group_id'],
        'unlogin'    => ['group_id'],
        'role'       => ['group_id'],
        'roleRemove' => ['group_id'],
        'user'       => ['group_id'],
        'userRemove' => ['group_id'],
    ];

    // 验证场景定义：删除
    protected function scenedele()
    {
        return $this->only(['group_id'])
            ->append('group_id', 'checkGroupRole');
    }

    // 验证场景定义：角色解除
    protected function sceneroleRemove()
    {
        return $this->only(['admin_menu_id'])
            ->append('admin_menu_id', 'checkAdminMenuRoleRemove');
    }

    // 自定义验证规则：菜单名称是否已存在
    protected function checkGroupName($value, $rule, $data = [])
    {
        $admin_menu_id = isset($data['group_id']) ? $data['group_id'] : '';

        if ($admin_menu_id) {
            if ($data['group_pid'] == $data['group_id']) {
                return '组织父级不能等于组织本身';
            }
        }

        $menu_name = Db::name('group')
            ->field('group_id')
            ->where('group_id', '<>', $admin_menu_id)
            ->where('group_pid', '=', $data['group_pid'])
            ->where('group_name', '=', $data['group_name'])
            ->where('is_delete', '=', 0)
            ->find();

        if ($menu_name) {
            return '名称已存在：' . $data['group_name'];
        }


        return true;
    }

    // 自定义验证规则：菜单是否有子菜单或分配有角色或分配有用户
    protected function checkGroupRole($value, $rule, $data = [])
    {
        $group_id = $value;

        $group = Db::name('group')
            ->field('group_id')
            ->where('group_pid', '=', $group_id)
            ->where('is_delete', '=', 0)
            ->find();

        if ($group) {
            return '请删除所有子组织后再删除';
        }

        $where_admin[] = ['group_id', '=', $group_id];
        $where_admin[] = ['is_delete', '=', 0];

        $admin_user = Db::name('admin_user')
            ->field('admin_user_id')
            ->where($where_admin)
            ->find();

        if ($admin_user) {
            return '请在[用户]中解除所有用户后再删除';
        }

        return true;
    }
}
