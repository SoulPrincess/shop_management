<?php

namespace app\api\validate;

use think\Validate;

class RegValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username'=>'require|mobile|unique:user',
        'password'=>'require',
        'code'=>'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require'=>'用户名不能为空',
        'username.mobile'=>'手机号有误',
        'username.unique'=>'用户名已存在',
        'password.require'=>'密码不能为空',
        'code.require'=>'验证码必填',
    ];
}
