<?php

namespace app\demo3\model;

use think\Model;
use traits\model\SoftDelete;

class ShopGoods extends Model
{

      public static function ShopGoods($id)
    {
    	$id = $id;
        $list = ShopGoods::  where('category_id',$id) ->select();
        return $list;
    }


    
          public static function search($search)
    {
        $list = ShopGoods:: where('title','like','%'.$search.'%')->select();
        return $list;
    }


      public static function details($id)
    {
        $id = $id;
        $list = ShopGoods::  where('id',$id) ->select();
        return $list;
    }


      public static function shoppingcart($goodsid)
    {

        // foreach($goodsid as $v){
        //     // $id = $v['goodsid'];
            
             
        // }
    $list = ShopGoods::where('id',3)-> select();
        return $list;
    }







  
}
