<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;


class User extends Authenticatable
{
    use ElasticquentTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profession',
        //'permission',
        'about',
        'profile_pic',
        'interests',

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function agency(){
        return $this->hasOne('App\Agency');
    }

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function isAnAdmin(){

        if (Auth::user()->permission == "5"){
            return true;
        }
        else
            return false;
    }
    public function isBlocked(){
        if (Auth::user()->permission == "1"){
            return true;
        }
        else
            return false;
    }

    public function auditions(){
        return $this->belongsToMany('App\Audition');
    }
}
