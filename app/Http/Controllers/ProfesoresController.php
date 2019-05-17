<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesoresController extends Controller
{
    public function index()
    {
        $usersInfo = DB::table('users')
        ->select('categories.encargado as categoryEncargado', 'categories.name as categoryName',
         'users.name as userName', 'users.email as userEmail', 'users.id as userId', 'users.rol as rol')
        ->leftJoin('categories', 'categories.encargado', '=', 'users.id')->where('rol', 1)
        ->get();
        
        // dd($profesores);
        return view('panel.profesores.index', compact('usuarios', 'categorias', 'usersInfo'));
    }

    public function create()
    {
        $categorias = DB::table('categories')->select('id', 'name')->get();

        return view('panel.profesores.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_dash'],
        ));

        $profesor = new User();
        $profesor->name = $request->name;
        $profesor->email = $request->email;
        $profesor->password = Hash::make($request->password);
        $profesor->save();

        $encargado = DB::table('users')->where('email', '=', $request->email)->select('id')->get();

        if(!$request->categoria == ""){
            Category::findOrFail($request->categoria)->update( array(
                 'encargado' => $encargado[0]->id,
              ) );
        }

        return redirect('adminpanel/profesores/');
    }

    public function edit($id)
    {
        // dd($id);
        $usuario = User::find($id);
        return view('panel.profesores.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_dash'],
        ));

        $profesor = User::find($id);
        $profesor->name = $request->name;
        $profesor->email = $request->email;
        $profesor->password = $request->password;
        $profesor->save();

        return redirect('adminpanel/profesores/');
    }

    public function destroy($id)
    {   
        User::destroy($id);
        return redirect('adminpanel/profesores/');
    }
}
