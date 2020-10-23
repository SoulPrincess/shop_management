<?php

namespace app\api\model;

use think\Model;

class UserModel extends Model
{
    protected $table='user';
    public function reg($data){
        $data['status']=1;
        return $this->save($data);
    }
}
