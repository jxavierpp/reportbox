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
        // $categorias = Category::all();
        $usuarios = DB::table('users')->select('id', 'name')->get();
        // $users_temp = User::all();
        // $users = [];
        // foreach($users as $user){
        //     foreach($categorias as $categoria){
        //         if($user->id == $categoria->encargado){
        //             return 
        //             array_push($users_ban, $user);
        //         }
        //     }
        // }
        // return $users;

        return view('panel.category.edit', compact('categoria', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'encargado' => ['string', 'max:255', 'unique:categories'],
        ));

        Category::findOrFail($id)->update( $request->all() );

        return redirect()->route('encargados');
        
    }

}
