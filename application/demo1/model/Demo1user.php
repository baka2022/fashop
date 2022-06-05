<?php

namespace app\demo1\model;

use think\Model;
use traits\model\SoftDelete;

class Demo1user extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
        // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

   

  
}
