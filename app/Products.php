<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=['name','price','offer','description','categories_id'];

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function images(){
        return $this->hasOne('App\images','product_id');
    }

    public function orders(){
        return $this->hasMany('App\Orders');
    }
}
