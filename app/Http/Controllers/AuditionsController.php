<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audition;
use App\Http\Requests\AuditionRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuditionsController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		return Audition::all();
	}

	//prikazi formu za kreiranje audicije
	public function create(){
		return view('auditions.create');
	}

	//spremi agenciju u bazu
	public function store(AuditionRequest $request){
    	Auth::user()->agency()->first()->auditions()->create($request->all());
    	flash()->success('Audition has been successfully posted');
    	return redirect('/');
    }

    //prikaz audicije po id-u
    public function show($id){
    	$audition = Audition::findOrFail($id);
    	return view('auditions.show', compact('audition'));
    }

    //prikaz forme za uređivanje audicije
    public function edit($id){

    	$audition = Audition::findOrFail($id);
    	if (Auth::user()->agency()->first()->id != $audition->agency_id){
            return redirect('/');
        }
    	return view('auditions.edit', compact('audition'));
    }

    //spremanje promjena u bazu
    public function update($id, AuditionRequest $request){
    	$audition = Audition::findOrFail($id);
    	$audition->update($request->all());
    	flash()->success('Audition has been successfully updated');
    	return redirect('/auditions/' . $id);
    }

    //brisanje agencije po id-u
    public function destroy($id){
        Audition::where('id', $id)->delete();
        flash()->success('Audition has been successfully deleted');
        return redirect('/');
    }

    public function listAuditionsOfAgency($id){
        $auditions = Audition::where('agency_id', $id)->latest()->get();   
        return view('auditions.list', compact('auditions'));
    }
}