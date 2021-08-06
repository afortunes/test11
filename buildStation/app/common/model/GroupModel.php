<?php

namespace app\common\model;

use think\Model;

class GroupModel extends Model
{
    protected $name = 'group';

    /**
     * @Field("group_id")
     */
    public function id()
    {
    }
    
    /**
     * @Field("group_id,group_name,group_sort,create_time,update_time")
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
     * @Field("group_name,group_sort")
     */
    public function add()
    {
    }

    /**
     * @Field("group_id,group_name,group_sort")
     */
    public function edit()
    {
    }

    /**
     * @Field("group_id")
     */
    public function dele()
    {
    }

    /**
     * @Field("group_id")
     */
    public function ishide()
    {
    }
}
