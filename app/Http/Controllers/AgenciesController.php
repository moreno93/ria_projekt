<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agency;
use App\Http\Requests\AgencyRequest;
use Illuminate\Support\Facades\Auth;


class AgenciesController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		return redirect('agencies/create');
	}

	//prikazi formu za kreiranje agencije
	public function create(){
        if (Auth::user()->agency()->first()){
            return view('agencies.exists_error');
        }
		return view('agencies.create');
	}

	//spremi agenciju u bazu
	public function store(AgencyRequest $request){
    	
    	Auth::user()->agency()->create($request->all());
    	flash()->success('Agency has been successfully created');
    	return redirect('/');
    }

    //prikaz agencije(profila) po id-u
    public function show($id){
    	$agency = Agency::findOrFail($id);
    	return view('agencies.show', compact('agency'));
    }

    //prikaz forme za uređivanje agencije
    public function edit($id){
    	$agency = Agency::findOrFail($id);
        if (Auth::user()->id != $agency->user_id){
            return redirect('/');
        }
    	return view('agencies.edit', compact('agency'));
    }

    //spremanje promjena u bazu
    public function update($id, AgencyRequest $request){
    	$agency = Agency::findOrFail($id);
    	$agency->update($request->all());
    	flash()->success('Agency has been successfully updated');
    	return redirect('/agencies/' . $id);
    }

    //brisanje agencije po id-u
    public function destroy($id){
        Agency::where('id', $id)->delete();
        flash()->success('Agency has been successfully deleted');
        return redirect('/');
    }

    public function userAgency($id){
        $agency = Agency::where('user_id', $id)->first();    
        return view('agencies.show', compact('agency'));
    }
}
