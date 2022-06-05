<?php

namespace app\demo1\controller;

use app\common\controller\Frontend;
use think\Db;
use app\demo1\model\Demo1;
use app\demo1\model\ShopGoods ;
use app\demo1\model\Category ;
use app\demo1\model\Shoppingcart ;
use app\demo1\model\Demo1user as Usermodel ;
use think\Request;
use think\Session;
use think\Cookie;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';


    // 测试页
    public function test()
    {

       dump( session::get());
       dump( cookie::get());

    }




// 主页
    public function index()
    {
         // 模糊搜索
        $request = Request::instance();
        $search = $request->param('search');
        // dump($search);
        $result = ShopGoods::search($search);
        $this -> assign('result',$result);
        // 导航栏
        $list = Category::Category();
        $this -> assign('list',$list);
        return $this->view->fetch();

    }

// 分类页
        public function view()
    {



         // 模糊搜索
        $request = Request::instance();
        $search = $request->param('search');
// dump($search);
        if($search)
        {

            $id = input('id');
            $view = ShopGoods::search($search);

            $this -> assign('view',$view);
        }
        else
        {
                    // 分类显示
                    $id = input('id');
                    $view = ShopGoods::ShopGoods($id);
                    $this -> assign('view',$view);
        }




        // 导航栏
        $list = Category::Category();
        $this -> assign('list',$list);



        return $this->view->fetch();

    }



// 搜素框

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


        $user = cookie::get('user');
        // dump($user);
        // echo 111;

        return $this->view->fetch();

    }

// 详情页
            public function details()
    {

         // 导航栏

        $list = Category::Category();
        $this -> assign('list',$list);


        //详情页

        $id = input('id');
        $details = ShopGoods::details($id);
        $this -> assign('details',$details);

         //购物车数据库

        $request = Request::instance();
        $shoppingcart = $request->param('shoppingcart');
        $title = $request->param('title');
        $price = $request->param('price');
        $image = $request->param('image');
        $uid = Usermodel::where('username',cookie::get('user'))->value('id');

        $id = shoppingcart::where('goodsid',$shoppingcart) ->column('price');
         // dump($id);
        $username = Usermodel::where('username',cookie::get('user')) ->value('id');
       // dump($username);
        $username = shoppingcart::where('username',$username) ->select();


                    if($title)
                    {
                                if($id and $username)
                            {
                                $this-> success('该商品已经加入购物车，或者已支付',url('index/cart'));

                            }
                            else
                            {

                                            if(!Cookie::get('user'))
                                            {
                                                $this-> error('请登录',url('index/login'));
                                            }
                                            else
                                            {
                                                $addgoods = shoppingcart::addgoods($shoppingcart,$title,$price,$image,$uid);
                                                $this->redirect('index/cart');
                                            }


                            }
                    }


        return $this->view->fetch();
    }


// 账户登录
        public function login()
    {

             if(Cookie::get('user'))
            {
                 $this->redirect('index/cart');
            }

        return $this->view->fetch();

    }
// 账户登出
        public function logout()
    {

        Cookie::delete('user');
        Cookie::delete('pwd');
        $this -> success('退出成功 ',url('index/index'));
    }


// 账号登录验证
     public function check()
    {


        $request = Request::instance();
        $user = $request->param('user');
        $pwd = $request->param('pwd');

         if($user and $pwd)
         {

            $result =  Usermodel::where('username',$user) ->find();
            if($result)
            {
                $result=$result->toarray();
                if($pwd == $result['password'])
                {
                    // Session::set('login.user',$user);
                    // Session::set('login.pwd',$pwd);
                     Cookie::set('user',$user,2000);
                     Cookie::set('pwd',$pwd,2000);


                   $this -> success('登录成功 ',url('index/cart'));
                }
                else
                {
                    $this->error('登录失败,密码错误');
                }
            }
            else
            {
                $this->error('登录失败,用户名不存在');
            }

         }
         else
         {
           $this->error('登录失败,用户名或密码不能为空');
         }





    }


// 账户注册
        public function register()
    {



        return $this->view->fetch();

    }



// 账户注册验证
        public function registercheck()
    {
            $request = Request::instance();
             $user = $request->param('user');
             $pwd = $request->param('pwd');
             // dump($user);
             // dump($pwd);

            if($user and $pwd)
             {

                $result =  Usermodel::where('username',$user) ->select();
                if($result)
                {
                    $this->error('注册失败,用户名已注册');
                }
                else
                {
                    $db = new Usermodel;
                    $db->username = $user;
                    $db ->password =$pwd;
                    $db = $db -> save();
                     $this -> success('注冊成功 ',url('index/login'));
                }

             }
             else
             {
               $this->error('注册失败,用户名或密码不能为空');
             }
    }



// 个人中心
        public function center()
    {



        return $this->view->fetch();

    }


// 购物车
        public function cart()
    {

             if(!Cookie::get('user'))
            {
                $this -> error('请登录 ',url('index/login'));
            }
            else
            {
                        $username = Usermodel::where('username',cookie::get('user')) ->value('id');
                        // dump($username);
                       // 读取购物车表信息
                        $shoppingcart = shoppingcart::shoppingcart($username);
                        $this -> assign('shoppingcart',$shoppingcart);


                        // 删除订单
                        $request = Request::instance();
                        $delid = $request->param('delid');
                        $state = $request->param('state');
                        // echo $delid;
                        // echo $state;
                        $goodsdel = shoppingcart::goodsdel($delid,$state);
                        if($goodsdel)
                        {
                            $this -> success('删除成功 ',url('index/cart'));
                        }
            }



        $name =  cookie::get('user');
        $money = Usermodel::where('username',$name) ->value('money');

        $this -> assign('name',$name);
        $this -> assign('money',$money);

        return $this->view->fetch();

    }
//生成订单号
 public   function generateOrderSn(): string
 {
        $yearCode = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K"];
        //生成规则年（转换成一个大写字母来缩短长度）+月（转换为十六进制数）+日+当前时间戳的后
        //几位+当前的微秒数（小数点后面的5位）+一个两位的随机year的算法
        $year = $yearCode[date("Y") - 2018]; //用A表示2018年等，目的是缩短订单号
        $month = strtoupper(dechex(date("m")));//十六进制
        $day = date("d");
        $sec = substr(time(), -5); //取时间戳的后5位，因为前面的大至不会改变
        [$micr, $second] = explode(" ", microtime());
        $microsec = substr($micr, 2, 5);//取得微秒数小数点后面的5位数
        $rand = random_int(10, 99);
        $orderSn = $year . $month . $day . $sec . $microsec . $rand . uniqid('', true);
        return $orderSn;
    }


// 支付页面
    public function pay()
    {
        $request = Request::instance();
        // 订单地址
        $address = $request->param('address');
        // 订单手机号
        $mobile = $request->param('mobile');

        //订单id
        $id = $request->param('id');
        // 商品id
        $goodsid = $request->param('goodsid');

        if($address and  $mobile)
        {

                    // 添加订单地址
                    $gdb = shoppingcart::get($id);
                    $gdb ->address = $address;
                    $gdb ->mobile = $mobile;
                    $gdb->save();



                    // 更新会员地址
                    $uid = Usermodel::where('username',cookie::get('user')) ->value('id');
                    $udb = Usermodel::get($uid);
                    // dump($db);
                    $udb ->address = $address;
                    $udb ->mobile = $mobile;
                    $udb->save();


        }

        else
        {
             $this -> success('地址和手机号不能为空 ');
        }





        $price = shoppingcart::where('id',$id)->value('price');
        $this -> assign('price',$price);
        $this -> assign('goodsid',$id);




$num = $this->generateOrderSn();
    $title = Shoppingcart::where('id',$id)->value('title') ;
//        dump($num);
        $params = [
            'amount'=>"$price",
            'orderid'=>"$num",
            'type'=>"alipay",
            'title'=>"$title",
            'notifyurl'=>"notifyx",
            'returnurl'=>"returnx",
            'method'=>"web",
            'openid'=>"用户的OpenID",
            'auth_code'=>"$id"
        ];
        echo \addons\epay\library\Service::submitOrder($params);




//        return $this->view->fetch();

    }


// 支付校验
        public function paycheck()
    {



        // 判断是否支付
        $request = Request::instance();
        $pay = $request->param('pay');

        $id = session::get('alipayorderdata');
        $id = $id["auth_code"];


        if($pay)
        {
            // 更改支付状态
           $db = shoppingcart::get($id);
           $db ->state = 1;
           $db->save();
            $this -> redirect('index/cart');
        }
        else
        {
//            $this -> error('支付失败 ',url('index/cart'));
        }


//      $this -> success('支付成功 ',url('index/cart'));
            return $this->view->fetch();

    }





// 订单状态查询
        public function order()
    {


        // 判断是否发货返回值是订单id
       $id = shoppingcart::where('switch',1)->column('id');
       $nid = shoppingcart::where('switch',0)->column('id');

       $username = Cookie::get('user');
       $username = Usermodel::where('username',$username)->value('id');
        $data =[];
        if ($id)
        {
            foreach($id as $key => $value)
            {


                $price = shoppingcart::where('id',$value)->where('username',$username)->value('price');
                $title = shoppingcart::where('id',$value)->where('username',$username)->value('title');
                $image = shoppingcart::where('id',$value)->where('username',$username)->value('image');
                $goodsid = shoppingcart::where('id',$value)->where('username',$username)->value('goodsid');
                $id = shoppingcart::where('id',$value)->where('username',$username)->value('id');

                if($title)
                {
                    $data[$key] = [
                        'price' => $price,
                        'title' => $title,
                        'image' => $image,
                        'goodsid' => $goodsid,
                        'id' => $id,
                        'state' => '已发货',
                    ];
                }
            }

        }


        if ($nid)
        {
            foreach($nid as $key => $value)
            {


                $price = shoppingcart::where('id',$value)->where('username',$username)->value('price');
                $title = shoppingcart::where('id',$value)->where('username',$username)->value('title');
                $image = shoppingcart::where('id',$value)->where('username',$username)->value('image');
                $goodsid = shoppingcart::where('id',$value)->where('username',$username)->value('goodsid');
                $id = shoppingcart::where('id',$value)->where('username',$username)->value('id');

                if($title)
                {
                    $data[$key] = [
                        'price' => $price,
                        'title' => $title,
                        'image' => $image,
                        'goodsid' => $goodsid,
                        'id' => $id,
                        'state' => '未发货',
                    ];
                }
            }

        }



         $this -> assign('data',$data);
        return $this->view->fetch();

    }

// 收货确认
    public function confirm()
    {

        $request = Request::instance();
        $id = $request->param('id');
        $db = shoppingcart::where('id',$id)->delete();
        $this -> success('已确认收货 ',url('index/order'));


    }


// 订单校验
    public function checkout()
    {
        // 显示商品信息
        $request = Request::instance();
        $id = $request->param('id');
        $price = Shoppingcart::where('id',$id)->value('price');
        $title = Shoppingcart::where('id',$id)->value('title');
        $goodsid = Shoppingcart::where('id',$id)->value('goodsid');
        // dump($price);
        $this -> assign('price',$price);
        $this -> assign('title',$title);
        $this -> assign('goodsid',$goodsid);
        $this -> assign('id',$id);





        // 订单详情
         $name =  cookie::get('user');
         // dump($name);
         $address = Usermodel::where('username',$name)->value('address');
         $mobile = Usermodel::where('username',$name)->value('mobile');
         // dump($address);
        $this -> assign('name',$name);
        $this -> assign('address',$address);
        $this -> assign('mobile',$mobile);

        return $this->view->fetch();

    }



}
