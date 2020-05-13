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
    Route::get('/activitats1/show/{id}', 'activitats@getShow');
    Route::get('/activitats1/ajax/{id}', 'activitats@getShowajax');
    Route::post('/activitats/create','activitats@postCreate');
    Route::get('/activitats/create','activitats@getCreate');
    Route::get('/perfil','perfilcontroller@index');
    Route::get('/editPerfil','perfilcontroller@editperfil');
    Route::put('/editPerfil','perfilcontroller@update');
    Route::get('/editacontrasenya','perfilcontroller@showcontrasenya');
    Route::put('/editacontrasenya','perfilcontroller@editacontrasenya');
    Route::get('/LesMevesActivitats','activitats@getshowactivitats');
    Route::delete('/activitats/delete/{id}', 'activitats@deleteActivitats');
    Route::get('/activitats/showActivitat/{id}','activitats@getshowactivitat');
    Route::get('/activitat/edita/{id}', 'activitats@getEdit');
    Route::put('/activitat/edita/{id}', 'activitats@putEdit');
    Route::get('/activitat/edita/{id}', 'activitats@getEdit');
    Route::get('/activitat/show1Exercicis/{id}', 'exercicis@getShow');
    Route::post('/activitat/show1Exercicis/{id}', 'exercicis@postcreate');
    Route::delete('/activitat/show1Exercicis/{id}', 'exercicis@deletexercici');
    Route::put('/activitat/show1ExercicisEdit/{id}', 'exercicis@putexercici');
    Route::put('/activitat/show1Exercicis/{id}', 'exercicis@putRent');
    Route::put('/activitat/show1Exerciciss/{id}', 'exercicis@putReturn');
    Route::get('/activitat/show2Exercicis/{id}', 'exercicis2@getShow');
    Route::post('/activitat/show2Exercicis/{id}', 'exercicis2@postcreate');
    Route::put('/activitat/show2ExercicisEdit/{id}', 'exercicis2@putexercici');
    Route::delete('/activitat/show2Exercicis/{id}', 'exercicis2@deletexercici');
    Route::post('/resultat/ajax', 'activitats@postajax');
});


