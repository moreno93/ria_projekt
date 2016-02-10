<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Address;
use App\Http\Requests;
use App\Http\Requests\AddressRequest;
use App\Http\Controllers\Controller;
use Image;
use Hash;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    	
    	$this->validate($request, [
        	'name' => 'required|max:255',
            'about' => 'max:300',
            'password' => 'required|confirmed|min:6',
        ]);

        $this->validate($Arequest, [
        	'address_line1' => 'max:255',
            'address_line2' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'zip_code' => 'min:5|max:5',
            'country' => 'max:255',
        ]);

    	$user = Auth::user()->update(['name' => $request->name]);
    	$user = Auth::user()->update(['about' => $request->about]);
    	//$user = Auth::user()->update(['name' => $request->name]);
    	$user = Auth::user()->update(['password' => Hash::make($request->password)]);	

    	$address = Auth::user()->address()->update(['address_line1' => $Arequest->address_line1]);
		$address = Auth::user()->address()->update(['address_line2' => $Arequest->address_line2]);
		$address = Auth::user()->address()->update(['city' => $Arequest->city]);
		$address = Auth::user()->address()->update(['state' => $Arequest->state]);
		$address = Auth::user()->address()->update(['zip_code' => $Arequest->zip_code]);
		$address = Auth::user()->address()->update(['country' => $Arequest->country]);

        return redirect('/profile');
    }

    public function update_pic(Request $request)
    {

    	$img_path = 'images/profile_pic/';
    	$pic = $request->file('profile_pic');
    	$img = Image::canvas(300, 300, '#ccc')->save($img_path . 'default.jpg');
    	$img = Image::make($pic)->resize(300, 300)->save($img_path . Auth::user()->id. '.jpg');
    	$user = Auth::user()->update(['profile_pic' => $img_path . Auth::user()->id. '.jpg']);
    
		return redirect('/profile');
    }

}
