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

    function __construct(){
        Agency::setMappingProperties(array(
        'agency_name' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        'description' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        'headquarters' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        'foundation_year' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        ));
    }

    public function user(){
    	$this->belongsTo('App\User');
    }

    public function auditions(){
        return $this->hasMany('App\Audition');
    }
}
