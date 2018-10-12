<?php

namespace app\home\controller;

use app\common\controller\BaseController;
use think\facade\Env;

class IndexController extends BaseController
{
    public function index()
    {
        $path = '/static/dist/images/xiezhen/xinggan';
        $dir = Env::get('root_path') . 'public' . $path;
        $data = scandir($dir);
        if ($data) {
            array_splice($data, 0, 2);
            rsort($data);
        } else
            $data = array();
        for ($i = 0; $i < count($data); $i++) {
            $str = preg_replace('/\d{5}/', "", $data[$i]);
            $data[$i] = [
                'name' => $str,
                'path' => $data[$i],
                'src' => $path . '/' . $data[$i] . '/001.jpg'
            ];
        }
        // 获取分页显示
        $list = $this->get_page($data, 30);
        $this->assign('list', $list);
        //$this->assign('page', $list->render());
        return $this->fetch();
    }

    public function xiezhen()
    {
        $name = $this->request->param('name');
        $str = preg_replace('/\d{5}/', "", $name);
        $path = '/static/dist/images/xiezhen/xinggan/' . $name;
        $dir = Env::get('root_path') . 'public' . $path;
        $data = scandir($dir);
        if ($data) {
            array_splice($data, 0, 2);
        } else
            $data = array();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = $path . '/' . $data[$i];
        }
        $this->assign('name', $str);
        $this->assign('list', $data);
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
