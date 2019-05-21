<?php

Route::get('/', function () {
    return redirect('login');
})->middleware('auth');

Auth::routes();

//Grupo de Rutas Protegidas para Administrador
Route::middleware(['isAdmin'])->group(function () {
    //CRUD Profesores
    Route::get('/adminpanel', 'CategoryController@index');
    Route::get('/adminpanel/profesores', 'profesoresController@index');
    Route::get('/adminpanel/profesores/create', 'profesoresController@create');
    Route::get('/adminpanel/profesores/edit/{id}', 'profesoresController@edit');
    Route::post('/adminpanel/profesores/store', 'profesoresController@store');
    Route::put('/adminpanel/profesores/{id}', 'profesoresController@update');
    Route::delete('/adminpanel/profesores/{id}', 'profesoresController@destroy');

    //CRUD Categorias
    Route::get('/adminpanel/encargados/', 'CategoryController@index');

    //Encargados
    Route::put('/adminpanel/encargados/{id}', 'CategoryController@update');
    Route::get('/adminpanel/encargados/edit/{id}', 'CategoryController@edit');
    Route::get('/adminpanel/encargados/', 'CategoryController@index')->name('encargados');

    //CRUD de recomendaciones del formulario
    Route::get('/adminpanel/formulario/{id}', 'FormularioController@index2');
    Route::post('/adminpanel/formulario/store', 'FormularioController@store2');
    Route::get('/adminpanel/formulario/edit/{id}', 'FormularioController@edit2');
    Route::put('/adminpanel/formulario/{id}', 'FormularioController@update2');
    Route::delete('/adminpanel/formulario1/{id}', 'FormularioController@destroy2');
    Route::delete('/adminpanel/formulario2/{id}', 'FormularioController@destroy3');

    //CRUD acciones planeadas del formulario
    Route::get('/adminpanel/formulario/edit_ap2/{id}', 'FormularioController@edit_accion_planeada2');
    Route::put('/adminpanel/formulario/store_ap2/{id}', 'FormularioController@update_accion_planeada2');

    //CRUD de reportes
    Route::get('/adminpanel/reportes', 'ReportController@index');
    Route::post('/adminpanel/reportes/generar', 'ReportController@create');
    Route::delete('/adminpanel/reportes/{id}', 'ReportController@destroy');
    
});

//Grupo de Rutas Protegidas para Profesores
Route::middleware(['isProfesor'])->group(function () {
    //Rutas del formulario para las recomendaciones
    Route::get('/formulario', 'FormularioController@index')->name('formulario');
    Route::post('/formulario/store', 'FormularioController@store');
    Route::get('/formulario/edit/{id}', 'FormularioController@edit');
    Route::put('/formulario/{id}', 'FormularioController@update');
    Route::delete('/formulario1/{id}', 'FormularioController@destroy_1');
    Route::delete('/formulario2/{id}', 'FormularioController@destroy_2');

    // Rutad del formulario para las acciones planeadas
    Route::get('/formulario/edit_ap/{id}', 'FormularioController@edit_accion_planeada');
    Route::put('/formulario/store_ap/{id}', 'FormularioController@update_accion_planeada');

});

 //Generar reporte
Route::get('generatepdf', 'ViewsController@generatepdf');

//Rutas para subir archivos
Route::get('file/{id}', 'FileController@index');
Route::post('file/store', 'FileController@store')->name('file.store');
Route::post('file/store2', 'FileController@store2')->name('file.store');
