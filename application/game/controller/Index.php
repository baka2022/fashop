<?php

namespace app\game\controller;

use \think\Request;


class Index 
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];


    public function index()
    {

       return view();
    }

        public function test1()
    {

       return view();
    }
}
