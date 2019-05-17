<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
	public function index()
	{
		return view('records.form');
	}

    public function store(Request $request)
	{
            $path = public_path().'/uploads/';
            $files = $request->file('file');
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
	}
}
