<?php

namespace app\admin\controller;

use app\admin\model\CategoryModel;
use app\admin\model\GoodsModel;
use app\admin\validate\GoodsValidate;
use think\Controller;
use think\Request;

class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $db=new GoodsModel();
        $list=$db->paginate();
        $this->assign('list',$list);
        $this->assign('total',$list->total());
       return  $this->fetch();
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
        $validate=new GoodsValidate();
        if(!$validate->check($data)){
            return ['code'=>0,'msg'=>$validate->getError()];
        }
        $db=new GoodsModel();
        $res=$db->_update($data);
        if($res){
            return ['code'=>1,'msg'=>'操作成功'];
        }else{
            return ['code'=>0,'msg'=>'操作失败'];
        }
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $cate=new CategoryModel();
        $list=$cate->field('id,title')->select();
        $this->assign('list',$list);
        return $this->fetch();
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
        $cate=new CategoryModel();
        $list=$cate->field('id,title')->select();
        $this->assign('list',$list);
        $id=$request->param('id');
        $db=new GoodsModel();
        $info=$db->where('id',$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
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
        $db=new GoodsModel();
        $res=$db->where('id',$id)->delete();
        if($res){
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}
