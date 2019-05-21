<?php

namespace App\Http\Controllers;

use App\Report;
use App\Category;
use App\Registry;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        if(!File::exists(public_path()."/reportes")) {
            File::makeDirectory(public_path()."/reportes");
        }
        
    }

    public function index()
    {
        // return $users = DB::table('reports')->get();
        $categorias = Category::all();
        $reportes = Report::all();
        return view('panel.reportes.index',compact('reportes','categorias'));
    }

    
    public function create(Request $request)
    {   
        $pdfroot  = dirname(dirname(__FILE__));
        $pdfroot .= "/reports";
        $file_name = $request->file_name;
        //Reporte General
        $categorias = Category::all();
        $datos = Registry::all();
        $view = \View::make('reporte', compact('datos','categorias'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        $pdf->loadHTML($view)->save(public_path()."\\reportes\\".$file_name.".pdf");
        $size = File::size(public_path()."\\reportes\\".$file_name.".pdf");

        $reporte = new Report();
        $reporte->nombre = $file_name;
        if($request->category_id == '99'){
            $reporte->categoria = null;
        } else {
            $reporte->categoria = $request->category_id;
        }
        $reporte->url = '/reportes/'.$file_name.".pdf";
        $reporte->size = $size;
        $reporte->save();
       
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
