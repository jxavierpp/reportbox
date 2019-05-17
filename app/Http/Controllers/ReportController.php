<?php

namespace App\Http\Controllers;

use App\Report;
use App\Category;
use App\Registry;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        $reportes = Report::all();
        return view('panel.reportes.index',compact('reportes','categorias'));
    }

    public function create(Request $request)
    {   
        $pdfroot  = dirname(dirname(__FILE__));
        $pdfroot .= "/reports";

        $file_name = $request->file_name;
        //Sera un reporte general o especifico?
        if($request->category_id == '99'){
            //Reporte General
            $categorias = Category::all();
            $datos = Registry::all();
            $view = \View::make('reporte', compact('datos','categorias'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf ->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);
            $reporte = new Report();
            $reporte->nombre = $file_name;
            $reporte->categoria = null;
            $reporte->save();
            // $pdf_string = $pdf->output();
            file_put_contents($file_name.'.pdf', public_path().'/reports'); 
            return $pdf->download($file_name.'.pdf','/reports');
        }
        else {
            //Reporte especifico
            $categorias = Category::find($request->category_id);
            $datos = Registry::all()->where('categoria', '=', '$request->category_id');
            $view = \View::make('reporte', compact('datos','categorias'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf ->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);
            $reporte = new Report();
            $reporte->nombre = $file_name;
            $reporte->categoria = $request->category_id;
            $reporte->save();
            file_put_contents($file_name.'.pdf', public_path().'/reports');
            return $pdf->download($file_name.'.pdf','/reports');
        }
       
    	return redirect('/adminpanel/reportes/');
    }

    public function show(Report $report)
    {
        //
    }

    public function destroy($id)
    {
        Report::destroy($id);
        return redirect('/adminpanel/reportes/');
    }
}
