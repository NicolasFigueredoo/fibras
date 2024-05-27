<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Valores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NosotrosController extends Controller
{
    public function index()
    {

        $seccion = Banner::where('seccion','servicio1')->get();
        $servicios = Valores::all();

        return view('nosotros',compact('seccion', 'servicios'));

    }
}
