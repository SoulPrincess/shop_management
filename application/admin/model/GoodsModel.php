<?php

namespace app\admin\model;

use think\Model;

class GoodsModel extends BaseModel
{
    protected $table='goods';
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
