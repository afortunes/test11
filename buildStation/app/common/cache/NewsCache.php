<?php
/*
 * @Description  : 新闻管理缓存
 * @Author       : https://github.com/skyselang
 * @Date         : 2021-04-09
 * @LastEditTime : 2021-04-21
 */

namespace app\common\cache;

use think\facade\Cache;

class NewsCache
{
    /**
     * 缓存key
     *
     * @param integer $news_id 新闻id
     * 
     * @return string
     */
    public static function key($news_id)
    {
        $key = 'News:' . $news_id;

        return $key;
    }

    /**
     * 缓存设置
     *
     * @param integer $news_id 新闻id 
     * @param array   $news    新闻
     * @param integer $ttl     有效时间（秒）
     * 
     * @return bool
     */
    public static function set($news_id, $news, $ttl = 0)
    {
        $key = self::key($news_id);
        $val = $news;
        if (empty($ttl)) {
            $ttl = 0.5 * 24 * 60 * 60;
        }

        $res = Cache::set($key, $val, $ttl);

        return $res;
    }

    /**
     * 缓存获取
     *
     * @param integer $news_id 新闻id
     * 
     * @return array 新闻
     */
    public static function get($news_id)
    {
        $key = self::key($news_id);
        $res = Cache::get($key);

        return $res;
    }

    /**
     * 缓存删除
     *
     * @param integer $news_id 新闻id
     * 
     * @return bool
     */
    public static function del($news_id)
    {
        $key = self::key($news_id);
        $res = Cache::delete($key);

        return $res;
    }
}
