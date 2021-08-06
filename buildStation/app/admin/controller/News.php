<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\NewsValidate;
use app\common\service\NewsService;
use app\common\service\NewsCategoryService;
use hg\apidoc\annotation as Apidoc;

class News extends Base
{
    /**
     * 新闻列表
     */
    public function list()
    {
        $page             = Request::param('page/d', 1);
        $limit            = Request::param('limit/d', 10);
        $sort_field       = Request::param('sort_field/s ', '');
        $sort_type        = Request::param('sort_type/s', '');
        $news_id          = Request::param('news_id/d', '');
        $title            = Request::param('title/s', '');
        $news_category_id = Request::param('news_category_id/d', '');
        $date_type        = Request::param('date_type/s', '');
        $date_range       = Request::param('date_range/a', []);

        $where = [];
        if ($news_id) {
            $where[] = ['news_id', '=', $news_id];
        }
        if ($title) {
            $where[] = ['title', 'like', '%' . $title . '%'];
        }
        if ($news_category_id !== '') {
            $where[] = ['news_category_id', '=', $news_category_id];
        }
        if ($date_type && $date_range) {
            $where[] = [$date_type, '>=', $date_range[0] . ' 00:00:00'];
            $where[] = [$date_type, '<=', $date_range[1] . ' 23:59:59'];
        }

        $order = [];
        if ($sort_field && $sort_type) {
            $order = [$sort_field => $sort_type];
        }

        $data = NewsService::list($where, $page, $limit, $order);

        return success($data);
    }

    /**
     * 新闻分类
     */
    public function category()
    {
        $data = NewsCategoryService::list([], 1, 9999, []);

        return success($data);
    }

    /**
     * 新闻信息
     */
    public function info()
    {
        $param['news_id'] = Request::param('news_id/d', '');

        validate(NewsValidate::class)->scene('info')->check($param);

        $data = NewsService::info($param['news_id']);

        if ($data['is_delete'] == 1) {
            exception('新闻已被删除：' . $param['news_id']);
        }

        return success($data);
    }

    /**
     * 新闻添加
     */
    public function add()
    {
        $param['news_category_id'] = Request::param('news_category_id/d', 0);
        $param['img']              = Request::param('img/s', '');
        $param['title']            = Request::param('title/s', '');
        $param['intro']            = Request::param('intro/s', '');
        $param['author']           = Request::param('author/s', '');
        $param['time']             = Request::param('time/s', '');
        $param['source']           = Request::param('source/s', '');
        $param['source_url']       = Request::param('source_url/s', '');
        $param['sort']             = Request::param('sort/d', 200);
        $param['content']          = Request::param('content/s', '');

        validate(NewsValidate::class)->scene('add')->check($param);

        $data = NewsService::add($param);

        return success($data);
    }

    /**
     * 新闻修改
     */
    public function edit()
    {
        $param['news_id']          = Request::param('news_id/d', '');
        $param['news_category_id'] = Request::param('news_category_id/d', 0);
        $param['img']              = Request::param('img/s', '');
        $param['title']            = Request::param('title/s', '');
        $param['intro']            = Request::param('intro/s', '');
        $param['author']           = Request::param('author/s', '');
        $param['time']             = Request::param('time/s', '');
        $param['source']           = Request::param('source/s', '');
        $param['source_url']       = Request::param('source_url/s', '');
        $param['sort']             = Request::param('sort/d', 200);
        $param['content']          = Request::param('content/s', '');

        validate(NewsValidate::class)->scene('edit')->check($param);

        $data = NewsService::edit($param);

        return success($data);
    }

    /**
     * 新闻删除
     */
    public function dele()
    {
        $param['news_id'] = Request::param('news_id/d', '');

        validate(NewsValidate::class)->scene('dele')->check($param);

        $data = NewsService::dele($param['news_id']);

        return success($data);
    }

    /**
     * 新闻上传文件
     */
    public function upload()
    {
        $param['type'] = Request::param('type/s', 'image');
        $param['file'] = Request::file('file');

        if ($param['type'] == 'image') {
            $param['image'] = $param['file'];

            validate(NewsValidate::class)->scene('image')->check($param);
        } else {
            validate(NewsValidate::class)->scene('file')->check($param);
        }

        $data = NewsService::upload($param);

        return success($data);
    }

    /**
     * 新闻是否置顶
     */
    public function istop()
    {
        $param['news_id'] = Request::param('news_id/d', '');
        $param['is_top']  = Request::param('is_top/d', 0);

        validate(NewsValidate::class)->scene('istop')->check($param);

        $data = NewsService::istop($param);

        return success($data);
    }

    /**
     * 新闻是否热门
     */
    public function ishot()
    {
        $param['news_id'] = Request::param('news_id/d', '');
        $param['is_hot']  = Request::param('is_hot/d', 0);

        validate(NewsValidate::class)->scene('ishot')->check($param);

        $data = NewsService::ishot($param);

        return success($data);
    }

    /**
     * 新闻是否推荐
     */
    public function isrec()
    {
        $param['news_id'] = Request::param('news_id/d', '');
        $param['is_rec']  = Request::param('is_rec/d', 0);

        validate(NewsValidate::class)->scene('isrec')->check($param);

        $data = NewsService::isrec($param);

        return success($data);
    }

    /**
     * 新闻是否隐藏
     */
    public function ishide()
    {
        $param['news_id'] = Request::param('news_id/d', '');
        $param['is_hide'] = Request::param('is_hide/d', 0);

        validate(NewsValidate::class)->scene('ishide')->check($param);

        $data = NewsService::ishide($param);

        return success($data);
    }
}
