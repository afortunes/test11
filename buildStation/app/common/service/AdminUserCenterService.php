<?php

namespace app\common\service;

use think\facade\Db;
use app\common\cache\AdminUserCache;
use think\facade\Config;

class AdminUserCenterService
{
    /**
     * 我的信息
     *
     * @param integer $admin_user_id 用户id
     * 
     * @return array
     */
    public static function info($admin_user_id)
    {
        $admin_user = AdminUserService::info($admin_user_id);

        $data['admin_user_id'] = $admin_user['admin_user_id'];
        $data['avatar']        = $admin_user['avatar'];
        $data['username']      = $admin_user['username'];
        $data['nickname']      = $admin_user['nickname'];
        $data['email']         = $admin_user['email'];
        $data['phone']         = $admin_user['phone'];
        $data['create_time']   = $admin_user['create_time'];
        $data['update_time']   = $admin_user['update_time'];
        $data['login_time']    = $admin_user['login_time'];
        $data['logout_time']   = $admin_user['logout_time'];
        $data['is_delete']     = $admin_user['is_delete'];
        $data['group_name']    = isset($admin_user['group_name']) ? $admin_user['group_name'] : '';
        $data['roles']         = $admin_user['roles'];


        return $data;
    }

    /**
     * 修改信息
     *
     * @param array $param 用户信息
     * 
     * @return array
     */
    public static function edit($param)
    {
        $admin_user_id = $param['admin_user_id'];
        
        unset($param['admin_user_id']);

        $param['update_time'] = datetime();

        $res = Db::name('admin_user')
            ->where('admin_user_id', $admin_user_id)
            ->update($param);

        if (empty($res)) {
            exception();
        }

        $param['admin_user_id'] = $admin_user_id;

        AdminUserCache::upd($admin_user_id);

        return $param;
    }

    /**
     * 修改密码
     *
     * @param array $param 用户密码
     * 
     * @return array
     */
    public static function pwd($param)
    {
        $admin_user_id = $param['admin_user_id'];
        $password_old  = $param['password_old'];
        $password_new  = $param['password_new'];

        $admin_user = AdminUserService::info($admin_user_id);

//        $salt = Config::get('admin.salt', '');
//        $password_old = md5(md5($password_old).$salt);

        if (md5($password_old) != $admin_user['password']) {
            exception('旧密码错误');
        }

        $update['password']    = md5($password_new);

//        $update['password'] = md5(md5($password_new).$salt);
        $update['update_time'] = datetime();

        $res = Db::name('admin_user')
            ->where('admin_user_id', $admin_user_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $update['admin_user_id'] = $admin_user_id;
//        $update['password']      = $res;

        AdminUserCache::upd($admin_user_id);

        return $update;
    }

    /**
     * 更换头像
     *
     * @param array $param 头像信息
     * 
     * @return array
     */
    public static function avatar($param)
    {
        $data = AdminUserService::avatar($param);

        return $data;
    }

    /**
     * 我的日志
     *
     * @param array   $where 条件
     * @param integer $page  页数
     * @param integer $limit 数量
     * @param array   $order 排序
     * @param string  $field 字段
     * 
     * @return array 
     */
    public static function log($where = [], $page = 1, $limit = 10,  $order = [], $field = '')
    {
        $data = AdminUserLogService::list($where, $page, $limit, $order, $field);

        return $data;
    }
}
