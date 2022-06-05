<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use app\index\model\Demo1;

class Bbs extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $list = Demo1::bbs();
        $this -> assign('list',$list);
        return $this->view->fetch();

    }

}
