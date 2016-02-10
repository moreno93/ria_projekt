<?php

namespace App\Http\Controllers;

use App\User;
use App\Agency;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        $agencies = Agency::all();
        return view('admin.adminIndex', compact('users','agencies'));
    }

    //prikaz forme za uređivanje korisnika
    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));
    }

    //spremanje promjena u bazu
    public function update($id, AdminUserRequest $request){

        $user = User::findOrFail($id);
        $user->update($request->all());
        flash()->success('User has been successfully updated');
        return redirect('/admin');
    }

    //brisanje usera po id-u
    public function destroy($id){
        User::where('id', $id)->delete();
        flash()->success('User has been successfully deleted');
        return redirect('/admin');
    }



}
