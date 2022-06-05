<?php 
namespace app\demo2\model;

use think\Model;

class User extends Model
{
    public function profile()
    {
        return $this->hasOne('Profile');
    }
}