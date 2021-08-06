<?php

namespace app\common\service;

use think\facade\Db;
use app\common\cache\GroupCache;
use app\common\cache\AdminRoleCache;
use app\common\cache\AdminUserCache;

class GroupService
{
    /**
     * 组织列表
     *
     * @return array 
     */
    public static function list()
    {
        $field = 'admin_menu_id,menu_pid,menu_name,menu_url,is_unauth,is_unlogin';

        $where[] = ['is_delete', '=', 0];

        $order = ['menu_sort' => 'desc', 'admin_menu_id' => 'asc'];

        $list = Db::name('admin_menu')
            ->field($field)
            ->where($where)
            ->order($order)
            ->select()
            ->toArray();

        return $list;
    }

    /**
     * 组织树形
     *
     * @return array
     */
    public static function tree()
    {
        $key  = 'tree';
//        if (empty($tree)) {
            $field = 'a.group_id,a.group_pid,a.group_name,a.group_sort,a.is_disable,a.create_time,a.update_time,b.group_name parent_group_name';

            $where[] = ['a.is_delete', '=', 0];

            $order = ['a.group_sort' => 'desc', 'a.group_id' => 'asc'];

            $list = Db::name('group')->alias('a')
                ->leftJoin('group b','a.group_pid=b.group_id')
                ->field($field)
                ->where($where)
                ->order($order)
                ->select()
                ->toArray();

            $tree = self::toTree($list, 0);

//        }

        return $tree;
    }

    /**
     * 组织信息
     *
     * @param integer $admin_menu_id 组织id
     * 
     * @return array
     */
    public static function info($group_id = '')
    {

        $where[] = ['a.group_id', '=',  $group_id];
        $group = Db::name('group')->alias('a')
            ->leftJoin('group b','a.group_pid=b.group_id')
            ->where($where)
            ->field('a.*,b.group_name parent_group_name')
            ->find();

        if (empty($group)) {
            exception('不存在：' . $group_id);
        }

        return $group;
    }

    /**
     * 组织添加
     *
     * @param array $param 组织信息
     * 
     * @return array
     */
    public static function add($param)
    {
        $param['create_time'] = datetime();


        $group_id = Db::name('group')
            ->insertGetId($param);

        if (empty($group_id)) {
            exception();
        }

        $param['group_id'] = $group_id;


        return $param;
    }

    /**
     * 组织修改
     *
     * @param array $param 组织信息
     * 
     * @return array
     */
    public static function edit($param)
    {
        $param['update_time']    = datetime();

        $res = Db::name('group')
            ->where('group_id', $param['group_id'])
            ->update($param);

        if (empty($res)) {
            exception();
        }
//        GroupCache::del($param['group_id']);

        return $param;
    }

    /**
     * 组织删除
     *
     * @param integer $admin_menu_id 组织id
     * 
     * @return array
     */
    public static function dele($group_id)
    {

        $update['is_delete']   = 1;
        $update['delete_time'] = datetime();

        $res = Db::name('group')
            ->where('group_id', '=', $group_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $update['group_id'] = $group_id;

//        GroupCache::del();
//        GroupCache::del($group_id);

        return $update;
    }

    /**
     * 组织是否禁用
     *
     * @param array $param 组织信息
     * 
     * @return array
     */
    public static function disable($param)
    {
        $group_id = $param['group_id'];

        $update['is_disable']  = $param['is_disable'];
        $update['update_time'] = datetime();

        $res = Db::name('group')
            ->where('group_id', $group_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }
        $update['group_id'] = $group_id;

//        GroupCache::del();
//        GroupCache::del($group_id);

        return $update;
    }

    /**
     * 组织是否无需权限
     *
     * @param array $param 组织信息
     * 
     * @return array
     */
    public static function unauth($param)
    {
        $admin_menu_id = $param['admin_menu_id'];

        $update['is_unauth']   = $param['is_unauth'];
        $update['update_time'] = datetime();

        $res = Db::name('admin_menu')
            ->where('admin_menu_id', $admin_menu_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $admin_menu = self::info($admin_menu_id);

        $update['admin_menu_id'] = $admin_menu_id;


        return $update;
    }

    /**
     * 组织是否无需登录
     *
     * @param array $param 组织信息
     * 
     * @return array
     */
    public static function unlogin($param)
    {
        $admin_menu_id = $param['admin_menu_id'];

        $update['is_unlogin']  = $param['is_unlogin'];
        $update['update_time'] = datetime();

        $res = Db::name('admin_menu')
            ->where('admin_menu_id', $admin_menu_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $admin_menu = self::info($admin_menu_id);

        $update['admin_menu_id'] = $admin_menu_id;

//        AdminMenuCache::del();
//        AdminMenuCache::del($admin_menu_id);
//        AdminMenuCache::del($admin_menu['menu_url']);

        return $update;
    }





    /**
     * 组织用户
     *
     * @param array   $where 条件
     * @param integer $page  页数
     * @param integer $limit 数量
     * @param array   $order 排序
     * @param string  $field 字段
     *
     * @return array 
     */
    public static function user($where = [], $page = 1, $limit = 10,  $order = [], $field = '')
    {
        $data = AdminUserService::list($where, $page, $limit, $order, $field);

        return $data;
    }

    /**
     * 组织用户解除
     *
     * @param array $param 组织用户id
     *
     * @return array
     */
    public static function userRemove($param)
    {
        $admin_menu_id = $param['admin_menu_id'];
        $admin_user_id = $param['admin_user_id'];

        $admin_user = AdminUserService::info($admin_user_id);

        $admin_menu_ids = $admin_user['admin_menu_ids'];
        foreach ($admin_menu_ids as $k => $v) {
            if ($admin_menu_id == $v) {
                unset($admin_menu_ids[$k]);
            }
        }

        if (empty($admin_menu_ids)) {
            $admin_menu_ids = str_join('');
        } else {
            $admin_menu_ids = str_join(implode(',', $admin_menu_ids));
        }

        $update['update_time']    = datetime();
        $update['admin_menu_ids'] = $admin_menu_ids;

        $res = Db::name('admin_user')
            ->where('admin_user_id', $admin_user_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $update['admin_menu_id'] = $admin_menu_id;
        $update['admin_user_id'] = $admin_user_id;

        AdminUserCache::upd($admin_user_id);

        return $update;
    }

    /**
     * 组织所有子级获取
     *
     * @param array   $admin_menu    所有组织
     * @param integer $admin_menu_id 组织id
     * 
     * @return array
     */
    public static function getChildren($admin_menu, $admin_menu_id)
    {
        $children = [];

        foreach ($admin_menu as $k => $v) {
            if ($v['menu_pid'] == $admin_menu_id) {
                $children[] = $v['admin_menu_id'];
                $children   = array_merge($children, self::getChildren($admin_menu, $v['admin_menu_id']));
            }
        }

        return $children;
    }

    /**
     * 组织树形获取
     *
     * @param array   $admin_menu 所有组织
     * @param integer $menu_pid   组织父级id
     * 
     * @return array
     */
    public static function toTree($group, $group_pid)
    {
        $tree = [];

        foreach ($group as $k => $v) {
            if ($v['group_pid'] == $group_pid) {
                $v['children'] = self::toTree($group, $v['group_id']);
                $tree[] = $v;
            }
        }

        return $tree;
    }

    /**
     * 组织模糊查询
     *
     * @param string $keyword 关键词
     * @param string $field   字段
     *
     * @return array
     */
    public static function likeQuery($keyword, $field = 'menu_url|menu_name')
    {
        $data = Db::name('admin_menu')
            ->where('is_delete', '=', 0)
            ->where($field, 'like', '%' . $keyword . '%')
            ->select()
            ->toArray();

        return $data;
    }

    /**
     * 组织精确查询
     *
     * @param string $keyword 关键词
     * @param string $field   字段
     *
     * @return array
     */
    public static function equQuery($keyword, $field = 'menu_url|menu_name')
    {
        $data = Db::name('admin_menu')
            ->where('is_delete', '=', 0)
            ->where($field, '=', $keyword)
            ->select()
            ->toArray();

        return $data;
    }

    /**
     * 组织url列表
     *
     * @return array 
     */
    public static function urlList()
    {
        $urllist_key = 'urlList';
        $urllist     = AdminMenuCache::get($urllist_key);
        if (empty($urllist)) {
            $list = Db::name('admin_menu')
                ->field('menu_url')
                ->where('is_delete', '=', 0)
                ->where('menu_url', '<>', '')
                ->order('menu_url', 'asc')
                ->select()
                ->toArray();

            $urllist = array_column($list, 'menu_url');

            AdminMenuCache::set($urllist_key, $urllist);
        }

        return $urllist;
    }

    /**
     * 组织无需权限url列表
     *
     * @return array
     */
    public static function unauthList()
    {
        $unauthlist_key = 'unauthList';
        $unauthlist     = AdminMenuCache::get($unauthlist_key);
        if (empty($unauthlist)) {
            $where_unauth[] = ['is_delete', '=', 0];
            $where_unauth[] = ['is_unauth', '=', 1];
            $where_unauth[] = ['menu_url', '<>', ''];

            $where_unlogin[] = ['is_delete', '=', 0];
            $where_unlogin[] = ['is_unlogin', '=', 1];
            $where_unlogin[] = ['menu_url', '<>', ''];

            $list = Db::name('admin_menu')
                ->field('menu_url')
                ->whereOr([$where_unauth, $where_unlogin])
                ->order('menu_url', 'asc')
                ->select()
                ->toArray();

            $unauthlist = array_column($list, 'menu_url');

            AdminMenuCache::set($unauthlist_key, $unauthlist);
        }

        return $unauthlist;
    }

    /**
     * 组织无需登录url列表
     *
     * @return array
     */
    public static function unloginList()
    {
        $unloginlist_key = 'unloginList';
        $unloginlist     = AdminMenuCache::get($unloginlist_key);
        if (empty($unloginlist)) {
            $where_unlogin[] = ['is_delete', '=', 0];
            $where_unlogin[] = ['is_unlogin', '=', 1];
            $where_unlogin[] = ['menu_url', '<>', ''];

            $list = Db::name('admin_menu')
                ->field('menu_url')
                ->where($where_unlogin)
                ->order('menu_url', 'asc')
                ->select()
                ->toArray();

            $unloginlist = array_column($list, 'menu_url');

            AdminMenuCache::set($unloginlist_key, $unloginlist);
        }

        return $unloginlist;
    }
}
