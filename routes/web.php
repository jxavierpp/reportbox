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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas del formulario
Route::get('/formulario', 'FormularioController@index')->name('formulario');
Route::post('/formulario/store', 'FormularioController@store');
Route::get('/formulario/edit/{id}', 'FormularioController@edit');
Route::put('/formulario/{id}', 'FormularioController@update');
Route::delete('/formulario/{id}', 'FormularioController@destroy');


Route::get('/formulario/edit_ap/{id}', 'FormularioController@edit_accion_planeada');
Route::put('/formulario/store_ap/{id}', 'FormularioController@update_accion_planeada');
