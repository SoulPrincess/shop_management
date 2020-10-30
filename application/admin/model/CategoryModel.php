<?php

namespace app\admin\model;

use think\Model;

class CategoryModel extends BaseModel
{
    protected $table='category';

    public function getstatusAttr($value)
    {
        if($value==1){
            return '启用';
        }else{
            return '禁用';
        }
    }
}
