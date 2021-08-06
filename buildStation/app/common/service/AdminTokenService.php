<?php

namespace app\common\service;

use app\common\cache\AdminUserCache;
use Firebase\JWT\JWT;

class AdminTokenService
{
    /**
     * Token配置
     *
     * @return array
     */
    public static function config()
    {
        $config = AdminSettingService::tokenInfo();

        return $config;
    }

    /**
     * Token生成
     * 
     * @param array $admin_user 用户信息
     * 
     * @return string
     */
    public static function create($admin_user)
    {
        $config = self::config();

        $key = $config['token_key'];                  //密钥
        $iat = time();                                //签发时间
        $nbf = time();                                //生效时间
        $exp = time() + $config['token_exp'] * 3600;  //过期时间

        $data = [
            'admin_user_id' => $admin_user['admin_user_id'],
            'login_time'    => $admin_user['login_time'],
            'login_ip'      => $admin_user['login_ip'],
        ];

        $payload = [
            'iat'  => $iat,
            'nbf'  => $nbf,
            'exp'  => $exp,
            'data' => $data,
        ];

        $token = JWT::encode($payload, $key);

        return $token;
    }

    /**
     * Token验证
     *
     * @param string $token token
     * 
     * @return Exception
     */
    public static function verify($token)
    {
        try {
            $config = self::config();
            $decode = JWT::decode($token, $config['token_key'], array('HS256'));

            $admin_user_id = $decode->data->admin_user_id;


        } catch (\Exception $e) {
            exception('账号登录状态已过期', 405);
        }

        $admin_user = AdminUserCache::get($admin_user_id);

        if (empty($admin_user)) {
            exception('账号登录状态已失效', 405);
        } else {
            if ($token != $admin_user['admin_token']) {

                file_put_contents(date('Ymd').'日志',var_export($token.'------',true),FILE_APPEND);
                file_put_contents(date('Ymd').'日志',var_export('*****'.$admin_user_id.'******',true),FILE_APPEND);

                file_put_contents(date('Ymd').'日志',var_export($admin_user['admin_token'].'++++++',true),FILE_APPEND);

                exception('账号已在另一处登录12', 405);
            } else {
                if ($admin_user['is_disable'] == 1) {
                    exception('账号已被禁用', 401);
                }
                if ($admin_user['is_delete'] == 1) {
                    exception('账号已被删除', 401);
                }
            }



//            if ($admin_user['is_disable'] == 1) {
//                exception('账号已被禁用', 401);
//            }
//            if ($admin_user['is_delete'] == 1) {
//                exception('账号已被删除', 401);
//            }


        }
    }

    /**
     * Token用户id
     *
     * @param string $token token
     * 
     * @return integer admin_user_id
     */
    public static function adminUserId($token)
    {
        try {
            $config = self::config();
            $decode = JWT::decode($token, $config['token_key'], array('HS256'));

            $admin_user_id = $decode->data->admin_user_id;
        } catch (\Exception $e) {
            $admin_user_id = 0;
        }

        return $admin_user_id;
    }
}
