<?php

namespace app\demo3\model;

use think\Model;
use traits\model\SoftDelete;

class Shoppingcart extends Model
{



          public static function addgoods($shoppingcart,$title,$price)
    {

        if($title){
                   $data = [
                    'goodsid'=>$shoppingcart,
                    'title'=>$title,
                    'price'=>$price,
                    'username' => 'test1',
                    'del' => 1,

                ];
       

        }
        else{

            $data = [
                    'goodsid'=>$shoppingcart,
                    'title'=>$title,
                    'price'=>$price,
                    'username' => 'test1',
                    'del' => 0,

                ];
        }

         $insert = Shoppingcart::insert($data);
        return $insert;
    }

          public static function goodsid()
    {
       
        $insert = Shoppingcart:: where('goodsid','<>',' ')   ->  select() ;

        return $insert;
    }



    public function ShopGoods()
    {
    //hasOne 表示一对一关联，参数一表示附表，参数二外键，默认 user_id
    return $this->hasOne(ShopGoods::class,'goodsid');
    }


              public static function shoppingcart()
    {
       $list = shoppingcart::where('title','<>',' ') ->select();
       $del = shoppingcart::where('del','=',0) ->delete();
        return $list;
    }  


                public static function goodsdel($delid,$state)
    {
    
       $del = shoppingcart::where('id','=',$delid) ->delete();
       // $del = shoppingcart::where('state','=',$state) ->delete();
        return $del;
    }


  
}
