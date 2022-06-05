<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Demo1 extends Model
{

    use SoftDelete;
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';



    public static function bbs()
    {
        $list = Demo1::order('id desc')->paginate(3);
        return $list;
    }

    
    public function getcreatetimeAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['refreshtime']) ? $data['createtime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


  
}
