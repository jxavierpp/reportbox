<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use APP\User;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //'categories.id as idCategory',
        // $categoriesInfo = DB::table('categories')
        // ->select('categories.id as categoryID', 'categories.name as categoryName',
        //  'users.name as userName')
        // ->leftJoin('users', 'categories.encargado', '=', 'users.id')
        // ->get();

        $categorias = Category::all();
        return view('panel.category.index', compact('categorias'));

        // $categories = Category::all();

        // return view('panel.index', compact('categories'));
    }


    public function edit($id)
    {
        $categoria = Category::findOrFail($id);
        $usuarios = DB::table('users')->select('id', 'name')->get();

        return view('panel.category.edit', compact('categoria', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update( $request->all() );

        return redirect()->route('encargados');
        
    }

}
