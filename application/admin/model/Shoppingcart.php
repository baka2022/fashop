<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Shoppingcart extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'shoppingcart';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'state_text',
        'del_text'
    ];
    

    
    public function getStateList()
    {
        return ['0' => __('State 0'), '1' => __('State 1'), '2' => __('State 2')];
    }

    public function getDelList()
    {
        return ['0' => __('Del 0'), '1' => __('Del 1')];
    }


    public function getStateTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['state']) ? $data['state'] : '');
        $list = $this->getStateList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getDelTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['del']) ? $data['del'] : '');
        $list = $this->getDelList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
