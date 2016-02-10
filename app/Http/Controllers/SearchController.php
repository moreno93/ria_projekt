<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audition;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('blocked');
	}

    public function index(Request $request){
    	$query = $request->input('query');
    	if (!Audition::typeExists()){
    		//Audition::putMapping($ignoreConflicts = true);
    		Audition::addAllToIndex();
    	}
    	$auditions = Audition::search($query);

    	return $auditions;
    }
}
