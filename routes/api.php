<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addEvento', 'EventosController\adminRatingEventosController@store');

//Api de informacion de evntos con sessiones
Route::get('/infoEventosAPI', 'Api\apiController@infoEvento');

//Api de registro a un evento
Route::post('/registroEventos', 'Api\apiController@registroEvent');

//Api mostrar eventos de un usuario
Route::get('/EventosRegistrados', 'Api\apiController@showEventsUser');

//Api colocar una nueva calificacion
Route::post('/EventosRating','Api\apiController@userRatingEvent');

//Api Visitante crea un usuario
Route::post('/crearUsuario', 'Api\apiController@createUser');