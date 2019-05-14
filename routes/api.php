<?php

use Illuminate\Http\Request;

Route::get('categorias', 'ServiciosController@obtenerCategorias');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


