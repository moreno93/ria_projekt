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
    
	Route::get('/profile/phpinfo', function (){
		return phpinfo();
	});

    Route::get('/elasticsearch', function(){
        App\Audition::createIndex($shards = null, $replicas = null);
        return redirect('/home');
    });
    Route::get('/search', 'SearchController@index');
    Route::get('/search/users', 'SearchController@users');
    Route::get('/search/agencies', 'SearchController@agencies');
    Route::get('/search/auditions', 'SearchController@auditions');
    Route::get('/search/advanced', 'SearchController@advanced');
    Route::get('search/location', 'SearchController@searchByLocation');
    Route::get('search/salary', 'SearchController@searchBySalary');

    Route::get('/home', 'HomeController@index');

    Route::get('/profile/{user}', 'ProfileController@show');
    Route::put('/profile/update', 'ProfileController@update');
    Route::put('/profile/update_password', 'ProfileController@update_password');
    Route::post('/profile/update_pic', 'ProfileController@update_pic');
    Route::post('/profile/add_friend', 'ProfileController@add_friend');
    Route::put('/profile/accept_friend', 'ProfileController@accept_friend');
    Route::delete('/profile/remove_friend', 'ProfileController@remove_friend');
    Route::delete('/profile/remove_friend_request', 'ProfileController@remove_friend_request');
    Route::delete('/profile/dont_accept_friend', 'ProfileController@dont_accept_friend');
    
    Route::resource('agencies', 'AgenciesController');
    Route::get('/agencies/user/{user}', 'AgenciesController@userAgency');
    Route::post('/agencies/{id}/update_pic', 'AgenciesController@update_pic');

    Route::resource('auditions', 'AuditionsController');
    Route::get('/auditions/agency/{agency}', 'AuditionsController@listAuditionsOfAgency');
    Route::get('auditions/{auditions}/apply', 'AuditionsController@userApply');
    Route::get('auditions/{auditions}/users', 'AuditionsController@listAppliedUsers');

    Route::resource('admin' , 'AdminController');
    Route::get('/admin/{id}/block', 'AdminController@block');
    Route::get('/admin/{id}/unblock', 'AdminController@unblock');
    Route::resource('adminAgency', 'AdminAgencyController');
});

