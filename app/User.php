<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','govid','refeler_id','mobile','status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        return $this->hasMany('App\Orders');
    }
//every user has many refeler(child)
    public function parent(){
        return $this->hasOne('App\User','id','refeler_id');
    }
//every refeler has one parent

    public function refeler()
    {
       return $this->belongsTohasMany('App\User', 'id','refeler_id');
    }
//every user has one Status

    public function status()
    {
       return $this->hasOne('App\stasus','id','status_id');
    }
//every user has one Commession row
  
    public function commession()
    {
       return $this->hasOne('App\Commession');
    }
}
