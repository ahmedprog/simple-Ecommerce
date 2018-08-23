<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InDirect extends Model
{
    protected $fillable = [
        'user_id', 'inDirect_user','level'
    ];
    public function parent(){
        return $this->belongsToMany('App\User', 'id', 'inDirect_user');
     }
     public function child(){
        return $this->hasMany('App\User', 'id','user_id');
     }


    public function childOrders(){
        return $this->hasMany('App\Orders','user_id','user_id');
    }
}
