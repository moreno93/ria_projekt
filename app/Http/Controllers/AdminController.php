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

    //redirect na formu za kreiranje novog usera
    public function create(){
        return view('admin.createUser');
    }


    //spremi usera u bazu
    public function store(AdminUserRequest $request){
        User::create($request->all());

        flash()->success('A new user has been successfully created');
        return redirect('/admin');
    }

    //blokiraj usera ( postavi permission u 1 )
    public function block($id){
        $user = User::findOrFail($id);
        $user->permission = '1';

        $user->save();
        flash()->success('User ' . $user->name .  ' has been blocked');
        return redirect('/admin');
    }

    //odblokiraj usera ( postavi permission u 2 )
    public function unblock($id){
        $user = User::findOrFail($id);
        $user->permission = '2';

        $user->save();
        flash()->success('User ' . $user->name .  ' has been unblocked');
        return redirect('/admin');
    }

}
