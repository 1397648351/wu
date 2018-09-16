<?php

namespace app\index\controller;

use app\common\controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->gotoView();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
