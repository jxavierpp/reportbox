<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidency;

class FileController extends Controller
{
	public function index($registro_id)
	{
		return view('records.form', compact('registro_id'));
	}


    public function store(Request $request)
	{
            $path = public_path().'uploads/';
            $files = $request->file('file');
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
                $evidencia = new Evidency();
                $evidencia->nombre = $fileName;
                $evidencia->documento_url = $path.$fileName;
                $evidencia->registro = $request->registro_id;
                $evidencia->save();
            }
	}
}
