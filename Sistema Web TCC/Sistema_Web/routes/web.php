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
    return view('welcome');
});

Route::get('/ajuda', function () {
    return view('ajuda');
});

Route::get('/sobre-nos', function () {
    return view('sobre-nos');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){



Route::resource('voluntrabs', 'VoluntrabController');

Route::resource('doacaos', 'DoacaoController');

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

//pagina para avaliar os usuarios
Route::get('avalia', ['uses' => 'AvaliaUser@avaliauser',
'as'=> 'user.avalia']);

//post para adicionar avaliação
Route::post('avalia', ['uses' => 'AvaliaUser@addavalia',
'as'=> 'user.addavalia']);

//post para setar o trabalho como completado
Route::post('/voluntrabs/complete/{voluntrab}', ['uses' => 'VoluntrabController@complete',
'as'=> 'voluntrab.complete']);

//post para setar a doacao como completado
Route::post('/doacaos/complete/{doacao}', ['uses' => 'DoacaoController@complete',
'as'=> 'doacao.complete']);

//add user na doação
Route::post('doacaos/{doacao}', ['uses' => 'DoacaoUser@adduser',
'as'=> 'doacaos.adduser']);

//remove user na doação
Route::post('voluntrabs/{voluntrab}/delete', ['uses' => 'VoluntrabUser@deleteuser',
'as'=> 'voluntrabs.deleteuser']);

//pagina view doacao de um usuario
Route::get('user/{user}/doacaos', ['uses' => 'DoacaoUser@view',
'as'=> 'doacaos.view']);

});