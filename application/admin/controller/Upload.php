<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Upload extends Base
{
    /**
     * 上传文件
     */
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../public/uploads');
        if($info){
           $path='/uploads/'.$info->getSaveName();
           return ['code'=>1,'msg'=>'上传成功！','url'=>$path];
        }else{
            return ['code'=>0,'msg'=>$file->getError()];
        }
    }
}
