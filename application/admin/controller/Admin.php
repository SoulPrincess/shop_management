<?php

namespace app\admin\controller;

use app\admin\model\AdminModel;
use app\admin\model\RoleModel;
use app\admin\validate\AdminValidate;
use think\Controller;
use think\Request;

class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $db=new AdminModel();
        $list=$db->order('create_time desc')->paginate();
        foreach($list as $k=>$v){
            $list_role=(new RoleModel())->where('id','in',$v['role_id'])->field('name')->select();
            $arr1=json_decode($list_role,true);
            $arr = array_map('array_shift',$arr1);
            $v['role_name']=implode(',',$arr);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $role=new RoleModel();
        $list=$role->field('id,name')->where('id','>',1)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data=$request->param();
        $validate=new AdminValidate();
        if(!$validate->check($data)){
            return ['code'=>0,'msg'=>$validate->getError()];
        }
        $db=new AdminModel();
        $res=$db->_update($data);
        if($res){
            return ['code'=>1,'msg'=>'操作成功'];
        }else{
            return ['code'=>0,'msg'=>'操作失败'];
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit(Request $request)
    {
        $role=new RoleModel();
        $list=$role->field('id,name')->where('id','>',1)->select();
        $this->assign('list',$list);
        $id=$request->param('id');
        $db=new AdminModel();
        $info=$db->where('id',$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        $id=$request->param('id');
        $db=new AdminModel();
        $res=$db->where('id',$id)->delete();
        if($res){
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}
