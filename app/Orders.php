<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    
    protected $fillable=['user_id','product_id','amount','transferedby'];
    

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->belongsTo('App\Products');
    }
}
