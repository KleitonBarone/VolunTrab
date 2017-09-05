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
    return view('home');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){



Route::resource('voluntrabs', 'VoluntrabController');

Route::get('/home', 'HomeController@index')->name('home');

//show user
Route::get('user/{user}', ['uses' => 'UserController@show',
'as'=> 'users.show']);

//edit user
Route::get('user/{user}/edit', ['uses' => 'UserController@edit',
'as'=> 'users.edit']);

//update user
Route::put('user/{user}/edit', ['uses' => 'UserController@update',
'as'=> 'users.update']);

//add user no trabalho
Route::post('voluntrabs/{voluntrab}', ['uses' => 'VoluntrabUser@adduser',
'as'=> 'voluntrabs.adduser']);

//remove user no trabalho
Route::post('voluntrabs/{voluntrab}/delete', ['uses' => 'VoluntrabUser@deleteuser',
'as'=> 'voluntrabs.deleteuser']);

//pagina view trabalhos de um usuario
Route::get('user/{user}/trabalhos', ['uses' => 'VoluntrabUser@view',
'as'=> 'users.view']);

});