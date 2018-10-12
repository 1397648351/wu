<?php

namespace app\index\controller;

use app\common\controller\BaseController;
use page\Page;

class IndexController extends BaseController
{
    public function index()
    {
        $data = array([
            'id' => "0",
            'name' => "wu"
        ], [
            'id' => "2",
            'name' => "dd"
        ], [
            'id' => "3",
            'name' => "cc"
        ]);
        // 获取分页显示
        $curpage = input('page') ? input('page') : 1;//当前第x页，有效值为：1,2,3,4,5...
        $listRow = 2;//每页2行记录
        $offset = ($curpage - 1) * $listRow;
        $showdata = array_slice($data, $offset, $listRow, true);
        $list = Page::make($showdata, $listRow, $curpage, count($data));
        $this->assign('list', $list);
        //$this->assign('page', $list->render());
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
