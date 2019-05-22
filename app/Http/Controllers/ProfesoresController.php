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
        $usuarios = DB::select('SELECT * FROM users');

        return view('panel.profesores.index', compact('usuarios'));
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
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_dash'],
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
        $profesor = User::find($id);
        $email = DB::table('users')->where('id', '=', $id)->select('email')->get();

        if($email[0]->email == $request->email){
            $this->validate($request, array(
                'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
                'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_dash'],
            ));

            $profesor->name = $request->name;
            $profesor->email = $request->email;
            $profesor->password = Hash::make($request->password);
            $profesor->save();

        }else{
            $this->validate($request, array(
                'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_dash'],
            ));

            $profesor->name = $request->name;
            $profesor->email = $request->email;
            $profesor->password = $request->password;
            $profesor->save();

        }

        return redirect('adminpanel/profesores/');
        
    }

    public function destroy($id)
    {   
        User::destroy($id);
        return redirect('adminpanel/profesores/');
    }
}
