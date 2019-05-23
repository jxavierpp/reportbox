<?php

namespace App\Http\Controllers;

use App\Evidency;
use App\Registry;
use File;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EvidencyController extends Controller
{
    public function __construct()
    {
        if(!File::exists(public_path()."/evidencias")) {
            File::makeDirectory(public_path()."/evidencias");
        }
        
    }

    public function index($registro_id)
    {

        $registro = Registry::find($registro_id);
        $evidencias = $registro->evidencias()->get();
        return view('panel.evidency.index', compact('registro', $registro, 'evidencias', $evidencias));
    }

    public function store(Request $request)
    {
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //obtener la extension del archivo
        $extension = $file->getClientOriginalExtension();

        //movemos el archivo a una carpeta local
        $request->file('file')->move(public_path()."\\evidencias\\", $nombre);  

        //obtener el tamano del archivo
        $size = File::size(public_path()."\\evidencias\\".$nombre);
        
        $evidencia = new Evidency();
        $evidencia->name = $nombre;
        $evidencia->format = $extension;
        $evidencia->url = '/evidencias/'.$nombre;
        $evidencia->size = $size;
        $evidencia->registro = $request->registro_id;
        $evidencia->save();

        return redirect('/adminpanel/evidencias/'.$request->registro_id);   
    }

    public function destroy($id)
    {
        Evidency::destroy($id);
        return back();
    }


    public function index1($registro_id)
    {
        $registro = Registry::find($registro_id);
        $evidencias = $registro->evidencias()->get();
        return view('evidency.index', compact('registro', $registro, 'evidencias', $evidencias));
    }

    public function store1(Request $request)
    {
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //obtener la extension del archivo
        $extension = $file->getClientOriginalExtension();

        //movemos el archivo a una carpeta local
        $request->file('file')->move(public_path()."\\evidencias\\", $nombre);  

        //obtener el tamano del archivo
        $size = File::size(public_path()."\\evidencias\\".$nombre);
        
        $evidencia = new Evidency();
        $evidencia->name = $nombre;
        $evidencia->format = $extension;
        $evidencia->url = '/evidencias/'.$nombre;
        $evidencia->size = $size;
        $evidencia->registro = $request->registro_id;
        $evidencia->save();

        return redirect('/evidencias/'.$request->registro_id);   
    }

    public function destroy1($id)
    {
        Evidency::destroy($id);
        return back();
    }
}
