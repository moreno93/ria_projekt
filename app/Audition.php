<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Audition extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
    	'audition_name',
    	'description',
    ];

    /*
    protected $mappingProperties = array(
        'audition_name' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        'description' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
    );
    */

    public function agency(){
    	return $this->belongsTo('App\Agency');
    }

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
