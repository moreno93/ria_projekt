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
}
