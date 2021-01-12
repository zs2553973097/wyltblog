<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersAccess extends Model{
    protected $table = "usersaccess";
    protected $fillable = [];
    public $timestamps = false;
    
    public function getToken($uid, $time){
        $data = $this->where("uid", $uid)->where("expire_time", ">", $time)->first();
        if(!$data){
            return null;
        }
        return $data["token"];
    }
}