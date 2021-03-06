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
    	$user_friends = '';
    	$user_friends_a = '';
    	$user_friends_b = '';
    	$user_audition = '';

    	if(DB::table('auditions')
        ->join('audition_user', 'auditions.id', '=', 'audition_user.audition_id')
        ->where('audition_user.user_id', '=', Auth::user()->id)
        ->count()
        )
        {
        	$user_audition = DB::table('auditions')
	        ->join('audition_user', 'auditions.id', '=', 'audition_user.audition_id')
	        ->where('audition_user.user_id', '=', Auth::user()->id)
	        ->get();
        } 
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
    	}
    	if(
        DB::table('iiww')
        ->where('accepted', '=', 1)
        ->count() 
        )
    	{
    		$user_friends_a = DB::table('users')
            ->join('iiww', 'users.id', '=', 'iiww.user_1_id')
            ->select('users.*')
            ->where('iiww.accepted', '=', 1)
            ->where('iiww.user_2_id', '=', Auth::user()->id)
            ->get();    

            $user_friends_b = DB::table('users')
            ->join('iiww', 'users.id', '=', 'iiww.user_2_id')
            ->select('users.*')
            ->where('iiww.accepted', '=', 1)
            ->where('iiww.user_1_id', '=', Auth::user()->id)
            ->get();    
    	}
    	return view('profile', compact('user', 'user_friends', 'user_audition', 'user_friends_a', 'user_friends_b'));
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
 		if($friends == null)
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

	    $user = User::where('id', '=', $request->user_1_id)->get();
	    $user = $user->first();
 		$friends = $user->friends_count;
 		if($friends == null)
 		{
 			$friends = 0;
 		}
 		$friends += 1;
 		$user->friends_count = $friends;
	 	$user->save();
		
 		

 		$user = User::findOrFail($request->user_1_id);
    	return view('profile', compact('user'));
 	}

 	/**
 	 * [dont_accept_friend description]
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function dont_accept_friend(Request $request)
 	{
 		$iiww = DB::table('iiww')
	        ->where('user_1_id', '=', $request->user_1_id)
	        ->where('user_2_id', '=', Auth::user()->id)
	        ->delete();

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

	        $user = User::where('id', '=', $request->user_1_id)->get();
		    $user = $user->first();
	 		$friends = $user->friends_count;
	 		$friends -= 1;
	 		$user->friends_count = $friends;
		 	$user->save();

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

	        $user = User::where('id', '=', $request->user_1_id)->get();
		    $user = $user->first();
	 		$friends = $user->friends_count;
	 		$friends -= 1;
	 		$user->friends_count = $friends;
		 	$user->save();
	        
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
 	 * [update_password description]
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function update_password(Request $request)
 	{
 		$this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'old_password' => 'required|min:6',
        ]);
		
		if(Hash::check($request->old_password, Auth::user()->password))
		{
			$user = Auth::user()->update(['password' => Hash::make($request->password)]);
		}

		$userId = Auth::user()->id;
        return redirect('/profile/' . $userId);

 	}
    /**
     * [edit description]
     * @return [type] [description]
     */
    public function update(Request $request, AddressRequest $Arequest)
    { 	
    	
    	$this->validate($request, [
        	'name' => 'required|max:255',
            'about' => 'min:6|max:1000',
            'portfolio' => 'min:6|max:1000',
            'diploma_certificate' => 'min:6|max:300',
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
    	$user = Auth::user()->update(['portfolio' => $request->portfolio]);
    	$user = Auth::user()->update(['diploma_certificate' => $request->diploma_certificate]);

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
    	//$img = Image::canvas(300, 300, '#ccc')->save($img_path . 'default.jpg');
    	$img = Image::make($pic)->resize(300, 300)->save($img_path . Auth::user()->id. '.jpg');
    	$user = Auth::user()->update(['profile_pic' => $img_path . Auth::user()->id. '.jpg']);
    
		$userId = Auth::user()->id;
        //reindex za elasticsearch
        User::reindex();
        return redirect('/profile/' . $userId);
    }

}
