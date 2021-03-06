<?php

namespace app\admin\controller;

use app\admin\model\AdminModel;
use app\admin\model\PermissionModel;
use app\admin\model\RoleModel;
use think\Controller;
use think\Request;

class Base extends Controller
{
    protected function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        if(!session('aid')){
            $this->redirect(url('Login/index'));
        }
        $routes=session('routes');
        $request=   new Request();
        $controller=$request->Controller();
        $action=$request->action();
        $path=$controller.$action;
        $r=$this->array_multi_search($path,$routes);
        if($r){
            $routes=$this->list_to_tree($routes);
            $this->assign('routes',$routes);
        }else{
            $this->error('没有权限！',url('index/index'));
        }

    }
    /*
     * @params $str
     * @params $arr
     * @return bool
     * 判断字符串是否在数组中，包括二维数组及多维数组*/
    public function array_multi_search($str,$arr){
        if(in_array($str,$arr)){
            return true;
        }
        foreach($arr as $k=>$v){
            if($this->array_multi_search($str,$v)){
                return true;
            }
        }
        return false;
    }
    /*
     * @params $list
     * @params $pk
     * @params $pid
     * @params $root
     * @return array
     * 将数组转为树
     * */
    public function list_to_tree($list, $pk = 'id', $pid = 'pid',  $root = 0){
        $tree = array();
        if (is_array($list)) {
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[ $data[ $pk ] ] = &$list[ $key ];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[ $pid ];
                if ($root == $parentId) {
                    $tree[ $data[ $pk ] ] = &$list[ $key ];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = &$refer[ $parentId ];
                        $parent['child'][] = &$list[ $key ];
                    }
                }
            }
        }
        return $tree;
    }
}
