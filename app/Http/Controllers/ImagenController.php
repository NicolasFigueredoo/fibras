<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{

    public function getImage($fileName)
    {
        if (Storage::exists('fotos/' . $fileName)) {
            $fileContents = Storage::get('fotos/' . $fileName);
            $mimeType = Storage::mimeType('fotos/' . $fileName);

            return response($fileContents, 200)->header('Content-Type', $mimeType);
        } else {
            return response('File not found', 404);
        }

    }
}
