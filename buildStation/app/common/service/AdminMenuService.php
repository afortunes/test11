<?php

namespace app\common\service;

use think\facade\Db;
use app\common\cache\AdminMenuCache;
use app\common\cache\AdminRoleCache;
use app\common\cache\AdminUserCache;

class AdminMenuService
{
    /**
     * 菜单列表
     *
     * @return array 
     */
    public static function list()
    {
        $key  = 'list';
        $list = AdminMenuCache::get($key);
        if (empty($list)) {
            $field = 'admin_menu_id,menu_pid,menu_name,menu_url,is_unauth,is_unlogin,is_disable';

            $where[] = ['is_delete', '=', 0];

            $order = ['menu_sort' => 'desc', 'admin_menu_id' => 'asc'];

            $list = Db::name('admin_menu')
                ->field($field)
                ->where($where)
                ->order($order)
                ->select()
                ->toArray();

            AdminMenuCache::set($key, $list);
        }

        return $list;
    }

    /**
     * 菜单树形
     *
     * @return array
     */
    public static function tree($type=1)
    {
//        $key  = 'tree';
//        $tree = AdminMenuCache::get($key);
        if (1) {
            $field = 'admin_menu_id,menu_pid,menu_name,menu_url,menu_sort,is_disable,is_unauth,is_unlogin,create_time,update_time,is_menu,icon,code';

            $where[] = ['is_delete', '=', 0];
            if($type == 2){
                $where[] = ['is_unauth', '=', 0];
            }

            $order = ['menu_sort' => 'desc', 'admin_menu_id' => 'asc'];

            $list = Db::name('admin_menu')
                ->field($field)
                ->where($where)
                ->order($order)
                ->select()
                ->toArray();

            $tree = self::toTree($list, 0);

//            AdminMenuCache::set($key, $tree);
        }

        return $tree;
    }

    /**
     * 菜单信息
     *
     * @param integer $admin_menu_id 菜单id
     * 
     * @return array
     */
    public static function info($admin_menu_id = '')
    {
        if (empty($admin_menu_id)) {
            $admin_menu_id = menu_url();
        }
//        $admin_menu = AdminMenuCache::get($admin_menu_id);
        $admin_menu = '';
        if($admin_menu_id == 'admin/AdminLogin/login'){
            return $admin_menu['menu_url'] = 'admin/AdminLogin/login';
        }

        if (empty($admin_menu)) {
            if (is_numeric($admin_menu_id)) {
                $where[] = ['admin_menu_id', '=',  $admin_menu_id];
            } else {
                $where[] = ['is_delete', '=', 0];
                $where[] = ['menu_url', '=',  $admin_menu_id];
            }

            $admin_menu = Db::name('admin_menu')
                ->where($where)
                ->find();

            if (empty($admin_menu)) {
                exception('菜单不存在：' . $admin_menu_id);
            }

//            AdminMenuCache::set($admin_menu_id, $admin_menu);
        }



        return $admin_menu;
    }

    /**
     * 菜单添加
     *
     * @param array $param 菜单信息
     * 
     * @return array
     */
    public static function add($param)
    {
        $param['create_time'] = datetime();

        $admin_menu_id = Db::name('admin_menu')
            ->strict(false)
            ->insertGetId($param);

        if (empty($admin_menu_id)) {
            exception();
        }

        $param['admin_menu_id'] = $admin_menu_id;

        AdminMenuCache::del();

        return $param;
    }

    /**
     * 菜单修改
     *
     * @param array $param 菜单信息
     * 
     * @return array
     */
    public static function edit($param)
    {
        $admin_menu_id = $param['admin_menu_id'];
        $admin_menu    = self::info($admin_menu_id);

        unset($param['admin_menu_id']);

        $param['update_time'] = datetime();

        $res = Db::name('admin_menu')
            ->strict(false)
            ->where('admin_menu_id', '=', $admin_menu_id)
            ->update($param);

        if (empty($res)) {
            exception();
        }

        $param['admin_menu_id'] = $admin_menu_id;

        AdminMenuCache::del();
        AdminMenuCache::del($admin_menu_id);
        AdminMenuCache::del($admin_menu['menu_url']);

        return $param;
    }

    /**
     * 菜单删除
     *
     * @param integer $admin_menu_id 菜单id
     * 
     * @return array
     */
    public static function dele($admin_menu_id)
    {
        $admin_menu = self::info($admin_menu_id);

        $update['is_delete']   = 1;
        $update['delete_time'] = datetime();

        $res = Db::name('admin_menu')
            ->where('admin_menu_id', '=', $admin_menu_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $update['admin_menu_id'] = $admin_menu_id;

        AdminMenuCache::del();
        AdminMenuCache::del($admin_menu_id);
        AdminMenuCache::del($admin_menu['menu_url']);

        return $update;
    }

    /**
     * 菜单是否禁用
     *
     * @param array $param 菜单信息
     * 
     * @return array
     */
    public static function disable($param)
    {
        $admin_menu_id = $param['admin_menu_id'];

        $update['is_disable']  = $param['is_disable'];
        $update['update_time'] = datetime();

        $res = Db::name('admin_menu')
            ->where('admin_menu_id', $admin_menu_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $admin_menu = self::info($admin_menu_id);

        $update['admin_menu_id'] = $admin_menu_id;

        AdminMenuCache::del();
        AdminMenuCache::del($admin_menu_id);
        AdminMenuCache::del($admin_menu['menu_url']);

        return $update;
    }

    /**
     * 菜单是否无需权限
     *
     * @param array $param 菜单信息
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

        AdminMenuCache::del();
        AdminMenuCache::del($admin_menu_id);
        AdminMenuCache::del($admin_menu['menu_url']);

        return $update;
    }

    /**
     * 菜单是否无需登录
     *
     * @param array $param 菜单信息
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

        AdminMenuCache::del();
        AdminMenuCache::del($admin_menu_id);
        AdminMenuCache::del($admin_menu['menu_url']);

        return $update;
    }

    /**
     * 菜单角色
     *
     * @param array   $where 条件
     * @param integer $page  页数
     * @param integer $limit 数量
     * @param array   $order 排序
     * @param string  $field 字段
     * 
     * @return array 
     */
    public static function role($where = [], $page = 1, $limit = 10,  $order = [], $field = '')
    {
        $data = AdminRoleService::list($where, $page, $limit, $order, $field);

        return $data;
    }

    /**
     * 菜单角色解除
     *
     * @param array $param 菜单角色id
     *
     * @return array
     */
    public static function roleRemove($param)
    {
        $admin_menu_id = $param['admin_menu_id'];
        $admin_role_id = $param['admin_role_id'];

        $admin_role = AdminRoleService::info($admin_role_id);

        $admin_menu_ids = $admin_role['admin_menu_ids'];
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

        $res = Db::name('admin_role')
            ->where('admin_role_id', $admin_role_id)
            ->update($update);

        if (empty($res)) {
            exception();
        }

        $update['admin_menu_id'] = $admin_menu_id;
        $update['admin_role_id'] = $admin_role_id;

        AdminRoleCache::del($admin_role_id);

        return $update;
    }

    /**
     * 菜单用户
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
     * 菜单用户解除
     *
     * @param array $param 菜单用户id
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
     * 菜单所有子级获取
     *
     * @param array   $admin_menu    所有菜单
     * @param integer $admin_menu_id 菜单id
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
     * 菜单树形获取
     *
     * @param array   $admin_menu 所有菜单
     * @param integer $menu_pid   菜单父级id
     * 
     * @return array
     */
    public static function toTree($admin_menu, $menu_pid)
    {
        $tree = [];
        foreach ($admin_menu as $k => $v) {
            if ($v['menu_pid'] == $menu_pid) {
                $v['children'] = self::toTree($admin_menu, $v['admin_menu_id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }

    /**
     * 菜单模糊查询
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
     * 菜单精确查询
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
     * 菜单url列表
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
     * 菜单无需权限url列表
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
     * 菜单无需登录url列表
     *
     * @return array
     */
    public static function unloginList()
    {
        $unloginlist_key = 'unloginList';
//        $unloginlist     = AdminMenuCache::get($unloginlist_key);
        $unloginlist = '';
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
