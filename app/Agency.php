<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
    	'agency_name',
    	'agency_pic',
    	'description',
    	'headquarters', 
    	'foundation_year',
    ];


    public function user(){
    	$this->belongsTo('App\User');
    }

    public function auditions(){
        return $this->hasMany('App\Audition');
    }
}
