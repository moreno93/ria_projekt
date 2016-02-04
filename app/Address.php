<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'address';
	
    protected $fillable = [
    	'user_id',
    	'country',
    	'city',
    	'state',
    	'zip_code', 
    	'address_line1',
    	'address_line2',
    ];

    public function user(){
    	$this->belongsTo('App\User');
    }
}
