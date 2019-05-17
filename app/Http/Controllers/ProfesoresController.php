<?php

namespace App\Http\Controllers;

use App\User;
use App\Categoty;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $usuarios = User::where('rol', '=', '1')->get();
        // dd($profesores);
        return view('panel.profesores.index', compact('usuarios'));
    }

    public function create()
    {
        $categorias = Categoty::all();
        return view('panel.profesores.create', $categorias);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ));

        $profesor = new User();
        $profesor->name = $request->name;
        $profesor->email = $request->email;
        $profesor->password = $request->password;
        $profesor->rol = 1;
        $profesor->save();

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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
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
