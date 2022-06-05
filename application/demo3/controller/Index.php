<?php

namespace app\demo3\controller;

use app\common\controller\Frontend;
use think\Db;
use app\demo3\model\Demo1;
use app\demo3\model\ShopGoods ;
use app\demo3\model\Category ;
use app\demo3\model\Shoppingcart ;
use think\Request;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {

            // $this->redirect(url('/demo1/index'), []);

         
         // 模糊搜索
        $request = Request::instance();
        $search = $request->param('search');
        $result = ShopGoods::search($search);
        $this -> assign('result',$result);

        // 导航栏
        $list = Category::Category();
        $this -> assign('list',$list);

        return $this->view->fetch();

    }


        public function view()
    {

        // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);


        // 分类显示
        $id = input('id');
        $view = ShopGoods::ShopGoods($id);
        
        $this -> assign('view',$view);
        return $this->view->fetch();

    }





        public function search()
    {
       
         // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);


         // 模糊搜索
        $request = Request::instance();
        $search = $request->param('search');
        $result = ShopGoods::search($search);
        $this -> assign('result',$result);
        
        return $this->view->fetch();

    }


            public function details()
    {
       
         // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);


        //详情页 

        $id = input('id');
        $details = ShopGoods::details($id);
        $this -> assign('details',$details);

      //购物车

        $request = Request::instance();
        $shoppingcart = $request->param('shoppingcart');
        $title = $request->param('title');
        $price = $request->param('price');
        $addgoods = shoppingcart::addgoods($shoppingcart,$title,$price);
        
        return $this->view->fetch();
    }

        public function shoppingcart()
    {

        // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);

        // $goodsid = shoppingcart::goodsid();

        // var_dump ($goodsid);

        $shoppingcart = shoppingcart::shoppingcart();
        $this -> assign('shoppingcart',$shoppingcart);
        // return json($shoppingcart);

        // 删除订单
        $request = Request::instance();
        $delid = $request->param('delid');
        $state = $request->param('state');
        // echo $delid;
        // echo $state;
        $goodsdel = shoppingcart::goodsdel($delid,$state);

        return $this->view->fetch();

    }


            public function orders()
    {

        // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);



        return $this->view->fetch();

    }





}
