<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::all();

        $contentType = 'imagen';
        if ($slider->isNotEmpty()) {
            $imagenPath = $slider[0]['imagen'];
            $extension = pathinfo($imagenPath, PATHINFO_EXTENSION);
            $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $validVideoExtensions = ['mp4', 'avi', 'mov', 'wmv']; 

            if (in_array($extension, $validVideoExtensions)) {
                $contentType = 'video';
            }
        }

        return view('home', compact('slider', 'contentType'));
    }
}
