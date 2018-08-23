<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $fillable=['image','product_id'];
    public function products(){
        return $this->belongsTo('App\Products');
    }
}
