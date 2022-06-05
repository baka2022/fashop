<?php

namespace app\demo1\model;

use think\Model;
use traits\model\SoftDelete;

class Category extends Model
{

      public static function Category()
    {
        $list = Category::where('type','shop_goods')->select();
        return $list;
    }

  
}
