<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Agency extends Model
{
    use ElasticquentTrait;

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

    public function deleteFromIndex(){
        $this->removeFromIndex();
    }
}
