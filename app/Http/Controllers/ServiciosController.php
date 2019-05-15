<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Controllers\Controller;

class ServiciosController extends Controller
{
    public function obtenerCategorias(){
        $categorias = Category::all('id','name');
        return $categorias;
    }
}
