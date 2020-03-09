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

// //Test Route - Admin//

// Route::group(['middleware'=> ['role:administrator']], function () {
// Route::resource('database/codehacking', 'CodehackingDBController');
// Route::get('database/codehacking/{codehacking}/{id}', 'CodehackingDBController@records');
// Route::patch('database/codehacking/{codehacking}/{id}/update', 'CodehackingDBController@recordsupdate');


Route::get('database/{db_name}', 'DBAccessController@get_tables')->name('tables.list');
Route::get('database/{db_name}/{table_name}', 'DBAccessController@get_records')->name('records.list');
Route::get('database/{db_name}/{table_name}/{record_id}', 'DBAccessController@edit_records')->name('records.edit');

////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//User Profile//
Route::resource('profile', 'UserProfileController');

//User Management//
Route::resource('users', 'UsersController');

Route::resource('tasks', 'TasksController');

