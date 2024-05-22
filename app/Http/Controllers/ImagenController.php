<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{

    public function getImage($fileName)
    {
        $fileContents = Storage::get('fotos/' . $fileName);
        return response($fileContents, 200)->header('Content-Type', 'image/png');

    }
}
