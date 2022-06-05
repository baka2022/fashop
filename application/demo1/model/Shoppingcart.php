<?php

namespace app\demo1\model;

use think\Model;
use traits\model\SoftDelete;



class Shoppingcart extends Model
{


        // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
        // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    // 开启软删除
    use SoftDelete;
    protected $deleteTime = 'deletetime';





          public static function addgoods($shoppingcart,$title,$price,$image,$uid)
    {

        $insert = new Shoppingcart;

        $insert -> goodsid = $shoppingcart;
        $insert -> title = $title;
        $insert -> price = $price;
        $insert -> username = $uid;
        $insert -> image = $image;
        


         $insert->save();
        return $insert;
    }


              public static function shoppingcart($username)
    {
       $list = shoppingcart:: where('username',$username)->where('state',0)->where('switch',0)-> select();
        return $list;
    }  


                public static function goodsdel($delid,$state)
    {
    
       $del = shoppingcart::where('id','=',$delid) ->delete();
        return $del;
    }


  
}
