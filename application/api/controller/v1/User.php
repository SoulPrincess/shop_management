<?php

namespace app\api\controller\v1;

use app\api\controller\Home;
use app\api\model\UserModel;
use think\Controller;

class User extends Home
{
    public function index(){
        $uid=$this->uid;
        $db=new UserModel();
        $info=$db->where('id',$uid)->field('username')->find();
        return json(['code'=>1,'msg'=>'成功','data'=>$info],200);
    }
}
