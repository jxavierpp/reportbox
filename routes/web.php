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

//Rutas del formulario para las recomendaciones
Route::get('/formulario', 'FormularioController@index')->name('formulario');
Route::post('/formulario/store', 'FormularioController@store');
Route::get('/formulario/edit/{id}', 'FormularioController@edit');
Route::put('/formulario/{id}', 'FormularioController@update');
Route::delete('/formulario/{id}', 'FormularioController@destroy');

// Rutad del formulario para las acciones planeadas
Route::get('/formulario/edit_ap/{id}', 'FormularioController@edit_accion_planeada');
Route::put('/formulario/store_ap/{id}', 'FormularioController@update_accion_planeada');

//Rutas del panel de administrador
// Route::get('/adminpanel', 'HomeController@index_panel')->name('panel');

Route::get('/adminpanel', 'CategoryController@index')->name('panel');
Route::get('/adminpanel/profesores', 'profesoresController@index');
Route::get('/adminpanel/profesores/create', 'profesoresController@create');
Route::get('/adminpanel/profesores/edit/{id}', 'profesoresController@edit');
Route::post('/adminpanel/profesores/store', 'profesoresController@store');
Route::put('/adminpanel/profesores/{id}', 'profesoresController@update');
Route::delete('/adminpanel/profesores/{id}', 'profesoresController@destroy');

//Route::resource('/adminpanel/encargados', 'CategoryController');
//Route::resource('categories', 'CategoryController');
Route::put('/adminpanel/encargados/{id}', 'CategoryController@update');
Route::get('/adminpanel/encargados/edit/{id}', 'CategoryController@edit');
Route::get('/adminpanel/encargados/', 'CategoryController@index')->name('encargados');

Route::get('/adminpanel/formulario/{id}', 'FormularioController@index2');
Route::post('/adminpanel/formulario/store', 'FormularioController@store2');
Route::get('/adminpanel/formulario/edit/{id}', 'FormularioController@edit2');
Route::put('/adminpanel/formulario/{id}', 'FormularioController@update2');
Route::delete('/adminpanel/formulario/{id}', 'FormularioController@destroy2');

// Rutad del formulario para las acciones planeadas
Route::get('/adminpanel/formulario/edit_ap2/{id}', 'FormularioController@edit_accion_planeada2');
Route::put('/adminpanel/formulario/store_ap2/{id}', 'FormularioController@update_accion_planeada2');

//Rutas para la generacion de reportes en PDF
Route::get('/adminpanel/reportes', 'ViewsController@index'); //Vista general de todos los reportes generados
Route::get('generatepdf', 'ViewsController@generatepdf');