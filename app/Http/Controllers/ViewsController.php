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
    	$view = \View::make('reporte', compact('datos','categorias'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf ->setPaper('A4', 'landscape');
    	$pdf->loadHTML($view);
    	return $pdf->stream('Reporte de categoria.pdf');
    }
}