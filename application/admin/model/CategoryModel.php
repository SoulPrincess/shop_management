<?php

namespace app\admin\model;

use think\Model;

class CategoryModel extends Model
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
    //更新数据
    public function _update($data){
        if(isset($data['id'])){
            //修改
            return $this->save($data,['id'=>$data['id']]);
        }else{
            //添加
            return $this->save($data);
        }
    }
}
