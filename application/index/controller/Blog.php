<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use app\index\model\Blog as blogmodel;
use think\Request;

class Blog extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        if (Request::instance()->isPost()){
            $request = Request::instance();
            $title = $request->param('title');
            $content = $request->param('content');
            $list = blogmodel::add($title,$content);
        }
        
        $list = blogmodel::blog();
        $this -> assign('list',$list);
        return $this->view->fetch();

    }

}
