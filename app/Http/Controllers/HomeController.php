<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(!($address = Auth::user()->address()->update(['user_id' => Auth::user()->id])))
        {
            $address = Auth::user()->address()->create(['user_id' => Auth::user()->id]);
        }
        return view('home');
    }

}
