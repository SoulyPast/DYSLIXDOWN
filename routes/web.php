<?php

use Illuminate\Support\Facades\Route;
use App\Role;
use App\User;
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


Auth::routes();
Route::get('/privacitat', 'privacitatController@index');
Route::get('/termes', 'privacitatController@termes');
Route::get('/', function () {
    if (Auth::check()){
        return redirect('/activitats');
    }else{
        return view('/welcome');
    }
});


Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@getHome');
    Route::get('/prueba','HomeController@prueba');
    Route::get('/activitats','activitats@index');
    Route::get('/activitats/show/{id}', 'activitats@getShow');
    Route::post('/activitats/create','activitats@postCreate');
    Route::get('/activitats/create','activitats@postCreate');
    Route::get('/perfil','perfilcontroller@index');
    Route::get('/editPerfil','perfilcontroller@editperfil');
    Route::put('/editPerfil','perfilcontroller@update');
    Route::get('/editacontrasenya','perfilcontroller@showcontrasenya');
    Route::put('/editacontrasenya','perfilcontroller@editacontrasenya');

});


