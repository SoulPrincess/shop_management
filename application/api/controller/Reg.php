<?php

namespace app\api\controller;

use app\api\model\UserModel;
use app\api\validate\RegValidate;
use think\Controller;
use think\Request;

class Reg extends Controller
{
    //注册接口
    public function index(Request $request){
        $data=$request->param();
        $validate=new RegValidate();
        if(!$validate->check($data)){
            return json(['code'=>'0','msg'=>$validate->getError()],400);
        }
        $db=new UserModel();
        $res=$db->reg($data);
        if($res){
            return json(['code'=>'1','msg'=>'注册成功'],200);
        }else{
            return json(['code'=>'0','msg'=>'注册失败'],400);
        }
    }
}
