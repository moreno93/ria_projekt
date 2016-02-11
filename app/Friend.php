<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'iiww';
	
    protected $fillable = [
    	'user_1_id',
    	'user_2_id',
    	'accepted',
    ];

    public function user(){
    	$this->belongsTo('App\User');
    }
}
