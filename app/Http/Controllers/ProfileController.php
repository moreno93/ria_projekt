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
    	$user = Auth::user()->update($request->all());
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
