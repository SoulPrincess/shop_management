<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Base
{
    /**
     * @return bool
     */
    public function Index()
    {
        return $this->fetch();
    }
}
