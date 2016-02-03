<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    protected $fillable = [
    	'audition_name',
    	'description',
    ];

    public function agency(){
    	return $this->belongsTo('App\Agency');
    }
}
