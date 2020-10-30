<?php

namespace app\admin\model;

use think\facade\Hook;

class AdminModel extends BaseModel
{
    protected $table='admin';
    //登录
    public function login($data){
        $info=$this->where(['username'=>trim($data['username'])])->find();
        if(!$info){
            return false;
        }
        if($info['password']!=md5(trim($data['password']))){
            return false;
        }
        session('aid',$info['id']);
        session('aname',$info['username']);
        $param['id']=$info['id'];
        Hook::exec('app\admin\behavior\Rbac',$param);
        return true;
    }
    //状态属性
    public function getstatusAttr($value)
    {
        if($value==1){
            return '启用';
        }else{
            return '禁用';
        }
    }
    //密码加密保存
    public function setPasswordAttr($V)
    {
        return md5($V);
    }
    //角色属性
    public function setRoleIdAttr($value)
    {
        return implode(',',$value);
    }
//    public function getRoleIdAttr($value)
//    {
//        if(!empty($value)){
//            return explode(',',$value);
//        }
//
//    }
}
