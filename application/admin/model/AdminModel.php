<?php

namespace app\admin\model;

use think\Model;

class AdminModel extends Model
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
