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
        'country',
        'city',
        'budget',
        'num_directors',
        'num_producers',
        'num_cameraman',
        'num_film_editors',
        'num_sound_designers',
        'num_actors',
        'num_extras',
        'pay_directors',
        'pay_producers',
        'pay_cameraman',
        'pay_film_editors',
        'pay_sound_designers',
        'pay_actors',
        'pay_extras',
    ];
  
    function __construct(){
        Audition::setMappingProperties(array(
        'audition_name' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        'description' => [
            'type' => 'string',
            'analyzer' => 'standard'
            ],
        ));
    }
    

    public function agency(){
    	return $this->belongsTo('App\Agency');
    }

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
