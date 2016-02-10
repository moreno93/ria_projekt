<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agency;
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

    	$option = $request->input('search_option');
    	$query = $request->input('query');

    	if($option == 'users'){
    		return redirect('/search/users')->with('query', $query);
    	}

    	else if($option == 'agencies'){
    		return redirect('/search/agencies')->with('query', $query);
    	}

    	else if($option == 'auditions'){
    		return redirect('/search/auditions')->with('query', $query);
    	}
    }


    public function users(){
    	$query = session('query');
    	if (!User::typeExists()){
    		User::putMapping($ignoreConflicts = true);
    		User::addAllToIndex();
    	}
    	$users = User::search($query);
    	return view('search', compact('users'));
    }

    public function agencies(){
    	$query = session('query');
    	if (!Agency::typeExists()){
    		Agency::putMapping($ignoreConflicts = true);
    		Agency::addAllToIndex();
    	}
    	$agencies = Agency::search($query);
    	return view('search', compact('agencies'));
    	
    }

    public function auditions(){
    	$query = session('query');

    	if (!Audition::typeExists()){
    		Audition::putMapping($ignoreConflicts = true);
    		Audition::addAllToIndex();
    	}
    	$auditions = Audition::search($query);
    	return view('search', compact('auditions'));
    }

}
