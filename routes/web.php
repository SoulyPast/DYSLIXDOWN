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
// Routes públiques.
Route::get('/privacitat', 'privacitatController@index');
Route::get('/termes', 'privacitatController@termes');
Route::get('/', function () {
    if (Auth::check()){return redirect('/activitats');}
    else{return view('/welcome');}
});

// protegir routes utilitzant auth middleware.
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@getHome');

    /**
     * Routes del perfil de usuari.
     */
    Route::get('/editPerfil','PerfilController@editperfil');
    Route::put('/editPerfil','PerfilController@update');
    Route::get('/editacontrasenya','PerfilController@showcontrasenya');
    Route::put('/editacontrasenya','PerfilController@editacontrasenya');
    Route::get('/perfil','PerfilController@index');

    /**
     * Routes de les activitates.
     */
    Route::get('/activitats','ActivitatController@index');
    Route::get('/activitats/show/{id}', 'ActivitatController@getShow');
    Route::get('/activitats1/show/{codi}', 'ActivitatController@getShow');
    Route::get('/activitats2/show/{codi}', 'ActivitatController@getShow');
    Route::get('/activitats1/ajax/{id}', 'ActivitatController@getShowajax');
    Route::post('/activitats/create','ActivitatController@postCreate');
    Route::get('/activitats/create','ActivitatController@getCreate');
    Route::get('/LesMevesActivitats','ActivitatController@getshowactivitats');
    Route::delete('/activitats/delete/{id}', 'ActivitatController@deleteActivitats');
    Route::get('/activitats/showActivitat/{id}','ActivitatController@getshowactivitat');
    Route::get('/activitat/edita/{id}', 'ActivitatController@getEdit');
    Route::put('/activitat/edita/{id}', 'ActivitatController@putEdit');
    Route::get('/activitat/edita/{id}', 'ActivitatController@getEdit');
    Route::post('/resultat/ajax', 'ActivitatController@postajax');

    /**
     * Routes dels exercicis.
     */
    Route::get('/activitat/show1Exercicis/{id}', 'exercicis@getShow');
    Route::post('/activitat/show1Exercicis/{id}', 'exercicis@postcreate');
    Route::delete('/activitat/show1Exercicis/{id}', 'exercicis@deletexercici');
    Route::put('/activitat/show1Exercicis/{id}', 'exercicis@updateexercici');
    Route::put('/activitat/show1ExercicisEdit/{id}', 'exercicis@putexercici');
    Route::put('/activitat/show1Exercicis/{id}', 'exercicis@putAcabat');
    Route::put('/activitat/show1Exerciciss/{id}', 'exercicis@putNoAcabat');
    Route::get('/activitat/show2Exercicis/{id}', 'exercicis@getShow');
    Route::post('/activitat/show2Exercicis/{id}', 'exercicis2@postcreate');
    Route::put('/activitat/show2ExercicisEdit/{id}', 'exercicis2@putexercici');

    /**
     * Routes de valoracions.
     */
    Route::post('/valoracio/ajax', 'valoracions@postajax');
    Route::get('/valoracio','valoracions@index');

    /**
     * Routes de resultats.
     */
    Route::get('/resultat/{id}','valoracions@show');


    /**
     * Routes de play (Activitats privades).
     */
    Route::get('/play','valoracions@play');
    Route::get('/play/{code}','valoracions@code');

});


