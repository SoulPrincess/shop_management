<?php

namespace app\admin\controller;

use app\admin\model\PermissionModel;
use app\admin\validate\PermissionValidate;
use think\Controller;
use think\Request;

class Permission extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $db=new PermissionModel();
        $list=$db->order('create_time desc')->paginate();
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
        $db=new PermissionModel();
        $list=$db->where('pid',0)->select();
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
        $validate=new PermissionValidate();
        if(!$validate->check($data)){
            return ['code'=>0,'msg'=>$validate->getError()];
        }
        $db=new PermissionModel();
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
        $db=new PermissionModel();
        $list=$db->where('pid',0)->select();
        $this->assign('list',$list);
        $id=$request->param('id');
        $db=new PermissionModel();
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
        $db=new PermissionModel();
        $res=$db->where('id',$id)->delete();
        if($res){
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}
