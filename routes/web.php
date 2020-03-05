<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Test Route - Admin//

Route::group(['middleware'=> ['role:administrator']], function () {
Route::resource('database/codehacking', 'CodehackingDBController');
Route::get('database/codehacking/{codehacking}/{id}', 'CodehackingDBController@records');
Route::patch('database/codehacking/{codehacking}/{id}/update', 'CodehackingDBController@recordsupdate');
});
/////////////////////////////

//Test Route - DB//
Route::resource('database/support', 'SupportDBController');
Route::get('database/support/{support}/{id}', 'SupportDBController@records');
Route::patch('database/support/{support}/{id}/update', 'SupportDBController@recordsupdate');

////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//User Profile//
Route::resource('profile', 'UserProfileController');
