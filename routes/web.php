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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//--------- EVENTOS
// Crear Evento
Route::get('/AgregarEvento', 'EventosController\adminEventosController@create')->name('addEvent');
Route::post('/CreateEvent', 'EventosController\adminEventosController@store');

// Route::get('/Evento/{id}', 'EventosController\adminEventosController@show')->name('eventoEditar');

// ----- Clientes
Route::get('/Asistentes/{id?}', 'ClientesController\attendeesController@show')->name('asistentes');

//Crear
Route::get('/CrearAsistente', 'ClientesController\attendeesController@create')->name('addAttender');
Route::post('/addUser', 'ClientesController\attendeesController@store');

//------ Ratings 
Route::get('/ratingEvento', 'EventosController\adminRatingEventosController@create');

// ------ APi
Route::get('/ratingEvento/Api/{id?}', 'EventosController\adminRatingEventosController@index');
