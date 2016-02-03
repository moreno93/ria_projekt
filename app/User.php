<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profession', 'permission'
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

    public function isATeamManager(){

        return true;
    }
}
