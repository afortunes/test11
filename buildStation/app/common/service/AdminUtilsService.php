<?php

namespace app\common\service;

use think\facade\Db;
use think\facade\Cache;
use app\common\utils\IpInfoUtils;

class AdminUtilsService
{
    /**
     * 随机字符串
     *
     * @param array $param 字符串参数
     * 
     * @return array
     */
    public static function strrand($param)
    {
        $ids = $param['strrand_ids'];
        $len = $param['strrand_len'];

        $str_arr = [
            1 => '0123456789',
            2 => 'abcdefghijklmnopqrstuvwxyz',
            3 => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            4 => '`~!@#$%^&*()-_=+\|[]{};:' . "'" . '",.<>/?',
        ];

        $ori = '';
        foreach ($ids as $v) {
            $ori .= $str_arr[$v];
        }
        $ori = str_shuffle($ori);

        $str = '';
        $str_len = strlen($ori) - 1;
        for ($i = 0; $i < $len; $i++) {
            $str .= $ori[mt_rand(0, $str_len)];
        }

        $data['ori'] = $ori;
        $data['len'] = $len;
        $data['str'] = $str;

        return $data;
    }

    /**
     * 字符串转换
     *
     * @param string $str 字符串
     *
     * @return array
     */
    public static function strtran($str = '')
    {
        if ($str == '') {
            $str = 'yylAdmin';
        }

        $rev = '';
        $len = mb_strlen($str, 'utf-8');

        for ($i = $len - 1; $i >= 0; $i--) {
            $rev = $rev . mb_substr($str, $i, 1, 'utf-8');
        }

        $data['str']   = $str;
        $data['len']   = $len;
        $data['lower'] = strtolower($str);
        $data['upper'] = strtoupper($str);
        $data['rev']   = $rev;
        $data['md5']   = md5($str);

        return $data;
    }

    /**
     * 时间戳转换
     *
     * @param array $param
     * 
     * @return array
     */
    public static function timestamp($param)
    {
        $type  = $param['type'] ?: 'timestamp';
        $value = $param['value'] ?: time();

        $data['type']  = $type;
        $data['value'] = $value;

        if ($type == 'timestamp') {
            $data['datetime']  = date('Y-m-d H:i:s', $value);
            $data['timestamp'] = $value;
        } else {
            $data['datetime']  = $value;
            $data['timestamp'] = strtotime($value);
        }

        return $data;
    }

    /**
     * 字节转换
     *
     * @param array $param 类型、数值
     *
     * @return array
     */
    public static function bytetran($param)
    {
        $type  = $param['type'] ?: 'B';
        $value = $param['value'] ?: 1024;

        $hex_b = 8;
        $hex_B = 1024;

        $data['type']  = $type;
        $data['value'] = $value;

        if ($type == 'B') {
            $data['B']  = $value;
            $data['b']  = $data['B'] * $hex_b;
            $data['KB'] = $data['B'] / $hex_B;
            $data['MB'] = $data['KB'] / $hex_B;
            $data['GB'] = $data['MB'] / $hex_B;
            $data['TB'] = $data['GB'] / $hex_B;
        } elseif ($type == 'KB') {
            $data['KB'] = $value;
            $data['B']  = $data['KB'] * $hex_B;
            $data['b']  = $data['B'] * $hex_b;
            $data['MB'] = $data['KB'] / $hex_B;
            $data['GB'] = $data['MB'] / $hex_B;
            $data['TB'] = $data['GB'] / $hex_B;
        } elseif ($type == 'MB') {
            $data['MB'] = $value;
            $data['KB'] = $data['MB'] * $hex_B;
            $data['B']  = $data['KB'] * $hex_B;
            $data['b']  = $data['B']  * $hex_b;
            $data['GB'] = $data['MB'] / $hex_B;
            $data['TB'] = $data['GB'] / $hex_B;
        } elseif ($type == 'GB') {
            $data['GB'] = $value;
            $data['MB'] = $data['GB'] * $hex_B;
            $data['KB'] = $data['MB'] * $hex_B;
            $data['B']  = $data['KB'] * $hex_B;
            $data['b']  = $data['B'] * $hex_b;
            $data['TB'] = $data['GB'] / $hex_B;
        } elseif ($type == 'TB') {
            $data['TB'] = $value;
            $data['GB'] = $data['TB'] * $hex_B;
            $data['MB'] = $data['GB'] * $hex_B;
            $data['KB'] = $data['MB'] * $hex_B;
            $data['B']  = $data['KB'] * $hex_B;
            $data['b']  = $data['B'] * $hex_b;
        } else {
            $data['b']  = $value;
            $data['B']  = $data['b'] / $hex_b;
            $data['KB'] = $data['B'] / $hex_B;
            $data['MB'] = $data['KB'] / $hex_B;
            $data['GB'] = $data['MB'] / $hex_B;
            $data['TB'] = $data['GB'] / $hex_B;
        }

        return $data;
    }

    /**
     * IP查询
     *
     * @param array $param ip、域名
     *
     * @return array
     */
    public static function ipinfo($ip = '')
    {
        $ipinfo = IpInfoUtils::info($ip);

        return $ipinfo;
    }

    /**
     * 服务器信息
     *
     * @return array
     */
    public static function server()
    {
        $server_key = 'Utils:server';
        $server = Cache::get($server_key);
        if (empty($server)) {
            try {
                $mysql = Db::query('select version() as version');
                $server['mysql'] = $mysql[0]['version']; //mysql
            } catch (\Throwable $th) {
                $server['mysql'] = '';
            }

            $server['system_info']         = php_uname('s') . ' ' . php_uname('r');     //os
            $server['server_software']     = $_SERVER['SERVER_SOFTWARE'];               //web
            $server['php_version']         = PHP_VERSION;                               //php
            $server['server_protocol']     = $_SERVER['SERVER_PROTOCOL'];               //protocol
            $server['ip']                  = $_SERVER['SERVER_ADDR'];                   //ip
            $server['domain']              = $_SERVER['SERVER_NAME'];                   //domain
            $server['port']                = $_SERVER['SERVER_PORT'];                   //port
            $server['php_sapi_name']       = php_sapi_name();                           //php_sapi_name
            $server['max_execution_time']  = get_cfg_var('max_execution_time') . '秒 '; //max_execution_time
            $server['upload_max_filesize'] = get_cfg_var('upload_max_filesize');        //upload_max_filesize
            $server['post_max_size']       = get_cfg_var('post_max_size');              //post_max_size

            $server_ttl = 12 * 60 * 60;
            Cache::set($server_key, $server, $server_ttl);
        }

        $cache_key = "Utils:cache";
        $cache = Cache::get($cache_key);
        if (empty($cache)) {
            $config = Cache::getConfig();
            if ($config['default'] == 'redis') {
                $Cache = Cache::handler();
                $cache = $Cache->info();

                $byte['type']  = 'B';
                $byte['value'] = $cache['used_memory_lua'];

                $cache['used_memory_lua_human'] = AdminUtilsService::bytetran($byte)['KB'] . 'K';
                $cache['uptime_in_days']        = $cache['uptime_in_days'] . '天';
            } elseif ($config['default'] == 'memcache') {
                $Cache = Cache::handler();
                $cache = $Cache->getstats();

                $cache['time']           = date('Y-m-d H:i:s', $cache['time']);
                $cache['uptime']         = $cache['uptime'] / (24 * 60 * 60) . ' 天';
                $cache['bytes_read']     = AdminUtilsService::bytetran(['type' => 'B', 'value' => $cache['bytes_read']])['MB'] . ' MB';
                $cache['bytes_written']  = AdminUtilsService::bytetran(['type' => 'B', 'value' => $cache['bytes_written']])['MB'] . ' MB';
                $cache['limit_maxbytes'] = AdminUtilsService::bytetran(['type' => 'B', 'value' => $cache['limit_maxbytes']])['MB'] . ' MB';
            } elseif ($config['default'] == 'wincache') {
                $Cache = Cache::handler();

                $cache['wincache_info']['wincache_fcache_meminfo'] = wincache_fcache_meminfo();
                $cache['wincache_info']['wincache_ucache_meminfo'] = wincache_ucache_meminfo();
                $cache['wincache_info']['wincache_rplist_meminfo'] = wincache_rplist_meminfo();
            }

            $cache['type'] = $config['default'];

            Cache::set($cache_key, $cache, 30);
        }

        $data = array_merge($server, $cache);

        return $data;
    }
}
