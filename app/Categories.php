<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable =['catName'];


    public function producs(){
        return $this->hasMany('App\Products');
    }
}
