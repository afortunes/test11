<?php

namespace app\common\model;

use think\Model;
use hg\apidoc\annotation\Field;

class RegionModel extends Model
{
    protected $name = 'region';

    /**
     * @Field("region_id")
     */
    public function id()
    {
    }

    /**
     * @Field("region_id,region_pid,region_path,region_name,region_pinyin,region_jianpin,region_initials,region_citycode,region_zipcode,region_sort")
     */
    public function list()
    {
    }

    /**
     * 
     */
    public function info()
    {
    }

    /**
     * @Field("region_pid,region_level,region_name,region_pinyin,region_jianpin,region_initials,region_citycode,region_zipcode,region_longitude,region_latitude,region_sort")
     */
    public function add()
    {
    }

    /**
     * @Field("region_id,region_pid,region_level,region_name,region_pinyin,region_jianpin,region_initials,region_citycode,region_zipcode,region_longitude,region_latitude,region_sort")
     */
    public function edit()
    {
    }

    /**
     * @Field("region_id")
     */
    public function dele()
    {
    }
}
