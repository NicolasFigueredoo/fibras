<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function agregarSuscripcion(Request $request)
    {
        $email = $request->email;
        $suscripcion = new Suscripcion();
        $suscripcion->email = $email;
        $suscripcion->save();

        return redirect('/');

      
    }

     //SUSCRIPCIONES
     public function obtenerSuscripciones(){
        $suscripciones = Suscripcion::all();
        return response()->json($suscripciones);
    }

    public function deleteSuscripcion($idSuscripcion)
    {
        $suscripcion = Suscripcion::find($idSuscripcion);
        $suscripcion->delete();

        $suscripciones = Suscripcion::all();


        return response()->json($suscripciones);

      
    }
}
