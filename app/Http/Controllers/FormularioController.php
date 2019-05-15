<?php

namespace App\Http\Controllers;

use App\Category;
use App\Registry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormularioController extends Controller
{
    protected $registros;
    protected $categoria;

    public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function index()
    {
        try {
            $categoria_tmp = Auth::user()->categoria()->first();
            $categoria_id = $categoria_tmp->id;
            if($this->categoria == null){
                $this->categoria = $categoria_tmp;
            }
            $categoria = Category::find($categoria_id);
            $registros = $categoria->registros()->get();

            return view('records.index', ['registros' => $registros]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function store(Request $request)
    {
        // dd($request->nombre);
        $categoria = $request->user()->categoria()->first();

        $registro = new Registry();
        $registro->recomendacion = $request->recomendacion;
        $registro->version = $request->identificador;
        $registro->accion_planeada = "En espera de ser capturado.";
        $registro->duracion = 0;
        $registro->categoria = $categoria->id;
        $registro->save();
        return back();
    }

    public function edit($id)
    {
        // dd($id);
        $registro = Registry::find($id);
        return view('records.edit', compact('registro'));
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->nombre);
        $categoria = $request->user()->categoria()->first();

        $registro = Registry::find($id);
        $registro->recomendacion = $request->recomendacion;
        $registro->version = $request->identificador;
        $registro->save();
        
        return redirect('formulario');
    }

    public function edit_accion_planeada($id)
    {
        // dd($id);
        $registro = Registry::find($id);
        return view('records.edit_accion_planeada', compact('registro'));
    }

    public function update_accion_planeada(Request $request, $id)
    {
        // dd($request->nombre);
        $categoria = $request->user()->categoria()->first();

        $registro = Registry::find($id);
        $registro->accion_planeada = $request->accion_planeada;
        $registro->duracion = $request->duracion;
        $registro->save();
        
        return redirect('formulario');
    }

    public function destroy($id)
    {
        Registry::destroy($id);
        return back();
    }

    // PARA EL PANEL DE ADMINISTRADOR
    public function index2($categoria_id)
    {
        try {
            $categoria = Category::find($categoria_id);
            $registros = $categoria->registros()->get();

            return view('panel.records.index', ['registros' => $registros, 'categoria' => $categoria]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function store2(Request $request)
    {
        $categoria = Category::find($request->categoria_id);

        $registro = new Registry();
        $registro->recomendacion = $request->recomendacion;
        $registro->version = $request->identificador;
        $registro->accion_planeada = "En espera de ser capturado.";
        $registro->duracion = 0;
        $registro->categoria = $request->categoria_id;
        $registro->save();
        return back();
    }

    public function edit2($id)
    {
        // dd($id);
        $registro = Registry::find($id);
        return view('panel.records.edit', compact('registro'));
    }
    
    public function update2(Request $request, $id)
    {
        $registro = Registry::find($id);
        $registro->recomendacion = $request->recomendacion;
        $registro->version = $request->identificador;
        $registro->save();
        
        return redirect('adminpanel/formulario/'.$registro->categoria);
    }

    public function edit_accion_planeada2($id)
    {
        // dd($id);
        $registro = Registry::find($id);
        return view('panel.records.edit_accion_planeada', compact('registro'));
    }

    public function update_accion_planeada2(Request $request, $id)
    {
        $registro = Registry::find($id);
        $registro->accion_planeada = $request->accion_planeada;
        $registro->duracion = $request->duracion;
        $registro->save();
        
        return redirect('adminpanel/formulario/'.$registro->categoria);
    }

    public function destroy2($id)
    {
        Registry::destroy($id);
        return back();
    }

    
}
