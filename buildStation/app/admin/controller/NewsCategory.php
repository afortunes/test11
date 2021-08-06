<?php

namespace app\admin\controller;

use think\facade\Request;
use app\common\validate\NewsCategoryValidate;
use app\common\service\NewsCategoryService;
use hg\apidoc\annotation as Apidoc;

class NewsCategory extends Base
{
    /**
     * 新闻分类列表
     */
    public function list()
    {
        $page             = Request::param('page/d', 1);
        $limit            = Request::param('limit/d', 10);
        $sort_field       = Request::param('sort_field/s ', '');
        $sort_type        = Request::param('sort_type/s', '');
        $news_category_id = Request::param('news_category_id/d', '');
        $category_name    = Request::param('category_name/s', '');
        $date_type        = Request::param('date_type/s', '');
        $date_range       = Request::param('date_range/a', []);

        $where = [];
        if ($news_category_id) {
            $where[] = ['news_category_id', '=', $news_category_id];
        }
        if ($category_name) {
            $where[] = ['category_name', 'like', '%' . $category_name . '%'];
        }
        if ($date_type && $date_range) {
            $where[] = [$date_type, '>=', $date_range[0] . ' 00:00:00'];
            $where[] = [$date_type, '<=', $date_range[1] . ' 23:59:59'];
        }

        $order = [];
        if ($sort_field && $sort_type) {
            $order = [$sort_field => $sort_type];
        }

        $data = NewsCategoryService::list($where, $page, $limit, $order);

        return success($data);
    }

    /**
     * 新闻分类信息
     */
    public function info()
    {
        $param['news_category_id'] = Request::param('news_category_id/d', '');

        validate(NewsCategoryValidate::class)->scene('info')->check($param);

        $data = NewsCategoryService::info($param['news_category_id']);

        if ($data['is_delete'] == 1) {
            exception('新闻分类已被删除：' . $param['news_category_id']);
        }

        return success($data);
    }

    /**
     * 新闻分类添加
     */
    public function add()
    {
        $param['category_name'] = Request::param('category_name/s', '');
        $param['category_sort'] = Request::param('category_sort/d', 200);

        validate(NewsCategoryValidate::class)->scene('add')->check($param);

        $data = NewsCategoryService::add($param);

        return success($data);
    }

    /**
     * 新闻分类修改
     */
    public function edit()
    {
        $param['news_category_id'] = Request::param('news_category_id/d', '');
        $param['category_name']    = Request::param('category_name/s', '');
        $param['category_sort']    = Request::param('category_sort/d', 200);

        validate(NewsCategoryValidate::class)->scene('edit')->check($param);

        $data = NewsCategoryService::edit($param);

        return success($data);
    }

    /**
     * 新闻分类删除
     */
    public function dele()
    {
        $param['news_category_id'] = Request::param('news_category_id/d', '');

        validate(NewsCategoryValidate::class)->scene('dele')->check($param);

        $data = NewsCategoryService::dele($param['news_category_id']);

        return success($data);
    }

    /**
     * 新闻分类是否隐藏
     */
    public function ishide()
    {
        $param['news_category_id'] = Request::param('news_category_id/d', '');
        $param['is_hide']          = Request::param('is_hide/d', 0);

        validate(NewsCategoryValidate::class)->scene('ishide')->check($param);

        $data = NewsCategoryService::ishide($param);

        return success($data);
    }
}
