<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {
    //
});
*/
Route::group(['middleware' => 'web'], function () {
	Route::get('/', function () {
    return view('welcome');
	});
	
    Route::auth();
    Route::get('/', function () {
    return view('welcome');
	});
	Route::get('/profile/phpinfo', function (){
		return phpinfo();
	});
    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::put('/profile/update', 'ProfileController@update');
    Route::post('/profile/update_pic', 'ProfileController@update_pic');
    Route::resource('agencies', 'AgenciesController');
    Route::get('/agencies/user/{user}', 'AgenciesController@userAgency');

    Route::resource('auditions', 'AuditionsController');
    Route::get('/auditions/agency/{agency}', 'AuditionsController@listAuditionsOfAgency');
    Route::get('auditions/{auditions}/apply', 'AuditionsController@userApply');
    Route::get('auditions/{auditions}/users', 'AuditionsController@listAppliedUsers');

    Route::resource('admin' , 'AdminController');
});

