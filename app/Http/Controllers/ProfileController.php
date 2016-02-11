<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Address;
use App\Friend;
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
		$this->middleware('blocked');

    }

    /**
     * Show user profile
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
    	$user = User::findOrFail($id);

    	if(
        DB::table('iiww')
        ->where('user_2_id', '=', Auth::user()->id)
        ->where('accepted', '=', 0)
        ->count() 
        )
    	{
    		$user_friends = DB::table('users')
            ->join('iiww', 'users.id', '=', 'iiww.user_1_id')
            ->select('users.*')
            ->where('iiww.user_2_id', '=', Auth::user()->id)
            ->where('iiww.accepted', '=', 0)
            ->get();

        	return view('profile', compact('user', 'user_friends'));    
    	}
    	return view('profile', compact('user'));
    }

    /**
     * [add_friend description]
     * @param Request $request [description]
     */
    public function add_friend(Request $request)
    {
    	$iiww = Friend::create([
    		'user_1_id' => 	Auth::user()->id,
    		'user_2_id' => 	$request->user_2_id,
    		'accepted'	=>	0,
    		]);

    	$user = User::findOrFail($request->user_2_id);
    	return view('profile', compact('user'));

    } 
 
 	/**
 	 * [accept_friend description]
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function accept_friend(Request $request)
 	{
 		$friends = Auth::user()->friends_count;
 		if(empty($friends))
 		{
 			$user = Auth::user()->update(['friends_count' => 0]);
 		}

	 	$iiww = DB::table('iiww')
	        ->where('user_1_id', '=', $request->user_1_id)
	        ->where('user_2_id', '=', Auth::user()->id)
	        ->update(['accepted' => 1]);
 		
 		$friends = Auth::user()->friends_count;
 		$friends += 1;
 		$iiww = Auth::user()->update(['friends_count' => $friends]);

 		$user = User::findOrFail($request->user_1_id);
    	return view('profile', compact('user'));
 	}

 	/**
 	 * [remove_friend description]
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function remove_friend(Request $request)
 	{
 		if(	DB::table('iiww')
            ->where('user_1_id', '=', Auth::user()->id)
            ->where('user_2_id', '=', $request->user_1_id)
            ->where('accepted', '=', 1)
            ->count())
        {
        	$iiww = DB::table('iiww')
	        ->where('user_1_id', '=', Auth::user()->id)
	        ->where('user_2_id', '=', $request->user_1_id)
	        ->delete();

	        $friends = Auth::user()->friends_count;
	 		$friends -= 1;
	 		$iiww = Auth::user()->update(['friends_count' => $friends]);
        }
        elseif(	DB::table('iiww')
                ->where('user_1_id', '=', $request->user_1_id)
                ->where('user_2_id', '=', Auth::user()->id)
                ->where('accepted', '=', 1)
                ->count())
        {
        	$iiww = DB::table('iiww')
	        ->where('user_1_id', '=', $request->user_1_id)
	        ->where('user_2_id', '=', Auth::user()->id)
	        ->delete();
	        
	        $friends = Auth::user()->friends_count;
	 		$friends -= 1;
	 		$iiww = Auth::user()->update(['friends_count' => $friends]);
        }
 			

 		$user = User::findOrFail($request->user_1_id);
    	return view('profile', compact('user'));
 	}

 	/**
 	 * [remove_friend_request description]
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function remove_friend_request(Request $request)
 	{
 		$iiww = DB::table('iiww')
	        ->where('user_1_id', '=', Auth::user()->id)
	        ->where('user_2_id', '=', $request->user_2_id)
	        ->delete();	

 		$user = User::findOrFail($request->user_2_id);
    	return view('profile', compact('user'));
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

		$userId = Auth::user()->id;
        //reindex za elasticsearch
        User::reindex();
        return redirect('/profile/' . $userId);
    }

    /**
     * [update_pic description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update_pic(Request $request)
    {

    	$img_path = 'images/profile_pic/';
    	$pic = $request->file('profile_pic');
    	$img = Image::canvas(300, 300, '#ccc')->save($img_path . 'default.jpg');
    	$img = Image::make($pic)->resize(300, 300)->save($img_path . Auth::user()->id. '.jpg');
    	$user = Auth::user()->update(['profile_pic' => $img_path . Auth::user()->id. '.jpg']);
    
		$userId = Auth::user()->id;
        //reindex za elasticsearch
        User::reindex();
        return redirect('/profile/' . $userId);
    }

}
