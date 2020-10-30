<?php
namespace app\admin\behavior;
use app\admin\model\AdminModel;
use app\admin\model\PermissionModel;
use app\admin\model\RoleModel;
/*权限钩子*/
class Rbac{
    public function run($params)
    {
        $aid=$params['id'];
        if($aid==1){
            $per=(new PermissionModel())->field(['id','name','url','pid','type'])->select()->toArray();//获取所属权限
        }else{
            $adminmodel=new AdminModel();
            $role_ids=$adminmodel->where('id',$aid)->value('role_id');
            $role_names=(new RoleModel())->where('id','in',$role_ids)->select();
            $arr=[];
            foreach($role_names as $k=>$v){
                $perid=explode(',',$v['perid']);
                foreach($perid as $k1=>$v1){
                    array_push($arr,$v1);
                }
            }
            $arr=array_unique($arr);
            $per=(new PermissionModel())->field(['id','name','url','pid','type'])->where('id','in',$arr)->select()->toArray();//获取所属权限
        }
        $arrs['url']='index/index';
        $arrs['id']='9999';
        $arrs['pid']='9999';
        $arrs['name']='首页';
        $arrs['type']=0;
        array_push($per,$arrs);
        session('routes',$per);
    }
}
?>