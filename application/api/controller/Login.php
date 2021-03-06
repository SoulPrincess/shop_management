<?php

namespace app\api\controller;

use app\api\model\UserModel;
use app\api\validate\LoginValidate;
use Firebase\JWT\JWT;
use think\Controller;
use think\Request;

class Login extends Controller
{
    public function index(Request $request){

        //用户名、密码、查询数据库、返回token值
        //登录接口
        $data=$request->param();
        $validate=new LoginValidate();
        if(!$validate->check($data)){
            return json(['code'=>'0','msg'=>$validate->getError()],400);
        }
        $db=new UserModel();
        $info=$db->where('username',$data['username'])->where('password',$data['password'])->find();
        if($info['password']!=$data['password']){
            return json(['code'=>'0','msg'=>'账号或密码不正确'],400);
        }
        $key = 'api';
        $payload = array(
            "iat" => time(),
            "nbf" => time(),
            'exp'=>time()+60*60*24, //过期时间 一天时间
            'uid'=>$info['id']
        );
        $token = JWT::encode($payload, $key);
        //返回 jwt生成的token
        return json(['code'=>'1','msg'=>'登陆成功','token'=>$token]);
    }
}
