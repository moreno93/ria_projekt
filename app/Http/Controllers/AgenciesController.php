<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agency;
use App\Http\Requests\AgencyRequest;
use Illuminate\Support\Facades\Auth;
use Image;
use Hash;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class AgenciesController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
        $this->middleware('blocked');
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
        $id = Auth::user()->id;
        //reindex za elasticsearch
        Agency::reindex();
    	flash()->success('Agency has been successfully created');
    	return redirect('/agencies/user/' . $id);
    }

    //prikaz agencije(profila) po id-u i dohvaćanje usera za prikaz podataka
    public function show($id){
    	$agency = Agency::findOrFail($id);
        $user_id = DB::table('agencies')->where('id', $id)->pluck('user_id');
        $user = User::where('id', $user_id)->first();
    	return view('agencies.show', compact('agency', 'user'));
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
        //reindex za elasticsearch
        Agency::reindex();
    	flash()->success('Agency has been successfully updated');
    	return redirect('/agencies/' . $id);
    }

    //brisanje agencije po id-u
    public function destroy($id){
        $agency = Agency::where('id', $id)->get();
        $auditions = Agency::findOrFail($id)->auditions()->get();
        Agency::where('id', $id)->delete();
        //izbrisi index iz elasticsearcha
        $agency->deleteFromIndex();
        foreach ($auditions as $audition){
            $audition->removeFromIndex();
        }
        flash()->success('Agency has been successfully deleted');
        return redirect('/');
    }

    public function userAgency($id){
        $agency = Agency::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        return view('agencies.show', compact('agency', 'user'));
    }

    /**
     * [update_pic description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update_pic($id, Request $request)
    {
        $agency = Agency::findOrFail($id);
        $img_path = 'images/agency_pic/';
        $pic = $request->file('agency_pic');
        //$img = Image::canvas(300, 300, '#ccc')->save($img_path . 'default.jpg');
        $img = Image::make($pic)->resize(300, 300)->save($img_path . $agency->id. '.jpg');
        $agency = $agency->update(['agency_pic' => $img_path . $agency->id. '.jpg']);

        return redirect('/agencies/user/' . $userId);
    }
}
