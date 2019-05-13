<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        // dd($profesores);
        return view('panel.profesores.index', compact('usuarios'));
    }

    public function create()
    {
        return view('panel.profesores.create');
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
        $profesor->save();

        return redirect('adminpanel/profesores/');
    }

    public function edit($id)
    {
        // dd($id);
        $profesor = Profesor::find($id);
        return view('panel.profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, array(
            'nombre' => 'required',
            'grado' => 'required',
            'year' => 'required',
        ));

        $profesor = Profesor::find($id);
        $profesor->nombre = $request->nombre;
        $profesor->grado = $request->grado;
        $profesor->year = $request->year;
        $profesor->save();

        return redirect()->route('panel.profesores.index');
    }

    public function destroy($id)
    {   
        $profesor = profesor::find($id);
        $profesor->publicaciones()->detach();
        $profesor->delete();

        return redirect()->route('panel.profesores.index');
    }
}
