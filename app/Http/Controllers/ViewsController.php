<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;

class ViewsController extends Controller
{
    public function index()
    {
        return view('panel.reportes.index');
    }

    public function generatePDF()
    {
    	$datos = \DB::table('registries')->select(['id', 'recomendacion', 'accion_planeada', 'version', 'duracion', 'categoria'])->get();
        $categorias = \DB::table('categories')->select(['id', 'name', 'encargado'])->get();

        //$ruta = 'reportes/';

        //Asignar nombre de la categoria al reporte
        foreach ($categorias as $categoria) {
            $nombre = $categoria->name.".pdf";
        }

        $view = \View::make('reporte', compact('datos','categorias'))->render();
        //$output = $view->output();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf ->setPaper('A4', 'landscape');
    	$pdf->loadHTML($view);
        //file_put_contents(filename, data)
    	return $pdf->download($nombre);
    }
}