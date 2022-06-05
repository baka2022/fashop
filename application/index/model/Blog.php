<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Blog extends Model
{

    use SoftDelete;
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';



    public static function blog()
    {
        $list = Blog::order('id desc')->paginate(10);
        return $list;
    }

        public static function add($title,$content)
    {
        $user           = new Blog;
        $user->title     = $title;
        $user->content    = $content;
        $user->save();
        // 获取自增ID
        // echo $user->id;
    }

    
    public function getcreatetimeAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['refreshtime']) ? $data['createtime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


  
}
