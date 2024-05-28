<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FileDownloadController extends Controller
{
    public function download($filename)
    {
        dd($filename); 
        $filePath = 'app/fotos/ffzgC9SUl2DGGPA7Nc8DUt36ZCAzdB5kboL2lV8Q.xlsx';
    
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            abort(404, 'File not found.');
        }
    }
    
}

