<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAgencyRequest;

class AdminAgencyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    //prikaz forme za uređivanje agencije
    public function edit($id){
        $agency = Agency::findOrFail($id);

        return view('admin.editAgency', compact('agency'));
    }

    //spremanje promjena u bazu
    public function update($id, AdminAgencyRequest $request){
        $agency = Agency::findOrFail($id);
        $agency->update($request->all());
        //reindex za elasticsearch
        Agency::reindex();
        flash()->success('Agency has been successfully updated');
        return redirect('/admin');
    }

    //brisanje agencije po id-u
    public function destroy($id){
        $agency = Agency::where('id', $id)->get();
        $auditions = Agency::findOrFail($id)->auditions()->get();
        Agency::where('id', $id)->delete();
        //reindex za elasticsearch
        $agency->deleteFromIndex();
        foreach ($auditions as $audition){
            $audition->removeFromIndex();
        }
        flash()->success('Agency has been successfully deleted');
        return redirect('/admin');
    }

    //kreiranje nove agencije
    public function create(){
        return view('agencies.create');
    }
}
