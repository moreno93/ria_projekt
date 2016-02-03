<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Address;
use App\Http\Requests;
use App\Http\Requests\AddressRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('profile');
    }

    /**
     * [edit description]
     * @return [type] [description]
     */
    public function update(Request $request, AddressRequest $Arequest)
    {
    	Auth::user()->update($request->all());
		Auth::user()->address()->address_line1 = $Arequest->address_line1;
		Auth::user()->address()->address_line2 = $Arequest->address_line2;
		Auth::user()->address()->city = $Arequest->city;
		Auth::user()->address()->state = $Arequest->state;
		Auth::user()->address()->zip_code = $Arequest->zip_code;
		Auth::user()->address()->country = $Arequest->country;
		
        return redirect('/profile');
    }
}
