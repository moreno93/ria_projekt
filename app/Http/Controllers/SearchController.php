<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agency;
use App\Audition;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    		User::addAllToIndex();
    	}
        
    	$users = User::search($query);
    	return view('search', compact('users'));
    }

    public function agencies(){
    	$query = session('query');
    	if (!Agency::typeExists()){
    		Agency::addAllToIndex();
    	}
    	$agencies = Agency::search($query);
    	return view('search', compact('agencies'));
    	
    }

    public function auditions(){
    	$query = session('query');

    	if (!Audition::typeExists()){
    		Audition::addAllToIndex();
    	}
    	$auditions = Audition::search($query);
    	return view('search', compact('auditions'));
    }

    public function advanced(){
        return view('advanced_search');
    }

    public function searchByLocation(Request $request){
        $query = $request->input('query');
        $auditions = Audition::searchByQuery([
        'multi_match' => [
            'query' => $query,
            'fields' => ['country', 'city']
        ]
    ]);
    return view('search', compact('auditions'));
    }

    public function searchBySalary(Request $request){
        $query = intval($request->input('query'));
        $profession = Auth::user()->profession;
        
    switch ($profession){
        case 'Director':
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_directors' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;

        case 'Producer':
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_producers' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;

        case 'Cameraman':
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_cameraman' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;

        case 'Film editor':
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_film_editors' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;

        case 'Sound designer':
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_sound_designers' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;

        case 'Actor';
            $auditions = Audition::searchByQuery([
                'range' => [ 
                    'pay_actors' =>[
                        'gte' => $query
                    ]
                ]
            ]);
            return view('search', compact('auditions'));
            break;
        }   
    }
}
