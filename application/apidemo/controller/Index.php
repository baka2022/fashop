<?php

namespace app\apidemo\controller;


use app\common\controller\Frontend;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {



        $params = [
            'amount'=>"999.9",
            'orderid'=>"177",
            'type'=>"alipay",
            'title'=>"订单标题",
            'notifyurl'=>"回调地址",
            'returnurl'=>"http://101.33.235.116/addons/epay/api/returnx/type/alipay",
            'method'=>"web",
            'openid'=>"用户的OpenID",
            'auth_code'=>"验证码"
        ];
        echo \addons\epay\library\Service::submitOrder($params);

    }



}
