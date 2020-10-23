<?php

namespace app\admin\validate;

use think\Validate;

class LoginValidate extends Validate
{
    /**
     * 定义验证规则
     */	
	protected $rule = [
	    'username'=>'require',
	    'password'=>'require|length:6,20',
	    'code'=>'require',
    ];
    
    /**
     * 定义错误信息
     */	
    protected $message = [
        'username.require'=>'用户名不能为空！',
        'password.require'=>'密码不能为空！',
        'password.length'=>'密码长度必须是6到20位！',
        'code.require'=>'验证码不能为空！',
    ];
}
