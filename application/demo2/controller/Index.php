<?php

namespace app\demo2\controller;

use app\common\controller\Frontend;
use think\Db;
use app\index\model\Demo1;
use app\index\model\ShopGoods ;
use app\index\model\Category ;
use app\index\model\Shoppingcart ;
use app\demo2\model\User  as Usermodel ;
use app\demo2\model\Profile ;
use think\Request;
use think\Session;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {


        $User = Usermodel::get(1);
        // 输出User关联模型的属性
        echo $User->Profile->hobby;

    }

        public function login()
    {


        return $this->view->fetch();

    } 


            public function cdx()
    {


       $this->redirect('index/Login');

    } 







           public function checkout()
    {


        $request = Request::instance();
        $user = $request->param('user');
        $pwd = $request->param('pwd');


        // var_dump($user);
        // var_dump($pwd);
        if($user =='admin'&& $pwd == '123456')
        {
            Session::set('user',$user);
            Session::set('pwd',$pwd);
            $this -> success('登录成功 ',url('index/index'));
        }
        else
        {
           $this->error('登录失败');
        }

    }







           public function register()
    {


        return $this->view->fetch();

    }



        public function session()
    {
        
        dump (Session::get('user'));
        dump (Session::get('pwd'));
        
    }




    public function _empty($name)
    {
       $this->redirect('index/Login');
    }





}
