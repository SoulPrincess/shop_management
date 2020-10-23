<?php

namespace app\admin\validate;

use think\Validate;

class CateValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title'=>'require',
        'sort'=>'require|number',
        'img'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require'=>'标题不能为空！',
        'sort.require'=>'排序不能为空！',
        'sort.length'=>'排序必须是数字',
        'img.require'=>'请上传图片',
    ];
}
