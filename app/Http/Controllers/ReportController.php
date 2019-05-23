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
        $categorias_temp = Category::all();
        $categorias = [];
        foreach($categorias_temp as $categoria){
            if(count($categoria->registros()->get()) != 0){
                array_push($categorias, $categoria);
            }
        }
        $reportes = Report::all();
        return view('panel.reportes.index',compact('reportes','categorias'));
    }

    
    public function create(Request $request)
    {   
        $categoria_id = $request->category_id;
        $pdfroot  = dirname(dirname(__FILE__));
        $pdfroot .= "/reports";
        $file_name = $request->file_name;

        if($categoria_id == 99){
            //Reporte General
            $categoria1 = Category::find(1);
            $registros1 = $categoria1->registros()->get();
            $categoria2 = Category::find(2);
            $registros2 = $categoria2->registros()->get();
            $categoria3 = Category::find(3);
            $registros3 = $categoria3->registros()->get();
            $categoria4 = Category::find(4);
            $registros4 = $categoria4->registros()->get();
            $categoria5 = Category::find(5);
            $registros5 = $categoria5->registros()->get();
            $categoria6 = Category::find(6);
            $registros6 = $categoria6->registros()->get();
            $categoria7 = Category::find(7);
            $registros7 = $categoria7->registros()->get();
            $categoria8 = Category::find(8);
            $registros8 = $categoria8->registros()->get();
            $categoria9 = Category::find(9);
            $registros9 = $categoria9->registros()->get();
            $categoria10 = Category::find(10);
            $registros10 = $categoria10->registros()->get();

            $view = \View::make('reporte2', compact( 'categoria1','registros1',
                                                    'categoria2','registros2',
                                                    'categoria3','registros3',
                                                    'categoria4','registros4',
                                                    'categoria5','registros5',
                                                    'categoria6','registros6',
                                                    'categoria7','registros7',
                                                    'categoria8','registros8',
                                                    'categoria9','registros9',
                                                    'categoria10','registros10'
                                                    ))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view)->save(public_path()."\\reportes\\".$file_name.".pdf");
            $size = File::size(public_path()."\\reportes\\".$file_name.".pdf");
    
            $reporte = new Report();
            $reporte->nombre = $file_name;
            $reporte->categoria = null;
            
            $reporte->url = '/reportes/'.$file_name.".pdf";
            $reporte->size = $size;
            $reporte->save();
            
            return redirect('/adminpanel/reportes/');

        } else {
            //Reporte especifico
            $categoria = Category::find($categoria_id);
            $registros = $categoria->registros()->get();

            $view = \View::make('reporte', compact('registros','categoria'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view)->save(public_path()."\\reportes\\".$file_name.".pdf");
            $size = File::size(public_path()."\\reportes\\".$file_name.".pdf");
    
            $reporte = new Report();
            $reporte->nombre = $file_name;
            $reporte->categoria = $request->category_id;
            $reporte->url = '/reportes/'.$file_name.".pdf";
            $reporte->size = $size;
            $reporte->save();
           
            return redirect('/adminpanel/reportes/');
        }
    }

    public function destroy($id)
    {
        Report::destroy($id);
        return redirect('/adminpanel/reportes/');
    }
}
