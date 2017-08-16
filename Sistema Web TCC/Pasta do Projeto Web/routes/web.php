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

Route::group(['middleware' => 'web'], function (){

    Route::get('/', function () {
        return view('home');
    });
    
    Route::get('/logar', function () {
        return view('logar');
    });

    Route::get('/instituicaos/login', 'InstituicaoController@login');

    Route::post('/instituicaos/login', 'InstituicaoController@postLogin');

    Route::get('/instituicaos/logout', 'InstituicaoController@logout');

    Auth::routes();
    
    Route::get('/home', 'HomeController@index');

    Route::resource('instituicaos', 'InstituicaoController');

});
